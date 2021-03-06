<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package _s
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<script src="//cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<p class="site-description"><?php bloginfo( 'description' ); ?></p>
		</div>

		<nav id="site-navigation" class="main-navigation navbar navbar-default bush-nav" role="navigation">
			<div class="container">
			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', '_s' ); ?></a>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-main">
                    <span class="sr-only"><?php _e('Toggle navigation', '_s'); ?></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--<a class="navbar-brand" href="#">Brand</a>-->
            </div>

            <div class="collapse navbar-collapse" id="navbar-collapse-main">
                <?php
                wp_nav_menu( array(
                        'theme_location'  => 'primary',
                        'container'       => false,
                        'menu_class'      => 'nav navbar-nav',//  navbar-right
                        'walker'          => new Bootstrap_Nav_Menu(),
                    )
                );
                get_search_form();
                ?>
            </div><!-- /.navbar-collapse -->
			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
	<div class="container" id="bush-page-content">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
	<div id="content" class="site-content">
