<?php

$image = get_sub_field('image');

$srcset = array(
    $image['sizes']['medium'] .' ' .$image['sizes']['medium-width']. 'w',
    $image['sizes']['large'] .' ' .$image['sizes']['large-width']. 'w',
    $image['sizes']['photo-full'] .' ' .$image['sizes']['photo-full-width']. 'w',
    $image['url'] .' ' .$image['width']. 'w',
);

if (have_rows('buttons')) {
    $buttons = '';
    while (have_rows('buttons')) {
        the_row();
        switch (get_row_layout()) {
            case 'primary_button':
                $link = get_sub_field('button_link')['url'];
                $buttons .= '<a href="' .$link.'" class="small button">'.get_sub_field('button_text').'</a>';
                break;
            case 'secondary_button':
                $link = get_sub_field('button_link')['url'];
                $buttons .= '<a href="' .$link.'" class="small button secondary">'.get_sub_field('button_text').'</a>';
                break;
        }
    }
    if ($buttons !== '') {
        $buttons = '<div>'.$buttons.'</div>';
    }
} else {
    $buttons = '';
}

printf(
    '<figure class="mod row expanded hero_element block-margin-after">
		<img _src="%1$s" srcset="%2$s" alt="%3$s" />
        %4$s
    </figure>',
    $image['sizes']['thumbnail'],
    implode(', ', $srcset),
    $image['alt'],
    !get_sub_field('title') ? '' : sprintf(
        '<figcaption class="caption column small-12"><h1>%1$s</h1>%2$s%3$s</figcaption>',
        get_sub_field('title'),
        !get_sub_field('subtitle') ? '' : sprintf(
            '<p>%1$s</p>',
            get_sub_field('subtitle')
        ),
        $buttons
    )
);
