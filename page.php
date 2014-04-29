<?php
/**
 * The template for displaying pages
 *
 * Condition tags used to determin if the Homepage, About, Pricing or Contact.
 */

get_header(); ?>

<?php
  if ( is_page ( 'Home' ) ) {
    get_template_part( 'content', 'home' );
  }

  elseif ( is_page ( 'About' ) ) {
    get_template_part( 'content', 'about' );
  }

  elseif ( is_page ( 'Pricing' ) ) {
    get_template_part( 'content', 'pricing' );
  }

  elseif ( is_page ( 'Contact' ) ) {
    get_template_part( 'content', 'contact' );
  }

  elseif ( is_page ( 'Galleries' ) ) {
    get_template_part( 'content', 'galleries' );
  }


  else {
    get_template_part( 'content', 'page' );
  }

?>

<?php get_footer(); ?>
