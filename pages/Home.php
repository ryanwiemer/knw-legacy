<?php
/**
 * Template Name: Home Page
 * Description: A Page Template for the Home Page
 */
get_header(); ?>
<img class="logo--full" src="<?php echo get_template_directory_uri(); ?>/assets/img/knw.svg" />
<div class="slider">
  <?php if(get_field('slider')): ?>
  <?php while(has_sub_field('slider')): ?>
  <?php $large = wp_get_attachment_image_src(get_sub_field('slide_image'), 'extra-large'); ?>
    <div class="slide" style="background-image: url('<?php echo $large[0]; ?>');">
    <div class="slide--overlay"></div>
    </div>
  <?php endwhile; ?>
  <?php endif; ?>

</div>
<a href='#content' class="scroll-down">
  <h3>Explore</h3>
</a>

<div id="content" class="content">
<?php
  $args = array(
  'post_type' => 'post',
  'tax_query' => array(
  array(
  'taxonomy' => 'post_format',
  'field' => 'slug',
  'terms' =>  'post-format-gallery',
  )
  ),
  'posts_per_page' => 2,
  );
    $temp = $wp_query;
    $wp_query = null;
    $wp_query = new WP_Query();
    $wp_query->query($args);
?>

<blockquote class="quote">
  KNW Phtography specializes in portrait, lifestyle and wedding photography in the San Francisco Bay Area
</blockquote>

<h2 class="recent-work">Latest Galleries</h2>
<section class="gallery-list">
  <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
    <article class="gallery">
      <a href="<?php the_permalink(); ?>">
        <div class="gallery__border">
          <?php if ( has_post_thumbnail() ) {
            $medium = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium');?>
            <img class="gallery__image" src="<?php echo $medium[0]; ?>">
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
<a href="<?php echo get_site_url(); ?>/galleries" class="btn">View More Galleries</a>
<p class="social-aside">To see what I'm currently working on visit my <a href="https://www.facebook.com/pages/Knw-photography/521554914554863?ref=br_tf" target="_blank">Facebook page</a></p>
</div><!-- content-->
<?php get_footer(); ?>
