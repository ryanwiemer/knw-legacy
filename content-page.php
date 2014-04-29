<?php
/**
 * The template used for displaying page content in page.php
 */
?>
<div class="content">
<?php while ( have_posts() ) : the_post(); ?>
  <?php the_content(); ?>
<?php endwhile; // end of the loop. ?>
