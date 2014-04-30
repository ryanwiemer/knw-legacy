<?php
/**
 * Template Name: Galleries Page
 * Description: A Page Template for the Galleries Page with cutsom post loop
 */
get_header(); ?>

<div class="hero hero--texture">
  <h2 class="hero__title"><?php echo get_the_title(); ?></h2>
</div>

<div class="content">

<?php if ( have_posts() ) : ?>

  <?php /* Start the Loop */ ?>
  <?php while ( have_posts() ) : the_post(); ?>

  <?php endwhile; ?>

  <?php knw_paging_nav(); ?>

<?php else : ?>

  <?php get_template_part( 'content', 'none' ); ?>

<?php endif; ?>


<?php get_footer(); ?>
