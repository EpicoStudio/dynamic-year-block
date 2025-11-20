<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
// Block wrapper classes and styles.
$wrapper_attributes = get_block_wrapper_attributes();

// Get the alignment attribute for the paragraph.
$alignClass = isset( $attributes['alignment'] ) ? ' has-text-align-' . sanitize_html_class( $attributes['alignment'] ) : '';

// Get the current year.
$current_date = current_datetime();
$format       = isset( $attributes['format'] ) ? sanitize_text_field( $attributes['format'] ) : 'Y';
$dynamic_year = esc_html( $current_date->format( $format ) );

// Get the optional text BEFORE the year.
$before      = $attributes['beforeElement'] !== null ? $attributes['beforeElement'] : '';
$beforeStart = ! empty( $attributes['beforeElement'] ) ? '<span class="dynamic-year-before">' : '';
$beforeEnd   = ! empty( $attributes['beforeElement'] ) ? '</span>' : '';

// Get the optional text AFTER the year. Check if the privacy policy link should be displayed instead of the user defined text.
$after = ! empty( $attributes['afterElement'] ) ? $attributes['afterElement'] : '';

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

echo $markup;
