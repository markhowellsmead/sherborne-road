<?php

/* THEME SETUP
------------------------------------------------ */

$themedata = array();
$themeversion = null;

function sherborne_road_setup()
{
    global $themedata, $themeversion;
    $themedata = wp_get_theme();
    $themeversion = $themedata->Version;

    // Automatic feed
    add_theme_support('automatic-feed-links');

    // Set content-width
    global $content_width;
    if (!isset($content_width)) {
        $content_width = 720;
    }

    add_image_size('post-thumbnail-full', 1280, 860, false);
    add_image_size('photo-full', 1600, 1200, false);

    // Post thumbnails
    add_theme_support('post-thumbnails');

    // Title tag
    add_theme_support('title-tag');

    // Post formats
    add_theme_support('post-formats', array('aside'));

    // Add nav menu
    register_nav_menu('primary-menu', __('Primary Menu', 'sherborne_road'));

    // Make the theme translation ready
    load_theme_textdomain('sherborne_road', get_template_directory().'/languages');

    $locale_file = get_template_directory().'/languages/'.get_locale();

    if (is_readable($locale_file)) {
        require_once $locale_file;
    }
}
add_action('after_setup_theme', 'sherborne_road_setup');

add_action('admin_init', function () {
    add_editor_style(get_template_directory_uri().'/css/editor.css?v='.$themeversion);
});

/* ENQUEUE STYLES
------------------------------------------------ */

function sherborne_road_load_style()
{
    if (!is_admin()) {
        global $themeversion;
        wp_enqueue_style('sherborne_road_fonts', '//fonts.googleapis.com/css?family=Crimson+Text:400,400i,600,600i|Playfair+Display');
        wp_enqueue_style('sherborne_road_style', get_stylesheet_uri(), null, $themeversion);
        wp_enqueue_style('sherborne_road_grid500', get_template_directory_uri().'/css/grid500.css', array('sherborne_road_style'), $themeversion);
    }
}
add_action('wp_print_styles', 'sherborne_road_load_style');

/* ENQUEUE COMMENT-REPLY.JS
------------------------------------------------ */

function sherborne_road_load_scripts()
{
    if ((!is_admin()) && is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_print_scripts', 'sherborne_road_load_scripts');

function sherborne_road_media()
{

    /*
    * Inserts post-thumbnail or Flickr image or video into the top of the_content
    * (Singular view only)
    *
    * @since    02/03/16
    */

    global $post;

    if (!has_post_thumbnail($post->ID) && (get_post_type() == 'post' || get_post_type() == 'photo') && intval((get_post_meta('show_thumbnail', $post->ID, true)) !== 0)) {
        if ($flickr_code = get_post_meta($post->ID, 'flickr_id', true)) {
            if (filter_var($flickr_code, FILTER_VALIDATE_URL)) {
                $media_content = wp_oembed_get($flickr_code, array('width' => 1024, 'height' => 1024));
            } else {
                $media_content = wp_oembed_get('https://www.flickr.com/photos/mhowells/'.$flickr_code.'/', array('width' => 1024, 'height' => 1024));
            }
        } elseif ($post->post_type == 'attachment') {
            $media_content = wp_get_attachment_image($post->ID, 'large');
        } elseif ($fieldvalue = get_post_meta($post->ID, 'multimedia', true)) {
            $media_content = $fieldvalue;
        } elseif ($fieldvalue = get_post_meta($post->ID, 'video_ref', true)) {
            $media_content = wp_oembed_get($fieldvalue);
        }

        if ($media_content && $media_content !== '') {
            echo '<div class="featured-image">'.$media_content.'</div>';
        }
    }
}

function sherborne_road_wrapoembed($html, $url = '', $attr = array())
{
    preg_match('~[www\.]youtube~', $url, $matches_yt);
    preg_match('~[www\.]vimeo~', $url, $matches_vimeo);
    if (!is_feed() && (!empty($matches_yt) || !empty($matches_vimeo))) {
        return '<div class="pt-videoembed">'.$html.'</div>';
    } else {
        return '<div class="embedded-content"> '.$html.'</div>';
    }
}
add_filter('embed_oembed_html', 'sherborne_road_wrapoembed', 10, 4);

function set_my_comment_title($defaults)
{
    $defaults['title_reply'] = __('Leave a comment', 'sherborne_road');

    return $defaults;
}
add_filter('comment_form_defaults', 'set_my_comment_title', 20);
