<?php
/**
 * The Main Header for KNW Photography
 *
 */
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=yes">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <script src="//use.typekit.net/igx3kix.js"></script>
    <script>try{Typekit.load();}catch(e){}</script>
 	 <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon" />
    <script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		  ga('create', 'UA-46446221-1', 'knw.io');
		  ga('send', 'pageview');
		</script>
    <?php wp_head(); ?>
</head>

	<body <?php body_class('loading'); ?>>
	<header class="headroom">
			<nav class="menu">
				<a class="logo" href="<?php echo get_site_url(); ?>">
					<h1><img src="<?php echo get_template_directory_uri(); ?>/dist/img/KNW_Photography_logo_black.svg" /></h1>
				</a>
          <?php wp_nav_menu( array( 'menu' => 'Menu 1', 'container' => 'ul', 'menu_class' => '', 'container_class' => '') ); ?>
			</nav>
	</header>
