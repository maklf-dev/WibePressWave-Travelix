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
			default:
				$sanitized[ $key ] = sanitize_text_field( $value );
		}
	}

	travelix_flex_register_wpml_strings( $sanitized );
	add_settings_error( 'travelix_flex_messages', 'travelix_flex_saved', __( 'تنظیمات با موفقیت و به‌صورت امن ذخیره شد.', 'travelix-flex' ), 'updated' );
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
			<div><span class="travelix-admin__kicker">Travelix Flex 3.0</span><h1><?php esc_html_e( 'مرکز کنترل قالب', 'travelix-flex' ); ?></h1><p><?php esc_html_e( 'محتوا، طراحی، اتصال افزونه‌ها و رفتار ریسپانسیو صفحه اصلی را بدون ویرایش کد مدیریت کنید.', 'travelix-flex' ); ?></p></div>
			<a class="button button-secondary" href="<?php echo esc_url( home_url( '/' ) ); ?>" target="_blank" rel="noopener"><?php esc_html_e( 'مشاهده سایت', 'travelix-flex' ); ?></a>
		</div>

		<?php settings_errors( 'travelix_flex_messages' ); ?>
		<?php travelix_flex_render_integration_status(); ?>

		<form method="post" action="options.php" class="travelix-settings-form">
			<?php settings_fields( 'travelix_flex_settings_group' ); ?>
			<nav class="travelix-tabs" aria-label="<?php esc_attr_e( 'بخش‌های تنظیمات', 'travelix-flex' ); ?>">
				<?php $first = true; foreach ( $schema as $tab_key => $tab ) : ?>
					<button type="button" class="travelix-tab<?php echo $first ? ' is-active' : ''; ?>" data-tab="<?php echo esc_attr( $tab_key ); ?>"><?php echo esc_html( $tab['label'] ); ?></button>
				<?php $first = false; endforeach; ?>
			</nav>

			<div class="travelix-panels">
				<?php $first = true; foreach ( $schema as $tab_key => $tab ) : ?>
					<div class="travelix-panel<?php echo $first ? ' is-active' : ''; ?>" data-panel="<?php echo esc_attr( $tab_key ); ?>">
						<?php foreach ( $tab['sections'] as $section ) : ?>
							<section class="travelix-settings-card">
								<div class="travelix-settings-card__head"><h2><?php echo esc_html( $section['title'] ); ?></h2><?php if ( ! empty( $section['description'] ) ) : ?><p><?php echo esc_html( $section['description'] ); ?></p><?php endif; ?></div>
								<div class="travelix-fields">
									<?php foreach ( $section['fields'] as $field ) : travelix_flex_render_admin_field( $field, $options[ $field['key'] ] ); endforeach; ?>
								</div>
							</section>
						<?php endforeach; ?>
					</div>
				<?php $first = false; endforeach; ?>
			</div>
			<div class="travelix-savebar"><span><?php esc_html_e( 'پس از ذخیره، کش سایت و افزونه کش را پاک کنید.', 'travelix-flex' ); ?></span><?php submit_button( __( 'ذخیره تنظیمات', 'travelix-flex' ), 'primary', 'submit', false ); ?></div>
		</form>
	</div>
	<?php
}

function travelix_flex_render_admin_field( $field, $value ) {
	$key         = $field['key'];
	$name        = 'travelix_flex_options[' . $key . ']';
	$description = isset( $field['description'] ) ? $field['description'] : '';
	?>
	<div class="travelix-field travelix-field--<?php echo esc_attr( $field['type'] ); ?>">
		<label for="travelix-<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $field['label'] ); ?></label>
		<div class="travelix-field__control">
			<?php if ( 'checkbox' === $field['type'] ) : ?>
				<label class="travelix-switch"><input id="travelix-<?php echo esc_attr( $key ); ?>" type="checkbox" name="<?php echo esc_attr( $name ); ?>" value="1" <?php checked( $value, 1 ); ?>><span aria-hidden="true"></span></label>
			<?php elseif ( 'textarea' === $field['type'] ) : ?>
				<textarea id="travelix-<?php echo esc_attr( $key ); ?>" name="<?php echo esc_attr( $name ); ?>" rows="4"><?php echo esc_textarea( $value ); ?></textarea>
			<?php elseif ( 'select' === $field['type'] ) : ?>
				<select id="travelix-<?php echo esc_attr( $key ); ?>" name="<?php echo esc_attr( $name ); ?>"><?php foreach ( $field['choices'] as $choice_value => $choice_label ) : ?><option value="<?php echo esc_attr( $choice_value ); ?>" <?php selected( $value, $choice_value ); ?>><?php echo esc_html( $choice_label ); ?></option><?php endforeach; ?></select>
			<?php elseif ( 'media' === $field['type'] ) : ?>
				<div class="travelix-media-field"><input id="travelix-<?php echo esc_attr( $key ); ?>" type="url" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( $value ); ?>"><button type="button" class="button travelix-media-button"><?php esc_html_e( 'انتخاب تصویر', 'travelix-flex' ); ?></button><button type="button" class="button-link-delete travelix-media-clear"><?php esc_html_e( 'پاک‌کردن', 'travelix-flex' ); ?></button></div><img class="travelix-media-preview<?php echo $value ? '' : ' is-empty'; ?>" src="<?php echo esc_url( $value ); ?>" alt="">
			<?php elseif ( 'color' === $field['type'] ) : ?>
				<input class="travelix-color" id="travelix-<?php echo esc_attr( $key ); ?>" type="text" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( $value ); ?>" data-default-color="<?php echo esc_attr( $field['default'] ); ?>">
			<?php else : ?>
				<input id="travelix-<?php echo esc_attr( $key ); ?>" type="<?php echo 'number' === $field['type'] ? 'number' : ( 'email' === $field['type'] ? 'email' : ( 'url' === $field['type'] ? 'text' : 'text' ) ); ?>" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( $value ); ?>" <?php if ( isset( $field['min'] ) ) : ?>min="<?php echo esc_attr( $field['min'] ); ?>"<?php endif; ?> <?php if ( isset( $field['max'] ) ) : ?>max="<?php echo esc_attr( $field['max'] ); ?>"<?php endif; ?> <?php if ( isset( $field['step'] ) ) : ?>step="<?php echo esc_attr( $field['step'] ); ?>"<?php endif; ?>>
			<?php endif; ?>
			<?php if ( $description ) : ?><p class="description"><?php echo esc_html( $description ); ?></p><?php endif; ?>
		</div>
	</div>
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
