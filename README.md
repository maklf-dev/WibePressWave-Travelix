# 🌍 WibePressWave Travelix

A custom WordPress travel and tour theme built with **Vibe Coding**, modern frontend practices, and a slightly unhealthy amount of iteration. ✈️

Travelix is designed for travel agencies, tour operators, tourism businesses, and booking-focused websites that need a consistent visual system while still using WordPress plugins for real data and functionality.

> **Plugins manage the data and business logic. Travelix controls the presentation.**

---

## 🚀 Current Release

**Travelix Flex 3.0.0**

### ⬇️ Download the Installable Theme

[![Download Travelix Flex](https://img.shields.io/badge/Download-Travelix%20Flex-2ea44f?style=for-the-badge&logo=wordpress&logoColor=white)](https://github.com/maklf-dev/WibePressWave-Travelix/releases/latest/download/travelix-flex.zip)

> Replace `maklf-dev` in the link above with your actual GitHub username.

The button always points to the `travelix-flex.zip` file attached to the latest GitHub Release.

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
- Clean separation between theme presentation and plugin functionality
- Maintainable WordPress architecture
- Security, sanitization, and proper escaping

Instead of allowing every plugin to bring its own completely unrelated visual personality to the website, Travelix provides one shared design system across the project. 🎨

---

## ✨ Main Features

### 🏠 Configurable Travel Homepage

The homepage supports reusable sections such as:

- Hero section
- Travel request/contact form
- Benefits section
- Destination categories
- Brand/about section
- Travel planning process
- Booking section
- Tour products
- Testimonials
- Travel articles
- Final call-to-action

Sections can be controlled through the theme settings instead of requiring direct template edits.

---

## 🛒 WooCommerce Integration

WooCommerce is used as the main data source for tours and travel packages.

Travelix can use WooCommerce data such as:

- Product title
- Price
- Sale price
- Featured image
- Product categories
- Product attributes
- Tour metadata
- Product archive links
- Product detail links

This means tour data stays inside WooCommerce while Travelix renders it using the theme's own cards and layouts.

### Catalog Mode

Travelix also supports a catalog-oriented workflow where WooCommerce can be used to manage structured tour data without forcing the website to behave like a traditional online shop.

---

## 🗺️ Destination Cards

Destinations can be generated from WooCommerce product categories.

A destination card may use:

- Category name
- Category thumbnail
- Number of available tours
- Category archive URL

This avoids maintaining the same destination information in multiple places.

---

## 📝 WordPress Blog Integration

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

## 📋 Form Integration

Travelix is designed to work with form plugins such as:

- Gravity Forms
- Contact Form 7
- Other shortcode-based form plugins

Forms remain responsible for validation, submissions, notifications, and stored data.

The theme provides the surrounding design and visual consistency.

---

## 📅 Booking Integration

Travelix includes support for shortcode-based booking systems such as:

- Bookly
- Other WordPress booking plugins
- Custom booking shortcodes

The booking plugin owns the booking logic.

The theme owns the styling.

Everyone stays in their lane. Civilization continues. 🫡

---

## 🌐 WPML Support

Travelix supports multilingual WordPress websites using WPML.

The theme can work with:

- WPML language switching
- String Translation
- Multilingual pages
- Multilingual posts
- Multilingual WooCommerce products
- Multilingual menus and categories

---

## 🧱 Elementor Compatibility

Travelix includes compatibility for Elementor-based content areas and theme locations where supported.

This allows predefined Travelix sections and editable WordPress or Elementor content to coexist.

---

## 🎨 Design System

The theme is built around a unified visual system for:

- Colors
- Typography
- Spacing
- Containers
- Border radius
- Buttons
- Cards
- Forms
- Sections
- Hero layouts
- Product cards
- Destination cards
- Blog cards
- Testimonials
- CTA sections
- Footer
- Responsive behavior

The goal is not merely to "style WordPress".

The goal is to make WordPress behave like one properly designed product instead of twelve plugins wearing different jackets.

---

## 📱 Responsive Design

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

## ♿ Frontend Interaction

The theme includes frontend behavior for features such as:

- Responsive navigation
- Search interface
- Reveal animations
- Testimonial controls
- Reduced-motion support
- Keyboard-friendly interactive elements where applicable

---

## 🔐 Security Approach

Travelix follows standard WordPress security practices, including:

- `ABSPATH` guards
- Capability checks
- WordPress Settings API
- Input sanitization
- Context-aware output escaping
- Controlled shortcode handling
- WordPress and WooCommerce APIs instead of custom raw SQL where possible

The theme does **not** attempt to replace payment, booking, customer, or form plugins.

Sensitive business data remains managed by the relevant WordPress plugin.

---

## 🧠 Data Ownership

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

This separation makes the theme easier to maintain and allows the website design to evolve without tying business-critical data directly to presentation code.

---

## 📂 Repository Structure

The Git repository should contain the **theme source code and documentation**, while installable ZIP files should be published through **GitHub Releases**.

Recommended structure:

```text
WibePressWave-Travelix/
├── travelix-flex/
│   ├── assets/
│   ├── inc/
│   ├── template-parts/
│   ├── functions.php
│   ├── header.php
│   ├── footer.php
│   ├── front-page.php
│   ├── style.css
│   ├── theme.json
│   └── ...
│
├── docs/
│   ├── INSTALLATION-FA.md
│   ├── TAKEOFF-SUMMARY-FA.md
│   └── README-FIRST-FA.txt
│
├── .gitignore
└── README.md
```

---

## 📦 Repository vs Release Package

The repository contains:

- Source code
- Documentation
- Git history
- Development changes

The GitHub Release contains:

```text
travelix-flex.zip
```

That ZIP is the file intended for direct WordPress installation.

Do not upload the full repository ZIP to WordPress.

---

## 🛠️ Installation

### Recommended Method

1. Open the latest GitHub Release.
2. Download `travelix-flex.zip`.
3. In WordPress go to:
   **Appearance → Themes → Add New → Upload Theme**
4. Upload `travelix-flex.zip`.
5. Install and activate the theme.
6. Open the Travelix settings page.
7. Configure the required sections and plugin integrations.
8. Save settings.
9. Clear WordPress, browser, hosting, and CDN caches if needed.

---

## 🧪 Recommended Production Checks

Before using Travelix on a live website:

- Test on staging first
- Verify PHP and WordPress compatibility
- Test WooCommerce products
- Test sale and variable products
- Test forms and notifications
- Test booking flow
- Test multilingual pages
- Test menus
- Test search
- Test mobile layouts
- Test tablet layouts
- Test desktop layouts
- Test accessibility
- Test performance
- Clear all caches before final verification

Because nothing says "production ready" like discovering a mobile overflow five minutes after launch. 😌

---

## 🏷️ Versioning

Travelix releases should use Git tags such as:

```text
v3.0.0
v3.0.1
v3.1.0
v4.0.0
```

The GitHub Release version should match the version declared inside the theme's `style.css`.

Example:

```css
Version: 3.0.0
```

For each release:

1. Update the version in `style.css`.
2. Commit the final source changes.
3. Push to GitHub.
4. Create a matching Git tag.
5. Create a GitHub Release.
6. Attach the installable `travelix-flex.zip`.
7. Mark the release as the latest release when appropriate.

---

## 🏗️ Project Status

🚧 **Under active development**

Travelix will continue to evolve as its:

- Theme architecture
- Plugin integrations
- UI components
- Settings
- Documentation
- Responsive behavior

are refined.

Expect commits.

Expect refactors.

Expect at least one CSS rule whose entire purpose is negotiating with WordPress. 😑

---

## 🤖 Built with Vibe Coding

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

## 🚀 Long-Term Vision

Travelix is intended to become a reusable, maintainable, production-ready WordPress travel theme that can support real travel businesses and dynamic WordPress content.

The broader WibePressWave goal is to build multiple WordPress themes using:

**WordPress + modern frontend practices + reusable architecture + AI-assisted development + unreasonable amounts of iteration.**

---

Made with 💻 WordPress, ✈️ travel vibes, Git, and 🤖 a suspicious amount of AI assistance.
