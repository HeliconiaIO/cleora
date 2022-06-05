<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Cleora
 */

get_header();
?>

	<main id="primary" class="site-main">
		
	<section class="text-gray-600 body-font">
		<div class="container mx-auto flex px-5 py-10 items-center justify-center flex-col">
			<div class="text-center lg:w-2/3 w-full">
				<h1 class="title-font sm:text-7xl text-3xl mb-4 font-medium text-gray-700"><?php print esc_html('404', 'cleora'); ?></h1>
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'cleora' ); ?></p>
				
				<div class="flex justify-center py-5">
					<?php get_search_form(); ?>
				</div>
				<p><?php print esc_html('or', 'cleora'); ?></p>
				<div class="flex justify-center">
					<a href="/" class="inline-flex bg-gray-600 text-white rounded hover:text-white hover:bg-gray-700 px-4 py-2"><?php print esc_html('Go Home', 'cleora'); ?></a>
				</div>
			</div>
		</div>
	</section>

	</main><!-- #main -->

<?php
get_footer();
