<?php

global $app;
$out = array();

$image = get_sub_field('image');

$srcset = array(
    $image['sizes']['medium'] .' ' .$image['sizes']['medium-width']. 'w',
    $image['sizes']['large'] .' ' .$image['sizes']['large-width']. 'w',
    $image['sizes']['photo-full'] .' ' .$image['sizes']['photo-full-width']. 'w',
    $image['url'] .' ' .$image['width']. 'w',
);

printf(
    '<div class="mod row expanded banner-image block-margin-after">
		<img _src="%1$s" srcset="%2$s" alt="%3$s" />
    </div>',
    $image['sizes']['thumbnail'],
    implode(', ', $srcset),
    $image['alt']
);

echo implode('', $out);
