# Estatein WordPress Theme

A fully responsive WordPress theme for real estate listings, built from a Figma design template.

## 📋 Table of Contents

- [Overview](#overview)
- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Setup Instructions](#setup-instructions)
- [Theme Structure](#theme-structure)
- [Documentation](#documentation)

## Overview

This is a custom WordPress theme developed for the Estatein real estate website. The theme includes:

- Custom Post Types for Properties, Testimonials, and FAQs
- Advanced Custom Fields (ACF) integration
- Fully responsive design (mobile, tablet, desktop)
- Contact and inquiry forms
- Property gallery with image navigation
- SEO optimized with meta tags and Schema.org markup

## Features

- ✅ Custom Post Types (Properties, Testimonials, FAQs)
- ✅ Advanced Custom Fields integration
- ✅ Fully responsive design
- ✅ Contact form with email functionality
- ✅ Property inquiry forms
- ✅ Image galleries with navigation
- ✅ SEO meta tags (Open Graph, Twitter Cards)
- ✅ Schema.org structured data
- ✅ Image lazy loading
- ✅ Accessibility features
- ✅ Cross-browser compatible

## Requirements

Before installing this theme, make sure you have:

- **WordPress** 5.0 or higher
- **PHP** 7.4 or higher
- **MySQL** 5.6 or higher
- **Advanced Custom Fields (ACF)** plugin (free version)

## Installation

### Option 1: Clone from GitHub

1. **Clone the repository:**
   ```bash
   git clone <your-repository-url>
   cd real-estate-2
   ```

2. **Copy the theme folder:**
   - Navigate to `app/public/wp-content/themes/`
   - Copy the `estatein` folder to your WordPress installation's `wp-content/themes/` directory
   - Or if you have a full WordPress installation, the theme is already in the correct location

### Option 2: Download as ZIP

1. Download the repository as a ZIP file
2. Extract the ZIP file
3. Navigate to `app/public/wp-content/themes/`
4. Copy the `estatein` folder to your WordPress installation's `wp-content/themes/` directory

## Setup Instructions

### Step 1: Install WordPress

If you don't have WordPress installed yet:

1. Download WordPress from [wordpress.org](https://wordpress.org/download/)
2. Set up a database for WordPress
3. Follow the WordPress installation wizard

### Step 2: Install Advanced Custom Fields Plugin

1. Log in to your WordPress admin dashboard
2. Go to **Plugins → Add New**
3. Search for "Advanced Custom Fields"
4. Click **Install Now** and then **Activate**

### Step 3: Activate the Theme

1. Go to **Appearance → Themes** in WordPress admin
2. Find "Estatein" in your themes list
3. Click **Activate**

### Step 4: Configure ACF Fields

The theme automatically registers Custom Post Types. You need to create ACF field groups:

1. Go to **Custom Fields → Field Groups** in WordPress admin
2. Create a new Field Group for **Properties** with these fields:
   - `price` (Number)
   - `no_of_bedroom` (Number)
   - `no_of_bathroom` (Number)
   - `description` (Textarea)
   - `area` (Text)
   - `location` (Text)
   - `key_features` (Repeater with Text sub-field)
   - `gallery` (Gallery)
   - Assign this field group to the "Property" post type

3. Create a Field Group for **Testimonials**:
   - `client_name` (Text)
   - `client_location` (Text)
   - `rating` (Number)
   - Assign to "Testimonial" post type

4. Create a Field Group for **FAQs**:
   - `question` (Text)
   - `answer` (Textarea)
   - Assign to "FAQ" post type

### Step 5: Create Pages

Create the following pages with these exact slugs:

1. **About Page:**
   - Slug: `/about`
   - Title: "About Us"

2. **Services Page:**
   - Slug: `/services`
   - Title: "Services"

3. **Properties Page:**
   - Slug: `/properties`
   - Title: "Properties"
   - (Or use the automatic archive at `/properties`)

4. **Contact Page:**
   - Slug: `/contact`
   - Title: "Contact"

5. **Blog Page:**
   - Slug: `/blog`
   - Title: "Blog"
   - Assign the "Blog Page" template (if available)

### Step 6: Add Content

1. **Create Properties:**
   - Go to **Properties → Add New**
   - Fill in the property details using the ACF fields
   - Add a featured image and gallery images
   - Publish

2. **Create Testimonials:**
   - Go to **Testimonials → Add New**
   - Fill in client information and rating
   - Publish

3. **Create FAQs:**
   - Go to **FAQs → Add New**
   - Add question and answer
   - Publish

4. **Create Blog Posts:**
   - Go to **Posts → Add New**
   - Write your blog posts as usual
   - Publish

### Step 7: Configure Permalinks

1. Go to **Settings → Permalinks**
2. Select **Post name** structure
3. Click **Save Changes**

This ensures your custom post types and pages work correctly.

## Local Development Setup

1. **Set up a local WordPress environment:**
   - Use XAMPP, MAMP, Local by Flywheel, or similar
   - Create a new WordPress installation

2. **Import database (if provided):**
   - If you have a `local.sql` file in `app/sql/`, import it to your database
   - Otherwise, use a fresh WordPress database

3. **Configure WordPress:**
   - Update `wp-config.php` with your database credentials
   - Access WordPress at `http://localhost` (or your configured port)

4. **Follow Steps 2-7 above** to complete the setup

## Theme Structure

```
estatein/
├── style.css              # Main stylesheet
├── functions.php          # Theme functions, Custom Post Types
├── header.php             # Header template
├── footer.php             # Footer template
├── index.php              # Homepage template
├── page-about.php         # About page template
├── page-services.php       # Services page template
├── page-properties.php     # Properties page template
├── page-contact.php        # Contact page template
├── page-blog.php          # Blog page template
├── single-property.php    # Single property template
├── archive-properties.php # Properties archive template
├── archive.php            # Blog archive template
├── js/                    # JavaScript files
│   ├── mobile-menu.js
│   └── navigation.js
├── icons/                 # SVG icons
└── images/                # Theme images
```

## Documentation

For detailed information about the development process, technical choices, and implementation details, see:

- **[DEVELOPMENT_DOCUMENTATION.md](./DEVELOPMENT_DOCUMENTATION.md)** - Development process and technical documentation
- **[TESTING_DOCUMENTATION.md](./TESTING_DOCUMENTATION.md)** - Testing procedures and results

## Support

If you encounter any issues:

1. Check that all requirements are met
2. Ensure ACF plugin is installed and activated
3. Verify permalinks are set to "Post name"
4. Check that all required pages are created with correct slugs
5. Make sure ACF field groups are properly configured

## License

This theme is developed as part of a WordPress Developer assessment project.

---

**Theme Version:** 1.0.0  
**WordPress Version:** 6.x  
**Last Updated:** 2026
