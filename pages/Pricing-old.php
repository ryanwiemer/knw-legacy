<?php
/**
 * Template Name: Pricing Page
 * Description: A Page Template for the Pricing Page
 */
get_header(); ?>

<div class="content">

<h2 class="page__title"><?php echo get_the_title(); ?></h2>

<section class="pricing__portraits">

	<div class="pricing-table">
	  <h3 class="pricing-table__title">Portrait Packages</h3>
		<div class="pricing-table__labels">
			<h4 class="pricing-table__labels--description">Description</h4>
			<h4 class="pricing-table__labels--price">Price</h4>
		</div>
		<?php if( have_rows('portrait_pricing_table') ): ?>
		<ul class="pricing-table__list">
			<?php while( have_rows('portrait_pricing_table') ): the_row(); ?>
			<li class="pricing-table__row">
				<h5><?php the_sub_field('package_name'); ?></h5>
				<h6><?php the_sub_field('package_description'); ?></h6>
				<h7>$<?php the_sub_field('package_price'); ?></h7>
			</li>
			<?php endwhile; ?>
		</ul>
		<?php endif; ?>
	</div>

  <div class="pricing__footnotes">Additional Information
		<?php if( have_rows('portrait_additional_info') ): ?>
	    <ul>
				<?php while( have_rows('portrait_additional_info') ): the_row(); ?>
	      	<li><?php the_sub_field('footnotes'); ?></li>
				<?php endwhile; ?>
	    </ul>
		<?php endif; ?>
  </div>

</section>

<section class="pricing__weddings">
	<div class="pricing-table">
		<h3 class="pricing-table__title">Wedding Packages</h3>
		<div class="pricing-table__labels">
			<h4 class="pricing-table__labels--description">Description</h4>
			<h4 class="pricing-table__labels--price">Price</h4>
		</div>
		<?php if( have_rows('wedding_pricing_table') ): ?>
		<ul class="pricing-table__list">
			<?php while( have_rows('wedding_pricing_table') ): the_row(); ?>
			<li class="pricing-table__row">
				<h5><?php the_sub_field('package_name'); ?></h5>
				<h6><?php the_sub_field('package_description'); ?></h6>
				<h7>$<?php the_sub_field('package_price'); ?></h7>
			</li>
			<?php endwhile; ?>
			<p class="pricing-table__email">Not finding a good fit? I am also happy to create a custom wedding package just for you! Please <a href="/contact">contact me</a> with details of your wedding to discuss a customized package.</p>
		</ul>
		<?php endif; ?>
	</div>
  <div class="pricing__footnotes">Additional Information
		<?php if( have_rows('wedding_additional_info') ): ?>
	    <ul>
				<?php while( have_rows('wedding_additional_info') ): the_row(); ?>
	      	<li><?php the_sub_field('footnotes'); ?></li>
				<?php endwhile; ?>
	    </ul>
		<?php endif; ?>
  </div>
</section>
</div><!-- content-->
<?php get_footer(); ?>
