<?php
  /**
   * The template for displaying Comments.
   *
   * The area of the page that contains both current comments
   * and the comment form.
   */

?>

  <div class="comments">
  	<?php if ( have_comments() ) : ?>
  		<h2 class="comments__title">Leave a comment</h2>
  		<ol class="comments__list">
  			<?php
  				wp_list_comments( array(
  					'style'      => 'ol',
  					'short_ping' => true,
  				) );
  			?>
  		</ol><!-- .comment__list -->
  	<?php endif; // have_comments() ?>

  	<?php
  		// If comments are closed and there are comments, let's leave a little note, shall we?
  		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
  	?>
  		<p class="comments__closed"><?php _e( 'Comments are closed.', 'knw' ); ?></p>
  	<?php endif; ?>

  	<?php comment_form(); ?>

  </div><!-- comments -->
