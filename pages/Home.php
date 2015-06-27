<?php
/**
 * Template Name: Home Page
 * Description: A Page Template for the Home Page
 */
get_header(); ?>
<img class="logo--full" src="<?php echo get_template_directory_uri(); ?>/assets/img/knw.png" />
<div class="slider">
  <?php if(get_field('slider')): ?>
  <?php while(has_sub_field('slider')): ?>
  <?php $large = wp_get_attachment_image_src(get_sub_field('slide_image'), 'large'); ?>
    <div class="slide" style="background-image: url('<?php echo $large[0]; ?>');"></div>
  <?php endwhile; ?>
  <?php endif; ?>
</div>
  <a class="scroll-down" href="#content">down arrow</a>

<div id="content" class="content">
<?php while ( have_posts() ) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile; // end of the loop. ?>
</div><!-- content-->
<?php get_footer(); ?>
