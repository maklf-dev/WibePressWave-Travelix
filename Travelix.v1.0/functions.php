<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function travelix_theme_setup() {
	load_theme_textdomain( 'travelix', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array( 'height' => 120, 'width' => 150, 'flex-height' => true, 'flex-width' => true ) );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'woocommerce', array( 'thumbnail_image_width' => 720, 'single_image_width' => 1200 ) );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	register_nav_menus( array(
		'primary' => __( 'منوی اصلی', 'travelix' ),
		'footer'  => __( 'منوی فوتر', 'travelix' ),
	) );
}
add_action( 'after_setup_theme', 'travelix_theme_setup' );

function travelix_sanitize_checkbox( $checked ) {
	return isset( $checked ) && true === (bool) $checked;
}

function travelix_sanitize_shortcode( $value ) {
	return sanitize_text_field( $value );
}

function travelix_customize_register( $customizer ) {
	$customizer->add_section( 'travelix_home_options', array(
		'title'       => __( 'تنظیمات صفحه اصلی Travelix', 'travelix' ),
		'priority'    => 35,
		'description' => __( 'اطلاعات تماس، فرم، تصاویر و جایگاه رزرو را بدون ویرایش کد مدیریت کنید.', 'travelix' ),
	) );

	$customizer->add_setting( 'travelix_phone', array( 'default' => '+98 21 1234 5678', 'sanitize_callback' => 'sanitize_text_field' ) );
	$customizer->add_control( 'travelix_phone', array( 'section' => 'travelix_home_options', 'label' => __( 'شماره تماس', 'travelix' ), 'type' => 'text' ) );

	$customizer->add_setting( 'travelix_email', array( 'default' => get_option( 'admin_email' ), 'sanitize_callback' => 'sanitize_email' ) );
	$customizer->add_control( 'travelix_email', array( 'section' => 'travelix_home_options', 'label' => __( 'ایمیل تماس', 'travelix' ), 'type' => 'email' ) );

	$customizer->add_setting( 'travelix_gravity_form_id', array( 'default' => 1, 'sanitize_callback' => 'absint' ) );
	$customizer->add_control( 'travelix_gravity_form_id', array( 'section' => 'travelix_home_options', 'label' => __( 'شناسه فرم Gravity Forms', 'travelix' ), 'type' => 'number', 'input_attrs' => array( 'min' => 1 ) ) );

	$customizer->add_setting( 'travelix_booking_shortcode', array( 'default' => '', 'sanitize_callback' => 'travelix_sanitize_shortcode' ) );
	$customizer->add_control( 'travelix_booking_shortcode', array(
		'section'     => 'travelix_home_options',
		'label'       => __( 'شورت‌کد سامانه رزرو آینده', 'travelix' ),
		'description' => __( 'فعلاً خالی بگذارید. بعداً شورت‌کد تولیدشده توسط Bookly را اینجا قرار دهید.', 'travelix' ),
		'type'        => 'text',
	) );

	$customizer->add_setting( 'travelix_enable_checkout', array( 'default' => false, 'sanitize_callback' => 'travelix_sanitize_checkbox' ) );
	$customizer->add_control( 'travelix_enable_checkout', array(
		'section'     => 'travelix_home_options',
		'label'       => __( 'فعال‌کردن خرید مستقیم ووکامرس', 'travelix' ),
		'description' => __( 'تا زمانی که رزرو یا فروش مستقیم آماده نشده، خاموش بماند.', 'travelix' ),
		'type'        => 'checkbox',
	) );

	$customizer->add_setting( 'travelix_hero_image', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
	$customizer->add_control( new WP_Customize_Image_Control( $customizer, 'travelix_hero_image', array( 'section' => 'travelix_home_options', 'label' => __( 'تصویر اصلی هیرو', 'travelix' ) ) ) );

	$customizer->add_setting( 'travelix_why_main_image', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
	$customizer->add_control( new WP_Customize_Image_Control( $customizer, 'travelix_why_main_image', array( 'section' => 'travelix_home_options', 'label' => __( 'تصویر بزرگ بخش معرفی', 'travelix' ) ) ) );

	$customizer->add_setting( 'travelix_why_small_image', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
	$customizer->add_control( new WP_Customize_Image_Control( $customizer, 'travelix_why_small_image', array( 'section' => 'travelix_home_options', 'label' => __( 'تصویر کوچک بخش معرفی', 'travelix' ) ) ) );
}
add_action( 'customize_register', 'travelix_customize_register' );

function travelix_phone() {
	return (string) get_theme_mod( 'travelix_phone', '+98 21 1234 5678' );
}

function travelix_email() {
	return sanitize_email( get_theme_mod( 'travelix_email', get_option( 'admin_email' ) ) );
}

function travelix_asset_version( $relative_path ) {
	$path = get_theme_file_path( $relative_path );
	return file_exists( $path ) ? (string) filemtime( $path ) : '2.0.0';
}

function travelix_enqueue_assets() {
	wp_enqueue_style( 'travelix-fonts', 'https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&family=Vazirmatn:wght@400;500;600;700&display=swap', array(), null );
	wp_enqueue_style( 'travelix-main', get_theme_file_uri( '/assets/css/main.css' ), array(), travelix_asset_version( '/assets/css/main.css' ) );
	wp_enqueue_script( 'travelix-main', get_theme_file_uri( '/assets/js/main.js' ), array(), travelix_asset_version( '/assets/js/main.js' ), true );
}
add_action( 'wp_enqueue_scripts', 'travelix_enqueue_assets' );

function travelix_register_elementor_locations( $elementor_theme_manager ) {
	$elementor_theme_manager->register_all_core_location();
}
add_action( 'elementor/theme/register_locations', 'travelix_register_elementor_locations' );

function travelix_language_switcher() {
	$languages = apply_filters( 'wpml_active_languages', null, 'skip_missing=0&orderby=code' );
	if ( empty( $languages ) || ! is_array( $languages ) ) {
		return;
	}
	echo '<div class="travelix-languages" aria-label="' . esc_attr__( 'انتخاب زبان', 'travelix' ) . '">';
	foreach ( $languages as $language ) {
		$class = ! empty( $language['active'] ) ? ' is-active' : '';
		echo '<a class="travelix-language' . esc_attr( $class ) . '" href="' . esc_url( $language['url'] ) . '" lang="' . esc_attr( $language['language_code'] ) . '">' . esc_html( $language['native_name'] ) . '</a>';
	}
	echo '</div>';
}

function travelix_catalog_mode( $purchasable ) {
	if ( get_theme_mod( 'travelix_enable_checkout', false ) ) {
		return $purchasable;
	}
	return false;
}
add_filter( 'woocommerce_is_purchasable', 'travelix_catalog_mode', 10, 1 );

function travelix_products_shortcode( $atts ) {
	if ( ! function_exists( 'wc_get_products' ) ) {
		return '<p class="travelix-empty">' . esc_html__( 'برای نمایش سفرها، ووکامرس را نصب و فعال کنید.', 'travelix' ) . '</p>';
	}
	$atts = shortcode_atts( array( 'limit' => 3, 'category' => '', 'featured' => 'false' ), $atts, 'travelix_products' );
	$limit = min( 12, max( 1, absint( $atts['limit'] ) ) );
	$args = array( 'status' => 'publish', 'limit' => $limit, 'orderby' => 'date', 'order' => 'DESC' );
	if ( $atts['category'] ) {
		$args['category'] = array_map( 'sanitize_title', explode( ',', $atts['category'] ) );
	}
	if ( 'true' === $atts['featured'] ) {
		$args['featured'] = true;
	}
	$products = wc_get_products( $args );
	if ( ! $products ) {
		return '<p class="travelix-empty">' . esc_html__( 'هنوز سفر منتخبی منتشر نشده است. حداقل یک محصول منتشرشده را Featured کنید.', 'travelix' ) . '</p>';
	}
	ob_start();
	echo '<div class="tour-grid">';
	foreach ( $products as $product ) {
		$image = wp_get_attachment_image_url( $product->get_image_id(), 'large' );
		$duration = $product->get_attribute( 'pa_duration' );
		if ( ! $duration ) {
			$duration = $product->get_attribute( 'duration' );
		}
		$summary = wp_trim_words( wp_strip_all_tags( $product->get_short_description() ), 14 );
		?>
		<article class="tour-card reveal">
			<a class="tour-card__media" href="<?php echo esc_url( $product->get_permalink() ); ?>">
				<?php if ( $duration ) : ?><span class="tour-card__badge"><?php echo esc_html( $duration ); ?></span><?php endif; ?>
				<?php if ( $image ) : ?><img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $product->get_name() ); ?>" loading="lazy"><?php else : ?><span class="travelix-image-placeholder"></span><?php endif; ?>
			</a>
			<div class="tour-card__body">
				<h3><a href="<?php echo esc_url( $product->get_permalink() ); ?>"><?php echo esc_html( $product->get_name() ); ?></a></h3>
				<?php if ( $summary ) : ?><p class="tour-card__route"><?php echo esc_html( $summary ); ?></p><?php endif; ?>
				<div class="tour-card__footer"><div class="tour-price"><strong><?php echo $product->get_price_html() ? wp_kses_post( $product->get_price_html() ) : esc_html__( 'تماس برای قیمت', 'travelix' ); ?></strong><span><?php esc_html_e( 'برای هر مسافر', 'travelix' ); ?></span></div><a class="round-link" href="<?php echo esc_url( $product->get_permalink() ); ?>" aria-label="<?php echo esc_attr( sprintf( __( 'مشاهده %s', 'travelix' ), $product->get_name() ) ); ?>">←</a></div>
			</div>
		</article>
		<?php
	}
	echo '</div>';
	return ob_get_clean();
}
add_shortcode( 'travelix_products', 'travelix_products_shortcode' );

function travelix_posts_shortcode( $atts ) {
	$atts = shortcode_atts( array( 'limit' => 3, 'category' => '' ), $atts, 'travelix_posts' );
	$limit = min( 12, max( 1, absint( $atts['limit'] ) ) );
	$args = array( 'post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => $limit, 'ignore_sticky_posts' => true );
	if ( $atts['category'] ) {
		$args['category_name'] = sanitize_title( $atts['category'] );
	}
	$query = new WP_Query( $args );
	if ( ! $query->have_posts() ) {
		return '<p class="travelix-empty">' . esc_html__( 'هنوز مقاله‌ای منتشر نشده است.', 'travelix' ) . '</p>';
	}
	ob_start();
	echo '<div class="blog-grid">';
	while ( $query->have_posts() ) {
		$query->the_post();
		$categories = get_the_category();
		?>
		<article class="blog-card reveal">
			<a class="blog-card__media" href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'large', array( 'loading' => 'lazy' ) ); } else { echo '<span class="travelix-image-placeholder"></span>'; } ?></a>
			<div class="blog-card__body">
				<?php if ( $categories ) : ?><span class="blog-card__tag"><?php echo esc_html( $categories[0]->name ); ?></span><?php endif; ?>
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
			</div>
		</article>
		<?php
	}
	echo '</div>';
	wp_reset_postdata();
	return ob_get_clean();
}
add_shortcode( 'travelix_posts', 'travelix_posts_shortcode' );

function travelix_destinations_shortcode( $atts ) {
	if ( ! taxonomy_exists( 'product_cat' ) ) {
		return '';
	}
	$atts = shortcode_atts( array( 'limit' => 5 ), $atts, 'travelix_destinations' );
	$limit = min( 10, max( 1, absint( $atts['limit'] ) ) );
	$terms = get_terms( array( 'taxonomy' => 'product_cat', 'hide_empty' => true, 'number' => $limit, 'orderby' => 'count', 'order' => 'DESC' ) );
	if ( is_wp_error( $terms ) || ! $terms ) {
		return '<p class="travelix-empty">' . esc_html__( 'برای نمایش مقصدها، دسته‌بندی محصول بسازید و حداقل یک سفر منتشرشده به آن متصل کنید.', 'travelix' ) . '</p>';
	}
	ob_start();
	echo '<div class="destinations-track">';
	foreach ( $terms as $term ) {
		$thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
		$image = $thumbnail_id ? wp_get_attachment_image_url( $thumbnail_id, 'large' ) : '';
		$term_link = get_term_link( $term );
		if ( is_wp_error( $term_link ) ) {
			continue;
		}
		?>
		<a class="destination-card reveal" href="<?php echo esc_url( $term_link ); ?>">
			<?php if ( $image ) : ?><img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $term->name ); ?>" loading="lazy"><?php else : ?><span class="travelix-image-placeholder"></span><?php endif; ?>
			<div class="destination-card__content"><div class="destination-card__meta"><div><h3><?php echo esc_html( $term->name ); ?></h3><p><?php echo esc_html( number_format_i18n( $term->count ) ); ?> <?php esc_html_e( 'سفر', 'travelix' ); ?></p></div></div></div>
		</a>
		<?php
	}
	echo '</div>';
	return ob_get_clean();
}
add_shortcode( 'travelix_destinations', 'travelix_destinations_shortcode' );

function travelix_gravity_form_shortcode( $atts ) {
	$atts = shortcode_atts( array( 'id' => get_theme_mod( 'travelix_gravity_form_id', 1 ) ), $atts, 'travelix_form' );
	if ( ! function_exists( 'gravity_form' ) ) {
		return '<p class="travelix-empty">' . esc_html__( 'Gravity Forms را فعال و شناسه فرم را در تنظیمات قالب وارد کنید.', 'travelix' ) . '</p>';
	}
	$form_id = absint( $atts['id'] );
	if ( ! $form_id ) {
		return '';
	}
	ob_start();
	gravity_form( $form_id, false, false, false, null, true, 0, true );
	return ob_get_clean();
}
add_shortcode( 'travelix_form', 'travelix_gravity_form_shortcode' );
