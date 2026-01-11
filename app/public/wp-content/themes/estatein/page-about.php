<?php
/**
 * Template Name: About Us Page
 * The template for displaying the About Us page
 *
 * @package real_estate
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php
	while ( have_posts() ) :
		the_post();
	?>

	<!-- Hero Section -->
	<section class="estatein-about-hero" data-node-id="89:6153">
		<div class="estatein-container">
			<div class="estatein-about-hero-content">
				<div class="estatein-about-hero-left" data-node-id="89:6179">
					<div class="estatein-about-text-container" data-node-id="89:6054">
						<h1 class="estatein-about-heading" data-node-id="89:6055">Our Journey</h1>
						<p class="estatein-about-paragraph" data-node-id="89:6056">Our story is one of continuous growth and evolution. We started as a small team with big dreams, determined to create a real estate platform that transcended the ordinary. Over the years, we've expanded our reach, forged valuable partnerships, and gained the trust of countless clients.</p>
					</div>
					<div class="estatein-about-stats" data-node-id="93:6193">
						<div class="estatein-about-stat-card" data-node-id="93:6194">
							<h3 class="estatein-about-stat-number" data-node-id="93:6195">200+</h3>
							<p class="estatein-about-stat-label" data-node-id="93:6196">Happy Customers</p>
						</div>
						<div class="estatein-about-stat-card" data-node-id="93:6197">
							<h3 class="estatein-about-stat-number" data-node-id="93:6198">10k+</h3>
							<p class="estatein-about-stat-label" data-node-id="93:6199">Properties For Clients</p>
						</div>
						<div class="estatein-about-stat-card" data-node-id="93:6200">
							<h3 class="estatein-about-stat-number" data-node-id="93:6201">16+</h3>
							<p class="estatein-about-stat-label" data-node-id="93:6202">Years of Experience</p>
						</div>
					</div>
				</div>
				<div class="estatein-about-hero-right" data-node-id="89:6092">
					<?php if ( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail( 'large', array( 'class' => 'estatein-about-hero-image', 'alt' => 'Our Journey' ) ); ?>
					<?php else : ?>
						<div class="estatein-about-hero-image-placeholder"></div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

	<!-- Our Values Section -->
	<section class="estatein-about-values" data-node-id="93:6411">
		<div class="estatein-container">
			<div class="estatein-about-values-content">
				<div class="estatein-about-values-text" data-node-id="93:6304">
					<h2 class="estatein-about-section-heading" data-node-id="93:6305">Our Values</h2>
					<p class="estatein-about-section-paragraph" data-node-id="93:6306">Our story is one of continuous growth and evolution. We started as a small team with big dreams, determined to create a real estate platform that transcended the ordinary.</p>
				</div>
				<div class="estatein-about-values-grid" data-node-id="93:6409">
					<div class="estatein-about-value-item" data-node-id="93:6380">
						<div class="estatein-about-value-header" data-node-id="93:6381">
							<div class="estatein-about-value-icon" data-node-id="93:6382">
								<span class="estatein-icon">🤝</span>
							</div>
							<h3 class="estatein-about-value-title" data-node-id="93:6385">Trust</h3>
						</div>
						<p class="estatein-about-value-desc" data-node-id="93:6386">Trust is the cornerstone of every successful real estate transaction.</p>
					</div>
					<div class="estatein-about-value-item" data-node-id="93:6387">
						<div class="estatein-about-value-header" data-node-id="93:6388">
							<div class="estatein-about-value-icon" data-node-id="93:6412">
								<span class="estatein-icon">⭐</span>
							</div>
							<h3 class="estatein-about-value-title" data-node-id="93:6392">Excellence</h3>
						</div>
						<p class="estatein-about-value-desc" data-node-id="93:6393">We set the bar high for ourselves. From the properties we list to the services we provide.</p>
					</div>
					<div class="estatein-about-value-item" data-node-id="181:3283">
						<div class="estatein-about-value-header" data-node-id="181:3284">
							<div class="estatein-about-value-icon" data-node-id="181:3298">
								<span class="estatein-icon">❤️</span>
							</div>
							<h3 class="estatein-about-value-title" data-node-id="181:3288">Client-Centric</h3>
						</div>
						<p class="estatein-about-value-desc" data-node-id="181:3289">Your dreams and needs are at the center of our universe. We listen, understand.</p>
					</div>
					<div class="estatein-about-value-item" data-node-id="181:3291">
						<div class="estatein-about-value-header" data-node-id="181:3292">
							<div class="estatein-about-value-icon" data-node-id="181:3293">
								<span class="estatein-icon">🎯</span>
							</div>
							<h3 class="estatein-about-value-title" data-node-id="181:3296">Our Commitment</h3>
						</div>
						<p class="estatein-about-value-desc" data-node-id="181:3297">We are dedicated to providing you with the highest level of service, professionalism, and support.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Our Achievements Section -->
	<section class="estatein-about-achievements" data-node-id="93:6479">
		<div class="estatein-container">
			<div class="estatein-about-achievements-header" data-node-id="93:6419">
				<h2 class="estatein-about-section-heading" data-node-id="93:6420">Our Achievements</h2>
				<p class="estatein-about-section-paragraph" data-node-id="93:6421">Our story is one of continuous growth and evolution. We started as a small team with big dreams, determined to create a real estate platform that transcended the ordinary.</p>
			</div>
			<div class="estatein-about-achievements-grid" data-node-id="93:6478">
				<div class="estatein-about-achievement-card" data-node-id="93:6469">
					<h3 class="estatein-about-achievement-title" data-node-id="93:6470">3+ Years of Excellence</h3>
					<p class="estatein-about-achievement-desc" data-node-id="93:6471">With over 3 years in the industry, we've amassed a wealth of knowledge and experience, becoming a go-to resource for all things real estate.</p>
				</div>
				<div class="estatein-about-achievement-card" data-node-id="93:6472">
					<h3 class="estatein-about-achievement-title" data-node-id="93:6473">Happy Clients</h3>
					<p class="estatein-about-achievement-desc" data-node-id="93:6474">Our greatest achievement is the satisfaction of our clients. Their success stories fuel our passion for what we do.</p>
				</div>
				<div class="estatein-about-achievement-card" data-node-id="93:6475">
					<h3 class="estatein-about-achievement-title" data-node-id="93:6476">Industry Recognition</h3>
					<p class="estatein-about-achievement-desc" data-node-id="93:6477">We've earned the respect of our peers and industry leaders, with accolades and awards that reflect our commitment to excellence.</p>
				</div>
			</div>
		</div>
	</section>

	<!-- Process Section -->
	<section class="estatein-about-process" data-node-id="95:6611">
		<div class="estatein-container">
			<div class="estatein-about-process-header" data-node-id="181:3326">
				<h2 class="estatein-about-section-heading" data-node-id="181:3327">Navigating the Estatein Experience</h2>
				<p class="estatein-about-section-paragraph" data-node-id="181:3328">At Estatein, we've designed a straightforward process to help you find and purchase your dream property with ease. Here's a step-by-step guide to how it all works.</p>
			</div>
			<div class="estatein-about-process-grid" data-node-id="95:6554">
				<div class="estatein-about-process-item" data-node-id="95:6521">
					<div class="estatein-about-process-number" data-node-id="95:6516">Step 01</div>
					<div class="estatein-about-process-content" data-node-id="95:6519">
						<h3 class="estatein-about-process-title" data-node-id="95:6517">Discover a World of Possibilities</h3>
						<p class="estatein-about-process-desc" data-node-id="95:6518">Your journey begins with exploring our carefully curated property listings. Use our intuitive search tools to filter properties based on your preferences, including location, type, size, and budget.</p>
					</div>
				</div>
				<div class="estatein-about-process-item" data-node-id="95:6522">
					<div class="estatein-about-process-number" data-node-id="95:6524">Step 02</div>
					<div class="estatein-about-process-content" data-node-id="95:6525">
						<h3 class="estatein-about-process-title" data-node-id="95:6526">Narrowing Down Your Choices</h3>
						<p class="estatein-about-process-desc" data-node-id="95:6527">Once you've found properties that catch your eye, save them to your account or make a shortlist. This allows you to compare and revisit your favorites as you make your decision.</p>
					</div>
				</div>
				<div class="estatein-about-process-item" data-node-id="95:6529">
					<div class="estatein-about-process-number" data-node-id="95:6531">Step 03</div>
					<div class="estatein-about-process-content" data-node-id="95:6532">
						<h3 class="estatein-about-process-title" data-node-id="95:6533">Personalized Guidance</h3>
						<p class="estatein-about-process-desc" data-node-id="95:6534">Have questions about a property or need more information? Our dedicated team of real estate experts is just a call or message away.</p>
					</div>
				</div>
				<div class="estatein-about-process-item" data-node-id="95:6536">
					<div class="estatein-about-process-number" data-node-id="95:6538">Step 04</div>
					<div class="estatein-about-process-content" data-node-id="95:6539">
						<h3 class="estatein-about-process-title" data-node-id="95:6540">See It for Yourself</h3>
						<p class="estatein-about-process-desc" data-node-id="95:6541">Arrange viewings of the properties you're interested in. We'll coordinate with the property owners and accompany you to ensure you get a firsthand look at your potential new home.</p>
					</div>
				</div>
				<div class="estatein-about-process-item" data-node-id="95:6542">
					<div class="estatein-about-process-number" data-node-id="95:6544">Step 05</div>
					<div class="estatein-about-process-content" data-node-id="95:6545">
						<h3 class="estatein-about-process-title" data-node-id="95:6546">Making Informed Decisions</h3>
						<p class="estatein-about-process-desc" data-node-id="95:6547">Before making an offer, our team will assist you with due diligence, including property inspections, legal checks, and market analysis. We want you to be fully informed and confident in your choice.</p>
					</div>
				</div>
				<div class="estatein-about-process-item" data-node-id="95:6548">
					<div class="estatein-about-process-number" data-node-id="95:6550">Step 06</div>
					<div class="estatein-about-process-content" data-node-id="95:6551">
						<h3 class="estatein-about-process-title" data-node-id="95:6552">Getting the Best Deal</h3>
						<p class="estatein-about-process-desc" data-node-id="95:6553">We'll help you negotiate the best terms and prepare your offer. Our goal is to secure the property at the right price and on favorable terms.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Team Section -->
	<section class="estatein-about-team" data-node-id="95:6680">
		<div class="estatein-container">
			<div class="estatein-about-team-header" data-node-id="181:3301">
				<h2 class="estatein-about-section-heading" data-node-id="181:3302">Meet the Estatein Team</h2>
				<p class="estatein-about-section-paragraph" data-node-id="181:3303">At Estatein, our success is driven by the dedication and expertise of our team. Get to know the people behind our mission to make your real estate dreams a reality.</p>
			</div>
			<div class="estatein-about-team-grid" data-node-id="95:6754">
				<div class="estatein-about-team-card" data-node-id="95:6811">
					<div class="estatein-about-team-image" data-node-id="95:6812">
						<img src="<?php echo get_template_directory_uri(); ?>/images/team-placeholder.jpg" alt="Team Member">
					</div>
					<div class="estatein-about-team-content" data-node-id="95:6813">
						<h3 class="estatein-about-team-name" data-node-id="95:6815">Max Mitchell</h3>
						<p class="estatein-about-team-role" data-node-id="95:6816">Founder</p>
						<div class="estatein-about-team-social" data-node-id="95:6817">
							<p class="estatein-about-team-bio" data-node-id="95:6818">Say Hello 👋</p>
							<a href="#" class="estatein-about-team-link" data-node-id="95:6819">→</a>
						</div>
					</div>
				</div>
				<div class="estatein-about-team-card" data-node-id="95:6839">
					<div class="estatein-about-team-image" data-node-id="95:6840">
						<img src="<?php echo get_template_directory_uri(); ?>/images/team-placeholder.jpg" alt="Team Member">
					</div>
					<div class="estatein-about-team-content" data-node-id="95:6841">
						<h3 class="estatein-about-team-name" data-node-id="95:6843">Sarah Johnson</h3>
						<p class="estatein-about-team-role" data-node-id="95:6844">Chief Real Estate Officer</p>
						<div class="estatein-about-team-social" data-node-id="95:6845">
							<p class="estatein-about-team-bio" data-node-id="95:6846">Say Hello 👋</p>
							<a href="#" class="estatein-about-team-link" data-node-id="95:6847">→</a>
						</div>
					</div>
				</div>
				<div class="estatein-about-team-card" data-node-id="95:6825">
					<div class="estatein-about-team-image" data-node-id="95:6826">
						<img src="<?php echo get_template_directory_uri(); ?>/images/team-placeholder.jpg" alt="Team Member">
					</div>
					<div class="estatein-about-team-content" data-node-id="95:6827">
						<h3 class="estatein-about-team-name" data-node-id="95:6829">David Brown</h3>
						<p class="estatein-about-team-role" data-node-id="95:6830">Head of Property Management</p>
						<div class="estatein-about-team-social" data-node-id="95:6831">
							<p class="estatein-about-team-bio" data-node-id="95:6832">Say Hello 👋</p>
							<a href="#" class="estatein-about-team-link" data-node-id="95:6833">→</a>
						</div>
					</div>
				</div>
				<div class="estatein-about-team-card" data-node-id="95:6853">
					<div class="estatein-about-team-image" data-node-id="95:6854">
						<img src="<?php echo get_template_directory_uri(); ?>/images/team-placeholder.jpg" alt="Team Member">
					</div>
					<div class="estatein-about-team-content" data-node-id="95:6855">
						<h3 class="estatein-about-team-name" data-node-id="95:6857">Michael Turner</h3>
						<p class="estatein-about-team-role" data-node-id="95:6858">Legal Counsel</p>
						<div class="estatein-about-team-social" data-node-id="95:6859">
							<p class="estatein-about-team-bio" data-node-id="95:6860">Say Hello 👋</p>
							<a href="#" class="estatein-about-team-link" data-node-id="95:6861">→</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Testimonials Section -->
	<section class="estatein-about-testimonials" data-node-id="95:7185">
		<div class="estatein-container">
			<div class="estatein-about-testimonials-header" data-node-id="181:3351">
				<h2 class="estatein-about-section-heading" data-node-id="181:3352">Our Valued Clients</h2>
				<p class="estatein-about-section-paragraph" data-node-id="181:3353">At Estatein, we have had the privilege of working with a diverse range of clients across various industries. Here are some of the clients we've had the pleasure of serving</p>
			</div>
			<div class="estatein-about-testimonials-content" data-node-id="95:7112">
				<div class="estatein-about-testimonials-grid" data-node-id="95:7138">
					<div class="estatein-about-testimonial-card" data-node-id="95:7240">
						<div class="estatein-about-testimonial-header" data-node-id="95:7241">
							<div class="estatein-about-testimonial-info" data-node-id="95:7242">
								<p class="estatein-about-testimonial-label" data-node-id="95:7243">Since 2019</p>
								<h3 class="estatein-about-testimonial-title" data-node-id="95:7244">ABC Corporation</h3>
							</div>
							<a href="#" class="estatein-about-testimonial-btn" data-node-id="95:7245">Visit Website</a>
						</div>
						<div class="estatein-about-testimonial-meta" data-node-id="95:7247">
							<div class="estatein-about-testimonial-location" data-node-id="95:7248">
								<span class="estatein-icon">📍</span>
								<p class="estatein-about-testimonial-location-text" data-node-id="95:7252">Domain</p>
								<p class="estatein-about-testimonial-location-detail" data-node-id="95:7253">Commercial Real Estate</p>
							</div>
							<div class="estatein-about-testimonial-location" data-node-id="95:7254">
								<span class="estatein-icon">💰</span>
								<p class="estatein-about-testimonial-location-text" data-node-id="95:7258">Category</p>
								<p class="estatein-about-testimonial-location-detail" data-node-id="95:7259">Luxury Home Development</p>
							</div>
						</div>
						<div class="estatein-about-testimonial-body" data-node-id="95:7260">
							<h4 class="estatein-about-testimonial-quote-title" data-node-id="95:7261">What They Said 🤗</h4>
							<p class="estatein-about-testimonial-quote" data-node-id="95:7262">Estatein's expertise in finding the perfect office space for our expanding operations was invaluable. They truly understand our business needs.</p>
						</div>
					</div>
					<div class="estatein-about-testimonial-card" data-node-id="95:7263">
						<div class="estatein-about-testimonial-header" data-node-id="95:7264">
							<div class="estatein-about-testimonial-info" data-node-id="95:7265">
								<p class="estatein-about-testimonial-label" data-node-id="95:7266">Since 2018</p>
								<h3 class="estatein-about-testimonial-title" data-node-id="95:7267">GreenTech Enterprises</h3>
							</div>
							<a href="#" class="estatein-about-testimonial-btn" data-node-id="95:7268">Visit Website</a>
						</div>
						<div class="estatein-about-testimonial-meta" data-node-id="95:7270">
							<div class="estatein-about-testimonial-location" data-node-id="95:7271">
								<span class="estatein-icon">📍</span>
								<p class="estatein-about-testimonial-location-text" data-node-id="115:1703">Domain</p>
								<p class="estatein-about-testimonial-location-detail" data-node-id="95:7276">Commercial Real Estate</p>
							</div>
							<div class="estatein-about-testimonial-location" data-node-id="95:7277">
								<span class="estatein-icon">💰</span>
								<p class="estatein-about-testimonial-location-text" data-node-id="115:1699">Category</p>
								<p class="estatein-about-testimonial-location-detail" data-node-id="95:7282">Retail Space</p>
							</div>
						</div>
						<div class="estatein-about-testimonial-body" data-node-id="95:7283">
							<h4 class="estatein-about-testimonial-quote-title" data-node-id="95:7284">What They Said 🤗</h4>
							<p class="estatein-about-testimonial-quote" data-node-id="95:7285">Estatein's ability to identify prime retail locations helped us expand our brand presence. They are a trusted partner in our growth.</p>
						</div>
					</div>
				</div>
				<div class="estatein-about-testimonials-pagination" data-node-id="130:6154">
					<span class="estatein-about-testimonials-page-info" data-node-id="130:6155">01 of 10</span>
					<div class="estatein-about-testimonials-nav" data-node-id="130:6156">
						<button class="estatein-about-testimonials-nav-btn" data-node-id="130:6157">←</button>
						<button class="estatein-about-testimonials-nav-btn" data-node-id="130:6160">→</button>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php
	endwhile; // End of the loop.
	?>

</main><!-- #main -->

<?php
get_footer();
