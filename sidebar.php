<?php

/**
 * The sidebar containing the main widget area.
 */

if (!is_active_sidebar('sidebar-primary')) {
  return;
}
?>

<div class="col-lg-3 order-2">
  <div class="sidebar widget-area white-bg" role="complementary">
    <?php dynamic_sidebar('sidebar-primary'); ?>
  </div>
</div>