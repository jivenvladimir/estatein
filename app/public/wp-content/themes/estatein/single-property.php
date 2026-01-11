<?php
/**
 * The template for displaying single property posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package real_estate
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php
	while ( have_posts() ) :
		the_post();
		$property_id = get_the_ID();
		$price = get_field( 'price', $property_id );
		$bedrooms = get_field( 'no_of_bedroom', $property_id );
		$bathrooms = get_field( 'no_of_bathroom', $property_id );
		$description = get_field( 'description', $property_id );
		$area = get_field( 'area', $property_id );
		$location = get_field( 'location', $property_id );
		$key_features = get_field( 'key_features', $property_id );
		$property_type = get_the_terms( $property_id, 'property_type' );
		$property_type_name = $property_type && ! is_wp_error( $property_type ) ? $property_type[0]->name : 'Property';
		
		// Get gallery images
		$gallery = get_field( 'gallery', $property_id );
		if ( ! $gallery ) {
			$gallery = array();
		}
		
		// Normalize gallery array - ACF gallery can return arrays or IDs
		$normalized_gallery = array();
		foreach ( $gallery as $item ) {
			if ( is_array( $item ) && isset( $item['ID'] ) ) {
				$image_id = (int) $item['ID'];
			} elseif ( is_numeric( $item ) ) {
				$image_id = (int) $item;
			} else {
				continue; // Skip invalid items
			}
			
			// Verify the attachment exists and has valid metadata
			if ( wp_attachment_is_image( $image_id ) ) {
				// Check if attachment metadata exists and is valid
				$metadata = wp_get_attachment_metadata( $image_id );
				if ( $metadata && isset( $metadata['width'] ) && isset( $metadata['height'] ) ) {
					$normalized_gallery[] = $image_id;
				}
			}
		}
		
		// Add featured image if it exists and isn't already in gallery
		if ( has_post_thumbnail() ) {
			$thumbnail_id = get_post_thumbnail_id();
			if ( ! in_array( $thumbnail_id, $normalized_gallery, true ) ) {
				array_unshift( $normalized_gallery, $thumbnail_id );
			}
		}
		
		$gallery = $normalized_gallery;
		?>

		<!-- Property Details Section -->
		<section class="estatein-property-details" data-node-id="166:773">
			<div class="estatein-container">
				<!-- Property Header -->
				<div class="estatein-property-header" data-node-id="166:775">
					<div class="estatein-property-title-section" data-node-id="166:776">
						<h1 class="estatein-property-title" data-node-id="166:777"><?php the_title(); ?></h1>
						<?php if ( $location ) : ?>
							<div class="estatein-property-location" data-node-id="166:778">
								<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M10 10C11.3807 10 12.5 8.88071 12.5 7.5C12.5 6.11929 11.3807 5 10 5C8.61929 5 7.5 6.11929 7.5 7.5C7.5 8.88071 8.61929 10 10 10Z" stroke="currentColor" stroke-width="1.5"/>
									<path d="M10 18.3333C13.3333 15 16.6667 11.6667 16.6667 8.33333C16.6667 5.23858 14.0952 2.66667 10 2.66667C5.90481 2.66667 3.33333 5.23858 3.33333 8.33333C3.33333 11.6667 6.66667 15 10 18.3333Z" stroke="currentColor" stroke-width="1.5"/>
								</svg>
								<span><?php echo esc_html( $location ); ?></span>
							</div>
						<?php endif; ?>
					</div>
					<?php if ( $price ) : ?>
						<div class="estatein-property-price-section" data-node-id="166:782">
							<p class="estatein-price-label" data-node-id="166:783">Price</p>
							<p class="estatein-price-amount" data-node-id="166:784">$<?php echo number_format( $price ); ?></p>
						</div>
					<?php endif; ?>
				</div>

				<!-- Property Gallery -->
				<?php if ( ! empty( $gallery ) ) : ?>
					<div class="estatein-property-gallery" data-node-id="166:785">
						<!-- Thumbnail Gallery -->
						<div class="estatein-gallery-thumbnails" data-node-id="166:786">
							<?php
							$thumbnail_count = min( 9, count( $gallery ) );
							for ( $i = 0; $i < $thumbnail_count; $i++ ) :
								if ( ! isset( $gallery[ $i ] ) ) {
									continue; // Skip if index doesn't exist
								}
								$image_id = (int) $gallery[ $i ];
								
								// Verify image exists and has valid metadata before using it
								if ( ! wp_attachment_is_image( $image_id ) ) {
									continue;
								}
								
								// Check metadata exists to prevent errors
								$metadata = wp_get_attachment_metadata( $image_id );
								if ( ! $metadata || ! isset( $metadata['width'] ) || ! isset( $metadata['height'] ) ) {
									continue;
								}
								
								// Safely get the image with comprehensive validation
								$image_html = estatein_safe_get_attachment_image( $image_id, 'thumbnail', false, array( 'alt' => get_the_title() ) );
								if ( empty( $image_html ) ) {
									continue;
								}
								?>
								<div class="estatein-gallery-thumbnail <?php echo $i === 0 ? 'active' : ''; ?>" data-index="<?php echo $i; ?>" data-node-id="166:<?php echo 787 + $i; ?>">
									<?php echo $image_html; ?>
								</div>
							<?php endfor; ?>
						</div>

						<!-- Main Gallery Images -->
						<div class="estatein-gallery-main" data-node-id="166:796">
							<?php
							$main_images = array_slice( $gallery, 0, 2 );
							$displayed_count = 0;
							foreach ( $main_images as $index => $image_id ) :
								$image_id = (int) $image_id;
								
								// Verify image exists and has valid metadata before using it
								if ( ! wp_attachment_is_image( $image_id ) ) {
									continue;
								}
								
								// Check metadata exists to prevent errors
								$metadata = wp_get_attachment_metadata( $image_id );
								if ( ! $metadata || ! isset( $metadata['width'] ) || ! isset( $metadata['height'] ) ) {
									continue;
								}
								
								// Safely get the image with comprehensive validation
								$image_html = estatein_safe_get_attachment_image( $image_id, 'large', false, array( 'alt' => get_the_title() ) );
								if ( empty( $image_html ) ) {
									continue;
								}
								?>
								<div class="estatein-gallery-main-image" data-node-id="166:<?php echo 797 + $displayed_count; ?>">
									<?php echo $image_html; ?>
								</div>
								<?php
								$displayed_count++;
							endforeach; ?>
						</div>

						<!-- Gallery Navigation -->
						<div class="estatein-gallery-nav" data-node-id="166:799">
							<button class="estatein-gallery-prev" aria-label="Previous image" data-node-id="166:800">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</button>
							<div class="estatein-gallery-indicators" data-node-id="166:803">
								<?php
								$total_images = count( $gallery );
								for ( $i = 0; $i < min( 6, $total_images ); $i++ ) :
									?>
									<span class="estatein-gallery-indicator <?php echo $i === 0 ? 'active' : ''; ?>" data-index="<?php echo $i; ?>" data-node-id="166:<?php echo 804 + $i; ?>"></span>
								<?php endfor; ?>
							</div>
							<button class="estatein-gallery-next" aria-label="Next image" data-node-id="166:810">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</button>
						</div>
					</div>
				<?php endif; ?>

				<!-- Property Content -->
				<div class="estatein-property-content-wrapper" data-node-id="166:813">
					<!-- Left Column: Description & Details -->
					<div class="estatein-property-details-left" data-node-id="166:814">
						<div class="estatein-property-description" data-node-id="166:815">
							<h2 class="estatein-section-heading" data-node-id="166:816">Description</h2>
							<?php if ( $description ) : ?>
								<p class="estatein-description-text" data-node-id="166:817"><?php echo esc_html( $description ); ?></p>
							<?php else : ?>
								<div class="estatein-description-text" data-node-id="166:817">
									<?php the_content(); ?>
								</div>
							<?php endif; ?>
						</div>

						<div class="estatein-property-specs" data-node-id="166:818">
							<?php if ( $bedrooms ) : ?>
								<div class="estatein-spec-item" data-node-id="166:819">
									<div class="estatein-spec-header" data-node-id="166:820">
										<img src="<?php echo get_template_directory_uri(); ?>/icons/bedroom-icon.svg" alt="Bedrooms" width="20" height="20">
										<span class="estatein-spec-label" data-node-id="166:825">Bedrooms</span>
									</div>
									<p class="estatein-spec-value" data-node-id="166:826"><?php echo esc_html( str_pad( $bedrooms, 2, '0', STR_PAD_LEFT ) ); ?></p>
								</div>
							<?php endif; ?>

							<?php if ( $bathrooms ) : ?>
								<div class="estatein-spec-divider" data-node-id="166:827"></div>
								<div class="estatein-spec-item" data-node-id="166:828">
									<div class="estatein-spec-header" data-node-id="166:829">
										<img src="<?php echo get_template_directory_uri(); ?>/icons/bathroom-icon.svg" alt="Bathrooms" width="20" height="20">
										<span class="estatein-spec-label" data-node-id="166:837">Bathrooms</span>
									</div>
									<p class="estatein-spec-value" data-node-id="166:838"><?php echo esc_html( str_pad( $bathrooms, 2, '0', STR_PAD_LEFT ) ); ?></p>
								</div>
							<?php endif; ?>

							<?php if ( $area ) : ?>
								<div class="estatein-spec-divider" data-node-id="166:839"></div>
								<div class="estatein-spec-item" data-node-id="166:840">
									<div class="estatein-spec-header" data-node-id="166:841">
										<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M2.5 5L10 2.5L17.5 5V15L10 17.5L2.5 15V5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M10 2.5V17.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M2.5 5L10 10L17.5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
										</svg>
										<span class="estatein-spec-label" data-node-id="166:845">Area</span>
									</div>
									<p class="estatein-spec-value" data-node-id="166:846"><?php echo esc_html( $area ); ?></p>
								</div>
							<?php endif; ?>
						</div>
					</div>

					<!-- Right Column: Key Features -->
					<div class="estatein-property-features" data-node-id="166:847">
						<h2 class="estatein-section-heading" data-node-id="166:848">Key Features and Amenities</h2>
						<?php if ( $key_features && is_array( $key_features ) ) : ?>
							<div class="estatein-features-list" data-node-id="166:849">
								<?php foreach ( $key_features as $index => $feature ) : ?>
									<div class="estatein-feature-item" data-node-id="166:<?php echo 850 + $index; ?>">
										<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#703BF7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
										</svg>
										<span><?php echo esc_html( $feature ); ?></span>
									</div>
								<?php endforeach; ?>
							</div>
						<?php else : ?>
							<div class="estatein-features-list" data-node-id="166:849">
								<p class="estatein-no-features">No features listed for this property.</p>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>

		<!-- Comprehensive Pricing Details Section -->
		<section class="estatein-pricing-details" data-node-id="102:10045">
			<div class="estatein-container">
				<div class="estatein-pricing-header" data-node-id="102:9806">
					<h2 class="estatein-pricing-title" data-node-id="102:9807">Comprehensive Pricing Details</h2>
					<p class="estatein-pricing-description" data-node-id="102:9808">At Estatein, transparency is key. We want you to have a clear understanding of all costs associated with your property investment. Below, we break down the pricing for <?php echo esc_html( get_the_title() ); ?> to help you make an informed decision</p>
				</div>

				<div class="estatein-pricing-note" data-node-id="102:10040">
					<p class="estatein-pricing-note-label" data-node-id="102:10041">Note</p>
					<p class="estatein-pricing-note-text" data-node-id="102:10042">The figures provided above are estimates and may vary depending on the property, location, and individual circumstances.</p>
				</div>

				<div class="estatein-pricing-content" data-node-id="102:10039">
					<div class="estatein-pricing-listing-price" data-node-id="102:9832">
						<p class="estatein-pricing-label" data-node-id="102:9833">Listing Price</p>
						<p class="estatein-pricing-amount-large" data-node-id="102:9834">$<?php echo number_format( $price ? $price : 0 ); ?></p>
					</div>

					<div class="estatein-pricing-sections" data-node-id="102:9943">
						<!-- Additional Fees -->
						<div class="estatein-pricing-section" data-node-id="102:9871">
							<div class="estatein-pricing-section-header" data-node-id="102:9898">
								<h3 class="estatein-pricing-section-title" data-node-id="102:9895">Additional Fees</h3>
								<button class="estatein-pricing-learn-more" data-node-id="102:9899">Learn More</button>
							</div>
							<div class="estatein-pricing-divider"></div>
							<div class="estatein-pricing-items" data-node-id="102:9857">
								<div class="estatein-pricing-item" data-node-id="102:9841">
									<p class="estatein-pricing-item-label" data-node-id="102:9842">Property Transfer Tax</p>
									<div class="estatein-pricing-item-value" data-node-id="102:9850">
										<p class="estatein-pricing-item-amount" data-node-id="102:9843">$25,000</p>
										<span class="estatein-pricing-item-note" data-node-id="102:9848">Based on the sale price and local regulations</span>
									</div>
								</div>
								<div class="estatein-pricing-divider-vertical"></div>
								<div class="estatein-pricing-item" data-node-id="102:9851">
									<p class="estatein-pricing-item-label" data-node-id="102:9852">Legal Fees</p>
									<div class="estatein-pricing-item-value" data-node-id="102:9853">
										<p class="estatein-pricing-item-amount" data-node-id="102:9854">$3,000</p>
										<span class="estatein-pricing-item-note" data-node-id="102:9855">Approximate cost for legal services, including title transfer</span>
									</div>
								</div>
							</div>
							<div class="estatein-pricing-divider"></div>
							<div class="estatein-pricing-items" data-node-id="102:9858">
								<div class="estatein-pricing-item" data-node-id="102:9859">
									<p class="estatein-pricing-item-label" data-node-id="102:9860">Home Inspection</p>
									<div class="estatein-pricing-item-value" data-node-id="102:9861">
										<p class="estatein-pricing-item-amount" data-node-id="102:9862">$500</p>
										<span class="estatein-pricing-item-note" data-node-id="102:9863">Recommended for due diligence</span>
									</div>
								</div>
								<div class="estatein-pricing-divider-vertical"></div>
								<div class="estatein-pricing-item" data-node-id="102:9865">
									<p class="estatein-pricing-item-label" data-node-id="102:9866">Property Insurance</p>
									<div class="estatein-pricing-item-value" data-node-id="102:9867">
										<p class="estatein-pricing-item-amount" data-node-id="102:9868">$1,200</p>
										<span class="estatein-pricing-item-note" data-node-id="102:9869">Annual cost for comprehensive property insurance</span>
									</div>
								</div>
							</div>
							<div class="estatein-pricing-divider"></div>
							<div class="estatein-pricing-item" data-node-id="102:9885">
								<p class="estatein-pricing-item-label" data-node-id="102:9886">Mortgage Fees</p>
								<div class="estatein-pricing-item-value" data-node-id="102:9887">
									<p class="estatein-pricing-item-amount" data-node-id="102:9888">Varies</p>
									<span class="estatein-pricing-item-note" data-node-id="102:9889">If applicable, consult with your lender for specific details</span>
								</div>
							</div>
						</div>

						<!-- Monthly Costs -->
						<div class="estatein-pricing-section" data-node-id="102:9901">
							<div class="estatein-pricing-section-header" data-node-id="102:9902">
								<h3 class="estatein-pricing-section-title" data-node-id="102:9903">Monthly Costs</h3>
								<button class="estatein-pricing-learn-more" data-node-id="102:9904">Learn More</button>
							</div>
							<div class="estatein-pricing-divider"></div>
							<div class="estatein-pricing-item" data-node-id="102:9944">
								<p class="estatein-pricing-item-label" data-node-id="102:9945">Property Taxes</p>
								<div class="estatein-pricing-item-value" data-node-id="102:9946">
									<p class="estatein-pricing-item-amount" data-node-id="102:9947">$1,250</p>
									<span class="estatein-pricing-item-note" data-node-id="102:9948">Approximate monthly property tax based on the sale price and local rates</span>
								</div>
							</div>
							<div class="estatein-pricing-divider"></div>
							<div class="estatein-pricing-item" data-node-id="102:9951">
								<p class="estatein-pricing-item-label" data-node-id="102:9952">Homeowners' Association Fee</p>
								<div class="estatein-pricing-item-value" data-node-id="102:9953">
									<p class="estatein-pricing-item-amount" data-node-id="102:9954">$300</p>
									<span class="estatein-pricing-item-note" data-node-id="102:9955">Monthly fee for common area maintenance and security</span>
								</div>
							</div>
						</div>

						<!-- Total Initial Costs -->
						<div class="estatein-pricing-section" data-node-id="102:9957">
							<div class="estatein-pricing-section-header" data-node-id="102:9958">
								<h3 class="estatein-pricing-section-title" data-node-id="102:9959">Total Initial Costs</h3>
								<button class="estatein-pricing-learn-more" data-node-id="102:9960">Learn More</button>
							</div>
							<div class="estatein-pricing-divider"></div>
							<div class="estatein-pricing-items" data-node-id="102:9976">
								<div class="estatein-pricing-item" data-node-id="102:9977">
									<p class="estatein-pricing-item-label" data-node-id="102:9978">Listing Price</p>
									<p class="estatein-pricing-item-amount" data-node-id="102:10004">$<?php echo number_format( $price ? $price : 0 ); ?></p>
								</div>
								<div class="estatein-pricing-divider-vertical"></div>
								<div class="estatein-pricing-item" data-node-id="102:9984">
									<p class="estatein-pricing-item-label" data-node-id="102:9985">Additional Fees</p>
									<div class="estatein-pricing-item-value" data-node-id="102:9986">
										<p class="estatein-pricing-item-amount" data-node-id="102:9987">$29,700</p>
										<span class="estatein-pricing-item-note" data-node-id="102:9988">Property transfer tax, legal fees, inspection, insurance</span>
									</div>
								</div>
							</div>
							<div class="estatein-pricing-divider"></div>
							<div class="estatein-pricing-items" data-node-id="102:9990">
								<div class="estatein-pricing-item" data-node-id="102:9991">
									<p class="estatein-pricing-item-label" data-node-id="102:9992">Down Payment</p>
									<div class="estatein-pricing-item-value" data-node-id="102:9993">
										<p class="estatein-pricing-item-amount" data-node-id="102:9994">$250,000</p>
										<span class="estatein-pricing-item-note" data-node-id="102:9995">20%</span>
									</div>
								</div>
								<div class="estatein-pricing-divider-vertical"></div>
								<div class="estatein-pricing-item" data-node-id="102:9998">
									<p class="estatein-pricing-item-label" data-node-id="102:9999">Mortgage Amount</p>
									<div class="estatein-pricing-item-value" data-node-id="102:10000">
										<p class="estatein-pricing-item-amount" data-node-id="102:10001">$1,000,000</p>
										<span class="estatein-pricing-item-note" data-node-id="102:10002">If applicable</span>
									</div>
								</div>
							</div>
						</div>

						<!-- Monthly Expenses -->
						<div class="estatein-pricing-section" data-node-id="102:10006">
							<div class="estatein-pricing-section-header" data-node-id="102:10007">
								<h3 class="estatein-pricing-section-title" data-node-id="102:10008">Monthly Expenses</h3>
								<button class="estatein-pricing-learn-more" data-node-id="102:10009">Learn More</button>
							</div>
							<div class="estatein-pricing-divider"></div>
							<div class="estatein-pricing-items" data-node-id="102:10012">
								<div class="estatein-pricing-item" data-node-id="102:10013">
									<p class="estatein-pricing-item-label" data-node-id="102:10014">Property Taxes</p>
									<p class="estatein-pricing-item-amount" data-node-id="102:10015">$1,250</p>
								</div>
								<div class="estatein-pricing-divider-vertical"></div>
								<div class="estatein-pricing-item" data-node-id="102:10017">
									<p class="estatein-pricing-item-label" data-node-id="102:10018">Homeowners' Association Fee</p>
									<p class="estatein-pricing-item-amount" data-node-id="102:10038">$300</p>
								</div>
							</div>
							<div class="estatein-pricing-divider"></div>
							<div class="estatein-pricing-items" data-node-id="102:10024">
								<div class="estatein-pricing-item" data-node-id="102:10025">
									<p class="estatein-pricing-item-label" data-node-id="102:10026">Mortgage Payment</p>
									<div class="estatein-pricing-item-value" data-node-id="102:10027">
										<p class="estatein-pricing-item-amount-text" data-node-id="102:10028">Varies based on terms and interest rate</p>
										<span class="estatein-pricing-item-note" data-node-id="102:10029">If applicable</span>
									</div>
								</div>
								<div class="estatein-pricing-divider-vertical"></div>
								<div class="estatein-pricing-item" data-node-id="102:10032">
									<p class="estatein-pricing-item-label" data-node-id="102:10033">Property Insurance</p>
									<div class="estatein-pricing-item-value" data-node-id="102:10034">
										<p class="estatein-pricing-item-amount" data-node-id="102:10035">$100</p>
										<span class="estatein-pricing-item-note" data-node-id="102:10036">Approximate monthly cost</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Inquire About Property Section -->
		<section class="estatein-inquire-section" data-node-id="102:10294">
			<div class="estatein-container">
				<div class="estatein-inquire-content" data-node-id="102:10294">
					<div class="estatein-inquire-text" data-node-id="102:10047">
						<h2 class="estatein-inquire-title" data-node-id="102:10048">Inquire About <?php echo esc_html( get_the_title() ); ?></h2>
						<p class="estatein-inquire-description" data-node-id="102:10049">Interested in this property? Fill out the form below, and our real estate experts will get back to you with more details, including scheduling a viewing and answering any questions you may have.</p>
					</div>

					<?php
					// Display success/error messages
					$inquire_success = get_transient( 'estatein_inquire_success' );
					$inquire_error   = get_transient( 'estatein_inquire_error' );

					if ( $inquire_success ) {
						delete_transient( 'estatein_inquire_success' );
						echo '<div class="estatein-form-message estatein-form-success">' . esc_html( $inquire_success ) . '</div>';
					}

					if ( $inquire_error ) {
						delete_transient( 'estatein_inquire_error' );
						echo '<div class="estatein-form-message estatein-form-error">' . esc_html( $inquire_error ) . '</div>';
					}
					?>

					<form class="estatein-inquire-form" data-node-id="102:10204" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
						<?php wp_nonce_field( 'estatein_inquire_form', 'estatein_inquire_nonce' ); ?>
						<input type="hidden" name="action" value="estatein_inquire_form">
						<input type="hidden" name="property_id" value="<?php echo esc_attr( $property_id ); ?>">
						<input type="hidden" name="property_title" value="<?php echo esc_attr( get_the_title() ); ?>">

						<div class="estatein-inquire-form-fields" data-node-id="102:10205">
							<div class="estatein-inquire-form-row" data-node-id="181:3589">
								<div class="estatein-inquire-form-field" data-node-id="181:3590">
									<label class="estatein-inquire-form-label" data-node-id="181:3591">First Name</label>
									<input type="text" class="estatein-inquire-form-input" data-node-id="181:3592" placeholder="Enter First Name" name="first_name" required>
								</div>
								<div class="estatein-inquire-form-field" data-node-id="181:3594">
									<label class="estatein-inquire-form-label" data-node-id="181:3595">Last Name</label>
									<input type="text" class="estatein-inquire-form-input" data-node-id="181:3596" placeholder="Enter Last Name" name="last_name" required>
								</div>
							</div>

							<div class="estatein-inquire-form-row" data-node-id="102:10277">
								<div class="estatein-inquire-form-field" data-node-id="102:10286">
									<label class="estatein-inquire-form-label" data-node-id="102:10287">Email</label>
									<input type="email" class="estatein-inquire-form-input" data-node-id="102:10288" placeholder="Enter your Email" name="email" required>
								</div>
								<div class="estatein-inquire-form-field" data-node-id="102:10290">
									<label class="estatein-inquire-form-label" data-node-id="102:10291">Phone</label>
									<input type="tel" class="estatein-inquire-form-input" data-node-id="102:10292" placeholder="Enter Phone Number" name="phone" required>
								</div>
							</div>

							<div class="estatein-inquire-form-field" data-node-id="181:3618">
								<label class="estatein-inquire-form-label" data-node-id="181:3619">Selected Property</label>
								<div class="estatein-inquire-form-selected-property" data-node-id="181:3620">
									<span class="estatein-selected-property-text" data-node-id="181:3621"><?php echo esc_html( get_the_title() ); ?><?php if ( $location ) : ?>, <?php echo esc_html( $location ); ?><?php endif; ?></span>
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" data-node-id="181:3622">
										<path d="M6 9L12 15L18 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>
								</div>
							</div>

							<div class="estatein-inquire-form-field" data-node-id="102:10267">
								<label class="estatein-inquire-form-label" data-node-id="102:10268">Message</label>
								<textarea class="estatein-inquire-form-textarea" data-node-id="102:10269" placeholder="Enter your Message here.." name="message" rows="6" required></textarea>
							</div>
						</div>

						<div class="estatein-inquire-form-footer" data-node-id="102:10271">
							<div class="estatein-inquire-form-checkbox" data-node-id="102:10272">
								<input type="checkbox" id="inquire-terms" class="estatein-inquire-form-checkbox-input" data-node-id="102:10273" name="terms" required>
								<label for="inquire-terms" class="estatein-inquire-form-checkbox-label" data-node-id="102:10274">
									I agree with <a href="#" class="estatein-link">Terms of Use</a> and <a href="#" class="estatein-link">Privacy Policy</a>
								</label>
							</div>
							<button type="submit" class="estatein-inquire-form-submit" data-node-id="102:10275">
								<span data-node-id="102:10276">Send Your Message</span>
							</button>
						</div>
					</form>
				</div>
			</div>
		</section>

		<!-- FAQ Section -->
		<section class="estatein-property-faq" data-node-id="130:6099">
			<div class="estatein-container">
				<div class="estatein-property-faq-header" data-node-id="130:6100">
					<div class="estatein-property-faq-text" data-node-id="130:6101">
						<h2 class="estatein-property-faq-title" data-node-id="130:6102">Frequently Asked Questions</h2>
						<p class="estatein-property-faq-description" data-node-id="130:6103">Find answers to common questions about Estatein's services, property listings, and the real estate process. We're here to provide clarity and assist you every step of the way.</p>
					</div>
					<a href="<?php echo esc_url( home_url( '/faq' ) ); ?>" class="estatein-property-faq-view-all" data-node-id="130:6126">View All FAQ's</a>
				</div>

				<div class="estatein-property-faq-grid" data-node-id="130:6128">
					<?php
					$faqs_per_page = 3;
					$current_page = 1; // Always showing first page on property details
					
					$faqs_args = array(
						'post_type'      => 'faq',
						'posts_per_page' => $faqs_per_page,
						'post_status'    => 'publish',
						'orderby'        => 'date',
						'order'          => 'DESC',
						'paged'          => $current_page,
					);

					$faqs_query = new WP_Query( $faqs_args );
					
					// Calculate total pages
					$total_faqs = $faqs_query->found_posts;
					$total_pages = ceil( $total_faqs / $faqs_per_page );

					if ( $faqs_query->have_posts() ) :
						while ( $faqs_query->have_posts() ) :
							$faqs_query->the_post();
							?>
							<div class="estatein-property-faq-card" data-node-id="130:6130">
								<h3 class="estatein-property-faq-question" data-node-id="130:6131"><?php echo esc_html( get_field( 'question' ) ? get_field( 'question' ) : get_the_title() ); ?></h3>
								<p class="estatein-property-faq-answer" data-node-id="130:6132"><?php echo esc_html( get_field( 'answer' ) ? get_field( 'answer' ) : get_the_excerpt() ); ?></p>
								<a href="<?php echo esc_url( home_url( '/faq' ) ); ?>" class="estatein-property-faq-link" data-node-id="130:6133">Read More</a>
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

				<div class="estatein-property-faq-nav" data-node-id="130:6145">
					<p class="estatein-property-faq-pagination" data-node-id="130:6146">
						<span class="estatein-faq-page-current"><?php echo esc_html( str_pad( $current_page, 2, '0', STR_PAD_LEFT ) ); ?></span> of <?php echo esc_html( $total_pages > 0 ? $total_pages : 1 ); ?>
					</p>
					<div class="estatein-property-faq-nav-buttons" data-node-id="130:6147">
						<button class="estatein-property-faq-nav-btn estatein-property-faq-nav-prev" data-node-id="130:6148" aria-label="Previous">
							<svg width="30" height="30" viewBox="0 0 30 30" fill="none">
								<path d="M18.75 7.5L11.25 15L18.75 22.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</button>
						<button class="estatein-property-faq-nav-btn estatein-property-faq-nav-next" data-node-id="130:6151" aria-label="Next">
							<svg width="30" height="30" viewBox="0 0 30 30" fill="none">
								<path d="M11.25 7.5L18.75 15L11.25 22.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</button>
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

		<?php
	endwhile;
	?>
</main><!-- #main -->

<?php
get_footer();
