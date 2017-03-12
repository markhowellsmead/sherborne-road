<?php
get_header();
?>

<div class="wrapper">

<?php

if (have_posts()) {
    if (is_archive()) {
        get_template_part('template-parts/archive-header');
    }

    the_post();?>

	<div <?php post_class('post');?>>

	<?php
get_template_part('template-parts/header-post');
    get_template_part('template-parts/post-content', get_post_type());
    get_template_part('template-parts/linkpages');
    get_template_part('template-parts/meta', get_post_type());
    comments_template();?>

	</div>

<?php

} else {
    get_template_part('template-parts/404');
}

get_template_part('template-parts/pagination');
get_template_part('template-parts/footer');
?>

</div>

<?php
get_footer();
