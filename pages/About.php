<?php
/**
 * Template Name: About Page
 * Description: A Page Template for the About Page
 */
get_header(); ?>

<div class="content">

<h2 class="page__title"><?php echo get_the_title(); ?></h2>

<div class="about-collage about-collage--portrait">
	<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail();}
				else {
				echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/dist/img/placeholder.png" />';
			}?>
</div>

<section class="about-container">
	<?php the_content(); ?>
</section>
</div><!-- content-->
<?php get_footer(); ?>
