<?php

add_action( 'after_setup_theme', 'encore_setup' );
function encore_setup() {
	load_theme_textdomain( 'encore', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'script', 'style', ) );

	add_theme_support( 'custom-logo' );// Custom logo.
	$logo_width  = 120;
	$logo_height = 90;

	// If the retina setting is active, double the recommended width and height.
	if ( get_theme_mod( 'retina_logo', false ) ) {
		$logo_width  = floor( $logo_width * 2 );
		$logo_height = floor( $logo_height * 2 );
	}

	add_theme_support(
		'custom-logo',
		array(
			'height'      => $logo_height,
			'width'       => $logo_width,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	global $content_width;
	if ( ! isset( $content_width ) ) { $content_width = 1200; }

	register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu', 'encore' ) ) );
}

add_action( 'wp_enqueue_scripts', 'encore_load_scripts' );
function encore_load_scripts() {
	wp_enqueue_script('encore-script', get_template_directory_uri() . '/index.js', [] );
	wp_enqueue_style( 'encore-style', get_stylesheet_uri() );
}

add_filter( 'document_title_separator', 'encore_document_title_separator' );
function encore_document_title_separator( $sep ) {
	$sep = '|';
	return $sep;
}

add_filter( 'the_title', 'encore_title' );
function encore_title( $title ) {
	if ( $title == '' ) {
		return '...';
	}

	return $title;
}

add_filter( 'the_content_more_link', 'encore_read_more_link' );
function encore_read_more_link() {
	if ( ! is_admin() ) {
		return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">...</a>';
	}
}

add_filter( 'excerpt_more', 'encore_excerpt_read_more_link' );
function encore_excerpt_read_more_link( $more ) {
	if ( ! is_admin() ) {
		global $post;
		return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">...</a>';
	}
}

add_filter( 'intermediate_image_sizes_advanced', 'encore_image_insert_override' );
function encore_image_insert_override( $sizes ) {
	unset( $sizes['medium_large'] );
	return $sizes;
}

add_action( 'widgets_init', 'encore_widgets_init' );
function encore_widgets_init() {
	register_sidebar( array(
		'name' => esc_html__( 'Footer Widget Area', 'encore' ),
		'id' => 'footer-widget-area',
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}

add_action( 'wp_head', 'encore_pingback_header' );
function encore_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s" />' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}

require_once __DIR__ . '/inc/register-blocks.php';