/*
Theme Name: Anime Flow
Theme Preview:https://youtu.be/CNuUaRmnO_g?si=0ueLd4GXgEMSwSqA
Author: Rahul Panchanan Mandal
Description: A custom WordPress theme designed for anime stream and creative websites.
Version: 1.0
License: GNU General Public License v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Tags: anime, blog, responsive, custom-theme
*/
<?php get_header(); ?>

<main>

<style>
.search-bar {
  text-align: center;
  margin: 40px 0;
}
.search-bar input {
  padding: 12px 20px;
  width: 300px;
  font-size: 16px;
  border-radius: 8px;
  border: 1px solid #444;
  background: #111;
  color: #fff;
}
.grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
  gap: 20px;
  margin: 40px 0;
}
.card {
  background: #222;
  border-radius: 8px;
  overflow: hidden;
  text-align: center;
}
.card img {
  width: 100%;
  height: auto;
}
.card-title {
  padding: 10px;
  color: #fff;
  font-weight: 600;
}
</style>

<!-- SEARCH BAR -->
<form method="GET" class="search-bar">
  <input type="text" name="s" placeholder="Search anime..." value="<?php echo get_search_query(); ?>">
</form>

<h2 style="text-align:center; color:white;">Search Results</h2>

<div class="grid">

<?php
// This is WordPress default search query. Works automatically.
if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>

        <div class="card">
          <a href="<?php the_permalink(); ?>">
            <?php if(has_post_thumbnail()): ?>
              <img src="<?php the_post_thumbnail_url(); ?>">
            <?php endif; ?>
            <div class="card-title"><?php the_title(); ?></div>
          </a>
        </div>

<?php
    endwhile;
else :
    echo "<p style='text-align:center; color:#ccc;'>No results found.</p>";
endif;
?>

</div>

</main>

<?php get_footer(); ?>
