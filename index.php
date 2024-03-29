<?php
/**
 * The main template file
 *
 */

get_header(); ?>

  <div class="content">

	<h2 class="page__title"><?php echo get_the_title(); ?></h2>


    <?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>

				<?php endwhile; ?>
</div><!-- content-->
<?php get_footer(); ?>
