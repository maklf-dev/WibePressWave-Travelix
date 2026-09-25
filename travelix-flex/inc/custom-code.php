<?php
/**
 * Per-section custom CSS and JavaScript output.
 *
 * @package Travelix_Flex
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Remove wrapper tags and control bytes from administrator-authored code.
 *
 * Custom code is only accepted from users with the unfiltered_html capability.
 * WordPress removes this capability from regular administrators on multisite.
 *
 * @param string $code Code entered in the settings panel.
 * @param string $type css or js.
 * @return string
 */
function travelix_flex_sanitize_custom_code( $code, $type ) {
	$code = is_string( $code ) ? wp_unslash( $code ) : '';
	$code = str_replace( array( "\0", "\r\n", "\r" ), array( '', "\n", "\n" ), $code );

	if ( 'css' === $type ) {
		$code = preg_replace( '#</?style\b[^>]*>#i', '', $code );
	} else {
		$code = preg_replace( '#</?script\b[^>]*>#i', '', $code );
	}

	return trim( $code );
}

/**
 * Add all section code through one style handle and one script handle.
 */
function travelix_flex_enqueue_section_custom_code() {
	$css = '';
	$js  = '';

	foreach ( travelix_flex_custom_code_sections() as $section_key => $section_label ) {
		$section_css = trim( (string) travelix_flex_option( $section_key . '_custom_css' ) );
		$section_js  = trim( (string) travelix_flex_option( $section_key . '_custom_js' ) );

		if ( $section_css ) {
			$css .= "\n/* " . sanitize_text_field( $section_label ) . " */\n" . $section_css . "\n";
		}

		if ( $section_js ) {
			$js .= "\n/* " . sanitize_text_field( $section_label ) . " */\n";
			$js .= "try {\n" . $section_js . "\n} catch (error) { console.error('Travelix section code:', error); }\n";
		}
	}

	if ( $css ) {
		wp_add_inline_style( 'travelix-flex-main', $css );
	}

	if ( $js ) {
		$wrapped = "(function(){'use strict';function travelixSectionCode(){\n" . $js . "\n}";
		$wrapped .= "if(document.readyState==='loading'){document.addEventListener('DOMContentLoaded',travelixSectionCode,{once:true});}else{travelixSectionCode();}})();";
		wp_add_inline_script( 'travelix-flex-main', $wrapped, 'after' );
	}
}
add_action( 'wp_enqueue_scripts', 'travelix_flex_enqueue_section_custom_code', 40 );
