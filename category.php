<?php
/**
 * The template for Category Page
 *
 */

get_header(); ?>

<div class="hero hero--texture">
  <h2 class="hero__title"><?php echo get_the_title(); ?></h2>
</div>

<div class="content">

    <ul class="thumbnail-list">
    <!-- the loop -->
    <?php while ( have_posts() ) : the_post(); ?>

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

<?php get_footer(); ?>
