<?php 
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * It is used to display a page when nothing more specific matches a query.
 * It puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Simple Blog Theme
 */

 get_header(); ?>

  <!-- Page Content -->
  <div class="container">

      <div class="row">

          <!-- Blog Entries Column -->
          <div class="col-md-8">

              <?php get_template_part( 'template-parts/content' ); ?>

              <!-- add next/previous navigation to posts page -->
              <?php if ( is_home() ) {
                ?><ul class="pager">
                  <li class="previous">
                      <?php next_posts_link( '&larr; Older' ); ?>
                  </li>
                  <li class="next">
                      <?php previous_posts_link( 'Newer &rarr;' ); ?>
                  </li>
              </ul><?php
              } ?>
              

          </div>

      <?php get_sidebar(); ?>    
      <?php get_footer(); ?>