<?php

if (is_singular()) {
    $content = apply_filters('the_content', get_the_content());
} else {
    $content = wpautop(get_the_excerpt());
    ob_start();
    get_template_part('template-parts/linkto', get_post_type());
    $content .= ob_get_contents();
    ob_end_clean();
}

if ($content !== '') {
    printf(
        '<div class="row post-content block-margin-after">
            <div class="column">
                %1$s
            </div>
        </div>',
        $content
    );
}
