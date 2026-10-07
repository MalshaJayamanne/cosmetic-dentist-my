<?php

/**
 * Enqueue frontend styles and scripts.
 */
function theme_front_assets()
{
    /*
    |--------------------------------------------------------------------------
    | Bootstrap CSS
    |--------------------------------------------------------------------------
    */
    wp_enqueue_style(
        'bootstrap',
        THEME_CSS . 'bootstrap.min.css',
        array(),
        '5.0.2',
        'screen'
    );


    /*
    |--------------------------------------------------------------------------
    | Font Awesome
    |--------------------------------------------------------------------------
    */
    wp_enqueue_style(
        'fontawesome',
        THEME_CSS . 'fontawesome.all.min.css',
        array(),
        '6.5.1',
        'screen'
    );


    /*
    |--------------------------------------------------------------------------
    | Google Fonts
    |--------------------------------------------------------------------------
    */
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600&family=Poppins:wght@300;400;500;600;700&display=swap',
        array(),
        null
    );


    /*
    |--------------------------------------------------------------------------
    | Fancybox CSS - CDN
    |--------------------------------------------------------------------------
    */
    wp_enqueue_style(
        'fancybox',
        'https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.1/dist/fancybox/fancybox.css',
        array(),
        '6.1'
    );


    /*
    |--------------------------------------------------------------------------
    | Swiper CSS - CDN
    |--------------------------------------------------------------------------
    */
    wp_enqueue_style(
        'swiper',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
        array(),
        '11'
    );


    /*
    |--------------------------------------------------------------------------
    | Main Theme CSS
    |--------------------------------------------------------------------------
    */
    $theme_css_path = get_stylesheet_directory() . '/style.css';

    $theme_css_ver = file_exists($theme_css_path)
        ? filemtime($theme_css_path)
        : '1.0.1';

    wp_enqueue_style(
        'theme-styles',
        THEME_THEMEROOT . '/style.css',
        array(
            'bootstrap',
            'fontawesome',
            'google-fonts',
            'fancybox',
            'swiper'
        ),
        $theme_css_ver,
        'screen'
    );


    /*
    |--------------------------------------------------------------------------
    | jQuery
    |--------------------------------------------------------------------------
    */
    wp_enqueue_script('jquery');


    /*
    |--------------------------------------------------------------------------
    | Bootstrap JS
    |--------------------------------------------------------------------------
    */
    wp_enqueue_script(
        'bootstrap',
        THEME_JS . 'bootstrap.bundle.min.js',
        array(),
        '5.0.2',
        true
    );


    /*
    |--------------------------------------------------------------------------
    | Fancybox JS - CDN
    |--------------------------------------------------------------------------
    */
    wp_enqueue_script(
        'fancybox',
        'https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.1/dist/fancybox/fancybox.umd.js',
        array(),
        '6.1',
        true
    );


    /*
    |--------------------------------------------------------------------------
    | Swiper JS - CDN
    |--------------------------------------------------------------------------
    */
    wp_enqueue_script(
        'swiper',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
        array(),
        '11',
        true
    );


    /*
    |--------------------------------------------------------------------------
    | Custom JS
    |--------------------------------------------------------------------------
    */
    $custom_js_path = get_stylesheet_directory() . '/js/custom.js';

    $custom_js_ver = file_exists($custom_js_path)
        ? filemtime($custom_js_path)
        : '1.0.0';

    wp_enqueue_script(
        'custom-js',
        THEME_JS . 'custom.js',
        array(
            'fancybox',
            'swiper'
        ),
        $custom_js_ver,
        true
    );


    /*
    |--------------------------------------------------------------------------
    | Theme JavaScript Parameters
    |--------------------------------------------------------------------------
    */
    wp_localize_script(
        'custom-js',
        'THEME_PARAMS',
        array(
            'STICKY_HEADER' => true,
            'SOCIAL_MEDIA'  => ''
        )
    );


    /*
    |--------------------------------------------------------------------------
    | Site Logo JavaScript Variable
    |--------------------------------------------------------------------------
    */
    $custom_logo_id = get_theme_mod('custom_logo');

    $site_logo = $custom_logo_id
        ? wp_get_attachment_image_url($custom_logo_id, 'full')
        : '';

    wp_localize_script(
        'custom-js',
        'SITE_LOGO',
        $site_logo
    );
}


/*
|--------------------------------------------------------------------------
| Hook
|--------------------------------------------------------------------------
*/
add_action('wp_enqueue_scripts', 'theme_front_assets');