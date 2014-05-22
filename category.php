<?php
/**
 * The template for Category Page
 *
 */

get_header(); ?>

<div class="hero hero--purple">
  <h2 class="hero__title"><?php single_cat_title( '', true ); ?></h2>
</div>

<div class="content">
  <section class="gallery-list">
    <?php while ( have_posts() ) : the_post(); ?>
      <article class="gallery">
        <a href="<?php the_permalink(); ?>">
          <div class="gallery__border">
            <?php if ( has_post_thumbnail() ) {
                the_post_thumbnail( 'thumbnail', array( 'class' => 'gallery__image' ) ); }
                else {
                  echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/assets/img/placeholder.png"  class="gallery__image"/>';
                  }?>
            <div class="gallery__overlay">
              <h3 class="gallery__title"><?php the_title(); ?></h3>
            </div>
          </div>
        </a>
      </article>
    <?php endwhile; ?>
  </section>

<div class="pagination">
  <?php
    next_posts_link( 'Older Entries');
    previous_posts_link( 'Newer Entries' );
  ?>
</div>

<?php get_footer(); ?>
<script>
  var ias = jQuery.ias({
    container:  '.gallery-list',
    item:       '.gallery',
    pagination: '.pagination',
    next:       '.btn-pagination--next'
  });
</script>
