<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package real_estate
 */

get_header();
?>

<!-- Hero Section -->
<section class="estatein-hero-section" data-node-id="121:1772">
	<img src="<?php echo get_template_directory_uri(); ?>/images/hero-badge.webp" alt="Hero Badge" class="estatein-hero-badge">
	<div class="estatein-hero-container">
		<div class="estatein-hero-left">
			<div class="estatein-hero-content" data-node-id="121:1775">
				<h1 class="estatein-hero-heading" data-node-id="121:1776">Discover Your Dream Property with Estatein</h1>
				<p class="estatein-hero-subtitle" data-node-id="121:1777">Your journey to finding the perfect property begins here. Explore our listings to find the home that matches your dreams.</p>
				<div class="estatein-hero-buttons" data-node-id="121:1813">
					<a href="<?php echo esc_url( home_url( '/about' ) ); ?>" class="estatein-btn-learn" data-node-id="121:1814">Learn More</a>
					<a href="<?php echo esc_url( home_url( '/properties' ) ); ?>" class="estatein-btn-browse" data-node-id="121:1816">Browse Properties</a>
				</div>
				<div class="estatein-hero-stats" data-node-id="121:1818">
					<div class="estatein-hero-stats-row">
						<div class="estatein-stat-item" data-node-id="121:1819">
							<h3 class="estatein-stat-number" data-node-id="121:1820">200+</h3>
							<p class="estatein-stat-label" data-node-id="121:1821">Happy Customers</p>
						</div>
						<div class="estatein-stat-item" data-node-id="121:1822">
							<h3 class="estatein-stat-number" data-node-id="121:1823">10k+</h3>
							<p class="estatein-stat-label" data-node-id="121:1824">Properties for Clients</p>
						</div>
					</div>
					<div class="estatein-stat-item" data-node-id="121:1825">
						<h3 class="estatein-stat-number" data-node-id="121:1826">16+</h3>
						<p class="estatein-stat-label" data-node-id="121:1827">Years of Experience</p>
					</div>
				</div>
			</div>
		</div>
		<div class="estatein-hero-right" data-node-id="121:1828">
			<div class="estatein-hero-image-wrapper">
			<?php
			$hero_image_path = get_template_directory() . '/images/home-banner.webp';
			$hero_image_url = get_template_directory_uri() . '/images/home-banner.webp';
			
			if ( file_exists( $hero_image_path ) ) : ?>
					<img src="<?php echo esc_url( $hero_image_url ); ?>" alt="Modern buildings" class="estatein-hero-image">
				<?php elseif ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( 'large', array( 'class' => 'estatein-hero-image', 'alt' => 'Modern buildings' ) ); ?>
				<?php else : ?>
					<div class="estatein-hero-image-placeholder"></div>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<!-- Feature Cards -->
	<div class="estatein-features-grid" data-node-id="121:1890">
		<div class="estatein-feature-card" data-node-id="121:1891">
			<div class="estatein-feature-icon-wrapper" data-node-id="121:1892">
				<img src="<?php echo get_template_directory_uri(); ?>/icons/home-icon.svg" alt="Home Icon" width="34" height="34">
			</div>
			<h3 class="estatein-feature-title" data-node-id="121:1896">Find Your Dream Home</h3>
		</div>
		<div class="estatein-feature-card" data-node-id="121:1899">
			<div class="estatein-feature-icon-wrapper" data-node-id="121:1900">
				<img src="<?php echo get_template_directory_uri(); ?>/icons/camera-icon.svg" alt="Camera Icon" width="34" height="34">
			</div>
			<h3 class="estatein-feature-title" data-node-id="121:1904">Unlock Property Value</h3>
		</div>
		<div class="estatein-feature-card" data-node-id="121:1907">
			<div class="estatein-feature-icon-wrapper" data-node-id="121:1908">
				<img src="<?php echo get_template_directory_uri(); ?>/icons/building-icon.svg" alt="Building Icon" width="34" height="34">
			</div>
			<h3 class="estatein-feature-title" data-node-id="121:1912">Effortless Property Management</h3>
		</div>
		<div class="estatein-feature-card" data-node-id="121:1915">
			<div class="estatein-feature-icon-wrapper" data-node-id="121:1916">
				<img src="<?php echo get_template_directory_uri(); ?>/icons/sun-icon.svg" alt="Sun Icon" width="34" height="34">
			</div>
			<h3 class="estatein-feature-title" data-node-id="121:1920">Smart Investment, Informed Decisions</h3>
		</div>
	</div>
</section>

<!-- Featured Properties Section -->
<section class="estatein-featured-properties" data-node-id="87:1301">
	<div class="estatein-container">
		<div class="estatein-section-header" data-node-id="60:3180">
			<div class="estatein-section-text" data-node-id="46:358">
				<img src="<?php echo get_template_directory_uri(); ?>/icons/stars-abstract-design.svg" alt="Stars Icon" class="section-icon">
				<h2 class="estatein-section-title" data-node-id="46:359">Featured Properties</h2>
				<p class="estatein-section-description" data-node-id="46:360">Explore our handpicked selection of premium properties</p>
			</div>
			<a href="<?php echo esc_url( home_url( '/properties' ) ); ?>" class="estatein-view-all-btn" data-node-id="60:3178">View All Properties</a>
		</div>

		<div class="estatein-properties-grid" data-node-id="87:1274">
			<?php
			$args = array(
				'post_type'      => 'property',
				'posts_per_page' => 3,
				'post_status'    => 'publish',
				'orderby'        => 'date',
				'order'          => 'DESC',
			);

			$properties_query = new WP_Query( $args );

			if ( $properties_query->have_posts() ) :
				while ( $properties_query->have_posts() ) :
					$properties_query->the_post();
					$property_id = get_the_ID();
					$price       = get_field( 'price', $property_id );
					$bedrooms    = get_field( 'no_of_bedroom', $property_id );
					$bathrooms   = get_field( 'no_of_bathroom', $property_id );
					$property_type = get_field( 'property_type', $property_id );
					$description = get_field( 'description', $property_id );
					?>
					<div class="estatein-property-card" data-node-id="75:564">
						<div class="estatein-property-image" data-node-id="75:544">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'medium', array( 'alt' => get_the_title() ) ); ?>
							<?php else : ?>
								<div class="estatein-property-placeholder"></div>
							<?php endif; ?>
						</div>
						<div class="estatein-property-content" data-node-id="87:1215">
							<div class="estatein-property-text" data-node-id="75:563">
								<h3 class="estatein-property-title" data-node-id="75:545"><?php the_title(); ?></h3>
								<p class="estatein-property-excerpt" data-node-id="75:546">
									<?php
									$full_text = $description ? $description : get_the_excerpt();
									$trimmed_text = wp_trim_words( $full_text, 15, '' );
									if ( strlen( wp_strip_all_tags( $full_text ) ) > strlen( $trimmed_text ) ) {
										echo $trimmed_text . ' <a href="' . get_permalink() . '" class="read-more-link">Read more</a>';
									} else {
										echo $trimmed_text;
									}
									?>
								</p>
							</div>
							<div class="estatein-property-meta" data-node-id="87:1238">
								<?php if ( $bedrooms ) : ?>
									<div class="estatein-meta-item" data-node-id="87:1234">
										<img src="<?php echo get_template_directory_uri(); ?>/icons/bedroom-icon.svg" alt="Bedroom" width="24" height="24">
										<span data-node-id="87:1233"><?php echo esc_html( $bedrooms ); ?> - Bedroom</span>
									</div>
								<?php endif; ?>
								<?php if ( $bathrooms ) : ?>
									<div class="estatein-meta-item" data-node-id="87:1241">
										<img src="<?php echo get_template_directory_uri(); ?>/icons/bathroom-icon.svg" alt="Bathroom" width="24" height="24">
										<span data-node-id="87:1244"><?php echo esc_html( $bathrooms ); ?> - Bathroom</span>
									</div>
								<?php endif; ?>
								<?php if ( $property_type ) : ?>
									<div class="estatein-meta-item" data-node-id="87:1245">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none">
											<path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2" fill="none"/>
											<path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" fill="none"/>
											<path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" fill="none"/>
										</svg>
										<span data-node-id="87:1248"><?php echo esc_html( $property_type ); ?></span>
									</div>
								<?php endif; ?>
							</div>
							<div class="estatein-property-footer" data-node-id="75:557">
								<div class="estatein-property-price" data-node-id="75:558">
									<?php if ( $price ) : ?>
										<h4 class="estatein-price-amount" data-node-id="75:559">$<?php echo number_format( $price ); ?></h4>
										<p class="estatein-price-label" data-node-id="75:560">Price</p>
									<?php endif; ?>
								</div>
								<a href="<?php the_permalink(); ?>" class="estatein-property-btn" data-node-id="75:561">View Property Details</a>
							</div>
						</div>
					</div>
					<?php
				endwhile;
				wp_reset_postdata();
			else :
				?>
				<div class="estatein-no-properties">
					<p>No featured properties available at the moment.</p>
				</div>
			<?php endif; ?>
		</div>

		<div class="estatein-properties-nav" data-node-id="75:596">
			<span class="estatein-nav-text" data-node-id="75:588">01 of <?php echo $properties_query->found_posts; ?></span>
			<div class="estatein-nav-buttons" data-node-id="75:595">
				<a href="<?php echo get_post_type_archive_link('property'); ?>" class="estatein-nav-btn estatein-nav-prev" aria-label="View All Properties">
					<svg width="30" height="30" viewBox="0 0 30 30" fill="none">
						<path d="M18.75 7.5L11.25 15L18.75 22.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
				</a>
				<a href="<?php echo get_post_type_archive_link('property'); ?>" class="estatein-nav-btn estatein-nav-next" aria-label="View All Properties">
					<svg width="30" height="30" viewBox="0 0 30 30" fill="none">
						<path d="M11.25 7.5L18.75 15L11.25 22.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
				</a>
			</div>
		</div>
	</div>
</section>

<!-- Testimonials Section -->
<section class="estatein-testimonials estatein-full-width" data-node-id="75:599">
	<div class="estatein-container">
		<div class="estatein-section-header" data-node-id="75:600">
			<div class="estatein-section-text" data-node-id="75:601">
				<img src="<?php echo get_template_directory_uri(); ?>/icons/stars-abstract-design.svg" alt="Stars Icon" class="section-icon">
				<h2 class="estatein-section-title" data-node-id="75:602">What Our Clients Say</h2>
				<p class="estatein-section-description" data-node-id="75:603">Read the success stories and heartfelt testimonials from our valued clients</p>
			</div>
			<a href="<?php echo esc_url( home_url( '/testimonials' ) ); ?>" class="estatein-view-all-btn" data-node-id="75:626">View All Testimonials</a>
		</div>

		<div class="estatein-testimonials-grid" data-node-id="75:680">
			<?php
			$testimonials_args = array(
				'post_type'      => 'testimonial',
				'posts_per_page' => 3,
				'post_status'    => 'publish',
				'orderby'        => 'date',
				'order'          => 'DESC',
			);

			$testimonials_query = new WP_Query( $testimonials_args );

			if ( $testimonials_query->have_posts() ) :
				while ( $testimonials_query->have_posts() ) :
					$testimonials_query->the_post();
					$name     = get_field( 'name' );
					$location = get_field( 'location' );
					$rating   = get_field( 'rating' );
					?>
					<div class="estatein-testimonial-card" data-node-id="75:870">
						<div class="estatein-testimonial-rating" data-node-id="75:871">
							<?php for ( $i = 0; $i < $rating; $i++ ) : ?>
								<svg width="24" height="24" viewBox="0 0 24 24" fill="#FFD700" data-node-id="75:873">
									<path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/>
								</svg>
							<?php endfor; ?>
						</div>
						<div class="estatein-testimonial-content" data-node-id="75:882">
							<h3 class="estatein-testimonial-title" data-node-id="75:883"><?php echo esc_html( get_field( 'title' ) ); ?></h3>
							<p class="estatein-testimonial-text" data-node-id="75:884"><?php echo esc_html( get_field( 'description' ) ); ?></p>
						</div>
						<div class="estatein-testimonial-author" data-node-id="75:885">
							<div class="estatein-author-avatar" data-node-id="75:886">
								<?php if ( has_post_thumbnail() ) : ?>
									<?php the_post_thumbnail( 'thumbnail', array( 'alt' => $name ) ); ?>
								<?php else : ?>
									<?php echo esc_html( substr( $name, 0, 1 ) ); ?>
								<?php endif; ?>
							</div>
							<div class="estatein-author-info" data-node-id="75:887">
								<h4 class="estatein-author-name" data-node-id="75:888"><?php echo esc_html( $name ); ?></h4>
								<p class="estatein-author-location" data-node-id="75:889"><?php echo esc_html( $location ); ?></p>
							</div>
						</div>
					</div>
					<?php
				endwhile;
				wp_reset_postdata();
			else :
				?>
				<div class="estatein-no-testimonials">
					<p>No testimonials available at the moment.</p>
				</div>
			<?php endif; ?>
		</div>

		<div class="estatein-testimonials-nav" data-node-id="130:6081">
			<span class="estatein-nav-text" data-node-id="130:6082">01 of <?php echo $testimonials_query->found_posts; ?></span>
			<div class="estatein-nav-buttons" data-node-id="130:6083">
				<a href="<?php echo get_post_type_archive_link('testimonial'); ?>" class="estatein-nav-btn estatein-nav-prev" aria-label="View All Testimonials">
					<svg width="30" height="30" viewBox="0 0 30 30" fill="none">
						<path d="M18.75 7.5L11.25 15L18.75 22.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
				</a>
				<a href="<?php echo get_post_type_archive_link('testimonial'); ?>" class="estatein-nav-btn estatein-nav-next" aria-label="View All Testimonials">
					<svg width="30" height="30" viewBox="0 0 30 30" fill="none">
						<path d="M11.25 7.5L18.75 15L11.25 22.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
				</a>
			</div>
		</div>
	</div>
</section>

<!-- FAQ Section -->
<section class="estatein-faq" data-node-id="75:952">
	<div class="estatein-container">
		<div class="estatein-section-header" data-node-id="75:953">
			<div class="estatein-section-text" data-node-id="75:954">
				<h2 class="estatein-section-title" data-node-id="75:955">Frequently Asked Questions</h2>
				<p class="estatein-section-description" data-node-id="75:956">Find answers to common questions about Estatein's services, property listings, and the real estate process</p>
			</div>
			<a href="<?php echo esc_url( home_url( '/faq' ) ); ?>" class="estatein-view-all-btn" data-node-id="75:979">View All FAQ's</a>
		</div>

		<div class="estatein-faq-grid" data-node-id="78:1159">
			<?php
			$faqs_args = array(
				'post_type'      => 'faq',
				'posts_per_page' => 3,
				'post_status'    => 'publish',
				'orderby'        => 'date',
				'order'          => 'DESC',
			);

			$faqs_query = new WP_Query( $faqs_args );

			if ( $faqs_query->have_posts() ) :
				while ( $faqs_query->have_posts() ) :
					$faqs_query->the_post();
					?>
					<div class="estatein-faq-card" data-node-id="78:1175">
						<h3 class="estatein-faq-question" data-node-id="78:1176"><?php echo esc_html( get_field( 'question' ) ); ?></h3>
						<p class="estatein-faq-answer" data-node-id="78:1177"><?php echo esc_html( get_field( 'answer' ) ); ?></p>
						<a href="<?php echo esc_url( home_url( '/faq' ) ); ?>" class="estatein-faq-link" data-node-id="78:1178">Read More</a>
					</div>
					<?php
				endwhile;
				wp_reset_postdata();
			else :
				?>
				<div class="estatein-no-faqs">
					<p>No FAQs available at the moment.</p>
				</div>
			<?php endif; ?>
		</div>

		<div class="estatein-faq-nav" data-node-id="130:6090">
			<span class="estatein-nav-text" data-node-id="130:6091">01 of <?php echo $faqs_query->found_posts; ?></span>
			<div class="estatein-nav-buttons" data-node-id="130:6092">
				<button class="estatein-nav-btn estatein-nav-prev" data-node-id="130:6093" aria-label="Previous">
					<svg width="30" height="30" viewBox="0 0 30 30" fill="none">
						<path d="M18.75 7.5L11.25 15L18.75 22.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
				</button>
				<button class="estatein-nav-btn estatein-nav-next" data-node-id="130:6096" aria-label="Next">
					<svg width="30" height="30" viewBox="0 0 30 30" fill="none">
						<path d="M11.25 7.5L18.75 15L11.25 22.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
				</button>
			</div>
		</div>
	</div>
</section>

<!-- CTA Section -->
<section class="estatein-cta" data-node-id="181:2">
	<div class="estatein-container">
		<div class="estatein-cta-content" data-node-id="181:353">
			<h2 class="estatein-cta-title" data-node-id="181:354">Start Your Real Estate Journey Today</h2>
			<p class="estatein-cta-description" data-node-id="181:355">Ready to find your dream property? Explore our listings or get in touch with our team for personalized assistance.</p>
		</div>
		<a href="<?php echo esc_url( home_url( '/properties' ) ); ?>" class="estatein-cta-button" data-node-id="181:356">Explore Properties</a>
	</div>
</section>

<?php
get_footer();
