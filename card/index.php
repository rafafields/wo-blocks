<?php

defined( 'ABSPATH' ) || exit;

/**
 * Load all translations for our plugin from the MO file.
*/
add_action( 'init', 'wo_blocks_card_load_textdomain' );

function wo_blocks_card_load_textdomain() {
	load_plugin_textdomain( 'wo-blocks', false, basename( __DIR__ ) . '/languages' );
}

/**
 * Registers all block assets so that they can be enqueued through wo in
 * the corresponding context.
 *
 * Passes translations to JavaScript.
 */
function wo_blocks_card_register_block() {

	if ( ! function_exists( 'register_block_type' ) ) {
		// wo is not active.
		return;
	}
	
	wp_register_script(
		'wo-blocks-card',
		plugins_url( 'block.js', __FILE__ ),
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'underscore' ),
		filemtime( plugin_dir_path( __FILE__ ) . 'block.js' )
	);

	wp_register_style(
		'wo-blocks-card',
		plugins_url( 'style.css', __FILE__ ),
		array( ),
		filemtime( plugin_dir_path( __FILE__ ) . 'style.css' )
	);

	register_block_type( 'wo-blocks/card', array(
		'style' => 'wo-blocks-card',
		'script' => 'wo-blocks-card',
	) );

	/*
	 * Pass already loaded translations to our JavaScript.
	 *
	 * This happens _before_ our JavaScript runs, afterwards it's too late.
	 */
	wp_add_inline_script(
		'wo-blocks-card',
		sprintf( 
			'var wo_blocks_card = { localeData: %s };', 
			json_encode( gutenberg_get_jed_locale_data( 'wo-blocks' ) ) 
		),
		'before'
	);

} 
add_action( 'init', 'wo_blocks_card_register_block' );