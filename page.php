<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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

                get_template_part( 'template-parts/content', 'page' );

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
get_footer();
