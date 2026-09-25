<?php get_header(); ?>
<main class="site-content container">
	<?php while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-entry' ); ?>><span class="eyebrow"><?php echo esc_html( get_the_date() ); ?></span><h1 class="section-title"><?php the_title(); ?></h1><?php if ( has_post_thumbnail() ) : ?><div class="single-entry__image"><?php the_post_thumbnail( 'full' ); ?></div><?php endif; ?><div class="entry-content"><?php the_content(); ?></div></article>
	<?php endwhile; ?>
</main>
<?php get_footer(); ?>

