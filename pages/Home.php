<?php
/**
 * Template Name: Home Page
 * Description: A Page Template for the Home Page
 */
get_header(); ?>
<div class="content">

<div id='slider' class='slider'>
  <div class='slider__wrap'>
    <?php if(get_field('slider')): ?>
      <?php while(has_sub_field('slider')): ?>
        <div>
          <a href="<?php the_sub_field('slide_link'); ?>">
            <?php $large = wp_get_attachment_image_src(get_sub_field('slide_image'), 'large'); ?>
            <?php $medium = wp_get_attachment_image_src(get_sub_field('slide_image'), 'medium'); ?>
            <?php $thumb = wp_get_attachment_image_src(get_sub_field('slide_image'), 'thumbnail'); ?>
            <img srcset="<?php echo $large[0]; ?> 1800w, <?php echo $medium[0]; ?> 900w, <?php echo $thumb[0]; ?> 450w" sizes="100vw">
            <div class="slider__caption"><?php the_sub_field('slide_title'); ?></div>
          </a>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>
  </div> <!-- slider__wrap -->
  <nav class="slider__nav">
    <a onclick='slider.prev()'><span class="prev icon-left-arrow"></a></span>
    <a onclick='slider.next()'><span class="next icon-right-arrow"></a></span>
  </nav>
</div> <!-- slider -->

<?php while ( have_posts() ) : the_post(); ?>
  <?php the_content(); ?>
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>
