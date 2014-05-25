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
	// First, initialize how many posts to render per page
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // allow for pagination
  $args = array(
  'post_type' => 'post',
  'paged' => $paged,
  'tax_query' => array(
  array(
  'taxonomy' => 'post_format',
  'field' => 'slug',
  'terms' =>  'post-format-gallery',
  'operator' => 'IN'
  )
  ),
  'posts_per_page' => 6,
  'no_found_rows' => true, // counts posts, remove if pagination required
  'update_post_term_cache' => false, // grabs terms, remove if terms required (category, tag...)
  'update_post_meta_cache' => false, // grabs post meta, remove if post meta required
  );
?>

  <?php
    $gallery_query = new WP_Query( $args );
  ?>

  <?php if ( $gallery_query->have_posts() ) : ?>

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
    <?php wp_list_categories( $cat_args ); ?>
  </ul>
</div>
<section class="gallery-list">
  <?php while ( $gallery_query->have_posts() ) : $gallery_query->the_post(); ?>
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
    <!-- end of the loop -->
<div class="pagination">
  <?php
    next_posts_link( 'Older Entries', 99999 );
    previous_posts_link( 'Newer Entries' );
  ?>
</div>
<?php else:  ?>
  <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
<?php get_footer(); ?>
