<?php
/**
 * The template for displaying Properties archive pages
 * Updated: Properties page with new form design
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package real_estate
 */

get_header();
?>

<main id="primary" class="site-main">

	<!-- Hero Search Section -->
	<section class="estatein-properties-hero" data-node-id="97:8358">
		<div class="estatein-container">
			<div class="estatein-properties-hero-content">
				<div class="estatein-properties-text-container" data-node-id="97:7382">
					<h1 class="estatein-properties-heading" data-node-id="97:7383">Find Your Dream Property</h1>
					<p class="estatein-properties-subtitle" data-node-id="97:7384">Welcome to Estatein, where your dream property awaits in every corner of our beautiful world. Explore our curated selection of properties, each offering a unique story and a chance to redefine your life. With categories to suit every dreamer, your journey</p>
				</div>

				<div class="estatein-properties-search-section" data-node-id="97:8353">
					<div class="estatein-search-main" data-node-id="97:8354">
						<div class="estatein-search-input-field" data-node-id="97:8340">
							<input type="text" placeholder="Search For A Property" class="estatein-search-input" data-node-id="97:8357">
							<button type="submit" class="estatein-search-button" data-node-id="97:8351">
								<span class="estatein-search-icon">🔍</span>
								<span class="estatein-search-button-text" data-node-id="97:8352">Find Property</span>
							</button>
						</div>
					</div>

					<div class="estatein-filters-container" data-node-id="97:8314">
						<div class="estatein-filter-field" data-node-id="97:8273">
							<div class="estatein-filter-content" data-node-id="97:8265">
								<span class="estatein-filter-icon">📍</span>
								<span class="estatein-filter-divider"></span>
								<span class="estatein-filter-text" data-node-id="97:8264">Location</span>
							</div>
							<button class="estatein-filter-dropdown" data-node-id="97:8272">
								<span class="estatein-dropdown-icon">▼</span>
							</button>
						</div>

						<div class="estatein-filter-field" data-node-id="97:8274">
							<div class="estatein-filter-content" data-node-id="97:8275">
								<span class="estatein-filter-icon">🏠</span>
								<span class="estatein-filter-divider"></span>
								<span class="estatein-filter-text" data-node-id="97:8278">Property Type</span>
							</div>
							<button class="estatein-filter-dropdown" data-node-id="97:8328">
								<span class="estatein-dropdown-icon">▼</span>
							</button>
						</div>

						<div class="estatein-filter-field" data-node-id="97:8282">
							<div class="estatein-filter-content" data-node-id="97:8283">
								<span class="estatein-filter-icon">💰</span>
								<span class="estatein-filter-divider"></span>
								<span class="estatein-filter-text" data-node-id="97:8286">Pricing Range</span>
							</div>
							<button class="estatein-filter-dropdown" data-node-id="97:8337">
								<span class="estatein-dropdown-icon">▼</span>
							</button>
						</div>

						<div class="estatein-filter-field" data-node-id="97:8306">
							<div class="estatein-filter-content" data-node-id="97:8307">
								<span class="estatein-filter-icon">📐</span>
								<span class="estatein-filter-divider"></span>
								<span class="estatein-filter-text" data-node-id="97:8310">Property Size</span>
							</div>
							<button class="estatein-filter-dropdown" data-node-id="97:8334">
								<span class="estatein-dropdown-icon">▼</span>
							</button>
						</div>

						<div class="estatein-filter-field" data-node-id="97:8315">
							<div class="estatein-filter-content" data-node-id="97:8316">
								<span class="estatein-filter-icon">📅</span>
								<span class="estatein-filter-divider"></span>
								<span class="estatein-filter-text" data-node-id="97:8319">Build Year</span>
							</div>
							<button class="estatein-filter-dropdown" data-node-id="97:8331">
								<span class="estatein-dropdown-icon">▼</span>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Properties Listing Section -->
	<section class="estatein-properties-listing" data-node-id="97:8359">
		<div class="estatein-container">
			<div class="estatein-properties-listing-content">
				<div class="estatein-properties-listing-header" data-node-id="181:3486">
					<h2 class="estatein-properties-listing-title" data-node-id="181:3487">Discover a World of Possibilities</h2>
					<p class="estatein-properties-listing-subtitle" data-node-id="181:3488">Our portfolio of properties is as diverse as your dreams. Explore the following categories to find the perfect property that resonates with your vision of home</p>
				</div>

				<div class="estatein-properties-grid-section" data-node-id="97:8445">
					<div class="estatein-properties-grid" data-node-id="97:8446">
						<?php
						if ( have_posts() ) :
							while ( have_posts() ) :
								the_post();
								$property_id = get_the_ID();
								$price = get_field('price', $property_id);
								$bedrooms = get_field('no_of_bedroom', $property_id);
								$bathrooms = get_field('no_of_bathroom', $property_id);
								$description = get_field('description', $property_id);
								$property_type = get_the_terms($property_id, 'property_type');
								$property_type_name = $property_type && !is_wp_error($property_type) ? $property_type[0]->name : 'Property';
						?>

						<div class="estatein-property-listing-card" data-node-id="97:8536">
							<div class="estatein-property-listing-image" data-node-id="97:8537">
								<?php if (has_post_thumbnail()) : ?>
									<?php the_post_thumbnail('large', array('alt' => get_the_title(), 'class' => 'estatein-property-image')); ?>
								<?php else : ?>
									<div class="estatein-property-image-placeholder"></div>
								<?php endif; ?>
							</div>

							<div class="estatein-property-listing-content" data-node-id="97:8538">
								<div class="estatein-property-listing-top" data-node-id="97:8539">
									<div class="estatein-property-category-badge" data-node-id="97:8540">
										<span class="estatein-category-text" data-node-id="97:8541"><?php echo esc_html($property_type_name); ?></span>
									</div>
									<div class="estatein-property-listing-text" data-node-id="97:8542">
										<h3 class="estatein-property-listing-title" data-node-id="97:8543"><?php the_title(); ?></h3>
										<p class="estatein-property-listing-excerpt" data-node-id="97:8544">
											<?php 
											if ($description) {
												$trimmed = wp_trim_words($description, 20, '');
												echo esc_html($trimmed) . '... <a href="' . get_permalink() . '" class="read-more-link">Read More</a>';
											} else {
												$trimmed = wp_trim_words(get_the_excerpt(), 20, '');
												echo esc_html($trimmed) . '... <a href="' . get_permalink() . '" class="read-more-link">Read More</a>';
											}
											?>
										</p>
									</div>
								</div>

								<div class="estatein-property-listing-bottom" data-node-id="97:8545">
									<div class="estatein-property-price-container" data-node-id="97:8546">
										<span class="estatein-price-label" data-node-id="97:8547">Price</span>
										<span class="estatein-price-value" data-node-id="97:8548">
											<?php if ($price) : ?>
												$<?php echo number_format($price); ?>
											<?php else : ?>
												Contact Us
											<?php endif; ?>
										</span>
									</div>
									<a href="<?php the_permalink(); ?>" class="estatein-property-listing-button" data-node-id="97:8549">
										<span class="estatein-button-text" data-node-id="97:8550">View Property Details</span>
									</a>
								</div>
							</div>
						</div>

						<?php
							endwhile;
						?>
					</div>

					<div class="estatein-properties-pagination" data-node-id="130:6163">
						<div class="estatein-pagination-info" data-node-id="130:6164">
							<?php
							global $wp_query;
							$paged = get_query_var('paged') ? get_query_var('paged') : 1;
							$total_pages = $wp_query->max_num_pages;
							?>
							<span class="estatein-page-number"><?php echo str_pad($paged, 2, '0', STR_PAD_LEFT); ?></span>
							<span class="estatein-page-of"> of <?php echo str_pad($total_pages, 2, '0', STR_PAD_LEFT); ?></span>
						</div>
						<div class="estatein-pagination-buttons" data-node-id="130:6165">
							<?php
							if ($paged > 1) :
							?>
							<a href="<?php echo get_pagenum_link($paged - 1); ?>" class="estatein-pagination-button estatein-pagination-prev" data-node-id="130:6166">
								<span class="estatein-pagination-icon">←</span>
							</a>
							<?php endif; ?>
							
							<?php
							if ($paged < $total_pages) :
							?>
							<a href="<?php echo get_pagenum_link($paged + 1); ?>" class="estatein-pagination-button estatein-pagination-next" data-node-id="130:6169">
								<span class="estatein-pagination-icon">→</span>
							</a>
							<?php endif; ?>
						</div>
					</div>
					<?php
					else :
					?>
					<div class="estatein-no-properties">
						<p>No properties found. Please try adjusting your search filters.</p>
					</div>
					<?php
					endif;
					?>
				</div>
			</div>
		</div>
	</section>

	<?php
	// Contact Form Section
	?>
	<section class="estatein-properties-contact" data-node-id="97:8161">
		<div class="estatein-container">
			<div class="estatein-contact-header" data-node-id="97:8581">
				<h2 class="estatein-contact-title" data-node-id="97:8582">Let's Make it Happen</h2>
				<p class="estatein-contact-subtitle" data-node-id="97:8583">Ready to take the first step toward your dream property? Fill out the form below, and our real estate wizards will work their magic to find your perfect match. Don't wait; let's embark on this exciting journey together.</p>
			</div>

			<div class="estatein-contact-form-wrapper" data-node-id="97:8611">
				<form class="estatein-contact-form" data-node-id="97:8612">
					<div class="estatein-form-row" data-node-id="97:8613">
						<div class="estatein-form-field" data-node-id="97:8614">
							<label class="estatein-form-label" data-node-id="97:8615">First Name</label>
							<input type="text" class="estatein-form-input" placeholder="Enter First Name" data-node-id="97:8617">
						</div>
						<div class="estatein-form-field" data-node-id="97:8618">
							<label class="estatein-form-label" data-node-id="97:8619">Last Name</label>
							<input type="text" class="estatein-form-input" placeholder="Enter Last Name" data-node-id="97:8621">
						</div>
						<div class="estatein-form-field" data-node-id="97:8682">
							<label class="estatein-form-label" data-node-id="97:8683">Email</label>
							<input type="email" class="estatein-form-input" placeholder="Enter your Email" data-node-id="97:8685">
						</div>
						<div class="estatein-form-field" data-node-id="97:8686">
							<label class="estatein-form-label" data-node-id="97:8687">Phone</label>
							<input type="tel" class="estatein-form-input" placeholder="Enter Phone Number" data-node-id="97:8689">
						</div>
					</div>

					<div class="estatein-form-row" data-node-id="97:8641">
						<div class="estatein-form-field" data-node-id="97:8642">
							<label class="estatein-form-label" data-node-id="97:8643">Preferred Location</label>
							<div class="estatein-form-select-wrapper">
								<select class="estatein-form-select" data-node-id="97:8645">
									<option value="">Select Location</option>
								</select>
								<span class="estatein-select-arrow">▼</span>
							</div>
						</div>
						<div class="estatein-form-field" data-node-id="97:8655">
							<label class="estatein-form-label" data-node-id="97:8656">Property Type</label>
							<div class="estatein-form-select-wrapper">
								<select class="estatein-form-select" data-node-id="97:8658">
									<option value="">Select Property Type</option>
								</select>
								<span class="estatein-select-arrow">▼</span>
							</div>
						</div>
						<div class="estatein-form-field" data-node-id="97:8720">
							<label class="estatein-form-label" data-node-id="97:8721">No. of Bathrooms</label>
							<div class="estatein-form-select-wrapper">
								<select class="estatein-form-select" data-node-id="97:8723">
									<option value="">Select no. of Bathrooms</option>
								</select>
								<span class="estatein-select-arrow">▼</span>
							</div>
						</div>
						<div class="estatein-form-field" data-node-id="97:8708">
							<label class="estatein-form-label" data-node-id="97:8709">No. of Bedrooms</label>
							<div class="estatein-form-select-wrapper">
								<select class="estatein-form-select" data-node-id="97:8711">
									<option value="">Select no. of Bedrooms</option>
								</select>
								<span class="estatein-select-arrow">▼</span>
							</div>
						</div>
					</div>

					<div class="estatein-form-row" data-node-id="97:8661">
						<div class="estatein-form-field" data-node-id="97:8726">
							<label class="estatein-form-label" data-node-id="97:8727">Budget</label>
							<div class="estatein-form-select-wrapper">
								<select class="estatein-form-select" data-node-id="97:8729">
									<option value="">Select Budget</option>
								</select>
								<span class="estatein-select-arrow">▼</span>
							</div>
						</div>
						<div class="estatein-form-field estatein-form-field-wide" data-node-id="97:8662">
							<label class="estatein-form-label" data-node-id="97:8663">Preferred Contact Method</label>
							<div class="estatein-contact-method-group" data-node-id="97:8742">
								<div class="estatein-contact-method-option">
									<input type="radio" name="contact_method" value="phone" id="contact-phone-archive" class="estatein-contact-method-radio">
									<label for="contact-phone-archive" class="estatein-contact-method-label">
										<span class="estatein-contact-method-icon">📞</span>
										<span class="estatein-contact-method-text">Enter Your Number</span>
										<span class="estatein-contact-method-check">✓</span>
									</label>
								</div>
								<div class="estatein-contact-method-option">
									<input type="radio" name="contact_method" value="email" id="contact-email-archive" class="estatein-contact-method-radio">
									<label for="contact-email-archive" class="estatein-contact-method-label">
										<span class="estatein-contact-method-icon">✉️</span>
										<span class="estatein-contact-method-text">Enter Your Email</span>
										<span class="estatein-contact-method-check">✓</span>
									</label>
								</div>
							</div>
						</div>
					</div>

					<div class="estatein-form-row" data-node-id="97:8635">
						<div class="estatein-form-field estatein-form-field-full" data-node-id="97:8636">
							<label class="estatein-form-label" data-node-id="97:8636">Message</label>
							<textarea class="estatein-form-textarea" placeholder="Enter your Message here.." rows="5" data-node-id="97:8638"></textarea>
						</div>
					</div>

					<div class="estatein-form-footer" data-node-id="97:8749">
						<label class="estatein-checkbox-label" data-node-id="97:8751">
							<input type="checkbox" class="estatein-checkbox">
							<span class="estatein-checkbox-text" data-node-id="97:8753">I agree with <a href="#" class="estatein-link-underline">Terms of Use</a> and <a href="#" class="estatein-link-underline">Privacy Policy</a></span>
						</label>
						<button type="submit" class="estatein-form-submit" data-node-id="97:8747">
							<span class="estatein-submit-text" data-node-id="97:8748">Send Your Message</span>
						</button>
					</div>
				</form>
			</div>
		</div>
	</section>

</main><!-- #main -->

<?php
get_footer();