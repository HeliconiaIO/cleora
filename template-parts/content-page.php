<?php
/**
 * Template part for displaying page content in page.php
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
			<small class="text-xs text-gray-500 py-2">
				<?php
					edit_post_link(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Edit <span class="screen-reader-text">%s</span>', 'cleora' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post( get_the_title() )
						),
						'<span class="edit-link">',
						'</span>'
					);
				?>
			</small>
		</div> <!-- .entry-meta -->
	</header>
	<div class="entry-content pt-3">
		<?php
			the_content();
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cleora' ),
					'after'  => '</div>',
				)
			);
		?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
