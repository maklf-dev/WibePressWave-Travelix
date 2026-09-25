<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<?php if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) : ?>
<footer class="footer" id="footer"><div class="container"><div class="footer__grid"><div><a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php if ( has_custom_logo() ) : ?><?php echo wp_get_attachment_image( get_theme_mod( 'custom_logo' ), 'full', false, array( 'class' => 'brand__logo', 'alt' => get_bloginfo( 'name' ) ) ); ?><?php else : ?><img class="brand__logo" src="<?php echo esc_url( get_theme_file_uri( '/assets/images/logo.jpg' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"><?php endif; ?><span><?php bloginfo( 'name' ); ?><small class="brand__sub"><?php bloginfo( 'description' ); ?></small></span></a><p class="footer__about"><?php esc_html_e( 'همراه مطمئن شما برای ساختن سفرهای به‌یادماندنی.', 'travelix' ); ?></p></div><div><h3><?php esc_html_e( 'دسترسی سریع', 'travelix' ); ?></h3><?php wp_nav_menu( array( 'theme_location' => 'footer', 'container' => false, 'fallback_cb' => false ) ); ?></div><div><h3><?php esc_html_e( 'تماس با ما', 'travelix' ); ?></h3><ul class="footer__contact"><li><?php echo esc_html( travelix_email() ); ?></li><li><?php echo esc_html( travelix_phone() ); ?></li></ul></div><div><h3><?php esc_html_e( 'درخواست سفر', 'travelix' ); ?></h3><p class="footer__about"><?php esc_html_e( 'مقصد و زمان سفرتان را ارسال کنید تا کارشناسان ما با شما تماس بگیرند.', 'travelix' ); ?></p><a class="btn btn-primary" href="<?php echo esc_url( home_url( '/#travel-request' ) ); ?>"><?php esc_html_e( 'ثبت درخواست', 'travelix' ); ?></a></div></div><div class="footer__bottom"><span>© <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?></span><span><?php esc_html_e( 'تمام حقوق محفوظ است.', 'travelix' ); ?></span></div></div></footer>
<?php endif; ?>
<?php wp_footer(); ?>
</body>
</html>
