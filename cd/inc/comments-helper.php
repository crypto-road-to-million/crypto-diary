<?php
if( ! function_exists( 'better_comments' ) ):
function better_comments($comment, $args, $depth) {
    ?>
<div <?php comment_class('mb-5'); ?> id="div-comment-<?php comment_ID() ?>">
  <div class="comment">

    <div class="d-flex text-muted pt-3">
      <?php echo get_avatar($comment,$size='32', '', '', array('class' => 'flex-shrink-0 me-2 rounded')  ); ?>
      <div class="pb-3 mb-0 small lh-sm border-bottom flex-grow-1">

        <?php if ($comment->comment_approved == '0') : ?>
        <div class="alert alert-warning" role="alert">
          <?php esc_html_e('Your comment is awaiting moderation.','cd'); ?>
        </div>
        <?php endif; ?>

        <strong class="d-block text-gray-dark"><?php echo get_comment_author() ?></strong>
        <small
          class="d-block text-gray-dark fst-italic"><?php printf(/* translators: 1: date and time(s). */ esc_html__('%1$s at %2$s' , 'cd'), get_comment_date(),  get_comment_time()) ?></small>

        <div class="my-2">
          <?php comment_text() ?>
        </div>

        <a
          href="#"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></a>
      </div>
    </div>
  </div>

  <?php
        }
endif;