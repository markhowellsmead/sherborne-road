<?php
get_header();
?>

    <div class="wrapper">

        <?php

if (have_posts()) {
    get_template_part('template-parts/archive-header');

    do_action('sherborne-road/before-collection-list');

    get_template_part('template-parts/grid-500');

} else {
    get_template_part('template-parts/404');
}

get_template_part('template-parts/pagination');
get_template_part('template-parts/footer');
?>

    </div>

<?php
get_footer();
