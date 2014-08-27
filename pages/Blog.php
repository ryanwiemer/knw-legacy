<?php
/**
 * Template Name: Blog Page
 * Description: A Page Template for the Blog
 */
get_header(); ?>
<div class="hero hero--purple">
  <h2 class="hero__title"><?php echo get_the_title(); ?></h2>
</div>

<div class="content">
<section class="blog-list">

<?php
  $args = array(
  'post_type' => 'post',
  'paged' => $paged,
  'tax_query' => array(
  array(
  'taxonomy' => 'post_format',
  'field' => 'slug',
  'terms' =>  'post-format-gallery',
  'operator' => 'NOT IN'
  )
  ),
  'posts_per_page' => 3,
  );
    $temp = $wp_query;
    $wp_query = null;
    $wp_query = new WP_Query();
    $wp_query->query($args);
?>

    <?php if ( have_posts() ) : ?>
    <!-- the loop -->
    <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
    <article class="blog-post">

      <?php if (has_post_thumbnail( $post->ID ) ): ?>
        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); $image = $image[0]; ?>
      <?php else :
        $image = get_bloginfo( 'stylesheet_directory') . '/assets/img/placeholder.png'; ?>
      <?php endif; ?>

      <?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'thumbnail', array( 'class' => 'blog-post__img' ) ); }
      else { echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/assets/img/placeholder.png"  class="blog-post__img"/>';}?>

      <div class="blog-post__details">
        <h2 class="blog-post__title"><?php the_title(); ?></h2>
        <p class="blog-post__date"><?php echo get_the_date(); ?></p>
        <p class="blog-post__excerpt"><?php echo comments_number(); ?></p>
        <a class="blog-post__btn btn btn--small" href="<?php the_permalink(); ?>">Read more...</a>
      </div>
    </article>
    <?php endwhile; ?>
    <!-- end of the loop -->
</section>

<div class="pagination">
  <?php
    next_posts_link( 'Older Entries');
    previous_posts_link( 'Newer Entries' );
  ?>
</div>

<?php $wp_query = null; $wp_query = $temp;  // Reset ?>
<?php else: ?>
  <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<?php get_footer(); ?>
