<?php
/**
 * Template Name: Pricing Page
 * Description: A Page Template for the Pricing Page
 */
get_header(); ?>

<div class="hero hero--purple">
  <h2 class="hero__title"><?php echo get_the_title(); ?></h2>
</div>

<div class="content">

<section class="pricing__portraits">
	<div class="pricing-table">
	  <h3 class="pricing-table__header">Portrait Packages</h3>
		<ul class="pricing-table__list">
			<li class="pricing-table__top-row"><h4 class="pricing-table__list-item">Session Description</h4><h4 class="pricing-table__list-item--price">Price</h4></li>
			<li class="pricing-table__odd"><div class="pricing-table__list-item"><span>Individual Portrait</span>For high school senior photos, maternity, headshots, and others. This session is for an individual for 60 minutes.</div><div class="pricing-table__list-item--price">$250</div></li>
			<li class="pricing-table__even"><div class="pricing-table__list-item"><span>Couples / Engagements </span>This session includes 1 location for 60 - 90 minutes. I often customize packages for couples so if you need to extend the time or travel to various locations I would love to create a customized package for you.</div><div class="pricing-table__list-item--price">$300</div></li>
			<li class="pricing-table__odd"><div class="pricing-table__list-item"><span>Family Portrait</span>Family sessions include up to 4 people (each additional person $25) for 60 minutes. I love working outdoors but I am also willing to shoot inside your home to accommodate your needs.</div><div class="pricing-table__list-item--price">$325</div></li>
		</ul>
	</div>
</section>

  <div class="pricing__footnotes">Additional Information
    <ul>
      <li>A $100 non-refundable deposit is required to secure your session date.</li>
    	<li>Each portrait package comes with a USB of edited high resolution color and black and white photos from your session. Printing rights included.</li>
    	<li>Travel fees may apply outside of the San Francisco East Bay Area. Additional time and locations are available upon request on any session.</li>
    </ul>
  </div>

<section class="pricing__weddings pricing__weddings--last">
	<div class="pricing-table">
	<h3 class="pricing-table__header">Wedding Packages</h3>
		<ul class="pricing-table__list">
			<li class="pricing-table__top-row"><h4 class="pricing-table__list-item">Session Description</h4><h4 class="pricing-table__list-item--price">Price</h4></li>
			<li class="pricing-table__odd"><div class="pricing-table__list-item"><span>Bridals / Formals</span>This session includes 1 location for a bride / groom or a bride and groom in formal attire for 60 minutes. The session can be done prior to the wedding or on the actual wedding day.</div><div class="pricing-table__list-item--price">$350</div></li>
			<li class="pricing-table__even"><div class="pricing-table__list-item"><span>Basic Wedding Package</span>This package includes 4 hours of wedding day coverage. Also included is a bridal / formal session.</div><div class="pricing-table__list-item--price">$1500</div></li>
			<li class="pricing-table__odd"><div class="pricing-table__list-item"><span>Complete Wedding Package</span>This package includes 6 hours of wedding day coverage. Also included are engagement photos and a bridal / formal session.</div><div class="pricing-table__list-item--price">$2100+</div></li>
      <p class="pricing-table__email">Not finding a good fit? I am also happy to create a custom wedding package just for you! Please <a href="/contact">contact me</a> with details of your wedding to discuss a customized package.</p>
    </ul>
	</div>
</section>

<div class="pricing__footnotes">Additional Information
  <ul>
    <li>A $500 non-refundable deposit is required to secure your wedding date.</li>
  	<li>Each wedding package comes with a USB of edited high resolution color and black and white photos from your session. Printing rights included.</li>
  	<li>Travel fees may apply outside of the San Francisco East Bay Area. Additional time and locations are available upon request on any package.</li>
  	<li>Popular travel locations outside of the San Francisco Bay Area include Las Vegas, Reno, Lake Tahoe, Phoenix, and Salt Lake City.</li>
  </ul>
</div>
<?php get_footer(); ?>
