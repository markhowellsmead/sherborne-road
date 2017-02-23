<?php
/*
Template Name: Home
*/

get_header('home');
?>

        <div class="wrapper">

            <?php
            the_post();
            get_template_part('template-parts/rows');
            get_template_part('template-parts/pagination');
            get_template_part('template-parts/footer');
            ?>

        </div>

<?php
get_footer();
