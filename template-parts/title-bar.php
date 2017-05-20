<div data-sticky-container>
    <div class="title-bar">
        <div class="row align-justify align-middle">
            <div class="column">
                <h4 class="title-bar-title"><a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo('name');?></a></h4>
            </div>

            <div class="column title-bar-right tiny-1 large-6">
                <button class="hide-for-large menu-icon align-self-right" type="button" data-toggle="offCanvas"></button>
                <?php get_template_part('template-parts/navigation-primary');?>
            </div>
        </div>
    </div>
</div>
