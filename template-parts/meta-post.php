<?php
if (is_singular()):
?><div class="meta">
    <?php the_terms(get_the_ID(), 'post_tag', '<ul class="tags inline"><li>'.__('More', 'sherborne_road').': </li><li>', '</li><li>', '</li></ul> '); ?>
</div><?php
endif;
