<?php
/**
 * Plugin Name:       Dynamic Year Block
 * Plugin URI:        https://github.com/EpicoStudio/dynamic-year-block
 * Description:       A block that always displays the current year in your copyright footer notice.
 * Version:           0.6.1
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
		$before      = $attributes['beforeElement'] !== null ? $attributes['beforeElement'] : '';
		$beforeStart = !empty($attributes['beforeElement']) ? '<span class="dynamic-year-before">' : '';
		$beforeEnd   = !empty($attributes['beforeElement']) ? '</span>' : '';

		// Get the optional text AFTER the year.
		$after      = $attributes['afterElement'] !== null ? $attributes['afterElement'] : '';
		$afterStart = !empty($attributes['afterElement']) ? '<span class="dynamic-year-after">' : '';
		$afterEnd   = !empty($attributes['afterElement']) ? '</span>' : '';

		// Define the aria-current attribute.
		$aria_current = '';
		if ( is_front_page() ) :
			$aria_current = ' aria-current="page"';
		elseif ( is_home() && ( (int) get_option( 'page_for_posts' ) !== get_queried_object_id() ) ) :
			// Edge case where the Reading settings has a posts page set but not a static homepage.
			$aria_current = ' aria-current="page"';
		endif;

		// Check if the site title is included and define the markup.
		$siteName   = ( $attributes['displaySiteName'] !== false ) ? ' <a target="_self" rel="home" href="' .  get_bloginfo( 'url', 'display' ) . '"' . $aria_current .  '>' . get_bloginfo( 'name', 'display' ) . '</a>' : '';

		// Markup.
		$markup  = '<div ' . $wrapper_attributes . '>';
		$markup .= '<p class="dynamic-year-' . esc_attr( $dynamic_year ) . esc_attr( $alignClass ) . '">';
		$markup .= $beforeStart . force_balance_tags( wp_kses_post( $before ) ) . $beforeEnd;
		$markup .= esc_attr( $dynamic_year );
		$markup .= $siteName;
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
		if ( ! function_exists( 'register_block_type' ) ) :
			// The block editor is not available.
			return;
		endif;

		// Register the block and specify the callback.
		register_block_type(
			__DIR__ . '/build',
			array(
				'api_version' => 3,
				'render_callback' => 'epico_render_block_dynamic_year_block',
			)
		);

		// Add variables for usage on the block editor.
		wp_add_inline_script( 'epico-dynamic-year-block-editor-script', 'const dynamicYearBlockData = ' . json_encode( array(
			'siteTitle' => get_bloginfo( 'name' ),
			'siteUrl' => get_bloginfo( 'url' ),
		) ), 'before' );

		// Load available translations ($path is not needed here, as this is hosted on WordPress.org).
		wp_set_script_translations( 'epico-dynamic-year-block-editor-script-js', 'dynamic-year-block' );
	}
}
add_action( 'init', 'epico_register_block_dynamic_year_block' );
