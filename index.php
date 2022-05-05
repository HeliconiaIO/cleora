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
 * @package Cleora
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 py-5 max-w-7xl mx-auto px-4 sm:px-6 ">
        <div class="col-span-2">
					
					<?php
						if ( have_posts() ) :
							if ( is_home() && !is_front_page() ) :
								?>
								<header>
									<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
								</header>
								<?php
							endif;
							?>
							<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
							<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();
								/*
								* Include the Post-Type-specific template for the content.
								* If you want to override this in a child theme, then include a file
								* called content-___.php (where ___ is the Post Type name) and that will be used instead.
								*/
								get_template_part( 'template-parts/listing', get_post_type() );

							endwhile;

							endif;
							?>
							</div>
							
							<?php
								the_posts_pagination(array(
									'mid_size' => 5,
									'prev_text' => __( 'Previous Page', 'cleora' ),
									'next_text' => __( 'Next Page', 'cleora' ),
								));
							?>
				</div>
				<div id="sidebar">
					<?php get_sidebar('cleora-sidebar'); ?>
				</div>
		</div>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
