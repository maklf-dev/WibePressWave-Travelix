<?php
/**
 * Main fallback template.
 *
 * @package Travelix_Flex
 */

get_header();
?>
<main id="main-content" class="site-main">
	<?php if ( travelix_flex_option( 'inner_hero_enabled' ) ) : ?><header class="inner-hero"><div class="container"><span class="eyebrow"><?php esc_html_e( 'مجله سفر', 'travelix-flex' ); ?></span><h1><?php echo esc_html( get_the_archive_title() ? wp_strip_all_tags( get_the_archive_title() ) : get_bloginfo( 'name' ) ); ?></h1></div></header><?php endif; ?>
	<div class="container archive-shell">
		<?php if ( have_posts() ) : ?><div class="archive-grid"><?php while ( have_posts() ) : the_post(); get_template_part( 'template-parts/content', 'card' ); endwhile; ?></div><?php the_posts_pagination(); ?><?php else : ?><p class="travelix-empty"><?php esc_html_e( 'محتوایی پیدا نشد.', 'travelix-flex' ); ?></p><?php endif; ?>
	</div>
</main>
<?php get_footer(); ?>

