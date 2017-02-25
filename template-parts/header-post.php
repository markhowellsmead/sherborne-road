<?php
if (get_post_format() !== 'aside') {
    ?>

<header class="post-header">
    <h1 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
    <?php if (get_post_type() !== 'page'): ?>
        <time class="subheader">
            <?php
printf(__('Published %s', 'sherborne_road'), get_the_time(get_option('date_format')));
    edit_post_link(__('Edit'), ' | '); ?>
        </time>
    <?php
else:
        edit_post_link(__('Edit'), '<p class="subheader">', '</p>');
    endif;

    if (is_singular()) {
        ?>
    <div class="navigation next-previous">
        <?php previous_post_link('%link', __('View previous photo', 'sherborne_road')); ?>
        <?php next_post_link('%link', __('View next photo', 'sherborne_road')); ?>
    </div>
</header>

<?php

    }
}
?>
