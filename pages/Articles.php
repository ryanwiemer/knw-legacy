<?php
/**
 * Template Name: Articles Page
 * Description: A Page Template for the Articles Custom Post Type Loop
 */
get_header(); ?>
<div class="content">

<?php
$args = array( 'post_type' => 'Articles', 'posts_per_page' => 5 );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
    the_title();
    echo '<div class="entry-content">';
    the_content();
    echo '</div>';
endwhile;

?>




<?php get_footer(); ?>
