<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cn12_portfolio_timeline
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
	if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			$comment_count = get_comments_number();
			
			printf(
				esc_html( _nx( 'Comments (%1$s)', 'Comments (%1$s)', $comment_count, 'comments title', 'cn12_portfolio_timeline' ) ),
				number_format_i18n( $comment_count ),
				'<span>' . get_the_title() . '</span>'
			);
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ul class="list-group list-group-flush">
			<?php
				wp_list_comments( array(
					'style'      => 'ul',
					'short_ping' => true,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'cn12_portfolio_timeline' ); ?></p>
		<?php
		endif;

	endif; // Check for have_comments().

	$fields =  array(

	'author' =>
		'<p class="comment-form-author"><label for="author">' . __( 'Name', 'cn12_portfolio_timeline' ) .
		( $req ? ' <span class="required text-danger">*</span>' : '' ) . '</label>' .
		'<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
		'"' . $aria_req . ' /></p>',

	'email' =>
		'<p class="comment-form-email"><label for="email">' . __( 'Email', 'cn12_portfolio_timeline' ) .
		( $req ? ' <span class="required text-danger">*</span>' : '' ) . '</label>' .
		'<input id="email" class="form-control" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
		'"' . $aria_req . ' /></p>',

	'url' =>
		'<p class="comment-form-url"><label for="url">' . __( 'Website', 'cn12_portfolio_timeline' ) . '</label>' .
		'<input id="url" class="form-control" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
		'" /></p>',
	);

	$args = array(

		'comment_field' =>
			'<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label> <span class="required text-danger">*</span><textarea id="comment" class="form-control" name="comment" rows="7" aria-required="true"></textarea></p>',
		
		'class_submit' => 'form-control main-btn',

		'fields' => apply_filters( 'comment_form_default_fields', $fields )
	);

	comment_form($args);
	?>

</div><!-- #comments -->
