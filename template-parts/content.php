<?php
/**
 * The loop for index.php and any other pages that don't have a more specific loop
 *
 * @package Simple Blog Theme
 */
?>

<!-- add page title to pages -->
<?php if ( is_front_page() && is_home() ) {
  // Default homepage, do nothing, no title
  ?><h1 class="page-header"><?php bloginfo( 'name' ); ?> <small><?php bloginfo( 'description' ); ?></small></h1><?php
} elseif ( is_front_page() ) {
  // static homepage, show title if it exists
  the_title( '<h1 class="page-header">', '</h1>' );
} elseif ( is_home() ) {
  // blog page, use page title
  $posts_page = get_post( get_option( 'page_for_posts' ) ); 
  echo '<h1 class="page-header">' . apply_filters( 'the_title', $posts_page->post_title ) . '</h1>';
} elseif ( is_single() ) {
  // single blog post, no title
} else {
  //everything else, use page title
  the_title( '<h1 class="page-header">', '</h1>' );
} ?>
<!-- end add title to pages -->

<!-- The Loop -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <!--generate page / post header-->
    <?php if ( is_front_page() && is_home() ) {

      // Front page is posts page
      ?><header>
        <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
        <p class="lead">by <?php the_author_posts_link(); ?></p>
        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php the_date( $format = 'l, F j, Y, \a\t g:i A' ); ?>
      </header>
      <hr><?php

    } elseif ( is_front_page() ) {

      // Static homepage, do nothing

    } elseif ( is_home() ) {

      // Blog page is not front page
      ?><header>
        <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
        <p class="lead">by <?php the_author_posts_link(); ?></p>
        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php the_date( $format = 'l, F j, Y, \a\t g:i A' ); ?>
      </header>
      <hr><?php

    } elseif ( is_single() ) {

      // Single posts
      ?><header>
        <h1><?php the_title(); ?></h1>
        <p class="lead">by <?php the_author_posts_link(); ?></p>
        <hr>
        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php the_date( $format = 'l, F j, Y, \a\t g:i A' ); ?>
      </header>
      <hr><?php
    } ?>
    <!--end generate post/page header -->
    
    <!--display thumbnail if has thumbnail -->
    <?php if ( has_post_thumbnail() ) {
      the_post_thumbnail( $size = 'post-thumbnail', $attr = 'class=img-responsive');
      ?><hr><?php
    } ?>
    <!--end display thumbnail-->

    <!--display excerpt for posts page and content everywhere else-->
    <div class="entry-content">
      <?php if ( is_home() ) {
        the_excerpt();
        ?><a class="btn btn-primary" href="<?php the_permalink(); ?>">Read More</a><hr><?php
      } else {
        the_content();
      } ?>
    </div>
    <!--end display excerpt or content-->
  </article>

  <!--display comments if on a single post or page and comments are enabled-->
  <?php if ( is_single()) {
    if ( have_comments() or comments_open() ) {
      /* Add comments section here */
    }
  } ?>
  <!--end comments-->

<?php endwhile; else : ?>
  <p><?php _e( 'Sorry, there doesn\'t appear to be anything here.' ); ?></p>
<?php endif; ?>

<!--end loop-->