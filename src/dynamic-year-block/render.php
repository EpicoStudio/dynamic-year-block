<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
// Block wrapper classes and styles.
$epico_wrapper_attributes = get_block_wrapper_attributes();

// Get the alignment attribute for the paragraph.
$epico_alignClass = isset( $attributes['alignment'] ) ? ' has-text-align-' . sanitize_html_class( $attributes['alignment'] ) : '';

// Get the current year.
$epico_current_date = current_datetime();
$epico_format       = isset( $attributes['format'] ) ? sanitize_text_field( $attributes['format'] ) : 'Y';
$epico_dynamic_year = esc_html( $epico_current_date->format( $epico_format ) );

// Get the optional text BEFORE the year.
$epico_before      = $attributes['beforeElement'] !== null ? wp_kses_post( $attributes['beforeElement'] ) : '';
$epico_beforeStart = ! empty( $attributes['beforeElement'] ) ? '<span class="dynamic-year-before">' : '';
$epico_beforeEnd   = ! empty( $attributes['beforeElement'] ) ? '</span>' : '';

// Get the optional text AFTER the year. Check if the privacy policy link should be displayed instead of the user defined text.
$epico_after = ! empty( $attributes['afterElement'] ) ? wp_kses_post( $attributes['afterElement'] ) : '';

// Define the text and the link of the privacy policy page.
$epico_privacyPolicyText  = ! empty( $attributes['privacyPolicy'] ) ? esc_html( $attributes['privacyPolicy'] ) : '';
$epico_privacyPolicyLink  = get_privacy_policy_url();

// Determine if the privacy policy link should be displayed
if ( $epico_privacyPolicyLink && ! empty( $epico_privacyPolicyText ) ) {
	$epico_after .= ' <a href="' . esc_url( $epico_privacyPolicyLink ) . '" target="_blank" aria-label="' . esc_attr__( 'Privacy Policy', 'dynamic-year-block' ) .'" rel="noopener noreferrer">' . esc_html( $epico_privacyPolicyText ) . '</a>';
}

// Determine if the `afterElement` content should be wrapped.
$epico_afterStart = ! empty( $attributes['afterElement'] ) ? '<span class="dynamic-year-after">' : '';
$epico_afterEnd   = ! empty( $attributes['afterElement'] ) ? '</span>' : '';

// Define the `aria-current` attribute.
$epico_aria_current = '';
if ( is_front_page() ) :
	$epico_aria_current = ' aria-current="page"';
elseif ( is_home() && ( (int) get_option( 'page_for_posts' ) !== get_queried_object_id() ) ) :
	$epico_aria_current = ' aria-current="page"';
endif;

// Check if the site title is included and define the markup.
$epico_siteName   = ( $attributes['displaySiteName'] !== false ) ? ' <a target="_self" rel="home" href="' . esc_url( get_bloginfo( 'url', 'display' ) ) . '"' . $epico_aria_current .  '>' . esc_html( get_bloginfo( 'name', 'display' ) ) . '</a>' : '';

// Markup.
$epico_markup  = '<div ' . $epico_wrapper_attributes . '>';
$epico_markup .= '<p class="dynamic-year-' . esc_attr( $epico_dynamic_year ) . esc_attr( $epico_alignClass ) . '">';
$epico_markup .= $epico_beforeStart . $epico_before . $epico_beforeEnd;
$epico_markup .= esc_attr( $epico_dynamic_year );
$epico_markup .= $epico_siteName;
$epico_markup .= $epico_afterStart . $epico_after . $epico_afterEnd;
$epico_markup .= '</p>';
$epico_markup .= '</div>';

// Use wp_kses_post() when echoing the full markup so Plugin Check
// recognizes the output as escaped while preserving allowed HTML
// (we already sanitized user-provided parts with wp_kses_post()).
echo wp_kses_post( $epico_markup );
