<?php
/**
 * knw theme functions
 *
 */

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

//Remove <p> tags from images
 function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
} add_filter('the_content', 'filter_ptags_on_images');

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

//Remove Image Dimensions
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );
function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

//Page Slug Body Class
function add_slug_body_class( $classes ) {
global $post;
if ( isset( $post ) ) {
$classes[] = $post->post_type . '-' . $post->post_name;
}
return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

//Register Menu
function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );


//Conditioanl Page Scripts
function knw_home_scripts() {
  if ( is_page('Home') ){ wp_enqueue_script( 'knw-swipe',  get_template_directory_uri() . '/assets/js/swipe.min.js', '', '', true);}
}
function knw_contact_scripts() {
  if ( is_page('Contact') ){
    wp_enqueue_script( 'knw-jquery',  get_template_directory_uri() . '/assets/js/jquery.min.js', '', '', true);
    wp_enqueue_script( 'knw-jquery-form',  get_template_directory_uri() . '/assets/js/jquery.form.min.js', '', '', true);
    wp_enqueue_script( 'knw-jquery-validate',  get_template_directory_uri() . '/assets/js/jquery.validate.min.js', '', '', true);
    wp_enqueue_script( 'knw-jquery-from-settings',  get_template_directory_uri() . '/assets/js/jquery.form--settings.min.js', '', '', true);
  }
}

function knw_single_scripts() {
  if ( is_single() ){
    wp_enqueue_script( 'knw-jquery',  get_template_directory_uri() . '/assets/js/jquery.min.js', '', '', true);
  }
}



//Enqueue scripts and styles.
function knw_scripts() {
  wp_enqueue_style( 'knw-style',  get_stylesheet_directory_uri() . '/assets/css/style.min.css');
  wp_enqueue_script( 'knw-global-script',  get_template_directory_uri() . '/assets/js/global.min.js');
  wp_enqueue_script( 'knw-modernizr',  get_template_directory_uri() . '/assets/js/modernizr.min.js');
}
add_action( 'wp_enqueue_scripts', 'knw_scripts');
add_action ('wp_enqueue_scripts', 'knw_home_scripts');
add_action ('wp_enqueue_scripts', 'knw_contact_scripts');
add_action ('wp_enqueue_scripts', 'knw_single_scripts');
