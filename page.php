<?php
get_header();
?>

<div class="off-canvas-wrapper">
    <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
        <div class="wrapper off-canvas-content" data-off-canvas-content>

<?php

if (have_posts()) {
    if (is_archive()) {
        get_template_part('template-parts/archive-header');
    }

    echo '<div class="post-singular block-margin-after">';

    while (have_posts()) {
        the_post();?>

<div <?php post_class('post');?>>

<?php
get_template_part('template-parts/header-post');
        get_template_part('template-parts/post-content', get_post_type());
        get_template_part('template-parts/linkpages');
        get_template_part('template-parts/meta', get_post_type());
        comments_template();
        ?>

</div>

<?php

    }
    echo '</div>';
} else {
    get_template_part('template-parts/404');
}

get_template_part('template-parts/pagination');
get_template_part('template-parts/footer');
?>

        </div>
<?php
get_template_part('template-parts/offcanvas');
?>
    </div>
</div>

<?php
get_footer();
