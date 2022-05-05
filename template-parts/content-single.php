<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cleora
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('text-gray-700'); ?>>
	<?php if( has_post_thumbnail() ) : ?>
	<div class="entry-feature-image pb-3">
		<a href="<?php print esc_url(get_the_permalink( get_the_ID() )); ?>">
			<?php the_post_thumbnail("cleora-medium", array('class' => 'rounded-xl transition duration-300 hover:shadow-xl')); ?>
		</a>
	</div>
	<?php endif; ?>
	<header class="entry-header border-b py-2">
		<?php the_title( '<h1 class="entry-title my-0"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>
		<div class="entry-meta flex justify-between">
			<small class="text-xs text-gray-500 py-2">
				<span class="posted-on">
					<?php
					cleora_posted_on();
					?>
				</span>
				<span class="byline"> <span class="author vcard">
					<?php
					cleora_posted_by();
					?>
				</span>
			</small>
			<small>
				<?php cleora_post_edit(); ?>
			</small>
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content pt-3">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'cleora' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cleora' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer border-b py-3">
			<?php cleora_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->


<?php if ( (bool) get_the_author_meta( 'description' ) && post_type_supports( get_post_type(), 'author' ) ) : ?>
	<div class="article-single-author-bio <?php echo get_option( 'show_avatars' ) ? 'show-avatars' : ''; ?>">
		<?php echo get_avatar( get_the_author_meta( 'ID' ), '85' ); ?>
		<div class="author-bio-content">
			<h2 class="author-title">
			<?php
			printf(
				/* translators: %s: Author name. */
				esc_html__( 'By %s', 'cleora' ),
				get_the_author()
			);
			?>
			</h2>
			<p class="author-description"> <?php the_author_meta( 'description' ); ?></p><!-- .author-description -->
			<?php
			printf(
				'<a class="author-link" href="%1$s" rel="author">%2$s</a>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				sprintf(
					/* translators: %s: Author name. */
					esc_html__( 'View all of %s\'s posts.', 'cleora' ),
					get_the_author()
				)
			);
			?>
		</div><!-- .author-bio-content -->
	</div><!-- .author-bio -->
<?php endif; ?>