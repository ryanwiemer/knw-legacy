<?php
/**
 * The Template for displaying all single posts.
 *
 * @package knw
 */

get_header(); ?>

<div class="content">
		<?php while ( have_posts() ) : the_post(); ?>

      <?php
      if ( has_post_format( 'gallery' )) {
      	get_template_part( 'content', 'gallery' );
			}

      else {
      	get_template_part( 'content', 'blog' );
      }?>

		<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
