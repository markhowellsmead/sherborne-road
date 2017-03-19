<?php
if (has_nav_menu('primary-menu')) {
    wp_nav_menu(array(
        'theme_location' => 'primary-menu',
        'items_wrap' => '<ul class="mobile-ofc vertical menu">%3$s</ul>',
        'fallback_cb' => false,
        'container' => false,
    ));
}
