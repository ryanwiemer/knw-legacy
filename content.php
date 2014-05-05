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
</article><!-- #post-## -->
