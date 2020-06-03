<?php
add_theme_support( 'menus' );
add_theme_support( 'custom-logo' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );

add_action( 'wp_enqueue_scripts', 'theme_scripts' );
function theme_scripts() {

	global $wp_query;

	wp_enqueue_style( 'style-main', get_template_directory_uri() . '/assets/css/main.min.css' );
	wp_enqueue_style( 'style-name', get_stylesheet_uri() );

	wp_enqueue_script( 'script-name', get_template_directory_uri() . '/assets/js/custom.js', array( 'jquery' ), '1.0.0', true );

	wp_localize_script( 'script-name', 'misha_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages
	) );

 	wp_enqueue_script( 'script-name' );
}

add_action( 'after_setup_theme', 'theme_menu' );
function theme_menu() {
	register_nav_menus( [
		'header-menu' => 'Header'
	] );
}

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'General Settings',
		'menu_title'	=> 'Options Theme',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

}


function register_acf_block_types() {

	acf_register_block_type(array(
		'name'              => 'main-banner',
		'title'             => __( 'Main Banner', 'china' ),
		'description'       => __( 'Custom Main Banner', 'china' ),
		'render_template'   => 'template-parts/blocks/main-banner.php',
		'enqueue_style'		=> get_template_directory_uri() . '/assets/css/main.min.css',
		'category'          => 'formatting',
		'icon'              => 'archive',
		'keywords'          => array( 'banner' ),
	));

	acf_register_block_type(array(
		'name'              => 'line-banner',
		'title'             => __( 'Line Banner', 'china' ),
		'description'       => __( 'Custom Line Banner', 'china' ),
		'render_template'   => 'template-parts/blocks/line-description.php',
		'enqueue_style'		=> get_template_directory_uri() . '/assets/css/main.min.css',
		'category'          => 'formatting',
		'icon'              => 'archive',
		'keywords'          => array( 'banner', 'line' ),
	));

	acf_register_block_type(array(
		'name'              => 'about-us',
		'title'             => __( 'About Us', 'china' ),
		'description'       => __( 'Custom About Us', 'china' ),
		'render_template'   => 'template-parts/blocks/about-us.php',
		'enqueue_style'		=> get_template_directory_uri() . '/assets/css/main.min.css',
		'category'          => 'formatting',
		'icon'              => 'archive',
		'keywords'          => array( 'about us', 'banner' ),
	));

	acf_register_block_type(array(
		'name'              => 'blog-item',
		'title'             => __( 'List Posts', 'china' ),
		'description'       => __( 'Custom List posts', 'china' ),
		'render_template'   => 'template-parts/blocks/blog-item.php',
		'enqueue_style'		=> get_template_directory_uri() . '/assets/css/main.min.css',
		'category'          => 'formatting',
		'icon'              => 'archive',
		'keywords'          => array( 'list', 'post_class' ),
	));

}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
	add_action('acf/init', 'register_acf_block_types');
}

add_image_size( 'blog-thumbnail', 361, 218, true );


function true_load_posts(){

	$args = unserialize( stripslashes( $_POST['query'] ) );
	$args['paged'] = $_POST['page'] + 1;
	$args['post_status'] = 'publish';


	query_posts( $args );

	if( have_posts() ) :


		while( have_posts() ): the_post();

			get_template_part( 'template-parts/post', 'item' );

		endwhile;

	endif;
	die();
}


add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');


function register_my_widgets(){

	register_sidebar( array(
		'name' => __( 'Footer Sidebar', 'china' ),
		'id' => 'footer-sidebar',
		'description' => __( 'Sidebar for footer', 'china' ),
		'before_widget' => '<div class="item">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	) );


}
add_action( 'widgets_init', 'register_my_widgets' );

add_filter( 'excerpt_length', function(){
	return 30;
} );

add_filter('excerpt_more', function($more) {
	return '';
});
?>