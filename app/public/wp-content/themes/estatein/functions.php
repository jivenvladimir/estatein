<?php
/**
 * real estate functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package real_estate
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function real_estate_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on real estate, use a find and replace
		* to change 'real-estate' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'real-estate', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'real-estate' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'real_estate_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'real_estate_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function real_estate_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'real_estate_content_width', 640 );
}
add_action( 'after_setup_theme', 'real_estate_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function real_estate_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'real-estate' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'real-estate' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'real_estate_widgets_init' );

/**
 * Enqueue scripts and styles.
 *
 * Enqueues theme stylesheets and JavaScript files.
 * Includes navigation script and mobile menu functionality.
 *
 * @return void
 */
function real_estate_scripts() {
	wp_enqueue_style( 'real-estate-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'real-estate-style', 'rtl', 'replace' );

	// Enqueue scripts with defer for performance
	wp_enqueue_script( 'real-estate-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_script_add_data( 'real-estate-navigation', 'defer', true );
	
	wp_enqueue_script( 'estatein-mobile-menu', get_template_directory_uri() . '/js/mobile-menu.js', array(), _S_VERSION, true );
	wp_script_add_data( 'estatein-mobile-menu', 'defer', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
		wp_script_add_data( 'comment-reply', 'defer', true );
	}
}
add_action( 'wp_enqueue_scripts', 'real_estate_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Add lazy loading to images for performance optimization
 *
 * @param string $image The image HTML tag.
 * @param string $context The context in which the image is being used.
 * @return string Modified image HTML with lazy loading attribute.
 */
function estatein_add_lazy_loading_to_images( $image, $context ) {
	// Skip if image already has loading attribute
	if ( strpos( $image, 'loading=' ) !== false ) {
		return $image;
	}
	
	// Skip hero images and above-the-fold images
	if ( in_array( $context, array( 'the_post_thumbnail', 'post-thumbnail' ), true ) && is_front_page() ) {
		// First image on homepage should load immediately
		return $image;
	}
	
	// Add lazy loading attribute
	$image = str_replace( '<img', '<img loading="lazy"', $image );
	
	return $image;
}
add_filter( 'wp_get_attachment_image', 'estatein_add_lazy_loading_to_images', 10, 2 );
add_filter( 'the_content', function( $content ) {
	return preg_replace( '/<img\s+([^>]*?)>/i', '<img $1 loading="lazy">', $content );
}, 10, 1 );

/**
 * Handle contact form submission
 *
 * Processes the contact form submission, validates input, sends email,
 * and redirects with success/error messages.
 *
 * @return void
 */
function estatein_handle_contact_form() {
	// Check if form was submitted
	if ( ! isset( $_POST['estatein_contact_submit'] ) ) {
		return;
	}

	// Verify nonce
	if ( ! isset( $_POST['estatein_contact_nonce'] ) || ! wp_verify_nonce( $_POST['estatein_contact_nonce'], 'estatein_contact_form' ) ) {
		wp_die( 'Security check failed', 'Error', array( 'back_link' => true ) );
	}

	// Sanitize form data
	$first_name   = isset( $_POST['first_name'] ) ? sanitize_text_field( $_POST['first_name'] ) : '';
	$last_name    = isset( $_POST['last_name'] ) ? sanitize_text_field( $_POST['last_name'] ) : '';
	$email        = isset( $_POST['email'] ) ? sanitize_email( $_POST['email'] ) : '';
	$phone        = isset( $_POST['phone'] ) ? sanitize_text_field( $_POST['phone'] ) : '';
	$inquiry_type = isset( $_POST['inquiry_type'] ) ? sanitize_text_field( $_POST['inquiry_type'] ) : '';
	$hear_about   = isset( $_POST['hear_about'] ) ? sanitize_text_field( $_POST['hear_about'] ) : '';
	$message      = isset( $_POST['message'] ) ? sanitize_textarea_field( $_POST['message'] ) : '';
	$terms        = isset( $_POST['terms'] ) ? true : false;

	// Validate required fields
	if ( empty( $first_name ) || empty( $last_name ) || empty( $email ) || empty( $phone ) || empty( $inquiry_type ) || empty( $hear_about ) || empty( $message ) || ! $terms ) {
		set_transient( 'estatein_contact_error', 'Please fill in all required fields and accept the terms.', 30 );
		return;
	}

	// Validate email
	if ( ! is_email( $email ) ) {
		set_transient( 'estatein_contact_error', 'Please enter a valid email address.', 30 );
		return;
	}

	// Prepare email content
	$admin_email = get_option( 'admin_email' );
	$site_name   = get_bloginfo( 'name' );
	$subject     = sprintf( 'New Contact Form Submission from %s %s', $first_name, $last_name );

	$email_body = "New contact form submission from {$site_name}\n\n";
	$email_body .= "Name: {$first_name} {$last_name}\n";
	$email_body .= "Email: {$email}\n";
	$email_body .= "Phone: {$phone}\n";
	$email_body .= "Inquiry Type: {$inquiry_type}\n";
	$email_body .= "How did you hear about us: {$hear_about}\n\n";
	$email_body .= "Message:\n{$message}\n";

	// Set email headers
	$headers = array(
		'Content-Type: text/plain; charset=UTF-8',
		"From: {$site_name} <{$admin_email}>",
		"Reply-To: {$first_name} {$last_name} <{$email}>",
	);

	// Send email
	$mail_sent = wp_mail( $admin_email, $subject, $email_body, $headers );

	if ( $mail_sent ) {
		set_transient( 'estatein_contact_success', 'Thank you for your message! We will get back to you soon.', 30 );
	} else {
		set_transient( 'estatein_contact_error', 'Sorry, there was an error sending your message. Please try again later.', 30 );
	}

	// Redirect to prevent form resubmission
	wp_safe_redirect( add_query_arg( 'contact', 'sent', wp_get_referer() ) );
	exit;
}
add_action( 'admin_post_nopriv_estatein_contact_form', 'estatein_handle_contact_form' );
add_action( 'admin_post_estatein_contact_form', 'estatein_handle_contact_form' );

/**
 * Handle property inquire form submission
 *
 * Processes property inquiry form submissions, validates input,
 * sends email with property details, and redirects with messages.
 *
 * @return void
 */
function estatein_handle_inquire_form() {
	// Check if form was submitted
	if ( ! isset( $_POST['estatein_inquire_nonce'] ) ) {
		return;
	}

	// Verify nonce
	if ( ! wp_verify_nonce( $_POST['estatein_inquire_nonce'], 'estatein_inquire_form' ) ) {
		wp_die( 'Security check failed', 'Error', array( 'back_link' => true ) );
	}

	// Sanitize form data
	$first_name    = isset( $_POST['first_name'] ) ? sanitize_text_field( $_POST['first_name'] ) : '';
	$last_name     = isset( $_POST['last_name'] ) ? sanitize_text_field( $_POST['last_name'] ) : '';
	$email         = isset( $_POST['email'] ) ? sanitize_email( $_POST['email'] ) : '';
	$phone         = isset( $_POST['phone'] ) ? sanitize_text_field( $_POST['phone'] ) : '';
	$message       = isset( $_POST['message'] ) ? sanitize_textarea_field( $_POST['message'] ) : '';
	$property_id   = isset( $_POST['property_id'] ) ? intval( $_POST['property_id'] ) : 0;
	$property_title = isset( $_POST['property_title'] ) ? sanitize_text_field( $_POST['property_title'] ) : '';
	$terms         = isset( $_POST['terms'] ) ? true : false;

	// Validate required fields
	if ( empty( $first_name ) || empty( $last_name ) || empty( $email ) || empty( $phone ) || empty( $message ) || ! $terms ) {
		set_transient( 'estatein_inquire_error', 'Please fill in all required fields and accept the terms.', 30 );
		wp_safe_redirect( wp_get_referer() );
		exit;
	}

	// Validate email
	if ( ! is_email( $email ) ) {
		set_transient( 'estatein_inquire_error', 'Please enter a valid email address.', 30 );
		wp_safe_redirect( wp_get_referer() );
		exit;
	}

	// Prepare email content
	$admin_email = get_option( 'admin_email' );
	$site_name   = get_bloginfo( 'name' );
	$subject     = sprintf( 'New Property Inquiry: %s', $property_title );

	$email_body = "New property inquiry from {$site_name}\n\n";
	$email_body .= "Property: {$property_title}\n";
	if ( $property_id ) {
		$property_url = get_permalink( $property_id );
		$email_body .= "Property URL: {$property_url}\n";
	}
	$email_body .= "\n";
	$email_body .= "Name: {$first_name} {$last_name}\n";
	$email_body .= "Email: {$email}\n";
	$email_body .= "Phone: {$phone}\n\n";
	$email_body .= "Message:\n{$message}\n";

	// Set email headers
	$headers = array(
		'Content-Type: text/plain; charset=UTF-8',
		"From: {$site_name} <{$admin_email}>",
		"Reply-To: {$first_name} {$last_name} <{$email}>",
	);

	// Send email
	$mail_sent = wp_mail( $admin_email, $subject, $email_body, $headers );

	if ( $mail_sent ) {
		set_transient( 'estatein_inquire_success', 'Thank you for your inquiry! We will get back to you soon.', 30 );
	} else {
		set_transient( 'estatein_inquire_error', 'Sorry, there was an error sending your inquiry. Please try again later.', 30 );
	}

	// Redirect to prevent form resubmission
	wp_safe_redirect( wp_get_referer() );
	exit;
}
add_action( 'admin_post_nopriv_estatein_inquire_form', 'estatein_handle_inquire_form' );
add_action( 'admin_post_estatein_inquire_form', 'estatein_handle_inquire_form' );

/**
 * Register Custom Post Type: Property
 *
 * Registers the 'property' custom post type for real estate listings
 * with support for title, editor, thumbnail, excerpt, and custom fields.
 *
 * @return void
 */
function estatein_register_property_post_type() {
	$labels = array(
		'name'                  => _x( 'Properties', 'Post Type General Name', 'real-estate' ),
		'singular_name'         => _x( 'Property', 'Post Type Singular Name', 'real-estate' ),
		'menu_name'             => __( 'Properties', 'real-estate' ),
		'name_admin_bar'        => __( 'Property', 'real-estate' ),
		'archives'              => __( 'Property Archives', 'real-estate' ),
		'attributes'            => __( 'Property Attributes', 'real-estate' ),
		'parent_item_colon'     => __( 'Parent Property:', 'real-estate' ),
		'all_items'             => __( 'All Properties', 'real-estate' ),
		'add_new_item'          => __( 'Add New Property', 'real-estate' ),
		'add_new'               => __( 'Add New', 'real-estate' ),
		'new_item'              => __( 'New Property', 'real-estate' ),
		'edit_item'             => __( 'Edit Property', 'real-estate' ),
		'update_item'           => __( 'Update Property', 'real-estate' ),
		'view_item'             => __( 'View Property', 'real-estate' ),
		'view_items'            => __( 'View Properties', 'real-estate' ),
		'search_items'          => __( 'Search Property', 'real-estate' ),
		'not_found'             => __( 'Not found', 'real-estate' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'real-estate' ),
		'featured_image'        => __( 'Property Image', 'real-estate' ),
		'set_featured_image'    => __( 'Set property image', 'real-estate' ),
		'remove_featured_image' => __( 'Remove property image', 'real-estate' ),
		'use_featured_image'    => __( 'Use as property image', 'real-estate' ),
		'insert_into_item'      => __( 'Insert into property', 'real-estate' ),
		'uploaded_to_this_item' => __( 'Uploaded to this property', 'real-estate' ),
		'items_list'            => __( 'Properties list', 'real-estate' ),
		'items_list_navigation' => __( 'Properties list navigation', 'real-estate' ),
		'filter_items_list'     => __( 'Filter properties list', 'real-estate' ),
	);

	$args = array(
		'label'                 => __( 'Property', 'real-estate' ),
		'description'           => __( 'Real estate properties', 'real-estate' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
		'taxonomies'            => array( 'property_type' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-building',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
		'rewrite'               => array( 'slug' => 'properties', 'with_front' => false ),
	);

	register_post_type( 'property', $args );
}
add_action( 'init', 'estatein_register_property_post_type', 0 );

/**
 * Force archive-properties.php template for property post type archive
 *
 * Ensures the custom archive template is used for property post type archives
 * instead of the default archive template.
 *
 * @param string $template The path to the template file.
 * @return string The path to the template file.
 */
function estatein_force_properties_archive_template( $template ) {
	if ( is_post_type_archive( 'property' ) ) {
		$new_template = locate_template( array( 'archive-properties.php' ) );
		if ( ! empty( $new_template ) ) {
			return $new_template;
		}
	}
	return $template;
}
add_filter( 'template_include', 'estatein_force_properties_archive_template', 99 );

/**
 * Register Custom Taxonomy: Property Type
 *
 * Registers the 'property_type' taxonomy for categorizing properties
 * (e.g., House, Apartment, Villa, etc.).
 *
 * @return void
 */
function estatein_register_property_type_taxonomy() {
	$labels = array(
		'name'                       => _x( 'Property Types', 'Taxonomy General Name', 'real-estate' ),
		'singular_name'              => _x( 'Property Type', 'Taxonomy Singular Name', 'real-estate' ),
		'menu_name'                  => __( 'Property Types', 'real-estate' ),
		'all_items'                  => __( 'All Property Types', 'real-estate' ),
		'parent_item'                => __( 'Parent Property Type', 'real-estate' ),
		'parent_item_colon'          => __( 'Parent Property Type:', 'real-estate' ),
		'new_item_name'              => __( 'New Property Type Name', 'real-estate' ),
		'add_new_item'               => __( 'Add New Property Type', 'real-estate' ),
		'edit_item'                  => __( 'Edit Property Type', 'real-estate' ),
		'update_item'                => __( 'Update Property Type', 'real-estate' ),
		'view_item'                  => __( 'View Property Type', 'real-estate' ),
		'separate_items_with_commas' => __( 'Separate property types with commas', 'real-estate' ),
		'add_or_remove_items'        => __( 'Add or remove property types', 'real-estate' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'real-estate' ),
		'popular_items'              => __( 'Popular Property Types', 'real-estate' ),
		'search_items'               => __( 'Search Property Types', 'real-estate' ),
		'not_found'                  => __( 'Not Found', 'real-estate' ),
		'no_terms'                   => __( 'No property types', 'real-estate' ),
		'items_list'                 => __( 'Property types list', 'real-estate' ),
		'items_list_navigation'      => __( 'Property types list navigation', 'real-estate' ),
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
		'rewrite'                    => array( 'slug' => 'property-type' ),
	);

	register_taxonomy( 'property_type', array( 'property' ), $args );
}
add_action( 'init', 'estatein_register_property_type_taxonomy', 0 );

/**
 * Register Custom Post Type: Testimonial
 *
 * Registers the 'testimonial' custom post type for client testimonials
 * with support for title, editor, thumbnail, excerpt, and custom fields.
 *
 * @return void
 */
function estatein_register_testimonial_post_type() {
	$labels = array(
		'name'                  => _x( 'Testimonials', 'Post Type General Name', 'real-estate' ),
		'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'real-estate' ),
		'menu_name'             => __( 'Testimonials', 'real-estate' ),
		'name_admin_bar'        => __( 'Testimonial', 'real-estate' ),
		'archives'              => __( 'Testimonial Archives', 'real-estate' ),
		'attributes'            => __( 'Testimonial Attributes', 'real-estate' ),
		'parent_item_colon'     => __( 'Parent Testimonial:', 'real-estate' ),
		'all_items'             => __( 'All Testimonials', 'real-estate' ),
		'add_new_item'          => __( 'Add New Testimonial', 'real-estate' ),
		'add_new'               => __( 'Add New', 'real-estate' ),
		'new_item'              => __( 'New Testimonial', 'real-estate' ),
		'edit_item'             => __( 'Edit Testimonial', 'real-estate' ),
		'update_item'           => __( 'Update Testimonial', 'real-estate' ),
		'view_item'             => __( 'View Testimonial', 'real-estate' ),
		'view_items'            => __( 'View Testimonials', 'real-estate' ),
		'search_items'          => __( 'Search Testimonial', 'real-estate' ),
		'not_found'             => __( 'Not found', 'real-estate' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'real-estate' ),
		'featured_image'        => __( 'Testimonial Image', 'real-estate' ),
		'set_featured_image'    => __( 'Set testimonial image', 'real-estate' ),
		'remove_featured_image' => __( 'Remove testimonial image', 'real-estate' ),
		'use_featured_image'    => __( 'Use as testimonial image', 'real-estate' ),
		'insert_into_item'      => __( 'Insert into testimonial', 'real-estate' ),
		'uploaded_to_this_item' => __( 'Uploaded to this testimonial', 'real-estate' ),
		'items_list'            => __( 'Testimonials list', 'real-estate' ),
		'items_list_navigation' => __( 'Testimonials list navigation', 'real-estate' ),
		'filter_items_list'     => __( 'Filter testimonials list', 'real-estate' ),
	);

	$args = array(
		'label'                 => __( 'Testimonial', 'real-estate' ),
		'description'           => __( 'Customer testimonials', 'real-estate' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 6,
		'menu_icon'             => 'dashicons-testimonial',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
		'rewrite'               => array( 'slug' => 'testimonials', 'with_front' => false ),
	);

	register_post_type( 'testimonial', $args );
}
add_action( 'init', 'estatein_register_testimonial_post_type', 0 );

/**
 * Register Custom Post Type: FAQ
 *
 * Registers the 'faq' custom post type for frequently asked questions
 * with support for title, editor, thumbnail, excerpt, and custom fields.
 *
 * @return void
 */
function estatein_register_faq_post_type() {
	$labels = array(
		'name'                  => _x( 'FAQs', 'Post Type General Name', 'real-estate' ),
		'singular_name'         => _x( 'FAQ', 'Post Type Singular Name', 'real-estate' ),
		'menu_name'             => __( 'FAQs', 'real-estate' ),
		'name_admin_bar'        => __( 'FAQ', 'real-estate' ),
		'archives'              => __( 'FAQ Archives', 'real-estate' ),
		'attributes'            => __( 'FAQ Attributes', 'real-estate' ),
		'parent_item_colon'     => __( 'Parent FAQ:', 'real-estate' ),
		'all_items'             => __( 'All FAQs', 'real-estate' ),
		'add_new_item'          => __( 'Add New FAQ', 'real-estate' ),
		'add_new'               => __( 'Add New', 'real-estate' ),
		'new_item'              => __( 'New FAQ', 'real-estate' ),
		'edit_item'             => __( 'Edit FAQ', 'real-estate' ),
		'update_item'           => __( 'Update FAQ', 'real-estate' ),
		'view_item'             => __( 'View FAQ', 'real-estate' ),
		'view_items'            => __( 'View FAQs', 'real-estate' ),
		'search_items'          => __( 'Search FAQ', 'real-estate' ),
		'not_found'             => __( 'Not found', 'real-estate' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'real-estate' ),
		'featured_image'        => __( 'FAQ Image', 'real-estate' ),
		'set_featured_image'    => __( 'Set FAQ image', 'real-estate' ),
		'remove_featured_image' => __( 'Remove FAQ image', 'real-estate' ),
		'use_featured_image'    => __( 'Use as FAQ image', 'real-estate' ),
		'insert_into_item'      => __( 'Insert into FAQ', 'real-estate' ),
		'uploaded_to_this_item' => __( 'Uploaded to this FAQ', 'real-estate' ),
		'items_list'            => __( 'FAQs list', 'real-estate' ),
		'items_list_navigation' => __( 'FAQs list navigation', 'real-estate' ),
		'filter_items_list'     => __( 'Filter FAQs list', 'real-estate' ),
	);

	$args = array(
		'label'                 => __( 'FAQ', 'real-estate' ),
		'description'           => __( 'Frequently asked questions', 'real-estate' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 7,
		'menu_icon'             => 'dashicons-editor-help',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
		'rewrite'               => array( 'slug' => 'faqs', 'with_front' => false ),
	);

	register_post_type( 'faq', $args );
}
add_action( 'init', 'estatein_register_faq_post_type', 0 );

/**
 * Add Schema.org structured data for SEO
 *
 * Outputs JSON-LD structured data for Organization and Website
 * to improve search engine understanding of the site.
 *
 * @return void
 */
function estatein_add_schema_markup() {
	$site_name = get_bloginfo( 'name' );
	$site_url = home_url();
	$site_description = get_bloginfo( 'description' );
	
	// Organization Schema
	$organization_schema = array(
		'@context' => 'https://schema.org',
		'@type' => 'RealEstateAgent',
		'name' => $site_name,
		'url' => $site_url,
		'description' => $site_description ? $site_description : 'Premium real estate solutions with expert guidance.',
		'logo' => has_custom_logo() ? wp_get_attachment_image_url( get_theme_mod( 'custom_logo' ), 'full' ) : get_template_directory_uri() . '/icons/estatein-icon.svg',
	);
	
	// Website Schema
	$website_schema = array(
		'@context' => 'https://schema.org',
		'@type' => 'WebSite',
		'name' => $site_name,
		'url' => $site_url,
		'description' => $site_description ? $site_description : 'Premium real estate solutions with expert guidance.',
	);
	
	// Property Schema (for single property pages)
	if ( is_singular( 'property' ) ) {
		$property_price = get_field( 'price' );
		$property_location = get_field( 'location' );
		$property_bedrooms = get_field( 'bedrooms' );
		$property_bathrooms = get_field( 'bathrooms' );
		$property_area = get_field( 'area' );
		
		$property_schema = array(
			'@context' => 'https://schema.org',
			'@type' => 'RealEstateListing',
			'name' => get_the_title(),
			'description' => has_excerpt() ? get_the_excerpt() : wp_trim_words( get_the_content(), 30, '...' ),
			'url' => get_permalink(),
			'image' => has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'large' ) : '',
		);
		
		if ( $property_price ) {
			$property_schema['price'] = array(
				'@type' => 'PriceSpecification',
				'price' => preg_replace( '/[^0-9]/', '', $property_price ),
				'priceCurrency' => 'USD',
			);
		}
		
		if ( $property_location ) {
			$property_schema['address'] = array(
				'@type' => 'PostalAddress',
				'addressLocality' => $property_location,
			);
		}
		
		if ( $property_bedrooms ) {
			$property_schema['numberOfBedrooms'] = $property_bedrooms;
		}
		
		if ( $property_bathrooms ) {
			$property_schema['numberOfBathroomsTotal'] = $property_bathrooms;
		}
		
		if ( $property_area ) {
			$property_schema['floorSize'] = array(
				'@type' => 'QuantitativeValue',
				'value' => preg_replace( '/[^0-9]/', '', $property_area ),
				'unitCode' => 'SQM',
			);
		}
		
		echo '<script type="application/ld+json">' . wp_json_encode( $property_schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . '</script>' . "\n";
	}
	
	// Output schemas
	echo '<script type="application/ld+json">' . wp_json_encode( $organization_schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . '</script>' . "\n";
	echo '<script type="application/ld+json">' . wp_json_encode( $website_schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . '</script>' . "\n";
}
add_action( 'wp_head', 'estatein_add_schema_markup', 5 );

/**
 * Add responsive image support
 *
 * Adds srcset and sizes attributes to images for responsive loading.
 * This improves performance by loading appropriately sized images.
 *
 * @param array  $attr       Attributes for the image markup.
 * @param object $attachment Image attachment post object.
 * @param string $size       Image size.
 * @return array Modified attributes.
 */
function estatein_add_responsive_image_attributes( $attr, $attachment, $size ) {
	// Ensure srcset is added for better responsive images
	if ( ! isset( $attr['srcset'] ) ) {
		$image_meta = wp_get_attachment_metadata( $attachment->ID );
		if ( $image_meta ) {
			$srcset = wp_calculate_image_srcset( array( $attachment->ID ), $size, $image_meta );
			if ( $srcset ) {
				$attr['srcset'] = $srcset;
				$attr['sizes'] = '(max-width: 768px) 100vw, (max-width: 1024px) 50vw, 33vw';
			}
		}
	}
	
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'estatein_add_responsive_image_attributes', 10, 3 );

/**
 * Add defer attribute to script tags
 *
 * Adds defer attribute to non-critical scripts for better performance.
 *
 * @param string $tag    The script tag.
 * @param string $handle The script handle.
 * @param string $src    The script source.
 * @return string Modified script tag.
 */
function estatein_add_defer_to_scripts( $tag, $handle, $src ) {
	$defer_scripts = array( 'real-estate-navigation', 'estatein-mobile-menu', 'comment-reply' );
	
	if ( in_array( $handle, $defer_scripts, true ) ) {
		return str_replace( ' src', ' defer src', $tag );
	}
	
	return $tag;
}
add_filter( 'script_loader_tag', 'estatein_add_defer_to_scripts', 10, 3 );

/**
 * Safely get attachment image with error handling
 *
 * Wraps wp_get_attachment_image with comprehensive validation to prevent
 * warnings from corrupted or incomplete image metadata.
 *
 * @param int   $attachment_id Image attachment ID.
 * @param string $size          Image size.
 * @param bool   $icon          Whether to use icon.
 * @param array  $attr          Image attributes.
 * @return string|false Image HTML or false on failure.
 */
function estatein_safe_get_attachment_image( $attachment_id, $size = 'thumbnail', $icon = false, $attr = array() ) {
	// Verify attachment exists
	if ( ! $attachment_id || ! is_numeric( $attachment_id ) ) {
		return false;
	}
	
	$attachment_id = (int) $attachment_id;
	
	if ( ! wp_attachment_is_image( $attachment_id ) ) {
		return false;
	}
	
	// Check if attachment post exists
	$attachment = get_post( $attachment_id );
	if ( ! $attachment || 'attachment' !== $attachment->post_type ) {
		return false;
	}
	
	// Check if metadata exists and has required structure
	$metadata = wp_get_attachment_metadata( $attachment_id );
	if ( ! $metadata || ! is_array( $metadata ) ) {
		return false;
	}
	
	// Check if file path exists
	$file = get_attached_file( $attachment_id );
	if ( ! $file || ! file_exists( $file ) ) {
		return false;
	}
	
	// Suppress warnings from potentially corrupted metadata
	// This prevents "Undefined array key" errors in media.php
	$image_html = @wp_get_attachment_image( $attachment_id, $size, $icon, $attr );
	
	return $image_html ? $image_html : false;
}
