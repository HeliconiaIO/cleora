<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cleora
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h3 class="comments-title text-gray-500">
			<?php
			$cleora_comment_count = get_comments_number();
			if ( '1' === $cleora_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One comment on &ldquo;%1$s&rdquo;', 'cleora' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf( 
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', $cleora_comment_count, 'comments title', 'cleora' ) ),
					number_format_i18n( $cleora_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
		</h3><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ul class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ul',
					'short_ping' => true,
					'callback' => 'cleora_comments_lists'
				)
			);
			?>
		</ul><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'cleora' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	$comments_args = array(
				'title_reply_before' => '<h4 class="text-gray-500">',
				'title_reply_after' => '</h4>',
				'title_reply' => __( 'Write a Reply or Comment', 'cleora' ),
				'comment_notes_before' => '<p class="text-gray-500 py-1 my-0 text-sm">Your email address will not be published. Required fields are marked *',
				'comment_notes_after' => '</p>',
				
        'label_submit' => __( 'Send', 'cleora' ),
        
				'logged_in_as'=> sprintf("<p class='text-gray-500 py-1 my-0 text-sm'>You are commenting as <b class='font-bold'>%s</b>.</p>", wp_get_current_user()->user_login),
        'comment_notes_after' => '',
        // Redefine your own textarea (the comment body).
        // 'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><br /><textarea id="comment" name="comment" aria-required="true"></textarea></p>',
	);
	comment_form( $comments_args );
	?>

</div><!-- #comments -->
