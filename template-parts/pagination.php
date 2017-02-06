<?php if ((!is_singular()) && ($wp_query->post_count >= get_option('posts_per_page'))) : ?>

    <div class="pagination">

        <?php
        previous_posts_link('&larr; '. (get_post_type() == 'photo' ? __('Newer', 'sherborne_road') : __('Newer posts', 'sherborne_road'))) ;
        next_posts_link((get_post_type() == 'photo' ? __('Older', 'sherborne_road') : __('Older posts', 'sherborne_road')) . ' &rarr;');
        ?>

    </div>

<?php endif; ?>
