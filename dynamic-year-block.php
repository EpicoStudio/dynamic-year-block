<?php
/**
 * Plugin Name:       Dynamic Year Block
 * Plugin URI:        https://github.com/EpicoStudio/dynamic-year-block
 * Description:       A block that always displays the current year.
 * Version:           0.5.0
 * Requires at least: 5.9
 * Requires PHP:      7.0
 * Author:            Márcio Duarte
 * Author URI:        https://epico.studio
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       dynamic-year-block
 *
 * @package           epico
 */

defined( 'ABSPATH' ) || exit;

add_action( 'init', 'wpdocs_load_textdomain' );

function wpdocs_load_textdomain() {
	load_plugin_textdomain( 'wpdocs_textdomain', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

/**
 * Renders the `dynamic-year-block` on the server.
 *
 * @link   https://developer.wordpress.org/reference/functions/current_datetime/
 * @param  array    $attributes Block attributes.
 * @param  string   $content    Block default content.
 * @param  WP_Block $block      Block instance.
 * @return string   Returns the filtered current year wrapped in a <p> tag.
 */
if ( ! function_exists( 'epico_render_block_dynamic_year_block' ) ) {
	function epico_render_block_dynamic_year_block( $attributes, $content, $block ) {

		// Block wrapper classes and styles.
		$wrapper_attributes = get_block_wrapper_attributes();

		// Get the alignment attribute for the paragraph.
		$alignClass = isset( $attributes['alignment'] ) ? ' has-text-align-' . $attributes['alignment'] : '';

		// Get the current year.
		$current_date = current_datetime();
		$format       = isset( $attributes['format'] ) ? $attributes['format'] : 'Y';
		$dynamic_year = $current_date->format($format);

		// Get the optional text BEFORE the year.
		$before      = empty( $attributes['beforeElement'] ) ? '' : $attributes['beforeElement'];
		$beforeStart = empty( $attributes['beforeElement'] ) ? '' : '<span class="dynamic-year-before">';
		$beforeEnd   = empty( $attributes['beforeElement'] ) ? '' : '</span>' . ( 'y' === $format ? '' : ' ' );

		// Get the optional text AFTER the year.
		$after      = empty( $attributes['afterElement'] )   ? '' : $attributes['afterElement'];
		$afterStart = empty( $attributes['afterElement'] )   ? '' : ' <span class="dynamic-year-after">';
		$afterEnd   = empty( $attributes['afterElement'] )   ? '' : '</span>';

		// Markup.
		$markup  = '<div ' . $wrapper_attributes . '>';
		$markup .= '<p class="dynamic-year-' . esc_attr( $dynamic_year ) . esc_attr( $alignClass ) . '">';
		$markup .= $beforeStart . force_balance_tags( wp_kses_post( $before ) ) . $beforeEnd;
		$markup .= esc_attr( $dynamic_year );
		$markup .= $afterStart . force_balance_tags( wp_kses_post( $after ) ) . $afterEnd;
		$markup .= '</p>';
		$markup .= '</div>';

		return $markup;
	}
}


/**
 * Registers the `epico/dynamic-year-block` block on the server.
 *
 * @link   https://developer.wordpress.org/reference/functions/register_block_type/
 * @return void
 */
if ( ! function_exists( 'epico_register_block_dynamic_year_block' ) ) {
	function epico_register_block_dynamic_year_block() {
		if ( ! function_exists( 'register_block_type' ) ) {
			// The block editor is not available.
			return;
		}

		// Register the block and specify the callback.
		register_block_type(
			__DIR__ . '/build',
			array(
				'api_version' => 3,
				'render_callback' => 'epico_render_block_dynamic_year_block',
			)
		);

		// Load available translations ($path is not needed here, as this is hosted on WordPress.org).
		wp_set_script_translations( 'epico-dynamic-year-block-editor-script-js', 'dynamic-year-block' );
	}
}
add_action( 'init', 'epico_register_block_dynamic_year_block' );
