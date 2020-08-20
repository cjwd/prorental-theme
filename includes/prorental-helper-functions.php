<?php

namespace Slate\Helpers;

/**
 * Register x number of widgets simultaneously
 *
 * @param integer $number
 * @param array $label_args
 * @param array $markup_args
 * @return void
 */
function bulk_register_sidebars( $number, $label_args, $markup_args) {
  $number = (int) $number;
  for ($i=0; $i < $number; $i++) {
    $args = array_merge( $label_args[$i], $markup_args);
    \register_sidebar($args);
  }
}





/**
 * Query WooCommerce activation
 */
function is_woocommerce_activated() {
  return class_exists( 'WooCommerce' ) ? true : false;
}