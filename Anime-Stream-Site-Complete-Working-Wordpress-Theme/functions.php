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

/* --------------------------------------------------
   SEARCH FUNCTIONALITY
-------------------------------------------------- */
add_filter('posts_search', function($search, $wp_query) {
    global $wpdb;

    if (!empty($wp_query->query_vars['s'])) {
        $search_term = $wpdb->esc_like($wp_query->query_vars['s']);
        $search = " AND ($wpdb->posts.post_title LIKE '%$search_term%' 
                        OR $wpdb->posts.post_content LIKE '%$search_term%')";
    }

    return $search;
}, 20, 2);


/* --------------------------------------------------
   Load Theme CSS and Fonts
-------------------------------------------------- */
function animeflow_enqueue_styles() {
    wp_enqueue_style('google-fonts-poppins', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap', array(), null);
    wp_enqueue_style('animeflow-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'animeflow_enqueue_styles');


/* --------------------------------------------------
   Theme Features
-------------------------------------------------- */
function animeflow_setup() {
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    
    add_image_size('anime-thumbnail', 360, 500, true);
    add_image_size('episode-thumbnail', 80, 60, true);
    add_image_size('season-thumbnail', 80, 80, true);
}
add_action('after_setup_theme', 'animeflow_setup');


/* --------------------------------------------------
   CUSTOM URL ROUTING (NO WORDPRESS PAGES REQUIRED)
-------------------------------------------------- */
function animeflow_custom_rewrite_rules() {
    add_rewrite_rule('^anime/?$', 'index.php?custom_page=anime', 'top');
    add_rewrite_rule('^cartoon/?$', 'index.php?custom_page=cartoon', 'top');
    add_rewrite_rule('^hindi-dub/?$', 'index.php?custom_page=hindi-dub', 'top');
    add_rewrite_rule('^tamil/?$', 'index.php?custom_page=tamil', 'top');
    add_rewrite_rule('^telugu/?$', 'index.php?custom_page=telugu', 'top');
    add_rewrite_rule('^movies/?$', 'index.php?custom_page=movies', 'top');
    add_rewrite_rule('^credits/?$', 'index.php?custom_page=credits', 'top');
    add_rewrite_rule('^privacy-policy/?$', 'index.php?custom_page=privacy-policy', 'top');
    add_rewrite_rule('^contact-us/?$', 'index.php?custom_page=contact-us', 'top');
    add_rewrite_rule('^dmca/?$', 'index.php?custom_page=dmca', 'top');
    add_rewrite_rule('^home/?$', 'index.php?custom_page=home', 'top');
}
add_action('init', 'animeflow_custom_rewrite_rules');


/* --------------------------------------------------
   REGISTER CUSTOM QUERY VAR
-------------------------------------------------- */
function animeflow_query_vars($vars) {
    $vars[] = 'custom_page';
    return $vars;
}
add_filter('query_vars', 'animeflow_query_vars');


/* --------------------------------------------------
   TEMPLATE REDIRECT FOR CUSTOM PAGES
-------------------------------------------------- */
function animeflow_template_redirect() {
    $page = get_query_var('custom_page');

    if ($page === 'anime') {
        include get_template_directory() . '/anime.php';
        exit;
    }
    if ($page === 'cartoon') {
        include get_template_directory() . '/cartoon.php';
        exit;
    }
    if ($page === 'hindi-dub') {
        include get_template_directory() . '/hindi-dub.php';
        exit;
    }
    if ($page === 'tamil') {
        include get_template_directory() . '/tamil.php';
        exit;
    }
    if ($page === 'telugu') {
        include get_template_directory() . '/telugu.php';
        exit;
    }
    if ($page === 'movies') {
        include get_template_directory() . '/movies.php';
        exit;
    }
    if ($page === 'credits') {
        include get_template_directory() . '/credits.php';
        exit;
    }
    if ($page === 'privacy-policy') {
        include get_template_directory() . '/privacy-policy.php';
        exit;
    }
    if ($page === 'contact-us') {
        include get_template_directory() . '/contact-us.php';
        exit;
    }
    if ($page === 'dmca') {
        include get_template_directory() . '/dmca.php';
        exit;
    }
    if ($page === 'home') {
        include get_template_directory() . '/home-page.php';
        exit;
    }
}
add_action('template_redirect', 'animeflow_template_redirect');


/* --------------------------------------------------
   AUTO CREATE CATEGORIES
-------------------------------------------------- */
function create_custom_anime_categories() {
    $categories = [
        'Anime',
        'Cartoon',
        'Movies',
        'Hindi Dub',
        'Tamil',
        'Telugu'
    ];

    foreach ($categories as $cat) {
        if (!term_exists($cat, 'category')) {
            wp_insert_term($cat, 'category');
        }
    }
}
add_action('init', 'create_custom_anime_categories');


/* --------------------------------------------------
   YEAR META BOX (BACKEND SELECT OPTION)
-------------------------------------------------- */
function animeflow_add_year_metabox() {
    add_meta_box(
        'animeflow_year',
        '📅 Select Year',
        'animeflow_year_callback',
        'post',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'animeflow_add_year_metabox');

function animeflow_year_callback($post) {
    $saved_year = get_post_meta($post->ID, 'year', true);
    wp_nonce_field('animeflow_year_nonce', 'animeflow_year_nonce_field');
    echo '<select name="animeflow_year" style="width:100%; padding:8px; margin-top:10px;">';
    echo '<option value="">Select Year</option>';
    for($y = date('Y'); $y >= 1980; $y--){
        echo '<option value="'.$y.'" '.selected($saved_year, $y, false).'>'.$y.'</option>';
    }
    echo '</select>';
}

function animeflow_save_year($post_id) {
    if (!isset($_POST['animeflow_year_nonce_field']) || !wp_verify_nonce($_POST['animeflow_year_nonce_field'], 'animeflow_year_nonce')) {
        return;
    }
    
    if(isset($_POST['animeflow_year'])){
        update_post_meta($post_id, 'year', sanitize_text_field($_POST['animeflow_year']));
    }
}
add_action('save_post', 'animeflow_save_year');


/* --------------------------------------------------
   RATING META BOX (BACKEND INPUT)
-------------------------------------------------- */
function animeflow_add_rating_metabox() {
    add_meta_box(
        'animeflow_rating',
        '⭐ IMDb Rating (0-10)',
        'animeflow_rating_callback',
        'post',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'animeflow_add_rating_metabox');

function animeflow_rating_callback($post) {
    $saved_rating = get_post_meta($post->ID, 'rating', true);
    wp_nonce_field('animeflow_rating_nonce', 'animeflow_rating_nonce_field');
    
    echo '<input type="number" 
                 name="animeflow_rating" 
                 min="0" 
                 max="10" 
                 step="0.1" 
                 value="' . esc_attr($saved_rating) . '" 
                 placeholder="e.g., 9.6"
                 style="width:100%; padding:8px; margin-top:10px; font-size:16px;">';
    echo '<p style="margin-top:5px; color:#999; font-size:12px;">Enter rating between 0 and 10</p>';
}

function animeflow_save_rating($post_id) {
    if (!isset($_POST['animeflow_rating_nonce_field']) || !wp_verify_nonce($_POST['animeflow_rating_nonce_field'], 'animeflow_rating_nonce')) {
        return;
    }
    
    if (isset($_POST['animeflow_rating'])) {
        $rating = sanitize_text_field($_POST['animeflow_rating']);
        if ($rating !== '' && is_numeric($rating) && $rating >= 0 && $rating <= 10) {
            update_post_meta($post_id, 'rating', $rating);
        }
    }
}
add_action('save_post', 'animeflow_save_rating');


/* --------------------------------------------------
   MULTIPLE GENRE META BOX – CHECKBOX VERSION
-------------------------------------------------- */
function animeflow_add_genre_metabox() {
    add_meta_box(
        'animeflow_genre',
        '🎬 Select Multiple Genres',
        'animeflow_genre_callback',
        'post',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'animeflow_add_genre_metabox');

function animeflow_genre_callback($post) {
    $saved_genres = get_post_meta($post->ID, 'genre', true);
    if (!is_array($saved_genres)) {
        $saved_genres = [];
    }

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

    wp_nonce_field('animeflow_genre_nonce', 'animeflow_genre_nonce_field');
    echo '<p><strong>Select Genres (Multiple)</strong></p>';
    echo '<div style="max-height:250px; overflow-y:auto; border:1px solid #ddd; padding:8px; background:#f9f9f9;">';

    foreach ($genre_list as $g) {
        $slug = strtolower(str_replace([' & ',' ','/'], ['-','-','-'], $g));
        $checked = in_array($slug, $saved_genres) ? 'checked' : '';

        echo '<label style="display:block; margin-bottom:5px; cursor:pointer;">
                <input type="checkbox" name="animeflow_genre[]" value="'.$slug.'" '.$checked.'>
                ' . esc_html($g) . '
              </label>';
    }

    echo '</div>';
}

function animeflow_save_genre($post_id) {
    if (!isset($_POST['animeflow_genre_nonce_field']) || !wp_verify_nonce($_POST['animeflow_genre_nonce_field'], 'animeflow_genre_nonce')) {
        return;
    }
    
    if (isset($_POST['animeflow_genre'])) {
        $genres = array_map('sanitize_text_field', $_POST['animeflow_genre']);
        update_post_meta($post_id, 'genre', $genres);
    } else {
        delete_post_meta($post_id, 'genre');
    }
}
add_action('save_post', 'animeflow_save_genre');

?>
<?php

/* ============================================================
   EPISODE MANAGEMENT WITH 8 SERVERS & 8 DOWNLOADS PER EPISODE
============================================================ */

/* --------------------------------------------------
   1. Add Episode Meta Box in Post Editor
-------------------------------------------------- */
function add_episode_meta_box() {
    add_meta_box(
        'episode_meta_box',
        '📺 Episode Management With Servers & Downloads',
        'render_episode_meta_box',
        'post',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_episode_meta_box');

/* --------------------------------------------------
   2. Render Episode Meta Box Content
-------------------------------------------------- */
function render_episode_meta_box($post) {
    wp_nonce_field('save_episodes', 'episodes_nonce');
    
    $episodes = get_post_meta($post->ID, 'episodes', true);
    if (!is_array($episodes)) {
        $episodes = array();
    }
    ?>
    
    <div id="episodes-container">
        <style>
            .episode-main {
                background: #f9f9f9;
                padding: 20px;
                margin-bottom: 20px;
                border: 2px solid #0073aa;
                border-radius: 8px;
                position: relative;
            }
            .episode-main h4 {
                margin: 0 0 15px 0;
                color: #0073aa;
                font-size: 16px;
                font-weight: bold;
            }
            .episode-field {
                margin-bottom: 12px;
            }
            .episode-field label {
                display: block;
                font-weight: bold;
                margin-bottom: 5px;
                color: #333;
                font-size: 13px;
            }
            .episode-field input[type="text"],
            .episode-field input[type="number"],
            .episode-field textarea {
                width: 100%;
                padding: 8px;
                border: 1px solid #ddd;
                border-radius: 4px;
                font-family: inherit;
                box-sizing: border-box;
            }
            .episode-field textarea {
                height: 60px;
                resize: vertical;
            }
            .servers-section {
                background: #e8f4f8;
                padding: 15px;
                border: 1px solid #0073aa;
                border-radius: 4px;
                margin-top: 15px;
            }
            .servers-title {
                font-weight: bold;
                color: #0073aa;
                margin-bottom: 10px;
                font-size: 13px;
            }
            .server-row {
                display: grid;
                grid-template-columns: 120px 1fr;
                gap: 10px;
                margin-bottom: 10px;
                align-items: center;
            }
            .server-row label {
                margin: 0;
                font-weight: 600;
                font-size: 12px;
                color: #0073aa;
            }
            .server-row input {
                padding: 6px;
                font-size: 12px;
                border: 1px solid #0073aa;
            }
            .downloads-section {
                background: #f0f9e8;
                padding: 15px;
                border: 1px solid #28a745;
                border-radius: 4px;
                margin-top: 15px;
            }
            .downloads-title {
                font-weight: bold;
                color: #28a745;
                margin-bottom: 10px;
                font-size: 13px;
            }
            .download-row {
                display: grid;
                grid-template-columns: 120px 1fr;
                gap: 10px;
                margin-bottom: 10px;
                align-items: center;
            }
            .download-row label {
                margin: 0;
                font-weight: 600;
                font-size: 12px;
                color: #28a745;
            }
            .download-row input {
                padding: 6px;
                font-size: 12px;
                border: 1px solid #28a745;
            }
            .remove-episode {
                position: absolute;
                top: 15px;
                right: 15px;
                background: #dc3545;
                color: white;
                border: none;
                padding: 8px 15px;
                cursor: pointer;
                border-radius: 4px;
                font-weight: bold;
                font-size: 12px;
            }
            .remove-episode:hover {
                background: #c82333;
            }
            #add-episode {
                background: #28a745;
                color: white;
                border: none;
                padding: 12px 25px;
                cursor: pointer;
                border-radius: 5px;
                font-size: 15px;
                font-weight: bold;
                margin-top: 15px;
            }
            #add-episode:hover {
                background: #218838;
            }
            .episode-header {
                background: linear-gradient(135deg, #0073aa 0%, #005a87 100%);
                color: white;
                padding: 15px 20px;
                margin-bottom: 20px;
                border-radius: 5px;
            }
            .episode-header h3 {
                margin: 0;
                font-size: 16px;
            }
        </style>

        <div class="episode-header">
            <h3>📺 Add Episodes with Servers & Downloads</h3>
            <small>Each episode can have 8 streaming servers and 8 download links</small>
        </div>

        <div id="episode-list">
            <?php 
            if (!empty($episodes)) {
                foreach ($episodes as $index => $episode) {
                    render_episode_row_with_servers($index, $episode);
                }
            } else {
                render_episode_row_with_servers(0, array());
            }
            ?>
        </div>

        <button type="button" id="add-episode">➕ Add New Episode</button>
    </div>

    <script>
    jQuery(document).ready(function($) {
        let episodeIndex = <?php echo count($episodes); ?>;

        const serverNames = [
            'Server 1 (Vidstream)',
            'Server 2 (MyCloud)',
            'Server 3 (Hydrax)',
            'Server 4 (Vidmoly)',
            'Server 5 (OPlayer)',
            'Server 6 (Omega)',
            'Server 7 (MirrorBot)',
            'Server 8 (VidCloud)'
        ];

        const downloadNames = [
            'Download 1',
            'Download 2',
            'Download 3',
            'Download 4',
            'Download 5',
            'Download 6',
            'Download 7',
            'Download 8'
        ];

        function createServerFields(index) {
            let html = '<div class="servers-title">🎬 Streaming Servers (8)</div>';
            for (let i = 0; i < 8; i++) {
                html += `
                    <div class="server-row">
                        <label>${serverNames[i]}:</label>
                        <input type="text" name="episodes[${index}][servers][${i}]" placeholder="https://example.com/watch/episode-id" value="">
                    </div>
                `;
            }
            return '<div class="servers-section">' + html + '</div>';
        }

        function createDownloadFields(index) {
            let html = '<div class="downloads-title">📥 Download Links (8)</div>';
            for (let i = 0; i < 8; i++) {
                html += `
                    <div class="download-row">
                        <label>${downloadNames[i]}:</label>
                        <input type="text" name="episodes[${index}][downloads][${i}]" placeholder="https://example.com/download/episode" value="">
                    </div>
                `;
            }
            return '<div class="downloads-section">' + html + '</div>';
        }

        // Add new episode
        $('#add-episode').click(function() {
            const newEpisode = `
                <div class="episode-main" data-index="${episodeIndex}">
                    <button type="button" class="remove-episode">❌ Remove</button>
                    <h4>Episode ${episodeIndex + 1}</h4>
                    
                    <div class="episode-field">
                        <label>Season Number:</label>
                        <input type="number" name="episodes[${episodeIndex}][season]" value="1" min="1" required>
                    </div>
                    
                    <div class="episode-field">
                        <label>Episode Number:</label>
                        <input type="number" name="episodes[${episodeIndex}][episode_number]" value="${episodeIndex + 1}" min="1" required>
                    </div>
                    
                    <div class="episode-field">
                        <label>Episode Title:</label>
                        <input type="text" name="episodes[${episodeIndex}][title]" placeholder="Episode Title" required>
                    </div>
                    
                    <div class="episode-field">
                        <label>Episode Description (Optional):</label>
                        <textarea name="episodes[${episodeIndex}][description]" placeholder="Episode description"></textarea>
                    </div>

                    ${createServerFields(episodeIndex)}
                    ${createDownloadFields(episodeIndex)}
                </div>
            `;
            
            $('#episode-list').append(newEpisode);
            episodeIndex++;
        });

        // Remove episode
        $(document).on('click', '.remove-episode', function() {
            if (confirm('Are you sure you want to remove this episode?')) {
                $(this).closest('.episode-main').fadeOut(300, function() {
                    $(this).remove();
                });
            }
        });
    });
    </script>
    <?php
}

/* --------------------------------------------------
   3. Helper function to render episode row with servers & downloads
-------------------------------------------------- */
function render_episode_row_with_servers($index, $episode) {
    $season = isset($episode['season']) ? $episode['season'] : '1';
    $episode_number = isset($episode['episode_number']) ? $episode['episode_number'] : ($index + 1);
    $title = isset($episode['title']) ? $episode['title'] : '';
    $description = isset($episode['description']) ? $episode['description'] : '';
    $servers = isset($episode['servers']) ? $episode['servers'] : array_fill(0, 8, '');
    $downloads = isset($episode['downloads']) ? $episode['downloads'] : array_fill(0, 8, '');

    $serverNames = [
        'Server 1 (Vidstream)',
        'Server 2 (MyCloud)',
        'Server 3 (Hydrax)',
        'Server 4 (Vidmoly)',
        'Server 5 (OPlayer)',
        'Server 6 (Omega)',
        'Server 7 (MirrorBot)',
        'Server 8 (VidCloud)'
    ];

    $downloadNames = [
        'Download 1',
        'Download 2',
        'Download 3',
        'Download 4',
        'Download 5',
        'Download 6',
        'Download 7',
        'Download 8'
    ];
    ?>
    
    <div class="episode-main" data-index="<?php echo $index; ?>">
        <button type="button" class="remove-episode">❌ Remove</button>
        <h4>Episode <?php echo $index + 1; ?></h4>
        
        <div class="episode-field">
            <label>Season Number:</label>
            <input type="number" name="episodes[<?php echo $index; ?>][season]" value="<?php echo esc_attr($season); ?>" min="1" required>
        </div>
        
        <div class="episode-field">
            <label>Episode Number:</label>
            <input type="number" name="episodes[<?php echo $index; ?>][episode_number]" value="<?php echo esc_attr($episode_number); ?>" min="1" required>
        </div>
        
        <div class="episode-field">
            <label>Episode Title:</label>
            <input type="text" name="episodes[<?php echo $index; ?>][title]" value="<?php echo esc_attr($title); ?>" placeholder="Episode Title" required>
        </div>
        
        <div class="episode-field">
            <label>Episode Description (Optional):</label>
            <textarea name="episodes[<?php echo $index; ?>][description]" placeholder="Episode description"><?php echo esc_textarea($description); ?></textarea>
        </div>

        <!-- STREAMING SERVERS (8) -->
        <div class="servers-section">
            <div class="servers-title">🎬 Streaming Servers (8)</div>
            <?php for ($i = 0; $i < 8; $i++): ?>
                <div class="server-row">
                    <label><?php echo $serverNames[$i]; ?>:</label>
                    <input type="text" 
                           name="episodes[<?php echo $index; ?>][servers][<?php echo $i; ?>]" 
                           placeholder="https://example.com/watch/episode-id"
                           value="<?php echo esc_attr($servers[$i] ?? ''); ?>">
                </div>
            <?php endfor; ?>
        </div>

        <!-- DOWNLOAD LINKS (8) -->
        <div class="downloads-section">
            <div class="downloads-title">📥 Download Links (8)</div>
            <?php for ($i = 0; $i < 8; $i++): ?>
                <div class="download-row">
                    <label><?php echo $downloadNames[$i]; ?>:</label>
                    <input type="text" 
                           name="episodes[<?php echo $index; ?>][downloads][<?php echo $i; ?>]" 
                           placeholder="https://example.com/download/episode"
                           value="<?php echo esc_attr($downloads[$i] ?? ''); ?>">
                </div>
            <?php endfor; ?>
        </div>
    </div>
    
    <?php
}

/* --------------------------------------------------
   4. Save Episode Data with Servers & Downloads
-------------------------------------------------- */
function save_episode_data($post_id) {
    if (!isset($_POST['episodes_nonce']) || !wp_verify_nonce($_POST['episodes_nonce'], 'save_episodes')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['episodes']) && is_array($_POST['episodes'])) {
        $episodes = array();
        
        foreach ($_POST['episodes'] as $episode) {
            $servers = isset($episode['servers']) && is_array($episode['servers']) ? $episode['servers'] : array();
            $downloads = isset($episode['downloads']) && is_array($episode['downloads']) ? $episode['downloads'] : array();

            $clean_servers = array();
            foreach ($servers as $server) {
                $clean_servers[] = esc_url_raw($server);
            }

            $clean_downloads = array();
            foreach ($downloads as $download) {
                $clean_downloads[] = esc_url_raw($download);
            }

            $episodes[] = array(
                'season' => sanitize_text_field($episode['season']),
                'episode_number' => sanitize_text_field($episode['episode_number']),
                'title' => sanitize_text_field($episode['title']),
                'description' => sanitize_textarea_field($episode['description']),
                'servers' => $clean_servers,
                'downloads' => $clean_downloads
            );
        }
        
        update_post_meta($post_id, 'episodes', $episodes);
    } else {
        delete_post_meta($post_id, 'episodes');
    }
}
add_action('save_post', 'save_episode_data');

/* --------------------------------------------------
   5. Add Episode Count to Admin Columns
-------------------------------------------------- */
function add_episode_column($columns) {
    $columns['episodes'] = '📺 Episodes';
    return $columns;
}
add_filter('manage_posts_columns', 'add_episode_column');

function display_episode_column($column, $post_id) {
    if ($column === 'episodes') {
        $episodes = get_post_meta($post_id, 'episodes', true);
        if (is_array($episodes) && !empty($episodes)) {
            echo '<strong>' . count($episodes) . ' Episodes</strong>';
        } else {
            echo '<span style="color:#999;">No episodes</span>';
        }
    }
}
add_action('manage_posts_custom_column', 'display_episode_column', 10, 2);

?>
<?php

/* --------------------------------------------------
   HELPER FUNCTIONS TO GET META VALUES (Frontend)
-------------------------------------------------- */
function get_anime_year($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    return get_post_meta($post_id, 'year', true);
}

function get_anime_rating($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    return get_post_meta($post_id, 'rating', true);
}

function get_anime_genres($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    $genres = get_post_meta($post_id, 'genre', true);
    return is_array($genres) ? $genres : [];
}

function get_anime_episodes($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    $episodes = get_post_meta($post_id, 'episodes', true);
    return is_array($episodes) ? $episodes : array();
}

/* --------------------------------------------------
   Get Specific Episode Data
-------------------------------------------------- */
function get_episode_servers($post_id, $episode_index) {
    $episodes = get_anime_episodes($post_id);
    if (isset($episodes[$episode_index]['servers'])) {
        return array_filter($episodes[$episode_index]['servers']);
    }
    return array();
}

function get_episode_downloads($post_id, $episode_index) {
    $episodes = get_anime_episodes($post_id);
    if (isset($episodes[$episode_index]['downloads'])) {
        return array_filter($episodes[$episode_index]['downloads']);
    }
    return array();
}

function get_episode_data($post_id, $episode_index) {
    $episodes = get_anime_episodes($post_id);
    if (isset($episodes[$episode_index])) {
        return $episodes[$episode_index];
    }
    return array();
}


/* --------------------------------------------------
   AJAX SEARCH FUNCTION
-------------------------------------------------- */
add_action('wp_ajax_search_posts', 'search_posts_ajax');
add_action('wp_ajax_nopriv_search_posts', 'search_posts_ajax');

function search_posts_ajax() {
    if (!isset($_POST['query'])) {
        wp_send_json_error('No query provided');
    }
    
    $query = sanitize_text_field($_POST['query']);
    
    if (strlen($query) < 2) {
        wp_send_json_success([]);
    }
    
    $args = array(
        's' => $query,
        'posts_per_page' => 8,
        'post_type' => 'post',
        'orderby' => 'relevance',
        'post_status' => 'publish'
    );
    
    $search_query = new WP_Query($args);
    $results = array();
    
    if ($search_query->have_posts()) {
        while ($search_query->have_posts()) {
            $search_query->the_post();
            $results[] = array(
                'title' => get_the_title(),
                'url' => get_permalink(),
                'excerpt' => wp_trim_words(get_the_excerpt(), 12, '...')
            );
        }
    }
    
    wp_reset_postdata();
    wp_send_json_success($results);
}

/* --------------------------------------------------
   BULK IMPORT EPISODES FROM CSV
-------------------------------------------------- */
function add_bulk_import_menu() {
    add_submenu_page(
        'edit.php',
        'Bulk Import Episodes',
        'Bulk Import Episodes',
        'manage_options',
        'bulk-import-episodes',
        'render_bulk_import_page'
    );
}
add_action('admin_menu', 'add_bulk_import_menu');

function render_bulk_import_page() {
    ?>
    <div class="wrap">
        <h1>📥 Bulk Import Episodes</h1>
        <p>Import episodes from a CSV file.</p>
        <p><strong>CSV Format:</strong> <code>post_id,season,episode_number,title,description,server1,server2,server3,server4,server5,server6,server7,server8,download1,download2,download3,download4,download5,download6,download7,download8</code></p>
        
        <form method="post" enctype="multipart/form-data">
            <?php wp_nonce_field('bulk_import_episodes', 'import_nonce'); ?>
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="episode_csv">Select CSV File:</label></th>
                    <td><input type="file" name="episode_csv" id="episode_csv" accept=".csv" required></td>
                </tr>
            </table>
            <p class="submit">
                <input type="submit" name="import_episodes" class="button button-primary" value="Import Episodes">
            </p>
        </form>
    </div>
    <?php
    
    if (isset($_POST['import_episodes']) && isset($_FILES['episode_csv'])) {
        if (!wp_verify_nonce($_POST['import_nonce'], 'bulk_import_episodes')) {
            echo '<div class="error"><p>❌ Security check failed!</p></div>';
            return;
        }
        
        $file = $_FILES['episode_csv']['tmp_name'];
        if (($handle = fopen($file, 'r')) !== false) {
            $imported = 0;
            $errors = 0;
            fgetcsv($handle);
            
            while (($data = fgetcsv($handle, 2000, ',')) !== false) {
                if (count($data) < 13) {
                    $errors++;
                    continue;
                }

                $post_id = intval($data[0]);
                
                $servers = array();
                for ($i = 5; $i <= 12; $i++) {
                    $servers[] = esc_url_raw($data[$i] ?? '');
                }

                $downloads = array();
                for ($i = 13; $i <= 20; $i++) {
                    $downloads[] = esc_url_raw($data[$i] ?? '');
                }

                $episode = array(
                    'season' => sanitize_text_field($data[1]),
                    'episode_number' => sanitize_text_field($data[2]),
                    'title' => sanitize_text_field($data[3]),
                    'description' => sanitize_textarea_field($data[4]),
                    'servers' => $servers,
                    'downloads' => $downloads
                );
                
                $episodes = get_post_meta($post_id, 'episodes', true);
                if (!is_array($episodes)) {
                    $episodes = array();
                }
                $episodes[] = $episode;
                
                update_post_meta($post_id, 'episodes', $episodes);
                $imported++;
            }
            fclose($handle);
            
            echo '<div class="updated"><p>✅ Successfully imported ' . $imported . ' episodes!';
            if ($errors > 0) {
                echo ' ⚠️ ' . $errors . ' rows skipped due to format issues.';
            }
            echo '</p></div>';
        } else {
            echo '<div class="error"><p>❌ Error opening CSV file!</p></div>';
        }
    }
}

/* --------------------------------------------------
   EXPORT EPISODES TO CSV
-------------------------------------------------- */
function add_bulk_export_menu() {
    add_submenu_page(
        'edit.php',
        'Export Episodes',
        'Export Episodes',
        'manage_options',
        'bulk-export-episodes',
        'render_bulk_export_page'
    );
}
add_action('admin_menu', 'add_bulk_export_menu');

function render_bulk_export_page() {
    ?>
    <div class="wrap">
        <h1>📤 Export Episodes to CSV</h1>
        
        <form method="post">
            <?php wp_nonce_field('bulk_export_episodes', 'export_nonce'); ?>
            <p class="submit">
                <input type="submit" name="export_episodes" class="button button-primary" value="Export All Episodes">
            </p>
        </form>
    </div>
    <?php
    
    if (isset($_POST['export_episodes'])) {
        if (!wp_verify_nonce($_POST['export_nonce'], 'bulk_export_episodes')) {
            echo '<div class="error"><p>❌ Security check failed!</p></div>';
            return;
        }

        global $wpdb;
        $episodes_data = array();
        $episodes_data[] = array(
            'post_id', 'season', 'episode_number', 'title', 'description',
            'server_1', 'server_2', 'server_3', 'server_4', 'server_5', 'server_6', 'server_7', 'server_8',
            'download_1', 'download_2', 'download_3', 'download_4', 'download_5', 'download_6', 'download_7', 'download_8'
        );

        $posts = get_posts(array('posts_per_page' => -1, 'post_type' => 'post'));
        
        foreach ($posts as $post) {
            $episodes = get_anime_episodes($post->ID);
            
            foreach ($episodes as $episode) {
                $row = array(
                    $post->ID,
                    $episode['season'],
                    $episode['episode_number'],
                    $episode['title'],
                    $episode['description']
                );

                for ($i = 0; $i < 8; $i++) {
                    $row[] = $episode['servers'][$i] ?? '';
                }

                for ($i = 0; $i < 8; $i++) {
                    $row[] = $episode['downloads'][$i] ?? '';
                }

                $episodes_data[] = $row;
            }
        }

        $filename = 'episodes_export_' . date('Y-m-d_H-i-s') . '.csv';
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        
        $output = fopen('php://output', 'w');
        
        foreach ($episodes_data as $row) {
            fputcsv($output, $row);
        }
        
        fclose($output);
        exit;
    }
}

?>
<?php
/* ============================================================
   EPISODE DOWNLOAD SYSTEM - PART 1: BACKEND (functions.php)
============================================================ */


/* --------------------------------------------------
   2. Save Download Data
-------------------------------------------------- */
function save_download_data($post_id) {
    if (!isset($_POST['downloads_nonce']) || !wp_verify_nonce($_POST['downloads_nonce'], 'save_downloads')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['download_data']) && is_array($_POST['download_data'])) {
        $download_data = array();
        
        foreach ($_POST['download_data'] as $quality => $links) {
            $download_data[$quality] = array(
                'filename' => sanitize_text_field($links['filename'] ?? ''),
                'filepress' => esc_url_raw($links['filepress'] ?? ''),
                'gdflix1' => esc_url_raw($links['gdflix1'] ?? ''),
                'gdflix2' => esc_url_raw($links['gdflix2'] ?? ''),
                'gdtot' => esc_url_raw($links['gdtot'] ?? '')
            );
        }
        
        update_post_meta($post_id, 'download_data', $download_data);
    } else {
        delete_post_meta($post_id, 'download_data');
    }
}
add_action('save_post', 'save_download_data');

/* --------------------------------------------------
   3. Get Download Data Frontend Helper
-------------------------------------------------- */
function get_episode_downloads_data($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    $download_data = get_post_meta($post_id, 'download_data', true);
    return is_array($download_data) ? $download_data : array();
}

/* --------------------------------------------------
   4. AJAX Handler for Download Page
-------------------------------------------------- */
add_action('wp_ajax_load_downloads_page', 'ajax_load_downloads_page');
add_action('wp_ajax_nopriv_load_downloads_page', 'ajax_load_downloads_page');

function ajax_load_downloads_page() {
    if (!isset($_POST['post_id'])) {
        wp_send_json_error('Post ID not provided');
    }
    
    $post_id = intval($_POST['post_id']);
    $post = get_post($post_id);
    
    if (!$post) {
        wp_send_json_error('Post not found');
    }
    
    $download_data = get_episode_downloads_data($post_id);
    $thumbnail = get_the_post_thumbnail_url($post_id, 'full');
    
    ob_start();
    ?>
    <div style="max-width: 900px; margin: 0 auto;">
        <!-- Header -->
        <div style="text-align: center; margin-bottom: 30px;">
            <?php if ($thumbnail): ?>
                <img src="<?php echo esc_url($thumbnail); ?>" 
                     alt="<?php echo esc_attr($post->post_title); ?>"
                     style="max-width: 300px; border-radius: 10px; margin-bottom: 20px; box-shadow: 0 8px 20px rgba(0,0,0,0.3);">
            <?php endif; ?>
            <h1 style="color: #ffdf00; font-size: 28px; margin-bottom: 10px;">
                <?php echo esc_html($post->post_title); ?> - All Episodes
            </h1>
            <p style="color: rgba(255,255,255,0.8); font-size: 16px;">
                Stream or Download All Episodes in Multiple Languages
            </p>
        </div>
        
        <!-- Download Options -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px;">
            <?php
            $qualities = ['1080p HEVC 10bit BluRay Multi Audio ESub', '480p BluRay Multi Audio ESub', '720p HD BluRay Multi Audio ESub'];
            $quality_keys = ['1080p', '480p', '720p'];
            
            foreach ($quality_keys as $idx => $quality_key):
                $data = $download_data[$quality_key] ?? array();
                $quality_label = $qualities[$idx];
            ?>
                <div style="background: rgba(30, 25, 45, 0.8); border: 2px solid rgba(139, 92, 246, 0.3); border-radius: 12px; padding: 20px; backdrop-filter: blur(10px);">
                    <h3 style="color: #fff; font-size: 16px; margin-bottom: 12px; text-align: center; font-weight: 700;">
                        📥 <?php echo esc_html($quality_label); ?>
                    </h3>
                    
                    <?php if (!empty($data['filename'])): ?>
                        <p style="color: rgba(255,255,255,0.7); font-size: 12px; text-align: center; margin-bottom: 15px; background: rgba(139,92,246,0.1); padding: 8px; border-radius: 6px;">
                            📦 <?php echo esc_html($data['filename']); ?>.zip
                        </p>
                    <?php endif; ?>
                    
                    <div style="display: flex; flex-direction: column; gap: 8px;">
                        <?php
                        $hosters = array(
                            'filepress' => array('name' => '🎀 FILEPRESS', 'color' => '#ff1493'),
                            'gdflix1' => array('name' => '💚 GDFLIX', 'color' => '#10b981'),
                            'gdflix2' => array('name' => '💚 GDFLIX', 'color' => '#34d399'),
                            'gdtot' => array('name' => '❤️ GDTOT', 'color' => '#ef4444')
                        );
                        
                        
                        foreach ($hosters as $key => $hoster):
                            $link = $data[$key] ?? '';
                            if (!empty($link)):
                        ?>
                           <button type="button" onclick="window.open('<?php echo esc_js($link); ?>', '_blank')"
                               rel="noopener noreferrer"
                               style="background: linear-gradient(135deg, <?php echo $hoster['color']; ?> 0%, rgba(255,255,255,0.1) 100%); 
                                      color: #fff; 
                                      padding: 12px 16px; 
                                      border-radius: 8px; 
                                      text-decoration: none; 
                                      text-align: center; 
                                      font-weight: 700; 
                                      font-size: 12px;
                                      transition: all 0.3s ease;
                                      border: 1px solid <?php echo $hoster['color']; ?>20;
                                      display: flex;
                                      align-items: center;
                                      justify-content: center;
                                      gap: 6px;
                                      cursor: pointer;"
                               onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 20px rgba(0,0,0,0.3)';"
                               onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                                <span><?php echo $hoster['name']; ?></span>
                                <span style="font-size: 14px;">↗</span>
                            </button>
                        <?php 
                            endif;
                        endforeach; 
                        ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <!-- Info Box -->
        <div style="background: rgba(220, 38, 38, 0.15); border: 2px solid rgba(220, 38, 38, 0.4); border-radius: 12px; padding: 15px; margin-top: 30px; text-align: center;">
            <p style="color: #fca5a5; font-size: 14px; margin: 0;">
                ⚠️ <strong>Choose any hoster above to download.</strong> All links contain the same content in multiple languages and subtitles.
            </p>
        </div>
        
        <!-- Close Button -->
        <div style="text-align: center; margin-top: 25px;">
            <button onclick="closeDownloadModal()" 
                    style="background: linear-gradient(135deg, #8b5cf6 0%, #a78bfa 100%); 
                           color: #fff; 
                           border: none; 
                           padding: 12px 32px; 
                           border-radius: 20px; 
                           font-weight: 700; 
                           font-size: 14px; 
                           cursor: pointer;
                           box-shadow: 0 6px 20px rgba(139, 92, 246, 0.3);
                           transition: all 0.3s ease;"
                    onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 25px rgba(139, 92, 246, 0.4)';"
                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 6px 20px rgba(139, 92, 246, 0.3)';">
                ✕ Close
            </button>
        </div>
    </div>
    <?php
    $content = ob_get_clean();
    wp_send_json_success(array('content' => $content));
}

/* --------------------------------------------------
   5. Add Download Button to Episode List
-------------------------------------------------- */
function add_download_column($columns) {
    $columns['download_link'] = '📥 Download';
    return $columns;
}
add_filter('manage_posts_columns', 'add_download_column');

function display_download_column($column, $post_id) {
    if ($column === 'download_link') {
        $download_data = get_episode_downloads_data($post_id);
        if (!empty($download_data)) {
            echo '<a href="javascript:openDownloadModal(' . $post_id . ')" style="color: #8b5cf6; text-decoration: none; font-weight: 700;">📥 View Downloads</a>';
        } else {
            echo '<span style="color: #999;">—</span>';
        }
    }
}
add_action('manage_posts_custom_column', 'display_download_column', 10, 2);


?>
<?php
/* =====================================================
   SEASON-WISE ZIP DOWNLOAD SYSTEM
===================================================== */

/* --------------------------------------------------
   1. Add Season ZIP Meta Box in Post Editor
-------------------------------------------------- */
function add_season_zip_metabox() {
    add_meta_box(
        'season_zip_downloads',
        '📦 Season-wise ZIP Downloads',
        'render_season_zip_metabox',
        'post',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_season_zip_metabox');


/* --------------------------------------------------
   2. Render Season ZIP Meta Box
-------------------------------------------------- */
function render_season_zip_metabox($post) {
    wp_nonce_field('save_season_zips', 'season_zips_nonce');
    
    $season_zips = get_post_meta($post->ID, 'season_zips', true);
    if (!is_array($season_zips)) {
        $season_zips = array();
    }
    ?>
    
    <style>
        .season-zip-container {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .season-zip-box {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            color: white;
        }

        .season-zip-title {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 15px;
            color: #fff;
        }

        .zip-field {
            margin-bottom: 12px;
        }

        .zip-field label {
            display: block;
            font-weight: 600;
            margin-bottom: 5px;
            color: rgba(255,255,255,0.9);
            font-size: 13px;
        }

        .zip-field input {
            width: 100%;
            padding: 10px;
            border: 2px solid rgba(255,255,255,0.3);
            border-radius: 5px;
            font-family: monospace;
            font-size: 12px;
            background: rgba(255,255,255,0.1);
            color: #fff;
            box-sizing: border-box;
        }

        .zip-field input::placeholder {
            color: rgba(255,255,255,0.5);
        }

        .quality-options {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-top: 15px;
        }

        .quality-group {
            background: rgba(255,255,255,0.1);
            padding: 12px;
            border-radius: 5px;
        }

        .quality-label {
            font-weight: 600;
            color: #ffdf00;
            font-size: 13px;
            margin-bottom: 8px;
            display: block;
        }

        .remove-season-zip {
            background: #dc3545;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            font-size: 12px;
            margin-top: 10px;
            transition: all 0.3s ease;
        }

        .remove-season-zip:hover {
            background: #c82333;
            transform: scale(1.05);
        }

        .add-season-btn {
            background: #28a745;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .add-season-btn:hover {
            background: #218838;
            transform: translateY(-2px);
        }

        .header-info {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            font-size: 14px;
        }
    </style>

    <div class="header-info">
        <strong>📦 Add ZIP Download Links for Each Season</strong><br>
        <small>Har season ke liye alag zip file link add kare. Multiple qualities (1080p, 720p, 480p) support karega.</small>
    </div>

    <div id="season-zip-list">
        <?php 
        if (!empty($season_zips)) {
            foreach ($season_zips as $index => $season_data) {
                render_season_zip_row($index, $season_data);
            }
        }
        ?>
    </div>

    <button type="button" class="add-season-btn" onclick="addSeasonZip()">➕ Add New Season</button>

    <script>
    let seasonZipIndex = <?php echo count($season_zips); ?>;

    function addSeasonZip() {
        const html = `
            <div class="season-zip-box" data-index="${seasonZipIndex}">
                <div class="season-zip-title">Season ${seasonZipIndex + 1}</div>

                <div class="zip-field">
                    <label>Season Number:</label>
                    <input type="number" name="season_zips[${seasonZipIndex}][season_num]" min="1" value="${seasonZipIndex + 1}" required>
                </div>

                <div class="zip-field">
                    <label>Season Name (Optional):</label>
                    <input type="text" name="season_zips[${seasonZipIndex}][season_name]" placeholder="e.g., Season 1 - The Beginning">
                </div>

                <div class="quality-options">
                    <div class="quality-group">
                        <span class="quality-label">🎬 1080p HEVC</span>
                        <input type="text" name="season_zips[${seasonZipIndex}][1080p_link]" placeholder="https://filepress.io/..." class="zip-input">
                    </div>
                    <div class="quality-group">
                        <span class="quality-label">📺 720p HD</span>
                        <input type="text" name="season_zips[${seasonZipIndex}][720p_link]" placeholder="https://filepress.io/..." class="zip-input">
                    </div>
                    <div class="quality-group">
                        <span class="quality-label">📱 480p Mobile</span>
                        <input type="text" name="season_zips[${seasonZipIndex}][480p_link]" placeholder="https://filepress.io/..." class="zip-input">
                    </div>
                </div>

                <button type="button" class="remove-season-zip" onclick="removeSeasonZip(this)">❌ Remove Season</button>
            </div>
        `;
        
        jQuery('#season-zip-list').append(html);
        seasonZipIndex++;
    }

    function removeSeasonZip(btn) {
        if (confirm('Kya aap ye season remove karna chahte ho?')) {
            jQuery(btn).closest('.season-zip-box').fadeOut(300, function() {
                jQuery(this).remove();
            });
        }
    }
    </script>

    <?php
}


/* --------------------------------------------------
   3. Render Each Season ZIP Row
-------------------------------------------------- */
function render_season_zip_row($index, $season_data) {
    $season_num = isset($season_data['season_num']) ? $season_data['season_num'] : ($index + 1);
    $season_name = isset($season_data['season_name']) ? $season_data['season_name'] : '';
    $link_1080p = isset($season_data['1080p_link']) ? $season_data['1080p_link'] : '';
    $link_720p = isset($season_data['720p_link']) ? $season_data['720p_link'] : '';
    $link_480p = isset($season_data['480p_link']) ? $season_data['480p_link'] : '';
    ?>

    <div class="season-zip-box" data-index="<?php echo $index; ?>">
        <div class="season-zip-title">📦 Season <?php echo esc_attr($season_num); ?></div>

        <div class="zip-field">
            <label>Season Number:</label>
            <input type="number" name="season_zips[<?php echo $index; ?>][season_num]" min="1" value="<?php echo esc_attr($season_num); ?>" required>
        </div>

        <div class="zip-field">
            <label>Season Name (Optional):</label>
            <input type="text" name="season_zips[<?php echo $index; ?>][season_name]" value="<?php echo esc_attr($season_name); ?>" placeholder="e.g., Season 1 - The Beginning">
        </div>

        <div class="quality-options">
            <div class="quality-group">
                <span class="quality-label">🎬 1080p HEVC 10bit</span>
                <input type="text" 
                       name="season_zips[<?php echo $index; ?>][1080p_link]" 
                       value="<?php echo esc_url($link_1080p); ?>"
                       placeholder="https://filepress.io/..." 
                       class="zip-input">
            </div>
            <div class="quality-group">
                <span class="quality-label">📺 720p HD</span>
                <input type="text" 
                       name="season_zips[<?php echo $index; ?>][720p_link]" 
                       value="<?php echo esc_url($link_720p); ?>"
                       placeholder="https://filepress.io/..." 
                       class="zip-input">
            </div>
            <div class="quality-group">
                <span class="quality-label">📱 480p Mobile</span>
                <input type="text" 
                       name="season_zips[<?php echo $index; ?>][480p_link]" 
                       value="<?php echo esc_url($link_480p); ?>"
                       placeholder="https://filepress.io/..." 
                       class="zip-input">
            </div>
        </div>

        <button type="button" class="remove-season-zip" onclick="removeSeasonZip(this)">❌ Remove</button>
    </div>

    <?php
}


/* --------------------------------------------------
   4. Save Season ZIP Data
-------------------------------------------------- */
function save_season_zip_data($post_id) {
    if (!isset($_POST['season_zips_nonce']) || !wp_verify_nonce($_POST['season_zips_nonce'], 'save_season_zips')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['season_zips']) && is_array($_POST['season_zips'])) {
        $season_zips = array();
        
        foreach ($_POST['season_zips'] as $season) {
            $season_zips[] = array(
                'season_num' => sanitize_text_field($season['season_num'] ?? ''),
                'season_name' => sanitize_text_field($season['season_name'] ?? ''),
                '1080p_link' => esc_url_raw($season['1080p_link'] ?? ''),
                '720p_link' => esc_url_raw($season['720p_link'] ?? ''),
                '480p_link' => esc_url_raw($season['480p_link'] ?? '')
            );
        }
        
        update_post_meta($post_id, 'season_zips', $season_zips);
    } else {
        delete_post_meta($post_id, 'season_zips');
    }
}
add_action('save_post', 'save_season_zip_data');


/* --------------------------------------------------
   5. Helper Function - Get Season ZIPs
-------------------------------------------------- */
function get_season_zips($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    $season_zips = get_post_meta($post_id, 'season_zips', true);
    return is_array($season_zips) ? $season_zips : array();
}


?>
