# 🌍 WibePressWave Travelix

A custom WordPress travel and tour theme built with **Vibe Coding**, modern frontend practices, and a slightly unreasonable amount of iteration. ✈️

Travelix is designed for travel agencies, tour operators, tourism businesses, and booking-focused websites that need a consistent visual system while still using WordPress and its plugin ecosystem for real data and functionality.

> **Plugins manage the data and business logic. Travelix controls the presentation.**

---

## 🚀 Current Release

**Travelix Flex 3.1.0**

Travelix Flex 3.1.0 is a backward-compatible feature release based on 3.0.0. It expands the theme settings experience, introduces per-section custom code, improves live previews, and includes several stability and compatibility improvements.

### ⬇️ Download the Latest Release

[![Download Travelix Flex](https://img.shields.io/badge/Download-Latest%20Travelix%20Flex-2ea44f?style=for-the-badge&logo=wordpress&logoColor=white)](https://github.com/YOUR_USERNAME/WibePressWave-Travelix/releases/latest)

> Replace `YOUR_USERNAME` with your actual GitHub username.

The latest GitHub Release should contain the installable WordPress theme ZIP.

For version 3.1.0, the installable package is:

```text
travelix-flex-3.1.0.zip
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
- Responsive layouts
- A configurable homepage
- A dedicated visual settings experience
- Per-section custom CSS and JavaScript
- Clean separation between presentation and plugin functionality
- Maintainable WordPress architecture
- Security, sanitization, and proper escaping

Instead of allowing every plugin to bring its own unrelated visual personality to the website, Travelix provides one shared design system across the project. 🎨

---

# ✨ What's New in 3.1.0

## 🎛️ Improved Settings Experience

All internal settings groups are now organized as collapsible accordions.

This makes large configuration tabs easier to navigate while keeping related controls grouped together.

The accordion interface also includes accessibility state handling rather than simply hiding things and hoping for the best.

---

## 👁️ Sticky Live Previews

Every settings group now includes a dedicated live preview.

Preview examples are available for areas such as:

- Header
- Hero
- Travel request form
- Benefits
- Destinations
- About section
- Process steps
- Booking section
- Tour cards
- Testimonials
- Blog cards
- CTA
- General cards
- Responsive settings
- Footer
- Future/internal pages

The previews remain visible while editing supported settings, making visual adjustments considerably easier.

---

## 💻 Per-Section Custom CSS & JavaScript

Travelix Flex 3.1.0 introduces dedicated **CSS and JavaScript editors for each of the 11 homepage sections**.

This allows custom behavior and styling to stay logically attached to the section it belongs to.

For example:

```text
Hero
├── Custom CSS
└── Custom JavaScript

Travel Request Form
├── Custom CSS
└── Custom JavaScript

Tours
├── Custom CSS
└── Custom JavaScript
```

The same pattern is available across all supported homepage sections.

No more maintaining one mysterious 900-line global CSS block and pretending everyone remembers why line 647 exists. 😌

---

## 🧩 Central Custom Code Tab

A dedicated **Custom Code** tab provides categorized editors containing the same section-specific CSS and JavaScript.

The section editor and the central editor remain synchronized.

This means custom code can be edited either:

- Directly inside a homepage section
- From the centralized Custom Code tab

Both interfaces work with the same stored data.

---

## ⚙️ Optimized Custom Code Output

Section-level code is not printed as dozens of separate frontend blocks.

Travelix combines:

- All section CSS into a single inline style output
- All section JavaScript into a single inline script output

This keeps the feature organized in the admin interface without unnecessarily fragmenting frontend output.

---

## 📝 WordPress CodeMirror Integration

When the WordPress user account has the built-in code editor enabled, Travelix uses WordPress's bundled **CodeMirror** integration for custom CSS and JavaScript editing.

This provides a better code editing experience while avoiding an unnecessary external editor dependency.

---

## 💾 Unsaved Changes Indicator

The Travelix settings interface now displays an unsaved-changes state in the save bar.

This makes it easier to know whether changes have actually been saved before navigating away.

A tiny feature, perhaps, but so is the save button until you forget to press it. 🙂

---

## 🖼️ Local Demo Assets

Travelix 3.1.0 includes lightweight local SVG assets used for raw/default presentation previews.

Included demo assets:

```text
assets/images/demo-hero.svg
assets/images/demo-about.svg
assets/images/demo-destination.svg
assets/images/demo-tour.svg
assets/images/demo-cta.svg
```

These assets avoid a default dependency on external image services.

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

These sections can be configured through Travelix Settings instead of requiring direct PHP template edits.

Version 3.1.0 also gives each section its own custom CSS and JavaScript controls.

---

# 🎛️ Travelix Settings

The theme includes a dedicated configuration area under:

**Appearance → Travelix Settings**

Settings are grouped into categories covering areas such as:

- Global design
- Header and navigation
- Homepage content
- Cards
- Forms
- Plugin integrations
- Responsive behavior
- Footer
- Internal/future pages
- Custom CSS and JavaScript

Version 3.1.0 adds:

- Accordion-based setting groups
- Sticky live previews
- Unsaved-change indicators
- Section-specific code editors
- A synchronized centralized Custom Code tab

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

This means tour data stays inside WooCommerce while Travelix renders it using the theme's own cards and layouts.

## Catalog Mode

Travelix also supports a catalog-oriented workflow where WooCommerce can be used to manage structured tour data without forcing the website to behave like a traditional online shop.

---

# 🗺️ Destination Cards

Destinations can be generated from WooCommerce product categories.

A destination card may use:

- Category name
- Category thumbnail
- Number of available tours
- Category archive URL

This avoids maintaining the same destination information in multiple places.

---

# 📝 WordPress Blog Integration

Travel articles use standard WordPress posts.

WordPress remains responsible for:

- Posts
- Categories
- Authors
- Dates
- Archives
- Search
- Single article pages

Travelix handles the visual presentation.

---

# 📋 Form Integration

Travelix is designed to work with form plugins such as:

- Gravity Forms
- Contact Form 7
- Other shortcode-based form plugins

Forms remain responsible for validation, submissions, notifications, and stored data.

Travelix provides the surrounding visual system.

### Gravity Forms improvements in 3.1.0

Travelix 3.1.0 improves Gravity Forms integration by correctly enqueueing the required assets for supported functionality such as:

- AJAX forms
- Date fields
- Conditional logic

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

---

# 🧱 Elementor Compatibility

Travelix includes compatibility for Elementor-based content areas and theme locations where supported.

Version 3.1.0 also adds safer handling around Elementor theme-location registration.

---

# 🎨 Design System

The theme is built around a unified visual system for:

- Colors
- Typography
- Spacing
- Containers
- Border radius
- Buttons
- Cards
- Forms
- Homepage sections
- Hero layouts
- Product cards
- Destination cards
- Blog cards
- Testimonials
- CTA sections
- Footer
- Responsive behavior

Dynamic CSS also includes safer fallback handling for invalid or legacy design-option values.

The goal is not merely to "style WordPress".

The goal is to make WordPress behave like one properly designed product instead of twelve plugins wearing different jackets.

---

# 📱 Responsive Design

Travelix is designed for:

- Desktop
- Tablet
- Mobile

Responsive behavior includes adjustments for:

- Layout spacing
- Hero sizing
- Typography
- Card layouts
- Navigation
- Images
- Section spacing
- Reduced-motion preferences

---

# ♿ Frontend Interaction

The theme includes frontend behavior for features such as:

- Responsive navigation
- Search interface
- Reveal animations
- Testimonial controls
- Reduced-motion support
- Keyboard-friendly interactive elements where applicable

---

# 🔐 Security & Stability

Travelix follows standard WordPress security practices, including:

- `ABSPATH` guards
- Capability checks
- WordPress Settings API
- Input sanitization
- Context-aware output escaping
- Controlled shortcode handling
- WordPress and WooCommerce APIs instead of custom raw SQL where possible

Version 3.1.0 additionally includes:

- Custom CSS/JS saving restricted to users with the `unfiltered_html` capability
- Automatic removal of `<style>` wrappers from stored CSS
- Automatic removal of `<script>` wrappers from stored JavaScript
- A fix for a frontend activation issue involving `add_settings_error()`
- Safer Elementor location registration
- Safer fallback behavior for legacy or invalid design settings

The theme does **not** attempt to replace payment, booking, customer, or form plugins.

Sensitive business data remains managed by the relevant WordPress plugin.

---

# 🔄 Upgrade Compatibility

Travelix Flex 3.1.0 preserves settings from version 3.0.0 during a direct upgrade.

Existing settings remain in place, while newly introduced options are added with their defaults.

## Upgrading from 3.0.0 to 3.1.0

1. Back up the site's database and current configuration.
2. Download `travelix-flex-3.1.0.zip`.
3. In WordPress go to:
   **Appearance → Themes → Add New → Upload Theme**
4. Upload the new ZIP.
5. Because the theme folder remains `travelix-flex`, choose the option to replace the existing theme.
6. Clear WordPress, plugin, hosting, browser, and CDN caches as applicable.
7. Open **Appearance → Travelix Settings**.
8. Verify existing settings and review the new 3.1.0 controls.

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

This separation allows the design to evolve without tying critical business data directly to presentation code.

---

# 📂 Repository Structure

The Git repository contains the **theme source code and documentation**, while installable ZIP packages should be published through **GitHub Releases**.

Recommended structure:

```text
WibePressWave-Travelix/
├── travelix-flex/
│   ├── assets/
│   │   ├── css/
│   │   ├── images/
│   │   │   ├── demo-hero.svg
│   │   │   ├── demo-about.svg
│   │   │   ├── demo-destination.svg
│   │   │   ├── demo-tour.svg
│   │   │   └── demo-cta.svg
│   │   └── js/
│   ├── inc/
│   │   ├── admin-settings.php
│   │   ├── custom-code.php
│   │   ├── dynamic-css.php
│   │   ├── settings-schema.php
│   │   ├── setup.php
│   │   └── ...
│   ├── template-parts/
│   ├── functions.php
│   ├── header.php
│   ├── footer.php
│   ├── front-page.php
│   ├── style.css
│   ├── theme.json
│   └── ...
├── docs/
│   ├── INSTALLATION-FA.md
│   ├── TAKEOFF-SUMMARY-FA.md
│   ├── Travelix-Flex-3.1.0-Changes-FA.md
│   └── ...
├── .gitignore
└── README.md
```

---

# 🆕 Important 3.1.0 Source Changes

Version 3.1.0 updates or introduces the following key files:

```text
style.css
functions.php
readme.txt
inc/admin-settings.php
inc/settings-schema.php
inc/setup.php
inc/dynamic-css.php
inc/custom-code.php
assets/css/admin.css
assets/js/admin.js
assets/images/demo-hero.svg
assets/images/demo-about.svg
assets/images/demo-destination.svg
assets/images/demo-tour.svg
assets/images/demo-cta.svg
```

`inc/custom-code.php` and the five demo SVG files are new in this release.

---

# 📦 Repository vs Release Package

The repository contains:

- Theme source code
- Documentation
- Git history
- Development changes

GitHub Releases contain the installable WordPress packages.

For Travelix Flex 3.1.0:

```text
travelix-flex-3.1.0.zip
```

Do not upload the entire repository ZIP through the WordPress theme installer.

Use the dedicated installable theme package.

---

# 🛠️ Fresh Installation

1. Download the latest Travelix Flex ZIP from GitHub Releases.
2. In WordPress go to:
   **Appearance → Themes → Add New → Upload Theme**
3. Upload the Travelix theme ZIP.
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
- Verify PHP and WordPress compatibility
- Back up before upgrades
- Test WooCommerce products
- Test sale and variable products
- Test forms and notifications
- Test Gravity Forms AJAX behavior
- Test date fields and conditional logic
- Test booking flow
- Test multilingual pages
- Test menus
- Test search
- Test custom CSS/JS output
- Test live previews
- Test responsive layouts
- Test user permissions for custom code
- Test accessibility
- Test performance
- Clear all caches before final verification

Because nothing says "production ready" like discovering a mobile overflow five minutes after launch. 😌

---

# 🏷️ Versioning

Travelix releases follow semantic-style versioning:

```text
v3.0.0
v3.0.1
v3.1.0
v4.0.0
```

The GitHub Release version should match the version declared inside the theme's `style.css`.

Current version:

```css
Version: 3.1.0
```

For each release:

1. Update the version in `style.css`.
2. Update the relevant documentation.
3. Commit the final source changes.
4. Push to GitHub.
5. Create a matching Git tag.
6. Create a GitHub Release.
7. Attach the installable theme ZIP.
8. Mark the release as latest when appropriate.

---

# 🏗️ Project Status

🚧 **Under active development**

Travelix continues to evolve across:

- Theme architecture
- Plugin integrations
- Admin UX
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
