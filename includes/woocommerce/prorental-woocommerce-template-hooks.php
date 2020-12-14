<?php

/**
 * Layout
 */
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 20);
remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 10);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

add_action('woocommerce_before_main_content', 'output_content_wrapper', 10);
add_action('woocommerce_after_main_content', 'output_content_wrapper_end', 10);
add_action('prorental_before_main_content', 'woocommerce_breadcrumb', 10);
add_action('prorental_before_main_content', 'prorental_product_search', 15);

add_action('woocommerce_before_shop_loop', 'prorental_layout_columns_start', 9);
add_action('prorental_before_shop_loop', 'woocommerce_result_count', 10);
add_action('prorental_before_shop_loop', 'woocommerce_catalog_ordering', 10);

add_action('woocommerce_after_shop_loop', 'prorental_layout_columns_end', 9);
add_action('prorental_after_shop_loop', 'woocommerce_pagination', 10);
add_action('prorental_after_shop_loop', 'woocommerce_result_count', 20);

remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);

add_action('woocommerce_before_shop_loop_item', 'prorental_product_img_wrapper_open', 9);
add_action('woocommerce_after_shop_loop_item', 'prorental_product_content_wrapper_close', 10);
add_action('woocommerce_after_shop_loop_item', 'prorental_product_actions_wrapper_close', 10);

remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
add_action('woocommerce_before_shop_loop_item_title', 'prorental_product_img_wrapper_close', 15);
add_action('woocommerce_before_shop_loop_item_title', 'prorental_product_content_wrapper_open', 20);
add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_rating', 20);

add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_single_excerpt', 10);
add_action('woocommerce_after_shop_loop_item_title', 'prorental_product_actions_wrapper_open', 10);

add_action('woocommerce_account_content', 'prorental_page_title_display', 5);

/**
 * Checkout
 */
remove_action('woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20);

add_action('woocommerce_checkout_after_customer_details', 'woocommerce_checkout_payment', 10);

/**
 * Filters
 */
add_filter('woocommerce_show_page_title', 'prorental_hide_shop_page_title');
add_filter('loop_shop_per_page', 'prorental_loop_shop_per_page');
add_filter('woocommerce_breadcrumb_defaults', 'prorental_add_breadcrumb_wrapper');
add_filter('woocommerce_breadcrumb_home_url', 'prorental_custom_breadrumb_home_url');

/**
 * Checkout Filters
 */
// Adding Custom Shipping and Billing Fields
add_filter('woocommerce_checkout_fields', 'custom_billing_checkout_fields');
add_filter('woocommerce_default_address_fields', 'prorental_remove_address_fields_placeholders');

/**
 * Checkout Actions
 */

// Save the custom checkout fields
// Sanitization
add_action('woocommerce_checkout_update_order_meta', 'prorental_custom_checkout_fields_update_order_meta');

// Add Geolocation details to single and archive product summary
add_action('woocommerce_single_product_summary', 'prorental_add_geolocation_distance');
add_action('woocommerce_after_shop_loop_item_title', 'prorental_add_geolocation_distance', 10);


/**
 * Adds a new column to the "My Orders" table in the account.
 * Get the data and display it for the new columns
 * Removes order total column
 */
add_filter('woocommerce_my_account_my_orders_columns', 'prorental_remove_order_total_column');
add_filter('woocommerce_my_account_my_orders_columns', 'prorental_add_my_account_orders_column');
add_action('woocommerce_my_account_my_orders_column_order-delivery-date', 'prorental_order_delivery_date_column');
add_action('woocommerce_my_account_my_orders_column_order-return-date', 'prorental_order_return_date_column');
