<?php
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
<?php if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) : ?>
<div class="topbar"><div class="container topbar__inner"><div class="topbar__group"><a class="topbar__item" href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', travelix_phone() ) ); ?>"><?php echo esc_html( travelix_phone() ); ?></a><a class="topbar__item" href="mailto:<?php echo esc_attr( travelix_email() ); ?>"><?php echo esc_html( travelix_email() ); ?></a><span class="topbar__item"><?php esc_html_e( 'پشتیبانی سفر', 'travelix' ); ?></span></div><?php travelix_language_switcher(); ?></div></div>
<header class="site-header">
	<div class="container header__inner">
		<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
			<?php if ( has_custom_logo() ) : ?><?php echo wp_get_attachment_image( get_theme_mod( 'custom_logo' ), 'full', false, array( 'class' => 'brand__logo', 'alt' => get_bloginfo( 'name' ) ) ); ?><?php else : ?><img class="brand__logo" src="<?php echo esc_url( get_theme_file_uri( '/assets/images/logo.jpg' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"><?php endif; ?>
			<span><?php bloginfo( 'name' ); ?><small class="brand__sub"><?php bloginfo( 'description' ); ?></small></span>
		</a>
		<nav class="nav" id="mainNav" aria-label="<?php echo esc_attr__( 'منوی اصلی', 'travelix' ); ?>">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav__list', 'fallback_cb' => false ) ); ?>
		</nav>
		<div class="header__actions"><a class="btn btn-primary" href="<?php echo esc_url( home_url( '/#travel-request' ) ); ?>"><?php esc_html_e( 'درخواست مشاوره', 'travelix' ); ?> ←</a><button class="icon-btn menu-toggle" id="menuToggle" type="button" aria-label="<?php echo esc_attr__( 'باز و بسته کردن منو', 'travelix' ); ?>" aria-expanded="false">☰</button></div>
	</div>
</header>
<?php endif; ?>
