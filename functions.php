<?php

/* enqueue styles and scripts */
function jpen_enqueue_assets() {
  /* theme's primary style.css file */
  wp_enqueue_style( 'main-css' , get_stylesheet_uri() );

  /* template's primary css file */
  wp_enqueue_style( 'startup-boostrap-css' , get_template_directory_uri() . './css/blog-post.css' );

  /* boostrap resources from theme files */
  wp_enqueue_style( 'bootstrap-css' , get_template_directory_uri() . '/css/bootstrap.min.css' );
  wp_enqueue_script( 'bootstrap-js' , get_template_directory_uri() . '/js/bootstrap.min.js' , array( 'jquery' ) , false , true );

  /*conditional resources for IE 9 */
  wp_enqueue_script( 'simple-blog-html5', 'https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js' , array(), '3.7.0' );
  wp_script_add_data( 'simple-blog-html5', 'conditional', 'lt IE 9' );
  wp_enqueue_script( 'simple-blog-respondjs', 'https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js' , array(), '1.4.2' );
  wp_script_add_data( 'simple-blog-respondjs', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts' , 'jpen_enqueue_assets' );


/* add theme menu area */
register_nav_menus (array(
  'primary' => 'Primary Menu',
));


/* add theme supports */
add_theme_support( 'post-thumbnails' ); 


/* add img-responsive class to all images */
function jpen_add_responsive_class($content){

  $content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
  $document = new DOMDocument();
  libxml_use_internal_errors(true);
  $document->loadHTML(utf8_decode($content));

  $imgs = $document->getElementsByTagName('img');
  foreach ($imgs as $img) {           
     $img->setAttribute('class','img-responsive');
  }

  $html = $document->saveHTML();
  return $html;   
}
add_filter( 'the_content', 'jpen_add_responsive_class');


/* register widget areas */
function jpen_sidebar_widget_area() {
  register_sidebar( array(
    'name'          => 'Sidebar Widget Area',
    'id'            => 'jpen-sidebar-widgets',
    'before_widget' => '<div class="well">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
    ));
}
add_action( 'widgets_init' , 'jpen_sidebar_widget_area' );



/*return formatted excerpt */
/* code courtesy of Pieter Goosen at WordPress StackExchange */
/* http://wordpress.stackexchange.com/questions/141125/allow-html-in-excerpt#answer-141136 */
function jpen_allowedtags() {
    // Add custom tags to this string
        return '<table>,<thead>,<tbody>,<tfoot>,<tr>,<td>,<th>,<h1>,<h2>,<h3>,<script>,<style>,<br>,<em>,<i>,<ul>,<ol>,<li>,<a>,<p>,<img>,<video>,<audio>'; 
    }

if ( ! function_exists( 'jpen_custom_wp_trim_excerpt' ) ) : 

  function jpen_custom_wp_trim_excerpt($jpen_excerpt) {
  $raw_excerpt = $jpen_excerpt;
    if ( '' == $jpen_excerpt ) {

      $jpen_excerpt = get_the_content('');
      $jpen_excerpt = strip_shortcodes( $jpen_excerpt );
      $jpen_excerpt = apply_filters('the_content', $jpen_excerpt);
      $jpen_excerpt = str_replace(']]>', ']]&gt;', $jpen_excerpt);
      $jpen_excerpt = strip_tags($jpen_excerpt, jpen_allowedtags()); /*IF you need to allow just certain tags. Delete if all tags are allowed */

      //Set the excerpt word count and only break after sentence is complete.
      $excerpt_word_count = 75;
      $excerpt_length = apply_filters('excerpt_length', $excerpt_word_count); 
      $tokens = array();
      $excerptOutput = '';
      $count = 0;

      // Divide the string into tokens; HTML tags, or words, followed by any whitespace
      preg_match_all('/(<[^>]+>|[^<>\s]+)\s*/u', $jpen_excerpt, $tokens);

      foreach ($tokens[0] as $token) { 

        if ($count >= $excerpt_length && preg_match('/[\,\;\?\.\!]\s*$/uS', $token)) { 
        // Limit reached, continue until , ; ? . or ! occur at the end
          $excerptOutput .= trim($token);
          break;
        }

        // Add words to complete sentence
        $count++;

        // Append what's left of the token
        $excerptOutput .= $token;
      }

      $jpen_excerpt = trim(force_balance_tags($excerptOutput));

      $excerpt_end = ' <a href="'. esc_url( get_permalink() ) . '">' . '&nbsp;&raquo;&nbsp;' . sprintf(__( 'Read more about: %s &nbsp;&raquo;', 'jpen' ), get_the_title()) . '</a>'; 
      $excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end); 

      //$pos = strrpos($jpen_excerpt, '</');
      //if ($pos !== false)
      // Inside last HTML tag
      //$jpen_excerpt = substr_replace($jpen_excerpt, $excerpt_end, $pos, 0); /* Add read more next to last word */
      //else
      // After the content
      $jpen_excerpt .= $excerpt_more; /*Add read more in new paragraph */

    return $jpen_excerpt;   

    }
  return apply_filters('jpen_custom_wp_trim_excerpt', $jpen_excerpt, $raw_excerpt);
  } 

endif; 

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'jpen_custom_wp_trim_excerpt'); 



?>