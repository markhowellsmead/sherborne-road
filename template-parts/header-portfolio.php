<?php
if (get_post_format() !== 'aside') {
    ?>

<header class="post-header block-margin-after">
    <div class="row column">
        <h1 class="title"><a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>">Portfolio – <?php the_title();?></a></h1>
        <?php edit_post_link(__('Edit'), '<p>', '</p>');?>
    </div>
</header>

<?php

}
?>
