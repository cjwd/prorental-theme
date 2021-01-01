<?php

add_action('customize_register', function($wp_customize) {

  $wp_customize->add_setting( 'prorental_phone_number', [
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'default' => '(868) 555-5555',
    'transport' => 'refresh', // or postMessage
  ]);

  $wp_customize->add_control( 'prorental_phone_number', [
    'type' => 'tel',
    'priority' => 10, // Within the section.
    'section' => 'title_tagline', // Required, core or custom.
    'label' => __( 'Phone Number', 'prorental' ),
    'description' => __( 'Enter your company\'s contact number', 'prorental' ),
    'input_attrs' => [
      'placeholder' => '868 555-1234',
    ],
  ]);

});