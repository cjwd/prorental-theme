<?php

/**
 * Theme setup functions.
 *
 * This file holds basic theme setup functions executed on appropriate hooks
 * with some opinionated priorities. I've also decided to use
 * anonymous functions to keep these from being easily unhooked. WordPress has
 * an appropriate API for unregistering, removing, or modifying all of the
 * things in this file. Those APIs should be used instead of attempting to use
 * `remove_action()`.
 *
 * @package   Slate
 * @author    Chinara James <cjwd@chinarajames.com>
 * @copyright 2020 Chinara James
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://chinarajames.com/themes/slate
 */

namespace Slate;

use Slate\Helpers;

add_action('after_setup_theme', function () {

  /**
   * Automatically add feed links to `<head>`.
   */
  add_theme_support('automatic-feed-links');

  /**
   * Enable post thumbnails
   * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
   */
  add_theme_support('post-thumbnails');

  /**
   * Enable HTML5 markup support
   * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
   */
  add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

  /**
   * Wide and full alignment. The styles for alignment is housed in the `resources/scss/utilities/_alignment.scss` file.
   */
  add_theme_support('align-wide');

  /**
   * Enable plugins to manage the document title
   * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
   */
  add_theme_support('title-tag');

  /**
   * Enable selective refresh for widgets in customizer
   * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
   */
  add_theme_support('customize-selective-refresh-widgets');

  /**
   * Enable support for the_custom_logo()
   */
  add_theme_support('custom-logo', apply_filters('slate_custom_logo_args', array(
    'height'      => null,
    'width'       => null,
    'flex-width'  => false,
    'flex-height' => false,
    'header-text' => ''
  )));

  /**
   * Load Theme translations
   */
  load_theme_textdomain('slate', get_parent_theme_file_path('lang'));

  /**
   * Register navigation menus
   * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
   */
  register_nav_menus([
    'primary' => __('Primary Navigation', 'slate'),
  ]);

  /**
   * Add custom colours to the block editor
   */
  add_theme_support('editor-color-palette', [
    [
      'name' =>  __('Slate Primary', 'slate'),
      'slug' =>  'slate-primary',
      'color'  =>  '#47a3da'
    ],
    [
      'name'  => __('Slate White', 'slate'),
      'slug'  => 'slate-white',
      'color' => '#f5f6fa'
    ]
  ]);


  add_theme_support('editor-font-sizes', [
    [
      'name'      => __('Small'),
      'shortName' => __('S'),
      'size'      => 12,
      'slug'      => 'small'
    ],
    [
      'name'      => __('Regular'),
      'shortName' => __('M'),
      'size'      => 16,
      'slug'      => 'regular'
    ],
    [
      'name'      => __('Large'),
      'shortName' => __('L'),
      'size'      => 36,
      'slug'      => 'large'
    ],
    [
      'name'      => __('Larger'),
      'shortName' => __('XL'),
      'size'      => 48,
      'slug'      => 'larger'
    ]
  ]);

  /**
   * Declare WooCommerce Support
   */
  if (Helpers\is_woocommerce_activated()) {
    add_theme_support('woocommerce', [
      'product_grid'      => [
        'default_rows'    => 3,
        'min_rows'        => 2,
        'max_rows'        => 8,
        'default_columns' => 4,
        'min_columns'     => 2,
        'max_columns'     => 5,
      ],
    ]);
    add_theme_support('wc-product-gallery-slider');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
  }
}, 5);


/**
 * Set the content width based on the theme's design and stylesheet
 */
add_action('after_setup_theme', function () {
  if (has_post_format('gallery')) {
    $GLOBALS['content_width'] = apply_filters('slate_blocks_content_width', 1400);
  } else {
    $GLOBALS['content_width'] = apply_filters('slate_blocks_content_width', 905);
  }
}, 0);


/**
 * Register sidebars
 */
add_action('widgets_init', function () {
  $config = [
    'before_widget' => '<section class="widget single-sidebar %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<div class="group-title"><h3>',
    'after_title'   => '</h3></div>'
  ];

  $label_args = [
    [
      'name' => __('Primary', 'prorental'),
      'id' => 'sidebar-primary',
    ],

    [
      'name' => __('Footer', 'prorental'),
      'id' => 'sidebar-footer',
    ],
    [
      'name' => __('Home Top Widgets', 'prorental'),
      'id'  =>  'home-top'
    ]
  ];

  Helpers\bulk_register_sidebars(count($label_args), $label_args, $config);
});

require get_stylesheet_directory() . '/includes/widgets/call-to-action.php';
