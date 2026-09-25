<?php
/**
 * Appearance > Travelix Settings.
 *
 * @package Travelix_Flex
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function travelix_flex_register_settings() {
	register_setting(
		'travelix_flex_settings_group',
		'travelix_flex_options',
		array(
			'type'              => 'array',
			'sanitize_callback' => 'travelix_flex_sanitize_options',
			'default'           => travelix_flex_defaults(),
		)
	);
}
add_action( 'admin_init', 'travelix_flex_register_settings' );

function travelix_flex_add_settings_page() {
	add_theme_page(
		__( 'تنظیمات Travelix', 'travelix-flex' ),
		__( 'تنظیمات Travelix', 'travelix-flex' ),
		'edit_theme_options',
		'travelix-flex-settings',
		'travelix_flex_render_settings_page'
	);
}
add_action( 'admin_menu', 'travelix_flex_add_settings_page' );

/**
 * Sanitize the complete option array according to its field schema.
 */
function travelix_flex_sanitize_options( $input ) {
	$input     = is_array( $input ) ? $input : array();
	$sanitized = array();
	$existing  = get_option( 'travelix_flex_options', array() );
	$existing  = is_array( $existing ) ? $existing : array();

	foreach ( travelix_flex_all_fields() as $key => $field ) {
		$value = isset( $input[ $key ] ) ? $input[ $key ] : '';
		switch ( $field['type'] ) {
			case 'checkbox':
				$sanitized[ $key ] = empty( $value ) ? 0 : 1;
				break;
			case 'number':
				$number = is_numeric( $value ) ? (float) $value : (float) $field['default'];
				if ( isset( $field['min'] ) ) {
					$number = max( (float) $field['min'], $number );
				}
				if ( isset( $field['max'] ) ) {
					$number = min( (float) $field['max'], $number );
				}
				$sanitized[ $key ] = ( isset( $field['step'] ) && 1 > (float) $field['step'] ) ? $number : (int) round( $number );
				break;
			case 'color':
				$sanitized[ $key ] = sanitize_hex_color( $value ) ? sanitize_hex_color( $value ) : $field['default'];
				break;
			case 'email':
				$sanitized[ $key ] = sanitize_email( $value );
				break;
			case 'url':
			case 'media':
				$sanitized[ $key ] = travelix_flex_sanitize_url_or_hash( $value );
				break;
			case 'select':
				$sanitized[ $key ] = isset( $field['choices'][ $value ] ) ? $value : $field['default'];
				break;
			case 'textarea':
				$sanitized[ $key ] = sanitize_textarea_field( $value );
				break;
			case 'shortcode':
				$sanitized[ $key ] = sanitize_text_field( $value );
				break;
			case 'code_css':
			case 'code_js':
				if ( current_user_can( 'unfiltered_html' ) ) {
					$sanitized[ $key ] = travelix_flex_sanitize_custom_code( $value, 'code_css' === $field['type'] ? 'css' : 'js' );
				} else {
					$sanitized[ $key ] = isset( $existing[ $key ] ) ? (string) $existing[ $key ] : '';
				}
				break;
			default:
				$sanitized[ $key ] = sanitize_text_field( $value );
		}
	}

	travelix_flex_register_wpml_strings( $sanitized );
	if ( is_admin() && function_exists( 'add_settings_error' ) ) {
		add_settings_error( 'travelix_flex_messages', 'travelix_flex_saved', __( 'تنظیمات با موفقیت و به‌صورت امن ذخیره شد.', 'travelix-flex' ), 'updated' );
	}
	return $sanitized;
}

function travelix_flex_sanitize_url_or_hash( $value ) {
	$value = trim( (string) $value );
	if ( 0 === strpos( $value, '#' ) ) {
		$anchor = sanitize_title( substr( $value, 1 ) );
		return $anchor ? '#' . $anchor : '';
	}
	return esc_url_raw( $value );
}

/**
 * Register all translatable option strings with WPML String Translation.
 */
function travelix_flex_register_wpml_strings( $options = null ) {
	if ( ! has_action( 'wpml_register_single_string' ) ) {
		return;
	}
	$options = is_array( $options ) ? $options : get_option( 'travelix_flex_options', array() );
	foreach ( travelix_flex_all_fields() as $key => $field ) {
		if ( ! empty( $field['translate'] ) ) {
			$value = array_key_exists( $key, $options ) ? $options[ $key ] : $field['default'];
			do_action( 'wpml_register_single_string', 'Travelix Flex', $key, (string) $value );
		}
	}
}
add_action( 'init', 'travelix_flex_register_wpml_strings', 30 );

function travelix_flex_render_settings_page() {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		return;
	}
	$schema  = travelix_flex_settings_schema();
	$options = wp_parse_args( get_option( 'travelix_flex_options', array() ), travelix_flex_defaults() );
	?>
	<div class="wrap travelix-admin">
		<div class="travelix-admin__hero">
			<div><span class="travelix-admin__kicker">Travelix Flex <?php echo esc_html( TRAVELIX_FLEX_VERSION ); ?></span><h1><?php esc_html_e( 'مرکز کنترل قالب', 'travelix-flex' ); ?></h1><p><?php esc_html_e( 'محتوا، طراحی، اتصال افزونه‌ها و رفتار ریسپانسیو را با پیش‌نمایش زنده و بدون رفرش مدیریت کنید.', 'travelix-flex' ); ?></p></div>
			<a class="button button-secondary" href="<?php echo esc_url( home_url( '/' ) ); ?>" target="_blank" rel="noopener"><?php esc_html_e( 'مشاهده سایت', 'travelix-flex' ); ?></a>
		</div>

		<?php settings_errors( 'travelix_flex_messages' ); ?>
		<?php travelix_flex_render_integration_status(); ?>

		<form method="post" action="options.php" class="travelix-settings-form" data-travelix-settings>
			<?php settings_fields( 'travelix_flex_settings_group' ); ?>
			<nav class="travelix-tabs" role="tablist" aria-label="<?php esc_attr_e( 'بخش‌های تنظیمات', 'travelix-flex' ); ?>">
				<?php $first = true; foreach ( $schema as $tab_key => $tab ) : ?>
					<button type="button" role="tab" aria-selected="<?php echo $first ? 'true' : 'false'; ?>" class="travelix-tab<?php echo $first ? ' is-active' : ''; ?>" data-tab="<?php echo esc_attr( $tab_key ); ?>"><?php echo esc_html( $tab['label'] ); ?></button>
				<?php $first = false; endforeach; ?>
			</nav>

			<div class="travelix-workspace">
				<div class="travelix-panels">
					<?php $first = true; foreach ( $schema as $tab_key => $tab ) : ?>
						<div class="travelix-panel<?php echo $first ? ' is-active' : ''; ?>" role="tabpanel" data-panel="<?php echo esc_attr( $tab_key ); ?>">
							<?php if ( 'custom_code' === $tab_key ) : ?>
								<?php travelix_flex_render_code_center( $options ); ?>
							<?php else : ?>
								<?php $section_first = true; foreach ( $tab['sections'] as $section_key => $section ) : ?>
									<section class="travelix-settings-card<?php echo $section_first ? ' is-open' : ''; ?>" data-section="<?php echo esc_attr( $section_key ); ?>" data-tab-section="<?php echo esc_attr( $tab_key . ':' . $section_key ); ?>">
										<button class="travelix-settings-card__toggle" type="button" aria-expanded="<?php echo $section_first ? 'true' : 'false'; ?>" aria-controls="travelix-section-<?php echo esc_attr( $tab_key . '-' . $section_key ); ?>">
											<span><strong><?php echo esc_html( $section['title'] ); ?></strong><?php if ( ! empty( $section['description'] ) ) : ?><small><?php echo esc_html( $section['description'] ); ?></small><?php endif; ?></span>
											<span class="dashicons dashicons-arrow-down-alt2" aria-hidden="true"></span>
										</button>
										<div class="travelix-settings-card__body" id="travelix-section-<?php echo esc_attr( $tab_key . '-' . $section_key ); ?>" <?php echo $section_first ? '' : 'hidden'; ?>>
											<div class="travelix-fields">
												<?php foreach ( $section['fields'] as $field ) : travelix_flex_render_admin_field( $field, $options[ $field['key'] ] ); endforeach; ?>
											</div>
										</div>
									</section>
								<?php $section_first = false; endforeach; ?>
							<?php endif; ?>
						</div>
					<?php $first = false; endforeach; ?>
				</div>
				<?php travelix_flex_render_live_preview(); ?>
			</div>
			<div class="travelix-savebar"><span data-save-status><?php esc_html_e( 'تغییرات ذخیره‌شده‌اند.', 'travelix-flex' ); ?></span><?php submit_button( __( 'ذخیره تنظیمات', 'travelix-flex' ), 'primary', 'submit', false ); ?></div>
		</form>
	</div>
	<?php
}

function travelix_flex_render_admin_field( $field, $value, $mirror = false ) {
	$key         = $field['key'];
	$name        = $mirror ? '' : 'travelix_flex_options[' . $key . ']';
	$id          = $mirror ? 'travelix-mirror-' . $key : 'travelix-' . $key;
	$description = isset( $field['description'] ) ? $field['description'] : '';
	$is_code     = in_array( $field['type'], array( 'code_css', 'code_js' ), true );
	$data_attrs  = ' data-setting-key="' . esc_attr( $key ) . '"';
	if ( $is_code ) {
		$data_attrs .= ' data-code-key="' . esc_attr( $key ) . '" data-code-role="' . ( $mirror ? 'mirror' : 'source' ) . '"';
	}
	?>
	<div class="travelix-field travelix-field--<?php echo esc_attr( $field['type'] ); ?><?php echo $mirror ? ' is-mirror' : ''; ?>">
		<label for="<?php echo esc_attr( $id ); ?>"><?php echo esc_html( $field['label'] ); ?><?php if ( $is_code ) : ?><span class="travelix-code-badge"><?php echo 'code_css' === $field['type'] ? 'CSS' : 'JS'; ?></span><?php endif; ?></label>
		<div class="travelix-field__control">
			<?php if ( 'checkbox' === $field['type'] ) : ?>
				<label class="travelix-switch"><input id="<?php echo esc_attr( $id ); ?>" type="checkbox" name="<?php echo esc_attr( $name ); ?>" value="1"<?php echo $data_attrs; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> <?php checked( $value, 1 ); ?>><span aria-hidden="true"></span></label>
			<?php elseif ( 'textarea' === $field['type'] ) : ?>
				<textarea id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $name ); ?>" rows="4"<?php echo $data_attrs; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php echo esc_textarea( $value ); ?></textarea>
			<?php elseif ( $is_code ) : ?>
				<textarea class="travelix-code-editor" id="<?php echo esc_attr( $id ); ?>" <?php if ( $name ) : ?>name="<?php echo esc_attr( $name ); ?>"<?php endif; ?> rows="10" spellcheck="false"<?php echo $data_attrs; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php echo esc_textarea( $value ); ?></textarea>
			<?php elseif ( 'select' === $field['type'] ) : ?>
				<select id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $name ); ?>"<?php echo $data_attrs; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php foreach ( $field['choices'] as $choice_value => $choice_label ) : ?><option value="<?php echo esc_attr( $choice_value ); ?>" <?php selected( $value, $choice_value ); ?>><?php echo esc_html( $choice_label ); ?></option><?php endforeach; ?></select>
			<?php elseif ( 'media' === $field['type'] ) : ?>
				<div class="travelix-media-field"><input id="<?php echo esc_attr( $id ); ?>" type="url" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( $value ); ?>"<?php echo $data_attrs; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><button type="button" class="button travelix-media-button"><?php esc_html_e( 'انتخاب تصویر', 'travelix-flex' ); ?></button><button type="button" class="button-link-delete travelix-media-clear"><?php esc_html_e( 'پاک‌کردن', 'travelix-flex' ); ?></button></div><img class="travelix-media-preview<?php echo $value ? '' : ' is-empty'; ?>" src="<?php echo esc_url( $value ); ?>" alt="">
			<?php elseif ( 'color' === $field['type'] ) : ?>
				<input class="travelix-color" id="<?php echo esc_attr( $id ); ?>" type="text" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( $value ); ?>" data-default-color="<?php echo esc_attr( $field['default'] ); ?>"<?php echo $data_attrs; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
			<?php else : ?>
				<input id="<?php echo esc_attr( $id ); ?>" type="<?php echo 'number' === $field['type'] ? 'number' : ( 'email' === $field['type'] ? 'email' : ( 'url' === $field['type'] ? 'text' : 'text' ) ); ?>" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( $value ); ?>"<?php echo $data_attrs; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> <?php if ( isset( $field['min'] ) ) : ?>min="<?php echo esc_attr( $field['min'] ); ?>"<?php endif; ?> <?php if ( isset( $field['max'] ) ) : ?>max="<?php echo esc_attr( $field['max'] ); ?>"<?php endif; ?> <?php if ( isset( $field['step'] ) ) : ?>step="<?php echo esc_attr( $field['step'] ); ?>"<?php endif; ?>>
			<?php endif; ?>
			<?php if ( $description ) : ?><p class="description"><?php echo esc_html( $description ); ?></p><?php endif; ?>
		</div>
	</div>
	<?php
}

/**
 * Dedicated synchronized code center. Mirror editors never submit duplicate names.
 *
 * @param array $options Saved theme options.
 */
function travelix_flex_render_code_center( $options ) {
	?>
	<div class="travelix-code-intro">
		<h2><?php esc_html_e( 'مرکز کدهای اختصاصی صفحه اصلی', 'travelix-flex' ); ?></h2>
		<p><?php esc_html_e( 'هر ویرایشگر با باکس همان بخش در تب «محتوای صفحه اصلی» همگام است. در خروجی سایت، همه CSSها در یک style و همه JavaScriptها در یک script تجمیع می‌شوند.', 'travelix-flex' ); ?></p>
		<?php if ( ! current_user_can( 'unfiltered_html' ) ) : ?><div class="notice notice-warning inline"><p><?php esc_html_e( 'حساب شما اجازه unfiltered_html ندارد؛ برای امنیت، کدهای سفارشی ذخیره نخواهند شد.', 'travelix-flex' ); ?></p></div><?php endif; ?>
	</div>
	<?php $first = true; foreach ( travelix_flex_custom_code_sections() as $section_key => $section_label ) : ?>
		<?php
		$fields = travelix_flex_section_code_fields( $section_key, $section_label );
		$has_code = ! empty( $options[ $section_key . '_custom_css' ] ) || ! empty( $options[ $section_key . '_custom_js' ] );
		$is_open  = $first || $has_code;
		?>
		<section class="travelix-settings-card travelix-code-card<?php echo $is_open ? ' is-open' : ''; ?>" data-section="<?php echo esc_attr( $section_key ); ?>" data-tab-section="custom_code:<?php echo esc_attr( $section_key ); ?>">
			<button class="travelix-settings-card__toggle" type="button" aria-expanded="<?php echo $is_open ? 'true' : 'false'; ?>" aria-controls="travelix-code-<?php echo esc_attr( $section_key ); ?>"><span><strong><?php echo esc_html( $section_label ); ?></strong><small><?php echo $has_code ? esc_html__( 'دارای کد ذخیره‌شده', 'travelix-flex' ) : esc_html__( 'بدون کد اختصاصی', 'travelix-flex' ); ?></small></span><span class="dashicons dashicons-arrow-down-alt2" aria-hidden="true"></span></button>
			<div class="travelix-settings-card__body" id="travelix-code-<?php echo esc_attr( $section_key ); ?>" <?php echo $is_open ? '' : 'hidden'; ?>><div class="travelix-fields travelix-fields--code">
				<?php foreach ( $fields as $field ) : travelix_flex_render_admin_field( $field, $options[ $field['key'] ], true ); endforeach; ?>
			</div></div>
		</section>
	<?php $first = false; endforeach; ?>
	<?php
}

/**
 * Sticky live-preview shell populated by admin.js.
 */
function travelix_flex_render_live_preview() {
	?>
	<aside class="travelix-live-preview" data-live-preview>
		<div class="travelix-live-preview__head"><span><i aria-hidden="true"></i><?php esc_html_e( 'پیش‌نمایش زنده', 'travelix-flex' ); ?></span><strong data-preview-title><?php esc_html_e( 'طراحی عمومی', 'travelix-flex' ); ?></strong></div>
		<div class="travelix-preview-stage" data-preview-stage aria-live="polite"></div>
		<p class="travelix-live-preview__note"><?php esc_html_e( 'پیش‌نمایش، نمونه‌ای فشرده از بخش فعال است؛ تغییرات فرم بلافاصله نمایش داده می‌شوند. کد JavaScript فقط پس از ذخیره در سایت اجرا می‌شود.', 'travelix-flex' ); ?></p>
	</aside>
	<?php
}

function travelix_flex_render_integration_status() {
	$items = array(
		array( 'label' => 'WooCommerce', 'active' => class_exists( 'WooCommerce' ) ),
		array( 'label' => 'Gravity Forms', 'active' => class_exists( 'GFForms' ) ),
		array( 'label' => 'WPML', 'active' => defined( 'ICL_SITEPRESS_VERSION' ) ),
		array( 'label' => 'Bookly', 'active' => defined( 'BOOKLY_VERSION' ) || shortcode_exists( 'bookly-form' ) ),
	);
	echo '<div class="travelix-status-row">';
	foreach ( $items as $item ) {
		$class = $item['active'] ? ' is-active' : '';
		echo '<span class="travelix-status' . esc_attr( $class ) . '"><i aria-hidden="true"></i>' . esc_html( $item['label'] ) . ': ' . esc_html( $item['active'] ? __( 'فعال', 'travelix-flex' ) : __( 'غیرفعال', 'travelix-flex' ) ) . '</span>';
	}
	echo '</div>';
}
