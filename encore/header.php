<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header id="page-header">
  <div class="main-menu__wrapper page-width">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home" class="logo"><?php echo get_custom_logo() ?></a>
    <nav id="main-menu">
	    <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
    </nav>
  </div>
</header>
