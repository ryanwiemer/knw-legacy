<?php
/**
 * Content - Gallery
 */
?>


<?php

if( have_rows('gallery_intro') ):
   while ( have_rows('gallery_intro') ) : the_row(); ?>
<article <?php post_class(); ?>>
      <section class="article-intro">
        <div>
          <h2 class="article-intro__title"><?php the_title(); ?></h2>
            <p class="article-intro__location"><?php the_sub_field('gallery_intro_location'); ?></p>
            <p class="article-intro__date"><?php the_sub_field('gallery_intro_date'); ?></p>
              <?php previous_post_link('%link', '', TRUE, ' ', 'post_format' );?>
              <a href="<?php site_url(); ?>/galleries" class="icon-grid"></a>
              <?php next_post_link('%link', '', TRUE, ' ', 'post_format' ); ?>
        </div>
        <p class="article-intro__description"><?php the_sub_field('gallery_intro_description'); ?></p>
    </section>
  <?php  endwhile;
       else :
        endif;?>
		<?php the_content(); ?>
    <a href="#wrapper" class="return-top">return to top</a>
</article><!-- #post-## -->
