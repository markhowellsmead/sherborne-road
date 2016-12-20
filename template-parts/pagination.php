<?php if ((!is_singular()) && ($wp_query->post_count >= get_option('posts_per_page'))) : ?>

    <div class="pagination">

        <?php previous_posts_link('&larr; '.__('Newer posts', 'sherborne_road')); ?>
        <?php next_posts_link(__('Older posts', 'sherborne_road').' &rarr;'); ?>

    </div>

<?php endif; ?>
