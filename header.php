<?php
/**
 * The Main Header for knw photography
 *
 */
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <meta name="description" content="<?php bloginfo( 'description' ); ?>" />

    <!-- Typekit -->
    <script src="//use.typekit.net/igx3kix.js"></script>
    <script>try{Typekit.load();}catch(e){}</script>

 	 <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" type="image/x-icon" />

    <!--[if lt IE 9]>
			<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/oldie.min.css" />
			<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery.min.js" type="text/javascript"></script>
      <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/selectivizr.min.js" type="text/javascript"></script>
		<![endif]-->

		<!-- Google Analytics -->
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

	<body <?php body_class(); ?>>
		<header>
				<nav class="menu">
					<a href="<?php echo get_site_url(); ?>"><h1><span class="knw-logo1">knw</span> <span class="knw-logo2">photography</span></h1></a>
            <?php wp_nav_menu( array( 'menu' => 'Menu 1', 'container' => 'ul', 'menu_class' => '', 'container_class' => '') ); ?>
				</nav>
				<div class="mobile-menu">
					<div>
						<a href="<?php echo get_site_url(); ?>" class="knw">knw</a> <a id="menu-link" class="menu-link icon-menu"></a>
					</div>
				</div>
		</header>
<div class="wrapper" id="wrapper">
<div class="content">
