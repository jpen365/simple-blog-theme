<?php

/* enqueue styles and scripts */

function jpen_enqueue_assets() {
  wp_enqueue_style( 'main-css' , get_stylesheet_uri() );

  wp_enqueue_style( 'bootstrap-css' , get_template_directory_uri() . '/css/bootstrap.min.css' );

  wp_enqueue_style( 'startup-boostrap-css' , get_template_directory_uri() . './css/blog-post.css' );

  wp_enqueue_script( 'bootstrap-js' , get_template_directory_uri() . '/js/boostrap.min.js' , 'jquery' , true );

  wp_enqueue_script( 'simple-blog-html5', 'https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js' , array(), '3.7.0' );
  wp_script_add_data( 'simple-blog-html5', 'conditional', 'lt IE 9' );

  wp_enqueue_script( 'simple-blog-respondjs', 'https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js' , array(), '1.4.2' );
  wp_script_add_data( 'simple-blog-respondjs', 'conditional', 'lt IE 9' );
  
}
add_action( 'wp_enqueue_scripts' , 'jpen_enqueue_assets' );


?>