<?php
/**
 * The template for displaying pages
 *
 */

get_header(); ?>

<?php
    get_template_part( 'content', get_post_format() );
?>

<?php get_footer(); ?>
