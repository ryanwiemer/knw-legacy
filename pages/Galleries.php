<?php
/**
 * Template Name: Galleries Page
 * Description: A Page Template for the Galleries
 */
get_header(); ?>

<div class="hero hero--purple">
  <h2 class="hero__title"><?php echo get_the_title(); ?></h2>
</div>

<div class="content">

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
  'posts_per_page' => 6,
  );
    $temp = $wp_query;
    $wp_query = null;
    $wp_query = new WP_Query();
    $wp_query->query($args);
?>

<?php if ( have_posts() ) : ?>

<?php $cat_args = array(
  'orderby'            => 'count',
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
            $medium = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium');
            $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail');?>
            <img class="gallery__image" srcset="<?php echo $medium[0]; ?> 900w, <?php echo $thumb[0]; ?> 450w" sizes="100vw">
            <?php
              }
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
    <!-- end of the loop -->
<div class="pagination">
  <?php
    next_posts_link( 'Older Entries' );
    previous_posts_link( 'Newer Entries' );
  ?>
</div>

<?php $wp_query = null; $wp_query = $temp;  // Reset ?>
<?php else:  ?>
  <p><?php _e( 'Sorry, no galleries matched your criteria.' ); ?></p>
<?php endif; ?>

<?php get_footer(); ?>
