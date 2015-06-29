<?php
/**
 * Template Name: About Page
 * Description: A Page Template for the About Page
 */
get_header(); ?>

<div class="content">

  <h2 class="page__title"><?php echo get_the_title(); ?></h2>

<section class="about-container">

	<div class="about-collage about-collage--bio">
  			<p><span>M</span>y name is Kirsten Noelle Wiemer and I started KNW
  			Photography to share my love of capturing moments with others. I have
  			always been a creative person and photography allows me to create
        images that show real connections and emotions. I particularly
        enjoy using natural light and working with clients
        that share my passion for quality work.
  			</p>

				<p>Outside of photography some things I love include making pizza,
				meeting new people and working on the potter’s wheel. I currently live
        in the San Franisco Bay Area along with my husband Ryan. Online I
        like to share my life through my personal blog where I take
        candid photos and talk about whatever is on my mind. To read more about
        that you can visit <a href="http://www.kandrblog.com">K&amp;R Blog</a>.
        I look forward to hearing from you regarding new photo opportunities
        or even if it’s just to say “hello”.</p>

        <h3 class="signature">Kirsten Noelle Wiemer</h3>
	</div>

  <div class="about-collage about-collage--portrait">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/kirsten-noelle-wiemer-knw-photography.jpg" alt="Kirsten Noelle Wiemer knw photography San Fancisco East Bay photographer"/>
  </div>
	</section>
  </div><!-- content-->
<?php get_footer(); ?>
