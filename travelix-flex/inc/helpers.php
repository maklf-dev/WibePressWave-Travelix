<?php
/**
 * Theme helper functions.
 *
 * @package Travelix_Flex
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Get one sanitized theme option with its schema default.
 *
 * @param string $key Option key.
 * @return mixed
 */
function travelix_flex_option( $key ) {
	static $options = null;
	if ( null === $options ) {
		$options = wp_parse_args( get_option( 'travelix_flex_options', array() ), travelix_flex_defaults() );
	}
	return array_key_exists( $key, $options ) ? $options[ $key ] : '';
}

/**
 * Return a theme option translated through WPML String Translation when active.
 *
 * @param string $key Option key.
 * @return string
 */
function travelix_flex_text( $key ) {
	$value = (string) travelix_flex_option( $key );
	return (string) apply_filters( 'wpml_translate_single_string', $value, 'Travelix Flex', $key );
}

/**
 * Resolve a configured URL. Hash links point to the translated home page.
 *
 * @param string $key Option key.
 * @return string
 */
function travelix_flex_url( $key ) {
	$url = (string) travelix_flex_option( $key );
	if ( 0 === strpos( $url, '#' ) ) {
		$home = apply_filters( 'wpml_home_url', home_url( '/' ) );
		return trailingslashit( $home ) . $url;
	}
	return $url ? $url : home_url( '/' );
}

/**
 * Cache-busting version for a local asset.
 */
function travelix_flex_asset_version( $relative_path ) {
	$path = get_theme_file_path( $relative_path );
	return file_exists( $path ) ? (string) filemtime( $path ) : TRAVELIX_FLEX_VERSION;
}

/**
 * Safe telephone href.
 */
function travelix_flex_tel_href() {
	return preg_replace( '/[^0-9+]/', '', (string) travelix_flex_option( 'phone' ) );
}

/**
 * Render a fixed, trusted SVG icon from the internal icon library.
 *
 * @param string $name Icon name.
 * @param string $class Optional class.
 * @return string
 */
function travelix_flex_icon( $name, $class = '' ) {
	$paths = array(
		'star'       => '<path d="m12 2 3 6 7 1-5 5 1 7-6-3-6 3 1-7-5-5 7-1 3-6Z"/>',
		'user-check' => '<circle cx="12" cy="7" r="3"/><path d="M5 21v-2a7 7 0 0 1 11-5.7M17 17l2 2 4-5"/>',
		'headset'    => '<path d="M4 13v-2a8 8 0 0 1 16 0v2M4 13h3v6H4zM17 13h3v6h-3zM17 19c0 2-2 3-5 3"/>',
		'refresh'    => '<path d="M20 7v5h-5M4 17v-5h5M6.1 9A7 7 0 0 1 18 6l2 1M17.9 15A7 7 0 0 1 6 18l-2-1"/>',
		'compass'    => '<circle cx="12" cy="12" r="9"/><path d="m15 9-2 4-4 2 2-4 4-2Z"/>',
		'map'        => '<path d="m3 6 6-3 6 3 6-3v15l-6 3-6-3-6 3V6Z"/><path d="M9 3v15M15 6v15"/>',
		'shield'     => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z"/><path d="m9 12 2 2 4-5"/>',
		'heart'      => '<path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 0 0-7.8 7.8l1 1L12 21l7.8-7.6 1-1a5.5 5.5 0 0 0 0-7.8Z"/>',
		'calendar'   => '<rect x="3" y="5" width="18" height="16" rx="2"/><path d="M16 3v4M8 3v4M3 10h18"/>',
		'plane'      => '<path d="m2 16 20-8-7 13-3-6-10 1Z"/>',
		'globe'      => '<circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3a15 15 0 0 1 0 18M12 3a15 15 0 0 0 0 18"/>',
		'check'      => '<path d="m5 12 4 4L19 6"/>',
		'search'     => '<circle cx="11" cy="11" r="7"/><path d="m20 20-4-4"/>',
		'cart'       => '<path d="M3 3h2l2.4 11h9.8L20 6H6M9 21a1 1 0 1 0 0-2 1 1 0 0 0 0 2ZM17 21a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z"/>',
		'menu'       => '<path d="M4 7h16M4 12h16M4 17h16"/>',
		'close'      => '<path d="m6 6 12 12M18 6 6 18"/>',
		'arrow'      => '<path d="M5 12h14M13 6l6 6-6 6"/>',
		'phone'      => '<path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 2 .7 2.8a2 2 0 0 1-.5 2.1L8 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.5c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.8 2.1Z"/>',
		'mail'       => '<rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/>',
		'instagram'  => '<rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r=".8" fill="currentColor" stroke="none"/>',
		'telegram'   => '<path d="m21 3-4 18-6-5-4 3 1-6 9-7-11 6-5-2 20-7Z"/>',
		'whatsapp'   => '<path d="M20 11.5a8 8 0 0 1-11.8 7L3 20l1.5-5A8 8 0 1 1 20 11.5Z"/><path d="M8.5 8c.5 3 2.5 5 5.5 5.5"/>',
		'quote'      => '<path d="M9 11H4a6 6 0 0 1 6-6v3a3 3 0 0 0-3 3h2v6H3v-6M21 11h-5a6 6 0 0 1 6-6v3a3 3 0 0 0-3 3h2v6h-6v-6"/>',
	);

	$name  = isset( $paths[ $name ] ) ? $name : 'check';
	$class = $class ? ' ' . sanitize_html_class( $class ) : '';
	return '<svg class="travelix-icon' . esc_attr( $class ) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">' . $paths[ $name ] . '</svg>';
}

/**
 * Reusable section heading.
 *
 * @param string $prefix Option prefix.
 * @param string $link_label Optional link label.
 * @param string $link_url Optional link URL.
 */
function travelix_flex_section_header( $prefix, $link_label = '', $link_url = '' ) {
	?>
	<div class="section-header reveal">
		<div class="section-header__copy">
			<?php if ( travelix_flex_text( $prefix . '_eyebrow' ) ) : ?><span class="eyebrow"><?php echo esc_html( travelix_flex_text( $prefix . '_eyebrow' ) ); ?></span><?php endif; ?>
			<h2 class="section-title"><?php echo esc_html( travelix_flex_text( $prefix . '_title' ) ); ?></h2>
			<?php if ( travelix_flex_text( $prefix . '_copy' ) ) : ?><p class="section-copy"><?php echo esc_html( travelix_flex_text( $prefix . '_copy' ) ); ?></p><?php endif; ?>
		</div>
		<?php if ( $link_label && $link_url ) : ?><a class="link-arrow" href="<?php echo esc_url( $link_url ); ?>"><?php echo esc_html( $link_label ); ?> <?php echo travelix_flex_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></a><?php endif; ?>
	</div>
	<?php
}

/**
 * Front-end notice for a missing optional integration.
 */
function travelix_flex_empty_notice( $message ) {
	return '<p class="travelix-empty">' . esc_html( $message ) . '</p>';
}
