<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cleora
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('flow-hidden group'); ?>>
	<?php if( has_post_thumbnail() ) : ?>
	<a href="<?php print esc_url( get_the_permalink() ); ?>">
		<?php the_post_thumbnail("cleora-thumb", ['class' => 'lg:h-48 md:h-36 w-full object-cover object-center rounded-lg shadow-sm transition duration-300 group-hover:shadow-xl', 'title' => 'Feature image']); ?>
	</a>
	<?php endif; ?>
	<div class="py-4">
		<p class="text-xs title-font font-medium text-gray-400 my-0">
			<?php the_category(" | "); ?>
		</p>
		<?php the_title( '<h2 class="title-font text-xl font-semibold mb-3"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		<?php the_excerpt(); ?>
		<div class="flex items-center flex-wrap justify-between">
			<div class="text-gray-400 inline-flex items-center text-sm">
				<svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path></svg>
				<?php comments_number( '0', '1', '%'); ?>
			</div>
			<a href="<?php print esc_url( get_permalink() ); ?>" class="text-sm inline-flex items-center md:mb-2 lg:mb-0">
				<?php print esc_html_e('Read More', 'cleora'); ?>
				<svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path d="M5 12h14"></path> <path d="M12 5l7 7-7 7"></path></svg>
			</a>
		</div>
	</div>
</article>
