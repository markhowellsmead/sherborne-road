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
    load_theme_textdomain('sherborne_road', get_template_directory() . '/languages');

    $locale_file = get_template_directory() . '/languages/' . get_locale();

    if (is_readable($locale_file)) {
        require_once $locale_file;
    }
}
add_action('after_setup_theme', 'sherborne_road_setup');

add_action('admin_init', function () {
    add_editor_style(get_template_directory_uri() . '/css/editor.css?v=' . $themeversion);
});

/* ENQUEUE STYLES
------------------------------------------------ */

function sherborne_road_load_styles()
{
    global $themeversion;
    //wp_enqueue_style('sherborne_road_fonts', '//fonts.googleapis.com/css?family=Crimson+Text:400,400i,600,600i|Playfair+Display');
    wp_enqueue_style('sherborne_road_fonts', '//fonts.googleapis.com/css?family=Playfair+Display');
    wp_enqueue_style('sherborne_road_style', get_stylesheet_uri(), null, $themeversion);
    wp_enqueue_style('sherborne_road_foundation', get_template_directory_uri() . '/foundation/dist/assets/css/app.css', array('sherborne_road_style'), $themeversion);
    // wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css', array('sherborne_road_style', 'sherborne_road_foundation'), $themeversion);
    wp_enqueue_style('fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.6/css/jquery.fancybox.min.css', array('sherborne_road_style'), $themeversion);
}
add_action('wp_enqueue_scripts', 'sherborne_road_load_styles');

/* ENQUEUE SCRIPTS
------------------------------------------------ */

add_action('wp_head', function () {
    echo '<script>
        document.documentElement.className = document.documentElement.className.replace(\'no-js\', \'js\');
        document.cookie = \'resolution=\'+Math.max(screen.width,screen.height)+("devicePixelRatio" in window ? ","+devicePixelRatio : ",1")+\'; path=/\';
    </script>';
});

function sherborne_road_load_scripts()
{
    if ((!is_admin()) && is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
    wp_enqueue_script('fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.6/js/jquery.fancybox.min.js', array('jquery'), null, true);
    wp_enqueue_script('lazyload', get_template_directory_uri() . '/js/jquery.lazyload.min.js', array('jquery'), $themeversion, true);
    wp_enqueue_script('ui', get_template_directory_uri() . '/js/ui.js', array('jquery', 'lazyload'), $themeversion, true);
    //wp_enqueue_script('foundation', get_template_directory_uri() . '/foundation/dist/assets/js/foundation-sites/js/foundation.min.js', null, $themeversion, true);

    wp_enqueue_script('app', get_template_directory_uri() . '/foundation/dist/assets/js/app.js', array('jquery'), $themeversion, true);
}
add_action('wp_enqueue_scripts', 'sherborne_road_load_scripts');

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
                $media_content = wp_oembed_get('https://www.flickr.com/photos/mhowells/' . $flickr_code . '/', array('width' => 1024, 'height' => 1024));
            }
        } elseif ($post->post_type == 'attachment') {
            $media_content = wp_get_attachment_image($post->ID, 'large');
        } elseif ($fieldvalue = get_post_meta($post->ID, 'multimedia', true)) {
            $media_content = $fieldvalue;
        } elseif ($fieldvalue = get_post_meta($post->ID, 'video_ref', true)) {
            $media_content = '<div class="row column large-10 xlarge-8">' . wp_oembed_get($fieldvalue) . '</div>';
        }

        if ($media_content && $media_content !== '') {
            echo '<div class="featured-image block-margin-after">' . $media_content . '</div>';
        }
    }
}

function sherborne_road_wrapoembed($html, $url = '', $attr = array())
{
    preg_match('~[www\.]youtube~', $url, $matches_yt);
    preg_match('~[www\.]vimeo~', $url, $matches_vimeo);
    if (!is_feed() && (!empty($matches_yt) || !empty($matches_vimeo))) {
        return '<div class="pt-videoembed">' . $html . '</div>';
    } else {
        return '<div class="embedded-content"> ' . $html . '</div>';
    }
}
add_filter('embed_oembed_html', 'sherborne_road_wrapoembed', 10, 4);

function set_my_comment_title($defaults)
{
    $defaults['title_reply'] = __('Leave a comment', 'sherborne_road');

    return $defaults;
}
add_filter('comment_form_defaults', 'set_my_comment_title', 20);

remove_filter('term_description', 'wpautop');

function sherborne_road_video_thumbnail($url)
{
    /*
     *   @rev                16.11.2012 13:28 mhm
     *   @param  url         'https://www.youtube.com/watch?v=Cr2_Dn0e5nU'
     *   @return image src   'https://i.ytimg.com/vi/Cr2_Dn0e5nU/0.jpg'
     *   @ref                https://code.google.com/apis/youtube/2.0/developers_guide_php.html#Understanding_Feeds_and_Entries
     */

    if ($url == '') {
        return '';
    }
    $atts = array('url' => $url);

    $aPath = parse_url($atts['url']);
    $aPath['host'] = str_replace('www.', '', $aPath['host']);

    switch ($aPath['host']) {
        case 'youtu.be':
            $atts['id'] = preg_replace('~^/~', '', $aPath['path']);

            return 'https://i.ytimg.com/vi/' . $atts['id'] . '/0.jpg';
            break;

        case 'youtube.com':
            $aParams = explode('&', $aPath['query']);
            foreach ($aParams as $param):
                //  nach parameter 'v' suchen
                $thisPair = explode('=', $param);
                if (strtolower($thisPair[0]) == 'v'):
                    $atts['id'] = $thisPair[1];
                    break;
                endif;
            endforeach;
            if (!$atts['id']) {
                return '';
            } else {
                return 'https://i.ytimg.com/vi/' . $atts['id'] . '/0.jpg';
            }
            break;

        case 'vimeo.com':

            $urlParts = explode('/', $atts['url']);
            $hash = @unserialize(@file_get_contents('https://vimeo.com/api/v2/video/' . $urlParts[3] . '.php'));
            if ($hash && $hash[0] && (isset($hash[0]['thumbnail_large']) && $hash[0]['thumbnail_large'] !== '')) {
                return $hash[0]['thumbnail_large'];
            } else {
                return '';
            }
            break;

        default:
            return '';
            break;
    }
}
