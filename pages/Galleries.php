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

$temp = $wp_query;
$wp_query= null;

// the query
$wp_query = new WP_Query( $args ); ?>

  <?php if ( $wp_query->have_posts() ) : ?>

  <?php $cat_args = array(
  	'orderby'            => 'count',
  	'title_li'           => __( '' ),
  	'show_option_none'   => __( 'No categories' ),
    'include'            => '',
    'exclude'            => '9'
  ); ?>

<div class="categories">
  <p>View galleries for a particular category or scroll down to see them all.</p>
  <ul>
    <?php wp_list_categories( $cat_args ); ?>
  </ul>
</div>

    <ul class="thumbnail-list">
    <!-- the loop -->
    <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
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
<?php
  next_posts_link( 'Older Entries', 99999 );
  previous_posts_link( 'Newer Entries' );
?>
    <?php wp_reset_postdata();
    $wp_query = null; $wp_query = $temp
    ?>

<?php else:  ?>
  <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<?php get_footer(); ?>

<script>
    var infinite_scroll = {
        loading: {
            img: "<?php echo get_template_directory_uri(); ?>/assets/img/loader.gif",
            msgText: "<?php _e( 'Loading the next set of posts...', 'custom' ); ?>",
            finishedMsg: "<?php _e( 'All posts loaded.', 'custom' ); ?>"
        },
        "nextSelector":".btn-pagination--next",
        "navSelector":".btn-pagination",
        "itemSelector":".thumbnail-list li",
        "contentSelector":".thumbnail-list"
    };
    jQuery( infinite_scroll.contentSelector ).infinitescroll( infinite_scroll );
    </script>
