<?php
/** Search results. @package Travelix_Flex */
get_header();
?>
<main id="main-content" class="site-main"><header class="inner-hero"><div class="container"><span class="eyebrow"><?php esc_html_e( 'نتیجه جستجو', 'travelix-flex' ); ?></span><h1><?php echo esc_html( sprintf( __( 'نتایج برای «%s»', 'travelix-flex' ), get_search_query() ) ); ?></h1></div></header><div class="container archive-shell"><?php if ( have_posts() ) : ?><div class="archive-grid"><?php while ( have_posts() ) : the_post(); get_template_part( 'template-parts/content', 'card' ); endwhile; ?></div><?php the_posts_pagination(); else : ?><p class="travelix-empty"><?php esc_html_e( 'نتیجه‌ای پیدا نشد. عبارت دیگری را امتحان کنید.', 'travelix-flex' ); ?></p><?php get_search_form(); endif; ?></div></main>
<?php get_footer(); ?>

