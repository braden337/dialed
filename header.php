<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>His 956 Facility</title>
  <?php wp_head(); ?>
</head>
<body>

<!-- <div class="container-fluid"> -->
<nav class="navbar navbar-inverse navbar-static-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-left" href="<?php echo home_url(); ?>"><img class="logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/wings.png" alt="" /></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <!-- <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Riding</a></li>
        <li><a href="#">Training</a></li>
        <li><a href="#">Camps</a></li>
        <li><a href="#">Videos</a></li>
        <li><a href="#">Contact</a></li>
      </ul> -->
      <?php wp_nav_menu( array( 'theme_location' => 'topnav', 'menu_id' => 'primary-menu', 'menu_class' => 'nav navbar-nav navbar-right' ) ); ?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

