<?php

/**
 * Template Functions.
 *
 * This file holds template tags for the theme. Template tags are PHP functions
 * meant for use within theme templates.
 *
 * @package   Slate
 * @author    Chinara James <cjwd@chinarajames.com>
 * @copyright 2018 Chinara James
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://chinarajames.com/themes/slate
 */

namespace Slate;

if (!function_exists('prorental_get_sidebar')) {
  function prorental_get_sidebar()
  {
    get_sidebar();
  }
}

/**
 * Custom Posts Pagination
 *
 * @param string $num_pages
 * @param string $paged
 * @param integer $page_range
 * @return void
 */
function posts_pagination($num_pages = '', $format = '', $paged = '', $page_range = 2)
{

  /**
   * Fallback for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   *
   * Good because we can override default pagination
   * in our theme, and use this function in default queries
   * and custom queries.
   */
  global $paged;

  if (empty($paged)) {
    $paged = 1;
  }

  if ($num_pages == '') {
    global $wp_query;
    $num_pages = $wp_query->max_num_pages;

    if (!$num_pages) {
      $num_pages = 1;
    }
  }

  /** End Fallback **/

  if (empty($format)) {
    $format = 'page/%#%';
  }

  /**
   * Construct the pagination arguments for WordPress' paginate_links
   * function.
   */
  $pagination_args = array(
    'base'                => get_pagenum_link(1) . '%_%',
    'format'              => $format,
    'total'               => $num_pages,
    'current'             => $paged,
    'show_all'            => false,
    'end_size'            => 1,
    'mid_size'            => $page_range,
    'prev_next'           => true,
    'prev_text'           => __('&laquo; Previous', 'slate'),
    'next_text'           => __('Next &raquo;', 'slate'),
    'type'                => 'array',
    'add_args'            => false,
    'add_fragment'        => '',
    'before_page_number'  => '',
    'after_page_number'   => '<span class="page-number-divider">/</span>'
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<nav class='c-pagination'>";
    echo "<ul class='o-list-bare o-list-inline c-pagination__list'>";
    foreach ($paginate_links as $link) {
      if (strpos($link, 'prev') !== false) {
        $next_prev_class = __('prevlink', 'slate');
      } elseif (strpos($link, 'next') !== false) {
        $next_prev_class = __('nextlink', 'slate');
      } else {
        $next_prev_class = '';
      }

      echo "<li class='o-list-inline__item " . $next_prev_class . "'>" . $link . "</li>";
    }
    echo "</ul>";
    echo "</nav>";
  }
}




function site_logo($args = [])
{
  $logo = get_custom_logo(); // Filters the custom logo output of the_custom_logo()
  $site_title = get_bloginfo('name');
  $contents = '';
  $classname = '';

  $defaults = [
    'logo'  =>  '%1$s<span class="u-screenReader">%2$s</span>',
    'logo_class'  => 'c-logo c-siteHeader__logo',
    'title' =>  '<a href="%1$s">%2$s</a>',
    'title_class' => 'c-siteTitle',
    'home_wrap' => '<h1 class="%1$s">%2$s</h1>',
    'single_wrap' =>  '<div class="%1$s u-faux-heading">%2$s</div>',
    'condition' => (is_front_page() || is_home()) && !is_page(),
  ];

  $args = wp_parse_args($args, $defaults);

  /**
   * Filters the arguments of this function
   */
  $args = apply_filters('slate_site_logo_args', $args, $defaults);

  if (has_custom_logo()) {
    $contents = sprintf($args['logo'], $logo, esc_html($site_title));
    $classname = $args['logo_class'];
  } else {
    $contents = sprintf($args['title'], esc_url(get_home_url(null, '/')), esc_html($site_title));
    $classname = $args['title_class'];
  }

  // Oh this is what the condition is for
  // I most likely don't need this as the layout for the logo
  // doesn't change with the type of the page
  $wrap = $args['condition'] ? 'home_wrap' : 'single_wrap';
  $html = sprintf($args[$wrap], $classname, $contents);
  /**
   * Filters the local variables of this function classname and contents
   */
  $html = apply_filters('site_logo', $html, $args, $classname, $contents);

  echo $html;
}



function site_description($echo = true)
{
  $description = get_bloginfo('description');
  if (!$description) {
    return;
  }

  $wrapper = '<div class="c-siteDescription">%s</div><!-- .c-siteDescription-->';

  $html = sprintf($wrapper, esc_html($description));

  /**
   * Filter the html for the site description
   */
  $html = apply_filters('slate_site_description', $html, $description, $wrapper);

  if (!$echo) {
    return $html;
  }

  echo $html;
}
