<?php

/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if (!defined('ABSPATH')) {
  exit;
}

do_action('woocommerce_before_checkout_form', $checkout);

// If checkout registration is disabled and not logged in, the user cannot checkout.
if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
  echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')));
  return;
}

?>

<form id="woocommerce-checkout" name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">
  <div class="u-flex">
    <?php if ($checkout->get_checkout_fields()) : ?>
      <div id="customer_details" class="woocommerce-checkout-customer-details">
        <?php do_action('woocommerce_checkout_before_customer_details'); ?>
        <fieldset class="o-step">
          <legend class="u-hidden-visually">Billing Details</legend>
          <div class="o-step__heading">
            <div class="o-step__title"><?= __('Billing Details', 'woocommerce'); ?></div>
          </div>
          <div class="o-step__container">
            <p class="o-step__description"><?= __('User account and Credit Card Billing Details', 'woocommerce'); ?></p>
            <div class="o-step__content">
              <?php do_action('woocommerce_checkout_billing'); ?>
            </div>
          </div>
        </fieldset>

        <?php
        /**
         * @hooked secondary_contact_checkout_fields - 10
         */
        do_action('prorental_after_checkout_billing_form');
        ?>

        <fieldset class="o-step">
          <legend class="u-hidden-visually">Shipping Details</legend>
          <div class="o-step__heading">
            <div class="o-step__title"><?= __('Shipping Details', 'woocommerce'); ?></div>
          </div>
          <div class="o-step__container">
            <p class="o-step__description"><?= __('This should ideally be the where the equipment will be used', 'woocommerce'); ?></p>
            <div class="o-step__content">
              <?php do_action('woocommerce_checkout_shipping'); ?>
            </div>
          </div>
        </fieldset>
        <fieldset class="o-step">
          <legend class="u-hidden-visually">Payment</legend>
          <div class="o-step__heading">
            <div class="o-step__title"><?= __('Payment', 'woocommerce'); ?></div>
          </div>
          <div class="o-step__container">
            <p class="o-step__description"><?= __('Payment Details', 'woocommerce'); ?></p>
            <div class="o-step__content">
              <?php
              /**
               * @hooked woocommerce_checkout_payment - 10
               */
              do_action('woocommerce_checkout_after_customer_details');
              ?>
            </div>
          </div>
        </fieldset>
      </div>
    <?php endif; ?>

    <?php do_action('woocommerce_checkout_before_order_review_heading'); ?>

    <?php do_action('woocommerce_checkout_before_order_review'); ?>

    <div id="order_review" class="woocommerce-checkout-review-order">
      <h3 id="order_review_heading" class="order-review-heading"><?php esc_html_e('Order Summary', 'woocommerce'); ?></h3>
      <?php
      /**
       * @hooked woocommerce_order_review - 10
       * @unhooked woocommerce_checkout_payment - 20
       */
      do_action('woocommerce_checkout_order_review');
      ?>
    </div>

    <?php do_action('woocommerce_checkout_after_order_review'); ?>
  </div>
</form>

<?php do_action('woocommerce_after_checkout_form', $checkout); ?>