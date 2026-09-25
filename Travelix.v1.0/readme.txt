# WibePressWave Travelix

A custom WordPress travel and tour theme built for a modern travel agency workflow, with a little vibe coding, a lot of iteration, and the reasonable hope that WordPress plugins can all live in the same website without starting a design argument. ✈️🌍

## Current Version

Theme version: **2.0.0**

WordPress requirement: **6.4+**
PHP requirement: **7.4+**
Text domain: **travelix**

## About the Project

WibePressWave Travelix is a custom WordPress theme for travel agencies, tour operators, tourism companies, and travel-focused websites.

The theme is designed around one main idea:

**WordPress and plugins manage the data and business functionality, while Travelix keeps the frontend presentation visually consistent.**

Instead of hardcoding tours, destinations, blog posts, forms, or booking data directly into templates, the theme reads that information from WordPress and supported plugins and renders it through Travelix layouts and components.

The project uses an AI-assisted vibe-coding workflow during development, but the final theme is structured as a normal WordPress theme and uses standard WordPress APIs, hooks, sanitization, escaping, templates, shortcodes, and plugin integrations.

## What This Version Includes

### Custom Travel Homepage

`front-page.php` provides the main travel landing page with sections for:

- Hero content and primary calls to action
- Custom travel request form
- Trust and service highlights
- Popular destinations
- Travel agency introduction section
- Travel planning process
- Optional online booking section
- Featured tours
- Travel promise/testimonial-style section
- Latest travel articles
- WordPress page content / Elementor content area
- Final consultation call to action

The homepage uses dynamic WordPress and plugin data where appropriate instead of relying entirely on hardcoded cards.

### WooCommerce Integration

WooCommerce is used as the data layer for tours and travel packages.

Travel products can provide:

- Tour title
- Featured image
- Short description
- Price
- Product URL
- Duration attribute
- Product categories used as destinations

Featured WooCommerce products are displayed on the homepage through the Travelix tour-card design.

Product categories are used to generate destination cards, including category images and the number of available tours.

The theme also declares support for:

- WooCommerce
- Product gallery zoom
- Product gallery lightbox
- Product gallery slider

A dedicated `woocommerce.php` template keeps WooCommerce content inside the Travelix site layout.

### Catalog Mode

Direct WooCommerce purchasing is disabled by default.

This allows the website to use WooCommerce as a structured tour catalog before online checkout or direct booking is ready.

Direct purchasing can be enabled from the WordPress Customizer when the sales flow is ready.

### Gravity Forms Integration

The homepage contains a travel-request area powered by Gravity Forms.

The Gravity Forms form ID can be configured from the WordPress Customizer without editing theme files.

If Gravity Forms is not active, the theme displays a useful fallback message instead of failing silently. A rare moment of software behaving like a responsible adult. 🙂

### Booking System Slot

The theme includes an optional booking section designed to accept a booking shortcode.

This is intended for integrations such as Bookly or another shortcode-based booking plugin.

When no booking shortcode is configured, the section is not rendered.

### WPML Support

The theme uses the `travelix` text domain for translatable strings and includes a WPML language-switcher integration through the `wpml_active_languages` filter.

When WPML is available and languages are configured, the theme can display active language links in the header.

### Elementor Compatibility

The theme registers Elementor core theme locations.

If Elementor provides a custom header or footer through its Theme Builder, Travelix allows Elementor to render those locations instead of the built-in theme header or footer.

The homepage also outputs normal WordPress page content, which allows page-builder content to be inserted into the front page.

### WordPress Customizer Options

The theme currently exposes Travelix homepage settings for:

- Contact phone number
- Contact email address
- Gravity Forms form ID
- Booking shortcode
- WooCommerce direct checkout toggle
- Hero image
- Main introduction image
- Secondary introduction image

These settings allow common site content to be changed without editing PHP templates.

### Navigation

Two WordPress menu locations are registered:

- `primary` for the main navigation
- `footer` for the footer navigation

### Responsive Navigation

The included JavaScript handles the mobile navigation menu, including:

- Open/close state
- `aria-expanded` updates
- Closing after a navigation link is selected
- Closing with the Escape key

### Scroll Reveal Effects

Elements using the `.reveal` class are progressively revealed with `IntersectionObserver`.

Browsers without `IntersectionObserver` fall back to showing the content normally, because hiding an entire website over a decorative animation would be a deeply committed way to ruin someone's afternoon.

### Dynamic Asset Versioning

The main CSS and JavaScript files use their file modification time as the asset version.

This helps browsers receive updated assets after changes instead of serving stale cached files during development.

## Included Theme Files

```text
Travelix/
├── assets/
│   ├── css/
│   │   └── main.css
│   ├── images/
│   │   └── logo.jpg
│   └── js/
│       └── main.js
├── footer.php
├── front-page.php
├── functions.php
├── header.php
├── index.php
├── page.php
├── single.php
├── style.css
├── woocommerce.php
└── readme.txt
```

### File Responsibilities

- `style.css` contains the required WordPress theme metadata.
- `functions.php` contains theme setup, WordPress support declarations, Customizer settings, plugin integrations, asset loading, and Travelix shortcodes.
- `header.php` contains the default Travelix header, contact information, WPML language switcher, main menu, and mobile navigation trigger.
- `footer.php` contains the default footer, footer menu, contact information, and travel-request call to action.
- `front-page.php` builds the custom Travelix homepage.
- `index.php` renders the main post/archive listing using Travelix blog cards.
- `single.php` renders individual WordPress posts.
- `page.php` renders standard WordPress pages.
- `woocommerce.php` wraps WooCommerce output in the Travelix page structure.
- `assets/css/main.css` contains the main visual system and responsive styling.
- `assets/js/main.js` contains mobile navigation and reveal-animation behavior.

## Installation

### 1. Install the Theme

Copy the theme directory into:

```text
wp-content/themes/
```

Then open:

**WordPress Admin → Appearance → Themes**

and activate Travelix.

You can also package the theme as a ZIP file and install it through:

**Appearance → Themes → Add New → Upload Theme**

### 2. Create the Homepage

Create a WordPress page to use as the homepage.

Then go to:

**Settings → Reading**

Select **A static page** and assign the page as the homepage.

WordPress will then use `front-page.php` for the front page.

### 3. Configure Menus

Create your menus under:

**Appearance → Menus**

Assign them to:

- Primary Menu
- Footer Menu

### 4. Configure Travelix Settings

Open:

**Appearance → Customize → Travelix Homepage Settings**

Configure the available options, including contact information, homepage images, Gravity Forms ID, booking shortcode, and checkout behavior.

## WooCommerce Setup

Install and activate WooCommerce.

Create each tour or travel package as a WooCommerce product.

Recommended product data:

- Product name → tour name
- Featured image → tour image
- Short description → short route or tour summary
- Regular/sale price → displayed tour price
- Product category → destination
- Category thumbnail → destination-card image
- `duration` or `pa_duration` product attribute → duration badge

To display tours in the default homepage Featured Tours section, mark the relevant WooCommerce products as **Featured**.

### Enabling Direct Checkout

Direct purchasing is disabled by default.

When online sales are ready, enable the checkout option under:

**Appearance → Customize → Travelix Homepage Settings**

Until then, products can still be used as tour detail pages and catalog entries.

## Destination Setup

Travelix uses WooCommerce product categories as destinations.

For example:

```text
Italy
Japan
Turkey
France
Thailand
```

Assign products to those categories and upload a thumbnail image for each category.

The destination shortcode then loads the most populated product categories and renders them as Travelix destination cards.

## Gravity Forms Setup

Install and activate Gravity Forms.

Create the travel-request form and note its form ID.

Then go to:

**Appearance → Customize → Travelix Homepage Settings**

Set the Gravity Forms ID to the correct value.

The homepage calls the Travelix form shortcode internally and renders the configured Gravity Form.

## Booking / Bookly Setup

The booking integration is shortcode-based, so the theme is not tightly coupled to one booking plugin.

For Bookly:

1. Install and configure Bookly.
2. Generate the required Bookly shortcode.
3. Open **Appearance → Customize → Travelix Homepage Settings**.
4. Paste the shortcode into the booking shortcode setting.
5. Save the Customizer settings.

When a shortcode exists, Travelix automatically renders the booking section on the homepage.

## WPML Setup

Install and configure WPML normally.

Theme strings use the `travelix` text domain and can be translated through the normal WPML string-translation workflow.

The Travelix language switcher reads active WPML languages and displays their native names and URLs in the default header.

## Elementor Usage

Elementor can be used for regular page content.

Travelix also registers Elementor theme locations, allowing Elementor Pro Theme Builder templates to replace supported core locations such as the header and footer.

If an Elementor header/footer location is rendered, the built-in Travelix version is skipped to avoid duplicate markup.

## Available Shortcodes

### Featured or Recent Tours

```text
[travelix_products limit="3" featured="true"]
```

Supported attributes:

- `limit` - number of products, from 1 to 12
- `category` - WooCommerce product-category slug or comma-separated slugs
- `featured` - use `true` to return featured products

Example:

```text
[travelix_products limit="6" category="europe" featured="false"]
```

### Destinations

```text
[travelix_destinations limit="5"]
```

The shortcode reads WooCommerce product categories and displays their category image, name, tour count, and archive link.

The maximum supported limit is 10.

### Blog Posts

```text
[travelix_posts limit="3"]
```

Supported attributes:

- `limit` - number of posts, from 1 to 12
- `category` - WordPress post-category slug

Example:

```text
[travelix_posts limit="6" category="travel-guides"]
```

### Gravity Form

```text
[travelix_form id="1"]
```

Replace `1` with the required Gravity Forms form ID.

If no ID is passed, the shortcode uses the form ID configured in the Customizer.

## Theme Data Flow

Travelix intentionally separates presentation from content management.

```text
WordPress / Plugins
        ↓
Posts, products, categories, forms, booking data
        ↓
Travelix PHP templates and shortcodes
        ↓
Travelix cards, sections, typography and responsive layout
        ↓
Frontend website
```

This means a site administrator can manage tours, prices, destinations, articles, forms, and bookings through WordPress while the theme controls their visual presentation.

## Security and WordPress Practices

This version already uses several standard WordPress practices, including:

- Direct-access protection in core theme files
- WordPress escaping helpers for rendered URLs, attributes, and text
- Sanitization callbacks for Customizer settings
- `absint()` for numeric IDs and limits
- WordPress APIs for products, queries, menus, theme settings, and assets
- `wp_kses_post()` where formatted WooCommerce price HTML is intentionally allowed
- WordPress text-domain functions for translatable interface strings

As with any WordPress project, security also depends on keeping WordPress core, the theme, plugins, PHP, hosting, and administrator credentials properly maintained.

## Development Notes

The project is intentionally kept as a conventional WordPress theme rather than turning every feature into a custom framework.

The current architecture favors:

- Native WordPress APIs
- Plugin-provided data
- Reusable Travelix UI patterns
- Minimal plugin coupling
- Progressive integration with booking, multilingual, ecommerce, and page-builder tools

That keeps the theme easier to extend while avoiding the classic development strategy of solving one problem by creating six more impressive problems. 🧩

## Recommended Plugin Stack

The current theme is designed around or prepared for:

- **WooCommerce** - tours, prices, product pages, and destination categories
- **Gravity Forms** - travel consultation/request forms
- **WPML** - multilingual content and language switching
- **Bookly** - optional booking workflow through shortcode integration
- **Elementor / Elementor Pro** - optional page building and theme-location overrides

Not every plugin is required for the theme to activate. Features that depend on unavailable plugins generally provide a fallback or remain hidden until configured.

## Project Direction

Travelix is intended to evolve into a production-ready travel theme where administrators manage real data inside WordPress while the theme provides one consistent visual language across the site.

The broader WibePressWave workflow is focused on building reusable WordPress themes with modern frontend practices, native WordPress integration, and AI-assisted development without making the resulting codebase depend on AI-specific tooling.

## License

No public license is currently declared in this project package. Add an appropriate license before public redistribution if required.

---

Built with WordPress, WooCommerce, travel plans, caffeine, and the recurring discovery that “one small theme change” is apparently a fictional concept. ☕✈️
