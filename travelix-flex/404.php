<?php
/** 404 template. @package Travelix_Flex */
get_header();
?>
<main id="main-content" class="site-main"><section class="not-found"><div class="container"><span class="not-found__code">404</span><h1><?php esc_html_e( 'این مسیر به جایی نرسید', 'travelix-flex' ); ?></h1><p><?php esc_html_e( 'ممکن است صفحه جابه‌جا یا حذف شده باشد. از جستجو یا صفحه اصلی ادامه دهید.', 'travelix-flex' ); ?></p><?php get_search_form(); ?><a class="btn btn-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'بازگشت به خانه', 'travelix-flex' ); ?></a></div></section></main>
<?php get_footer(); ?>

