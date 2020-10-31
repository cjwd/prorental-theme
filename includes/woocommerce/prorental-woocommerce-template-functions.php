<?php

/**
 * WooCommerce Template Functions
 */

if (!function_exists('output_content_wrapper')) {
  function output_content_wrapper()
  {
    do_action('prorental_before_main_content');
    echo '<main class="main-shop-page pb-60"><div class="container"><div class="row">';
    if (is_shop()) {
      do_action('prorental_sidebar');
    }
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

if (!function_exists('prorental_product_search')) {
  function prorental_product_search()
  {
    if (is_shop()) {
      wc_get_template_part('product', 'searchform');
    }
  }
}

if (!function_exists('prorental_remove_address_fields_placeholders')) {
  function prorental_remove_address_fields_placeholders($fields)
  {
    $fields['address_1']['placeholder'] = '';
    return $fields;
  }
}

if (!function_exists('custom_billing_checkout_fields')) {
  function custom_billing_checkout_fields($fields)
  {
    // Move email address to the top
    $fields['billing']['billing_email']['priority'] = 5;
    $fields['billing']['billing_phone']['priority'] = 25;

    // Remove some placeholders
    $fields['account']['account_username']['placeholder'] = '';
    $fields['account']['account_password']['placeholder'] = '';

    // Changes fields to show as required
    $fields['billing']['billing_company']['required'] = true;
    $fields['shipping']['shipping_company']['required'] = true;

    // Remove Order Notes Field
    // Causes Warning: Invalid argument supplied for foreach() in /Users/cjwd/Sites/prorental.dev.cc/wp-content/plugins/woocommerce/templates/checkout/form-shipping.php on line 62
    // unset($fields['order']['order_comments']);


    $fields['billing']['billing_website'] = [
      'label'   => __('Website', 'woocommerce'),
      'type'  => 'url',
      'required'  => false,
      'class' =>  array('form-row-wide'),
      'clear' => false,
      'priority' => 32
    ];

    $fields['billing']['billing_job'] = [
      'label'   => __('Job Title', 'woocommerce'),
      'required'  => true,
      'class' =>  array('form-row-wide'),
      'clear' => false,
      'priority' => 31
    ];

    $fields['billing']['billing_idtype'] = [
      'label'   => __('ID Type', 'woocommerce'),
      'required'  => true,
      'class' =>  array('form-row-wide radio-group'),
      'clear' => true,
      'type' => 'radio',
      'options' => [
        'pp'  => __('Passport', 'woocommerce'),
        'dp'  => __('Driver\'s Permit', 'woocommerce'),
        'id'  => __('National ID', 'woocommerce')
      ],
      'default' => 'id',
      'priority' => 21
    ];

    $fields['billing']['billing_id'] = [
      'label'   => __('ID# - Driver\'s Permit, Passport etc', 'woocommerce'),
      'required'  => true,
      'class' =>  array('form-row-wide'),
      'clear' => false,
      'priority' => 22
    ];

    return $fields;
  }
}

if (!function_exists('secondary_contact_checkout_fields')) {
  function secondary_contact_checkout_fields()
  {
    $user = get_current_user_id();
    echo '<fieldset class="o-step">';
    echo '<legend class="u-hidden-visually">Secondary Contact</legend>';
    echo '<div class="o-step__heading"><div class="o-step__title">' . __('Secondary Contact', 'woocommerce') . '</div></div>';
    echo '<div class="o-step__container">
            <p class="o-step__description">' . __('Alternative Contact at your company', 'woocommerce') . '</p>
            <div class="o-step__content">';
    woocommerce_form_field('contact_fname', [
      'type'  => 'text',
      'required'  => true,
      'class' =>  ['form-row-first'],
      'label' =>  __('First Name', 'woocommerce'),
      'default' => is_null(WC()->checkout->get_value('contact_fname')) ? get_post_meta(131, 'Contact First Name', true) : 'Jane'
    ], WC()->checkout->get_value('contact_fname'));

    woocommerce_form_field('contact_lname', [
      'type'  => 'text',
      'required'  => true,
      'class' =>  ['form-row-last'],
      'label' =>  __('Last Name', 'woocommerce'),
    ], WC()->checkout->get_value('contact_lname'));

    woocommerce_form_field('contact_email', [
      'type'  => 'email',
      'required'  => true,
      'class' =>  ['form-row-wide'],
      'label' =>  __('Email', 'woocommerce'),
    ], WC()->checkout->get_value('contact_email'));

    woocommerce_form_field('contact_phone', [
      'type'  => 'tel',
      'required'  => true,
      'class' =>  ['form-row-wide'],
      'label' =>  __('Phone', 'woocommerce'),
    ], WC()->checkout->get_value('contact_phone'));

    woocommerce_form_field('contact_job', [
      'type'  => 'text',
      'required'  => true,
      'class' =>  ['form-row-wide'],
      'label' =>  __('Job Title / Position', 'woocommerce'),
    ], WC()->checkout->get_value('contact_job'));

    woocommerce_form_field('contact_idtype', [
      'type' => 'radio',
      'required'  => true,
      'label' => __('ID Type', 'woocommerce'),
      'class' => ['radio-group'],
      'options'  => [
        'pp' => __('Passport', 'woocommerce'),
        'dp' => __('Driver\'s Permit', 'woocommerce'),
        'id' => __('National ID', 'woocommerce'),
      ],
      'default' => 'id'
    ], WC()->checkout->get_value('contact_idtype'));

    woocommerce_form_field('contact_id', [
      'type' => 'text',
      'required'  => true,
      'label' => __('ID# - Driver\'s Permit, Passport etc', 'wooocommerce'),
      'class' => ['form-row-wide']
    ], WC()->checkout->get_value('contact_id'));
    echo '</div><!-- / .o-step__content -->';
    echo '</div>';
    echo '</fieldset>';
  }
}

if (!function_exists('prorental_process_customer_checkout_fields')) {
  function prorental_process_customer_checkout_fields()
  {
    if (!$_POST['contact_fname']) {
      wc_add_notice(__('Secondary Contact First Name is required'), 'error');
    }

    if (!$_POST['contact_lname']) {
      wc_add_notice(__('Secondary Contact Last Name is required'), 'error');
    }

    if (!$_POST['contact_email']) {
      wc_add_notice(__('Secondary Contact Email is required'), 'error');
    }

    if (!$_POST['contact_phone']) {
      wc_add_notice(__('Secondary Contact Phone Number is required'), 'error');
    }

    if (!$_POST['contact_job']) {
      wc_add_notice(__('Secondary Contact Job Title is required'), 'error');
    }

    if (!$_POST['contact_idtype']) {
      wc_add_notice(__('Secondary Contact ID Type is required'), 'error');
    }

    if (!$_POST['contact_id']) {
      wc_add_notice(__('Secondary Contact ID Number is required'), 'error');
    }
  }
}

if (!function_exists('prorental_custom_checkout_fields_update_order_meta')) {
  function prorental_custom_checkout_fields_update_order_meta($order_id)
  {
    if (!empty($_POST['contact_fname'])) {
      update_post_meta($order_id, 'Contact First Name', sanitize_text_field($_POST['contact_fname']));
    }

    if (!empty($_POST['contact_lname'])) {
      update_post_meta($order_id, 'Contact Last Name', sanitize_text_field($_POST['contact_lname']));
    }

    if (!empty($_POST['contact_email'])) {
      update_post_meta($order_id, 'Contact Email', sanitize_text_field($_POST['contact_email']));
    }

    if (!empty($_POST['contact_phone'])) {
      update_post_meta($order_id, 'Contact Phone', sanitize_text_field($_POST['contact_phone']));
    }

    if (!empty($_POST['contact_job'])) {
      update_post_meta($order_id, 'Contact Job', sanitize_text_field($_POST['contact_job']));
    }

    if (!empty($_POST['contact_idtype'])) {
      update_post_meta($order_id, 'Contact ID Type', sanitize_text_field($_POST['contact_idtype']));
    }

    if (!empty($_POST['contact_id'])) {
      update_post_meta($order_id, 'Contact ID', sanitize_text_field($_POST['contact_id']));
    }
  }
}


if (!function_exists('prorental_add_geolocation_distance')) {
  function prorental_add_geolocation_distance()
  {
    $product_geolocation = equiserv_product_geolocation();
    $distance  = round(equiserv_convert_distance_km($product_geolocation->distance));
    get_template_part('template-parts/distance', null, ['distance' => $distance]);
  }
}
