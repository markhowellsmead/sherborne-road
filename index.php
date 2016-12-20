<?php
get_header();
?>

        <div class="wrapper">

            <?php if (have_posts()) :
                while (have_posts()) :
                    the_post(); ?>

                    <div <?php post_class('post'); ?>>

                        <?php
                        get_template_part('template-parts/header-post');
                        get_template_part('template-parts/thumbnail');

                        if (is_singular() && function_exists('sherborne_road_media')) {
                            sherborne_road_media();
                        }
                        ?>

                        <div class="content">

                            <?php
                            if (is_singular()) {
                                the_content();
                            } else {
                                the_excerpt();
                                get_template_part('template-parts/linkto', get_post_type());
                            }
                            ?>

                        </div>

                        <?php
                            get_template_part('template-parts/linkpages');
                            get_template_part('template-parts/meta', get_post_type());
                            comments_template();
                        ?>

                    </div>

                    <?php

                endwhile;

            else:
                get_template_part('template-parts/404');

            endif;

            get_template_part('template-parts/pagination');
            get_template_part('template-parts/footer');
            ?>

        </div>

<?php
get_footer();
