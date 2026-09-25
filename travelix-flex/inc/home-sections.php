<?php
/**
 * Homepage section renderers.
 *
 * @package Travelix_Flex
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Render enabled sections in the administrator-selected numeric order.
 */
function travelix_flex_render_home_sections() {
	$sections = array(
		'hero'         => 'travelix_flex_home_hero',
		'lead_form'    => 'travelix_flex_home_lead_form',
		'trust'        => 'travelix_flex_home_trust',
		'destinations' => 'travelix_flex_home_destinations',
		'about'        => 'travelix_flex_home_about',
		'process'      => 'travelix_flex_home_process',
		'booking'      => 'travelix_flex_home_booking',
		'tours'        => 'travelix_flex_home_tours',
		'testimonials' => 'travelix_flex_home_testimonials',
		'blog'         => 'travelix_flex_home_blog',
		'cta'          => 'travelix_flex_home_cta',
	);
	$ordered = array();
	foreach ( $sections as $key => $callback ) {
		if ( travelix_flex_option( $key . '_enabled' ) ) {
			$order             = absint( travelix_flex_option( $key . '_order' ) );
			$ordered[ $order . '-' . $key ] = $callback;
		}
	}
	ksort( $ordered, SORT_NATURAL );
	foreach ( $ordered as $callback ) {
		call_user_func( $callback );
	}
}

function travelix_flex_home_hero() {
	?>
	<section class="hero" id="home">
		<div class="container hero__inner">
			<div class="hero__content reveal">
				<?php if ( travelix_flex_text( 'hero_eyebrow' ) ) : ?><span class="eyebrow eyebrow--light"><?php echo esc_html( travelix_flex_text( 'hero_eyebrow' ) ); ?></span><?php endif; ?>
				<h1 class="hero__title"><em><?php echo esc_html( travelix_flex_text( 'hero_title' ) ); ?></em><?php if ( travelix_flex_text( 'hero_title_second' ) ) : ?><span><?php echo esc_html( travelix_flex_text( 'hero_title_second' ) ); ?></span><?php endif; ?></h1>
				<?php if ( travelix_flex_text( 'hero_copy' ) ) : ?><p class="hero__copy"><?php echo esc_html( travelix_flex_text( 'hero_copy' ) ); ?></p><?php endif; ?>
				<div class="hero__actions">
					<?php if ( travelix_flex_text( 'hero_primary_label' ) ) : ?><a class="btn btn-primary" href="<?php echo esc_url( travelix_flex_url( 'hero_primary_url' ) ); ?>"><?php echo esc_html( travelix_flex_text( 'hero_primary_label' ) ); ?> <?php echo travelix_flex_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></a><?php endif; ?>
					<?php if ( travelix_flex_text( 'hero_secondary_label' ) ) : ?><a class="btn btn-ghost" href="<?php echo esc_url( travelix_flex_url( 'hero_secondary_url' ) ); ?>"><?php echo esc_html( travelix_flex_text( 'hero_secondary_label' ) ); ?></a><?php endif; ?>
				</div>
			</div>
		</div>
		<?php if ( travelix_flex_text( 'hero_signature' ) ) : ?><span class="hero__signature"><?php echo esc_html( travelix_flex_text( 'hero_signature' ) ); ?></span><?php endif; ?>
	</section>
	<?php
}

function travelix_flex_home_lead_form() {
	$source = travelix_flex_option( 'lead_form_source' );
	$form   = 'gravity' === $source
		? do_shortcode( '[travelix_form id="' . absint( travelix_flex_option( 'gravity_form_id' ) ) . '"]' )
		: do_shortcode( travelix_flex_option( 'lead_form_shortcode' ) );
	?>
	<section class="lead-panel-wrap" id="travel-request">
		<div class="container">
			<div class="lead-panel reveal">
				<div class="lead-panel__intro">
					<?php if ( travelix_flex_text( 'lead_form_eyebrow' ) ) : ?><span class="eyebrow"><?php echo esc_html( travelix_flex_text( 'lead_form_eyebrow' ) ); ?></span><?php endif; ?>
					<h2><?php echo esc_html( travelix_flex_text( 'lead_form_title' ) ); ?></h2>
					<p><?php echo esc_html( travelix_flex_text( 'lead_form_copy' ) ); ?></p>
				</div>
				<div class="lead-panel__form"><?php echo $form ? $form : travelix_flex_empty_notice( __( 'شورت‌کد فرم را در تنظیمات Travelix وارد کنید.', 'travelix-flex' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
			</div>
		</div>
	</section>
	<?php
}

function travelix_flex_home_trust() {
	?>
	<section class="trust" aria-label="<?php esc_attr_e( 'مزیت‌های خدمات', 'travelix-flex' ); ?>">
		<div class="container trust__grid">
			<?php for ( $i = 1; $i <= 4; $i++ ) : if ( ! travelix_flex_text( 'trust_' . $i . '_title' ) ) { continue; } ?>
				<div class="trust-item reveal"><span class="trust-icon"><?php echo travelix_flex_icon( travelix_flex_option( 'trust_' . $i . '_icon' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span><span><strong><?php echo esc_html( travelix_flex_text( 'trust_' . $i . '_title' ) ); ?></strong><small><?php echo esc_html( travelix_flex_text( 'trust_' . $i . '_text' ) ); ?></small></span></div>
			<?php endfor; ?>
		</div>
	</section>
	<?php
}

function travelix_flex_home_destinations() {
	?>
	<section class="section destinations" id="destinations"><div class="container"><?php travelix_flex_section_header( 'destinations' ); ?><?php echo travelix_flex_destination_grid( travelix_flex_option( 'destinations_count' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div></section>
	<?php
}

function travelix_flex_home_about() {
	?>
	<section class="section about" id="about">
		<div class="container about__grid">
			<div class="about__copy reveal">
				<?php if ( travelix_flex_text( 'about_eyebrow' ) ) : ?><span class="eyebrow"><?php echo esc_html( travelix_flex_text( 'about_eyebrow' ) ); ?></span><?php endif; ?>
				<h2 class="section-title"><?php echo esc_html( travelix_flex_text( 'about_title' ) ); ?></h2>
				<p class="section-copy"><?php echo esc_html( travelix_flex_text( 'about_copy' ) ); ?></p>
				<div class="about__features">
					<?php for ( $i = 1; $i <= 4; $i++ ) : if ( ! travelix_flex_text( 'about_' . $i . '_title' ) ) { continue; } ?>
						<div class="feature"><span class="feature__icon"><?php echo travelix_flex_icon( travelix_flex_option( 'about_' . $i . '_icon' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span><span><strong><?php echo esc_html( travelix_flex_text( 'about_' . $i . '_title' ) ); ?></strong><small><?php echo esc_html( travelix_flex_text( 'about_' . $i . '_text' ) ); ?></small></span></div>
					<?php endfor; ?>
				</div>
			</div>
			<div class="about__media reveal">
				<?php if ( travelix_flex_option( 'about_main_image' ) ) : ?><img class="about__image-main" src="<?php echo esc_url( travelix_flex_option( 'about_main_image' ) ); ?>" alt="<?php echo esc_attr( travelix_flex_text( 'about_title' ) ); ?>" loading="lazy" decoding="async"><?php endif; ?>
				<?php if ( travelix_flex_option( 'about_small_image' ) ) : ?><img class="about__image-small" src="<?php echo esc_url( travelix_flex_option( 'about_small_image' ) ); ?>" alt="" loading="lazy" decoding="async"><?php endif; ?>
			</div>
		</div>
	</section>
	<?php
}

function travelix_flex_home_process() {
	?>
	<section class="section process" id="process"><div class="container"><?php travelix_flex_section_header( 'process' ); ?><div class="process__grid">
		<?php for ( $i = 1; $i <= 3; $i++ ) : ?><article class="process-card reveal"><span class="process-card__number"><?php echo esc_html( travelix_flex_text( 'process_' . $i . '_number' ) ); ?></span><h3><?php echo esc_html( travelix_flex_text( 'process_' . $i . '_title' ) ); ?></h3><p><?php echo esc_html( travelix_flex_text( 'process_' . $i . '_text' ) ); ?></p></article><?php endfor; ?>
	</div></div></section>
	<?php
}

function travelix_flex_home_booking() {
	$shortcode = trim( (string) travelix_flex_option( 'booking_shortcode' ) );
	if ( ! $shortcode ) {
		return;
	}
	?>
	<section class="section booking-section" id="reservation"><div class="container"><?php travelix_flex_section_header( 'booking' ); ?><div class="plugin-slot reveal"><?php echo do_shortcode( $shortcode ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div></div></section>
	<?php
}

function travelix_flex_home_tours() {
	$shop_url = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/' );
	$args     = array( 'limit' => travelix_flex_option( 'tours_count' ) );
	$source   = travelix_flex_option( 'tours_source' );
	if ( 'featured' === $source ) {
		$args['featured'] = true;
	} elseif ( 'category' === $source && travelix_flex_option( 'tours_category' ) ) {
		$args['category'] = array( sanitize_title( travelix_flex_option( 'tours_category' ) ) );
	}
	?>
	<section class="section tours" id="tours"><div class="container"><?php travelix_flex_section_header( 'tours', travelix_flex_text( 'tours_link_label' ), $shop_url ); ?><?php echo travelix_flex_product_grid( $args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div></section>
	<?php
}

function travelix_flex_home_testimonials() {
	?>
	<section class="section testimonials" id="testimonials"><div class="container testimonials__inner"><?php travelix_flex_section_header( 'testimonials' ); ?><div class="testimonial-slider reveal" data-testimonial-slider>
		<div class="testimonial-slider__track">
			<?php for ( $i = 1; $i <= 3; $i++ ) : if ( ! travelix_flex_text( 'testimonial_' . $i . '_quote' ) ) { continue; } ?>
				<?php $traveler_name = travelix_flex_text( 'testimonial_' . $i . '_name' ); $traveler_initial = function_exists( 'mb_substr' ) ? mb_substr( $traveler_name, 0, 1 ) : substr( $traveler_name, 0, 1 ); ?>
				<article class="testimonial-card<?php echo 1 === $i ? ' is-active' : ''; ?>" data-testimonial><span class="testimonial-card__quote"><?php echo travelix_flex_icon( 'quote' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span><blockquote><?php echo esc_html( travelix_flex_text( 'testimonial_' . $i . '_quote' ) ); ?></blockquote><footer><?php if ( travelix_flex_option( 'testimonial_' . $i . '_image' ) ) : ?><img src="<?php echo esc_url( travelix_flex_option( 'testimonial_' . $i . '_image' ) ); ?>" alt="" loading="lazy"><?php else : ?><span class="testimonial-card__avatar"><?php echo esc_html( $traveler_initial ); ?></span><?php endif; ?><span><strong><?php echo esc_html( $traveler_name ); ?></strong><small><?php echo esc_html( travelix_flex_text( 'testimonial_' . $i . '_role' ) ); ?></small></span></footer></article>
			<?php endfor; ?>
		</div>
		<div class="testimonial-slider__controls"><button type="button" data-testimonial-prev aria-label="<?php esc_attr_e( 'نظر قبلی', 'travelix-flex' ); ?>"><?php echo travelix_flex_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></button><div class="testimonial-slider__dots" data-testimonial-dots></div><button type="button" data-testimonial-next aria-label="<?php esc_attr_e( 'نظر بعدی', 'travelix-flex' ); ?>"><?php echo travelix_flex_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></button></div>
	</div></div></section>
	<?php
}

function travelix_flex_home_blog() {
	$posts_page_id = absint( get_option( 'page_for_posts' ) );
	$blog_url      = $posts_page_id ? get_permalink( $posts_page_id ) : home_url( '/' );
	?>
	<section class="section stories" id="stories"><div class="container"><?php travelix_flex_section_header( 'blog', travelix_flex_text( 'blog_link_label' ), $blog_url ); ?><?php echo travelix_flex_posts_grid( travelix_flex_option( 'blog_count' ), travelix_flex_option( 'blog_category' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div></section>
	<?php
}

function travelix_flex_home_cta() {
	?>
	<section class="section cta"><div class="container"><div class="cta-card reveal"><div class="cta-card__content"><span class="eyebrow eyebrow--light"><?php echo esc_html( travelix_flex_text( 'cta_eyebrow' ) ); ?></span><h2><?php echo esc_html( travelix_flex_text( 'cta_title' ) ); ?></h2><p><?php echo esc_html( travelix_flex_text( 'cta_copy' ) ); ?></p><a class="btn btn-primary" href="<?php echo esc_url( travelix_flex_url( 'cta_button_url' ) ); ?>"><?php echo esc_html( travelix_flex_text( 'cta_button_label' ) ); ?> <?php echo travelix_flex_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></a></div></div></div></section>
	<?php
}
