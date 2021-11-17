<?php 


/**
 * Load Custom Comments Layout file.
 */
require get_template_directory() . '/inc/comments-helper.php';


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


/**
 * Edit excerpt lenght
 */
function cd_excerpt_length($length){
    return 7;
}
add_filter('excerpt_length', 'cd_excerpt_length');




/**
 * Theme preferences
 */
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Marquee Settings',
		'menu_title'	=> 'Marquee',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}

// paginate links
function cd_get_paginated_links( $query ) {
    // When we're on page 1, 'paged' is 0, but we're counting from 1,
    // so we're using max() to get 1 instead of 0
    $currentPage = max( 1, get_query_var( 'paged', 1 ) );
  
    // This creates an array with all available page numbers, if there
    // is only *one* page, max_num_pages will return 0, so here we also
    // use the max() function to make sure we'll always get 1
    $pages = range( 1, max( 1, $query->max_num_pages ) );
  
    // Now, map over $pages and return the page number, the url to that
    // page and a boolean indicating whether that number is the current page
    return array_map( function( $page ) use ( $currentPage ) {
        return ( object ) array(
            "isCurrent" => $page == $currentPage,
            "page" => $page,
            "url" => get_pagenum_link( $page )
        );
    }, $pages );
}
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="btn btn-outline-primary d-none d-lg-inline-block"';
}



// edit post comment form
function cd_remove_comment_url($arg) {
    $arg['url'] = '';
    return $arg;
}
add_filter('comment_form_default_fields', 'cd_remove_comment_url');

function cd_comment_form_defaults( $defaults ) {
    $defaults['class_submit'] = 'btn btn-primary';
    return $defaults;
}
add_filter( 'comment_form_defaults', 'cd_comment_form_defaults' );

function cd_move_comment_field_to_bottom( $fields ) {
    unset( $fields['cookies'] );
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter( 'comment_form_fields', 'cd_move_comment_field_to_bottom');