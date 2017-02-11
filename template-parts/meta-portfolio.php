<?php
if (is_singular()):
?><div class="meta">

<?php


global $post;

$content_meta = array(
    'dates' => array(
        'type' => 'dates',
        'content' => sprintf(
            'Date: %1$s',
            get_post_meta(get_the_ID(), 'dates', true)
        ),
    ),
);

if ($agency = get_post_meta(get_the_ID(), 'project_agency', true)) {
    if ($agency_url = get_post_meta(get_the_ID(), 'project_agency_url', true)) {
        $content_meta['agency'] = array(
            'type' => 'link',
            'content' => sprintf(
                'Employing agency: <a href="%1$s">%2$s</a>',
                $agency_url,
                $agency
            ),
        );
    } else {
        $content_meta['agency'] = array(
            'type' => 'link',
            'content' => sprintf(
                'Project type: %1$s',
                $agency
            ),
        );
    }
}

$content_meta['website'] = array(
    'type' => 'link',
    'content' => sprintf(
        'Website: <a href="%1$s">%2$s</a>',
        get_post_meta(get_the_ID(), 'project_url', true),
        get_post_meta(get_the_ID(), 'project_url', true)
    ),
);

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

the_terms(get_the_ID(), 'technology', '<ul class="tags inline"><li>'.__('Technologies', 'sherborne_road').': </li><li>', '</li><li>', '</li></ul> ');

?>
</div><?php

endif;
