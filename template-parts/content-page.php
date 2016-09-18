<?php
/**
 * The loop for pages
 *
 * @package Simple Blog Theme
 */
?>
<!-- The Loop -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <!--generate page / post header-->
    <header>
      <?php the_title( '<h1 class="page-header">', '</h1>' ); ?>
    </header>
    
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

<?php endwhile; else : ?>
  <p><?php _e( 'Sorry, there doesn\'t appear to be anything here.' ); ?></p>
<?php endif; ?>

<!--end loop-->