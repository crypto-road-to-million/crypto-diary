<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
 
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>

<section id="comments" class="comments-area my-5 p-2">

  <?php if ( have_comments() ) : ?>
  <h2 class="comments-title">
    <?php comments_number( esc_html__( 'no responses', 'cd' ), esc_html__( 'one response', 'cd' ), esc_html__( '% responses', 'cd' ) ); ?>
  </h2>

  <div class="comment-list">
    <?php
    wp_list_comments( array(
      'style'       => 'div',
      'short_ping'  => true,
      'avatar_size' => 32,
      'callback' => 'better_comments'
      ) ); ?>
  </div><!-- .comment-list -->

  <?php
  // Are there comments to navigate through?
  if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
  <nav class="navigation comment-navigation" role="navigation">
    <h1 class="screen-reader-text section-heading"><?php esc_html_e( 'Comment navigation', 'cd' ); ?></h1>
    <div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'cd' ) ); ?></div>
    <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'cd' ) ); ?></div>
  </nav><!-- .comment-navigation -->
  <?php endif; // Check for comment navigation ?>

  <?php if ( ! comments_open() && get_comments_number() ) : ?>
  <p class="no-comments"><?php esc_html_e( 'Comments are closed.' , 'cd' ); ?></p>
  <?php endif; ?>

  <?php endif; // have_comments() ?>

  <?php
  $comments_args = array(
    'fields' => apply_filters(
      'comment_form_default_fields', array(
        'author' =>'<div class="mb-3">' .
        '<label for="author" class="form-label">' . esc_html__( 'Your Name ', 'cd' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label> ' .
        '<input type="text" class="form-control" id="author" placeholder="Your Name (No Keywords)" name="author" value="' . esc_attr( $commenter['comment_author'] ) . '"  required>'.
        '</div>',
        'email'  => '<div class="mb-3">' .
        '<label for="email" class="form-label">' . esc_html__( 'Your Email ', 'cd' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label> ' .
        '<input type="email" class="form-control" id="email" placeholder="your-real-email@example.com" name="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"  required>' .
        '</div>',
      )
    ),
    'comment_field' => '<div class="mb-3"><label for="comment" class="form-label">' . esc_html_e( 'Comment', 'cd' ) . '</label><textarea class="form-control" id="comment" name="comment" aria-required="true" rows="3"></textarea></div>',
    'comment_notes_after' => '',
    
  );
  comment_form( $comments_args ); ?>

</section><!-- #comments -->