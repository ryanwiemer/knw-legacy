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



//Rename Posts to Galleries
function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Galleries';
    $submenu['edit.php'][5][0] = 'Galleries';
    $submenu['edit.php'][10][0] = 'Add Gallery';
    echo '';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Galleries';
    $labels->singular_name = 'Galleries';
    $labels->add_new = 'Add Gallery';
    $labels->add_new_item = 'Add Galleries';
    $labels->edit_item = 'Edit Galleries';
    $labels->new_item = 'Gallery';
    $labels->view_item = 'View Galleries';
    $labels->search_items = 'Search Galleries';
    $labels->not_found = 'No Galleries found';
    $labels->not_found_in_trash = 'No Galleries found in Trash';
    $labels->all_items = 'All Galleries';
    $labels->menu_name = 'Galleries';
    $labels->name_admin_bar = 'Galleries';
}
add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );



//Custom Post Type for the Articles Section
function articles_post_type() {
	$labels = array(
		'name'                => _x( 'Articles', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Article', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Articles', 'text_domain' ),
		'all_items'           => __( 'All Articles', 'text_domain' ),
		'view_item'           => __( 'View Article', 'text_domain' ),
		'add_new_item'        => __( 'Add New Article', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Article', 'text_domain' ),
		'update_item'         => __( 'Update Article', 'text_domain' ),
		'search_items'        => __( 'Search Articles', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'articles', 'text_domain' ),
		'description'         => __( 'Articles', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', ),
		'taxonomies'          => array( 'category'),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite' => array('slug' => 'articles'),
		'capability_type'     => 'page',
	);
	register_post_type( 'articles', $args );
}
add_action( 'init', 'articles_post_type', 0 );








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
