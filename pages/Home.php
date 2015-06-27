<?php
/**
 * Template Name: Home Page
 * Description: A Page Template for the Home Page
 */
get_header(); ?>
<img class="logo--full" src="<?php echo get_template_directory_uri(); ?>/assets/img/test-logo.svg" />
<div class="slider">
  <?php if(get_field('slider')): ?>
  <?php while(has_sub_field('slider')): ?>
  <?php $large = wp_get_attachment_image_src(get_sub_field('slide_image'), 'large'); ?>
    <div class="slide" style="background-image: url('<?php echo $large[0]; ?>');">
    <div class="slide--overlay"></div>
    </div>
  <?php endwhile; ?>
  <?php endif; ?>

</div>
<div class="scroll-down ">
  <a class="icon-" href="#content">&#xe600;</a>
</div>

<div id="content" class="content">
<?php while ( have_posts() ) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile; // end of the loop. ?>
</div><!-- content-->
<?php get_footer(); ?>
