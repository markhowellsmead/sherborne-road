<?php

global $app;
$out = array();

$image = get_sub_field('image');

printf(
    '<div class="mod row expanded banner-image block-margin-after" style="background-image:url(\'%1$s\')"></div>',
    $image['sizes']['photo-full']
);

echo implode('', $out);
