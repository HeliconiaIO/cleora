<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Cleora
 */

get_header();
?>

    <main id="primary" class="site-main">
		<div class="grid grid-cols-1 lg:grid-cols-3 gap-12 py-5 max-w-7xl mx-auto px-4 sm:px-6 ">
            <div class="col-span-2">
                <?php if ( have_posts() ) : ?>

                    <header class="page-header">
                        <h1 class="page-title">
                            <?php
                            /* translators: %s: search query. */
                            printf( esc_html__( 'Search Results for: %s', 'cleora' ), '<span>' . get_search_query() . '</span>' );
                            ?>
                        </h1>
                    </header><!-- .page-header -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
                    <?php
                    /* Start the Loop */
                    while ( have_posts() ) :
                        the_post();

                        /**
                         * Run the loop for the search to output the results.
                         * If you want to overload this in a child theme then include a file
                         * called content-search.php and that will be used instead.
                         */
                        get_template_part( 'template-parts/listing', 'search' );

                    endwhile;

                    the_posts_navigation();
                    ?>
                    </div>
                    <?php
                    

                else :

                    get_template_part( 'template-parts/content', 'none' );

                endif;
                ?>
                
            </div>
            <div id="sidebar">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </main><!-- #main -->

<?php
get_footer();
