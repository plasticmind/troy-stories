<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Jesse Gardner">

  <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/i/favicon.png">

  <title><?php wp_title(); ?></title>
  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="container">

    <!-- Header -->

    <div class="site-header">
      <h1 class="logo">
        <!--<span class="quiet"><?php echo bloginfo( 'name' ); ?></span>
        <a href="<?php echo bloginfo( 'url' ); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/i/logo.png" alt="Troy Stories Logo" srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/i/logo.svg" /></a>-->
      </h1>
    </div>
    <div class="site-nav">
      <ul>
        <li><a href="<?php echo bloginfo( 'url' ); ?>">Stories</a></li>
        <li><a href="<?php echo bloginfo( 'url' ); ?>/about/">About</a></li>
        <li><a href="<?php echo bloginfo( 'url' ); ?>/follow/">Follow</a></li>
      </ul>
    </div>