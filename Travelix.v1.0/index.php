<?php get_header(); ?>
<main class="site-content container"><div class="section-header"><div><span class="eyebrow"><?php esc_html_e( 'مجله سفر', 'travelix' ); ?></span><h1 class="section-title"><?php echo esc_html( get_the_archive_title() ? get_the_archive_title() : __( 'جدیدترین مقاله‌ها', 'travelix' ) ); ?></h1></div></div><?php echo do_shortcode( '[travelix_posts limit="12"]' ); ?><?php the_posts_pagination(); ?></main>
<?php get_footer(); ?>
