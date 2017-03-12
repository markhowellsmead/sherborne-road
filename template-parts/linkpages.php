<?php

if (is_singular()) {
    wp_link_pages([
        'before' => '<div class="row column"><p>' . __('Pages:'),
        'after' => '</p></div>',
    ]);
}
