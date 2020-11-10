<?php

namespace Slate;

/**
 * Simplifies the nav menu class system.
 *
 * @since  0.0.1
 * @access public
 * @param  array   $classes
 * @param  object  $item
 * @return array
 */
function nav_menu_css_class($classes, $item)
{
  $_classes = ['c-menu__item'];
  foreach (['item', 'parent', 'ancestor'] as $type) {
    if (in_array("current-menu-{$type}", $classes) || in_array("current_page_{$type}", $classes)) {
      $_classes[] = 'item' === $type ? 'c-menu__item--current' : "c-menu__item--{$type}";
    }
  }
  // If the menu item is a post type archive and we're viewing a single
  // post of that post type, the menu item should be an ancestor.
  if ('post_type' === $item->type && is_singular($item->object) && !in_array('c-menu__item--ancestor', $_classes)) {
    $_classes[] = 'c-menu__item--ancestor';
  }
  // Add a class if the menu item has children.
  if (in_array('menu-item-has-children', $classes)) {
    $_classes[] = 'has-children';
  }
  // Add custom user-added classes if we have any.
  $custom = get_post_meta($item->ID, '_menu_item_classes', true);
  if ($custom) {
    $_classes = array_merge($_classes, (array) $custom);
  }
  return $_classes;
}

/**
 * Adds a custom class to the submenus in nav menus.
 *
 * @since  0.0.1
 * @access public
 * @param  array   $classes
 * @return array
 */
function nav_menu_submenu_css_class($classes)
{
  $classes = ['ht-dropdown', 'sub-menu'];
  return $classes;
}

/**
 * Adds a custom class to the nav menu link.
 *
 * @since  0.0.1
 * @access public
 * @param  array   $attr;
 * @return array
 */
function nav_menu_link_attributes($attr)
{
  $attr['class'] = 'c-menu__link';
  return $attr;
}

/**
 * Attempts to fix widget class naming woes. If the theme author uses the
 * `widget--%1$s` class, we'll strip the widget instance. If the theme author
 * uses the `widget--%2$s` class, we'll fix any double `widget--widget` problems.
 * And, if the author does use a widget ID in the class, we'll try to add that in.
 *
 * @since  0.0.1
 * @access public
 * @param  array   $params
 * @return array
 */
function widget_class_filter($params)
{

  $widget_id = $params[0]['widget_id'];
  $instance  = $params[1]['number'];
  $context   = str_replace("-{$instance}", '', $widget_id);

  // Check to see if we can find a class.
  preg_match('/((class=[\'"])(.*?)([\'"]))/i', $params[0]['before_widget'], $matches);

  // If we have matches for all 4 captured groups, let's go.
  if (!empty($matches) && !array_diff_key(array_flip([1, 2, 3, 4]), $matches)) {

    $classes  = explode(' ', $matches[3]);
    $_classes = [];

    // Create BEM-style widget classes.
    $_classes[] = 'widget';
    $_classes[] = sprintf('widget--%s', str_replace('_', '-', $context));

    // Build BEM-style classes from original classes.
    foreach ($classes as $class) {

      $class = str_replace(['widget-', 'widget_', 'widget'], '', $class);

      if ($class) {
        $_classes[] = sprintf('widget--%s', $class);
      }
    }

    // Merge original classes and make sure there are no duplicates.
    $_classes = array_map(
      'sanitize_html_class',
      array_unique(array_merge($_classes, $classes))
    );

    // Replaces the exact class string we captured earlier with the
    // new class string.
    $params[0]['before_widget'] = str_replace(
      $matches[1],
      $matches[2] . join(' ', $_classes) . $matches[4],
      $params[0]['before_widget']
    );
  }

  return $params;
}

/**
 * Filters the nav menu args when used for a widget.
 *
 * @since  0.0.1
 * @access public
 * @param  array    $args
 * @param  \WP_Term $menu
 * @return array
 */
function widget_nav_menu_args($args, $menu)
{

  $args['container_class'] = sprintf(
    'c-menu c-menu--widget c-menu--%s',
    sanitize_html_class($menu->slug)
  );

  $args['container_id'] = '';
  $args['menu_id']      = '';
  $args['menu_class']   = 'c-menu__items';

  return $args;
}
