<?php
/**
 * Theme setup and assets.
 *
 * @package Travelix_Flex
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function travelix_flex_setup() {
	load_theme_textdomain( 'travelix-flex', TRAVELIX_FLEX_DIR . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 120,
			'width'       => 300,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 720,
			'single_image_width'    => 1200,
		)
	);
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	register_nav_menus(
		array(
			'primary'         => __( 'منوی اصلی', 'travelix-flex' ),
			'footer'          => __( 'منوی فوتر', 'travelix-flex' ),
			'footer_services' => __( 'منوی خدمات فوتر', 'travelix-flex' ),
			'legal'           => __( 'منوی قوانین', 'travelix-flex' ),
		)
	);
}
add_action( 'after_setup_theme', 'travelix_flex_setup' );

function travelix_flex_content_width() {
	$GLOBALS['content_width'] = (int) travelix_flex_option( 'container_width' );
}
add_action( 'after_setup_theme', 'travelix_flex_content_width', 0 );

function travelix_flex_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'فوتر سفارشی', 'travelix-flex' ),
			'id'            => 'footer-custom',
			'description'   => __( 'ویجت‌های اختیاری فوتر.', 'travelix-flex' ),
			'before_widget' => '<section id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="footer-widget__title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'travelix_flex_widgets_init' );

function travelix_flex_enqueue_assets() {
	if ( 'vazirmatn' === travelix_flex_option( 'font_family' ) ) {
		wp_enqueue_style( 'travelix-flex-font', 'https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;500;600;700;800;900&display=swap', array(), null );
	}
	wp_enqueue_style( 'travelix-flex-style', get_stylesheet_uri(), array(), TRAVELIX_FLEX_VERSION );
	wp_enqueue_style( 'travelix-flex-main', TRAVELIX_FLEX_URI . '/assets/css/main.css', array( 'travelix-flex-style' ), travelix_flex_asset_version( '/assets/css/main.css' ) );
	wp_enqueue_script( 'travelix-flex-main', TRAVELIX_FLEX_URI . '/assets/js/main.js', array(), travelix_flex_asset_version( '/assets/js/main.js' ), true );
	wp_localize_script(
		'travelix-flex-main',
		'travelixFlex',
		array(
			'menuOpen'  => __( 'بازکردن منو', 'travelix-flex' ),
			'menuClose' => __( 'بستن منو', 'travelix-flex' ),
			'slideLabel' => __( 'نمایش نظر %d', 'travelix-flex' ),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'travelix_flex_enqueue_assets' );

/**
 * Gravity Forms function embeds need their assets queued before wp_head().
 */
function travelix_flex_enqueue_gravity_form_assets() {
	if ( ! is_front_page() || 'gravity' !== travelix_flex_option( 'lead_form_source' ) || ! function_exists( 'gravity_form_enqueue_scripts' ) ) {
		return;
	}

	$form_id = absint( travelix_flex_option( 'gravity_form_id' ) );
	if ( $form_id ) {
		gravity_form_enqueue_scripts( $form_id, true );
	}
}
add_action( 'wp_enqueue_scripts', 'travelix_flex_enqueue_gravity_form_assets', 5 );

function travelix_flex_admin_assets( $hook ) {
	if ( 'appearance_page_travelix-flex-settings' !== $hook ) {
		return;
	}
	wp_enqueue_media();
	wp_enqueue_style( 'wp-color-picker' );
	$css_editor = wp_enqueue_code_editor( array( 'type' => 'text/css' ) );
	$js_editor  = wp_enqueue_code_editor( array( 'type' => 'text/javascript' ) );
	wp_enqueue_style( 'travelix-flex-admin', TRAVELIX_FLEX_URI . '/assets/css/admin.css', array( 'wp-color-picker' ), travelix_flex_asset_version( '/assets/css/admin.css' ) );
	wp_enqueue_script( 'travelix-flex-admin', TRAVELIX_FLEX_URI . '/assets/js/admin.js', array( 'jquery', 'wp-color-picker' ), travelix_flex_asset_version( '/assets/js/admin.js' ), true );
	wp_localize_script(
		'travelix-flex-admin',
		'travelixFlexAdmin',
		array(
			'codeEditor' => array(
				'css' => $css_editor,
				'js'  => $js_editor,
			),
			'assets'     => array(
				'hero'        => TRAVELIX_FLEX_URI . '/assets/images/demo-hero.svg',
				'about'       => TRAVELIX_FLEX_URI . '/assets/images/demo-about.svg',
				'destination' => TRAVELIX_FLEX_URI . '/assets/images/demo-destination.svg',
				'tour'        => TRAVELIX_FLEX_URI . '/assets/images/demo-tour.svg',
				'cta'         => TRAVELIX_FLEX_URI . '/assets/images/demo-cta.svg',
			),
			'i18n'       => array(
				'unsaved' => __( 'تغییرات ذخیره‌نشده دارید.', 'travelix-flex' ),
				'saved'   => __( 'تغییرات ذخیره‌شده‌اند.', 'travelix-flex' ),
			),
		)
	);
}
add_action( 'admin_enqueue_scripts', 'travelix_flex_admin_assets' );

/**
 * Seed defaults and copy compatible settings from the previous Travelix starter.
 */
function travelix_flex_activate_theme() {
	$current = get_option( 'travelix_flex_options', false );
	if ( is_array( $current ) && $current ) {
		update_option( 'travelix_flex_db_version', TRAVELIX_FLEX_VERSION );
		return;
	}
	$options = travelix_flex_defaults();
	$legacy  = get_option( 'theme_mods_travelix-persian-theme', array() );
	$map     = array(
		'travelix_phone'           => 'phone',
		'travelix_email'           => 'email',
		'travelix_gravity_form_id' => 'gravity_form_id',
		'travelix_booking_shortcode' => 'booking_shortcode',
		'travelix_hero_image'      => 'hero_image',
		'travelix_why_main_image'  => 'about_main_image',
		'travelix_why_small_image' => 'about_small_image',
	);
	if ( is_array( $legacy ) ) {
		foreach ( $map as $old_key => $new_key ) {
			if ( ! empty( $legacy[ $old_key ] ) ) {
				$options[ $new_key ] = $legacy[ $old_key ];
			}
		}
		if ( array_key_exists( 'travelix_enable_checkout', $legacy ) ) {
			$options['catalog_mode'] = empty( $legacy['travelix_enable_checkout'] ) ? 1 : 0;
		}
	}
	update_option( 'travelix_flex_options', travelix_flex_sanitize_options( $options ) );
	update_option( 'travelix_flex_db_version', TRAVELIX_FLEX_VERSION );
}
add_action( 'after_switch_theme', 'travelix_flex_activate_theme' );

/**
 * Add defaults introduced by newer releases without overwriting saved choices.
 */
function travelix_flex_maybe_upgrade() {
	$installed = (string) get_option( 'travelix_flex_db_version', '0.0.0' );
	if ( ! version_compare( $installed, TRAVELIX_FLEX_VERSION, '<' ) ) {
		return;
	}

	$current = get_option( 'travelix_flex_options', false );
	if ( false === $current ) {
		return;
	}
	$current = is_array( $current ) ? $current : array();
	update_option( 'travelix_flex_options', wp_parse_args( $current, travelix_flex_defaults() ) );
	update_option( 'travelix_flex_db_version', TRAVELIX_FLEX_VERSION );
}
add_action( 'init', 'travelix_flex_maybe_upgrade', 1 );

function travelix_flex_body_classes( $classes ) {
	$classes[] = is_rtl() ? 'travelix-is-rtl' : 'travelix-is-ltr';
	if ( travelix_flex_option( 'reduce_motion' ) ) {
		$classes[] = 'travelix-reduce-motion';
	}
	return $classes;
}
add_filter( 'body_class', 'travelix_flex_body_classes' );

function travelix_flex_register_elementor_locations( $manager ) {
	if ( is_object( $manager ) && method_exists( $manager, 'register_all_core_location' ) ) {
		$manager->register_all_core_location();
	}
}
add_action( 'elementor/theme/register_locations', 'travelix_flex_register_elementor_locations' );

/**
 * Accessible fallback when no menu is assigned.
 */
function travelix_flex_menu_fallback() {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		return;
	}
	echo '<ul class="nav__list"><li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'یک منو ایجاد کنید', 'travelix-flex' ) . '</a></li></ul>';
}
