# 🌍 WibePressWave Travelix

A custom WordPress travel and tour theme built with **Vibe Coding**, modern frontend practices, and a slightly unreasonable amount of iteration. ✈️

Travelix is designed for travel agencies, tour operators, tourism businesses, and booking-focused websites that need a consistent visual system while still using WordPress and its plugin ecosystem for real data and functionality.

> **Plugins manage the data and business logic. Travelix controls the presentation.**

---

## 🚀 Current Release

**Travelix Flex 3.2.0**

Travelix Flex 3.2.0 is a backward-compatible feature and refinement release based on 3.1.0.

This version focuses on:

- Public-facing layout improvements
- Better responsive behavior
- Improved RTL/LTR handling
- Accessibility refinements
- Blog archive and single-post redesign
- Safer mobile navigation and search interactions
- Admin settings UX improvements
- Continued support for section-level custom CSS and JavaScript

### ⬇️ Download the Latest Release

[![Download Travelix Flex](https://img.shields.io/badge/Download-Latest%20Travelix%20Flex-2ea44f?style=for-the-badge&logo=wordpress&logoColor=white)](https://github.com/maklf-dev/WibePressWave-Travelix/releases/latest)

For version 3.2.0, the installable package is:

```text
travelix-flex-3.2.0.zip
```

---

## 🧭 About the Project

**WibePressWave Travelix** is a custom WordPress theme for travel and tourism websites.

The project focuses on:

- A modern and consistent frontend
- Dynamic WordPress and plugin-driven data
- Reusable theme components
- WooCommerce-based tour products
- Booking and reservation integrations
- Multilingual support
- RTL and LTR layouts
- Responsive design
- Accessible interactions
- A configurable homepage
- A dedicated visual settings experience
- Per-section custom CSS and JavaScript
- Clean separation between presentation and plugin functionality
- Maintainable WordPress architecture
- Security, sanitization, and proper escaping

Instead of allowing every plugin to bring its own unrelated visual personality to the website, Travelix provides one shared design system across the project. 🎨

---

# ✨ What's New in 3.2.0

## 🎨 Frontend Visual Refinements

Travelix 3.2.0 includes a broad visual pass across the public-facing theme.

The homepage has been rebalanced across multiple viewport sizes, including:

- 1440px
- 1024px
- 768px
- 720px
- 520px
- Smaller mobile widths

Improvements include:

- Better hero heading scale
- Controlled text line width
- Fluid container spacing
- More consistent card heights
- Better alignment for prices, dates, and buttons
- Improved section spacing
- Better touch targets
- Improved keyboard focus states
- Better pressed-button feedback

The result is a more stable layout across desktop, tablet, and mobile instead of relying on the ancient frontend ritual of “looks fine on my screen.” 😌

---

## 🖼️ Local Fallback Images

When a post, destination, or WooCommerce product does not have a featured image, Travelix now uses lightweight local SVG assets bundled with the theme.

This improves consistency and avoids awkward empty-card layouts.

---

# 📝 Blog Archive Improvements

The blog archive layout has been refined for small post counts.

### One-post archive

A single post card is centered instead of leaving an unbalanced empty grid.

### Two-post archive

Two posts use a controlled centered layout rather than stretching awkwardly across the page.

Additional improvements include:

- Better image alignment
- Better excerpt alignment
- Consistent date placement
- Consistent “read more” positioning
- Improved pagination
- Improved focus states
- Refined image hover behavior

---

# 📖 Single Post & Comments

Single-post pages received a full readability pass.

Improvements include:

- Better reading width
- Improved line height
- Better paragraph spacing
- Refined heading hierarchy
- Better blockquote styling
- Improved list spacing
- Better featured image presentation
- Semantic date and category metadata
- Designed tag output
- Previous/next post navigation
- Redesigned comment cards
- Improved comment avatars
- Better comment metadata
- Improved reply controls
- Redesigned comment form
- Better mobile behavior

This version treats the blog like actual content rather than the place a theme remembers at the end of development. 🙂

---

# 🌐 RTL, LTR & WPML Improvements

Travelix 3.2.0 improves bidirectional language support throughout the theme.

### Direction-aware hero alignment

The default hero alignment now follows the beginning of the current writing direction:

- Right in RTL languages
- Left in LTR languages

### Direction-aware controls

Directional elements now adapt correctly between RTL and LTR, including:

- Read-more arrows
- Card buttons
- CTA elements
- Slider controls

### Safer mixed-direction content

Phone numbers, email addresses, prices, and dates are isolated from surrounding text using appropriate bidirectional handling such as:

- `bdi`
- `dir`
- `unicode-bidi`

This reduces number and punctuation ordering issues in RTL content.

### Logical CSS properties

More positioning and spacing rules now use logical CSS properties such as:

```css
margin-inline
inset-inline
```

This makes the same layout system work more naturally across both RTL and LTR languages.

WPML and the Travelix text domain continue to handle translatable theme strings.

---

# 🧭 Header, Mobile Menu & Search

## Sticky Header

The sticky header now works correctly with the WordPress admin bar.

## Mobile Menu

The mobile menu now closes when:

- Clicking outside the menu
- Pressing `Escape`
- Resizing the browser window

The accessible label for the menu button also updates based on whether the menu is open or closed.

## Search Dialog

The search dialog now includes improved focus management:

- Keyboard focus remains trapped inside the dialog while it is open
- Focus returns to the previously active control after closing

These are small interaction details until keyboard navigation breaks. Then suddenly they are not small at all.

---

# 🎛️ Travelix Settings Improvements

Travelix 3.2.0 further refines the settings experience introduced in 3.1.0.

## Single-open accordion behavior

Within each settings tab, only one accordion group can remain open at a time.

Opening a new settings group automatically closes the previous one.

This keeps large settings pages easier to scan and reduces visual clutter.

## Custom Code tab redesign

The **Custom Code** tab no longer uses accordions.

Instead, it uses two equal independent columns:

- CSS
- JavaScript

Sections are separated using compact headings and subtle dividers while preserving a unified editor layout.

## Two-way code synchronization

The editors in the Custom Code tab remain synchronized with each section's CSS and JavaScript fields in the homepage settings.

Code can therefore be edited from either location without creating separate copies.

## Consolidated frontend output

Travelix still combines:

- All section CSS into one style output
- All section JavaScript into one script output

## Safer admin preview behavior

Custom JavaScript does **not** execute inside the admin preview environment.

This prevents custom frontend scripts from interfering with the WordPress admin interface.

---

# 🏠 Configurable Homepage

The homepage supports 11 configurable sections:

1. Hero
2. Travel request/contact form
3. Benefits
4. Destinations
5. About / brand introduction
6. Travel planning process
7. Booking
8. Tour products
9. Testimonials
10. Travel articles
11. Final CTA

Each section can be configured through Travelix Settings and can use its own custom CSS and JavaScript.

---

# 🛒 WooCommerce Integration

WooCommerce is used as the main data source for tours and travel packages.

Travelix can use WooCommerce data such as:

- Product titles
- Prices
- Sale prices
- Featured images
- Product categories
- Product attributes
- Tour metadata
- Product archive links
- Product detail links

This keeps business data in WooCommerce while Travelix controls the visual presentation.

## Catalog Mode

Travelix supports a catalog-oriented workflow where WooCommerce can manage structured tour data without requiring the site to behave like a traditional online shop.

---

# 🗺️ Destination Cards

Destinations can be generated from WooCommerce product categories.

A destination card may use:

- Category name
- Category thumbnail
- Number of available tours
- Category archive URL

If an image is missing, Travelix can use a bundled fallback visual.

---

# 📋 Form Integration

Travelix is designed to work with form plugins such as:

- Gravity Forms
- Contact Form 7
- Other shortcode-based form plugins

Forms remain responsible for validation, submissions, notifications, and stored data.

Travelix provides the surrounding design system.

---

# 📅 Booking Integration

Travelix includes support for shortcode-based booking systems such as:

- Bookly
- Other WordPress booking plugins
- Custom booking shortcodes

The booking plugin owns the booking logic.

The theme owns the presentation.

Everyone stays in their lane. Civilization continues. 🫡

---

# 🌐 WPML Support

Travelix supports multilingual WordPress websites using WPML.

The theme can work with:

- WPML language switching
- String Translation
- Multilingual pages
- Multilingual posts
- Multilingual WooCommerce products
- Multilingual menus
- Multilingual categories

Version 3.2.0 further improves RTL/LTR direction handling across public-facing components.

---

# 🧱 Elementor Compatibility

Travelix includes compatibility for Elementor-based content areas and theme locations where supported.

---

# 💻 Per-Section Custom CSS & JavaScript

Travelix provides dedicated CSS and JavaScript controls for each of the 11 homepage sections.

The same code can be edited from:

- The corresponding homepage section
- The centralized Custom Code tab

Both interfaces remain synchronized.

Custom CSS and JavaScript are stored as part of the theme settings and emitted in consolidated frontend outputs.

---

# 📝 WordPress CodeMirror Integration

When WordPress's built-in code editor is enabled for the current user, Travelix uses WordPress's bundled CodeMirror integration for custom CSS and JavaScript editing.

No unnecessary external editor dependency is required.

---

# 🔐 Security & Stability

Travelix follows standard WordPress security practices, including:

- `ABSPATH` guards
- Capability checks
- WordPress Settings API
- Input sanitization
- Context-aware output escaping
- Controlled shortcode handling
- Safe handling of custom CSS and JavaScript
- WordPress and WooCommerce APIs instead of custom raw SQL where possible

Custom CSS and JavaScript saving is restricted to users with the required `unfiltered_html` capability.

Stored custom code is also normalized by stripping unnecessary `<style>` and `<script>` wrappers.

Custom JavaScript is intentionally not executed inside admin previews.

---

# ✅ Compatibility & Testing

Travelix Flex 3.2.0 has been tested as a direct upgrade from **3.1.0**.

The upgrade preserves:

- Existing settings
- Colors
- Contact information
- Custom CSS
- Custom JavaScript

The release has also been tested with:

- PHP 7.4
- PHP 8.4

Validation and checks include:

- Fresh installation
- Direct upgrade
- Custom code sanitization
- Consolidated CSS/JS output
- Settings-panel rendering
- Editor synchronization
- PHP structure
- JavaScript
- JSON
- Image paths
- ZIP package structure

---

# 🔄 Upgrading from 3.1.0 to 3.2.0

1. Back up the WordPress files and database.
2. Download `travelix-flex-3.2.0.zip`.
3. In WordPress go to:
   **Appearance → Themes → Add New → Upload Theme**
4. Upload the new ZIP.
5. Confirm replacement of the existing Travelix Flex theme.
6. Clear optimization-plugin caches.
7. Clear server/CDN caches.
8. Clear browser cache.
9. Check the homepage on desktop and mobile.
10. Check the blog archive.
11. Open a single post and verify comments.
12. Test plugin forms and important interactive elements.

The theme folder and identifier remain unchanged, so the new package can replace version 3.1.0 directly.

> `travelix-flex-3.2.0-changed-files.zip` is intended only for manual review or manual file replacement. For normal upgrades, use the full `travelix-flex-3.2.0.zip` package.

---

# 🧠 Data Ownership

| Data / Feature | Managed By |
|---|---|
| Tours | WooCommerce |
| Prices | WooCommerce |
| Destinations | WooCommerce Product Categories |
| Articles | WordPress Posts |
| Forms | Gravity Forms / Form Plugin |
| Reservations | Bookly / Booking Plugin |
| Languages | WPML |
| Menus | WordPress |
| Logo | WordPress Custom Logo |
| Visual Presentation | Travelix |
| Section Custom CSS/JS | Travelix Settings |

This separation allows the design to evolve without tying business-critical data directly to presentation code.

---

# 📂 Repository Structure

The Git repository contains the **theme source code and documentation**, while installable ZIP packages should be published through **GitHub Releases**.

Recommended structure:

```text
WibePressWave-Travelix/
├── travelix-flex/
│   ├── assets/
│   │   ├── css/
│   │   │   ├── main.css
│   │   │   └── admin.css
│   │   ├── images/
│   │   └── js/
│   │       ├── main.js
│   │       └── admin.js
│   ├── inc/
│   ├── template-parts/
│   ├── archive.php
│   ├── single.php
│   ├── header.php
│   ├── footer.php
│   ├── functions.php
│   ├── style.css
│   ├── theme.json
│   └── ...
├── docs/
│   ├── INSTALLATION-FA.md
│   ├── TAKEOFF-SUMMARY-FA.md
│   ├── Travelix-Flex-3.1.0-Changes-FA.md
│   ├── Travelix-Flex-3.2.0-Changes-FA.md
│   └── ...
├── .gitignore
└── README.md
```

---

# 🆕 Important 3.2.0 Source Changes

Version 3.2.0 updates the following key files:

```text
style.css
functions.php
readme.txt
header.php
footer.php
archive.php
single.php
template-parts/content-card.php
inc/admin-settings.php
inc/dynamic-css.php
inc/integrations.php
inc/settings-schema.php
inc/setup.php
assets/css/main.css
assets/css/admin.css
assets/js/main.js
assets/js/admin.js
```

---

# 📦 Repository vs Release Package

The repository contains:

- Theme source code
- Documentation
- Git history
- Development changes

GitHub Releases contain installable WordPress packages.

For Travelix Flex 3.2.0:

```text
travelix-flex-3.2.0.zip
```

Do not upload the entire repository ZIP through the WordPress theme installer.

Use the dedicated installable theme package.

---

# 🛠️ Fresh Installation

1. Download the latest Travelix Flex ZIP from GitHub Releases.
2. In WordPress go to:
   **Appearance → Themes → Add New → Upload Theme**
3. Upload `travelix-flex-3.2.0.zip`.
4. Install and activate the theme.
5. Open **Appearance → Travelix Settings**.
6. Configure the required sections and integrations.
7. Save the settings.
8. Configure WooCommerce, forms, booking, WPML, and other required plugins.
9. Clear caches before final verification.

---

# 🧪 Recommended Production Checks

Before using Travelix on a live website:

- Test on staging first
- Back up before upgrades
- Verify PHP and WordPress compatibility
- Test homepage layouts at multiple widths
- Test WooCommerce products
- Test forms and notifications
- Test booking flow
- Test multilingual pages
- Test RTL and LTR layouts
- Test the blog archive with one, two, and several posts
- Test single posts and comments
- Test previous/next post navigation
- Test mobile menu behavior
- Test search focus behavior
- Test keyboard navigation
- Test touch targets
- Test custom CSS/JS output
- Test settings synchronization
- Test accessibility
- Test performance
- Clear all caches before final verification

---

# 🏷️ Versioning

Travelix releases follow semantic-style versioning:

```text
v3.0.0
v3.1.0
v3.2.0
v4.0.0
```

The GitHub Release version should match the version declared inside the theme's `style.css`.

Current version:

```css
Version: 3.2.0
```

For each release:

1. Update the version in `style.css`.
2. Update the relevant documentation.
3. Commit the final source changes.
4. Push to GitHub.
5. Create a matching Git tag.
6. Create a GitHub Release.
7. Attach the full installable theme ZIP.
8. Mark the release as latest when appropriate.

---

# 🏗️ Project Status

🚧 **Under active development**

Travelix continues to evolve across:

- Theme architecture
- Plugin integrations
- Admin UX
- Public-facing layouts
- Accessibility
- RTL/LTR support
- UI components
- Theme settings
- Custom code tooling
- Documentation
- Responsive behavior

Expect commits.

Expect refactors.

Expect at least one CSS rule whose entire purpose is negotiating with WordPress. 😑

---

# 🤖 Built with Vibe Coding

Travelix is developed using an AI-assisted **Vibe Coding** workflow.

AI is used for tasks such as:

- Research
- Brainstorming
- Architecture planning
- Code generation
- Debugging
- Refactoring
- Documentation
- Iteration

The objective is not to blindly generate code.

The objective is to use AI as a development accelerator while keeping the project understandable, maintainable, version-controlled, and suitable for real WordPress development.

AI writes fast.

Git remembers everything.

Developers still have to test it. 🙂

---

# 🚀 Long-Term Vision

Travelix is intended to become a reusable, maintainable, production-ready WordPress travel theme that can support real travel businesses and dynamic WordPress content.

The broader WibePressWave goal is to build multiple WordPress themes using:

**WordPress + modern frontend practices + reusable architecture + AI-assisted development + unreasonable amounts of iteration.**

---

Made with 💻 WordPress, ✈️ travel vibes, Git, and 🤖 a suspicious amount of AI assistance.
