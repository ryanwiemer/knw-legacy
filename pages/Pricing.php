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
			<li class="pricing-table__top-row"><h4 class="pricing-table__list-item">Session Description</h4><h4 class="pricing-table__list-item--time">Time</h4><h4 class="pricing-table__list-item--price">Prices</h4></li>
			<li class="pricing-table__odd"><div class="pricing-table__list-item"><span>Individual Portrait</span>For high school senior photos, maternity, headshots, and others. This session is for 1 individual and allows for 1 outfit change within the hour time slot.</div><div class="pricing-table__list-item--time">1 hour</div><div class="pricing-table__list-item--price">$125</div></li>
			<li class="pricing-table__even"><div class="pricing-table__list-item"><span>Couples</span>This session includes 1 location. I often customize packages for couples so if you need to extend the time or travel to various locations I would love to create a customized package for you.</div><div class="pricing-table__list-item--time">1 hour</div><div class="pricing-table__list-item--price">$150</div></li>
			<li class="pricing-table__odd"><div class="pricing-table__list-item"><span>Family Portrait</span>Family session prices includes up to 4 people (each additional person $25). I love working outdoors but I am also willing to shoot inside your home to accommodate your needs.</div><div class="pricing-table__list-item--time">1 hour</div><div class="pricing-table__list-item--price">$175</div></li>
		</ul>
	</div>
</section>

  <div class="pricing__footnotes">Additional Information
    <ul>
    	<li>Each session comes with USB of edited high resolution color and black and white photos from your session. Printing rights included.</li>
    	<li>A $50 non-refundable deposit is required to secure your session date.</li>
    	<li>Travel fees may apply outside of the San Francisco East Bay Area. Additional time and locations are available upon request on any session.</li>
    </ul>
  </div>

<section class="pricing__weddings pricing__weddings--last">
	<div class="pricing-table">
	<h3 class="pricing-table__header">Wedding Packages</h3>
		<ul class="pricing-table__list">
			<li class="pricing-table__top-row"><h4 class="pricing-table__list-item">Session Description</h4><h4 class="pricing-table__list-item--time">Time</h4><h4 class="pricing-table__list-item--price">Prices</h4></li>
			<li class="pricing-table__odd"><div class="pricing-table__list-item"><span>Engagements</span>This session includes 1 - 2 locations and 1 - 2 outfits for the engaged couple.</div><div class="pricing-table__list-item--time">1.5 hours</div><div class="pricing-table__list-item--price">$200</div></li>
			<li class="pricing-table__even"><div class="pricing-table__list-item"><span>Bridals / Formals</span>This session includes 1 location for a bride / groom or a bride and groom in formal attire. The session can be done prior to the wedding or on the actual wedding day.</div><div class="pricing-table__list-item--time">2 hours</div><div class="pricing-table__list-item--price">$250</div></li>
			<li class="pricing-table__odd"><div class="pricing-table__list-item"><span>Wedding Package 1</span>This package includes 4 hours of wedding day coverage. Also included is a bridal / formal session.</div><div class="pricing-table__list-item--time">6 hours</div><div class="pricing-table__list-item--price">$1300</div></li>
			<li class="pricing-table__even"><div class="pricing-table__list-item"><span>Wedding Package 2</span>This package includes 6 hours of wedding day coverage. Also included are engagement photos and a bridal / formal session.</div><div class="pricing-table__list-item--time">9 hours</div><div class="pricing-table__list-item--price">$1850</div></li>
			<li class="pricing-table__odd"><div class="pricing-table__list-item"><span>Wedding Package 3</span>This package includes a full day wedding coverage. Also included are engagement photos and a bridal / formal session.</div><div class="pricing-table__list-item--time">TBD</div><div class="pricing-table__list-item--price">starts at $2000</div></li>
		</ul>
	</div>
</section>

<div class="pricing__footnotes">Additional Information
  <ul>
  	<li>Each wedding package comes with a USB of edited high resolution color and black and white photos from your session. Printing rights included.</li>
  	<li>A $250 non-refundable deposit is required to secure your wedding date.</li>
  	<li>Travel fees may apply outside of the San Francisco East Bay Area. Additional time and locations are available upon request on any package.</li>
  	<li>Popular travel locations outside of the San Francisco Bay Area include Las Vegas, Reno, Lake Tahoe, Phoenix, and Salt Lake City.</li>
  </ul>
</div>
<?php get_footer(); ?>
