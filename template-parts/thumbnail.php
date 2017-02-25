<?php if (has_post_thumbnail()): ?>

    <div class="featured-image">
        <?php
if (is_singular()) {
    the_post_thumbnail('photo-full');
} else {
    ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php the_post_thumbnail('medium'); ?>
            </a>
        <?php

}
?>
    </div>

<?php endif;?>
