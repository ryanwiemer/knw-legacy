<?php
/**
 * @package knw
 */
?>

<article <?php post_class(); ?>>

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<h1><?php the_title() ;?></h1>
	<?php the_content(); ?>

<?php endwhile; else: ?>

	<p>Sorry, this page does not exist</p>

<?php endif; ?>


	<footer class="entry-footer">
			<span class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'knw' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'knw' ), __( '1 Comment', 'knw' ), __( '% Comments', 'knw' ) ); ?></span>
		<?php endif; ?>

	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
