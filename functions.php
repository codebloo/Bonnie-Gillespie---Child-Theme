<?php

/* Custom Functions */

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page('Theme Settings');

}

add_image_size( 'logos', 300, 300, true );

/*-----------------------------------------------------------------------------------*/
/* Equeue JS
/*-----------------------------------------------------------------------------------*/

function js_scripts_load_cdn()
{
	// Register the script like this for a theme:
	wp_register_script( 'fontawesome', 'https://use.fontawesome.com/d6dcea8cee.js', array( 'jquery' ) );
	wp_enqueue_script( 'featherlight', get_stylesheet_directory_uri() . '/js/featherlight.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'featherlight-gallery', get_stylesheet_directory_uri() . '/js/featherlight.gallery.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'imagesloaded', get_stylesheet_directory_uri() . '/js/imagesloaded.pkgd.js', array( 'jquery' ), '1.0', true );	
	wp_enqueue_script( 'masonry', get_stylesheet_directory_uri() . '/js/masonry.pkgd.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'slickjs', get_stylesheet_directory_uri() . '/js/slick.js', array( 'jquery' ), '1.0', true );	
	wp_enqueue_script( 'custom', get_stylesheet_directory_uri() . '/js/custom.js', array( 'jquery' ), '1.0', true );	

	add_action('wp_enqueue_scripts', 'theme_js');
	
	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'fontawesome' );
	wp_enqueue_script( 'imagesloaded' );
	wp_enqueue_script( 'masonry' );
	wp_enqueue_script( 'featherlight' );
	wp_enqueue_script( 'featherlight-gallery' );
	wp_enqueue_script( 'slickjs' );
	wp_enqueue_script( 'custom' );
}
add_action( 'wp_enqueue_scripts', 'js_scripts_load_cdn' );

/*-----------------------------------------------------------------------------------*/
/* Equeue CCS
/*-----------------------------------------------------------------------------------*/

function css_styles()
{
	// Register the style like this for a theme:
	wp_register_style( 'slickcss', '//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css', array(), '', 'all' );
	wp_register_style( 'slick-theme', '//cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css', array(), '', 'all' );
	wp_register_style( 'featherlight', '//cdn.rawgit.com/noelboss/featherlight/1.5.0/release/featherlight.min.css', array(), '', 'all' );
	wp_register_style( 'featherlight-gallery', '//cdn.rawgit.com/noelboss/featherlight/1.5.0/release/featherlight.gallery.min.css', array(), '', 'all' );


	// For either a plugin or a theme, you can then enqueue the style:
	wp_enqueue_style( 'slickcss' );
	wp_enqueue_style( 'slick-theme' );
	wp_enqueue_style( 'featherlight' );
	wp_enqueue_style( 'featherlight-gallery' );
}
add_action( 'wp_enqueue_scripts', 'css_styles' );


/*-----------------------------------------------------------------------------------*/
/* Hot Sheets Post Type
/*-----------------------------------------------------------------------------------*/

add_action( 'init', 'register_cpt_hotsheets' );

function register_cpt_hotsheets() {

    $labels = array( 
        'name' => _x( 'Hot Sheets', 'hotsheets' ),
        'singular_name' => _x( 'Hot Sheet', 'hotsheets' ),
        'add_new' => _x( 'Add New', 'hotsheets' ),
        'add_new_item' => _x( 'Add New Hot Sheet', 'hotsheets' ),
        'edit_item' => _x( 'Edit Hot Sheet', 'hotsheets' ),
        'new_item' => _x( 'New Hot Sheet', 'hotsheets' ),
        'view_item' => _x( 'View Hot Sheet', 'hotsheets' ),
        'search_items' => _x( 'Search Hot Sheets', 'hotsheets' ),
        'not_found' => _x( 'No Hot Sheets found', 'hotsheets' ),
        'not_found_in_trash' => _x( 'No Hot Sheets found in Trash', 'hotsheets' ),
        'parent_item_colon' => _x( 'Parent Hot Sheet:', 'hotsheets' ),
        'menu_name' => _x( 'Hot Sheets', 'hotsheets' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        
        'supports' => array( 'title'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-awards',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'hotsheets', $args );
}

/*-----------------------------------------------------------------------------------*/
/* Hot Sheets Popularity
/*-----------------------------------------------------------------------------------*/


function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


/*-----------------------------------------------------------------------------------*/
/* Classes Post Type
/*-----------------------------------------------------------------------------------*/

add_action( 'init', 'register_cpt_classes' );

function register_cpt_classes() {

    $labels = array( 
        'name' => _x( 'Classes', 'classes' ),
        'singular_name' => _x( 'Class', 'classes' ),
        'add_new' => _x( 'Add New', 'classes' ),
        'add_new_item' => _x( 'Add New Class', 'classes' ),
        'edit_item' => _x( 'Edit Class', 'classes' ),
        'new_item' => _x( 'New Class', 'classes' ),
        'view_item' => _x( 'View Class', 'classes' ),
        'search_items' => _x( 'Search Classes', 'classes' ),
        'not_found' => _x( 'No Classes found', 'classes' ),
        'not_found_in_trash' => _x( 'No Classes found in Trash', 'classes' ),
        'parent_item_colon' => _x( 'Parent Class:', 'classes' ),
        'menu_name' => _x( 'Classes', 'classes' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        
        'supports' => array( 'title','revisions','thumbnail', 'comments'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-welcome-learn-more',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'classes', $args );
}

/* Taxonomy */

add_action( 'init', 'register_taxonomy_courses' );

function register_taxonomy_courses() {

    $labels = array( 
        'name' => _x( 'Courses', 'courses' ),
        'singular_name' => _x( 'Course', 'courses' ),
        'search_items' => _x( 'Search Courses', 'courses' ),
        'popular_items' => _x( 'Popular Courses', 'courses' ),
        'all_items' => _x( 'All Courses', 'courses' ),
        'parent_item' => _x( 'Parent Course', 'courses' ),
        'parent_item_colon' => _x( 'Parent Course:', 'courses' ),
        'edit_item' => _x( 'Edit Course', 'courses' ),
        'update_item' => _x( 'Update Course', 'courses' ),
        'add_new_item' => _x( 'Add New Course', 'courses' ),
        'new_item_name' => _x( 'New Course', 'courses' ),
        'separate_items_with_commas' => _x( 'Separate courses with commas', 'courses' ),
        'add_or_remove_items' => _x( 'Add or remove courses', 'courses' ),
        'choose_from_most_used' => _x( 'Choose from the most used courses', 'courses' ),
        'menu_name' => _x( 'Courses', 'courses' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => false,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'courses', array('classes'), $args );
}

function default_comments_on( $data ) {
    if( $data['post_type'] == 'classes' ) {
        $data['comment_status'] = 'open';
    }

    return $data;
}
add_filter( 'wp_insert_post_data', 'default_comments_on' );