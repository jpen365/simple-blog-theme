<?php
/**
 * The search template
 *
 * Displays the content portion of the search results page
 *
 * @package Simple Blog Theme
 */
  
get_header(); ?>

<!-- Page Content -->
<div class="container">

  <div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

      <h1 class="page-header"><?php printf( 'Site Search Results: %s' , '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>

      <?php get_template_part( 'template-parts/content' , 'search' ); ?>      

    </div>

  <?php get_sidebar(); ?>    
  <?php get_footer(); ?>