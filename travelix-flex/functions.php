<?php
/**
 * Travelix Flex bootstrap.
 *
 * @package Travelix_Flex
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'TRAVELIX_FLEX_VERSION', '3.1.0' );
define( 'TRAVELIX_FLEX_DIR', get_template_directory() );
define( 'TRAVELIX_FLEX_URI', get_template_directory_uri() );

require_once TRAVELIX_FLEX_DIR . '/inc/settings-schema.php';
require_once TRAVELIX_FLEX_DIR . '/inc/helpers.php';
require_once TRAVELIX_FLEX_DIR . '/inc/setup.php';
require_once TRAVELIX_FLEX_DIR . '/inc/admin-settings.php';
require_once TRAVELIX_FLEX_DIR . '/inc/dynamic-css.php';
require_once TRAVELIX_FLEX_DIR . '/inc/custom-code.php';
require_once TRAVELIX_FLEX_DIR . '/inc/integrations.php';
require_once TRAVELIX_FLEX_DIR . '/inc/home-sections.php';
