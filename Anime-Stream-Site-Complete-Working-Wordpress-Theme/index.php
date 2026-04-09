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

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background: linear-gradient(135deg, #0f0c29 0%, #302b63 50%, #24243e 100%);
    min-height: 100vh;
    font-family: 'Poppins', sans-serif;
    color: #fff;
}

main {
    width: 100%;
    max-width: 1400px;
    margin: 0 auto;
    padding: 60px 20px 40px;
}

/* Animated Background Particles */
.particles {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
    overflow: hidden;
    pointer-events: none;
}

.particle {
    position: absolute;
    width: 4px;
    height: 4px;
    background: rgba(255, 223, 0, 0.3);
    border-radius: 50%;
    animation: float 15s infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0) translateX(0); opacity: 0; }
    10% { opacity: 1; }
    90% { opacity: 1; }
    100% { transform: translateY(-100vh) translateX(50px); opacity: 0; }
}

/* Hero Section */
.search-hero {
    text-align: center;
    margin: 40px 0 60px;
}

.search-hero-title {
    font-size: 56px;
    font-weight: 900;
    background: linear-gradient(135deg, #ffdf00 0%, #ff8c00 50%, #ffdf00 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 15px;
    text-transform: uppercase;
    letter-spacing: 2px;
    animation: glow 2s ease-in-out infinite;
}

@keyframes glow {
    0%, 100% { filter: brightness(1); }
    50% { filter: brightness(1.3); }
}

.search-hero-subtitle {
    font-size: 18px;
    color: rgba(255, 255, 255, 0.8);
    font-weight: 400;
    margin-bottom: 30px;
}

/* Search Bar Styles */
.search-bar {
    text-align: center;
    margin: 40px auto 50px;
    padding: 0 20px;
    position: relative;
}

.search-wrapper {
    position: relative;
    max-width: 800px;
    margin: 0 auto;
    display: flex;
    gap: 15px;
    align-items: center;
}

.search-icon {
    position: absolute;
    left: 25px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 22px;
    z-index: 10;
    color: #ffdf00;
}

.search-bar input {
    flex: 1;
    padding: 20px 30px 20px 65px;
    font-size: 17px;
    border-radius: 50px;
    border: 3px solid rgba(255, 223, 0, 0.4);
    background: rgba(0, 0, 0, 0.5);
    color: #fff;
    font-family: 'Poppins', sans-serif;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
}

.search-bar input:focus {
    outline: none;
    border-color: #ffdf00;
    background: rgba(0, 0, 0, 0.7);
    box-shadow: 0 0 30px rgba(255, 223, 0, 0.4);
    transform: translateY(-2px);
}

.search-bar input::placeholder {
    color: rgba(255, 255, 255, 0.6);
}

.search-submit {
    padding: 20px 50px;
    background: linear-gradient(135deg, #ffdf00 0%, #ffed4e 100%);
    color: #000;
    border: none;
    border-radius: 50px;
    font-weight: 800;
    font-size: 15px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 10px 30px rgba(255, 223, 0, 0.3);
    text-transform: uppercase;
    letter-spacing: 1.5px;
    white-space: nowrap;
    font-family: 'Poppins', sans-serif;
}

.search-submit:hover {
    transform: translateY(-3px) scale(1.02);
    box-shadow: 0 15px 40px rgba(255, 223, 0, 0.5);
    background: linear-gradient(135deg, #fff 0%, #ffdf00 100%);
}

/* Visit Button */
.visit-button {
    display: inline-block;
    text-align: center;
    margin: 30px auto 50px;
    padding: 18px 50px;
    background: linear-gradient(135deg, #8b5cf6 0%, #a78bfa 100%);
    color: #fff;
    font-weight: 800;
    border-radius: 50px;
    text-decoration: none;
    font-size: 16px;
    transition: all 0.3s ease;
    box-shadow: 0 10px 30px rgba(139, 92, 246, 0.3);
    text-transform: uppercase;
    letter-spacing: 2px;
}

.visit-button:hover {
    transform: translateY(-5px) scale(1.05);
    box-shadow: 0 15px 40px rgba(139, 92, 246, 0.5);
}

/* Feature Cards */
.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin: 60px auto;
    padding: 0 20px;
    max-width: 1200px;
}

.feature-card {
    background: rgba(139, 92, 246, 0.1);
    border: 2px solid rgba(139, 92, 246, 0.3);
    border-radius: 20px;
    padding: 35px 30px;
    text-align: center;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.feature-card:hover {
    transform: translateY(-10px);
    border-color: rgba(139, 92, 246, 0.6);
    box-shadow: 0 15px 40px rgba(139, 92, 246, 0.3);
}

.feature-icon {
    font-size: 55px;
    margin-bottom: 20px;
    display: block;
}

.feature-card h3 {
    font-size: 24px;
    color: #a78bfa;
    margin-bottom: 15px;
    font-weight: 700;
}

.feature-card p {
    font-size: 16px;
    color: rgba(255, 255, 255, 0.75);
    line-height: 1.7;
}

/* Info Section */
.info-section {
    text-align: center;
    margin: 80px auto;
    max-width: 1000px;
    padding: 0 20px;
}

.info-card {
    background: rgba(255, 223, 0, 0.05);
    border: 2px solid rgba(255, 223, 0, 0.2);
    border-radius: 20px;
    padding: 45px 40px;
    margin-bottom: 40px;
    backdrop-filter: blur(10px);
    transition: all 0.3s ease;
}

.info-card:hover {
    border-color: rgba(255, 223, 0, 0.5);
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(255, 223, 0, 0.2);
}

.info-card h1 {
    font-size: 38px;
    font-weight: 800;
    background: linear-gradient(135deg, #ffdf00 0%, #fff 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 25px;
    text-transform: uppercase;
    letter-spacing: 1px;
    line-height: 1.3;
}

.info-card p {
    font-size: 17px;
    line-height: 1.9;
    color: rgba(255, 255, 255, 0.85);
    text-align: justify;
}

.info-card h2 {
    font-size: 32px;
    color: #ffdf00;
    margin-bottom: 20px;
    font-weight: 700;
}

/* Results Section */
.results-header {
    text-align: center;
    margin: 60px 0 40px;
}

.results-title {
    font-size: 48px;
    font-weight: 800;
    background: linear-gradient(135deg, #ffdf00 0%, #fff 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 10px;
    text-transform: uppercase;
    letter-spacing: 2px;
}

.results-count {
    font-size: 18px;
    color: rgba(255, 255, 255, 0.7);
    font-weight: 500;
}

/* Grid Styles */
.grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
    gap: 30px;
    margin: 50px auto;
    padding: 0 20px;
    max-width: 1400px;
}

.card {
    background: rgba(255, 223, 0, 0.05);
    border: 1px solid rgba(255, 223, 0, 0.15);
    border-radius: 20px;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    position: relative;
    backdrop-filter: blur(10px);
}

.card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(255, 223, 0, 0.1) 0%, transparent 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: 1;
    pointer-events: none;
}

.card:hover::before {
    opacity: 1;
}

.card:hover {
    transform: translateY(-15px);
    border-color: rgba(255, 223, 0, 0.4);
    box-shadow: 0 20px 50px rgba(255, 223, 0, 0.2);
}

.card a {
    text-decoration: none;
    display: block;
    height: 100%;
}

.card img {
    width: 100%;
    height: 280px;
    object-fit: cover;
    display: block;
    transition: transform 0.5s ease;
}

.card:hover img {
    transform: scale(1.1);
}

.card-title {
    padding: 20px;
    color: #ffdf00;
    font-weight: 700;
    font-size: 16px;
    text-align: center;
    line-height: 1.5;
    position: relative;
    z-index: 2;
}

/* No Results */
.no-results {
    text-align: center;
    margin: 100px 0;
    padding: 60px 40px;
    background: rgba(255, 223, 0, 0.05);
    border: 2px solid rgba(255, 223, 0, 0.2);
    border-radius: 20px;
    backdrop-filter: blur(10px);
}

.no-results-icon {
    font-size: 80px;
    margin-bottom: 20px;
}

.no-results h3 {
    font-size: 32px;
    color: #ffdf00;
    margin-bottom: 15px;
    font-weight: 700;
}

.no-results p {
    font-size: 18px;
    color: rgba(255, 255, 255, 0.7);
}

.no-results strong {
    color: #ffdf00;
    font-weight: 700;
}

/* Responsive */
/* Responsive */
@media (max-width: 1024px) {
    main {
        padding: 50px 15px 30px;
    }
    
    .search-bar input {
        padding: 18px 25px 18px 60px;
        font-size: 16px;
    }
    
    .search-submit {
        padding: 18px 40px;
        font-size: 14px;
    }
    
    .features-grid {
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
        margin: 50px auto;
    }
    
    .grid {
        grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
        gap: 25px;
    }
    
    .info-card {
        padding: 35px 30px;
    }
    
    .info-card h1 {
        font-size: 32px;
    }
    
    .info-card h2 {
        font-size: 28px;
    }
    
    .info-card p {
        font-size: 16px;
    }
    
    .results-title {
        font-size: 36px;
    }
}

@media (max-width: 768px) {
    main {
        padding: 40px 15px 30px;
    }
    
    .search-bar {
        margin: 30px auto 40px;
        padding: 0 15px;
    }
    
    .search-wrapper {
        flex-direction: column;
        gap: 15px;
    }
    
    .search-icon {
        left: 20px;
        font-size: 20px;
    }
    
    .search-bar input {
        padding: 16px 20px 16px 55px;
        font-size: 15px;
        width: 100%;
    }
    
    .search-submit {
        width: 100%;
        padding: 16px 30px;
        font-size: 14px;
    }
    
    .visit-button {
        padding: 16px 40px;
        font-size: 15px;
        margin: 25px auto 40px;
    }
    
    .features-grid {
        grid-template-columns: 1fr;
        gap: 20px;
        margin: 40px auto;
        padding: 0 15px;
    }
    
    .feature-card {
        padding: 30px 25px;
    }
    
    .feature-icon {
        font-size: 50px;
    }
    
    .feature-card h3 {
        font-size: 22px;
    }
    
    .feature-card p {
        font-size: 15px;
    }
    
    .info-section {
        margin: 60px auto;
        padding: 0 15px;
    }
    
    .info-card {
        padding: 30px 25px;
        margin-bottom: 30px;
    }
    
    .info-card h1 {
        font-size: 28px;
        letter-spacing: 0.5px;
    }
    
    .info-card h2 {
        font-size: 24px;
    }
    
    .info-card p {
        font-size: 15px;
        line-height: 1.8;
    }
    
    .grid {
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 20px;
        padding: 0 15px;
    }
    
    .card img {
        height: 220px;
    }
    
    .card-title {
        font-size: 15px;
        padding: 18px;
    }
    
    .results-title {
        font-size: 32px;
    }
    
    .results-count {
        font-size: 16px;
    }
    
    .no-results {
        padding: 50px 30px;
        margin: 80px 15px;
    }
    
    .no-results-icon {
        font-size: 70px;
    }
    
    .no-results h3 {
        font-size: 28px;
    }
    
    .no-results p {
        font-size: 16px;
    }
}

@media (max-width: 480px) {
    main {
        padding: 30px 10px 20px;
    }
    
    .search-bar {
        margin: 20px auto 30px;
        padding: 0 10px;
    }
    
    .search-icon {
        left: 15px;
        font-size: 18px;
    }
    
    .search-bar input {
        padding: 14px 18px 14px 50px;
        font-size: 14px;
    }
    
    .search-submit {
        padding: 14px 25px;
        font-size: 13px;
        letter-spacing: 1px;
    }
    
    .visit-button {
        padding: 14px 35px;
        font-size: 14px;
        letter-spacing: 1.5px;
        margin: 20px auto 30px;
    }
    
    .features-grid {
        gap: 15px;
        margin: 30px auto;
        padding: 0 10px;
    }
    
    .feature-card {
        padding: 25px 20px;
    }
    
    .feature-icon {
        font-size: 45px;
        margin-bottom: 15px;
    }
    
    .feature-card h3 {
        font-size: 20px;
        margin-bottom: 12px;
    }
    
    .feature-card p {
        font-size: 14px;
    }
    
    .info-section {
        margin: 50px auto;
        padding: 0 10px;
    }
    
    .info-card {
        padding: 25px 20px;
        margin-bottom: 25px;
    }
    
    .info-card h1 {
        font-size: 24px;
        margin-bottom: 20px;
    }
    
    .info-card h2 {
        font-size: 22px;
        margin-bottom: 15px;
    }
    
    .info-card p {
        font-size: 14px;
        line-height: 1.7;
    }
    
    .grid {
        grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
        gap: 15px;
        padding: 0 10px;
        margin: 40px auto;
    }
    
    .card img {
        height: 200px;
    }
    
    .card-title {
        font-size: 14px;
        padding: 15px;
    }
    
    .results-header {
        margin: 40px 0 30px;
        padding: 0 10px;
    }
    
    .results-title {
        font-size: 28px;
    }
    
    .results-count {
        font-size: 15px;
    }
    
    .no-results {
        padding: 40px 20px;
        margin: 60px 10px;
    }
    
    .no-results-icon {
        font-size: 60px;
    }
    
    .no-results h3 {
        font-size: 24px;
    }
    
    .no-results p {
        font-size: 15px;
    }
}

@media (max-width: 360px) {
    .grid {
        grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
        gap: 12px;
    }
    
    .card img {
        height: 180px;
    }
    
    .card-title {
        font-size: 13px;
        padding: 12px;
    }
    
    .info-card h1 {
        font-size: 22px;
    }
    
    .info-card h2 {
        font-size: 20px;
    }
    
    .feature-card h3 {
        font-size: 18px;
    }
}
.tg-join-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;

    background: linear-gradient(135deg, #00a7ff, #007bff);
    color: #fff;

    padding: 12px 25px;
    border-radius: 999px;

    font-size: 15px;
    font-weight: 600;
    text-decoration: none;

    transition: 0.25s ease;
    box-shadow: 0 8px 20px rgba(0, 153, 255, 0.35);

    position: relative;
}

/* Hover Effect */
.tg-join-btn:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 24px rgba(0, 153, 255, 0.45);
    filter: brightness(1.05);
}

/* Icon Fix */
.tg-icon {
    width: 18px;
    height: 18px;
    fill: #ffffff !important;
    flex-shrink: 0;
}

/* Center Button (important for your layout) */
.tg-button-wrapper {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}
/* Search Result Container Fix */
.search-results {
    display: flex;
    flex-direction: column;
    gap: 15px;
    width: 100%;
}

/* Each Item Fix */
.search-item {
    display: flex;
    align-items: center;
    gap: 12px;
    background: #1b1f3a;
    padding: 12px;
    border-radius: 10px;
    width: 100%;
}

/* Thumbnail Fix */
.search-item img {
    width: 85px;
    height: 120px;
    object-fit: cover;
    border-radius: 8px;
}

/* Title Fix */
.search-item .title {
    font-size: 15px;
    color: #fff;
    font-weight: 600;
    line-height: 20px;
}

/* Mobile Responsive */
@media (max-width: 600px) {
    .search-item {
        flex-direction: row;
        align-items: flex-start;
    }

    .search-item img {
        width: 70px;
        height: 100px;
    }

    .search-item .title {
        font-size: 14px;
    }
}



</style>

<main>

<!-- Animated Particles Background -->
<div class="particles">
    <?php for($i = 0; $i < 20; $i++): 
        $left = rand(0, 100);
        $delay = rand(0, 5);
        $duration = rand(10, 20);
    ?>
        <div class="particle" style="left: <?php echo $left; ?>%; animation-delay: <?php echo $delay; ?>s; animation-duration: <?php echo $duration; ?>s;"></div>
    <?php endfor; ?>
</div>

<?php 
$is_search = isset($_GET['s']) && !empty($_GET['s']);
if(!$is_search): 
?>

<!-- NON-SEARCH PAGE CONTENT -->

<!-- SEARCH BAR -->
<form method="GET" class="search-bar" action="">
    <div class="search-wrapper">
        <span class="search-icon"></span>
        <input type="text" name="s" placeholder="Search anime, cartoon, movie..." value="<?php echo esc_attr(get_search_query()); ?>" autocomplete="off" required>
        <button type="submit" class="search-submit">SEARCH</button>
    </div>
</form>

<!-- VISIT BUTTON -->
<div style="text-align: center;">
    <a class="visit-button" href="<?php echo site_url('/home'); ?>">🏠 VISIT HOMEPAGE</a>
</div>
<div class="tg-button-wrapper">
    <a id="tgSmartBtn" class="tg-join-btn" 
       href="https://t.me/YOUR_CHANNEL" 
       target="_blank" rel="noopener noreferrer">
       
       <svg class="tg-icon" viewBox="0 0 240 240">
           <path fill="#fff" d="M120 0c66 0 120 54 120 120s-54 120-120 120S0 186 0 120 54 0 120 0z"/>
           <path fill="#0088cc" d="M53 120l136-55c9-3 9 6 3 10L88 141l-8 43c-1 6 8 9 12 4L152 132"/>
       </svg>

       Join on Telegram
    </a>
</div>


<!-- FEATURES SECTION -->
<div class="features-grid">
    <div class="feature-card">
        <div class="feature-icon">🌐</div>
        <h3>Multi-Language</h3>
        <p>Watch anime in Hindi, Tamil, and Telugu dubs</p>
    </div>
    
    <div class="feature-card">
        <div class="feature-icon">⚡</div>
        <h3>Fast Streaming</h3>
        <p>High-speed servers for buffer-free experience</p>
    </div>
    
    <div class="feature-card">
        <div class="feature-icon">🆓</div>
        <h3>100% Free</h3>
        <p>No subscription, no hidden charges</p>
    </div>
</div>

<!-- INFO SECTION -->
<section class="info-section">
    <div class="info-card">
        <h1>AnimeFlow - Watch Anime Online in Hindi Dub for FREE</h1>
        <p>
            In late 2025, realizing the scarcity of user-friendly platforms offering Hindi, Tamil, and Telugu-dubbed anime, we embarked on creating AnimeFlow. Our mission is to provide anime enthusiasts with a seamless streaming experience, offering a vast library of anime titles in their preferred language, completely free of cost.
        </p>
    </div>

    <div class="info-card">
        <h2>📺 What's AnimeFlow?</h2>
        <p>
            AnimeFlow stands as a haven for anime enthusiasts, offering a diverse array of anime titles dubbed in Hindi, Tamil, and Telugu. We understand the growing demand for regional language content and strive to bridge the gap by providing high-quality anime streaming services. Whether you're a seasoned otaku or a newcomer to the anime world, AnimeFlow has something special for everyone.
        </p>
    </div>

    <div class="info-card">
        <h2>🔒 Is AnimeFlow Safe?</h2>
        <p>
            Absolutely. Safety is paramount to us. We employ robust security measures to ensure your browsing experience is secure and private. Our platform is regularly updated to protect against potential threats, and we never ask for personal information beyond what's necessary for basic functionality. Your safety and privacy are our top priorities.
        </p>
    </div>

    <div class="info-card">
        <p style="text-align: center; font-size: 16px; color: rgba(255, 255, 255, 0.6);">
            ⚠️ <strong>Disclaimer:</strong> AnimeFlow does not store any files on own server, We only index links from internet which are hosted on third-party services. We Index Links Just Like Google.
        </p>
    </div>
    
</section>

<?php else: ?>

<!-- SEARCH RESULTS SECTION -->
<div class="results-header">
    <h2 class="results-title"> Search Results</h2>
    <p class="results-count">Showing results for: <strong style="color: #ffdf00;">"<?php echo esc_html($_GET['s']); ?>"</strong></p>
</div>

<div class="grid">
<?php
$search = sanitize_text_field($_GET['s']);

// MAIN SEARCH QUERY
$args = [
    'post_type'      => 'post',
    'posts_per_page' => 30,
    'orderby'        => 'date',
    'order'          => 'DESC',
    's' => $search,
    'meta_query' => [
        'relation' => 'OR',
        [
            'key'     => 'genre',
            'value'   => $search,
            'compare' => 'LIKE'
        ],
        [
            'key'     => 'year',
            'value'   => $search,
            'compare' => 'LIKE'
        ]
    ]
];

$results = new WP_Query($args);

if($results->have_posts()) {
    while($results->have_posts()) {
        $results->the_post(); ?>
        
        <div class="card">
            <a href="<?php the_permalink(); ?>">
                <?php if(has_post_thumbnail()): ?>
                    <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
                <?php else: ?>
                    <img src="https://via.placeholder.com/300x400/302b63/ffdf00?text=No+Image" alt="No Image">
                <?php endif; ?>
                <div class="card-title"><?php the_title(); ?></div>
            </a>
        </div>
        
    <?php }
} else { ?>
    <div class="no-results" style="grid-column: 1 / -1;">
        <div class="no-results-icon"></div>
        <h3>No Results Found</h3>
        <p>Sorry, we couldn't find any results for <strong>"<?php echo esc_html($search); ?>"</strong></p>
        <p style="margin-top: 15px;">Try searching with different keywords or browse our <a href="<?php echo site_url('/home'); ?>" style="color: #ffdf00; font-weight: 700;">homepage</a></p>
    </div>
<?php }

wp_reset_postdata();
?>
</div>

<?php endif; ?>

</main>

<?php get_footer(); ?>