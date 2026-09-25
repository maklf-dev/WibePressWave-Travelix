<?php
/**
 * Settings schema and defaults.
 *
 * @package Travelix_Flex
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return the complete settings schema used by the admin UI and sanitizer.
 *
 * @return array
 */
function travelix_flex_settings_schema() {
	$icons = array(
		'star'       => __( 'ستاره', 'travelix-flex' ),
		'user-check' => __( 'کارشناس', 'travelix-flex' ),
		'headset'    => __( 'پشتیبانی', 'travelix-flex' ),
		'refresh'    => __( 'انعطاف', 'travelix-flex' ),
		'compass'    => __( 'قطب‌نما', 'travelix-flex' ),
		'map'        => __( 'نقشه', 'travelix-flex' ),
		'shield'     => __( 'امنیت', 'travelix-flex' ),
		'heart'      => __( 'قلب', 'travelix-flex' ),
		'calendar'   => __( 'تقویم', 'travelix-flex' ),
		'plane'      => __( 'هواپیما', 'travelix-flex' ),
		'globe'      => __( 'جهان', 'travelix-flex' ),
		'check'      => __( 'تأیید', 'travelix-flex' ),
	);

	$alignments = array(
		'right'  => __( 'راست', 'travelix-flex' ),
		'center' => __( 'وسط', 'travelix-flex' ),
		'left'   => __( 'چپ', 'travelix-flex' ),
	);

	return array(
		'general' => array(
			'label'    => __( 'طراحی عمومی', 'travelix-flex' ),
			'sections' => array(
				'brand_colors' => array(
					'title'  => __( 'رنگ‌ها و پس‌زمینه‌ها', 'travelix-flex' ),
					'fields' => array(
						array( 'key' => 'color_primary', 'label' => __( 'رنگ اصلی', 'travelix-flex' ), 'type' => 'color', 'default' => '#18284d' ),
						array( 'key' => 'color_secondary', 'label' => __( 'رنگ دوم', 'travelix-flex' ), 'type' => 'color', 'default' => '#2f477c' ),
						array( 'key' => 'color_accent', 'label' => __( 'رنگ تأکیدی', 'travelix-flex' ), 'type' => 'color', 'default' => '#e62d86' ),
						array( 'key' => 'color_accent_hover', 'label' => __( 'رنگ تأکیدی در هاور', 'travelix-flex' ), 'type' => 'color', 'default' => '#f451a9' ),
						array( 'key' => 'color_text', 'label' => __( 'رنگ متن', 'travelix-flex' ), 'type' => 'color', 'default' => '#172038' ),
						array( 'key' => 'color_muted', 'label' => __( 'رنگ متن کم‌رنگ', 'travelix-flex' ), 'type' => 'color', 'default' => '#687087' ),
						array( 'key' => 'color_surface', 'label' => __( 'پس‌زمینه روشن', 'travelix-flex' ), 'type' => 'color', 'default' => '#f7f8fc' ),
						array( 'key' => 'color_dark', 'label' => __( 'پس‌زمینه تیره', 'travelix-flex' ), 'type' => 'color', 'default' => '#10172d' ),
					),
				),
				'layout' => array(
					'title'  => __( 'ابعاد، فاصله و گوشه‌ها', 'travelix-flex' ),
					'fields' => array(
						array( 'key' => 'container_width', 'label' => __( 'حداکثر عرض محتوا (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 1240, 'min' => 960, 'max' => 1600 ),
						array( 'key' => 'section_space_desktop', 'label' => __( 'فاصله عمودی بخش‌ها - دسکتاپ', 'travelix-flex' ), 'type' => 'number', 'default' => 104, 'min' => 24, 'max' => 220 ),
						array( 'key' => 'radius_small', 'label' => __( 'گردی کارت کوچک (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 14, 'min' => 0, 'max' => 60 ),
						array( 'key' => 'radius_medium', 'label' => __( 'گردی کارت متوسط (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 22, 'min' => 0, 'max' => 80 ),
						array( 'key' => 'radius_large', 'label' => __( 'گردی کارت بزرگ (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 32, 'min' => 0, 'max' => 100 ),
						array( 'key' => 'button_radius', 'label' => __( 'گردی دکمه‌ها (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 999, 'min' => 0, 'max' => 999 ),
						array( 'key' => 'card_shadow', 'label' => __( 'شدت سایه کارت', 'travelix-flex' ), 'type' => 'select', 'default' => 'medium', 'choices' => array( 'none' => __( 'بدون سایه', 'travelix-flex' ), 'soft' => __( 'ملایم', 'travelix-flex' ), 'medium' => __( 'متوسط', 'travelix-flex' ), 'strong' => __( 'قوی', 'travelix-flex' ) ) ),
					),
				),
				'typography' => array(
					'title'  => __( 'تایپوگرافی', 'travelix-flex' ),
					'fields' => array(
						array( 'key' => 'font_family', 'label' => __( 'فونت متن', 'travelix-flex' ), 'type' => 'select', 'default' => 'vazirmatn', 'choices' => array( 'vazirmatn' => 'Vazirmatn', 'tahoma' => 'Tahoma', 'system' => __( 'فونت سیستم', 'travelix-flex' ) ) ),
						array( 'key' => 'heading_weight', 'label' => __( 'ضخامت تیترها', 'travelix-flex' ), 'type' => 'select', 'default' => '700', 'choices' => array( '600' => '600', '700' => '700', '800' => '800', '900' => '900' ) ),
						array( 'key' => 'body_font_size', 'label' => __( 'اندازه متن پایه (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 16, 'min' => 12, 'max' => 22 ),
						array( 'key' => 'body_line_height', 'label' => __( 'ارتفاع خط متن', 'travelix-flex' ), 'type' => 'number', 'default' => 1.75, 'min' => 1.2, 'max' => 2.4, 'step' => 0.05 ),
						array( 'key' => 'section_title_size', 'label' => __( 'اندازه تیتر بخش‌ها - دسکتاپ (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 50, 'min' => 28, 'max' => 88 ),
					),
				),
			),
		),
		'header' => array(
			'label'    => __( 'هدر و نوار بالا', 'travelix-flex' ),
			'sections' => array(
				'header_content' => array(
					'title'  => __( 'محتوا و امکانات', 'travelix-flex' ),
					'fields' => array(
						array( 'key' => 'topbar_enabled', 'label' => __( 'نمایش نوار بالایی', 'travelix-flex' ), 'type' => 'checkbox', 'default' => 1 ),
						array( 'key' => 'phone', 'label' => __( 'شماره تماس', 'travelix-flex' ), 'type' => 'text', 'default' => '+98 21 1234 5678', 'translate' => true ),
						array( 'key' => 'email', 'label' => __( 'ایمیل', 'travelix-flex' ), 'type' => 'email', 'default' => 'hello@example.com' ),
						array( 'key' => 'topbar_note', 'label' => __( 'متن کوتاه نوار بالا', 'travelix-flex' ), 'type' => 'text', 'default' => 'پشتیبانی سفر، پیش و هنگام مسیر', 'translate' => true ),
						array( 'key' => 'header_cta_label', 'label' => __( 'متن دکمه هدر', 'travelix-flex' ), 'type' => 'text', 'default' => 'درخواست مشاوره', 'translate' => true ),
						array( 'key' => 'header_cta_url', 'label' => __( 'لینک دکمه هدر', 'travelix-flex' ), 'type' => 'url', 'default' => '#travel-request' ),
						array( 'key' => 'header_search_enabled', 'label' => __( 'نمایش دکمه جستجو', 'travelix-flex' ), 'type' => 'checkbox', 'default' => 1 ),
						array( 'key' => 'header_cart_enabled', 'label' => __( 'نمایش سبد خرید ووکامرس', 'travelix-flex' ), 'type' => 'checkbox', 'default' => 1 ),
					),
				),
				'header_design' => array(
					'title'  => __( 'طراحی هدر', 'travelix-flex' ),
					'fields' => array(
						array( 'key' => 'header_sticky', 'label' => __( 'هدر چسبان', 'travelix-flex' ), 'type' => 'checkbox', 'default' => 1 ),
						array( 'key' => 'header_background', 'label' => __( 'رنگ پس‌زمینه هدر', 'travelix-flex' ), 'type' => 'color', 'default' => '#ffffff' ),
						array( 'key' => 'topbar_background', 'label' => __( 'رنگ نوار بالا', 'travelix-flex' ), 'type' => 'color', 'default' => '#10172d' ),
						array( 'key' => 'header_height', 'label' => __( 'ارتفاع هدر دسکتاپ (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 78, 'min' => 56, 'max' => 130 ),
						array( 'key' => 'logo_width', 'label' => __( 'عرض لوگو (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 150, 'min' => 60, 'max' => 320 ),
						array( 'key' => 'menu_font_size', 'label' => __( 'اندازه فونت منو (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 14, 'min' => 11, 'max' => 22 ),
					),
				),
			),
		),
		'homepage' => array(
			'label'    => __( 'محتوای صفحه اصلی', 'travelix-flex' ),
			'sections' => array(
				'hero' => array(
					'title'  => __( '۱. هیرو', 'travelix-flex' ),
					'fields' => array(
						array( 'key' => 'hero_enabled', 'label' => __( 'نمایش بخش', 'travelix-flex' ), 'type' => 'checkbox', 'default' => 1 ),
						array( 'key' => 'hero_order', 'label' => __( 'ترتیب', 'travelix-flex' ), 'type' => 'number', 'default' => 10, 'min' => 1, 'max' => 200 ),
						array( 'key' => 'hero_eyebrow', 'label' => __( 'بالانویس', 'travelix-flex' ), 'type' => 'text', 'default' => 'دنیا را کشف کنید', 'translate' => true ),
						array( 'key' => 'hero_title', 'label' => __( 'عنوان اصلی', 'travelix-flex' ), 'type' => 'text', 'default' => 'ماجراجویی بعدی شما', 'translate' => true ),
						array( 'key' => 'hero_title_second', 'label' => __( 'خط دوم عنوان', 'travelix-flex' ), 'type' => 'text', 'default' => 'از اینجا شروع می‌شود', 'translate' => true ),
						array( 'key' => 'hero_copy', 'label' => __( 'توضیح', 'travelix-flex' ), 'type' => 'textarea', 'default' => 'مقصدهای خاص، تجربه‌های تازه و سفرهایی که با دقت برای شما برنامه‌ریزی شده‌اند.', 'translate' => true ),
						array( 'key' => 'hero_primary_label', 'label' => __( 'متن دکمه اصلی', 'travelix-flex' ), 'type' => 'text', 'default' => 'مشاهده سفرها', 'translate' => true ),
						array( 'key' => 'hero_primary_url', 'label' => __( 'لینک دکمه اصلی', 'travelix-flex' ), 'type' => 'url', 'default' => '#tours' ),
						array( 'key' => 'hero_secondary_label', 'label' => __( 'متن دکمه دوم', 'travelix-flex' ), 'type' => 'text', 'default' => 'دریافت مشاوره', 'translate' => true ),
						array( 'key' => 'hero_secondary_url', 'label' => __( 'لینک دکمه دوم', 'travelix-flex' ), 'type' => 'url', 'default' => '#travel-request' ),
						array( 'key' => 'hero_signature', 'label' => __( 'متن تزئینی', 'travelix-flex' ), 'type' => 'text', 'default' => 'بیشتر سفر کن، بهتر زندگی کن', 'translate' => true ),
						array( 'key' => 'hero_image', 'label' => __( 'تصویر پس‌زمینه', 'travelix-flex' ), 'type' => 'media', 'default' => 'https://images.unsplash.com/photo-1533104816931-20fa691ff6ca?auto=format&fit=crop&w=2200&q=86' ),
						array( 'key' => 'hero_overlay', 'label' => __( 'شدت لایه تیره (۰ تا ۹۵)', 'travelix-flex' ), 'type' => 'number', 'default' => 72, 'min' => 0, 'max' => 95 ),
						array( 'key' => 'hero_align', 'label' => __( 'چیدمان متن', 'travelix-flex' ), 'type' => 'select', 'default' => 'right', 'choices' => $alignments ),
						array( 'key' => 'hero_title_size', 'label' => __( 'اندازه عنوان دسکتاپ (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 72, 'min' => 36, 'max' => 120 ),
						array( 'key' => 'hero_min_height', 'label' => __( 'ارتفاع حداقل دسکتاپ (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 690, 'min' => 420, 'max' => 1000 ),
					),
				),
				'lead_form' => array(
					'title'  => __( '۲. فرم درخواست و تماس', 'travelix-flex' ),
					'fields' => array(
						array( 'key' => 'lead_form_enabled', 'label' => __( 'نمایش بخش', 'travelix-flex' ), 'type' => 'checkbox', 'default' => 1 ),
						array( 'key' => 'lead_form_order', 'label' => __( 'ترتیب', 'travelix-flex' ), 'type' => 'number', 'default' => 20, 'min' => 1, 'max' => 200 ),
						array( 'key' => 'lead_form_eyebrow', 'label' => __( 'بالانویس', 'travelix-flex' ), 'type' => 'text', 'default' => 'درخواست سفر اختصاصی', 'translate' => true ),
						array( 'key' => 'lead_form_title', 'label' => __( 'عنوان', 'travelix-flex' ), 'type' => 'text', 'default' => 'از سفر دلخواهتان برای ما بگویید', 'translate' => true ),
						array( 'key' => 'lead_form_copy', 'label' => __( 'توضیح', 'travelix-flex' ), 'type' => 'textarea', 'default' => 'اطلاعات اولیه را ثبت کنید تا کارشناسان ما برای ادامه مسیر با شما تماس بگیرند.', 'translate' => true ),
						array( 'key' => 'lead_form_source', 'label' => __( 'منبع فرم', 'travelix-flex' ), 'type' => 'select', 'default' => 'gravity', 'choices' => array( 'gravity' => 'Gravity Forms', 'shortcode' => __( 'شورت‌کد دلخواه', 'travelix-flex' ) ) ),
						array( 'key' => 'gravity_form_id', 'label' => __( 'شناسه Gravity Form', 'travelix-flex' ), 'type' => 'number', 'default' => 1, 'min' => 1, 'max' => 9999 ),
						array( 'key' => 'lead_form_shortcode', 'label' => __( 'شورت‌کد فرم دلخواه', 'travelix-flex' ), 'type' => 'shortcode', 'default' => '', 'description' => __( 'برای Contact Form 7 یا هر افزونه دیگر.', 'travelix-flex' ) ),
						array( 'key' => 'lead_form_background', 'label' => __( 'رنگ کارت فرم', 'travelix-flex' ), 'type' => 'color', 'default' => '#ffffff' ),
						array( 'key' => 'lead_form_radius', 'label' => __( 'گردی کارت (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 22, 'min' => 0, 'max' => 80 ),
					),
				),
				'trust' => array(
					'title'  => __( '۳. مزیت‌ها و آیکن‌ها', 'travelix-flex' ),
					'fields' => array_merge(
						array(
							array( 'key' => 'trust_enabled', 'label' => __( 'نمایش بخش', 'travelix-flex' ), 'type' => 'checkbox', 'default' => 1 ),
							array( 'key' => 'trust_order', 'label' => __( 'ترتیب', 'travelix-flex' ), 'type' => 'number', 'default' => 30, 'min' => 1, 'max' => 200 ),
						),
						travelix_flex_repeater_fields( 'trust', 4, $icons, array(
							array( 'icon' => 'star', 'title' => 'قیمت‌گذاری شفاف', 'text' => 'پیشنهاد متناسب با بودجه شما' ),
							array( 'icon' => 'user-check', 'title' => 'کارشناسان سفر', 'text' => 'مشاوره واقعی پیش از انتخاب' ),
							array( 'icon' => 'headset', 'title' => 'پشتیبانی همراه', 'text' => 'کنار شما در طول سفر' ),
							array( 'icon' => 'refresh', 'title' => 'برنامه‌ریزی منعطف', 'text' => 'هماهنگ با زمان و نیاز شما' ),
						) ),
						array(
							array( 'key' => 'trust_background', 'label' => __( 'رنگ پس‌زمینه', 'travelix-flex' ), 'type' => 'color', 'default' => '#ffffff' ),
							array( 'key' => 'trust_icon_color', 'label' => __( 'رنگ آیکن', 'travelix-flex' ), 'type' => 'color', 'default' => '#e62d86' ),
							array( 'key' => 'trust_padding', 'label' => __( 'پدینگ عمودی دسکتاپ (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 34, 'min' => 0, 'max' => 140 ),
						)
					),
				),
				'destinations' => array(
					'title'  => __( '۴. مقصدها (دسته‌بندی ووکامرس)', 'travelix-flex' ),
					'fields' => array_merge( travelix_flex_section_heading_fields( 'destinations', 40, 'مقاصد محبوب', 'مقصد بعدی خود را پیدا کنید', 'محبوب‌ترین مقصدها بر اساس تورهای منتشرشده نمایش داده می‌شوند.' ), travelix_flex_section_design_fields( 'destinations', '#ffffff' ) ),
				),
				'about' => array(
					'title'  => __( '۵. معرفی و ویژگی‌ها', 'travelix-flex' ),
					'fields' => array_merge(
						travelix_flex_section_heading_fields( 'about', 50, 'چرا Travelix', 'فراتر از یک رزرو ساده', 'تجربه محلی، انتخاب‌های مطمئن و پشتیبانی انسانی را کنار هم می‌گذاریم تا سفر برای شما ساده‌تر شود.' ),
						array(
							array( 'key' => 'about_main_image', 'label' => __( 'تصویر بزرگ', 'travelix-flex' ), 'type' => 'media', 'default' => 'https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=1200&q=84' ),
							array( 'key' => 'about_small_image', 'label' => __( 'تصویر کوچک', 'travelix-flex' ), 'type' => 'media', 'default' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=900&q=84' ),
						),
						travelix_flex_repeater_fields( 'about', 4, $icons, array(
							array( 'icon' => 'compass', 'title' => 'تجربه‌های منتخب', 'text' => 'انتخاب‌شده با دقت' ),
							array( 'icon' => 'map', 'title' => 'تخصص محلی', 'text' => 'راهنمایی کاربردی و به‌روز' ),
							array( 'icon' => 'shield', 'title' => 'اطلاعات شفاف', 'text' => 'جزئیات روشن هر سفر' ),
							array( 'icon' => 'heart', 'title' => 'پشتیبانی انسانی', 'text' => 'پیش و هنگام سفر' ),
						) ),
						travelix_flex_section_design_fields( 'about', '#f7f8fc' )
					),
				),
				'process' => array(
					'title'  => __( '۶. مراحل کار', 'travelix-flex' ),
					'fields' => array_merge(
						travelix_flex_section_heading_fields( 'process', 60, 'مسیر برنامه‌ریزی سفر', 'از یک ایده تا سفری فراموش‌نشدنی', 'فرآیندی شفاف که بر اساس زمان، بودجه و سبک سفر شما شکل می‌گیرد.' ),
						travelix_flex_step_fields(),
						array(
							array( 'key' => 'process_background', 'label' => __( 'رنگ پس‌زمینه', 'travelix-flex' ), 'type' => 'color', 'default' => '#10172d' ),
							array( 'key' => 'process_card_radius', 'label' => __( 'گردی کارت‌ها (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 18, 'min' => 0, 'max' => 70 ),
						),
						travelix_flex_section_spacing_fields( 'process' )
					),
				),
				'booking' => array(
					'title'  => __( '۷. رزرو آنلاین / Bookly', 'travelix-flex' ),
					'fields' => array_merge(
						travelix_flex_section_heading_fields( 'booking', 70, 'رزرو آنلاین', 'زمان مناسب خود را انتخاب کنید', 'این بخش می‌تواند شورت‌کد Bookly یا هر سامانه رزرو دیگری را نمایش دهد.' ),
						array(
							array( 'key' => 'booking_shortcode', 'label' => __( 'شورت‌کد رزرو', 'travelix-flex' ), 'type' => 'shortcode', 'default' => '', 'description' => __( 'اگر خالی باشد، خود بخش نیز نمایش داده نمی‌شود.', 'travelix-flex' ) ),
							array( 'key' => 'booking_background', 'label' => __( 'رنگ پس‌زمینه', 'travelix-flex' ), 'type' => 'color', 'default' => '#f7f8fc' ),
						),
						travelix_flex_section_spacing_fields( 'booking' )
					),
				),
				'tours' => array(
					'title'  => __( '۸. تورها (محصولات ووکامرس)', 'travelix-flex' ),
					'fields' => array_merge(
						travelix_flex_section_heading_fields( 'tours', 80, 'سفرهای منتخب', 'پیشنهادهای ویژه برای شما', 'اطلاعات هر کارت مستقیماً از محصول ووکامرس خوانده می‌شود.' ),
						array(
							array( 'key' => 'tours_link_label', 'label' => __( 'متن لینک همه تورها', 'travelix-flex' ), 'type' => 'text', 'default' => 'همه سفرها', 'translate' => true ),
							array( 'key' => 'tours_count', 'label' => __( 'تعداد محصول', 'travelix-flex' ), 'type' => 'number', 'default' => 3, 'min' => 1, 'max' => 12 ),
							array( 'key' => 'tours_source', 'label' => __( 'منبع محصولات', 'travelix-flex' ), 'type' => 'select', 'default' => 'featured', 'choices' => array( 'featured' => __( 'محصولات ویژه', 'travelix-flex' ), 'latest' => __( 'جدیدترین‌ها', 'travelix-flex' ), 'category' => __( 'یک دسته‌بندی', 'travelix-flex' ) ) ),
							array( 'key' => 'tours_category', 'label' => __( 'نامک دسته‌بندی محصول', 'travelix-flex' ), 'type' => 'text', 'default' => '' ),
						),
						travelix_flex_section_design_fields( 'tours', '#ffffff' )
					),
				),
				'testimonials' => array(
					'title'  => __( '۹. نظرات مسافران', 'travelix-flex' ),
					'fields' => array_merge(
						travelix_flex_section_heading_fields( 'testimonials', 90, 'تجربه مسافران', 'مسافران درباره ما چه می‌گویند', 'روایت‌هایی از تجربه واقعی سفر.' ),
						travelix_flex_testimonial_fields(),
						array(
							array( 'key' => 'testimonials_background', 'label' => __( 'رنگ پس‌زمینه', 'travelix-flex' ), 'type' => 'color', 'default' => '#f7f8fc' ),
							array( 'key' => 'testimonial_radius', 'label' => __( 'گردی کارت (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 22, 'min' => 0, 'max' => 80 ),
						),
						travelix_flex_section_spacing_fields( 'testimonials' )
					),
				),
				'blog' => array(
					'title'  => __( '۱۰. مجله سفر', 'travelix-flex' ),
					'fields' => array_merge(
						travelix_flex_section_heading_fields( 'blog', 100, 'مجله سفر', 'جدیدترین داستان‌ها و راهنماها', 'از تازه‌ترین مقاله‌ها و راهنماهای سفر الهام بگیرید.' ),
						array(
							array( 'key' => 'blog_link_label', 'label' => __( 'متن لینک همه مقاله‌ها', 'travelix-flex' ), 'type' => 'text', 'default' => 'همه مقاله‌ها', 'translate' => true ),
							array( 'key' => 'blog_count', 'label' => __( 'تعداد نوشته', 'travelix-flex' ), 'type' => 'number', 'default' => 3, 'min' => 1, 'max' => 12 ),
							array( 'key' => 'blog_category', 'label' => __( 'نامک دسته‌بندی نوشته (اختیاری)', 'travelix-flex' ), 'type' => 'text', 'default' => '' ),
						),
						travelix_flex_section_design_fields( 'blog', '#ffffff' )
					),
				),
				'cta' => array(
					'title'  => __( '۱۱. دعوت نهایی', 'travelix-flex' ),
					'fields' => array_merge(
						travelix_flex_section_heading_fields( 'cta', 110, 'برای سفر بعدی آماده‌اید؟', 'بیایید سفر رویایی شما را بسازیم', 'زمان، مقصد و بودجه تقریبی را برای ما بفرستید تا مسیر مناسب را پیشنهاد کنیم.' ),
						array(
							array( 'key' => 'cta_button_label', 'label' => __( 'متن دکمه', 'travelix-flex' ), 'type' => 'text', 'default' => 'درخواست مشاوره رایگان', 'translate' => true ),
							array( 'key' => 'cta_button_url', 'label' => __( 'لینک دکمه', 'travelix-flex' ), 'type' => 'url', 'default' => '#travel-request' ),
							array( 'key' => 'cta_image', 'label' => __( 'تصویر پس‌زمینه', 'travelix-flex' ), 'type' => 'media', 'default' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1800&q=84' ),
							array( 'key' => 'cta_background', 'label' => __( 'رنگ پایه', 'travelix-flex' ), 'type' => 'color', 'default' => '#18284d' ),
						),
						travelix_flex_section_spacing_fields( 'cta', 0, 104 )
					),
				),
			),
		),
		'cards' => array(
			'label'    => __( 'کارت‌ها و کوئری‌ها', 'travelix-flex' ),
			'sections' => array(
				'product_card' => array(
					'title'  => __( 'کارت محصول / تور', 'travelix-flex' ),
					'fields' => array(
						array( 'key' => 'product_card_background', 'label' => __( 'رنگ کارت', 'travelix-flex' ), 'type' => 'color', 'default' => '#ffffff' ),
						array( 'key' => 'product_card_border_color', 'label' => __( 'رنگ بوردر', 'travelix-flex' ), 'type' => 'color', 'default' => '#e1e5ee' ),
						array( 'key' => 'product_card_title_color', 'label' => __( 'رنگ عنوان', 'travelix-flex' ), 'type' => 'color', 'default' => '#18284d' ),
						array( 'key' => 'product_card_text_color', 'label' => __( 'رنگ توضیح', 'travelix-flex' ), 'type' => 'color', 'default' => '#687087' ),
						array( 'key' => 'product_card_radius', 'label' => __( 'گردی کارت (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 16, 'min' => 0, 'max' => 80 ),
						array( 'key' => 'product_card_padding', 'label' => __( 'پدینگ محتوا (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 20, 'min' => 0, 'max' => 70 ),
						array( 'key' => 'product_card_title_size', 'label' => __( 'اندازه عنوان (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 20, 'min' => 14, 'max' => 36 ),
						array( 'key' => 'product_card_image_height', 'label' => __( 'ارتفاع تصویر دسکتاپ (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 250, 'min' => 140, 'max' => 500 ),
						array( 'key' => 'product_card_gap', 'label' => __( 'فاصله کارت‌ها (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 24, 'min' => 0, 'max' => 70 ),
						array( 'key' => 'product_card_columns', 'label' => __( 'ستون دسکتاپ', 'travelix-flex' ), 'type' => 'number', 'default' => 3, 'min' => 1, 'max' => 4 ),
						array( 'key' => 'product_show_price', 'label' => __( 'نمایش قیمت', 'travelix-flex' ), 'type' => 'checkbox', 'default' => 1 ),
						array( 'key' => 'product_show_excerpt', 'label' => __( 'نمایش توضیح کوتاه', 'travelix-flex' ), 'type' => 'checkbox', 'default' => 1 ),
						array( 'key' => 'product_show_duration', 'label' => __( 'نمایش مدت سفر', 'travelix-flex' ), 'type' => 'checkbox', 'default' => 1 ),
						array( 'key' => 'product_duration_attribute', 'label' => __( 'نامک ویژگی مدت سفر', 'travelix-flex' ), 'type' => 'text', 'default' => 'pa_duration' ),
						array( 'key' => 'product_meta_attribute', 'label' => __( 'نامک ویژگی دوم کارت (اختیاری)', 'travelix-flex' ), 'type' => 'text', 'default' => '' ),
						array( 'key' => 'product_price_suffix', 'label' => __( 'متن زیر قیمت', 'travelix-flex' ), 'type' => 'text', 'default' => 'برای هر مسافر', 'translate' => true ),
						array( 'key' => 'product_button_label', 'label' => __( 'متن دکمه کارت', 'travelix-flex' ), 'type' => 'text', 'default' => 'مشاهده جزئیات', 'translate' => true ),
					),
				),
				'destination_card' => array(
					'title'  => __( 'کارت مقصد', 'travelix-flex' ),
					'fields' => array(
						array( 'key' => 'destinations_count', 'label' => __( 'تعداد مقصد', 'travelix-flex' ), 'type' => 'number', 'default' => 5, 'min' => 1, 'max' => 12 ),
						array( 'key' => 'destination_columns', 'label' => __( 'ستون دسکتاپ', 'travelix-flex' ), 'type' => 'number', 'default' => 5, 'min' => 2, 'max' => 6 ),
						array( 'key' => 'destination_card_height', 'label' => __( 'ارتفاع کارت (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 340, 'min' => 180, 'max' => 560 ),
						array( 'key' => 'destination_card_radius', 'label' => __( 'گردی کارت (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 16, 'min' => 0, 'max' => 80 ),
						array( 'key' => 'destination_card_gap', 'label' => __( 'فاصله کارت‌ها (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 16, 'min' => 0, 'max' => 60 ),
						array( 'key' => 'destination_orderby', 'label' => __( 'مرتب‌سازی مقصدها', 'travelix-flex' ), 'type' => 'select', 'default' => 'count', 'choices' => array( 'count' => __( 'تعداد تور', 'travelix-flex' ), 'name' => __( 'نام', 'travelix-flex' ), 'id' => 'ID' ) ),
						array( 'key' => 'destination_hide_empty', 'label' => __( 'مخفی‌کردن دسته‌های خالی', 'travelix-flex' ), 'type' => 'checkbox', 'default' => 1 ),
					),
				),
				'blog_card' => array(
					'title'  => __( 'کارت نوشته', 'travelix-flex' ),
					'fields' => array(
						array( 'key' => 'blog_card_background', 'label' => __( 'رنگ کارت', 'travelix-flex' ), 'type' => 'color', 'default' => '#ffffff' ),
						array( 'key' => 'blog_card_radius', 'label' => __( 'گردی کارت (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 16, 'min' => 0, 'max' => 80 ),
						array( 'key' => 'blog_card_padding', 'label' => __( 'پدینگ محتوا (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 20, 'min' => 0, 'max' => 70 ),
						array( 'key' => 'blog_card_title_size', 'label' => __( 'اندازه عنوان (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 19, 'min' => 14, 'max' => 34 ),
						array( 'key' => 'blog_card_image_height', 'label' => __( 'ارتفاع تصویر (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 210, 'min' => 120, 'max' => 420 ),
						array( 'key' => 'blog_card_columns', 'label' => __( 'ستون دسکتاپ', 'travelix-flex' ), 'type' => 'number', 'default' => 3, 'min' => 1, 'max' => 4 ),
						array( 'key' => 'blog_show_excerpt', 'label' => __( 'نمایش خلاصه نوشته', 'travelix-flex' ), 'type' => 'checkbox', 'default' => 1 ),
						array( 'key' => 'blog_excerpt_words', 'label' => __( 'تعداد کلمات خلاصه', 'travelix-flex' ), 'type' => 'number', 'default' => 18, 'min' => 5, 'max' => 60 ),
					),
				),
			),
		),
		'integrations' => array(
			'label'    => __( 'افزونه‌ها و اتصال‌ها', 'travelix-flex' ),
			'sections' => array(
				'integration_options' => array(
					'title'       => __( 'WooCommerce، WPML و فرم‌ها', 'travelix-flex' ),
					'description' => __( 'قالب بدون افزونه‌ها نیز بالا می‌آید و پیام راهنما نشان می‌دهد.', 'travelix-flex' ),
					'fields'     => array(
						array( 'key' => 'catalog_mode', 'label' => __( 'حالت کاتالوگ (غیرفعال‌کردن خرید)', 'travelix-flex' ), 'type' => 'checkbox', 'default' => 0, 'description' => __( 'اگر روشن شود، خرید محصولات در سراسر سایت غیرفعال می‌شود.', 'travelix-flex' ) ),
						array( 'key' => 'catalog_button_label', 'label' => __( 'متن دکمه حالت کاتالوگ', 'travelix-flex' ), 'type' => 'text', 'default' => 'درخواست رزرو', 'translate' => true ),
						array( 'key' => 'catalog_button_url', 'label' => __( 'لینک دکمه حالت کاتالوگ', 'travelix-flex' ), 'type' => 'url', 'default' => '#travel-request' ),
						array( 'key' => 'wpml_switcher_enabled', 'label' => __( 'نمایش زبان‌های WPML در نوار بالا', 'travelix-flex' ), 'type' => 'checkbox', 'default' => 1 ),
						array( 'key' => 'extra_home_shortcode', 'label' => __( 'شورت‌کد افزونه اضافی در انتهای خانه', 'travelix-flex' ), 'type' => 'shortcode', 'default' => '' ),
					),
				),
			),
		),
		'responsive' => array(
			'label'    => __( 'ریسپانسیو', 'travelix-flex' ),
			'sections' => array(
				'responsive_sizes' => array(
					'title'  => __( 'تبلت و موبایل', 'travelix-flex' ),
					'fields' => array(
						array( 'key' => 'tablet_breakpoint', 'label' => __( 'نقطه شکست تبلت (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 960, 'min' => 700, 'max' => 1200 ),
						array( 'key' => 'mobile_breakpoint', 'label' => __( 'نقطه شکست موبایل (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 640, 'min' => 420, 'max' => 760 ),
						array( 'key' => 'mobile_gutter', 'label' => __( 'فاصله از لبه موبایل (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 18, 'min' => 10, 'max' => 36 ),
						array( 'key' => 'section_space_tablet', 'label' => __( 'فاصله عمودی بخش‌ها - تبلت', 'travelix-flex' ), 'type' => 'number', 'default' => 76, 'min' => 20, 'max' => 180 ),
						array( 'key' => 'section_space_mobile', 'label' => __( 'فاصله عمودی بخش‌ها - موبایل', 'travelix-flex' ), 'type' => 'number', 'default' => 56, 'min' => 16, 'max' => 140 ),
						array( 'key' => 'section_title_tablet', 'label' => __( 'تیتر بخش - تبلت (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 40, 'min' => 24, 'max' => 64 ),
						array( 'key' => 'section_title_mobile', 'label' => __( 'تیتر بخش - موبایل (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 32, 'min' => 22, 'max' => 52 ),
						array( 'key' => 'hero_title_tablet', 'label' => __( 'عنوان هیرو - تبلت (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 56, 'min' => 32, 'max' => 90 ),
						array( 'key' => 'hero_title_mobile', 'label' => __( 'عنوان هیرو - موبایل (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 42, 'min' => 28, 'max' => 68 ),
						array( 'key' => 'hero_height_tablet', 'label' => __( 'ارتفاع هیرو - تبلت (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 620, 'min' => 380, 'max' => 900 ),
						array( 'key' => 'hero_height_mobile', 'label' => __( 'ارتفاع هیرو - موبایل (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 580, 'min' => 360, 'max' => 820 ),
						array( 'key' => 'mobile_card_image_height', 'label' => __( 'ارتفاع تصویر کارت‌ها - موبایل (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 220, 'min' => 130, 'max' => 400 ),
						array( 'key' => 'reduce_motion', 'label' => __( 'کاهش انیمیشن‌ها', 'travelix-flex' ), 'type' => 'checkbox', 'default' => 0 ),
					),
				),
			),
		),
		'footer' => array(
			'label'    => __( 'فوتر', 'travelix-flex' ),
			'sections' => array(
				'footer_content' => array(
					'title'  => __( 'محتوا و لینک‌ها', 'travelix-flex' ),
					'fields' => array(
						array( 'key' => 'footer_about', 'label' => __( 'متن معرفی', 'travelix-flex' ), 'type' => 'textarea', 'default' => 'همراه مطمئن شما برای ساختن سفرهای به‌یادماندنی.', 'translate' => true ),
						array( 'key' => 'footer_menu_title', 'label' => __( 'عنوان ستون منو', 'travelix-flex' ), 'type' => 'text', 'default' => 'دسترسی سریع', 'translate' => true ),
						array( 'key' => 'footer_services_title', 'label' => __( 'عنوان ستون خدمات', 'travelix-flex' ), 'type' => 'text', 'default' => 'خدمات ما', 'translate' => true ),
						array( 'key' => 'footer_form_title', 'label' => __( 'عنوان فرم فوتر', 'travelix-flex' ), 'type' => 'text', 'default' => 'عضویت در خبرنامه', 'translate' => true ),
						array( 'key' => 'footer_form_copy', 'label' => __( 'توضیح فرم فوتر', 'travelix-flex' ), 'type' => 'textarea', 'default' => 'تازه‌ترین تورها و راهنماهای سفر را دریافت کنید.', 'translate' => true ),
						array( 'key' => 'footer_form_shortcode', 'label' => __( 'شورت‌کد فرم خبرنامه', 'travelix-flex' ), 'type' => 'shortcode', 'default' => '' ),
						array( 'key' => 'footer_copyright', 'label' => __( 'متن کپی‌رایت', 'travelix-flex' ), 'type' => 'text', 'default' => 'تمام حقوق محفوظ است.', 'translate' => true ),
						array( 'key' => 'social_instagram', 'label' => 'Instagram URL', 'type' => 'url', 'default' => '' ),
						array( 'key' => 'social_telegram', 'label' => 'Telegram URL', 'type' => 'url', 'default' => '' ),
						array( 'key' => 'social_whatsapp', 'label' => 'WhatsApp URL', 'type' => 'url', 'default' => '' ),
					),
				),
				'footer_design' => array(
					'title'  => __( 'طراحی فوتر', 'travelix-flex' ),
					'fields' => array(
						array( 'key' => 'footer_background', 'label' => __( 'رنگ پس‌زمینه', 'travelix-flex' ), 'type' => 'color', 'default' => '#10172d' ),
						array( 'key' => 'footer_text_color', 'label' => __( 'رنگ متن', 'travelix-flex' ), 'type' => 'color', 'default' => '#c7ccda' ),
						array( 'key' => 'footer_padding', 'label' => __( 'پدینگ بالای فوتر (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 72, 'min' => 24, 'max' => 160 ),
					),
				),
			),
		),
		'future' => array(
			'label'    => __( 'صفحات آینده', 'travelix-flex' ),
			'sections' => array(
				'future_templates' => array(
					'title'       => __( 'تنظیمات پایه قالب‌های بعدی', 'travelix-flex' ),
					'description' => __( 'این گزینه‌ها از حالا ذخیره می‌شوند؛ در نسخه فعلی صفحه اصلی، نوشته و صفحه عادی آماده‌اند و قالب‌های اختصاصی بعداً می‌توانند از این مقادیر استفاده کنند.', 'travelix-flex' ),
					'fields'     => array(
						array( 'key' => 'inner_hero_enabled', 'label' => __( 'هیروی صفحات داخلی', 'travelix-flex' ), 'type' => 'checkbox', 'default' => 1 ),
						array( 'key' => 'inner_hero_height', 'label' => __( 'ارتفاع هیروی داخلی (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 300, 'min' => 160, 'max' => 600 ),
						array( 'key' => 'inner_sidebar_position', 'label' => __( 'جایگاه سایدبار آینده', 'travelix-flex' ), 'type' => 'select', 'default' => 'right', 'choices' => array( 'none' => __( 'بدون سایدبار', 'travelix-flex' ), 'right' => __( 'راست', 'travelix-flex' ), 'left' => __( 'چپ', 'travelix-flex' ) ) ),
						array( 'key' => 'archive_columns', 'label' => __( 'ستون آرشیوها', 'travelix-flex' ), 'type' => 'number', 'default' => 3, 'min' => 1, 'max' => 4 ),
						array( 'key' => 'single_content_width', 'label' => __( 'عرض محتوای نوشته (px)', 'travelix-flex' ), 'type' => 'number', 'default' => 820, 'min' => 620, 'max' => 1200 ),
					),
				),
			),
		),
	);
}

/**
 * Shared section title fields.
 */
function travelix_flex_section_heading_fields( $prefix, $order, $eyebrow, $title, $copy ) {
	return array(
		array( 'key' => $prefix . '_enabled', 'label' => __( 'نمایش بخش', 'travelix-flex' ), 'type' => 'checkbox', 'default' => 1 ),
		array( 'key' => $prefix . '_order', 'label' => __( 'ترتیب', 'travelix-flex' ), 'type' => 'number', 'default' => $order, 'min' => 1, 'max' => 200 ),
		array( 'key' => $prefix . '_eyebrow', 'label' => __( 'بالانویس', 'travelix-flex' ), 'type' => 'text', 'default' => $eyebrow, 'translate' => true ),
		array( 'key' => $prefix . '_title', 'label' => __( 'عنوان', 'travelix-flex' ), 'type' => 'text', 'default' => $title, 'translate' => true ),
		array( 'key' => $prefix . '_copy', 'label' => __( 'توضیح', 'travelix-flex' ), 'type' => 'textarea', 'default' => $copy, 'translate' => true ),
	);
}

/**
 * Shared background and spacing controls for a homepage section.
 */
function travelix_flex_section_design_fields( $prefix, $background ) {
	return array_merge(
		array( array( 'key' => $prefix . '_background', 'label' => __( 'رنگ پس‌زمینه بخش', 'travelix-flex' ), 'type' => 'color', 'default' => $background ) ),
		travelix_flex_section_spacing_fields( $prefix )
	);
}

/**
 * Shared top and bottom padding controls.
 */
function travelix_flex_section_spacing_fields( $prefix, $top = 104, $bottom = 104 ) {
	return array(
		array( 'key' => $prefix . '_padding_top', 'label' => __( 'فاصله داخلی بالا - دسکتاپ (px)', 'travelix-flex' ), 'type' => 'number', 'default' => $top, 'min' => 0, 'max' => 240 ),
		array( 'key' => $prefix . '_padding_bottom', 'label' => __( 'فاصله داخلی پایین - دسکتاپ (px)', 'travelix-flex' ), 'type' => 'number', 'default' => $bottom, 'min' => 0, 'max' => 240 ),
	);
}

/**
 * Fixed, easy-to-edit icon rows.
 */
function travelix_flex_repeater_fields( $prefix, $count, $icons, $defaults ) {
	$fields = array();
	for ( $i = 1; $i <= $count; $i++ ) {
		$default  = $defaults[ $i - 1 ];
		$fields[] = array( 'key' => $prefix . '_' . $i . '_icon', 'label' => sprintf( __( 'آیکن آیتم %d', 'travelix-flex' ), $i ), 'type' => 'select', 'default' => $default['icon'], 'choices' => $icons );
		$fields[] = array( 'key' => $prefix . '_' . $i . '_title', 'label' => sprintf( __( 'عنوان آیتم %d', 'travelix-flex' ), $i ), 'type' => 'text', 'default' => $default['title'], 'translate' => true );
		$fields[] = array( 'key' => $prefix . '_' . $i . '_text', 'label' => sprintf( __( 'توضیح آیتم %d', 'travelix-flex' ), $i ), 'type' => 'text', 'default' => $default['text'], 'translate' => true );
	}
	return $fields;
}

/**
 * Process step fields.
 */
function travelix_flex_step_fields() {
	$defaults = array(
		array( 'number' => '۰۱', 'title' => 'درخواستتان را ثبت کنید', 'text' => 'مقصد، تاریخ تقریبی و سبک سفر را برای ما ارسال کنید.' ),
		array( 'number' => '۰۲', 'title' => 'پیشنهاد اختصاصی بگیرید', 'text' => 'کارشناسان ما مسیر و خدمات مناسب را برای شما آماده می‌کنند.' ),
		array( 'number' => '۰۳', 'title' => 'با خیال آسوده سفر کنید', 'text' => 'پس از هماهنگی نهایی، پشتیبانی سفر در کنار شما خواهد بود.' ),
	);
	$fields = array();
	foreach ( $defaults as $index => $default ) {
		$i        = $index + 1;
		$fields[] = array( 'key' => 'process_' . $i . '_number', 'label' => sprintf( __( 'شماره مرحله %d', 'travelix-flex' ), $i ), 'type' => 'text', 'default' => $default['number'], 'translate' => true );
		$fields[] = array( 'key' => 'process_' . $i . '_title', 'label' => sprintf( __( 'عنوان مرحله %d', 'travelix-flex' ), $i ), 'type' => 'text', 'default' => $default['title'], 'translate' => true );
		$fields[] = array( 'key' => 'process_' . $i . '_text', 'label' => sprintf( __( 'توضیح مرحله %d', 'travelix-flex' ), $i ), 'type' => 'textarea', 'default' => $default['text'], 'translate' => true );
	}
	return $fields;
}

/**
 * Testimonial fields.
 */
function travelix_flex_testimonial_fields() {
	$defaults = array(
		array( 'quote' => 'برنامه‌ریزی دقیق و پشتیبانی تیم باعث شد سفر ما بدون استرس و دقیقاً مطابق انتظار پیش برود.', 'name' => 'سارا احمدی', 'role' => 'مسافر ایتالیا' ),
		array( 'quote' => 'از شفافیت قیمت‌ها و توضیحات کامل تورها خیلی راضی بودم؛ انتخاب برایمان واقعاً ساده شد.', 'name' => 'امیر رضایی', 'role' => 'مسافر ترکیه' ),
		array( 'quote' => 'پیشنهاد اختصاصی تیم دقیقاً با بودجه و زمان ما هماهنگ بود و تجربه متفاوتی ساخت.', 'name' => 'نازنین کریمی', 'role' => 'مسافر تایلند' ),
	);
	$fields = array();
	foreach ( $defaults as $index => $default ) {
		$i        = $index + 1;
		$fields[] = array( 'key' => 'testimonial_' . $i . '_quote', 'label' => sprintf( __( 'متن نظر %d', 'travelix-flex' ), $i ), 'type' => 'textarea', 'default' => $default['quote'], 'translate' => true );
		$fields[] = array( 'key' => 'testimonial_' . $i . '_name', 'label' => sprintf( __( 'نام مسافر %d', 'travelix-flex' ), $i ), 'type' => 'text', 'default' => $default['name'], 'translate' => true );
		$fields[] = array( 'key' => 'testimonial_' . $i . '_role', 'label' => sprintf( __( 'توضیح مسافر %d', 'travelix-flex' ), $i ), 'type' => 'text', 'default' => $default['role'], 'translate' => true );
		$fields[] = array( 'key' => 'testimonial_' . $i . '_image', 'label' => sprintf( __( 'تصویر مسافر %d', 'travelix-flex' ), $i ), 'type' => 'media', 'default' => '' );
	}
	return $fields;
}

/**
 * Flatten all fields.
 */
function travelix_flex_all_fields() {
	$fields = array();
	foreach ( travelix_flex_settings_schema() as $tab ) {
		foreach ( $tab['sections'] as $section ) {
			foreach ( $section['fields'] as $field ) {
				$fields[ $field['key'] ] = $field;
			}
		}
	}
	return $fields;
}

/**
 * Default option values.
 */
function travelix_flex_defaults() {
	$defaults = array();
	foreach ( travelix_flex_all_fields() as $key => $field ) {
		$defaults[ $key ] = isset( $field['default'] ) ? $field['default'] : '';
	}
	return $defaults;
}
