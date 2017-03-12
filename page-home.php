<?php
/*
Template Name: Home
 */

get_header('home');
?>

<div class="off-canvas-wrapper">
    <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
        <div class="wrapper off-canvas-content" data-off-canvas-content>

<?php
the_post();
get_template_part('template-parts/rows');
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
