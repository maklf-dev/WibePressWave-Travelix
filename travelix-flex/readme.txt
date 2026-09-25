=== Travelix Flex ===
Contributors: travelix
Requires at least: 6.4
Requires PHP: 7.4
Stable tag: 3.1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Travelix Flex is an RTL-ready travel and tour theme with a deeply configurable homepage.

== Main features ==

* Professional accordion-based settings panel with sticky live preview.
* Synchronized per-section CSS/JavaScript editors and a dedicated code center.
* Configurable homepage content, section order and visibility.
* WooCommerce product and product-category cards.
* WordPress post cards.
* Gravity Forms and generic shortcode slots for Bookly and other plugins.
* WPML language switcher and String Translation registration.
* Header, footer, responsive, card and future-template settings.
* Elementor header/footer locations and editable page content area.
* Accessible navigation, search dialog and testimonial controls.
* Catalog mode is optional and disabled by default.

== Installation ==

Upload the travelix-flex.zip file from Appearance > Themes > Add New > Upload Theme.
When replacing an older Travelix Flex ZIP, WordPress can update the existing theme in place. Saved settings are retained and new defaults are added automatically.
After activation, open Appearance > Travelix Settings and review the live previews.

== Security ==

All stored options are sanitized by field type. Front-end values are escaped for their output context. Shortcodes can only be configured by users with the edit_theme_options capability.
Custom CSS and JavaScript can only be saved by trusted users with the unfiltered_html capability. Wrapper style/script tags are removed before storage.

== Changelog ==

= 3.1.0 =
* Added collapsible settings groups with accessible state controls.
* Added sticky, responsive live previews for every settings category.
* Added synchronized CSS and JavaScript editors for all homepage sections.
* Added one consolidated inline CSS and one consolidated inline JS output.
* Added safe in-place option migration for direct theme replacement.
* Fixed activation on front-end requests where admin-only helpers are unavailable.
* Added proper Gravity Forms asset enqueueing for function embeds.
* Added bundled presentation artwork and removed remote demo-image defaults.
* Hardened Elementor and dynamic-style fallbacks.

= 3.0.0 =
* New settings architecture and homepage section system.
* Added WooCommerce, Gravity Forms, Bookly-shortcode and WPML integrations.
* Added responsive controls, accessible menus and dynamic card renderers.
