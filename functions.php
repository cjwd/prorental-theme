<?php

use Slate\Helpers;

/**
 * Includes
 *
 * The includes array determines the code library included in the theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 */
$includes = [
  'includes/prorental-theme-setup.php',   // Theme setup
  'includes/prorental-theme-assets.php',   // Enqueue Theme Styles and Scripts
  'includes/prorental-helper-functions.php', // Helper Functions
  'includes/prorental-functions.php', // General Functions
  'includes/prorental-hooks.php', // General Purpose Action and Filters
  'includes/prorental-template-functions.php',   // Template Functions
  'includes/prorental-template-hooks.php', // Template related Action and Filters
  'includes/wordpress-shims.php' // Miscellaneous actions and filters
];

$woocommerce_includes = [
  'includes/woocommerce/prorental-woocommerce-template-hooks.php',
  'includes/woocommerce/prorental-woocommerce-template-functions.php',
  'includes/woocommerce/prorental-woocommerce-template-hooks.php'
];

foreach ($includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'slate'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

if (Helpers\is_woocommerce_activated()) {
  foreach ($woocommerce_includes as $file) {
    if (!$filepath = locate_template($file)) {
      trigger_error(sprintf(__('Error locating %s for inclusion', 'slate'), $file), E_USER_ERROR);
    }

    require_once $filepath;
  }
  unset($file, $filepath);
}
