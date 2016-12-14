<?php
/**
 * Template Name: Pricing Page
 * Description: A Page Template for the Pricing Page
 */
get_header(); ?>

<div class="content">

<h2 class="page__title"><?php echo get_the_title(); ?></h2>

<section class="pricing">

<?php $lifestyle_image_cover = wp_get_attachment_image_src(get_field('lifestyle_pricing_image'), 'medium'); ?>

	<a href="<?php echo get_site_url(); ?>/pricing/lifestyle" data-bg="<?php echo $lifestyle_image_cover[0]; ?>" class="pricing__cover lazyload">
		<div class="pricing__cover__overlay"></div>
		<h3 class="pricing__cover__title">Lifestyle</h3>
	</a>


<?php $wedding_image_cover = wp_get_attachment_image_src(get_field('wedding_pricing_image'), 'medium'); ?>

<a href="<?php echo get_site_url(); ?>/pricing/wedding" data-bg="<?php echo $wedding_image_cover[0]; ?>" class="pricing__cover lazyload">
	<div class="pricing__cover__overlay"></div>
	<h3 class="pricing__cover__title">Wedding</h3>
</a>


</section>

</div><!-- content-->
<?php get_footer(); ?>
