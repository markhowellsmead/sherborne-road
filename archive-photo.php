<?php
get_header();
?>

    <div class="wrapper">

        <?php

if (have_posts()) {
    get_template_part('template-parts/archive-header');

    echo '<!-- Grid layout origin: https://github.com/xieranmaya/blog/issues/6 #wowza --><div class="module row mod grid500">';

    while (have_posts()):
        the_post();
    get_template_part('template-parts/thumbnail', get_post_type());
    endwhile;

    echo '</div>';
} else {
    get_template_part('template-parts/404');
}

get_template_part('template-parts/pagination');
get_template_part('template-parts/footer');
?>

    </div>

<?php
get_footer();
