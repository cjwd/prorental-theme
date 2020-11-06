<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php
  /**
   * Fire the wp_body_open action.
   */
  wp_body_open();
  ?>
  <div class="wrapper <?= is_front_page() ? 'homepage' : ''; ?>">
    <header class="site-header">
      <!-- Header Top Start -->
      <div class="header-top">
        <div class="container">
          <!-- Header Top left Start -->
          <div class="header-top-left">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/img/icon/call.png" alt="">Call Us : +11 222 3333
          </div>
          <!-- Header Top left End -->
          <!-- Header Top Right Start -->
          <div class="header-top-right">
            <?php if (is_user_logged_in()) : ?>
              <a href="<?= esc_url(wc_logout_url()); ?>" class="c-btn c-btn--primary">Log Out</a>
            <?php else : ?>
              <a href="/my-account" class="c-btn c-btn--primary">Customer Login</a>
              <a href="/supplier-login" class="c-btn c-btn--secondary">Dealer Login</a>
            <?php endif; ?>
          </div>
          <!-- Header Top Right End -->
        </div>
        <!-- Container End -->
      </div>
      <!-- Header Top End -->
      <!-- Header Bottom Start -->
      <div class="header-bottom header-sticky">
        <div class="container">
          <div class="site-branding logo">
            <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
          </div>
          <nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e('Primary', 'slate'); ?>" role="navigation">
            <?php
            if (has_nav_menu('primary')) {
              wp_nav_menu([
                'theme_location'  =>  'primary',
                'container' =>  '',
                'menu_id' =>  'primary-menu',
                'menu_class'  =>  'primary-menu',
                'items_wrap'  =>  '<ul class="%2$s">%3$s</ul>',
                'item_spacing'  =>  'discard'
              ]);
            } else {
              wp_nav_menu();
            }
            ?>
            <div class="primary-menu-toggle" data-toggle="primary-menu">
              <div class="line line--1"></div>
              <div class="line line--2"></div>
              <div class="line line--3"></div>
            </div>
          </nav>
        </div>
        <!-- Container End -->
      </div>
      <!-- Header Bottom End -->
    </header>
    <!-- Header Area End -->