<?php

$out = array();

$title = get_sub_field('title');
$content = get_sub_field('content');
$constrain = true; //get_sub_field('constrain_width');

if (!empty($title) || !empty($content)) {
    if ($constrain) {
        $inner_pre = '<div class="post">';
        $inner_post = '</div>';
    } else {
        $inner_pre = '';
        $inner_post = '';
    }

    $out[] = '<div class="mod wysiwyg block-margin-after"><div class="row column">';
    $out[] = $inner_pre;
    if (!empty($title)) {
        $out[] = '<header><h2 class="row-title">' . $title . '</h2></header>';
    }
    if (!empty($content)) {
        $out[] = apply_filters('the_content', $content);
    }
    $out[] = $inner_post;
    $out[] = '</div></div>';
}

echo implode('', $out);
