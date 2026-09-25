<?php
/** Page template. @package Travelix_Flex */
get_header();
while ( have_posts() ) : the_post();
?>
<main id="main-content" class="site-main"><article <?php post_class(); ?>><?php if ( travelix_flex_option( 'inner_hero_enabled' ) ) : ?><header class="inner-hero"><div class="container"><span class="eyebrow"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></span><h1><?php the_title(); ?></h1></div></header><?php endif; ?><div class="container entry-page entry-content"><?php the_content(); ?><?php wp_link_pages(); ?></div></article></main>
<?php endwhile; get_footer(); ?>

