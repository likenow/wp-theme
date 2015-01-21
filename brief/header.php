<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,minimum-scale=1" />
	<?php if(is_home()): ?>
	<title><?php bloginfo('name');  ?> <?php  bloginfo( 'description' ); ?></title>
	<?php else: ?>
	<title><?php wp_title('&laquo;', true, 'right'); ?><?php bloginfo('name'); ?> </title>
	<?php endif ?>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="alternate" type="application/rss+xml" title="RSS <?php bloginfo('name'); ?>" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/rss+xml" title="RSS <?php bloginfo('name'); ?> Comments" href="<?php bloginfo('comments_rss2_url'); ?>" />
	
	<!--[if lte IE 7]>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/lte-ie7.js"></script>
	<![endif]-->
	<!--[if lt IE 9]>
	<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/html5.js"></script>
	<![endif]-->	

	<?php wp_head(); ?>
</head>
<body>	
	<header id="top-header">
		<nav id="top-nav" class="fix">
			<a href="<?php bloginfo('url'); ?>" title="kailee's blog" rel="home" class="logo-img db">
				<img src="<?php bloginfo( 'template_directory' ); ?>/images/kl.png" alt="kailee">
			</a>
			<span id="myname">{kailee}</span>		
			<a id="menu-button" class="dn" href="#"><span class="icon-menu"></span></a>			
					
			<?php wp_nav_menu(array(
				'theme_location' => 'header-menu',
				'menu' => '',
				'container' => 'true',
				'container_class' => '',
				'container_id' => '',
				'menu_class' => 'menu',
				));
			?>		
			<?php include(TEMPLATEPATH.'/searchform.php'); ?>					
		</nav>		
	</header>