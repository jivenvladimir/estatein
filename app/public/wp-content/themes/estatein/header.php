<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package real_estate
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	
	<?php
	// SEO Meta Tags
	$site_name = get_bloginfo( 'name' );
	$site_description = get_bloginfo( 'description' );
	$current_url = ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	
	// Get page-specific meta information
	if ( is_singular() ) {
		$meta_title = get_the_title() . ' | ' . $site_name;
		$meta_description = has_excerpt() ? get_the_excerpt() : wp_trim_words( get_the_content(), 30, '...' );
		$meta_image = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'large' ) : '';
	} elseif ( is_home() || is_front_page() ) {
		$meta_title = $site_name . ' - ' . ( $site_description ? $site_description : 'Premium Real Estate Solutions' );
		$meta_description = $site_description ? $site_description : 'Discover your dream property with Estatein. Premium real estate solutions with expert guidance and personalized service.';
		$meta_image = '';
	} elseif ( is_category() ) {
		$meta_title = single_cat_title( '', false ) . ' | ' . $site_name;
		$meta_description = category_description() ? wp_strip_all_tags( category_description() ) : 'Browse ' . single_cat_title( '', false ) . ' articles on ' . $site_name;
		$meta_image = '';
	} elseif ( is_tag() ) {
		$meta_title = single_tag_title( '', false ) . ' | ' . $site_name;
		$meta_description = tag_description() ? wp_strip_all_tags( tag_description() ) : 'Browse ' . single_tag_title( '', false ) . ' articles on ' . $site_name;
		$meta_image = '';
	} elseif ( is_archive() ) {
		$meta_title = get_the_archive_title() . ' | ' . $site_name;
		$meta_description = get_the_archive_description() ? wp_strip_all_tags( get_the_archive_description() ) : 'Browse our archive on ' . $site_name;
		$meta_image = '';
	} else {
		$meta_title = wp_get_document_title();
		$meta_description = $site_description ? $site_description : 'Premium real estate solutions with expert guidance.';
		$meta_image = '';
	}
	
	// Fallback for meta image
	if ( empty( $meta_image ) ) {
		$meta_image = get_template_directory_uri() . '/images/home-banner.webp';
	}
	
	// Ensure absolute URL for meta image
	if ( ! empty( $meta_image ) && strpos( $meta_image, 'http' ) !== 0 ) {
		$meta_image = home_url( $meta_image );
	}
	
	// Clean and sanitize
	$meta_title = esc_attr( wp_strip_all_tags( $meta_title ) );
	$meta_description = esc_attr( wp_strip_all_tags( $meta_description ) );
	$meta_image = esc_url( $meta_image );
	$current_url = esc_url( $current_url );
	?>
	
	<!-- SEO Meta Tags -->
	<meta name="description" content="<?php echo $meta_description; ?>">
	
	<!-- Open Graph Meta Tags -->
	<meta property="og:type" content="<?php echo is_singular() ? 'article' : 'website'; ?>">
	<meta property="og:title" content="<?php echo $meta_title; ?>">
	<meta property="og:description" content="<?php echo $meta_description; ?>">
	<meta property="og:url" content="<?php echo $current_url; ?>">
	<meta property="og:site_name" content="<?php echo esc_attr( $site_name ); ?>">
	<?php if ( ! empty( $meta_image ) ) : ?>
	<meta property="og:image" content="<?php echo $meta_image; ?>">
	<meta property="og:image:width" content="1200">
	<meta property="og:image:height" content="630">
	<?php endif; ?>
	
	<!-- Twitter Card Meta Tags -->
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="<?php echo $meta_title; ?>">
	<meta name="twitter:description" content="<?php echo $meta_description; ?>">
	<?php if ( ! empty( $meta_image ) ) : ?>
	<meta name="twitter:image" content="<?php echo $meta_image; ?>">
	<?php endif; ?>
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;500;600;700&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'real-estate' ); ?></a>

	<header id="masthead" class="site-header" data-node-id="60:3125">
		<!-- Banner -->
		<div class="estatein-banner" data-node-id="60:3094">
			<div class="estatein-banner-content">
				<p class="estatein-banner-text" data-node-id="60:3084">✨Discover Your Dream Property with Estatein</p>
				<a href="<?php echo esc_url( home_url( '/about' ) ); ?>" class="estatein-banner-link" data-node-id="60:3085">Learn More</a>
			</div>
			<button class="estatein-banner-close" data-node-id="60:3099" aria-label="Close banner">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M18 6L6 18M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
				</svg>
			</button>
		</div>

		<!-- Navigation Bar -->
		<nav class="estatein-nav" data-node-id="60:3124">
			<div class="estatein-nav-container">
				<!-- Logo -->
				<div class="estatein-logo" data-node-id="60:3100">
					<?php if ( has_custom_logo() ) : ?>
						<?php the_custom_logo(); ?>
					<?php else : ?>
						<div class="estatein-logo-symbol" data-node-id="60:3101">
							<img src="<?php echo get_template_directory_uri(); ?>/icons/estatein-icon.svg" alt="Estatein Icon" width="34" height="34">
						</div>
						<span class="estatein-logo-text" data-node-id="60:3106">Estatein</span>
					<?php endif; ?>
				</div>

				<!-- Navigation Menu -->
				<div class="estatein-nav-menu-container" data-node-id="60:3115">
					<ul class="estatein-nav-menu">
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="<?php echo is_front_page() ? 'active' : ''; ?>" data-node-id="60:3117">Home</a></li>
						<li><a href="<?php echo esc_url( home_url( '/about' ) ); ?>" class="<?php echo is_page('about') ? 'active' : ''; ?>" data-node-id="60:3118">About Us</a></li>
						<li><a href="<?php echo esc_url( home_url( '/properties' ) ); ?>" class="<?php echo is_post_type_archive('property') || is_page('properties') ? 'active' : ''; ?>" data-node-id="60:3119">Properties</a></li>
						<li><a href="<?php echo esc_url( home_url( '/services' ) ); ?>" class="<?php echo is_page('services') ? 'active' : ''; ?>" data-node-id="60:3121">Services</a></li>
						<li><a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" class="<?php echo is_page('blog') || ( is_home() && ! is_front_page() ) || is_category() || is_tag() || is_author() || is_date() || ( is_single() && get_post_type() === 'post' ) ? 'active' : ''; ?>" data-node-id="60:3124">Blog</a></li>
					</ul>
				</div>

				<!-- Contact Button -->
				<a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="estatein-contact-btn" data-node-id="60:3122">
					<span data-node-id="60:3123">Contact Us</span>
				</a>

				<!-- Mobile Menu Toggle -->
				<button class="estatein-mobile-toggle" aria-label="Toggle menu" aria-expanded="false">
					<span></span>
					<span></span>
					<span></span>
				</button>
			</div>
		</nav>
	</header><!-- #masthead -->
