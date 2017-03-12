<?php
if (is_singular()) {

    global $post;
    $content_meta = apply_filters('sherborne_road/post_meta_information', array(), $post);

    $out = array();

    foreach ($content_meta as $key => $meta) {
        $out[] = '<span class="meta-content">' . $meta['content'] . '</span>';
    }

    printf(
        '<aside class="meta aside block-margin-after">
            <div class="row column">
                %1$s
                %2$s
            </div>
        </aside>',
        !empty($out) ? '<p class="meta-box post-meta">' . implode('<br>', $out) . '</p>' : '',
        get_the_term_list(get_the_ID(), 'collection', '<h5>' . __('More like this', 'sherborne_road') . '</h5><ul class="tags inline"><li>', '</li><li>', '</li></ul> ')
    );

    if (is_single()) {
        get_template_part('template-parts/map-small');
    }
}
