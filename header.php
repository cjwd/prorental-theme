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
    <header>
      <!-- Header Top Start -->
      <div class="header-top">
        <div class="container">
          <div class="row">
            <!-- Header Top left Start -->
            <div class="col-lg-6 col-md-12 d-center">
              <div class="header-top-left">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/img/icon/call.png" alt="">Call Us : +11 222 3333
              </div>
            </div>
            <!-- Header Top left End -->
            <!-- Header Top Right Start -->
            <div class="col-lg-6 col-md-12">
              <div class="header-top-right">
                <div class="f-right">
                  <a href="" class="c-btn c-btn--primary">Customer Login</a>
                  <a href="" class="c-btn c-btn--secondary">Dealer Login</a>
                </div>
              </div>
            </div>
            <!-- Header Top Right End -->
          </div>
        </div>
        <!-- Container End -->
      </div>
      <!-- Header Top End -->
      <!-- Header Bottom Start -->
      <div class="header-bottom header-sticky">
        <div class="container">
          <div class="row">
            <div class="col-xl-3 col-lg-2 col-sm-5 col-5">
              <div class="site-branding logo">
                <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
              </div>
            </div>
            <!-- Primary Vertical-Menu End -->
            <!-- Search Box Start -->
            <div class="col-xl-6 col-lg-7 d-none d-lg-block">
              <div class="middle-menu pull-right">
                <nav aria-label="<?php esc_attr_e('Primary', 'slate'); ?>" role="navigation">
                  <?php
                  if (has_nav_menu('primary')) {
                    wp_nav_menu([
                      'theme_location'  =>  'primary',
                      'container' =>  '',
                      'menu_id' =>  '',
                      'menu_class'  =>  'middle-menu-list',
                      'items_wrap'  =>  '<ul class="%2$s">%3$s</ul>',
                      'item_spacing'  =>  'discard'
                    ]);
                  } else {
                    wp_nav_menu();
                  }
                  ?>
                </nav>
              </div>
            </div>
            <!-- Search Box End -->
            <!-- Cart Box Start -->
            <div class="col-lg-3 col-sm-7 col-7">
              <div class="cart-box text-right">
                <ul>
                  <li><a href="#"><i class="fa fa-shopping-basket"></i><span class="cart-counter">2</span></a>
                    <ul class="ht-dropdown main-cart-box">
                      <li>
                        <!-- Cart Box Start -->
                        <div class="single-cart-box">
                          <div class="cart-img">
                            <a href="#"><img src="img/menu/1.jpg" alt="cart-image"></a>
                          </div>
                          <div class="cart-content">
                            <h6><a href="product.html">Products Name</a></h6>
                            <span>1 × $399.00</span>
                          </div>
                          <a class="del-icone" href="#"><i class="fa fa-window-close-o"></i></a>
                        </div>
                        <!-- Cart Box End -->
                        <!-- Cart Box Start -->
                        <div class="single-cart-box">
                          <div class="cart-img">
                            <a href="#"><img src="img/menu/2.jpg" alt="cart-image"></a>
                          </div>
                          <div class="cart-content">
                            <h6><a href="product.html">Products Name</a></h6>
                            <span>2 × $299.00</span>
                          </div>
                          <a class="del-icone" href="#"><i class="fa fa-window-close-o"></i></a>
                        </div>
                        <!-- Cart Box End -->
                        <!-- Cart Footer Inner Start -->
                        <div class="cart-footer fix">
                          <h5>total :<span class="f-right">$698.00</span></h5>
                          <div class="cart-actions">
                            <a class="checkout" href="checkout.html">Checkout</a>
                          </div>
                        </div>
                        <!-- Cart Footer Inner End -->
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- Cartt Box End -->
            <div class="col-sm-12 d-lg-none">
              <div class="mobile-menu">
                <?php
                if (has_nav_menu('primary')) {
                  wp_nav_menu([
                    'theme_location'  =>  'primary',
                    'container' =>  '',
                    'menu_id' =>  '',
                    'menu_class'  =>  '',
                    'items_wrap'  =>  '<ul class="%2$s">%3$s</ul>',
                    'item_spacing'  =>  'discard'
                  ]);
                } else {
                  wp_nav_menu();
                }
                ?>
              </div>
            </div>
            <!-- Mobile Menu  End -->
          </div>
          <!-- Row End -->
        </div>
        <!-- Container End -->
      </div>
      <!-- Header Bottom End -->
    </header>
    <!-- Header Area End -->