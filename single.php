<?php get_header(); ?>

<!-- Page Content -->
<div class="container">

  <div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

      <?php get_template_part( 'template-parts/content' , 'single' ); ?>

      <!-- load comments -->
        

    </div>

  <?php get_sidebar(); ?>    
  <?php get_footer(); ?>