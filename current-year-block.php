<?php
/**
 * Plugin Name:       Current Year Block
 * Plugin URI:        https://www.uberfacil.com
 * Description:       A simple block that always displays the current year.
 * Version:           0.1.0
 * Requires at least: 5.9
 * Requires PHP:      7.0
 * Author:            Márcio Duarte
 * Author URI:        https://www.uberfacil.com
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       current-year-block
 * Domain Path:       current-year-block
 *
 * @package           mduarte
 */

defined( 'ABSPATH' ) || exit;

/**
 * Renders the `current-year-block` on the server.
 *
 * @link   https://developer.wordpress.org/reference/functions/current_datetime/
 * @param  array    $attributes Block attributes.
 * @param  string   $content    Block default content.
 * @param  WP_Block $block      Block instance.
 * @return string   Returns the filtered current year wrapped in a <p> tag.
 */
if ( ! function_exists( 'mduarte_render_block_current_year_block' ) ) {
	function mduarte_render_block_current_year_block( $attributes, $content, $block ) {

		// Block classes and attributes.
		$align_class_name   = empty( $attributes['textAlign'] ) ? '' : "has-text-align-{$attributes['textAlign']}";
		$wrapper_attributes = get_block_wrapper_attributes( array( 'class' => $align_class_name ) );

		// Get the current year.
	    $current_date = current_datetime();
		$format       = empty( $attributes['format'] ) ? 'Y' : $attributes['format'];
		$current_year = $current_date->format($format);

		// Return the block markup.
		return sprintf(
			'<div %1$s><p class="current-year_%2$s">%2$s</div>',
			$wrapper_attributes,
			$current_year
		);
	}
}

/**
 * Registers the `mduarte/current-year-block` block on the server.
 *
 * @link   https://developer.wordpress.org/reference/functions/register_block_type/
 * @return void
 */
if ( ! function_exists( 'mduarte_register_block_current_year_block' ) ) {
	function mduarte_register_block_current_year_block() {
	    if ( ! function_exists( 'register_block_type' ) ) {
	        // The block editor is not available.
	        return;
	    }

	    // Register the block and specify the callback.
	    register_block_type(
	    	__DIR__ . '/build',
	    	array(
	        	'render_callback' => 'mduarte_render_block_current_year_block',
	    	)
	    );

	    wp_set_script_translations( 'mduarte-current-year-block-editor-script-js', 'current-year-block' );
	}
}

add_action( 'init', 'mduarte_register_block_current_year_block' );
