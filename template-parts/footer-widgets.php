<?php
/**
 * Displays the menus and widgets at the end of the main element.
 * Visually, this output is presented as part of the the footer element.
 */

$is_sidebar_enabled = is_active_sidebar('sidebar-primary');

if($is_sidebar_enabled) :
?>
<div class="c-footer-widgets">
  <?php dynamic_sidebar('sidebar-primary'); ?>
</div>
<?php endif; ?>