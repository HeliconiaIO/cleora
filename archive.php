<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cleora
 * 
**/
get_header();
?>

    <main id="primary" class="site-main">
		<div class="grid grid-cols-1 lg:grid-cols-3 gap-12 py-5 max-w-7xl mx-auto px-4 sm:px-6 ">
            <div class="col-span-2">
                <?php if ( have_posts() ) : ?>

                    <header class="page-header">
                        <?php
                        the_archive_title( '<h1 class="page-title">', '</h1>' );
                        the_archive_description( '<div class="archive-description">', '</div>' );
                        ?>
                    </header><!-- .page-header -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
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

                        the_posts_navigation();

                        else :

                            get_template_part( 'template-parts/content', 'none' );

                        endif;
                        ?>
                    </div>
            </div>
            <div id="sidebar">
                <?php get_sidebar('cleora-sidebar'); ?>
            </div>
        </div>
    </main>

<?php
get_footer();
