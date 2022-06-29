<?php
/**
 * Plugin Name:       Dynamic Year Block
 * Plugin URI:        https://github.com/Uberfacil/dynamic-year-block
 * Description:       A block that always displays the current year.
 * Version:           0.1.0
 * Requires at least: 5.9
 * Requires PHP:      7.0
 * Author:            Márcio Duarte
 * Author URI:        https://www.uberfacil.com
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       dynamic-year-block
 * Domain Path:       dynamic-year-block
 *
 * @package           mduarte
 */

defined( 'ABSPATH' ) || exit;

/**
 * Renders the `dynamic-year-block` on the server.
 *
 * @link   https://developer.wordpress.org/reference/functions/current_datetime/
 * @param  array    $attributes Block attributes.
 * @param  string   $content    Block default content.
 * @param  WP_Block $block      Block instance.
 * @return string   Returns the filtered current year wrapped in a <p> tag.
 */
if ( ! function_exists( 'mduarte_render_block_dynamic_year_block' ) ) {
	function mduarte_render_block_dynamic_year_block( $attributes, $content, $block ) {

		// Block classes and attributes.
		$align_class_name   = empty( $attributes['textAlign'] ) ? '' : "has-text-align-{$attributes['textAlign']}";
		$wrapper_attributes = get_block_wrapper_attributes( array( 'class' => $align_class_name ) );

		// Get the current year.
	    $current_date = current_datetime();
		$format       = empty( $attributes['format'] ) ? 'Y' : $attributes['format'];
		$dynamic_year = $current_date->format($format);

		// Return the block markup with the current year.
		return sprintf(
			'<div %1$s><p class="dynamic-year_%2$s">%2$s</div>',
			$wrapper_attributes,
			$dynamic_year
		);
	}
}

/**
 * Registers the `mduarte/dynamic-year-block` block on the server.
 *
 * @link   https://developer.wordpress.org/reference/functions/register_block_type/
 * @return void
 */
if ( ! function_exists( 'mduarte_register_block_dynamic_year_block' ) ) {
	function mduarte_register_block_dynamic_year_block() {
	    if ( ! function_exists( 'register_block_type' ) ) {
	        // The block editor is not available.
	        return;
	    }

	    // Register the block and specify the callback.
	    register_block_type(
	    	__DIR__ . '/build',
	    	array(
	        	'render_callback' => 'mduarte_render_block_dynamic_year_block',
	    	)
	    );

	    wp_set_script_translations( 'mduarte-dynamic-year-block-editor-script-js', 'dynamic-year-block' );
	}
}

add_action( 'init', 'mduarte_register_block_dynamic_year_block' );
