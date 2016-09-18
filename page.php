<?php
/**
 * The page template
 *
 * Displays the content portion of all individual pages
 *
 * @package Simple Blog Theme
 */
  
get_header(); ?>

<!-- Page Content -->
<div class="container">

  <div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

      <?php get_template_part( 'template-parts/content' , 'page' ); ?>      

    </div>

  <?php get_sidebar(); ?>    
  <?php get_footer(); ?>