<?php
/**
 * Plugin Name: Wondermochi Blocks
 * Plugin URI: https://wondermochi.com
 * Description: Añade bloques de Wondermochi a Gutemberg
 * Version: 1.0.0
 * Author: Wondermochi
 * Author URI: https://wondermochi.com
 * Requires at least: 4.0
 * Tested up to: 4.3
 *
 * Text Domain: wo-blocks
 * Domain Path: /languages/
 */
defined( 'ABSPATH' ) or die( '¡Sin trampas!' );

// Soporte para Gutenberg
add_theme_support('wp-block-styles');

// Permite el ancho sobre el content
add_theme_support('align-wide');

// Soporte a Colores
add_theme_support( 'editor-color-palette', array(
    array(
        'name'  => __( 'Sarada', 'wo-blocks' ),
        'slug'  => 'red',
        'color' => '#E04F50',
    ),
    array(
        'name'  => __( 'Mitsuki', 'wo-blocks' ),
        'slug'  => 'blue',
        'color' => '#0094C4',
    ),
    array(
        'name'  => __( 'Boruto', 'wo-blocks' ),
        'slug'  => 'yellow',
        'color' => '#F7AF2E',
    ),
    array(
        'name'  => __( 'Dark', 'wo-blocks' ),
        'slug'  => 'dark',
        'color' => '#00355F',
    ),
    array(
        'name'  => __( 'Blanco', 'wo-blocks' ),
        'slug'  => 'white',
        'color' => '#FFFFFF',
    ),
) );

// Elimina el color picker
add_theme_support('disable-custom-colors');

// Creando Bloques

//include 'card/index.php';

// Añadiendo estilos genericos al front end
function wo_blocks_style() {
    /** Enqueue Style Sheets */
    wp_enqueue_style( 'wo-blocks-style', plugin_dir_url( __FILE__ ) . 'blocks.css', array(), '0.1', 'screen' );
}
add_action( 'wp_enqueue_scripts', 'wo_blocks_style' );