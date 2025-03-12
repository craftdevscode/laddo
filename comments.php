<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package laddo
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

$is_comments = have_comments() ? 'have_comments' : 'no_comments';
?>

<?php if ( have_comments() ) : ?>
    <div class="comment_inner <?php echo esc_attr( $is_comments ); ?>" id="comments">
        <h2 class="c_head"> <?php //laddo_Theme_Helper()->comment_count( get_the_ID() ) ?> </h2>
        <ul class="comment_box list-unstyled">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ul',
					'short_ping' => true,
					'walker'     => new laddo_Walker_Comment,
				)
			);
			the_comments_navigation();
			?>
        </ul>
    </div>
<?php
endif;
?>


<div class="blog_comment_box mt-30 wow fadeInUp <?php echo esc_attr( $is_comments ) ?>">
    <div class="">
		<?php
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
            <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'laddo' ); ?></p>
		<?php
		endif;
		
		$commenter     = wp_get_current_commenter();
		$req           = get_option( 'require_name_email' );
		$aria_req      = ( $req ? " aria-required='true'" : '' );
		$fields        = array(
			'author' => '<div class="col-md-6 form-group"> <input type="text" class="form-control" name="author" ' . $aria_req . '><label class="floating-label">' . esc_html__( 'Full name*', 'laddo' ) . '</label></div>',
			'email'  => '<div class="col-md-6 form-group"> <input type="email" class="form-control" name="email" id="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" ' . $aria_req . '><label class="floating-label">' . esc_html__( 'Email*', 'laddo' ) . '</label></div>',
			'url'    => '<div class="col-md-12 form-group"><input type="url" class="form-control" name="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '"><label class="floating-label">' . esc_html__( 'Website (Optional)', 'laddo' ) . '</label></div>',
		);
		$comments_args = array(
			'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
			'class_form'           => 'get_quote_form row',
			'class_submit'         => 'thm_btn',
			'title_reply_before'   => '<h2 class="c_head">',
			'title_reply'          => esc_html__( 'Leave a Comment', 'laddo' ),
			'title_reply_after'    => '</h2>',
			'comment_notes_before' => '',
			'comment_field'        => '<div class="col-md-12 form-group"><textarea name="comment" id="comment" class="form-control message"></textarea><label class="floating-label">' . esc_html__( 'Comment type...', 'laddo' ) . '</label></div>',
			'comment_notes_after'  => '',
			'submit_button'        => '<button type="submit" name="%1$s" id="%2$s" class="%3$s" value="%4$s">' . esc_html__( 'Post Comment', 'laddo' ) . '</button>',

		);
		comment_form( $comments_args );
		?>
    </div>
</div>