<?php
/**
 * Optional plugin integrations and dynamic content renderers.
 *
 * @package Travelix_Flex
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function travelix_flex_language_switcher() {
	if ( ! travelix_flex_option( 'wpml_switcher_enabled' ) ) {
		return;
	}
	$languages = apply_filters( 'wpml_active_languages', null, 'skip_missing=0&orderby=code' );
	if ( empty( $languages ) || ! is_array( $languages ) ) {
		return;
	}
	echo '<nav class="language-switcher" aria-label="' . esc_attr__( 'انتخاب زبان', 'travelix-flex' ) . '">';
	foreach ( $languages as $language ) {
		$class = ! empty( $language['active'] ) ? ' is-active' : '';
		echo '<a class="language-switcher__link' . esc_attr( $class ) . '" href="' . esc_url( $language['url'] ) . '" lang="' . esc_attr( $language['language_code'] ) . '">' . esc_html( $language['native_name'] ) . '</a>';
	}
	echo '</nav>';
}

function travelix_flex_catalog_mode( $purchasable ) {
	return travelix_flex_option( 'catalog_mode' ) ? false : $purchasable;
}
add_filter( 'woocommerce_is_purchasable', 'travelix_flex_catalog_mode' );

function travelix_flex_loop_button_text( $text ) {
	return travelix_flex_option( 'catalog_mode' ) ? travelix_flex_text( 'catalog_button_label' ) : $text;
}
add_filter( 'woocommerce_product_add_to_cart_text', 'travelix_flex_loop_button_text' );

function travelix_flex_catalog_button_url( $url ) {
	return travelix_flex_option( 'catalog_mode' ) ? travelix_flex_url( 'catalog_button_url' ) : $url;
}
add_filter( 'woocommerce_product_add_to_cart_url', 'travelix_flex_catalog_button_url' );

function travelix_flex_cart_count_markup() {
	$count = function_exists( 'WC' ) && WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
	return '<span class="cart-count" aria-label="' . esc_attr( sprintf( __( '%d محصول در سبد خرید', 'travelix-flex' ), $count ) ) . '">' . esc_html( number_format_i18n( $count ) ) . '</span>';
}

function travelix_flex_cart_fragments( $fragments ) {
	$fragments['span.cart-count'] = travelix_flex_cart_count_markup();
	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'travelix_flex_cart_fragments' );

/**
 * Product card grid.
 *
 * @param array $args Query args.
 * @return string
 */
function travelix_flex_product_grid( $args = array() ) {
	if ( ! function_exists( 'wc_get_products' ) ) {
		return travelix_flex_empty_notice( __( 'برای نمایش تورها، ووکامرس را نصب و فعال کنید.', 'travelix-flex' ) );
	}
	$args = wp_parse_args(
		$args,
		array(
			'status'  => 'publish',
			'limit'   => absint( travelix_flex_option( 'tours_count' ) ),
			'orderby' => 'date',
			'order'   => 'DESC',
		)
	);
	$args['limit'] = min( 12, max( 1, absint( $args['limit'] ) ) );
	$products      = wc_get_products( $args );
	if ( ! $products ) {
		return travelix_flex_empty_notice( __( 'هنوز محصولی مطابق این تنظیمات منتشر نشده است.', 'travelix-flex' ) );
	}

	$duration_key = sanitize_title( travelix_flex_option( 'product_duration_attribute' ) );
	$meta_key     = sanitize_title( travelix_flex_option( 'product_meta_attribute' ) );
	ob_start();
	echo '<div class="tour-grid">';
	foreach ( $products as $product ) {
		$image    = wp_get_attachment_image_url( $product->get_image_id(), 'large' );
		$duration = $duration_key ? $product->get_attribute( $duration_key ) : '';
		$meta     = $meta_key ? $product->get_attribute( $meta_key ) : '';
		$summary  = wp_trim_words( wp_strip_all_tags( $product->get_short_description() ), 18 );
		$url      = get_permalink( $product->get_id() );
		?>
		<article class="tour-card reveal">
			<a class="tour-card__media" href="<?php echo esc_url( $url ); ?>">
				<?php if ( travelix_flex_option( 'product_show_duration' ) && $duration ) : ?><span class="tour-card__badge"><?php echo esc_html( $duration ); ?></span><?php endif; ?>
				<?php if ( $image ) : ?><img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $product->get_name() ); ?>" loading="lazy" decoding="async"><?php else : ?><img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/demo-tour.svg' ) ); ?>" alt="" loading="lazy" decoding="async"><?php endif; ?>
			</a>
			<div class="tour-card__body">
				<?php if ( $meta ) : ?><span class="card-kicker"><?php echo esc_html( $meta ); ?></span><?php endif; ?>
				<h3><a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $product->get_name() ); ?></a></h3>
				<?php if ( travelix_flex_option( 'product_show_excerpt' ) && $summary ) : ?><p class="tour-card__route"><?php echo esc_html( $summary ); ?></p><?php endif; ?>
				<div class="tour-card__footer">
				<?php if ( travelix_flex_option( 'product_show_price' ) ) : ?><div class="tour-price"><strong dir="auto"><?php echo $product->get_price_html() ? wp_kses_post( $product->get_price_html() ) : esc_html__( 'تماس برای قیمت', 'travelix-flex' ); ?></strong><span><?php echo esc_html( travelix_flex_text( 'product_price_suffix' ) ); ?></span></div><?php endif; ?>
					<a class="round-link" href="<?php echo esc_url( $url ); ?>" aria-label="<?php echo esc_attr( travelix_flex_text( 'product_button_label' ) . ': ' . $product->get_name() ); ?>"><?php echo travelix_flex_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><span class="screen-reader-text"><?php echo esc_html( travelix_flex_text( 'product_button_label' ) ); ?></span></a>
				</div>
			</div>
		</article>
		<?php
	}
	echo '</div>';
	return ob_get_clean();
}

function travelix_flex_products_shortcode( $atts ) {
	$atts = shortcode_atts( array( 'limit' => 3, 'category' => '', 'featured' => 'false' ), $atts, 'travelix_products' );
	$args = array( 'limit' => min( 12, max( 1, absint( $atts['limit'] ) ) ) );
	if ( $atts['category'] ) {
		$args['category'] = array_map( 'sanitize_title', explode( ',', $atts['category'] ) );
	}
	if ( 'true' === strtolower( (string) $atts['featured'] ) ) {
		$args['featured'] = true;
	}
	return travelix_flex_product_grid( $args );
}
add_shortcode( 'travelix_products', 'travelix_flex_products_shortcode' );

function travelix_flex_destination_grid( $limit = 5 ) {
	if ( ! taxonomy_exists( 'product_cat' ) ) {
		return travelix_flex_empty_notice( __( 'برای نمایش مقصدها، ووکامرس را نصب و دسته‌بندی محصول ایجاد کنید.', 'travelix-flex' ) );
	}
	$terms = get_terms(
		array(
			'taxonomy'   => 'product_cat',
			'hide_empty' => (bool) travelix_flex_option( 'destination_hide_empty' ),
			'number'     => min( 12, max( 1, absint( $limit ) ) ),
			'orderby'    => travelix_flex_option( 'destination_orderby' ),
			'order'      => 'DESC',
		)
	);
	if ( is_wp_error( $terms ) || ! $terms ) {
		return travelix_flex_empty_notice( __( 'هنوز مقصدی برای نمایش وجود ندارد.', 'travelix-flex' ) );
	}
	ob_start();
	echo '<div class="destinations-track">';
	foreach ( $terms as $term ) {
		$term_link = get_term_link( $term );
		if ( is_wp_error( $term_link ) ) {
			continue;
		}
		$thumbnail_id = absint( get_term_meta( $term->term_id, 'thumbnail_id', true ) );
		$image        = $thumbnail_id ? wp_get_attachment_image_url( $thumbnail_id, 'large' ) : '';
		?>
		<a class="destination-card reveal" href="<?php echo esc_url( $term_link ); ?>">
			<?php if ( $image ) : ?><img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $term->name ); ?>" loading="lazy" decoding="async"><?php else : ?><img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/demo-destination.svg' ) ); ?>" alt="" loading="lazy" decoding="async"><?php endif; ?>
			<span class="destination-card__overlay"></span>
			<span class="destination-card__content"><strong><?php echo esc_html( $term->name ); ?></strong><small><?php echo esc_html( sprintf( _n( '%s سفر', '%s سفر', $term->count, 'travelix-flex' ), number_format_i18n( $term->count ) ) ); ?></small></span>
		</a>
		<?php
	}
	echo '</div>';
	return ob_get_clean();
}

function travelix_flex_destinations_shortcode( $atts ) {
	$atts = shortcode_atts( array( 'limit' => 5 ), $atts, 'travelix_destinations' );
	return travelix_flex_destination_grid( $atts['limit'] );
}
add_shortcode( 'travelix_destinations', 'travelix_flex_destinations_shortcode' );

function travelix_flex_posts_grid( $limit = 3, $category = '' ) {
	$query = new WP_Query(
		array(
			'post_type'           => 'post',
			'post_status'         => 'publish',
			'posts_per_page'      => min( 12, max( 1, absint( $limit ) ) ),
			'category_name'       => sanitize_title( $category ),
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
		)
	);
	if ( ! $query->have_posts() ) {
		return travelix_flex_empty_notice( __( 'هنوز مقاله‌ای منتشر نشده است.', 'travelix-flex' ) );
	}
	ob_start();
	echo '<div class="blog-grid">';
	while ( $query->have_posts() ) {
		$query->the_post();
		$categories = get_the_category();
		?>
		<article <?php post_class( 'blog-card reveal' ); ?>>
			<a class="blog-card__media" href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'large', array( 'loading' => 'lazy', 'decoding' => 'async' ) ); } else { ?><img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/demo-destination.svg' ) ); ?>" alt="" loading="lazy" decoding="async"><?php } ?></a>
			<div class="blog-card__body">
				<?php if ( $categories ) : ?><a class="blog-card__tag" href="<?php echo esc_url( get_category_link( $categories[0] ) ); ?>"><?php echo esc_html( $categories[0]->name ); ?></a><?php endif; ?>
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<?php if ( travelix_flex_option( 'blog_show_excerpt' ) ) : ?><p><?php echo esc_html( wp_trim_words( get_the_excerpt(), absint( travelix_flex_option( 'blog_excerpt_words' ) ) ) ); ?></p><?php endif; ?>
				<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>" dir="auto"><?php echo esc_html( get_the_date() ); ?></time>
			</div>
		</article>
		<?php
	}
	echo '</div>';
	wp_reset_postdata();
	return ob_get_clean();
}

function travelix_flex_posts_shortcode( $atts ) {
	$atts = shortcode_atts( array( 'limit' => 3, 'category' => '' ), $atts, 'travelix_posts' );
	return travelix_flex_posts_grid( $atts['limit'], $atts['category'] );
}
add_shortcode( 'travelix_posts', 'travelix_flex_posts_shortcode' );

function travelix_flex_form_shortcode( $atts ) {
	$atts = shortcode_atts( array( 'id' => travelix_flex_option( 'gravity_form_id' ) ), $atts, 'travelix_form' );
	if ( ! function_exists( 'gravity_form' ) ) {
		return travelix_flex_empty_notice( __( 'Gravity Forms فعال نیست. می‌توانید منبع فرم را روی «شورت‌کد دلخواه» بگذارید.', 'travelix-flex' ) );
	}
	$form_id = absint( $atts['id'] );
	if ( ! $form_id ) {
		return '';
	}
	ob_start();
	gravity_form( $form_id, false, false, false, null, true, 0, true );
	return ob_get_clean();
}
add_shortcode( 'travelix_form', 'travelix_flex_form_shortcode' );
