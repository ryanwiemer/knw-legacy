<?php
/**
 * Template Name: Galleries Page
 * Description: A Page Template for the Galleries
 */
get_header(); ?>

<div class="hero hero--texture">
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
  'posts_per_page' => -1,
  'no_found_rows' => true, // counts posts, remove if pagination required
  'update_post_term_cache' => false, // grabs terms, remove if terms required (category, tag...)
  'update_post_meta_cache' => false, // grabs post meta, remove if post meta required
  );
?>

<?php

// the query
$the_query = new WP_Query( $args ); ?>

  <?php if ( $the_query->have_posts() ) : ?>

<ul class="Categories">
  <?php wp_list_categories( $args ); ?> 
</ul>

    <ul class="thumbnail-list">
    <!-- the loop -->
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<li>
				<a href="<?php the_permalink(); ?>">
					<figure class="thumbnail__border">
						<?php if ( has_post_thumbnail() ) {
                the_post_thumbnail( 'thumbnail', array( 'class' => 'thumbnail__image' ) ); }
                else {
	                echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/assets/img/placeholder.png"  class="thumbnail__image"/>';
                  }?>
					<figcaption class="thumbnail__overlay">
							<h3 class="thumbnail__title"><?php the_title(); ?></h3>
						</figcaption>
					</figure>
				</a>
			</li>

    <?php endwhile; ?>
    </ul>
    <!-- end of the loop -->

    <?php wp_reset_postdata(); ?>

<?php else:  ?>
  <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
<h5><?php echo get_num_queries(); ?> queries in <?php timer_stop(1); ?> seconds.</h5>
<?php get_footer(); ?>
