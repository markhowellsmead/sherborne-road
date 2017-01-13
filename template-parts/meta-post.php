<?php
if (is_singular()):
?><div class="meta">
    <?php
    the_terms(get_the_ID(), 'post_tag', '<h5>' .__('Topics', 'sherborne_road'). '</h5><ul class="tags inline"><li>', '</li><li>', '</li></ul> ');
    ?>
</div>
<?php get_template_part('template-parts/map-small');
endif;
