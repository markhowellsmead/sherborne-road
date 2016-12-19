<?php

global $post;
$content_meta = apply_filters('sherborne_road/post_meta_information', array(), $post);

$out = array();

foreach ($content_meta as $key => $meta) {
    $out[] = '<span class="meta-content">'.$meta['content'].'</span>';
}

if (!empty($out)) {
    printf(
        '<p class="meta-box post-meta">%1$s</p>',
        implode('<br>', $out)
    );
}
