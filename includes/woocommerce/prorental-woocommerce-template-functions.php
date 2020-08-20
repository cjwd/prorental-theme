<?php

/**
 * WooCommerce Template Functions
 */

if (!function_exists('output_content_wrapper')) {
  function output_content_wrapper()
  {
    do_action('prorental_before_main_content');
    echo '<main class="main-shop-page pb-60"><div class="container"><div class="row">';
    do_action('prorental_sidebar');
  }
}

if (!function_exists('output_content_wrapper_end')) {
  function output_content_wrapper_end()
  {
    echo '</div></div></main>';
    do_action('prorental_after_main_content');
  }
}


if (!function_exists('prorental_layout_columns_start')) {
  function prorental_layout_columns_start()
  {
    echo '<div class="col-lg-9 order-lg-2">';
    echo '<div class="grid-list-top border-default universal-padding fix mb-30">';
    do_action('prorental_before_shop_loop');
    echo '</div>';
    echo '<div class="main-categorie">';
  }
}

if (!function_exists('prorental_layout_columns_end')) {
  function prorental_layout_columns_end()
  {
    echo '</div>
          <!-- /.main-categorie -->';
    echo '<div class="pagination-box fix">';
    do_action('prorental_after_shop_loop');
    echo '</div>';
    echo '</div>';
  }
}

if (!function_exists('prorental_hide_shop_page_title')) {
  function prorental_hide_shop_page_title()
  {
    if (is_shop()) $title = false;
    return $title;
  }
}

if (!function_exists('prorental_product_img_wrapper_open')) {
  function prorental_product_img_wrapper_open()
  {
    echo '<div class="pro-img">';
  }
}

if (!function_exists('prorental_product_img_wrapper_close')) {
  function prorental_product_img_wrapper_close()
  {
    echo '</a>';
    echo '</div>';
  }
}


if (!function_exists('prorental_product_content_wrapper_open')) {
  function prorental_product_content_wrapper_open()
  {
    echo '<div class="pro-content">';
  }
}

if (!function_exists('prorental_product_content_wrapper_close')) {
  function prorental_product_content_wrapper_close()
  {
    echo '</div>';
  }
}

if (!function_exists('prorental_product_actions_wrapper_open')) {
  function prorental_product_actions_wrapper_open()
  {
    echo '<div class="pro-actions">';
    echo '<div class="actions-secondary">';
  }
}

if (!function_exists('prorental_product_actions_wrapper_close')) {
  function prorental_product_actions_wrapper_close()
  {
    echo '</div>';
    echo '</div>';
  }
}


if (!function_exists('prorental_template_product_description')) {
  function prorental_template_product_description()
  {
    echo '</div>';
    echo '</div>';
  }
}

if (!function_exists('prorental_loop_shop_per_page')) {
  /**
   * Change number of products that are displayed per page (shop page)
   */
  function prorental_loop_shop_per_page($cols)
  {
    // $cols contains the current number of products per page based on the value stored on Options -> Reading
    // Return the number of products you wanna show per page.
    $cols = 7;
    return $cols;
  }
}


if (!function_exists('prorental_add_breadcrumb_wrapper')) {
  function prorental_add_breadcrumb_wrapper($defaults)
  {
    $defaults['wrap_before'] = '<div class="breadcrumb-area ptb-60 ptb-sm-30"><div class="container"><nav class="woocommerce-breadcrumb" itemprop="breadcrumb">';
    $defaults['wrap_after'] = '</div></div></nav>';
    $defaults['delimiter'] = '<span class="woocommerce-breadcrumb-delimiter">/</span>';
    return $defaults;
  }
}

if (!function_exists('prorental_custom_breadrumb_home_url')) {
  function prorental_custom_breadrumb_home_url()
  {
    return '/shop';
  }
}

if (!function_exists('prorental_dashboard_upper_info')) {
  function prorental_dashboard_upper_info()
  {
    get_template_part('template-parts/account', 'upperinfo');
  }
}

if (!function_exists('prorental_page_title_display')) {
  function prorental_page_title_display()
  {
    echo '<h3>' . get_the_title() . '</h3>';
  }
}
