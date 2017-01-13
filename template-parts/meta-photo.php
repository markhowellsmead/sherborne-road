<?php
if (is_singular()):
?><div class="meta">

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

the_terms(get_the_ID(), 'collection', '<ul class="tags inline"><li>'.__('More', 'sherborne_road').': </li><li>', '</li><li>', '</li></ul> ');

?>
</div><?php

get_template_part('template-parts/map-small');

endif;
