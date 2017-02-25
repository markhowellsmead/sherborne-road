<?php if (has_post_thumbnail()): ?>

    <div class="featured-image">
        <?php
if (is_singular()) {
    the_post_thumbnail('photo-full'); ?>
<?php

} else {
    ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php the_post_thumbnail('medium'); ?>
            </a>
        <?php

}
?>
    </div>

<?php

elseif (!is_singular() && function_exists('sherborne_road_video_thumbnail') && $video_url = get_post_meta(get_the_ID(), 'video_ref', true)):
    if ($thumbnail = sherborne_road_video_thumbnail($video_url)) {
        printf(
            '<div class="featured-image">
				                    <a href="%1$s" title="%2$s">
				                        <img src="%3$s">
				                    </a>
				                </div>',
            get_the_permalink(),
            get_the_title(),
            $thumbnail
        );
    }
endif;
