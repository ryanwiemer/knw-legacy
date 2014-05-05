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
      get_template_part( 'content', 'gallery' );}

      else {
      get_template_part( 'content', 'blog' );
      }?>

      <?php
        $comments_args = array (
          'id_form' => '',
          'id_submit' => '',
          'title_reply' => 'Comment',
          'label_submit' => __( 'Submit' ),
           'comment_notes_after' => '',

        );
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comment_form($comments_args);
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
