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
<?php
$temp_query = $wp_query;
?>

<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // allow for pagination

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
'no_found_rows' => true, // counts posts, remove if pagination required
'update_post_term_cache' => false, // grabs terms, remove if terms required (category, tag...)
'update_post_meta_cache' => false, // grabs post meta, remove if post meta required
);
?>
  <?php
    $wp_query = new WP_Query( $args );
  ?>

<section class="blog-list">
  <?php if ( have_posts() ) : ?>
  <!-- the loop -->
  <?php while ( have_posts() ) : the_post(); ?>
  <article class="blog-post">
    <?php if (has_post_thumbnail( $post->ID ) ): ?>
    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
    $image = $image[0]; ?>
    <?php else :
    $image = get_bloginfo( 'stylesheet_directory') . '/assets/img/placeholder.png'; ?>
    <?php endif; ?>
    <?php if ( has_post_thumbnail() ) {
        the_post_thumbnail( 'thumbnail', array( 'class' => 'blog-post__img' ) ); }
        else {
          echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/assets/img/placeholder.png"  class="blog-post__img"/>';
          }?>
    <div class="blog-post__details">
      <h2 class="blog-post__title"><?php the_title(); ?></h2>
      <p class="blog-post__date"><?php echo get_the_date(); ?></p>
      <p class="blog-post__excerpt"><?php echo comments_number(); ?></p>
      <a class="blog-post__btn btn btn--small" href="<?php the_permalink(); ?>">
        Read more...
      </a>
    </div>
  </article>
  <?php endwhile; ?>
  <!-- end of the loop -->
</section>
<h3><?php echo $posts_per_page ?></h3>
<div class="pagination">
  <?php
    next_posts_link( 'Older Entries', 9999);
    previous_posts_link( 'Newer Entries' );
  ?>
</div>
<?php else:  ?>
  <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
  <?php
  $wp_query = $temp_query; ?>

<?php get_footer(); ?>
