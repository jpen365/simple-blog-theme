<?php
/**
 * The loop for single blog posts
 *
 * @package Simple Blog Theme
 */
?>
<!-- The Loop -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <!--generate page / post header-->
    <header>
      <h1><?php the_title(); ?></h1>
      <p class="lead">by <?php the_author_posts_link(); ?></p>
      <hr>
      <p><span class="glyphicon glyphicon-time"></span> Posted on <?php the_date( $format = 'l, F j, Y, \a\t g:i A' ); ?>
    </header>
    <hr>
    
    <!--display thumbnail if has thumbnail -->
    <?php if ( has_post_thumbnail() ) {
      the_post_thumbnail( $size = 'post-thumbnail', $attr = 'class=img-responsive');
      ?><hr><?php
    } ?>
    <!--end display thumbnail-->

    <div class="entry-content">
      <?php the_content(); ?>
    </div>

  </article>

  <?php comments_template(); ?>


<?php endwhile; else : ?>
  <p><?php _e( 'Sorry, there doesn\'t appear to be anything here.' ); ?></p>
<?php endif; ?>

<!--end loop-->