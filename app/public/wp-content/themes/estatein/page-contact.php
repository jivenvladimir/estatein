<?php
/**
 * Template Name: Contact Page
 * The template for displaying the Contact page
 *
 * @package real_estate
 */

get_header();
?>

<main id="primary" class="site-main">

	<!-- Hero Section -->
	<section class="estatein-contact-hero" data-node-id="104:12832">
		<div class="estatein-container">
			<div class="estatein-contact-hero-content">
				<div class="estatein-contact-hero-text" data-node-id="104:12833">
					<h1 class="estatein-contact-hero-heading" data-node-id="104:12834">Get in Touch with Estatein</h1>
					<p class="estatein-contact-hero-subtitle" data-node-id="104:12835">Welcome to Estatein's Contact Us page. We're here to assist you with any inquiries, requests, or feedback you may have. Whether you're looking to buy or sell a property, explore investment opportunities, or simply want to connect, we're just a message away. Reach out to us, and let's start a conversation.</p>
				</div>

				<div class="estatein-contact-info-grid" data-node-id="104:12836">
					<div class="estatein-contact-info-card" data-node-id="104:12837">
						<div class="estatein-contact-icon-wrapper" data-node-id="104:12838">
							<div class="estatein-contact-icon-container" data-node-id="104:12839">
								<div class="estatein-contact-icon" data-node-id="104:13308">✉️</div>
							</div>
						</div>
						<p class="estatein-contact-info-text" data-node-id="104:12842">info@estatein.com</p>
						<div class="estatein-contact-card-icon" data-node-id="104:12843">📋</div>
					</div>

					<div class="estatein-contact-info-card" data-node-id="104:12845">
						<div class="estatein-contact-icon-wrapper" data-node-id="104:12846">
							<div class="estatein-contact-icon-container" data-node-id="104:12847">
								<div class="estatein-contact-icon" data-node-id="104:13310">📞</div>
							</div>
						</div>
						<p class="estatein-contact-info-text" data-node-id="104:12850">+1 (123) 456-7890</p>
						<div class="estatein-contact-card-icon" data-node-id="104:12851">📋</div>
					</div>

					<div class="estatein-contact-info-card" data-node-id="104:12853">
						<div class="estatein-contact-icon-wrapper" data-node-id="104:12854">
							<div class="estatein-contact-icon-container" data-node-id="104:12855">
								<div class="estatein-contact-icon" data-node-id="104:13312">📍</div>
							</div>
						</div>
						<p class="estatein-contact-info-text" data-node-id="104:12858">Main Headquarters</p>
						<div class="estatein-contact-card-icon" data-node-id="104:12859">📋</div>
					</div>

					<div class="estatein-contact-info-card" data-node-id="104:13260">
						<div class="estatein-contact-icon-wrapper" data-node-id="104:13261">
							<div class="estatein-contact-icon-container" data-node-id="104:13262">
								<div class="estatein-contact-icon" data-node-id="104:13280">🔗</div>
							</div>
						</div>
						<div class="estatein-contact-social-links" data-node-id="104:13287">
							<a href="#" class="estatein-contact-social-link" data-node-id="104:13265">Instagram</a>
							<a href="#" class="estatein-contact-social-link" data-node-id="104:13286">LinkedIn</a>
							<a href="#" class="estatein-contact-social-link" data-node-id="104:13288">Facebook</a>
						</div>
						<div class="estatein-contact-card-icon" data-node-id="104:13266">📋</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Contact Form Section -->
	<section class="estatein-contact-form-section" data-node-id="104:13314">
		<div class="estatein-container">
			<div class="estatein-contact-form-content">
				<div class="estatein-contact-form-header" data-node-id="104:13315">
					<h2 class="estatein-contact-form-heading" data-node-id="104:13316">Let's Connect</h2>
					<p class="estatein-contact-form-subtitle" data-node-id="104:13317">We're excited to connect with you and learn more about your real estate goals. Use the form below to get in touch with Estatein. Whether you're a prospective client, partner, or simply curious about our services, we're here to answer your questions and provide the assistance you need.</p>
				</div>

				<?php
				// Display success/error messages
				$success_message = get_transient( 'estatein_contact_success' );
				$error_message   = get_transient( 'estatein_contact_error' );

				if ( $success_message ) {
					delete_transient( 'estatein_contact_success' );
					echo '<div class="estatein-form-message estatein-form-success">' . esc_html( $success_message ) . '</div>';
				}

				if ( $error_message ) {
					delete_transient( 'estatein_contact_error' );
					echo '<div class="estatein-form-message estatein-form-error">' . esc_html( $error_message ) . '</div>';
				}
				?>

				<form class="estatein-contact-form" data-node-id="104:13340" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
					<?php wp_nonce_field( 'estatein_contact_form', 'estatein_contact_nonce' ); ?>
					<input type="hidden" name="action" value="estatein_contact_form">
					<div class="estatein-form-fields" data-node-id="104:13341">
						<div class="estatein-form-row" data-node-id="104:13342">
							<div class="estatein-form-field" data-node-id="104:13343">
								<label class="estatein-form-label" data-node-id="104:13344">First Name</label>
								<input type="text" class="estatein-form-input" data-node-id="104:13345" placeholder="Enter First Name" name="first_name" required>
							</div>
							<div class="estatein-form-field" data-node-id="104:13347">
								<label class="estatein-form-label" data-node-id="104:13348">Last Name</label>
								<input type="text" class="estatein-form-input" data-node-id="104:13349" placeholder="Enter Last Name" name="last_name" required>
							</div>
							<div class="estatein-form-field" data-node-id="104:13351">
								<label class="estatein-form-label" data-node-id="104:13352">Email</label>
								<input type="email" class="estatein-form-input" data-node-id="104:13353" placeholder="Enter your Email" name="email" required>
							</div>
						</div>

						<div class="estatein-form-row" data-node-id="104:13359">
							<div class="estatein-form-field" data-node-id="104:13413">
								<label class="estatein-form-label" data-node-id="104:13414">Phone</label>
								<input type="tel" class="estatein-form-input" data-node-id="104:13415" placeholder="Enter Phone Number" name="phone" required>
							</div>
							<div class="estatein-form-field" data-node-id="104:13360">
								<label class="estatein-form-label" data-node-id="104:13361">Inquiry Type</label>
								<select class="estatein-form-select" data-node-id="104:13362" name="inquiry_type" required>
									<option value="">Select Inquiry Type</option>
									<option value="buying">Buying Property</option>
									<option value="selling">Selling Property</option>
									<option value="investment">Investment Opportunities</option>
									<option value="general">General Inquiry</option>
								</select>
							</div>
							<div class="estatein-form-field" data-node-id="104:13366">
								<label class="estatein-form-label" data-node-id="104:13367">How Did You Hear About Us?</label>
								<select class="estatein-form-select" data-node-id="104:13368" name="hear_about" required>
									<option value="">Select</option>
									<option value="search">Search Engine</option>
									<option value="social">Social Media</option>
									<option value="referral">Referral</option>
									<option value="advertisement">Advertisement</option>
									<option value="other">Other</option>
								</select>
							</div>
						</div>

						<div class="estatein-form-field estatein-form-field-full" data-node-id="104:13403">
							<label class="estatein-form-label" data-node-id="104:13404">Message</label>
							<textarea class="estatein-form-textarea" data-node-id="104:13405" placeholder="Enter your Message here.." name="message" rows="6" required></textarea>
						</div>
					</div>

					<div class="estatein-form-footer" data-node-id="104:13407">
						<div class="estatein-form-checkbox-wrapper" data-node-id="104:13408">
							<input type="checkbox" id="terms" class="estatein-form-checkbox" data-node-id="104:13409" name="terms" required>
							<label for="terms" class="estatein-form-checkbox-label" data-node-id="104:13410">
								I agree with <a href="#" class="estatein-link">Terms of Use</a> and <a href="#" class="estatein-link">Privacy Policy</a>
							</label>
						</div>
						<button type="submit" class="estatein-form-submit" data-node-id="104:13411" name="estatein_contact_submit">
							<span data-node-id="104:13412">Send Your Message</span>
						</button>
					</div>
				</form>
			</div>
		</div>
	</section>

	<!-- Office Locations Section -->
	<section class="estatein-office-locations" data-node-id="104:13635">
		<div class="estatein-container">
			<div class="estatein-office-locations-content">
				<div class="estatein-office-locations-header" data-node-id="104:13418">
					<h2 class="estatein-office-locations-heading" data-node-id="104:13419">Discover Our Office Locations</h2>
					<p class="estatein-office-locations-subtitle" data-node-id="104:13420">Estatein is here to serve you across multiple locations. Whether you're looking to meet our team, discuss real estate opportunities, or simply drop by for a chat, we have offices conveniently located to serve your needs. Explore the categories below to find the Estatein office nearest to you</p>
				</div>

				<div class="estatein-office-locations-main" data-node-id="104:13566">
					<div class="estatein-office-tabs" data-node-id="122:2130">
						<button class="estatein-office-tab active" data-node-id="122:2131" data-tab="all">All</button>
						<button class="estatein-office-tab" data-node-id="122:2133" data-tab="regional">Regional</button>
						<button class="estatein-office-tab" data-node-id="122:2135" data-tab="international">International</button>
					</div>

					<div class="estatein-office-cards" data-node-id="104:13592">
						<div class="estatein-office-card" data-node-id="104:13593">
							<div class="estatein-office-card-content" data-node-id="104:13594">
								<div class="estatein-office-card-header" data-node-id="104:13595">
									<p class="estatein-office-card-type" data-node-id="104:13596">Main Headquarters</p>
									<h3 class="estatein-office-card-title" data-node-id="104:13597">123 Estatein Plaza, City Center, Metropolis</h3>
								</div>
								<p class="estatein-office-card-description" data-node-id="104:13598">Our main headquarters serve as the heart of Estatein. Located in the bustling city center, this is where our core team of experts operates, driving the excellence and innovation that define us.</p>
							</div>
							<div class="estatein-office-card-actions" data-node-id="104:13599">
								<a href="mailto:info@estatein.com" class="estatein-office-action-btn" data-node-id="104:13600">
									<span class="estatein-office-action-icon">✉️</span>
									<span>info@estatein.com</span>
								</a>
								<a href="tel:+11234567890" class="estatein-office-action-btn" data-node-id="104:13604">
									<span class="estatein-office-action-icon">📞</span>
									<span>+1 (123) 456-7890</span>
								</a>
								<a href="#" class="estatein-office-action-btn" data-node-id="104:13608">
									<span class="estatein-office-action-icon">📍</span>
									<span>Metropolis</span>
								</a>
							</div>
							<a href="#" class="estatein-office-direction-btn" data-node-id="104:13612">
								<span data-node-id="104:13613">Get Direction</span>
							</a>
						</div>

						<div class="estatein-office-card" data-node-id="104:13614">
							<div class="estatein-office-card-content" data-node-id="104:13615">
								<div class="estatein-office-card-header" data-node-id="104:13616">
									<p class="estatein-office-card-type" data-node-id="104:13617">Regional Offices</p>
									<h3 class="estatein-office-card-title" data-node-id="104:13618">456 Urban Avenue, Downtown District, Metropolis</h3>
								</div>
								<p class="estatein-office-card-description" data-node-id="104:13619">Estatein's presence extends to multiple regions, each with its own dynamic real estate landscape. Discover our regional offices, staffed by local experts who understand the nuances of their respective markets.</p>
							</div>
							<div class="estatein-office-card-actions" data-node-id="104:13620">
								<a href="mailto:info@restatein.com" class="estatein-office-action-btn" data-node-id="104:13621">
									<span class="estatein-office-action-icon">✉️</span>
									<span>info@restatein.com</span>
								</a>
								<a href="tel:+11236287890" class="estatein-office-action-btn" data-node-id="104:13625">
									<span class="estatein-office-action-icon">📞</span>
									<span>+1 (123) 628-7890</span>
								</a>
								<a href="#" class="estatein-office-action-btn" data-node-id="104:13629">
									<span class="estatein-office-action-icon">📍</span>
									<span>Metropolis</span>
								</a>
							</div>
							<a href="#" class="estatein-office-direction-btn" data-node-id="104:13633">
								<span data-node-id="104:13634">Get Direction</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Gallery Section -->
	<section class="estatein-contact-gallery" data-node-id="104:13642">
		<div class="estatein-container">
			<div class="estatein-contact-gallery-content">
				<div class="estatein-contact-gallery-grid" data-node-id="104:13643">
					<div class="estatein-contact-gallery-column" data-node-id="104:13644">
						<div class="estatein-contact-gallery-image" data-node-id="104:13749">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery-1.jpg" alt="Gallery Image 1">
						</div>
						<div class="estatein-contact-gallery-image" data-node-id="104:13750">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery-2.jpg" alt="Gallery Image 2">
						</div>
					</div>
					<div class="estatein-contact-gallery-column" data-node-id="104:13661">
						<div class="estatein-contact-gallery-image" data-node-id="104:13753">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery-3.jpg" alt="Gallery Image 3">
						</div>
						<div class="estatein-contact-gallery-images-row" data-node-id="104:13670">
							<div class="estatein-contact-gallery-image" data-node-id="104:13751">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery-4.jpg" alt="Gallery Image 4">
							</div>
							<div class="estatein-contact-gallery-image" data-node-id="104:13752">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery-5.jpg" alt="Gallery Image 5">
							</div>
						</div>
					</div>
				</div>

				<div class="estatein-contact-gallery-bottom" data-node-id="104:13687">
					<div class="estatein-contact-gallery-text" data-node-id="104:13724">
						<h2 class="estatein-contact-gallery-heading" data-node-id="104:13725">Explore Estatein's World</h2>
						<p class="estatein-contact-gallery-description" data-node-id="104:13726">Step inside the world of Estatein, where professionalism meets warmth, and expertise meets passion. Our gallery offers a glimpse into our team and workspaces, inviting you to get to know us better.</p>
					</div>
					<div class="estatein-contact-gallery-image" data-node-id="104:13755">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery-6.jpg" alt="Gallery Image 6">
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- CTA Section -->
	<section class="estatein-cta" data-node-id="129:5212">
		<div class="estatein-container">
			<div class="estatein-cta-content" data-node-id="129:5563">
				<h2 class="estatein-cta-title" data-node-id="129:5564">Start Your Real Estate Journey Today</h2>
				<p class="estatein-cta-description" data-node-id="129:5565">Your dream property is just a click away. Whether you're looking for a new home, a strategic investment, or expert real estate advice, Estatein is here to assist you every step of the way. Take the first step towards your real estate goals and explore our available properties or get in touch with our team for personalized assistance.</p>
			</div>
			<a href="<?php echo esc_url( home_url( '/properties' ) ); ?>" class="estatein-cta-button" data-node-id="129:5566">
				<span class="estatein-cta-button-text" data-node-id="129:5567">Explore Properties</span>
			</a>
		</div>
	</section>

</main>

<?php
get_footer();
?>
