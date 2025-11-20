<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
// Block wrapper classes and styles.
$dyb_wrapper_attributes = get_block_wrapper_attributes();

// Get the alignment attribute for the paragraph.
$dyb_alignClass = isset( $attributes['alignment'] ) ? ' has-text-align-' . sanitize_html_class( $attributes['alignment'] ) : '';

// Get the current year.
$dyb_current_date = current_datetime();
$dyb_format       = isset( $attributes['format'] ) ? sanitize_text_field( $attributes['format'] ) : 'Y';
$dyb_dynamic_year = esc_html( $dyb_current_date->format( $dyb_format ) );

// Get the optional text BEFORE the year.
$dyb_before      = $attributes['beforeElement'] !== null ? wp_kses_post( $attributes['beforeElement'] ) : '';
$dyb_beforeStart = ! empty( $attributes['beforeElement'] ) ? '<span class="dynamic-year-before">' : '';
$dyb_beforeEnd   = ! empty( $attributes['beforeElement'] ) ? '</span>' : '';

// Get the optional text AFTER the year. Check if the privacy policy link should be displayed instead of the user defined text.
$dyb_after = ! empty( $attributes['afterElement'] ) ? wp_kses_post( $attributes['afterElement'] ) : '';

// Define the text and the link of the privacy policy page.
$dyb_privacyPolicyText  = ! empty( $attributes['privacyPolicy'] ) ? esc_html( $attributes['privacyPolicy'] ) : '';
$dyb_privacyPolicyLink  = get_privacy_policy_url();

// Determine if the privacy policy link should be displayed
if ( $dyb_privacyPolicyLink && ! empty( $dyb_privacyPolicyText ) ) {
	$dyb_after .= ' <a href="' . esc_url( $dyb_privacyPolicyLink ) . '" target="_blank" aria-label="' . esc_attr__( 'Privacy Policy', 'dynamic-year-block' ) .'" rel="noopener noreferrer">' . esc_html( $dyb_privacyPolicyText ) . '</a>';
}

// Determine if the `afterElement` content should be wrapped.
$dyb_afterStart = ! empty( $attributes['afterElement'] ) ? '<span class="dynamic-year-after">' : '';
$dyb_afterEnd   = ! empty( $attributes['afterElement'] ) ? '</span>' : '';

// Define the `aria-current` attribute.
$dyb_aria_current = '';
if ( is_front_page() ) :
	$dyb_aria_current = ' aria-current="page"';
elseif ( is_home() && ( (int) get_option( 'page_for_posts' ) !== get_queried_object_id() ) ) :
	$dyb_aria_current = ' aria-current="page"';
endif;

// Check if the site title is included and define the markup.
$dyb_siteName   = ( $attributes['displaySiteName'] !== false ) ? ' <a target="_self" rel="home" href="' . esc_url( get_bloginfo( 'url', 'display' ) ) . '"' . $dyb_aria_current .  '>' . esc_html( get_bloginfo( 'name', 'display' ) ) . '</a>' : '';

// Markup.
$dyb_markup  = '<div ' . $dyb_wrapper_attributes . '>';
$dyb_markup .= '<p class="dynamic-year-' . esc_attr( $dyb_dynamic_year ) . esc_attr( $dyb_alignClass ) . '">';
$dyb_markup .= $dyb_beforeStart . $dyb_before . $dyb_beforeEnd;
$dyb_markup .= esc_attr( $dyb_dynamic_year );
$dyb_markup .= $dyb_siteName;
$dyb_markup .= $dyb_afterStart . $dyb_after . $dyb_afterEnd;
$dyb_markup .= '</p>';
$dyb_markup .= '</div>';

// Use wp_kses_post() when echoing the full markup so Plugin Check
// recognizes the output as escaped while preserving allowed HTML
// (we already sanitized user-provided parts with wp_kses_post()).
echo wp_kses_post( $dyb_markup );
