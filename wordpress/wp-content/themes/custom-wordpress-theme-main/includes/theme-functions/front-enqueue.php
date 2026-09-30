<?php

/**
 * Enqueue frontend styles and scripts.
 */
function theme_front_assets()
{
    // Bootstrap CSS
    wp_enqueue_style(
        'bootstrap',
        THEME_CSS . 'bootstrap.min.css',
        array(),
        '5.0.2',
        'screen'
    );

    // Font Awesome
    wp_enqueue_style(
        'fontawesome',
        THEME_CSS . 'fontawesome.all.min.css',
        array(),
        '6.5.1',
        'screen'
    );

    // Google Fonts
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600&family=Poppins:wght@300;400;500;600;700&display=swap',
        array(),
        null
    );

    /*
     * Fancybox 6.1 CSS
     */
    wp_enqueue_style(
        'fancybox',
        'https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.1/dist/fancybox/fancybox.css',
        array(),
        '6.1'
    );

    /*
     * Keep Fancybox above the sticky header
     */
    wp_add_inline_style(
        'fancybox',
        '.fancybox__container {
            z-index: 20500 !important;
        }'
    );

    /*
     * Main Theme CSS
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
            'fancybox'
        ),
        $theme_css_ver,
        'screen'
    );

    /*
     * WordPress jQuery
     */
    wp_enqueue_script('jquery');

    /*
     * Bootstrap JS
     */
    wp_enqueue_script(
        'bootstrap',
        THEME_JS . 'bootstrap.bundle.min.js',
        array(),
        '5.0.2',
        true
    );

    /*
     * Fancybox 6.1 JS
     */
    wp_enqueue_script(
        'fancybox',
        'https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.1/dist/fancybox/fancybox.umd.js',
        array(),
        '6.1',
        true
    );

    // Custom theme JS
    wp_enqueue_script(
        'custom-js',
        THEME_JS . 'custom.js',
        array('fancybox'),
        filemtime(get_stylesheet_directory() . '/../../assets/js/custom.js'),
        true
    );
}

add_action('wp_enqueue_scripts', 'theme_front_assets');