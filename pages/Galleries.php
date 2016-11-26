<?php
/**
 * Template Name: Galleries Page
 * Description: A Page Template for the Galleries
 */
get_header(); ?>

<div class="content">

<h2 class="page__title"><?php echo get_the_title(); ?></h2>

<?php
  $args = array(
  'post_type' => 'post',
  'paged' => $paged,
  'tax_query' => array(
  array(
  'taxonomy' => 'post_format',
  'field' => 'slug',
  'terms' =>  'post-format-gallery',
  )
  ),
  'posts_per_page' => 1000,
  );
    $temp = $wp_query;
    $wp_query = null;
    $wp_query = new WP_Query();
    $wp_query->query($args);
?>
<?php if ( have_posts() ) : ?>
<?php $cat_args = array(
  'orderby'            => 'count',
  'order'              =>  'DESC',
  'title_li'           => __( '' ),
  'show_option_none'   => __( 'No categories' ),
  'include'            => '',
  'exclude'            => '9'
); ?>

<div class="categories">
  <p>Click on a gallery below or select a category from the list.</p>
  <ul>
    <li class="cat-item"><a href="<?php echo site_url(); ?>/galleries" title="View all posts filed under all categories">all categories</a></li>
    <?php wp_list_categories( $cat_args ); ?>
  </ul>
</div>
<section class="gallery-list">
  <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
    <article class="gallery">
      <a href="<?php the_permalink(); ?>">
        <div class="gallery__border">
          <?php if ( has_post_thumbnail() ) {
            $src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'medium');
            $srcset = wp_get_attachment_image_srcset(get_post_thumbnail_id($post->ID));?>
            <div class="ratio-container">
            <img class="gallery__image lazyload" data-sizes="auto" data-src='<?php echo $src[0]; ?>' data-srcset='<?php echo $srcset; ?>'>
            <?php
              }
              else {
                echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/dist/img/placeholder.png"  class="gallery__image"/>';
                }?>
              </div>
          <div class="gallery__overlay">
            <h3 class="gallery__title"><?php the_title(); ?></h3>
          </div>
        </div>
      </a>
    </article>
  <?php endwhile; ?>
  <div class="pagination">
  <?php
    next_posts_link( 'Older Entries' );
    previous_posts_link( 'Newer Entries' );
  ?>
  </div>

</section>
    <!-- end of the loop -->

<?php $wp_query = null; $wp_query = $temp;  // Reset ?>
<?php else:  ?>
  <p><?php _e( 'Sorry, no galleries matched your criteria.' ); ?></p>
<?php endif; ?>
</div><!-- content-->
<?php get_footer(); ?>
