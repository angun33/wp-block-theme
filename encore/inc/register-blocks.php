<?php

add_filter( 'block_categories', 'encore_block_categories', 10, 2 );
function encore_block_categories( $categories ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'theme',
				'title' => 'Theme'
			),
		)
	);
}

add_action( 'init', 'encore_register_blocks' );
function encore_register_blocks() {
	$script_asset = require( __DIR__ . "/../blocks/index.asset.php" );
	wp_register_script(
		'encore-blocks',
		get_template_directory_uri() . "/blocks/index.js",
		$script_asset['dependencies'],
		$script_asset['version']
	);

	wp_register_style(
		'encore-blocks',
		get_template_directory_uri() . "/blocks/index.css",
		array(),
		filemtime( __DIR__ . "/../blocks/index.css" )
	);

	$block = array(
		'editor_script' => 'encore-blocks',
		'editor_style' => 'encore-blocks'
	);
//	register_block_type( "encore/section-content", $block);
//	register_block_type( "encore/section-image", $block);
//	register_block_type( "encore/section-pipeline", $block);
//	register_block_type( "encore/section-progress", $block);
//	register_block_type( "encore/section-progress-project", $block);
//	register_block_type( "encore/section-progress-product", $block);
//	register_block_type( "encore/section-team", $block);
//	register_block_type( "encore/page-hero", $block);
}