<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package DJP2015
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<nav id="nav" style="display: none;">
	<div class="container">
    <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="nav__inner">
            <?php
                $filter_post = array(
                    'theme_location'  => 'primary',
                    'menu'            => '',
                    'container'       => '',
                    'container_class' => '',
                    'container_id'    => '',
                    'menu_class'      => 'nav navbar-nav',
                    'menu_id'         => '',
                    'echo'            => true,
                    'fallback_cb'     => 'wp_page_menu',
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth'           => 0,
                    'walker'          => '',
                    'append'		  => ''
                );
                wp_nav_menu( $filter_post );
            ?>
        </div>
    </div>
</nav><!-- #navigation -->

<header id="header" class="header" role="banner">
    <div class="container">
        <div class="brand">
            <h1>
                <a class="clearfix" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>" rel="home">
                    <img class="brand__img" src="<?php echo get_template_directory_uri(); ?>/img/logo.png">
                   	<?php if(!is_home()){ ?>
                   		<span class="brand__currntPage">/ <?php echo the_title(); ?></span>
                   	<?php } ?>
                    <span class="brand__name"><?php bloginfo( 'name' ); ?></span>
                    <small class="brand__tagline"><br><?php bloginfo( 'description' ); ?></small>
                </a>
            </h1>
        </div><!-- .site-branding -->
        
        <a class="btn" id="navTrigger">
            <span class="sr-only">Toggle navigation</span>
            <i class="fa fa-bars"></i>
        </a>
    </div>
</header><!-- #header -->

<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'djp2015' ); ?></a>
    <div id="content" class="clearfix">