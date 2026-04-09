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
/* Template Name: Anime Home */
get_header();
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

<style>
/* BASIC */
body {
    background: #050012;
    color: #fff;
    font-family: "Poppins", sans-serif;
    margin: 0;
}

/* GLOBAL TITLES */
.section-title {
    font-size: 28px;
    font-weight: 700;
    margin: 40px 0 15px;
    padding-left: 5px;
}

/* SEARCH BAR */
.search-wrapper {
    width: 100%;
    display: flex;
    justify-content: center;
    margin: 25px 0 35px;
}

.search-bar {
    width: 92%;
    max-width: 700px;
    position: relative;
}

.search-bar input {
    width: 100%;
    padding: 16px 55px 16px 25px;
    font-size: 16px;
    border-radius: 50px;
    border: 1px solid #3b2460;
    outline: none;
    background: rgba(255,255,255,0.07);
    color: #fff;
    backdrop-filter: blur(8px);
    transition: 0.3s;
}

.search-bar input:focus {
    border-color: #a676ff;
}

.search-bar button {
    position: absolute;
    top: 7px;
    right: 15px;
    background: none;
    border: none;
    cursor: pointer;
}

.search-bar button img {
    width: 28px;
    opacity: 0.9;
}

/* ===================== HERO SLIDER ===================== */

.hero-slider {
    width: 100%;
    margin-bottom: 35px;
}
.hero-slider .swiper-slide {
    width: 100%;
    height: 420px;
    position: relative;
    border-radius: 16px;
    overflow: hidden;
    color: #fff;
}

.hero-slider article {
    position: relative;
    height: 100%;
    padding: 35px;
    display: flex;
    justify-content: flex-end;
    flex-direction: column;
    z-index: 3;
}

/* Background */
.hero-slider .bg {
    position: absolute;
    inset: 0;
    background-size: cover;
    background-position: center;
    filter: brightness(0.65);
    z-index: 1;
}

/* Gradient */
.hero-slider .swiper-slide:after {
    content: "";
    position: absolute;
    bottom: 0;
    height: 50%;
    width: 100%;
    background: linear-gradient(180deg, transparent, rgba(0,0,0,0.95));
    z-index: 2;
}

/* Title */
.hero-slider h2.entry-title {
    font-size: 34px;
    font-weight: 800;
    margin-bottom: 12px;
}

/* Meta Info */
.entry-meta span {
    margin-right: 10px;
    font-size: 15px;
    opacity: 0.9;
}

.rating span {
    color: #ffdf00;
    font-weight: 700;
}

/* Categories */
.entry-meta .categories a {
    margin-right: 6px;
    color: #ffdf00;
    text-decoration: none;
    font-weight: 600;
}

/* Watch button */
.hero-slider .btn {
    display: inline-block;
    margin-top: 15px;
    padding: 10px 26px;
    background: #ffdf00;
    color: #000;
    font-weight: 700;
    border-radius: 8px;
    text-decoration: none;
    transition: 0.3s;
}
.hero-slider .btn:hover {
    transform: scale(1.05);
}

/* MOBILE RESPONSIVE */
@media(max-width: 600px) {
    .hero-slider .swiper-slide {
        height: 350px;
    }
    .hero-slider h2.entry-title {
        font-size: 24px;
    }
}

/* CONTENT GRID */
.grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(155px, 1fr));
    gap: 20px;
    padding-bottom: 20px;
}

/* CARDS */
.card {
    background: rgba(255,255,255,0.06);
    border-radius: 15px;
    padding: 10px;
    transition: 0.3s;
    backdrop-filter: blur(6px);
    border: 2px solid rgba(166, 118, 255, 0.3);
    cursor: pointer;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.4);
    border-color: rgba(166, 118, 255, 0.6);
}

.card a {
    text-decoration: none;
    color: inherit;
}

.card-image-wrapper {
    position: relative;
    width: 100%;
    height: 230px;
    border-radius: 12px;
    overflow: hidden;
}

.card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 12px;
}

.card-content {
    padding-top: 12px;
}

.card-title {
    font-weight: 600;
    font-size: 14px;
    line-height: 1.3rem;
    margin-bottom: 8px;
    color: #fff;
}

.card-year {
    font-size: 13px;
    color: #ffdf00;
    font-weight: 600;
}

/* SECTION CONTAINER */
.section-container {
    margin-bottom: 50px;
}

/* VIEW ALL BUTTON */
.view-all-btn-wrapper {
    display: flex;
    justify-content: center;
    margin-top: 30px;
    margin-bottom: 20px;
}

.view-all-btn {
    display: inline-block;
    padding: 12px 40px;
    background: linear-gradient(135deg, #a676ff, #ffdf00);
    color: #fff;
    font-weight: 700;
    border-radius: 8px;
    text-decoration: none;
    border: none;
    cursor: pointer;
    transition: 0.3s;
    font-size: 16px;
}

.view-all-btn:hover {
    transform: scale(1.08);
    box-shadow: 0 8px 20px rgba(166, 118, 255, 0.4);
}

/* RESPONSIVE */
@media(max-width: 768px) {
    .grid {
        grid-template-columns: repeat(auto-fill, minmax(130px, 1fr));
        gap: 15px;
    }
    
    .section-title {
        font-size: 24px;
    }
}

@media(max-width: 480px) {
    .grid {
        grid-template-columns: repeat(auto-fill, minmax(110px, 1fr));
        gap: 12px;
    }
    
    .section-title {
        font-size: 20px;
        margin: 30px 0 12px;
    }
    
    .view-all-btn {
        padding: 10px 30px;
        font-size: 14px;
    }
}
</style>

<!-- ========== HERO SLIDER (AnimeFlow Responsive) ========== -->
<div id="heroSlider" class="hero">
  <!-- LOGO -->
  <div class="logo">
    <span>AnimeFlow</span>
  </div>

  <!-- MAIN WRAPPER: content left, thumbs right on desktop -->
  <div class="hero-grid">
    <!-- MAIN INFO -->
    <div class="hero-info">
      <h1 id="seriesTitle">Trollhunters: Tales of Arcadia</h1>
      <div id="seriesMeta" class="meta">
        <span class="rating"><i class="fa fa-star"></i> 8.4</span>
        <span class="sep">2016</span>
        <span class="sep">24m</span>
      </div>
      <div id="seriesGenres" class="genres">
        <span>Action</span>
        <span>Adventure</span>
        <span>Cartoon</span>
      </div>
      <a href="#" class="cta"><i class="fa fa-play"></i> Watch Series</a>
    </div>

    <!-- THUMBNAILS -->
    <div class="thumbs">
      <button class="thumb" onclick="loadSeries(0)">
        <img src="https://w0.peakpx.com/wallpaper/231/598/HD-wallpaper-ben-10-cartoon.jpg" alt="Ben 10 Classic">
      </button>
      <button class="thumb" onclick="loadSeries(1)">
        <img src="https://www.hdwallpapers.in/download/izuku_midoriya_katsuki_bakugou_shoto_todoroki_hd_my_hero_academia_4-1366x768.jpg" alt="My Hero Academia">
      </button>
      <button class="thumb" onclick="loadSeries(2)">
        <img src="https://images2.alphacoders.com/124/thumb-1920-1248400.png" alt="Black Clover">
      </button>
    </div>
  </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

<style>
  /* Base */
  :root{
    --bg1:#12101f; --accent:#00ffe7; --text:#fff; --shadow:0 8px 48px #2c1b4f99;
  }
  *{box-sizing:border-box}
  .hero{
    background:linear-gradient(95deg,var(--bg1) 50%,#43beef22 100%), url('https://wallpapercave.com/wp/wp2137241.jpg');
    background-size:cover; background-position:center;
    min-height:520px; border-radius:30px; box-shadow:var(--shadow);
    position:relative; overflow:hidden; padding:42px 20px; transition:background 0.5s ease;
  }
  .logo{position:absolute; left:28px; top:20px}
  .logo span{font-size:42px; font-family:'Luckiest Guy',cursive; letter-spacing:2px; color:var(--accent); text-shadow:0 4px 22px #000}

  .hero-grid{
    display:grid; grid-template-columns:1fr; gap:20px; align-items:end;
    max-width:1100px; margin:80px auto 0;
  }

  .hero-info h1{
    font-size:36px; font-weight:900; color:var(--text); text-shadow:0 8px 32px #000; margin:0 0 12px;
  }
  .meta{display:flex; gap:14px; align-items:center; color:var(--text); font-size:16px}
  .meta .rating{color:var(--accent); font-weight:700}
  .genres{display:flex; flex-wrap:wrap; gap:16px; margin:12px 0 24px}
  .genres span{color:var(--accent); font-weight:700; font-size:17px}

  .cta{
    background:var(--accent); color:#12101f; font-weight:900; border-radius:40px;
    padding:14px 28px; display:inline-block; font-size:18px; box-shadow:0 5px 22px #00ffe766; text-decoration:none;
  }

  .thumbs{
    display:flex; gap:14px; justify-content:flex-start; align-items:flex-end; flex-wrap:nowrap;
  }
  .thumb{
    width:88px; aspect-ratio:11/15; border-radius:12px; overflow:hidden; box-shadow:0 4px 16px #000;
    padding:0; border:none; background:#00000055; cursor:pointer; transition:transform .25s, box-shadow .25s, outline .25s;
    outline:2px solid transparent;
  }
  .thumb img{width:100%; height:100%; object-fit:cover; display:block}
  .thumb:hover{transform:translateY(-3px); box-shadow:0 8px 24px #000}
  .thumb.active{outline-color:var(--accent); box-shadow:0 6px 22px #00ffe799}

  /* Tablet */
  @media (min-width:600px){
    .logo span{font-size:46px}
    .hero-grid{grid-template-columns:1.1fr .9fr; gap:24px}
    .hero-info h1{font-size:44px}
    .meta{font-size:17px}
    .genres span{font-size:18px}
    .cta{font-size:19px; padding:16px 34px}
    .thumb{width:92px}
  }

  /* Desktop */
  @media (min-width:900px){
    .logo span{font-size:52px}
    .hero{padding:52px 32px; min-height:560px}
    .hero-grid{grid-template-columns:1.2fr .8fr; gap:26px; align-items:center}
    .hero-info h1{font-size:56px}
    .meta{font-size:19px}
    .genres{gap:20px}
    .genres span{font-size:20px}
    .cta{font-size:22px; padding:18px 48px}
    .thumbs{justify-content:flex-end}
    .thumb{width:98px}
  }

  /* Small phones */
  @media (max-width:360px){
    .hero-info h1{font-size:32px}
    .thumb{width:78px}
  }
</style>

<script>
  const seriesData = [
    {
      bg: "url('https://cdn.wallpapersafari.com/21/4/MPDXwo.jpg')",
      title: "Ben 10 Classic",
      meta: "<span class='rating'><i class='fa fa-star'></i> 9.1</span><span class='sep'>2005</span><span class='sep'>24m</span>",
      genres: ["Action","Adventure","Cartoon"]
    },
    {
      bg: "url('https://www.hdwallpapers.in/download/izuku_midoriya_katsuki_bakugou_shoto_todoroki_hd_my_hero_academia_4-1366x768.jpg')",
      title: "My Hero Academia",
      meta: "<span class='rating'><i class='fa fa-star'></i> 9.6</span><span class='sep'>2016</span><span class='sep'>24m</span>",
      genres: [" Super Power","School","Action"]
    },
    {
      bg: "url('https://images2.alphacoders.com/124/thumb-1920-1248400.png')",
      title: "Black Clover",
      meta: "<span class='rating'><i class='fa fa-star'></i> 9.5</span><span class='sep'>2017</span><span class='sep'>23m</span>",
      genres: ["Fantasy","Adventure","Anime"]
    }
  ];

  function loadSeries(index) {
    const hero = document.getElementById("heroSlider");
    const title = document.getElementById("seriesTitle");
    const meta = document.getElementById("seriesMeta");
    const genres = document.getElementById("seriesGenres");
    const thumbs = document.querySelectorAll(".thumb");

    hero.style.background = `linear-gradient(95deg,#12101f 50%,#43beef22 100%),${seriesData[index].bg}`;
    title.textContent = seriesData[index].title;
    meta.innerHTML = seriesData[index].meta;
    genres.innerHTML = seriesData[index].genres.map(g=>`<span>${g}</span>`).join("");

    thumbs.forEach(t=>t.classList.remove("active"));
    if (thumbs[index]) thumbs[index].classList.add("active");
  }

  // Set initial active state
  document.addEventListener("DOMContentLoaded", ()=> loadSeries(0));
</script>



<!-- SEARCH BAR BELOW BANNER -->
<div class="search-wrapper">
    <form class="search-bar" method="get" action="<?php echo home_url('/'); ?>">
        <input type="text" name="s" placeholder="Search Anime, Cartoons, Movies..." required>
        <button type="submit"><img src="https://img.icons8.com/ios-filled/50/ffffff/search--v1.png"></button>
    </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
var swiper = new Swiper(".hero-slider", {
    loop: true,
    autoplay: { delay: 3000 },
    speed: 800,
    spaceBetween: 10,
});
</script>




<!-- =================== ANIME SECTION =================== -->
<div class="section-container">
    <h2 class="section-title">Anime</h2>
    <div class="grid">
    <?php
    $anime = new WP_Query([
        'post_type' => 'post',
        'posts_per_page' => 6,
        'category_name' => 'anime'
    ]);
    if($anime->have_posts()):
        while($anime->have_posts()): $anime->the_post(); 
        $year = get_post_meta(get_the_ID(), 'year', true) ?: date('Y', strtotime(get_the_date())); ?>
        
        <div class="card">
            <a href="<?php the_permalink(); ?>">
                <div class="card-image-wrapper">
                    <?php if(has_post_thumbnail()): ?>
                        <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
                    <?php else: ?>
                        <div style="width:100%; height:100%; background: linear-gradient(135deg, #a676ff, #6c5ce7); display:flex; align-items:center; justify-content:center; color:#fff;">No Image</div>
                    <?php endif; ?>
                </div>
                <div class="card-content">
                    <div class="card-title"><?php the_title(); ?></div>
                    <div class="card-year"><?php echo esc_html($year); ?></div>
                </div>
            </a>
        </div>

    <?php endwhile; endif; 
    
    if($anime->found_posts > 6): ?>
        <div class="view-all-btn-wrapper" style="grid-column: 1/-1;">
           <a href="<?php echo site_url('/anime');  ?>" class="view-all-btn">View All Anime</a>
        </div>
    <?php endif;
    wp_reset_query(); ?>
    </div>
</div>



<!-- =================== CARTOON SECTION =================== -->
<div class="section-container">
    <h2 class="section-title">Cartoon</h2>
    <div class="grid">
    <?php
    $cartoon = new WP_Query([
        'post_type' => 'post',
        'posts_per_page' => 6,
        'category_name' => 'cartoon'
    ]);
    if($cartoon->have_posts()):
        while($cartoon->have_posts()): $cartoon->the_post(); 
        $year = get_post_meta(get_the_ID(), 'year', true) ?: date('Y', strtotime(get_the_date())); ?>

        <div class="card">
            <a href="<?php the_permalink(); ?>">
                <div class="card-image-wrapper">
                    <?php if(has_post_thumbnail()): ?>
                        <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
                    <?php else: ?>
                        <div style="width:100%; height:100%; background: linear-gradient(135deg, #a676ff, #6c5ce7); display:flex; align-items:center; justify-content:center; color:#fff;">No Image</div>
                    <?php endif; ?>
                </div>
                <div class="card-content">
                    <div class="card-title"><?php the_title(); ?></div>
                    <div class="card-year"><?php echo esc_html($year); ?></div>
                </div>
            </a>
        </div>

    <?php endwhile; endif; 
    
    if($cartoon->found_posts > 6): ?>
        <div class="view-all-btn-wrapper" style="grid-column: 1/-1;">
             <a href="<?php echo site_url('/cartoon');  ?>" class="view-all-btn">View All Cartoons</a>
        </div>
    <?php endif;
    wp_reset_query(); ?>
    </div>
</div>




<!-- =================== MOVIES SECTION =================== -->
<div class="section-container">
    <h2 class="section-title">Movies</h2>
    <div class="grid">
    <?php
    $movies = new WP_Query([
        'post_type' => 'post',
        'posts_per_page' => 6,
        'category_name' => 'movies'
    ]);
    if($movies->have_posts()):
        while($movies->have_posts()): $movies->the_post(); 
        $year = get_post_meta(get_the_ID(), 'year', true) ?: date('Y', strtotime(get_the_date())); ?>

        <div class="card">
            <a href="<?php the_permalink(); ?>">
                <div class="card-image-wrapper">
                    <?php if(has_post_thumbnail()): ?>
                        <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
                    <?php else: ?>
                        <div style="width:100%; height:100%; background: linear-gradient(135deg, #a676ff, #6c5ce7); display:flex; align-items:center; justify-content:center; color:#fff;">No Image</div>
                    <?php endif; ?>
                </div>
                <div class="card-content">
                    <div class="card-title"><?php the_title(); ?></div>
                    <div class="card-year"><?php echo esc_html($year); ?></div>
                </div>
            </a>
        </div>

    <?php endwhile; endif; 
    
    if($movies->found_posts > 6): ?>
        <div class="view-all-btn-wrapper" style="grid-column: 1/-1;">
           <a href="<?php echo site_url('/movies'); ?>" class="view-all-btn">View All Movies</a>
        </div>
    <?php endif;
    wp_reset_query(); ?>
    </div>
</div>




<!-- =================== HINDI DUB SECTION =================== -->
<div class="section-container">
    <h2 class="section-title">Hindi Dub</h2>
    <div class="grid">
    <?php
    $hindi = new WP_Query([
        'post_type' => 'post',
        'posts_per_page' => 6,
        'category_name' => 'hindi-dub'
    ]);
    if($hindi->have_posts()):
        while($hindi->have_posts()): $hindi->the_post(); 
        $year = get_post_meta(get_the_ID(), 'year', true) ?: date('Y', strtotime(get_the_date())); ?>

        <div class="card">
            <a href="<?php the_permalink(); ?>">
                <div class="card-image-wrapper">
                    <?php if(has_post_thumbnail()): ?>
                        <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
                    <?php else: ?>
                        <div style="width:100%; height:100%; background: linear-gradient(135deg, #a676ff, #6c5ce7); display:flex; align-items:center; justify-content:center; color:#fff;">No Image</div>
                    <?php endif; ?>
                </div>
                <div class="card-content">
                    <div class="card-title"><?php the_title(); ?></div>
                    <div class="card-year"><?php echo esc_html($year); ?></div>
                </div>
            </a>
        </div>

    <?php endwhile; endif; 
    
    if($hindi->found_posts > 6): ?>
        <div class="view-all-btn-wrapper" style="grid-column: 1/-1;">
           <a href="<?php echo site_url('/hindi-dub');  ?>" class="view-all-btn">View All Hindi Dub</a>
        </div>
    <?php endif;
    wp_reset_query(); ?>
    </div>
</div>




<!-- =================== TAMIL SECTION =================== -->
<div class="section-container">
    <h2 class="section-title">Tamil</h2>
    <div class="grid">
    <?php
    $tamil = new WP_Query([
        'post_type' => 'post',
        'posts_per_page' => 6,
        'category_name' => 'tamil'
    ]);
    if($tamil->have_posts()):
        while($tamil->have_posts()): $tamil->the_post(); 
        $year = get_post_meta(get_the_ID(), 'year', true) ?: date('Y', strtotime(get_the_date())); ?>

        <div class="card">
            <a href="<?php the_permalink(); ?>">
                <div class="card-image-wrapper">
                    <?php if(has_post_thumbnail()): ?>
                        <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
                    <?php else: ?>
                        <div style="width:100%; height:100%; background: linear-gradient(135deg, #a676ff, #6c5ce7); display:flex; align-items:center; justify-content:center; color:#fff;">No Image</div>
                    <?php endif; ?>
                </div>
                <div class="card-content">
                    <div class="card-title"><?php the_title(); ?></div>
                    <div class="card-year"><?php echo esc_html($year); ?></div>
                </div>
            </a>
        </div>

    <?php endwhile; endif; 
    
    if($tamil->found_posts > 6): ?>
        <div class="view-all-btn-wrapper" style="grid-column: 1/-1;">
           <a href="<?php echo site_url('/tamil');  ?>" class="view-all-btn">View All Tamil</a>
        </div>
    <?php endif;
    wp_reset_query(); ?>
    </div>
</div>




<!-- =================== TELUGU SECTION =================== -->
<div class="section-container">
    <h2 class="section-title">Telugu</h2>
    <div class="grid">
    <?php
    $telugu = new WP_Query([
        'post_type' => 'post',
        'posts_per_page' => 6,
        'category_name' => 'telugu'
    ]);
    if($telugu->have_posts()):
        while($telugu->have_posts()): $telugu->the_post(); 
        $year = get_post_meta(get_the_ID(), 'year', true) ?: date('Y', strtotime(get_the_date())); ?>

        <div class="card">
            <a href="<?php the_permalink(); ?>">
                <div class="card-image-wrapper">
                    <?php if(has_post_thumbnail()): ?>
                        <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
                    <?php else: ?>
                        <div style="width:100%; height:100%; background: linear-gradient(135deg, #a676ff, #6c5ce7); display:flex; align-items:center; justify-content:center; color:#fff;">No Image</div>
                    <?php endif; ?>
                </div>
                <div class="card-content">
                    <div class="card-title"><?php the_title(); ?></div>
                    <div class="card-year"><?php echo esc_html($year); ?></div>
                </div>
            </a>
        </div>

    <?php endwhile; endif; 
    
    if($telugu->found_posts > 6): ?>
        <div class="view-all-btn-wrapper" style="grid-column: 1/-1;">
           <a href="<?php echo site_url('/telugu');  ?>" class="view-all-btn">View All Telugu</a>
        </div>
    <?php endif;
    wp_reset_query(); ?>
    </div>
</div>

<?php get_footer(); ?>