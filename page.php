<?php
/**
 * The template for displaying pages
 *
 * Condition tags used to determin if the Homepage, About, Pricing or Contact.
 */

get_header(); ?>

<?php
    get_template_part( 'content', 'page' );
?>

<?php get_footer(); ?>
