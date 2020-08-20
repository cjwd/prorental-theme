<?php

/**
 * WordPress Shims
 */

add_action('wp_head', function () {
?>
  <script type="text/javascript">
    document.documentElement.className = document.documentElement.className.replace('no-js', 'js');
  </script>
<?php
});
