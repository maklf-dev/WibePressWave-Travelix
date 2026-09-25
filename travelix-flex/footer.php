<?php
/**
 * Site footer.
 *
 * @package Travelix_Flex
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<?php if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) : ?>
	<footer class="footer" id="site-footer">
		<div class="container">
			<div class="footer__grid">
				<div class="footer__brand">
					<a class="brand brand--footer" href="<?php echo esc_url( apply_filters( 'wpml_home_url', home_url( '/' ) ) ); ?>" rel="home"><?php if ( has_custom_logo() ) : ?><?php echo wp_get_attachment_image( get_theme_mod( 'custom_logo' ), 'full', false, array( 'class' => 'brand__logo', 'alt' => get_bloginfo( 'name' ) ) ); ?><?php else : ?><span class="brand__mark"><?php echo travelix_flex_icon( 'compass' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span><span class="brand__text"><?php bloginfo( 'name' ); ?></span><?php endif; ?></a>
					<p><?php echo esc_html( travelix_flex_text( 'footer_about' ) ); ?></p>
					<div class="footer__socials">
						<?php foreach ( array( 'instagram' => 'Instagram', 'telegram' => 'Telegram', 'whatsapp' => 'WhatsApp' ) as $network => $label ) : $url = travelix_flex_option( 'social_' . $network ); if ( ! $url ) { continue; } ?><a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr( $label ); ?>"><?php echo travelix_flex_icon( $network ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></a><?php endforeach; ?>
					</div>
				</div>
				<div><h2 class="footer__title"><?php echo esc_html( travelix_flex_text( 'footer_menu_title' ) ); ?></h2><?php wp_nav_menu( array( 'theme_location' => 'footer', 'container' => false, 'menu_class' => 'footer__menu', 'fallback_cb' => false, 'depth' => 1 ) ); ?></div>
				<div><h2 class="footer__title"><?php echo esc_html( travelix_flex_text( 'footer_services_title' ) ); ?></h2><?php wp_nav_menu( array( 'theme_location' => 'footer_services', 'container' => false, 'menu_class' => 'footer__menu', 'fallback_cb' => false, 'depth' => 1 ) ); ?><ul class="footer__contact"><li><?php echo travelix_flex_icon( 'phone' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><a href="tel:<?php echo esc_attr( travelix_flex_tel_href() ); ?>"><?php echo esc_html( travelix_flex_text( 'phone' ) ); ?></a></li><li><?php echo travelix_flex_icon( 'mail' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><a href="mailto:<?php echo esc_attr( antispambot( travelix_flex_option( 'email' ) ) ); ?>"><?php echo esc_html( antispambot( travelix_flex_option( 'email' ) ) ); ?></a></li></ul></div>
				<div class="footer__form"><h2 class="footer__title"><?php echo esc_html( travelix_flex_text( 'footer_form_title' ) ); ?></h2><p><?php echo esc_html( travelix_flex_text( 'footer_form_copy' ) ); ?></p><?php if ( travelix_flex_option( 'footer_form_shortcode' ) ) : echo do_shortcode( travelix_flex_option( 'footer_form_shortcode' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					else : ?><a class="btn btn-primary" href="<?php echo esc_url( travelix_flex_url( 'header_cta_url' ) ); ?>"><?php echo esc_html( travelix_flex_text( 'header_cta_label' ) ); ?></a><?php endif; ?></div>
				<?php if ( is_active_sidebar( 'footer-custom' ) ) : ?><div class="footer__widgets"><?php dynamic_sidebar( 'footer-custom' ); ?></div><?php endif; ?>
			</div>
			<div class="footer__bottom"><span>© <?php echo esc_html( wp_date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?> — <?php echo esc_html( travelix_flex_text( 'footer_copyright' ) ); ?></span><?php wp_nav_menu( array( 'theme_location' => 'legal', 'container' => false, 'menu_class' => 'footer__legal', 'fallback_cb' => false, 'depth' => 1 ) ); ?></div>
		</div>
	</footer>
<?php endif; ?>
<?php wp_footer(); ?>
</body>
</html>
