<?php
/**
 * The content template for the Homepage.
 */
?>
<div class="content">
  
<div id='slider' class='slider'>
  <div class='slider__wrap'>
    <?php if(get_field('slider')): ?>
      <?php while(has_sub_field('slider')): ?>
        <div>
          <a href="<?php the_sub_field('slide_link'); ?>"> <img src="<?php the_sub_field('slide_image'); ?>"/>
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
