<?php
/**
 * Template Name: Page d'accueil
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function add_custom_page_css() {
    if ( is_page_template( 'home.php' ) ) {
        wp_enqueue_style( 'home', get_template_directory_uri() . '/assets/css/minified/home.min.css' );
    }
}
add_action( 'wp_enqueue_scripts', 'add_custom_page_css' );

function home_custom_script() {
    wp_enqueue_script( 'home-slide', get_template_directory_uri() . '/assets/js/minified/home-slide.min.js', array(), null, true );
}
add_action( 'wp_footer', 'home_custom_script' );

get_header(); ?>

<div class="home_hero-banner">

    <?php
    while ( have_posts() ) : the_post();
        the_content();
    endwhile;
    ?>

</div>
<?php get_footer(); ?>
