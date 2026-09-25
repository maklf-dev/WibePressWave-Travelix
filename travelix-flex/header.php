<?php
/**
 * Site header.
 *
 * @package Travelix_Flex
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#main-content"><?php esc_html_e( 'رفتن به محتوای اصلی', 'travelix-flex' ); ?></a>
<?php if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) : ?>
	<?php if ( travelix_flex_option( 'topbar_enabled' ) ) : ?>
	<div class="topbar">
		<div class="container topbar__inner">
			<div class="topbar__contact">
				<?php if ( travelix_flex_option( 'phone' ) ) : ?><a href="tel:<?php echo esc_attr( travelix_flex_tel_href() ); ?>"><?php echo travelix_flex_icon( 'phone' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><bdi dir="ltr"><?php echo esc_html( travelix_flex_text( 'phone' ) ); ?></bdi></a><?php endif; ?>
				<?php if ( travelix_flex_option( 'email' ) ) : ?><a href="mailto:<?php echo esc_attr( antispambot( travelix_flex_option( 'email' ) ) ); ?>"><?php echo travelix_flex_icon( 'mail' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><bdi dir="ltr"><?php echo esc_html( antispambot( travelix_flex_option( 'email' ) ) ); ?></bdi></a><?php endif; ?>
				<?php if ( travelix_flex_text( 'topbar_note' ) ) : ?><span class="topbar__note" dir="auto"><?php echo esc_html( travelix_flex_text( 'topbar_note' ) ); ?></span><?php endif; ?>
			</div>
			<?php travelix_flex_language_switcher(); ?>
		</div>
	</div>
	<?php endif; ?>
	<header class="site-header<?php echo travelix_flex_option( 'header_sticky' ) ? ' is-sticky' : ''; ?>" data-site-header>
		<div class="container header__inner">
			<a class="brand" href="<?php echo esc_url( apply_filters( 'wpml_home_url', home_url( '/' ) ) ); ?>" rel="home">
				<?php if ( has_custom_logo() ) : ?><?php echo wp_get_attachment_image( get_theme_mod( 'custom_logo' ), 'full', false, array( 'class' => 'brand__logo', 'alt' => get_bloginfo( 'name' ) ) ); ?><?php else : ?><span class="brand__mark"><?php echo travelix_flex_icon( 'compass' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span><span class="brand__text"><?php bloginfo( 'name' ); ?><small><?php bloginfo( 'description' ); ?></small></span><?php endif; ?>
			</a>
			<nav class="nav" id="primaryNav" aria-label="<?php esc_attr_e( 'منوی اصلی', 'travelix-flex' ); ?>">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav__list', 'fallback_cb' => 'travelix_flex_menu_fallback', 'depth' => 3 ) ); ?>
			</nav>
			<div class="header__actions">
				<?php if ( travelix_flex_option( 'header_search_enabled' ) ) : ?><button class="icon-button" type="button" data-search-open aria-label="<?php esc_attr_e( 'بازکردن جستجو', 'travelix-flex' ); ?>"><?php echo travelix_flex_icon( 'search' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></button><?php endif; ?>
				<?php if ( travelix_flex_option( 'header_cart_enabled' ) && function_exists( 'wc_get_cart_url' ) ) : ?><a class="icon-button cart-button" href="<?php echo esc_url( wc_get_cart_url() ); ?>" aria-label="<?php esc_attr_e( 'سبد خرید', 'travelix-flex' ); ?>"><?php echo travelix_flex_icon( 'cart' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><?php echo travelix_flex_cart_count_markup(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></a><?php endif; ?>
				<?php if ( travelix_flex_text( 'header_cta_label' ) ) : ?><a class="btn btn-primary header__cta" href="<?php echo esc_url( travelix_flex_url( 'header_cta_url' ) ); ?>"><?php echo esc_html( travelix_flex_text( 'header_cta_label' ) ); ?></a><?php endif; ?>
				<button class="menu-toggle" type="button" aria-controls="primaryNav" aria-expanded="false" data-menu-toggle><span class="menu-toggle__open"><?php echo travelix_flex_icon( 'menu' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span><span class="menu-toggle__close"><?php echo travelix_flex_icon( 'close' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span><span class="screen-reader-text"><?php esc_html_e( 'بازکردن منو', 'travelix-flex' ); ?></span></button>
			</div>
		</div>
	</header>
	<div class="search-overlay" data-search-overlay hidden>
		<div class="search-overlay__dialog" role="dialog" aria-modal="true" aria-labelledby="search-dialog-title"><button type="button" class="search-overlay__close" data-search-close aria-label="<?php esc_attr_e( 'بستن جستجو', 'travelix-flex' ); ?>"><?php echo travelix_flex_icon( 'close' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></button><h2 id="search-dialog-title"><?php esc_html_e( 'دنبال چه می‌گردید؟', 'travelix-flex' ); ?></h2><?php get_search_form(); ?></div>
	</div>
<?php endif; ?>
