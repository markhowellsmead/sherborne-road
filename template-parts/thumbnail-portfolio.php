<?php

if (has_post_thumbnail()) {
    $directories = wp_upload_dir();

    $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
    if ($thumbnail_url) {
        $thumbnail_path = str_replace($directories['baseurl'], $directories['basedir'], $thumbnail_url);
        $imagesize = @getimagesize($thumbnail_path);

        if (!$imagesize) {
            $imagesize = array(
                600,
                400,
            );
        }

        $target_height = 150;

        printf(
            '<figure class="grid-item" data-postid="%1$s" style="flex-grow:%2$s;flex-basis:%3$spx;">
                <i class="uncollapse" style="padding-bottom:%4$s%%"></i>
                <a href="%5$s">%6$s<figcaption class="caption">%7$s</figcaption></a>
            </figure>',
            get_the_ID(),
            $imagesize[0] * 100 / $imagesize[1],
            $imagesize[0] * $target_height / $imagesize[1],
            $imagesize[1] / $imagesize[0] * 100,
            get_permalink(),
            '<img class="image"  src="'.$thumbnail_url.'" alt="'.get_the_title().'" />',
            //get_the_post_thumbnail(get_the_ID(), 'medium', array('class' => 'image')),
            get_the_title()
        );

        unset($thumbnail);
    }
}
