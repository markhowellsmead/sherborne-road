<nav class="masthead">

    <div class="constraint">
        <div class="brand">
            <h2 class="header"><a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo('name'); ?></a></h2>
            <p class="subheader"><?php bloginfo('description'); ?></p>
        </div>

        <?php
        if (has_nav_menu('primary-menu')) {
            wp_nav_menu(array(
            'theme_location' => 'primary-menu',
            'items_wrap' => '<ul class="menu">%3$s</ul>',
            'fallback_cb' => false,
            'container' => false,
            ));
        }
        ?>
    </div>

</nav>
