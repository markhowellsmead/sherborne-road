<?php

if (have_posts()) {
    if (is_category()) {
        get_template_part('template-parts/archive-header-category');
    } elseif (is_tag()) {
        get_template_part('template-parts/archive-header-tag');
    } elseif (is_tax('collection')) {
        get_template_part('template-parts/archive-header-collection');
    } elseif (is_tax('technology')) {
        get_template_part('template-parts/archive-header-technology');
    } elseif (is_year()) {
        get_template_part('archive-header-year');
    } elseif (is_month()) {
        get_template_part('archive-header-month');
    } elseif (is_day()) {
        get_template_part('archive-header-day');
    } elseif (is_search()) {
        get_template_part('archive-header-search');
    }
}
