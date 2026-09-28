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

    // Main theme CSS
    wp_enqueue_style(
        'theme-styles',
        THEME_THEMEROOT . '/style.css',
        array('bootstrap'),
        '1.0.0',
        'screen'
    );

    // WordPress jQuery
    wp_enqueue_script('jquery');

    // Bootstrap JS
    wp_enqueue_script(
        'bootstrap',
        THEME_JS . 'bootstrap.bundle.min.js',
        array('jquery'),
        '5.0.2',
        true
    );
}

add_action('wp_enqueue_scripts', 'theme_front_assets');