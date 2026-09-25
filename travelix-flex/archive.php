<?php
/** Archive template. @package Travelix_Flex */
get_header();
?>
<main id="main-content" class="site-main"><header class="inner-hero"><div class="container"><span class="eyebrow"><?php esc_html_e( 'آرشیو', 'travelix-flex' ); ?></span><?php the_archive_title( '<h1>', '</h1>' ); ?><?php the_archive_description( '<div class="archive-description">', '</div>' ); ?></div></header><div class="container archive-shell"><?php if ( have_posts() ) : ?><?php $travelix_archive_count = isset( $GLOBALS['wp_query']->post_count ) ? absint( $GLOBALS['wp_query']->post_count ) : 0; ?><div class="archive-grid<?php echo 1 === $travelix_archive_count ? ' archive-grid--single' : ( 2 === $travelix_archive_count ? ' archive-grid--two' : '' ); ?>"><?php while ( have_posts() ) : the_post(); get_template_part( 'template-parts/content', 'card' ); endwhile; ?></div><?php the_posts_pagination(); else : ?><p class="travelix-empty"><?php esc_html_e( 'موردی پیدا نشد.', 'travelix-flex' ); ?></p><?php endif; ?></div></main>
<?php get_footer(); ?>
