<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Cleora
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="grid grid-cols-1 lg:grid-cols-3 gap-12 py-5 max-w-7xl mx-auto px-4 sm:px-6 ">
        <div class="col-span-2">
					<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content-single', get_post_type() );

							?>

							<div class="border-b">
								<?php the_post_navigation(
									array(
										'prev_text' => '<svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
											<path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
										</svg><span class="title-font font-medium"> %title</span>',
										'next_text' => '<span class="title-font font-medium">%title</span>
										<svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="w-6 h-6 flex-shrink-0 ml-4" viewBox="0 0 24 24">
											<path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
										</svg>',
									)
								); ?>
							</div>

							<?php

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
					?>
			</div>
			<div id="sidebar">
					<?php get_sidebar(); ?>
				</div>
		</div>	

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
