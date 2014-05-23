<?php
/**
 * Content - Blog Post
 */
?>

<article class="post">
    <h2 class="post__title"><?php echo get_the_title(); ?></h2>
    <p class="post__date">Posted on <?php echo get_the_date(); ?></p>
		<?php the_content(); ?>
</article><!-- #post-## -->

<?php
	// If comments are open or we have at least one comment, load up the comment template
	if ( comments_open() || '0' != get_comments_number() ) :
		comments_template();
	endif;
?>
