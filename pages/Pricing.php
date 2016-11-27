<?php
/**
 * Template Name: Pricing Page
 * Description: A Page Template for the Pricing Page
 */
get_header(); ?>

<div class="content">

<h2 class="page__title"><?php echo get_the_title(); ?></h2>

<section class="pricing">

<?php if( get_field('family_pricing_image') ): ?>
	<a href="<?php echo get_site_url(); ?>/pricing/family" data-bg="<?php the_field('family_pricing_image'); ?>" class="pricing__cover lazyload">
<?php endif; ?>
		<div class="pricing__cover__overlay"></div>
		<h3 class="pricing__cover__title">Family</h3>
	</a>


<?php if( get_field('wedding_pricing_image') ): ?>
<a href="<?php echo get_site_url(); ?>/pricing/wedding" data-bg="<?php the_field('wedding_pricing_image'); ?>" class="pricing__cover lazyload">
<?php endif; ?>
	<div class="pricing__cover__overlay"></div>
	<h3 class="pricing__cover__title">Wedding</h3>
</a>


</section>

</div><!-- content-->
<?php get_footer(); ?>
