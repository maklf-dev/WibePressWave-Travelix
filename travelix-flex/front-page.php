<?php
/**
 * Homepage template.
 *
 * @package Travelix_Flex
 */

get_header();
?>
<main id="main-content" class="site-main site-main--home">
	<?php travelix_flex_render_home_sections(); ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php if ( trim( wp_strip_all_tags( get_the_content() ) ) ) : ?><section class="section home-editor-content"><div class="container entry-content"><?php the_content(); ?></div></section><?php endif; ?>
	<?php endwhile; ?>
	<?php if ( travelix_flex_option( 'extra_home_shortcode' ) ) : ?><section class="section extra-plugin-section"><div class="container plugin-slot"><?php echo do_shortcode( travelix_flex_option( 'extra_home_shortcode' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div></section><?php endif; ?>
</main>
<?php get_footer(); ?>

