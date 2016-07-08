<?php
/**
 * knw theme functions
 *
 */

//Remove wp-embed script
 function my_deregister_scripts(){
   wp_deregister_script( 'wp-embed' );
 }
 add_action( 'wp_footer', 'my_deregister_scripts' );

//Remove WP junk in the head
function remove_wp_version() {
return '';
}
add_filter ('the_generator', 'remove_wp_version');
remove_action ('wp_head', 'wp_generator');
remove_action ('wp_head', 'rsd_link');
remove_action ('wp_head', 'wlwmanifest_link');
remove_action ('wp_head', 'wp_shortlink_wp_head');
remove_action ('wp_head', 'rel_canonical');
remove_action ('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

//Clean up Wordpress Menus
 function custom_wp_nav_menu($var) {
  return is_array($var) ? array_intersect($var, array(
		'current_page_item' // active
		)
	) : '';
}
add_filter('nav_menu_css_class', 'custom_wp_nav_menu');
add_filter('nav_menu_item_id', 'custom_wp_nav_menu');
add_filter('page_css_class', 'custom_wp_nav_menu');

//Replaces "current-menu-item" with "active"
function current_to_active($text){
	$replace = array(
		'current_page_item' => 'active'
	);
	$text = str_replace(array_keys($replace), $replace, $text);
		return $text;
	}
add_filter ('wp_nav_menu','current_to_active');
function strip_empty_classes($menu) {
    $menu = preg_replace('/ class=""| class="sub-menu"/','',$menu);
    return $menu;
}
add_filter ('wp_nav_menu','strip_empty_classes');

//Page Slug Body Class
function add_slug_body_class( $classes ) {
global $post;
if ( isset( $post ) ) {
$classes[] = $post->post_type . '-' . $post->post_name;
}
return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

//Add class to pagination buttons
add_filter('next_posts_link_attributes', 'posts_link_attributes_next');
add_filter('previous_posts_link_attributes', 'posts_link_attributes_prev');
function posts_link_attributes_next() {
  return 'class="btn-pagination btn-pagination--next"';
}
function posts_link_attributes_prev() {
  return 'class="btn-pagination btn-pagination--prev"';
}

//Remove <p> tags from images
function filter_ptags_on_images($content){
  return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');

//Remove Image Dimensions
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );
function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

function sgr_filter_image_sizes( $sizes) {
  unset( $sizes['large']);
  return $sizes;
  }
add_filter('intermediate_image_sizes_advanced', 'sgr_filter_image_sizes');

//Remove max width on images (1600px)
function remove_max_srcset_image_width( $max_width ) {
    return false;
}
add_filter( 'max_srcset_image_width', 'remove_max_srcset_image_width' );

//Featured Image Support
add_theme_support( 'post-thumbnails' );

//Support for Gallery Post Type
add_theme_support( 'post-formats', array( 'gallery' ) );

//95% jpeg Quality
add_filter( 'jpeg_quality', create_function( '', 'return 95;' ) );

//Register Menu
function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

// Create a function to output valid category links
function knw_the_category() {
$categories = get_the_category();
  $separator = ', ';
  $output = '';
  if($categories){
	  foreach($categories as $category) {
		  $output .= '<a href="'.get_category_link($category->term_id ).'" title="' . esc_attr( sprintf( __( "View Category" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
	  }
	  echo trim($output, $separator);
  }
}

//Change Youtube Embed to work with the responsive knw theme
function alx_embed_html( $html ) {
    return '<div class="video">' . $html . '</div>';
}
add_filter( 'embed_oembed_html', 'alx_embed_html', 10, 3 );
add_filter( 'video_embed_html', 'alx_embed_html' ); // Jetpack


////////////////////////
//CSS & JS Scripts//////
////////////////////////

//Global Styles and Scripts
function knw_scripts() {
  wp_enqueue_style( 'knw-style',  get_stylesheet_directory_uri() . '/dist/css/style.min.css');
  wp_enqueue_script( 'knw-scripts',  get_template_directory_uri() . '/dist/js/scripts.min.js', '', '', true);
}

add_action( 'wp_enqueue_scripts', 'knw_scripts');
