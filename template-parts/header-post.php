<?php
if (get_post_format() !== 'aside') {
    get_template_part('template-parts/thumbnail');
    ?>

<header class="post-header block-margin-after">
    <div class="row column">
        <h1 class="post-title post-header-title"><a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>"><?php the_title();?></a></h1>
        <?php if (get_post_type() !== 'page') {
        ?>
            <small class="post-header-subtitle">
            <?php
printf(__('Published %s', 'sherborne_road'), get_the_time(get_option('date_format')));
        edit_post_link(__('Edit'), ' | ');?>
            </small>
    <?php

    } else {
        edit_post_link(__('Edit'), '<p>', '</p>');
    }

    if (is_single()) {
        ?>
        <div class="navigation next-previous post-header-navigation">
            <?php previous_post_link('%link', __('View previous photo', 'sherborne_road'));?>
            <?php next_post_link('%link', __('View next photo', 'sherborne_road'));?>
        </div>
    <?php

    }?>
    </div>
</header>

<?php

}
