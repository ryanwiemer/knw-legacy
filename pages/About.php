<?php
/**
 * Template Name: About Page
 * Description: A Page Template for the About Page
 */
get_header(); ?>

<div class="hero hero--texture">
  <h2 class="hero__title"><?php echo get_the_title(); ?></h2>
</div>

<div class="content">

<section class="about-container">

			<div class="about-collage about-collage--bio">
			<div class="about-collage__ornament"></div>
		  		<div class="about-collage__content">
		  			<p><span>M</span>y name is Kirsten Noelle Wiemer and I started knw
		  			photography to share my love for capturing moments with others. I have
		  			always been a creative person and photography is one way I like to
		  			show my creativity. Recently I discovered a love for natural
		  			light photography and working with people. Through my photography
		  			I hope to capture real connections and emotions of everyone I work for.
		  			</p>

  					<p>Outside of photography some things I love include making pizza,
  					meeting new people and working on the potter’s wheel. I’m a recent
  					college grad and also a recent transplant to the Bay Area along with
  					my husband Ryan. We are currently living just outside of San Francisco
  					in the East Bay and I absolutely love exploring the area. Nothing
  					beats Northern California weather!</p>

  					<p>Online I like to share my life through my personal blog where
  					I share my adventures and other ramblings of my mind. If you’d like to
  					find out more about me you can check out my personal writings on
  					<a href="http://www.kandrblog.com">K&amp;R Blog</a>. I look forward to
  					hearing from you regarding new photo opportunities or even if it’s
  					just to say “hi.”
  					</p>
		  		</div>
			</div>

			<div class="about-collage about-collage--portrait">
		  		<div class="about-collage__content">
		  			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/kirsten-noelle-wiemer-knw-photography.jpg" alt="Kirsten Noelle Wiemer knw photography San Fancisco East Bay photographer"/>
		  			<div class="about-collage--portrait__container">
		  				<h3>Kirsten Wiemer</h3>
		  			</div>
		  		</div>
			</div>

				<div class="about-collage about-collage--map">
				  	<div class="about-collage__content">
				  		<div class="about-collage--map__img">
				  			<span class="city">The San Francisco Bay</span>
				  		</div>
					</div>
				</div>

			<div class="about-collage about-collage--beach">
		  		<div class="about-collage__content">
		  			<img src="<?php echo get_template_directory_uri(); ?>/assets//img/half-moon-bay-beach-san-francisco-bay-area.jpg" alt="Half Moon Bay beach near the San Francisco Bay Area" />
		  		</div>
			</div>
		</section>
<?php get_footer(); ?>
