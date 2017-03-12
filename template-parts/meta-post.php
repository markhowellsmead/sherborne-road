<?php
if (is_singular()) {
    printf(
        '<aside class="meta aside block-margin-after">
            <div class="row column">
                %1$s
            </div>
        </aside>',
        get_the_term_list(get_the_ID(), 'post_tag', '<h5>' . __('Topics', 'sherborne_road') . '</h5><ul class="tags inline"><li>', '</li><li>', '</li></ul> ')
    );

    get_template_part('template-parts/map-small');
}
