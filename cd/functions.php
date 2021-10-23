<?php 

/**
 * cd's functions and definitions
 *
 * @package cd
 * @since cd 1.0
 */
 
/**
 * First, let's set the maximum content width based on the theme's design and stylesheet.
 * This will limit the width of all uploaded images and embeds.
 */
if ( ! isset( $content_width ) )
    $content_width = 1400; /* pixels */
 
if ( ! function_exists( 'cd_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function cd_setup() {
 
    /**
     * Make theme available for translation.
     * Translations can be placed in the /languages/ directory.
     */
    load_theme_textdomain( 'cd', get_template_directory() . '/languages' );
 
    /**
     * Add default posts and comments RSS feed links to <head>.
     */
    add_theme_support( 'automatic-feed-links' );
 
    add_theme_support( 'title-tag' );
 
    /**
     * Enable support for post thumbnails and featured images.
     */
    add_theme_support( 'post-thumbnails' );
 
    /**
     * Add support for two custom navigation menus.
     */
    register_nav_menus( array(
        'primary'   => __( 'Primary Menu', 'cd' ),
        'secondary' => __('Secondary Menu', 'cd' )
    ) );
 
    /**
     * Enable support for the following post formats:
     * aside, gallery, quote, image, and video
     */
    // add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );


    add_image_size( 'cd_featured', 1296, 332, true );
    add_image_size( 'cd_post', 200, 250, true );
}
endif; // cd_setup
add_action( 'after_setup_theme', 'cd_setup' );