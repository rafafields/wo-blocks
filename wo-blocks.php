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

// Soporte extra para imagenes
add_theme_support('align-wide');

// Soporte para nuevos tamaños de fuentes

add_theme_support( 'editor-font-sizes', array(
    array(
        'name' => __( 'small', 'vidafreelancer' ),
        'shortName' => __( 'S', 'vidafreelancer' ),
        'size' => 12,
        'slug' => 'small'
    ),
    array(
        'name' => __( 'regular', 'vidafreelancer' ),
        'shortName' => __( 'M', 'vidafreelancer' ),
        'size' => 16,
        'slug' => 'regular'
    ),
    array(
        'name' => __( 'large', 'vidafreelancer' ),
        'shortName' => __( 'L', 'vidafreelancer' ),
        'size' => 36,
        'slug' => 'large'
    ),
    array(
        'name' => __( 'larger', 'vidafreelancer' ),
        'shortName' => __( 'XL', 'vidafreelancer' ),
        'size' => 48,
        'slug' => 'larger'
    ),
    array(
        'name' => __( 'xlarger', 'vidafreelancer' ),
        'shortName' => __( 'XXL', 'vidafreelancer' ),
        'size' => 70,
        'slug' => 'xlarger'
    )
) );

// Soporte a Colores
add_theme_support( 'editor-color-palette', array(
    array(
        'name'  => __( 'Azul', 'vidafreelancer' ),
        'slug'  => 'azul',
        'color' => '#25a5d5',
    ),
    array(
        'name'  => __( 'Verde', 'vidafreelancer' ),
        'slug'  => 'verde',
        'color' => '#82bd58',
    ),
    array(
        'name'  => __( 'Gris', 'vidafreelancer' ),
        'slug'  => 'gris',
        'color' => '#414141',
    ),
    array(
        'name'  => __( 'Blanco', 'vidafreelancer' ),
        'slug'  => 'blanco',
        'color' => '#FFFFFF',
    ),
) );

add_theme_support('disable-custom-colors');

// Creando Bloques

include 'card/index.php';

/**
 * Enqueue Plugin Styles
 */
function wo_blocks_style() {
    /** Enqueue Style Sheets */
    wp_enqueue_style( 'wo-blocks-style', plugin_dir_url( __FILE__ ) . 'blocks.css', array(), '0.1', 'screen' );
}
add_action( 'wp_enqueue_scripts', 'wo_blocks_style' );