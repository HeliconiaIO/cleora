<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Cleora
 */

if( !function_exists('cleora_comments_lists') ){
	function cleora_comments_lists($comment, $args, $depth){
		?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

			<div class="border my-2 px-4 py-3 rounded-lg transition duration-300 hover:shadow-lg">
				<div class="flex items-center">
					<?php echo get_avatar($comment,$size='50',$default='http://0.gravatar.com/avatar/36c2a25e62935705c5565ec465c59a70?s=32&d=mm&r=g', get_comment_author(), ['class'=>'rounded-circle'] ); ?>
					<div class="ml-2">
						<?php if ($comment->comment_approved == '0') : ?>
							<em><?php esc_html_e('Your comment is awaiting moderation.','cleora') ?></em>
							<br />
						<?php endif; ?>
						<div class="text-lg font-semibold">
							<a href="<?php print esc_attr(get_comment_author_url()); ?>">
								<?php print esc_attr(get_comment_author()); ?>
							</a>
						</div>
						<div class="text-gray-500 text-xs"><?php printf(/* translators: 1: date and time(s). */ esc_html__('%1$s at %2$s' , 'cleora'), esc_attr(get_comment_date()),  esc_attr(get_comment_time())) ?></div>
					</div>
				</div>
				<p class="text-gray-800 text-sm mt-2 leading-normal md:leading-relaxed comments-content">
					<?php echo get_comment_text(); ?>
				</p>
				<div class="text-gray-500 text-xs flex items-center mt-3 comment-reply">
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div>
			</div>
			
			<!-- <div class="comment">
				<div class="comment-image">
					<?php echo get_avatar($comment,$size='80',$default='http://0.gravatar.com/avatar/36c2a25e62935705c5565ec465c59a70?s=32&d=mm&r=g', get_comment_author(), ['class'=>'rounded-circle'] ); ?>
				</div>
				<div class="comment-block">
					<?php if ($comment->comment_approved == '0') : ?>
						<em><?php esc_html_e('Your comment is awaiting moderation.','cleora') ?></em>
						<br />
					<?php endif; ?>
					<div class="comment-by">
						<strong><?php print esc_attr(get_comment_author()); ?></strong>
						<span class="float-end">
							<span> <a href="#"><i class="fa fa-reply"></i> <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></a></span>
						</span>
					</div>
					<small class="date float-right"><?php printf(/* translators: 1: date and time(s). */ esc_html__('%1$s at %2$s' , 'cleora'), esc_attr(get_comment_date()),  esc_attr(get_comment_time())) ?></small>
					<?php comment_text() ?>
				</div>
			</div> -->
		</li>
		<?php
	}
}

if ( ! function_exists( 'cleora_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function cleora_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'cleora' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'cleora_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function cleora_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'cleora' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'cleora_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function cleora_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$post_id = get_the_ID();
			$categories_list = wp_get_post_categories($post_id);
			if ( $categories_list ) {
				echo '<div class="cats-links"><span class="inline-block text-gray-500 font-bold text-sm mr-1">Category:</span>';
				foreach($categories_list as $c) {
					$category = get_category( $c );
					echo '<a href="'.esc_url( get_category_link( $category->term_id ) ).'">' .$category->name .'</a>'; 
				}
				echo '</div>';
			}

			$posttags = get_the_tags();
			if ($posttags) {
				echo '<div class="tags-links"><span class="inline-block text-gray-500 font-bold text-sm mr-1">Tags:</span>';
				foreach($posttags as $tag) {
					echo '<a href="'.esc_attr( get_tag_link( $tag->term_id ) ).'">#' .$tag->name .'</a>'; 
				}
				echo '</div>';
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'cleora' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}
	}
endif;

if ( ! function_exists( 'cleora_post_edit' ) ) :
	function cleora_post_edit() {
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( '<span class="edit-post">Edit</span> <span class="screen-reader-text">%s</span>', 'cleora' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<div class="edit-link flex justify-end">',
			'</div>'
		);
	}
endif;

if ( ! function_exists( 'cleora_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function cleora_body_open() {
		do_action( 'wp_body_open' );
	}
endif;
