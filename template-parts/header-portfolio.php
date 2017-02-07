<?php
if (get_post_format() !== 'aside') {
    ?>

<header class="post-header">
    <h1 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Portfolio – <?php the_title(); ?></a></h1>
    <?php edit_post_link(__('Edit'), '<p class="subheader">', '</p>'); ?>
</header>

<?php

}
?>
