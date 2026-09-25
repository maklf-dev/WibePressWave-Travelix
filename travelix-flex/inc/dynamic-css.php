<?php
/**
 * Safe dynamic CSS generated from sanitized settings.
 *
 * @package Travelix_Flex
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function travelix_flex_dynamic_css() {
	$shadow_map = array(
		'none'   => 'none',
		'soft'   => '0 10px 28px rgba(24,40,77,.08)',
		'medium' => '0 18px 48px rgba(24,40,77,.13)',
		'strong' => '0 26px 70px rgba(16,23,45,.22)',
	);
	$font_map = array(
		'vazirmatn' => '"Vazirmatn", Tahoma, Arial, sans-serif',
		'tahoma'    => 'Tahoma, Arial, sans-serif',
		'system'    => '-apple-system, BlinkMacSystemFont, "Segoe UI", Arial, sans-serif',
	);
	$shadow_key = (string) travelix_flex_option( 'card_shadow' );
	$font_key   = (string) travelix_flex_option( 'font_family' );
	$shadow     = isset( $shadow_map[ $shadow_key ] ) ? $shadow_map[ $shadow_key ] : $shadow_map['medium'];
	$font       = isset( $font_map[ $font_key ] ) ? $font_map[ $font_key ] : $font_map['system'];
	$align_map = array( 'right' => 'flex-start', 'center' => 'center', 'left' => 'flex-end' );
	$text_align_map = array( 'right' => 'start', 'center' => 'center', 'left' => 'end' );
	$hero_align            = (string) travelix_flex_option( 'hero_align' );
	$hero_action_alignment = isset( $align_map[ $hero_align ] ) ? $align_map[ $hero_align ] : $align_map['right'];
	$hero_text_alignment   = isset( $text_align_map[ $hero_align ] ) ? $text_align_map[ $hero_align ] : $text_align_map['right'];

	$css = ':root{'
		. '--tx-primary:' . travelix_flex_option( 'color_primary' ) . ';'
		. '--tx-secondary:' . travelix_flex_option( 'color_secondary' ) . ';'
		. '--tx-accent:' . travelix_flex_option( 'color_accent' ) . ';'
		. '--tx-accent-hover:' . travelix_flex_option( 'color_accent_hover' ) . ';'
		. '--tx-text:' . travelix_flex_option( 'color_text' ) . ';'
		. '--tx-muted:' . travelix_flex_option( 'color_muted' ) . ';'
		. '--tx-surface:' . travelix_flex_option( 'color_surface' ) . ';'
		. '--tx-dark:' . travelix_flex_option( 'color_dark' ) . ';'
		. '--tx-container:' . absint( travelix_flex_option( 'container_width' ) ) . 'px;'
		. '--tx-section-space:' . absint( travelix_flex_option( 'section_space_desktop' ) ) . 'px;'
		. '--tx-radius-sm:' . absint( travelix_flex_option( 'radius_small' ) ) . 'px;'
		. '--tx-radius-md:' . absint( travelix_flex_option( 'radius_medium' ) ) . 'px;'
		. '--tx-radius-lg:' . absint( travelix_flex_option( 'radius_large' ) ) . 'px;'
		. '--tx-button-radius:' . absint( travelix_flex_option( 'button_radius' ) ) . 'px;'
		. '--tx-shadow:' . $shadow . ';'
		. '--tx-font:' . $font . ';'
		. '--tx-body-size:' . absint( travelix_flex_option( 'body_font_size' ) ) . 'px;'
		. '--tx-line-height:' . (float) travelix_flex_option( 'body_line_height' ) . ';'
		. '--tx-heading-weight:' . absint( travelix_flex_option( 'heading_weight' ) ) . ';'
		. '--tx-section-title:' . absint( travelix_flex_option( 'section_title_size' ) ) . 'px;'
		. '--tx-header-height:' . absint( travelix_flex_option( 'header_height' ) ) . 'px;'
		. '--tx-logo-width:' . absint( travelix_flex_option( 'logo_width' ) ) . 'px;'
		. '--tx-menu-size:' . absint( travelix_flex_option( 'menu_font_size' ) ) . 'px;'
		. '--tx-hero-height:' . absint( travelix_flex_option( 'hero_min_height' ) ) . 'px;'
		. '--tx-hero-title:' . absint( travelix_flex_option( 'hero_title_size' ) ) . 'px;'
		. '--tx-product-image:' . absint( travelix_flex_option( 'product_card_image_height' ) ) . 'px;'
		. '--tx-product-columns:' . absint( travelix_flex_option( 'product_card_columns' ) ) . ';'
		. '--tx-product-gap:' . absint( travelix_flex_option( 'product_card_gap' ) ) . 'px;'
		. '--tx-destination-columns:' . absint( travelix_flex_option( 'destination_columns' ) ) . ';'
		. '--tx-destination-height:' . absint( travelix_flex_option( 'destination_card_height' ) ) . 'px;'
		. '--tx-destination-gap:' . absint( travelix_flex_option( 'destination_card_gap' ) ) . 'px;'
		. '--tx-blog-columns:' . absint( travelix_flex_option( 'blog_card_columns' ) ) . ';'
		. '--tx-blog-image:' . absint( travelix_flex_option( 'blog_card_image_height' ) ) . 'px;'
		. '}'
		. 'body{font-family:var(--tx-font);font-size:var(--tx-body-size);line-height:var(--tx-line-height)}'
		. '.site-header{background:' . travelix_flex_option( 'header_background' ) . '}'
		. '.site-header.is-sticky{position:sticky;top:0}'
		. '.topbar{background:' . travelix_flex_option( 'topbar_background' ) . '}'
		. '.hero{--hero-image:url("' . esc_url_raw( travelix_flex_option( 'hero_image' ) ) . '");--hero-overlay:' . ( absint( travelix_flex_option( 'hero_overlay' ) ) / 100 ) . ';text-align:' . $hero_text_alignment . '}'
		. '.hero__actions{justify-content:' . $hero_action_alignment . '}'
		. '.lead-panel{background:' . travelix_flex_option( 'lead_form_background' ) . ';border-radius:' . absint( travelix_flex_option( 'lead_form_radius' ) ) . 'px}'
		. '.trust{background:' . travelix_flex_option( 'trust_background' ) . ';padding-block:' . absint( travelix_flex_option( 'trust_padding' ) ) . 'px}'
		. '.trust-icon{color:' . travelix_flex_option( 'trust_icon_color' ) . '}'
		. '.destinations{background:' . travelix_flex_option( 'destinations_background' ) . ';padding-top:' . absint( travelix_flex_option( 'destinations_padding_top' ) ) . 'px;padding-bottom:' . absint( travelix_flex_option( 'destinations_padding_bottom' ) ) . 'px}'
		. '.about{background:' . travelix_flex_option( 'about_background' ) . ';padding-top:' . absint( travelix_flex_option( 'about_padding_top' ) ) . 'px;padding-bottom:' . absint( travelix_flex_option( 'about_padding_bottom' ) ) . 'px}.about__image-small{border-color:' . travelix_flex_option( 'about_background' ) . '}'
		. '.process{background:' . travelix_flex_option( 'process_background' ) . ';padding-top:' . absint( travelix_flex_option( 'process_padding_top' ) ) . 'px;padding-bottom:' . absint( travelix_flex_option( 'process_padding_bottom' ) ) . 'px}'
		. '.process-card{border-radius:' . absint( travelix_flex_option( 'process_card_radius' ) ) . 'px}'
		. '.booking-section{background:' . travelix_flex_option( 'booking_background' ) . ';padding-top:' . absint( travelix_flex_option( 'booking_padding_top' ) ) . 'px;padding-bottom:' . absint( travelix_flex_option( 'booking_padding_bottom' ) ) . 'px}'
		. '.tours{background:' . travelix_flex_option( 'tours_background' ) . ';padding-top:' . absint( travelix_flex_option( 'tours_padding_top' ) ) . 'px;padding-bottom:' . absint( travelix_flex_option( 'tours_padding_bottom' ) ) . 'px}'
		. '.tour-card{background:' . travelix_flex_option( 'product_card_background' ) . ';border-color:' . travelix_flex_option( 'product_card_border_color' ) . ';border-radius:' . absint( travelix_flex_option( 'product_card_radius' ) ) . 'px}'
		. '.tour-card__body{padding:' . absint( travelix_flex_option( 'product_card_padding' ) ) . 'px}'
		. '.tour-card h3{color:' . travelix_flex_option( 'product_card_title_color' ) . ';font-size:' . absint( travelix_flex_option( 'product_card_title_size' ) ) . 'px}'
		. '.tour-card__route{color:' . travelix_flex_option( 'product_card_text_color' ) . '}'
		. '.destination-card{border-radius:' . absint( travelix_flex_option( 'destination_card_radius' ) ) . 'px}'
		. '.testimonials{background:' . travelix_flex_option( 'testimonials_background' ) . ';padding-top:' . absint( travelix_flex_option( 'testimonials_padding_top' ) ) . 'px;padding-bottom:' . absint( travelix_flex_option( 'testimonials_padding_bottom' ) ) . 'px}'
		. '.testimonial-card{border-radius:' . absint( travelix_flex_option( 'testimonial_radius' ) ) . 'px}'
		. '.stories{background:' . travelix_flex_option( 'blog_background' ) . ';padding-top:' . absint( travelix_flex_option( 'blog_padding_top' ) ) . 'px;padding-bottom:' . absint( travelix_flex_option( 'blog_padding_bottom' ) ) . 'px}'
		. '.blog-card{background:' . travelix_flex_option( 'blog_card_background' ) . ';border-radius:' . absint( travelix_flex_option( 'blog_card_radius' ) ) . 'px}'
		. '.blog-card__body{padding:' . absint( travelix_flex_option( 'blog_card_padding' ) ) . 'px}'
		. '.blog-card h3{font-size:' . absint( travelix_flex_option( 'blog_card_title_size' ) ) . 'px}'
		. '.cta{padding-top:' . absint( travelix_flex_option( 'cta_padding_top' ) ) . 'px;padding-bottom:' . absint( travelix_flex_option( 'cta_padding_bottom' ) ) . 'px}.cta-card{background-color:' . travelix_flex_option( 'cta_background' ) . ';--cta-image:url("' . esc_url_raw( travelix_flex_option( 'cta_image' ) ) . '")}'
		. '.footer{background:' . travelix_flex_option( 'footer_background' ) . ';color:' . travelix_flex_option( 'footer_text_color' ) . ';padding-top:' . absint( travelix_flex_option( 'footer_padding' ) ) . 'px}'
		. '.entry-single{max-width:' . absint( travelix_flex_option( 'single_content_width' ) ) . 'px}'
		. '.inner-hero{min-height:' . absint( travelix_flex_option( 'inner_hero_height' ) ) . 'px}.archive-grid{grid-template-columns:repeat(' . absint( travelix_flex_option( 'archive_columns' ) ) . ',minmax(0,1fr))}'
		. '@media(max-width:' . absint( travelix_flex_option( 'tablet_breakpoint' ) ) . 'px){:root{--tx-section-space:' . absint( travelix_flex_option( 'section_space_tablet' ) ) . 'px;--tx-section-title:' . absint( travelix_flex_option( 'section_title_tablet' ) ) . 'px;--tx-hero-title:' . absint( travelix_flex_option( 'hero_title_tablet' ) ) . 'px;--tx-hero-height:' . absint( travelix_flex_option( 'hero_height_tablet' ) ) . 'px}.destinations,.about,.process,.booking-section,.tours,.testimonials,.stories{padding-block:' . absint( travelix_flex_option( 'section_space_tablet' ) ) . 'px}}'
		. '@media(max-width:' . absint( travelix_flex_option( 'mobile_breakpoint' ) ) . 'px){:root{--tx-section-space:' . absint( travelix_flex_option( 'section_space_mobile' ) ) . 'px;--tx-section-title:' . absint( travelix_flex_option( 'section_title_mobile' ) ) . 'px;--tx-hero-title:' . absint( travelix_flex_option( 'hero_title_mobile' ) ) . 'px;--tx-hero-height:' . absint( travelix_flex_option( 'hero_height_mobile' ) ) . 'px;--tx-mobile-gutter:' . absint( travelix_flex_option( 'mobile_gutter' ) ) . 'px;--tx-product-image:' . absint( travelix_flex_option( 'mobile_card_image_height' ) ) . 'px;--tx-blog-image:' . absint( travelix_flex_option( 'mobile_card_image_height' ) ) . 'px}.destinations,.about,.process,.booking-section,.tours,.testimonials,.stories{padding-block:' . absint( travelix_flex_option( 'section_space_mobile' ) ) . 'px}}';

	if ( travelix_flex_option( 'reduce_motion' ) ) {
		$css .= '*,*::before,*::after{scroll-behavior:auto!important;animation-duration:.001ms!important;animation-iteration-count:1!important;transition-duration:.001ms!important}';
	}

	wp_add_inline_style( 'travelix-flex-main', $css );
}
add_action( 'wp_enqueue_scripts', 'travelix_flex_dynamic_css', 30 );
