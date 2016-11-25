<?php
/**
 * The template for Category Page
 *
 */

get_header(); ?>

<?php $cat_args = array(
  'orderby'            => 'count',
  'order'              =>  'DESC',
  'title_li'           => __( '' ),
  'show_option_none'   => __( 'No categories' ),
  'include'            => '',
  'exclude'            => '9'
); ?>
<div class="content">
  <h2 class="page__title"><?php single_cat_title( '', true ); ?></h2>
<div class="categories">
  <p>Click on a gallery below or select a category from the list.</p>
  <ul>
    <li class="cat-item"><a href="<?php echo site_url(); ?>/galleries" title="View all posts filed under all categories">all categories</a></li>
    <?php wp_list_categories( $cat_args ); ?>
  </ul>
</div>

<section class="gallery-list  infinite-selector">
  <?php while ( have_posts() ) : the_post(); ?>
    <article class="gallery">
      <a href="<?php the_permalink(); ?>">
        <div class="gallery__border">
          <?php if ( has_post_thumbnail() ) {
              the_post_thumbnail( 'thumbnail', array( 'class' => 'gallery__image' ) ); }
              else {
                echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/dist/img/placeholder.png"  class="gallery__image"/>';
                }?>
          <div class="gallery__overlay">
            <h3 class="gallery__title"><?php the_title(); ?></h3>
          </div>
        </div>
      </a>
    </article>
  <?php endwhile; ?>
  <div class="pagination  infinite-selector">
    <?php
      next_posts_link( 'Older Entries');
      previous_posts_link( 'Newer Entries' );
    ?>
  </div>
</section>

</div><!-- content-->

<?php get_footer(); ?>
