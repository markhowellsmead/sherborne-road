<?php

if (has_post_thumbnail()) {
    if (is_singular()) {
        printf(
            '<figure class="featured-image row expanded align-center block-margin-after"><div class="column large-10">%1$s</div></figure>',
            get_the_post_thumbnail(get_the_ID(), 'full')
        );
    } else {
        printf(
            '<figure class="featured-image row column block-margin-after"><a href="%1$s" title="%2$s">%3$s</a></figure>',
            get_the_permalink(),
            the_title_attribute(array(
                'echo' => false,
            )),
            get_the_post_thumbnail(get_the_ID(), 'medium')
        );
    }
} elseif (!is_singular() && function_exists('sherborne_road_video_thumbnail') && $video_url = get_post_meta(get_the_ID(), 'video_ref', true)) {
    if ($thumbnail = sherborne_road_video_thumbnail($video_url)) {
        printf(
            '<div class="featured-image row column block-margin-after">
                <a href="%1$s" title="%2$s">
                    <img src="%3$s">
                </a>
            </div>',
            get_the_permalink(),
            get_the_title(),
            $thumbnail
        );
    }
} elseif (is_singular() && function_exists('sherborne_road_media')) {
    sherborne_road_media();
}
