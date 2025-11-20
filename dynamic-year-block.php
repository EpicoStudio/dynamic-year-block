<?php
/**
 * Plugin Name:       Dynamic Year Block
 * Plugin URI:        https://github.com/EpicoStudio/dynamic-year-block
 * Description:       Display a copyright notice in your footer with the current year.
 * Version:           1.0.1
 * Requires at least: 6.4
 * Tested up to:      6.9
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

// This plugin's path.
if ( ! defined( 'DYB_DIR' ) ) {
	define( 'DYB_DIR', plugin_dir_path( __FILE__ ) );
}

# ----------  HOOK REGISTRATION  ----------


// Registers the `epico/dynamic-year-block` block on the server.
add_action( 'init', 'epico_register_block_dynamic_year_block' );

// Hooks the Dynamic Year block in the Group block, in the footer context.
add_filter( 'hooked_block_types', 'epico_block_hooks', 10, 4 );


# ----------- HOOKED FUNCTIONS  -----------

/**
 * Registers the `epico/dynamic-year-block` block on the server.
 *
 * @link   https://developer.wordpress.org/reference/functions/register_block_type/
 * @link   https://developer.wordpress.org/reference/functions/wp_register_block_metadata_collection/
 * @return void
 */
if ( ! function_exists( 'epico_register_block_dynamic_year_block' ) ) {
	function epico_register_block_dynamic_year_block() {
		if ( ! function_exists( 'register_block_type' ) ) :
			// The block editor is not available.
			return;
		endif;

		// Register the block metadata collection to improve performance.
		if ( function_exists( 'wp_register_block_types_from_metadata_collection' ) ) {
			wp_register_block_types_from_metadata_collection( DYB_DIR . '/build', DYB_DIR . '/build/blocks-manifest.php' );
		} else {
			if ( function_exists( 'wp_register_block_metadata_collection' ) ) {
				wp_register_block_metadata_collection( DYB_DIR . '/build', DYB_DIR . '/build/blocks-manifest.php' );
			}
			$manifest_data = require DYB_DIR . '/build/blocks-manifest.php';
			foreach ( array_keys( $manifest_data ) as $block_type ) {
				register_block_type( DYB_DIR . "/build/{$block_type}" );
			}
		}

		// Add variables for usage on the block editor.
		wp_add_inline_script( 'epico-dynamic-year-block-editor-script', 'const dynamicYearBlockData = ' . wp_json_encode( array(
			'siteTitle' => esc_html( get_bloginfo( 'name' ) ),
			'siteUrl' => esc_url( get_bloginfo( 'url' ) ),
		) ), 'before' );

		// Load available translations ($path is not needed here, as this is hosted on WordPress.org).
		wp_set_script_translations( 'epico-dynamic-year-block-editor-script-js', 'dynamic-year-block' );
	}
}

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

