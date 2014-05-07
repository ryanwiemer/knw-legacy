<?php
/**
 * Template Name: Blog Page
 * Description: A Page Template for the Blog
 */
get_header(); ?>
<div class="content">

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
'posts_per_page' => 5,
'no_found_rows' => true, // counts posts, remove if pagination required
'update_post_term_cache' => false, // grabs terms, remove if terms required (category, tag...)
'update_post_meta_cache' => false, // grabs post meta, remove if post meta required
);

?>

<?php
// the query
$the_query = new WP_Query( $args ); ?>

<?php if ( $the_query->have_posts() ) : ?>

  <!-- the loop -->
  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
    <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>

  <?php endwhile; ?>
  <!-- end of the loop -->

  <!-- pagination here -->
  <?php
    next_posts_link( 'Older Entries', 99999 );
    previous_posts_link( 'Newer Entries' );
  ?>

  <?php wp_reset_postdata(); ?>

<?php else:  ?>
  <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
<h5><?php echo get_num_queries(); ?> queries in <?php timer_stop(1); ?> seconds.</h5>

<?php get_footer(); ?>
