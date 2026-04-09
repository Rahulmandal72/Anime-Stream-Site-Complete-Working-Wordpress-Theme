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
<?php 
/* Template Name: Hindi Dub Page */
get_header();

// Handle pagination via POST
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['page'])) {
    $_SESSION['hindidub_page'] = intval($_POST['page']);
    wp_safe_remote_post(get_permalink(), array('blocking' => false));
}

// Get current page
$current_page = isset($_SESSION['hindidub_page']) ? intval($_SESSION['hindidub_page']) : 1;
if($current_page < 1) $current_page = 1;
?>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background: #0a0e27;
    color: #fff;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.hindidub-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 40px 20px;
}

.section-title {
    font-size: 48px;
    font-weight: 700;
    margin-bottom: 30px;
    color: #fff;
    letter-spacing: 1px;
}

.filter-bar {
    display: flex;
    gap: 15px;
    margin: 30px 0;
    flex-wrap: wrap;
    align-items: center;
}

.filter-bar input,
.filter-bar select {
    padding: 12px 16px;
    background: #1a1f3a;
    color: #fff;
    border: 1px solid #333;
    border-radius: 8px;
    font-size: 14px;
    transition: all 0.3s ease;
    cursor: pointer;
}

.filter-bar input:focus,
.filter-bar select:focus {
    outline: none;
    border-color: #6366f1;
    background: #222640;
}

.filter-bar input {
    min-width: 250px;
    flex: 1;
}

.filter-bar select {
    min-width: 180px;
}

.grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 25px;
    margin-top: 40px;
}

.card {
    position: relative;
    border-radius: 12px;
    overflow: hidden;
    cursor: pointer;
    transition: all 0.3s ease;
    border: 2px solid #333;
    background: #0f1729;
    height: 100%;
}

.card:hover {
    transform: translateY(-8px);
    border-color: #6366f1;
    box-shadow: 0 12px 24px rgba(99, 102, 241, 0.3);
}

.card a {
    text-decoration: none;
    display: flex;
    flex-direction: column;
    height: 100%;
}

.card img {
    width: 100%;
    height: 280px;
    object-fit: cover;
    display: block;
}

.card-content {
    padding: 16px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    flex-grow: 1;
    background: linear-gradient(to bottom, transparent, rgba(10, 14, 39, 0.9));
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
}

.card-title {
    font-size: 15px;
    font-weight: 600;
    color: #fff;
    margin-bottom: 12px;
    line-height: 1.3;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.card-year {
    font-size: 14px;
    color: #ffd700;
    font-weight: 600;
    margin-top: auto;
}

.no-results {
    grid-column: 1 / -1;
    text-align: center;
    padding: 60px 20px;
    color: #999;
    font-size: 18px;
}

.no-results span {
    font-size: 32px;
    display: block;
    margin-bottom: 10px;
}

.pagination-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
    margin-top: 50px;
    margin-bottom: 30px;
    flex-wrap: wrap;
}

.pagination-wrapper button,
.pagination-wrapper span {
    padding: 10px 15px;
    background: #1a1f3a;
    color: #fff;
    border: 1px solid #333;
    border-radius: 8px;
    text-decoration: none;
    transition: all 0.3s ease;
    font-weight: 600;
    display: inline-block;
    min-width: 40px;
    text-align: center;
    cursor: pointer;
    font-size: 14px;
}

.pagination-wrapper button:hover {
    background: #6366f1;
    border-color: #6366f1;
    transform: translateY(-2px);
}

.pagination-wrapper .current {
    background: #6366f1;
    border-color: #6366f1;
    color: #fff;
    cursor: default;
}

.pagination-wrapper .disabled {
    opacity: 0.5;
    cursor: not-allowed;
    background: #1a1f3a;
}

.pagination-info {
    text-align: center;
    color: #999;
    margin-top: 20px;
    font-size: 14px;
}

@media (max-width: 768px) {
    .grid {
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 15px;
    }

    .section-title {
        font-size: 32px;
    }

    .filter-bar {
        flex-direction: column;
    }

    .filter-bar input,
    .filter-bar select {
        width: 100%;
    }

    .pagination-wrapper {
        gap: 5px;
    }

    .pagination-wrapper button,
    .pagination-wrapper span {
        padding: 8px 12px;
        font-size: 12px;
    }
}
</style>

<div class="hindidub-container">
    <h2 class="section-title">Hindi Dub</h2>

    <?php
    // GENRE LIST
    $genre_list = [
        "Action","Action & Adventure","Adult Cast","Adventure","Animation","Anime","Anime Times","Bengali",
        "Boys Love","Cartoon","Comedy","Crime","Crossdressing","Crunchyroll","Cute Girls Doing Cute Things",
        "Delinquents","Detective","Documentary","Drama","Ecchi","Family","FanDub","Fantasy","Girls Love",
        "Gore","Gourmet","Harem","Hindi Dub","Hindi Sub","Historical","History","Horror","Idols","Isekai",
        "JioHotstar","Kannada","Kids","Live-Action","Love Polygon","Malayalam","Martial Arts","Mecha",
        "Medical","Military","Music","Mystery","Mythology","Otaku Culture","Parody","Psychological",
        "Racing","Reincarnation","Romance","Samurai","School","Sci-Fi","Sci-Fi & Fantasy","Science Fiction",
        "Seinen","Shoujo","Shounen","Showbiz","Slice of Life","Space","Sports","Strategy Game","Super Power",
        "Supernatural","Survival","Suspense","Tamil","Telugu","Thriller","Time Travel","TV Movie","Vampire",
        "Video Game","Villainess","War","War & Politics","Western","Workplace","Zee Cafe"
    ];
    ?>

    <!-- FILTER BAR -->
    <form method="GET" id="filter-form">
        <div class="filter-bar">
            <!-- SEARCH -->
            <input type="text" 
                   name="s" 
                   placeholder="🔍 Search Hindi Dub..." 
                   value="<?php echo esc_attr($_GET['s'] ?? ''); ?>"
                   onchange="document.getElementById('filter-form').submit()">

            <!-- GENRE -->
            <select name="genre" onchange="document.getElementById('filter-form').submit()">
                <option value="">🎭 Genre</option>
                <?php foreach($genre_list as $g): 
                    $slug = strtolower(str_replace([' & ',' ','/'], ['-','-','-'], $g));
                ?>
                <option value="<?php echo $slug; ?>"
                    <?php echo isset($_GET['genre']) ? selected($_GET['genre'], $slug, false) : ''; ?>>
                    <?php echo $g; ?>
                </option>
                <?php endforeach; ?>
            </select>

            <!-- YEAR FILTER -->
            <select name="year" onchange="document.getElementById('filter-form').submit()">
                <option value="">📅 Year</option>
                <?php 
                for($y = date('Y'); $y >= 1980; $y--){ ?>
                    <option value="<?php echo $y; ?>" 
                        <?php echo isset($_GET['year']) ? selected($_GET['year'], $y, false) : ''; ?>>
                        <?php echo $y; ?>
                    </option>
                <?php } ?>
            </select>
        </div>
    </form>

    <!-- HINDI DUB GRID -->
    <div class="grid">
    <?php

    // FINAL WP QUERY
    $args = [
        'post_type' => 'post',
        'posts_per_page' => 8,
        'orderby' => 'date',
        'order' => 'DESC',
        's' => sanitize_text_field($_GET['s'] ?? ''),
        'category_name' => 'hindi-dub',
        'paged' => $current_page
    ];

    $meta_query = [];

    // GENRE FILTER (backend array meta field)
    if (!empty($_GET['genre'])) {
        $meta_query[] = [
            'key'     => 'genre',
            'value'   => sanitize_text_field($_GET['genre']),
            'compare' => 'LIKE'
        ];
    }

    // YEAR FILTER
    if (!empty($_GET['year'])) {
        $meta_query[] = [
            'key'     => 'year',
            'value'   => intval($_GET['year']),
            'compare' => '='
        ];
    }

    // APPLY META QUERY
    if (!empty($meta_query)) {
        $args['meta_query'] = $meta_query;
    }

    $hindidub = new WP_Query($args);

    if($hindidub->have_posts()):
        while($hindidub->have_posts()): 
            $hindidub->the_post();
            $year = get_post_meta(get_the_ID(), 'year', true) ? get_post_meta(get_the_ID(), 'year', true) : date('Y');
            ?>

            <div class="card">
                <a href="<?php the_permalink(); ?>">
                    <?php if(has_post_thumbnail()): ?>
                        <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>">
                    <?php else: ?>
                        <img src="https://via.placeholder.com/200x280?text=No+Image" alt="<?php the_title(); ?>">
                    <?php endif; ?>
                    <div class="card-content">
                        <div class="card-title"><?php the_title(); ?></div>
                        <div class="card-year"><?php echo esc_html($year); ?></div>
                    </div>
                </a>
            </div>

    <?php 
        endwhile;
    else:
        echo '<div class="no-results"><span>🔍</span><p>No Hindi Dub content found</p></div>';
    endif;

    wp_reset_postdata(); 
    ?>
    </div>

    <!-- PAGINATION -->
    <?php 
    $total_pages = $hindidub->max_num_pages;
    if($total_pages > 1): 
    ?>
    <div class="pagination-wrapper">
        <form method="POST" style="display:inline;">
            <?php
            // Previous Button
            if($current_page > 1):
                ?>
                <button type="submit" name="page" value="<?php echo $current_page - 1; ?>">← Previous</button>
                <?php
            else:
                ?>
                <span class="disabled">← Previous</span>
                <?php
            endif;
            
            // Page Numbers
            for($i = 1; $i <= $total_pages; $i++):
                if($i == $current_page):
                    ?>
                    <span class="current"><?php echo $i; ?></span>
                    <?php
                else:
                    ?>
                    <button type="submit" name="page" value="<?php echo $i; ?>"><?php echo $i; ?></button>
                    <?php
                endif;
            endfor;
            
            // Next Button
            if($current_page < $total_pages):
                ?>
                <button type="submit" name="page" value="<?php echo $current_page + 1; ?>">Next →</button>
                <?php
            else:
                ?>
                <span class="disabled">Next →</span>
                <?php
            endif;
            ?>
        </form>
    </div>

    <div class="pagination-info">
        Page <strong><?php echo $current_page; ?></strong> of <strong><?php echo $total_pages; ?></strong> 
        (Total: <strong><?php echo $hindidub->found_posts; ?></strong> Hindi Dub content)
    </div>
    <?php endif; ?>

</div>

<?php get_footer(); ?>