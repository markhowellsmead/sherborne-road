<div class="title-bar sticky" data-sticky data-margin-top="0">
    <div class="title-bar-inner">
        <div class="title-bar-left">
            <div class="hide-for-large">
                <button class="menu-icon" type="button" data-toggle="offCanvas"></button>
                <h2 class="title-bar-title"><a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo('name'); ?></a></h2>
            </div>
        </div>

        <div class="title-bar-right">
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