<?php

var_dump(have_rows('buttons'));
exit;

$image = get_sub_field('image');

$srcset = array(
    $image['sizes']['medium'] .' ' .$image['sizes']['medium-width']. 'w',
    $image['sizes']['large'] .' ' .$image['sizes']['large-width']. 'w',
    $image['sizes']['photo-full'] .' ' .$image['sizes']['photo-full-width']. 'w',
    $image['url'] .' ' .$image['width']. 'w',
);

printf(
    '<figure class="mod row expanded hero_element block-margin-after">
		<img _src="%1$s" srcset="%2$s" alt="%3$s" />
        %4$s
    </figure>',
    $image['sizes']['thumbnail'],
    implode(', ', $srcset),
    $image['alt'],
    !get_sub_field('title') ? '' : sprintf(
        '<figcaption class="caption column small-12 medium-6"><h1>%1$s</h1>%2$s</figcaption>',
        get_sub_field('title'),
        !get_sub_field('subtitle') ? '' : sprintf(
            '<h2>%1$s</h2>',
            get_sub_field('subtitle')
        )
    )
);
