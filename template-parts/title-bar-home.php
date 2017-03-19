<div data-sticky-container>
    <div class="title-bar" data-sticky data-margin-top="0">
        <div class="row align-justify align-middle">
            <div class="column">
                <h1 class="title-bar-title"><a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo('name');?></a></h1>
            </div>

            <div class="column title-bar-right tiny-1 large-6">
                <button class="hide-for-large menu-icon" data-toggle="offCanvas"></button>
                <?php get_template_part('template-parts/navigation-primary');?>
            </div>
        </div>
    </div>
</div>
