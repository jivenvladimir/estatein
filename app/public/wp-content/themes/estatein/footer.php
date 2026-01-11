<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package real_estate
 */

?>

	<footer id="colophon" class="site-footer" data-node-id="89:3943">
		<div class="estatein-footer-main" data-node-id="89:4283">
			<div class="estatein-container">
				<div class="estatein-footer-content">
					<!-- Logo and Email Subscription -->
					<div class="estatein-footer-left" data-node-id="89:4007">
						<div class="estatein-footer-logo" data-node-id="89:4036">
							<?php if ( has_custom_logo() ) : ?>
								<?php the_custom_logo(); ?>
							<?php else : ?>
								<div class="estatein-logo-symbol" data-node-id="89:4037">
									<img src="<?php echo get_template_directory_uri(); ?>/icons/estatein-icon.svg" alt="Estatein Icon" width="48" height="48">
								</div>
								<span class="estatein-logo-text" data-node-id="89:4042">Estatein</span>
							<?php endif; ?>
						</div>
						<form class="estatein-footer-email" data-node-id="89:4010">
							<div class="estatein-email-input-wrapper">
								<svg class="estatein-email-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" data-node-id="89:4281">
									<path d="M4 4H20C21.1 4 22 4.9 22 6V18C22 19.1 21.1 20 20 20H4C2.9 20 2 19.1 2 18V6C2 4.9 2.9 4 4 4Z" stroke="currentColor" stroke-width="2" fill="none"/>
									<path d="L22 6L12 13L2 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
								</svg>
								<input type="email" placeholder="Enter Your Email" class="estatein-email-input" data-node-id="89:4014" required>
								<button type="submit" class="estatein-email-submit" data-node-id="89:4015" aria-label="Subscribe">
									<svg width="30" height="30" viewBox="0 0 30 30" fill="none">
										<path d="M5 15H25M25 15L15 5M25 15L15 25" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>
								</button>
							</div>
						</form>
					</div>

					<!-- Footer Links -->
					<div class="estatein-footer-links" data-node-id="89:3966">
						<!-- Desktop: Direct columns -->
						<div class="estatein-footer-column" data-node-id="89:4101">
							<h4 class="estatein-footer-column-title" data-node-id="89:4102">Home</h4>
							<ul class="estatein-footer-link-list" data-node-id="89:4103">
								<li><a href="<?php echo esc_url( home_url( '/#hero' ) ); ?>" data-node-id="89:4104">Hero Section</a></li>
								<li><a href="<?php echo esc_url( home_url( '/#properties' ) ); ?>" data-node-id="89:4105">Featured Properties</a></li>
								<li><a href="<?php echo esc_url( home_url( '/#testimonials' ) ); ?>" data-node-id="89:4106">What Our Clients Say</a></li>
								<li><a href="<?php echo esc_url( home_url( '/#faq' ) ); ?>" data-node-id="89:4107">Frequently Asked Questions</a></li>
								<li><a href="<?php echo esc_url( home_url( '/#cta' ) ); ?>" data-node-id="89:4108">CTA</a></li>
							</ul>
						</div>

						<div class="estatein-footer-column" data-node-id="89:4109">
							<h4 class="estatein-footer-column-title" data-node-id="89:4110">About Us</h4>
							<ul class="estatein-footer-link-list" data-node-id="89:4111">
								<li><a href="<?php echo esc_url( home_url( '/about#story' ) ); ?>" data-node-id="89:4112">Our Story</a></li>
								<li><a href="<?php echo esc_url( home_url( '/about#works' ) ); ?>" data-node-id="89:4113">Our Works</a></li>
								<li><a href="<?php echo esc_url( home_url( '/about#how-it-works' ) ); ?>" data-node-id="89:4114">How It Works</a></li>
								<li><a href="<?php echo esc_url( home_url( '/about#team' ) ); ?>" data-node-id="89:4115">Our Team</a></li>
								<li><a href="<?php echo esc_url( home_url( '/about#clients' ) ); ?>" data-node-id="89:4116">Our Clients</a></li>
							</ul>
						</div>

						<div class="estatein-footer-column" data-node-id="89:4117">
							<h4 class="estatein-footer-column-title" data-node-id="89:4118">Properties</h4>
							<ul class="estatein-footer-link-list" data-node-id="89:4119">
								<li><a href="<?php echo esc_url( home_url( '/properties#portfolio' ) ); ?>" data-node-id="89:4120">Portfolio</a></li>
								<li><a href="<?php echo esc_url( home_url( '/properties#categories' ) ); ?>" data-node-id="89:4121">Categories</a></li>
							</ul>
						</div>

						<div class="estatein-footer-column" data-node-id="89:4217">
							<h4 class="estatein-footer-column-title" data-node-id="89:4218">Services</h4>
							<ul class="estatein-footer-link-list" data-node-id="89:4219">
								<li><a href="<?php echo esc_url( home_url( '/services#valuation' ) ); ?>" data-node-id="89:4220">Valuation Mastery</a></li>
								<li><a href="<?php echo esc_url( home_url( '/services#marketing' ) ); ?>" data-node-id="89:4221">Strategic Marketing</a></li>
								<li><a href="<?php echo esc_url( home_url( '/services#negotiation' ) ); ?>" data-node-id="89:4269">Negotiation Wizardry</a></li>
								<li><a href="<?php echo esc_url( home_url( '/services#closing' ) ); ?>" data-node-id="89:4270">Closing Success</a></li>
								<li><a href="<?php echo esc_url( home_url( '/services#management' ) ); ?>" data-node-id="89:4271">Property Management</a></li>
							</ul>
						</div>

						<div class="estatein-footer-column" data-node-id="89:4133">
							<h4 class="estatein-footer-column-title" data-node-id="89:4134">Contact Us</h4>
							<ul class="estatein-footer-link-list" data-node-id="89:4135">
								<li><a href="<?php echo esc_url( home_url( '/contact#form' ) ); ?>" data-node-id="89:4136">Contact Form</a></li>
								<li><a href="<?php echo esc_url( home_url( '/contact#offices' ) ); ?>" data-node-id="89:4137">Our Offices</a></li>
							</ul>
						</div>

						<!-- Mobile: Row structure -->
						<!-- First Row: Home and About Us -->
						<div class="estatein-footer-links-row">
							<div class="estatein-footer-column-mobile" data-node-id="89:4101-mobile">
								<h4 class="estatein-footer-column-title" data-node-id="89:4102">Home</h4>
								<ul class="estatein-footer-link-list" data-node-id="89:4103">
									<li><a href="<?php echo esc_url( home_url( '/#hero' ) ); ?>" data-node-id="89:4104">Hero Section</a></li>
									<li><a href="<?php echo esc_url( home_url( '/#properties' ) ); ?>" data-node-id="89:4105">Featured Properties</a></li>
									<li><a href="<?php echo esc_url( home_url( '/#testimonials' ) ); ?>" data-node-id="89:4106">What Our Clients Say</a></li>
									<li><a href="<?php echo esc_url( home_url( '/#faq' ) ); ?>" data-node-id="89:4107">Frequently Asked Questions</a></li>
									<li><a href="<?php echo esc_url( home_url( '/#cta' ) ); ?>" data-node-id="89:4108">CTA</a></li>
								</ul>
							</div>

							<div class="estatein-footer-column-mobile" data-node-id="89:4109-mobile">
								<h4 class="estatein-footer-column-title" data-node-id="89:4110">About Us</h4>
								<ul class="estatein-footer-link-list" data-node-id="89:4111">
									<li><a href="<?php echo esc_url( home_url( '/about#story' ) ); ?>" data-node-id="89:4112">Our Story</a></li>
									<li><a href="<?php echo esc_url( home_url( '/about#works' ) ); ?>" data-node-id="89:4113">Our Works</a></li>
									<li><a href="<?php echo esc_url( home_url( '/about#how-it-works' ) ); ?>" data-node-id="89:4114">How It Works</a></li>
									<li><a href="<?php echo esc_url( home_url( '/about#team' ) ); ?>" data-node-id="89:4115">Our Team</a></li>
									<li><a href="<?php echo esc_url( home_url( '/about#clients' ) ); ?>" data-node-id="89:4116">Our Clients</a></li>
								</ul>
							</div>
						</div>

						<!-- Second Row: Properties, Contact Us, and Services -->
						<div class="estatein-footer-links-row">
							<div class="estatein-footer-column-mobile" data-node-id="89:4117-mobile">
								<h4 class="estatein-footer-column-title" data-node-id="89:4118">Properties</h4>
								<ul class="estatein-footer-link-list" data-node-id="89:4119">
									<li><a href="<?php echo esc_url( home_url( '/properties#portfolio' ) ); ?>" data-node-id="89:4120">Portfolio</a></li>
									<li><a href="<?php echo esc_url( home_url( '/properties#categories' ) ); ?>" data-node-id="89:4121">Categories</a></li>
								</ul>
							</div>

							<div class="estatein-footer-column-mobile" data-node-id="89:4133-mobile">
								<h4 class="estatein-footer-column-title" data-node-id="89:4134">Contact Us</h4>
								<ul class="estatein-footer-link-list" data-node-id="89:4135">
									<li><a href="<?php echo esc_url( home_url( '/contact#form' ) ); ?>" data-node-id="89:4136">Contact Form</a></li>
									<li><a href="<?php echo esc_url( home_url( '/contact#offices' ) ); ?>" data-node-id="89:4137">Our Offices</a></li>
								</ul>
							</div>
						</div>

						<!-- Third Row: Services (Full Width) -->
						<div class="estatein-footer-links-row">
							<div class="estatein-footer-column-mobile estatein-footer-column-full" data-node-id="89:4217-mobile">
								<h4 class="estatein-footer-column-title" data-node-id="89:4218">Services</h4>
								<ul class="estatein-footer-link-list" data-node-id="89:4219">
									<li><a href="<?php echo esc_url( home_url( '/services#valuation' ) ); ?>" data-node-id="89:4220">Valuation Mastery</a></li>
									<li><a href="<?php echo esc_url( home_url( '/services#marketing' ) ); ?>" data-node-id="89:4221">Strategic Marketing</a></li>
									<li><a href="<?php echo esc_url( home_url( '/services#negotiation' ) ); ?>" data-node-id="89:4269">Negotiation Wizardry</a></li>
									<li><a href="<?php echo esc_url( home_url( '/services#closing' ) ); ?>" data-node-id="89:4270">Closing Success</a></li>
									<li><a href="<?php echo esc_url( home_url( '/services#management' ) ); ?>" data-node-id="89:4271">Property Management</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Footer Bottom -->
		<div class="estatein-footer-bottom" data-node-id="89:4020">
			<div class="estatein-container">
				<div class="estatein-footer-bottom-content">
					<div class="estatein-footer-copyright" data-node-id="89:4021">
						<p data-node-id="89:4022">©<?php echo date( 'Y' ); ?> Estatein. All Rights Reserved.</p>
						<a href="<?php echo esc_url( home_url( '/terms' ) ); ?>" data-node-id="89:4023">Terms & Conditions</a>
					</div>
					<div class="estatein-footer-social" data-node-id="89:4024">
						<a href="#" class="estatein-social-link" data-node-id="89:4025" aria-label="Facebook">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none">
								<path d="M18 2H15C13.6739 2 12.4021 2.52678 11.4645 3.46447C10.5268 4.40215 10 5.67392 10 7V10H7V14H10V22H14V14H17L18 10H14V7C14 6.73478 14.1054 6.48043 14.2929 6.29289C14.4804 6.10536 14.7348 6 15 6H18V2Z" stroke="currentColor" stroke-width="2" fill="none"/>
							</svg>
						</a>
						<a href="#" class="estatein-social-link" data-node-id="89:4027" aria-label="Twitter">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none">
								<path d="M23 3C22.0424 3.67548 20.9821 4.19211 19.88 4.53C19.3676 3.83751 18.6691 3.34669 17.8921 3.12393C17.1151 2.90117 16.2812 2.95791 15.548 3.28589C14.8148 3.61387 14.2196 4.19645 13.8529 4.93371C13.4861 5.67098 13.3683 6.52048 13.52 7.34C12.0302 7.22373 10.5776 6.80426 9.25486 6.10912C7.93208 5.41399 6.76708 4.45718 5.83 3.3C5.13752 4.25243 4.86093 5.44013 5.06 6.6C5.25907 7.75987 5.92058 8.80989 6.9 9.5C6.44197 9.49464 5.99134 9.38259 5.585 9.17V9.22C5.58508 10.2224 5.97993 11.1832 6.68557 11.9065C7.39121 12.6298 8.35245 13.0557 9.35 13.09C8.93374 13.669 8.38674 14.1441 7.74828 14.4793C7.10982 14.8145 6.39575 15.0011 5.67 15.02C5.23427 15.0393 4.79777 15.0046 4.37 14.92C4.80424 15.8646 5.50786 16.6716 6.39911 17.2348C7.29036 17.798 8.32999 18.0939 9.39 18.09C7.31656 19.4956 4.78651 20.1419 2.24 19.9C1.69589 19.9716 1.14426 19.9325 0.616 19.78C3.16389 21.2745 6.0839 21.9995 9.06 22C9.40993 22.0007 9.75903 21.9819 10.106 21.94C13.1975 21.7508 16.1441 20.5099 18.49 18.41C20.8359 16.3101 22.4538 13.5633 23.09 10.54C23.7262 7.51666 23.3422 4.35814 22 1.5C21.3309 2.23748 20.5551 2.87187 19.7 3.38L23 3Z" stroke="currentColor" stroke-width="2" fill="none"/>
							</svg>
						</a>
						<a href="#" class="estatein-social-link" data-node-id="89:4030" aria-label="Instagram">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none">
								<rect x="2" y="2" width="20" height="20" rx="5" ry="5" stroke="currentColor" stroke-width="2" fill="none"/>
								<path d="M16 11.37C16.1234 12.2022 15.9813 13.0522 15.5938 13.799C15.2063 14.5458 14.5932 15.1514 13.8416 15.5297C13.0901 15.9079 12.2385 16.0396 11.4078 15.9059C10.5771 15.7723 9.80976 15.3801 9.21484 14.7852C8.61992 14.1902 8.22768 13.4229 8.09402 12.5922C7.96036 11.7615 8.09202 10.9099 8.47029 10.1584C8.84856 9.40685 9.45418 8.79374 10.201 8.40624C10.9478 8.01874 11.7978 7.87659 12.63 8C13.4789 8.12588 14.2649 8.52146 14.8717 9.1283C15.4785 9.73513 15.8741 10.5211 16 11.37Z" stroke="currentColor" stroke-width="2" fill="none"/>
							</svg>
						</a>
						<a href="#" class="estatein-social-link" data-node-id="89:4033" aria-label="YouTube">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none">
								<path d="M22.54 6.42C22.4212 5.94541 22.1793 5.51057 21.8387 5.15941C21.498 4.80824 21.0708 4.55318 20.6 4.42C18.88 4 12 4 12 4C12 4 5.12 4 3.4 4.4C2.92924 4.55318 2.50196 4.80824 2.16135 5.15941C1.82073 5.51057 1.57884 5.94541 1.46 6.42C1.14521 8.186 0.991203 9.97647 1 11.77C0.991203 13.5635 1.14521 15.354 1.46 17.12C1.57884 17.5946 1.82073 18.0294 2.16135 18.3806C2.50196 18.7318 2.92924 18.9868 3.4 19.12C5.12 19.52 12 19.52 12 19.52C12 19.52 18.88 19.52 20.6 19.12C21.0708 18.9868 21.498 18.7318 21.8387 18.3806C22.1793 18.0294 22.4212 17.5946 22.54 17.12C22.8528 15.354 23.0068 13.5635 23 11.77C23.0068 9.97647 22.8528 8.186 22.54 6.42Z" stroke="currentColor" stroke-width="2" fill="none"/>
								<path d="M9.75 15.02L15.5 11.77L9.75 8.52V15.02Z" stroke="currentColor" stroke-width="2" fill="none"/>
							</svg>
						</a>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
