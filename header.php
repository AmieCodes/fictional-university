<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
<header class="site-header">
      <div class="container">
        <h1 class="school-logo-text float-left">
          <a href="<?php echo site_url(); ?>"><strong>Fictional</strong> University</a>
        </h1>
        <span class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
        <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>

        <!--***** NAGIVATION - menu nav wp admin *****-->
        <div class="site-header__menu group">
          <nav class="main-navigation">
            <?php
              wp_nav_menu( [
                'theme_location' => 'headerMenuLocation'
              ]);
            ?>
            <!-- **** NEW DYNAMIC NAV CODE (from lesson 35) **** -->
            <!-- <nav class="main-navigation">
          <ul>
            <li <?php /* if (is_page('about-us') or wp_get_post_parent_id(0) == 16) echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/about-us') ?>">About Us</a></li>
            <li if (get_post_type() == 'program') echo 'class="current-menu-item"'><a href="<?php echo get_post_type_archive_link('program'); ?>">Programs</a></li>
            <li <?php if (get_post_type() == 'event' OR is_page('past-events')) echo 'class="current-menu-item"';  ?>><a href="<?php echo get_post_type_archive_link('event'); ?>">Events</a></li>
            <li><a href="#">Campuses</a></li>
            <li <?php if (get_post_type() == 'post') echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/blog'); */ ?>">Blog</a></li>
          </ul>
        </nav> -->

            <!--**** dynamic nav OLD ****-->
        <!-- <?php //Dynamic Main Nav Code
            // wp_nav_menu([
            //   'theme_location' => 'headerMenuLocation'
            // ]);
          ?> -->
          <!-- 'wp_get_post_parent_id(0) == 12 0' means look up current page 12 is id of About us page - this code states if current page is about us page, or current page is a child of about us, echo out this class which changes the colour of the nav-->

           <!-- <ul>
                <li <?php //if (is_page('about-us') or wp_get_post_parent_id(0) == 12) echo 'class="current-menu-item"'?> ><a href="<?php //echo site_url('/about-us'); ?>">About Us</a></li>
                <li><a href="<?php //echo site_url('/programs'); ?>">Programs</a></li>
                <li <?php //if (get_post_type() == 'event') echo 'class="current-menu-item'; ?>><a href="<?php //echo site_url('/events') //get_post_type_archive_link('event'); *** AF did not work this way**** ?>">Events</a></li>
                <li><a href="<?php //echo site_url('/campuses'); ?>">Campuses</a></li>
                <li <?php //if (get_post_type() == 'post') echo 'class="current-menu-item"' ?>><a href="<?php //echo site_url('/blog'); ?>">Blog</a></li>
            </ul>
          </nav>-->
             <!--***** NAGIVATION END*****-->

          <div class="site-header__util">
            <a href="#" class="btn btn--small btn--orange float-left push-right">Login</a>
            <a href="#" class="btn btn--small btn--dark-orange float-left">Sign Up</a>
            <span class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
          </div>
        </div> <!--site-header_menu group container-->
      </div>
    </header>
