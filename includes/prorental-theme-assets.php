<?php

namespace Slate;

use Slate\Helpers;

/**
 * Enqueue scripts/styles for the front end.
 */

add_action('wp_enqueue_scripts', function () {

  $theme_version = wp_get_theme()->get('Version');

  // Disable core block styles.
  wp_dequeue_style('wp-block-library');

  /**
   * Load WordPress' comment-reply script where appropriate
   */
  if (is_singular() && get_option('thread_comments') && comments_open()) {
    wp_enqueue_script('comment-reply');
  }

  /**
   * Theme Javascript
   */
  if(is_page('my-account')) {
    wp_enqueue_script( 'easy-resp-tabs', get_stylesheet_directory_uri() . '/dist/assets/js/easyResponsiveTabs.js', ['jquery'], null, true );
  }
  
  wp_enqueue_script('slate/main.js', get_stylesheet_directory_uri() . '/dist/assets/js/main.js', null, null, true);

  /**
   * Theme CSS
   */
  // wp_enqueue_style( 'slate/fonts', Helpers\fonts_url(), array(), null );
  wp_enqueue_style('slate/main.css', get_stylesheet_directory_uri() . '/dist/assets/css/main.css', null, null);
});




/**
 * Enqueue scripts/styles for the editor
 */
add_action('enqueue_block_editor_assets', function () {

  // Enqueue theme editor styles.
  wp_enqueue_style('slate-editor', get_stylesheet_directory_uri() . '/dist/assets/css/editor.css', null, null);

  // Unregister core block and theme styles.
  wp_deregister_style('wp-block-library');
  wp_deregister_style('wp-block-library-theme');

  // Re-register core block and theme styles with an empty string. This is
  // necessary to get styles set up correctly.
  wp_register_style('wp-block-library', '');
  wp_register_style('wp-block-library-theme', '');
});
