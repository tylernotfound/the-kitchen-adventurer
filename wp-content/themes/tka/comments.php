<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package tka
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
		<h2 class="comments-title">Join the conversation</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'tka' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'tka' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'tka' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
          'avatar_size' => 56,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'tka' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'tka' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'tka' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation. ?>

	<?php else: // Check for have_comments(). ?>

    <h2 class="comments-title">Start the conversation</h2>

  <?php endif; ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'tka' ); ?></p>
	<?php endif; ?>

	<?php
    $comment_args = array( 'fields' => apply_filters( 'comment_form_default_fields', array(
    'author' => '<div class="comment-form__field">' .
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
                       '</div>',
    'comment_notes_before' => '',
    'comment_notes_after' => '',
    'title_reply' => __(''),
    'label_submit' => 'Share your thoughts',
    'class_submit' => 'btn'
  );

  ?>

  <div class="comment-form__wrapper">
    <?php comment_form($comment_args); ?>
  </div>

</div><!-- #comments -->
