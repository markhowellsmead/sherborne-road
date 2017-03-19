<div class="row expanded column">
<?php

if (have_posts()) {

    echo '<!-- Grid layout origin: https://github.com/xieranmaya/blog/issues/6 #wowza --><div class="mod grid500">';

    while (have_posts()):
        the_post();
        get_template_part('template-parts/thumbnail', get_post_type());
    endwhile;

    echo '</div>';
} else {
    get_template_part('template-parts/404');
}
?>
</div>
