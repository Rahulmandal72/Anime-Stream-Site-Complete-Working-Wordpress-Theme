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
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <?php wp_head(); ?>
 
</head>
<body <?php body_class(); ?>>

<header>
    <div class="site-branding">
        <?php
            // Logo or Site Name with link to /home
            if ( function_exists('the_custom_logo') && has_custom_logo() ) {
                echo '<a href="' . site_url('/home') . '">';
                the_custom_logo();
                echo '</a>';
            } else {
                echo '<h1><a href="' . site_url('/home') . '" style="color: #00fff4; text-decoration: none;">' . get_bloginfo('name') . '</a></h1>';
            }
        ?>
    </div>
       
    <style>
h1 {
  text-align: center;
  margin-top: 20px;
  margin-bottom: 20px;
  display: flex;
  justify-content: center;
}

h1 a {
  color: #00fff4;
  text-decoration: none;
}

/* Navigation container */
.main-nav {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  padding: 10px;
  gap: 23px;
}



</style>

<nav class="main-nav">
  <a href="<?php echo site_url('/anime'); ?>">Anime</a>
  <a href="<?php echo site_url('/cartoon'); ?>">Cartoon</a>
  <a href="<?php echo site_url('/movies'); ?>">Movies</a>
  <a href="<?php echo site_url('/hindi-dub'); ?>">Hindi Dub</a>
  <a href="<?php echo site_url('/tamil'); ?>">Tamil</a>
  <a href="<?php echo site_url('/telugu'); ?>">Telugu</a>
</nav>
</header>