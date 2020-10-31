<?php

/**
 * Display the distance in km from user's desired location
 */
?>
<div class="equiserv-distance">
  <div class="icon-wrap icon-wrap--primary">
    <svg class="icon icon-map-marker">
      <use xlink:href="<?= get_stylesheet_directory_uri() . '/dist/assets/img/icons.svg#icon-map-marker'; ?>"></use>
    </svg>
  </div>
  <span class="name"><?= $args['distance'] . ' KM away'; ?></span>
</div>