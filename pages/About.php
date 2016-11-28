<?php
/**
 * Template Name: About Page
 * Description: A Page Template for the About Page
 */
get_header(); ?>

<div class="content">

<h2 class="page__title"><?php echo get_the_title(); ?></h2>
	<?php if ( has_post_thumbnail() ) {
			the_post_thumbnail();}
			else {
			echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/dist/img/placeholder.png" />';
		}?>
	<?php the_content(); ?>

</div><!-- content-->
<?php get_footer(); ?>
