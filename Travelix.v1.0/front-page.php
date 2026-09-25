<?php
get_header();

$front_page_id = (int) get_option( 'page_on_front' );
$hero_image = get_theme_mod( 'travelix_hero_image', '' );
if ( ! $hero_image && $front_page_id ) {
	$hero_image = get_the_post_thumbnail_url( $front_page_id, 'full' );
}
if ( ! $hero_image ) {
	$hero_image = 'https://images.unsplash.com/photo-1533104816931-20fa691ff6ca?auto=format&fit=crop&w=2200&q=86';
}

$why_main_image = get_theme_mod( 'travelix_why_main_image', 'https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=1100&q=84' );
$why_small_image = get_theme_mod( 'travelix_why_small_image', 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=900&q=84' );
$gravity_form_id = absint( get_theme_mod( 'travelix_gravity_form_id', 1 ) );
$booking_shortcode = trim( get_theme_mod( 'travelix_booking_shortcode', '' ) );
$shop_url = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/' );
$posts_page_id = (int) get_option( 'page_for_posts' );
$blog_url = $posts_page_id ? get_permalink( $posts_page_id ) : home_url( '/' );
?>
<main id="main-content">
	<section class="hero" style="--travelix-hero-image:url('<?php echo esc_url( $hero_image ); ?>')">
		<div class="container hero__inner">
			<div class="hero__content reveal">
				<span class="eyebrow"><?php esc_html_e( 'دنیا را کشف کنید', 'travelix' ); ?></span>
				<h1 class="hero__title"><?php esc_html_e( 'ماجراجویی بعدی', 'travelix' ); ?> <em><?php esc_html_e( 'شما', 'travelix' ); ?></em><br><?php esc_html_e( 'از اینجا شروع می‌شود', 'travelix' ); ?></h1>
				<p class="hero__copy"><?php esc_html_e( 'مقصدهای خاص، تجربه‌های تازه و سفرهایی که با دقت برای شما برنامه‌ریزی شده‌اند.', 'travelix' ); ?></p>
				<div class="hero__actions">
					<a class="btn btn-primary" href="#tours"><?php esc_html_e( 'مشاهده سفرها', 'travelix' ); ?> ←</a>
					<a class="btn btn-outline" href="#travel-request"><?php esc_html_e( 'دریافت مشاوره', 'travelix' ); ?></a>
				</div>
			</div>
		</div>
		<div class="hero__signature"><?php esc_html_e( 'بیشتر سفر کن، بهتر زندگی کن', 'travelix' ); ?></div>
	</section>

	<section class="booking-panel-wrap" id="travel-request">
		<div class="container">
			<div class="booking-panel booking-panel--gravity reveal">
				<div class="booking-panel__intro"><span class="eyebrow"><?php esc_html_e( 'درخواست سفر اختصاصی', 'travelix' ); ?></span><h2><?php esc_html_e( 'از سفر دلخواهتان برای ما بگویید', 'travelix' ); ?></h2><p><?php esc_html_e( 'اطلاعات اولیه را ثبت کنید تا کارشناسان ما برای ادامه مسیر با شما تماس بگیرند.', 'travelix' ); ?></p></div>
				<?php echo do_shortcode( '[travelix_form id="' . $gravity_form_id . '"]' ); ?>
			</div>
		</div>
	</section>

	<section class="trust">
		<div class="container trust__grid">
			<div class="trust-item reveal"><div class="trust-icon">✓</div><div><strong><?php esc_html_e( 'قیمت‌گذاری شفاف', 'travelix' ); ?></strong><span><?php esc_html_e( 'پیشنهاد متناسب با بودجه شما', 'travelix' ); ?></span></div></div>
			<div class="trust-item reveal"><div class="trust-icon">◎</div><div><strong><?php esc_html_e( 'کارشناسان سفر', 'travelix' ); ?></strong><span><?php esc_html_e( 'مشاوره واقعی پیش از انتخاب', 'travelix' ); ?></span></div></div>
			<div class="trust-item reveal"><div class="trust-icon">24</div><div><strong><?php esc_html_e( 'پشتیبانی همراه', 'travelix' ); ?></strong><span><?php esc_html_e( 'کنار شما در طول سفر', 'travelix' ); ?></span></div></div>
			<div class="trust-item reveal"><div class="trust-icon">↻</div><div><strong><?php esc_html_e( 'برنامه‌ریزی منعطف', 'travelix' ); ?></strong><span><?php esc_html_e( 'هماهنگ با زمان و نیاز شما', 'travelix' ); ?></span></div></div>
		</div>
	</section>

	<section class="section" id="destinations">
		<div class="container">
			<div class="section-header reveal"><div><span class="eyebrow"><?php esc_html_e( 'مقاصد محبوب', 'travelix' ); ?></span><h2 class="section-title"><?php esc_html_e( 'مقصد بعدی خود را پیدا کنید', 'travelix' ); ?></h2><p class="section-copy"><?php esc_html_e( 'این کارت‌ها از دسته‌بندی محصولات ووکامرس خوانده می‌شوند.', 'travelix' ); ?></p></div></div>
			<?php echo do_shortcode( '[travelix_destinations limit="5"]' ); ?>
		</div>
	</section>

	<section class="section section--soft" id="why">
		<div class="container why-grid">
			<div class="why-copy reveal"><span class="eyebrow"><?php esc_html_e( 'چرا Travelix', 'travelix' ); ?></span><h2 class="section-title"><?php esc_html_e( 'فراتر از یک رزرو ساده', 'travelix' ); ?></h2><p class="section-copy"><?php esc_html_e( 'تجربه محلی، انتخاب‌های مطمئن و پشتیبانی انسانی را کنار هم می‌گذاریم تا سفر برای شما ساده‌تر شود.', 'travelix' ); ?></p><div class="why-features"><div class="feature"><div class="feature__icon">۰۱</div><div><strong><?php esc_html_e( 'تجربه‌های منتخب', 'travelix' ); ?></strong><span><?php esc_html_e( 'انتخاب‌شده با دقت', 'travelix' ); ?></span></div></div><div class="feature"><div class="feature__icon">۰۲</div><div><strong><?php esc_html_e( 'تخصص محلی', 'travelix' ); ?></strong><span><?php esc_html_e( 'راهنمایی کاربردی و به‌روز', 'travelix' ); ?></span></div></div><div class="feature"><div class="feature__icon">۰۳</div><div><strong><?php esc_html_e( 'اطلاعات شفاف', 'travelix' ); ?></strong><span><?php esc_html_e( 'جزئیات روشن هر سفر', 'travelix' ); ?></span></div></div><div class="feature"><div class="feature__icon">۰۴</div><div><strong><?php esc_html_e( 'پشتیبانی انسانی', 'travelix' ); ?></strong><span><?php esc_html_e( 'پیش و هنگام سفر', 'travelix' ); ?></span></div></div></div></div>
			<div class="why-media reveal"><img class="why-media__main" src="<?php echo esc_url( $why_main_image ); ?>" alt="<?php echo esc_attr__( 'تجربه سفر', 'travelix' ); ?>" loading="lazy"><img class="why-media__small" src="<?php echo esc_url( $why_small_image ); ?>" alt="<?php echo esc_attr__( 'منظره سفر', 'travelix' ); ?>" loading="lazy"></div>
		</div>
	</section>

	<section class="section process" id="process">
		<div class="container"><div class="section-header reveal"><div><span class="eyebrow"><?php esc_html_e( 'مسیر برنامه‌ریزی سفر', 'travelix' ); ?></span><h2 class="section-title"><?php esc_html_e( 'از یک ایده تا سفری فراموش‌نشدنی', 'travelix' ); ?></h2><p class="section-copy"><?php esc_html_e( 'فرآیندی شفاف که بر اساس زمان، بودجه و سبک سفر شما شکل می‌گیرد.', 'travelix' ); ?></p></div></div><div class="process-grid"><article class="process-card reveal"><span class="process-card__number">۰۱</span><h3><?php esc_html_e( 'درخواستتان را ثبت کنید', 'travelix' ); ?></h3><p><?php esc_html_e( 'مقصد، تاریخ تقریبی و سبک سفر را برای ما ارسال کنید.', 'travelix' ); ?></p></article><article class="process-card reveal"><span class="process-card__number">۰۲</span><h3><?php esc_html_e( 'پیشنهاد اختصاصی بگیرید', 'travelix' ); ?></h3><p><?php esc_html_e( 'کارشناسان ما مسیر و خدمات مناسب را برای شما آماده می‌کنند.', 'travelix' ); ?></p></article><article class="process-card reveal"><span class="process-card__number">۰۳</span><h3><?php esc_html_e( 'با خیال آسوده سفر کنید', 'travelix' ); ?></h3><p><?php esc_html_e( 'پس از هماهنگی نهایی، پشتیبانی سفر در کنار شما خواهد بود.', 'travelix' ); ?></p></article></div></div>
	</section>

	<?php if ( $booking_shortcode ) : ?>
	<section class="section travelix-booking-slot" id="reservation"><div class="container"><div class="section-header"><div><span class="eyebrow"><?php esc_html_e( 'رزرو آنلاین', 'travelix' ); ?></span><h2 class="section-title"><?php esc_html_e( 'زمان مناسب خود را انتخاب کنید', 'travelix' ); ?></h2></div></div><?php echo do_shortcode( $booking_shortcode ); ?></div></section>
	<?php endif; ?>

	<section class="section" id="tours">
		<div class="container"><div class="section-header reveal"><div><span class="eyebrow"><?php esc_html_e( 'سفرهای منتخب', 'travelix' ); ?></span><h2 class="section-title"><?php esc_html_e( 'پیشنهادهای ویژه برای شما', 'travelix' ); ?></h2><p class="section-copy"><?php esc_html_e( 'تصویر، عنوان، خلاصه، مدت و قیمت هر کارت مستقیماً از محصول ووکامرس خوانده می‌شود.', 'travelix' ); ?></p></div><a class="link-arrow" href="<?php echo esc_url( $shop_url ); ?>"><?php esc_html_e( 'همه سفرها', 'travelix' ); ?> ←</a></div><?php echo do_shortcode( '[travelix_products limit="3" featured="true"]' ); ?></div>
	</section>

	<section class="section testimonials"><div class="container testimonial-wrap reveal"><span class="eyebrow"><?php esc_html_e( 'قول ما به شما', 'travelix' ); ?></span><h2 class="section-title"><?php esc_html_e( 'سفر باید هیجان‌انگیز باشد، نه پیچیده', 'travelix' ); ?></h2><div class="testimonial-card"><div class="quote-mark">”</div><p class="testimonial-text"><?php esc_html_e( 'از اولین گفت‌وگو تا پایان سفر، هدف ما ارائه اطلاعات روشن، برنامه‌ریزی دقیق و پشتیبانی قابل اعتماد است.', 'travelix' ); ?></p></div></div></section>

	<section class="section" id="stories">
		<div class="container"><div class="section-header reveal"><div><span class="eyebrow"><?php esc_html_e( 'مجله سفر', 'travelix' ); ?></span><h2 class="section-title"><?php esc_html_e( 'جدیدترین داستان‌ها و راهنماهای سفر', 'travelix' ); ?></h2><p class="section-copy"><?php esc_html_e( 'تصویر، عنوان، دسته‌بندی، تاریخ و لینک هر کارت از نوشته‌های منتشرشده وردپرس خوانده می‌شود.', 'travelix' ); ?></p></div><a class="link-arrow" href="<?php echo esc_url( $blog_url ); ?>"><?php esc_html_e( 'همه مقاله‌ها', 'travelix' ); ?> ←</a></div><?php echo do_shortcode( '[travelix_posts limit="3"]' ); ?></div>
	</section>

	<?php while ( have_posts() ) : the_post(); ?><?php if ( trim( get_the_content() ) ) : ?><section class="travelix-elementor-area"><?php the_content(); ?></section><?php endif; ?><?php endwhile; ?>

	<section class="cta"><div class="container"><div class="cta-card reveal"><div class="cta-card__content"><span class="eyebrow"><?php esc_html_e( 'برای سفر بعدی آماده‌اید؟', 'travelix' ); ?></span><h2><?php esc_html_e( 'بیایید سفر رویایی شما را بسازیم', 'travelix' ); ?></h2><p><?php esc_html_e( 'زمان، مقصد و بودجه تقریبی را برای ما بفرستید تا مسیر مناسب را پیشنهاد کنیم.', 'travelix' ); ?></p><a class="btn btn-primary" href="#travel-request"><?php esc_html_e( 'درخواست مشاوره رایگان', 'travelix' ); ?> ←</a></div></div></div></section>
</main>
<?php get_footer(); ?>
