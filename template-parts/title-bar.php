<div data-sticky-container>
    <div class="title-bar" data-sticky data-margin-top="0">
        <div class="row align-middle">
            <div class="column large-8">
                <h2 class="title-bar-title"><a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo('name');?></a></h2>
            </div>

            <div class="column large-4" style="text-align:right">
                <button class="hide-for-large menu-icon" type="button" data-toggle="offCanvas"></button>
                <?php
if (has_nav_menu('primary-menu')) {
    wp_nav_menu(array(
        'theme_location' => 'primary-menu',
        'items_wrap' => '<ul class="menu show-for-large">%3$s</ul>',
        'fallback_cb' => false,
        'container' => false,
    ));
}
?>
            </div>
        </div>
    </div>
</div>
