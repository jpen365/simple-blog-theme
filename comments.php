<?php
/**
 * The comments.
 *
 * @package Simple Blog Theme
 */
?><!--display comments if enabled-->
  <?php if ( have_comments() or comments_open() ) : ?>

    <div class="well">
      <?php comment_form( array(
      'comment_notes_after' => '',
      'label_submit'        => 'Submit',
      'class_submit'        => 'btn btn-primary',
      'comment_field'       => '<div class="form-group"><textarea id="comment" name="comment" class="form-control" rows="3"></textarea></div>',
      'title_reply'         => 'Leave a Comment:',
      'title_reply_before'  => '<h4>',
      'title_reply_after'   => '</h4>',
      )
    ); ?>
    </div>
    <hr>

    <h2><?php comments_number(); ?></h2>

    <div class="comment-list">
      <?php
        wp_list_comments( array(
          'style'       => 'div',
          'short_ping'  => true,
          'avatar_size' => 64,
          'walker'      => new comment_walker(),
        ) );
      ?>
    </div><!-- .comment-list -->

    <?php the_comments_navigation(); ?>


  <?php endif; ?>
  <!--end comments-->