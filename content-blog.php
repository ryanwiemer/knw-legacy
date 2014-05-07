<?php
/**
 * Content - Blog Post
 */
?>

<article <?php post_class(); ?>>
		<?php the_content(); ?>
    <h3>Im a blog post</h3>
</article><!-- #post-## -->

<?php comments_template(); ?>
