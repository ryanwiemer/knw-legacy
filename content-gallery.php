<?php
/**
 * Content - Gallery
 */
?>

<?php if( have_rows('gallery_intro') ):
   while ( have_rows('gallery_intro') ) : the_row(); ?>
<gallery>
  <section class="gallery-intro">
    <div>
      <h2 class="gallery-intro__title"><?php the_title(); ?></h2>
        <p class="gallery-intro__location"><?php the_sub_field('gallery_intro_location'); ?></p>
        <p class="gallery-intro__cat"><?php knw_the_category( ); ?></p>
        <p class="gallery-intro__nav">
          <?php previous_post_link('%link', '', TRUE, ' ', 'post_format' );?>
          <a href="<?php site_url(); ?>/galleries" class="icon-grid"></a>
          <?php next_post_link('%link', '', TRUE, ' ', 'post_format' ); ?>
        </p>
    </div>
    <p class="gallery-intro__description"><?php the_sub_field('gallery_intro_description'); ?></p>
</section>
  <?php  endwhile;
    else :
    endif;?>
		<?php the_content(); ?>
    <a href="#" class="top-link">Return to top</a>
</gallery>
