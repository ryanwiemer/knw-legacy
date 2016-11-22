<?php
/**
 * Template Name: About Page
 * Description: A Page Template for the About Page
 */
get_header(); ?>

<div class="content">

<h2 class="page__title"><?php echo get_the_title(); ?></h2>

	<div class="about-container">
		<div class="about-portrait">
			<?php if ( has_post_thumbnail() ) {
						the_post_thumbnail();}
						else {
						echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/assets/img/placeholder.png" />';
					}?>
		</div>
		<section class="about-text">
			<?php the_content(); ?>
		</section>
	</div>

</div><!-- content-->
<?php get_footer(); ?>
