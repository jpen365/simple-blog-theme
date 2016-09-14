<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Simple Blog Theme
 */
?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <title><?php bloginfo( 'name' ); ?></title>
  <?php wp_head(); ?>
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="<?php echo get_home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <?php
            wp_nav_menu( array(
              'theme_location' => 'primary',
              'menu_class'     => 'nav navbar-nav',
              'container_id'   => 'bs-example-navbar-collapse-1',
              'container_class' => 'collapse navbar-collapse',
             ));
          ?>         <!-- /.navbar-collapse -->
      </div>

          <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
  </nav>
