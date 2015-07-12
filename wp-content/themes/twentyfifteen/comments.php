<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
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

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'twentyfifteen' ),
					number_format_i18n( get_comments_number() ), get_the_title() );
			?>
		</h2>

		<?php twentyfifteen_comment_nav(); ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 56,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php twentyfifteen_comment_nav(); ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'twentyfifteen' ); ?></p>
	<?php endif; ?>

	<?php
		$comment_args = array( 'fields' => apply_filters( 'comment_form_default_fields', array(
    'author' => '<div class="comment-form__wrapper">' .
    							'<div class="comment-form__field">' .
		                '<input class="input" name="author" type="text" placeholder="Name" value="' . esc_attr( $commenter['comment_author'] ) . '" aria-required="true" />' .
	                '</div>',
    'email'  => '<div class="comment-form__field">' .
                	'<input class="input" name="email" type="text" placeholder="Email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" aria-required="true"/>' .
								'</div>',
    'url'    => '<div class="comment-form__field">' .
	                '<input class="input" name="url" type="text" placeholder="Website (optional)" value="' . esc_attr( $commenter['comment_author_url'] ) . '" />' .
                '</div>',
     ) ),
    'comment_field' => '<div class="comment-form__field comment-form__field--comment">' .
				                 '<textarea class="input" name="comment" placeholder="Comment" aria-required="true"></textarea>' .
			                 '</div>' .
			               '</div>',
    'comment_notes_before' => '',
    'comment_notes_after' => '',
    'title_reply' => __(''),
    'label_submit' => 'Share your thoughts',
    'class_submit' => 'btn colorize-text'
	);

	?>

	<?php comment_form($comment_args); ?>

</div><!-- .comments-area -->
