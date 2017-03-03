<div data-sticky-container>
    <div class="title-bar" data-sticky data-margin-top="0">
        <div class="row align-justify align-bottom">
            <div class="column">
                <div class="row align-middle align-justify">
                    <h2 class="title-bar-title"><a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo('name'); ?></a></h2>
                    <button class="hide-for-large menu-icon" type="button" data-toggle="offCanvas"></button>
                </div>
            </div>

            <div class="">
                <?php
                    if (has_nav_menu('primary-menu')) {
                        wp_nav_menu(array(
                        'theme_location' => 'primary-menu',
                        'items_wrap' => '<nav class="show-for-large"><ul class="menu">%3$s</ul></nav>',
                        'fallback_cb' => false,
                        'container' => false,
                        ));
                    }
                ?>
            </div>
        </div>
    </div>
</div>