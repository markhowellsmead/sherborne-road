<?php

global $app;
$out = array();

$image = get_sub_field('image');

$out[] = '<div class="module row banner_image '.$hero_size.' '.$overlay.' label-'.get_sub_field('label_position').'" style="background-image:url(\''.$image['sizes']['photo-full'].'\')">';
$out[] = '</div>';

echo implode('', $out);
