<?php

/**
 * The template for displaying product search form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/product-searchform.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.3.0
 */

if (!defined('ABSPATH')) {
  exit;
}

?>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <form role="search" method="get" class="prorental-product-search" action="<?php echo esc_url(home_url('/')); ?>">
        <ul class="search-form-fields">
          <li class="search-form-control">
            <label class="label">Product Name</label>
            <input type="text" placeholder="Product Name">
          </li>
          <li class="search-form-control">
            <label class="label">Model</label>
            <input type="text" placeholder="Model">
          </li>
          <li class="search-form-control">
            <label class="label">Available From</label>
            <input class="input-text" type="date" placeholder="Available From">
          </li>
          <li class="search-form-control">
            <label class="label">Location</label>
            <input type="text" placeholder="Location">
          </li>
          <li class="search-form-control">
            <button class="c-btn c-btn--primary" type="submit" value="<?php echo esc_attr_x('Search', 'submit button', 'woocommerce'); ?>"><?php echo esc_html_x('Search', 'submit button', 'woocommerce'); ?></button>
            <input type="hidden" name="post_type" value="product" />
          </li>
        </ul>
      </form>
    </div>
  </div>
</div>