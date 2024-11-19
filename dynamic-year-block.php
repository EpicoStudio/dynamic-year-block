<?php
/**
 * Plugin Name:       Dynamic Year Block
 * Plugin URI:        https://github.com/EpicoStudio/dynamic-year-block
 * Description:       A block that always displays the current year in your copyright footer notice.
 * Version:           0.6.5
 * Requires at least: 5.9
 * Requires PHP:      7.4
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
		$alignClass = isset( $attributes['alignment'] ) ? ' has-text-align-' . sanitize_html_class( $attributes['alignment'] ) : '';

		// Get the current year.
		$current_date = current_datetime();
		$format       = isset( $attributes['format'] ) ? sanitize_text_field( $attributes['format'] ) : 'Y';
		$dynamic_year = esc_html( $current_date->format( $format ) );

		// Get the optional text BEFORE the year.
		$before      = $attributes['beforeElement'] !== null ? esc_html( $attributes['beforeElement'] ) : '';
		$beforeStart = ! empty( $attributes['beforeElement'] ) ? '<span class="dynamic-year-before">' : '';
		$beforeEnd   = ! empty( $attributes['beforeElement'] ) ? '</span>' : '';

		// Get the optional text AFTER the year. Check if the privacy policy link should be displayed instead of the user defined text.
		$after = ! empty( $attributes['afterElement'] ) ? esc_html( $attributes['afterElement'] ) : '';

		// Define the text and the link of the privacy policy page.
		$privacyPolicyText  = ! empty( $attributes['privacyPolicy'] ) ? esc_html( $attributes['privacyPolicy'] ) : '';
		$privacyPolicyLink  = get_privacy_policy_url();

		// Determine if the privacy policy link should be displayed
		if ( $privacyPolicyLink && ! empty( $privacyPolicyText ) ) {
			$after .= ' <a href="' . esc_url( $privacyPolicyLink ) . '" target="_blank" aria-label="' . esc_attr__( 'Privacy Policy', 'dynamic-year-block' ) .'" rel="noopener noreferrer">' . esc_html( $privacyPolicyText ) . '</a>';
		}

		// Determine if the `afterElement` content should be wrapped.
		$afterStart = ! empty( $attributes['afterElement'] ) ? '<span class="dynamic-year-after">' : '';
		$afterEnd   = ! empty( $attributes['afterElement'] ) ? '</span>' : '';

		// Define the `aria-current` attribute.
		$aria_current = '';
		if ( is_front_page() ) :
			$aria_current = ' aria-current="page"';
		elseif ( is_home() && ( (int) get_option( 'page_for_posts' ) !== get_queried_object_id() ) ) :
			$aria_current = ' aria-current="page"';
		endif;

		// Check if the site title is included and define the markup.
		$siteName   = ( $attributes['displaySiteName'] !== false ) ? ' <a target="_self" rel="home" href="' . esc_url( get_bloginfo( 'url', 'display' ) ) . '"' . $aria_current .  '>' . esc_html( get_bloginfo( 'name', 'display' ) ) . '</a>' : '';

		// Markup.
		$markup  = '<div ' . $wrapper_attributes . '>';
		$markup .= '<p class="dynamic-year-' . esc_attr( $dynamic_year ) . esc_attr( $alignClass ) . '">';
		$markup .= $beforeStart . wp_kses_post( force_balance_tags( $before ) ) . $beforeEnd;
		$markup .= esc_attr( $dynamic_year );
		$markup .= $siteName;
		$markup .= $afterStart . wp_kses_post( force_balance_tags( $after ) ) . $afterEnd;
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
		wp_add_inline_script( 'epico-dynamic-year-block-editor-script', 'const dynamicYearBlockData = ' . wp_json_encode( array(
			'siteTitle' => esc_html( get_bloginfo( 'name' ) ),
			'siteUrl' => esc_url( get_bloginfo( 'url' ) ),
		) ), 'before' );

		// Load available translations ($path is not needed here, as this is hosted on WordPress.org).
		wp_set_script_translations( 'epico-dynamic-year-block-editor-script-js', 'dynamic-year-block' );
	}
}
add_action( 'init', 'epico_register_block_dynamic_year_block' );

/**
 * Hooks the Dynamic Year block in the Group block, in the footer context.
 *
 * @link   https://developer.wordpress.org/reference/hooks/hooked_block_types/
 * @since  0.6.2
 * @return array
 */
function epico_block_hooks( $hooked_blocks, $position, $anchor_block, $context ) {

	// Template/Template Part hooks.
	if ( $context instanceof WP_Block_Template ) {

		// Add the block after the site title on the footer, if present.
		if (
			'core/site-title' === $anchor_block &&
			'after' === $position &&
			'footer' === $context->area
		) {
			$hooked_blocks[] = 'epico/dynamic-year-block';
		}
	}

	return $hooked_blocks;
}
add_filter( 'hooked_block_types', 'epico_block_hooks', 10, 4 );
