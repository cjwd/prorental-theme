<?php

namespace Slate;

/**
 * @see prorental_get_sidebar
 */
add_action('prorental_sidebar', __NAMESPACE__ . '\prorental_get_sidebar', 10);
