<?php
if (has_nav_menu('primary-menu')) {
    wp_nav_menu(array(
        'theme_location' => 'primary-menu',
        'items_wrap' => '<ul class="menu row align-right show-for-large">%3$s</ul>',
        'fallback_cb' => false,
        'container' => false,
    ));
}
