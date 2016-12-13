<?php
/**
 * Template Name: Pricing Sub Page
 * Description: A Page Template for the Pricing Sub Pages
 */
get_header(); ?>

<div class="content">

<h2 class="page__title"><?php echo get_the_title(); ?></h2>

<section class="pricing__sub">

<?php the_content(); ?>

</section>

</div><!-- content-->
<?php get_footer(); ?>
