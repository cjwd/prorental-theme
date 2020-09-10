<?php

/**
 * Associated functions can be found in prorental-template-functions.php
 */

namespace Slate;

/**
 * @see prorental_get_sidebar
 */
add_action('prorental_sidebar', __NAMESPACE__ . '\prorental_get_sidebar', 10);
