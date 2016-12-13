<?php
/**
 * Template Name: Home Page
 * Description: A Page Template for the Home Page
 */
get_header(); ?>
<a href="#content" class="slider--link">
  <img class="logo--full" src="<?php echo get_template_directory_uri(); ?>/dist/img/KNW_Photography_logo_white.svg" />
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
</a>

<a href="#content" class="scroll-down">
  <h3 class="btn--explore">Explore</h3>
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
  KNW Photography specializes in lifestyle and wedding photography in the San Francisco Bay Area
</blockquote>

<h2 class="recent-work">Latest Galleries</h2>
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
                echo '<div class="ratio-container"> <img src="' . get_bloginfo( 'stylesheet_directory' ) . '/dist/img/placeholder.png"  class="gallery__image"/>';
                }?>
            </div>
          <div class="gallery__overlay">
            <h3 class="gallery__title"><?php the_title(); ?></h3>
          </div>
        </div>
      </a>
    </article>
  <?php endwhile; ?>
</section>
<a href="<?php echo get_site_url(); ?>/galleries" class="btn">View More Galleries</a>
<p class="social-aside">To see what I'm currently working on visit my <a href="https://www.facebook.com/knwphoto/" target="_blank">Facebook page</a></p>
</div><!-- content-->
<?php get_footer(); ?>
