<?php
/**
 * The Template for displaying all single posts.
 *
 * @package knw
 */

get_header(); ?>

<div class="content">
<?php while ( have_posts() ) : the_post(); ?>

<?php get_template_part( 'content', 'gallery' ); ?>

<?php endwhile; // end of the loop. ?>
</div><!-- content-->
<?php get_footer(); ?>
