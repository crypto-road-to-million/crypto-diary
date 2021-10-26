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



/**
 * include styles.
 * */
if(! function_exists('cd_styles') ) {
    function cd_styles(){
        wp_enqueue_style('cd-bootstrap-css', get_template_directory_uri() .'/assets/css/bootstrap.css');
        wp_enqueue_style('cd-style-css', get_template_directory_uri() .'/assets/css/main.css');
    }
}
add_action('wp_enqueue_scripts', 'cd_styles');
  


/**
 * include javascript files.
 */
if(! function_exists('cd_script') ) {
    function cd_script(){
        wp_enqueue_script('cd-bootstrap-bundle-js', get_template_directory_uri() .'/assets/vendors/bootstrap.bundle.min.js', array(), null, true );
        wp_enqueue_script('cd-marquee-js', get_template_directory_uri() .'/assets/vendors/index.js', array(), null, true );

        wp_enqueue_script('cd-app-js', get_template_directory_uri() .'/assets/js/app.js', array(), null, true );
    }
}
add_action('wp_enqueue_scripts', 'cd_script');
  


/**
 * Yes, we are hooking Google Fonts.
 */
if(! function_exists('add_gfonts_to_head') ) {
    function add_gfonts_to_head() { ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">
<?php }
}
add_action('wp_head', 'add_gfonts_to_head');