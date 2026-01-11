<?php
/**
 * Template Name: Blog Page
 * The template for displaying the Blog page
 *
 * @package real_estate
 */

get_header();

// Get blog posts
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$blog_args = array(
	'post_type'      => 'post',
	'posts_per_page' => 9,
	'post_status'    => 'publish',
	'paged'          => $paged,
	'orderby'        => 'date',
	'order'          => 'DESC',
);

$blog_query = new WP_Query( $blog_args );
?>

<main id="primary" class="site-main">

	<!-- Blog Hero Section -->
	<section class="estatein-blog-hero" data-node-id="blog:hero">
		<div class="estatein-container">
			<div class="estatein-blog-hero-content">
				<div class="estatein-blog-text-container">
					<h1 class="estatein-blog-heading" data-node-id="blog:heading">Our Blog</h1>
					<p class="estatein-blog-subtitle" data-node-id="blog:subtitle">Stay updated with the latest news, insights, and tips from the world of real estate. Discover expert advice, market trends, and valuable information to help you make informed decisions.</p>
				</div>
			</div>
		</div>
	</section>

	<!-- Blog Posts Listing Section -->
	<section class="estatein-blog-listing" data-node-id="blog:listing">
		<div class="estatein-container">
			<div class="estatein-blog-listing-content">
				<?php if ( $blog_query->have_posts() ) : ?>
					<div class="estatein-blog-grid-section">
						<div class="estatein-blog-grid">
							<?php
							/* Start the Loop */
							while ( $blog_query->have_posts() ) :
								$blog_query->the_post();
								?>
								<article class="estatein-blog-card" id="post-<?php the_ID(); ?>" <?php post_class(); ?> data-node-id="blog:card">
									<?php if ( has_post_thumbnail() ) : ?>
										<div class="estatein-blog-card-image" data-node-id="blog:image">
											<a href="<?php the_permalink(); ?>">
												<?php the_post_thumbnail( 'medium_large', array( 'alt' => get_the_title() ) ); ?>
											</a>
										</div>
									<?php else : ?>
										<div class="estatein-blog-card-image" data-node-id="blog:image">
											<a href="<?php the_permalink(); ?>">
												<img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog-placeholder.jpg" alt="<?php echo esc_attr( get_the_title() ); ?>">
											</a>
										</div>
									<?php endif; ?>
									<div class="estatein-blog-card-content" data-node-id="blog:content">
										<div class="estatein-blog-card-meta" data-node-id="blog:meta">
											<span class="estatein-blog-card-date" data-node-id="blog:date">
												<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M15.8333 3.33334H4.16667C3.24619 3.33334 2.5 4.07953 2.5 5.00001V15C2.5 15.9205 3.24619 16.6667 4.16667 16.6667H15.8333C16.7538 16.6667 17.5 15.9205 17.5 15V5.00001C17.5 4.07953 16.7538 3.33334 15.8333 3.33334Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
													<path d="M13.3333 1.66666V5.00001" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
													<path d="M6.66667 1.66666V5.00001" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
													<path d="M2.5 8.33334H17.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
												<?php echo get_the_date(); ?>
											</span>
											<?php
											$categories = get_the_category();
											if ( ! empty( $categories ) ) :
												?>
												<span class="estatein-blog-card-category" data-node-id="blog:category">
													<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M3.33333 10L10 3.33334L16.6667 10M10 16.6667V3.33334" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
													</svg>
													<?php echo esc_html( $categories[0]->name ); ?>
												</span>
											<?php endif; ?>
										</div>
										<h2 class="estatein-blog-card-title" data-node-id="blog:title">
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h2>
										<p class="estatein-blog-card-excerpt" data-node-id="blog:excerpt">
											<?php
											$excerpt = get_the_excerpt();
											if ( empty( $excerpt ) ) {
												$excerpt = wp_trim_words( get_the_content(), 20, '...' );
											}
											echo esc_html( $excerpt );
											?>
										</p>
										<div class="estatein-blog-card-footer" data-node-id="blog:footer">
											<div class="estatein-blog-card-author" data-node-id="blog:author">
												<?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
												<span><?php the_author(); ?></span>
											</div>
											<a href="<?php the_permalink(); ?>" class="estatein-blog-card-link" data-node-id="blog:link">
												Read More
												<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M7.5 15L12.5 10L7.5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</a>
										</div>
									</div>
								</article>
								<?php
							endwhile;
							wp_reset_postdata();
							?>
						</div>

						<!-- Pagination -->
						<div class="estatein-blog-pagination" data-node-id="blog:pagination">
							<?php
							$big = 999999999; // need an unlikely integer
							echo paginate_links(
								array(
									'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
									'format'    => '?paged=%#%',
									'current'   => max( 1, get_query_var( 'paged' ) ),
									'total'     => $blog_query->max_num_pages,
									'mid_size'  => 2,
									'prev_text' => '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.5 15L7.5 10L12.5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg> Previous',
									'next_text' => 'Next <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.5 15L12.5 10L7.5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>',
								)
							);
							?>
						</div>
					</div>
				<?php else : ?>
					<div class="estatein-blog-empty" data-node-id="blog:empty">
						<h2>No posts found</h2>
						<p>Sorry, no blog posts were found. Please check back later.</p>
					</div>
				<?php endif; ?>
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

</main><!-- #main -->

<?php
get_footer();
