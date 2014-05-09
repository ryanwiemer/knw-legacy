<?php
/**
 * Content - Blog Post
 */
?>

<gallery <?php post_class(); ?>>
		<?php the_content(); ?>
</gallery><!-- #post-## -->

<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>
