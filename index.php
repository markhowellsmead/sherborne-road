<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

    <head>

        <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>" charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" >

        <link rel="profile" href="http://gmpg.org/xfn/11">

        <?php wp_head(); ?>

    </head>

    <body <?php body_class(); ?>>

        <nav class="masthead">
            <div class="brand">
                <h2 class="header"><a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo('name'); ?></a></h2>
                <p class="subheader"><?php bloginfo('description'); ?></p>
            </div>

<?php if (has_nav_menu('primary-menu')) {
    wp_nav_menu(array(
        'theme_location' => 'primary-menu',
        'items_wrap' => '<ul class="menu">%3$s</ul>',
        'fallback_cb' => false,
        'container' => false,
    ));
}
?>

        </nav>

        <div class="wrapper">

            <?php if (have_posts()) :

                while (have_posts()) :
                    the_post(); ?>

                    <div <?php post_class('post'); ?>>

                        <?php if (!get_post_format() == 'aside') : ?>
                            <header class="post-header">
                                <h1 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                                <?php if (get_post_type() !== 'page') : ?>
                                    <time class="subheader">
                                        <?php
                                        printf(__('Published %s', 'sherborne_road'), get_the_time(get_option('date_format')));
                                        edit_post_link(__('Edit'), ' | ');
                                        ?>
                                    </time>
                                <?php endif;?>
                            </header>
                        <?php endif; ?>

                        <?php if (has_post_thumbnail()) : ?>

                            <div class="featured-image">
                                <?php
                                if (is_singular()) {
                                    the_post_thumbnail('post-thumbnail-full');
                                } else {
                                    ?>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                    <?php the_post_thumbnail('medium'); ?>
                                    </a>
                                <?php

                                }
                                ?>
                            </div>

                        <?php endif; ?>

                        <?php
                            if (is_singular() && function_exists('sherborne_road_media')) {
                                sherborne_road_media();
                            }
                        ?>

                        <div class="content">

                            <?php
                                if (is_singular()) {
                                    the_content();
                                } else {
                                    the_excerpt(); ?>

                                <?php if (get_post_type() == 'photo') : ?>

                                    <p class="more"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php _e('View larger', 'sherborne_road'); ?></a></p>

                                <?php elseif (get_post_type() == 'post') : ?>
                                    <p class="more"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php _e('Read more', 'sherborne_road'); ?></a></p>


                                <?php endif; ?>
                                    <?php

                                }
                            ?>

                        </div>

                        <?php if (is_singular()) {
    wp_link_pages();
} ?>

                        <?php if (get_post_type() == 'post') : ?>

                            <div class="meta">

                                <?php if (is_singular('post')) : ?>

                                    <?php the_terms(get_the_ID(), 'post_tag', '<ul class="tags inline"><li>'.__('More', 'sherborne_road').': </li><li>', '</li><li>', '</li></ul> '); ?>

                                <?php endif; ?>
                            </div>

                        <?php elseif (get_post_type() == 'photo') : ?>

                            <div class="meta">
                                <?php if (is_singular('photo')) : ?>

								   <?php get_template_part('partials/metadata', 'photo');?>
                                   <?php the_terms(get_the_ID(), 'collection', '<ul class="tags inline"><li>'.__('More', 'sherborne_road').': </li><li>', '</li><li>', '</li></ul> '); ?>

                                <?php endif; ?>

                            </div>

                        <?php endif; ?>

                        <?php comments_template(); ?>

                    </div>

                    <?php

                endwhile;

            else : ?>

                <div class="post">

                    <p><?php _e('Sorry, the page you requested cannot be found.', 'sherborne_road'); ?></p>

                </div>

            <?php endif; ?>

            <?php if ((!is_singular()) && ($wp_query->post_count >= get_option('posts_per_page'))) : ?>

                <div class="pagination">

                    <?php previous_posts_link('&larr; '.__('Newer posts', 'sherborne_road')); ?>
                    <?php next_posts_link(__('Older posts', 'sherborne_road').' &rarr;'); ?>

                </div>

            <?php endif; ?>

            <footer>

                <p class="credit">This site is proudly powered by <a href="https://wordpress.org/">WordPress</a> and uses the <a href="https://github.com/markhowellsmead/sherborne-road">Sherborne Road</a> theme by <a href="https://markweb.ch/">Mark Howells-Mead</a>.</p>
                <p>&copy; <?php echo date('Y'); ?> <a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo('name'); ?></a></p>

            </footer>

        </div>

        <?php wp_footer(); ?>

    </body>
</html>
