<?php
/** Single post template. @package Travelix_Flex */
get_header();
while ( have_posts() ) : the_post();
?>
<main id="main-content" class="site-main"><article <?php post_class( 'single-article' ); ?>><header class="inner-hero inner-hero--single"><div class="container entry-single"><div class="entry-meta"><time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>" dir="auto"><?php echo esc_html( get_the_date() ); ?></time><?php $cats = get_the_category_list( '، ' ); if ( $cats ) : ?> <span aria-hidden="true">·</span> <?php echo wp_kses_post( $cats ); endif; ?></div><h1><?php the_title(); ?></h1></div></header><div class="container entry-single entry-content"><?php if ( has_post_thumbnail() ) : ?><figure class="entry-featured"><?php the_post_thumbnail( 'full', array( 'decoding' => 'async' ) ); ?></figure><?php endif; ?><?php the_content(); ?><?php wp_link_pages(); ?><footer class="entry-footer"><?php the_tags( '<div class="entry-tags">', ' ', '</div>' ); ?></footer><?php the_post_navigation(); ?><?php if ( comments_open() || get_comments_number() ) { comments_template(); } ?></div></article></main>
<?php endwhile; get_footer(); ?>
