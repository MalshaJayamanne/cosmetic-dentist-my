<?php

/**
 * Enqueue frontend styles and scripts.
 */
function theme_front_assets()
{
    // Bootstrap CSS
    // Local file is 5.0.2. The original site uses 5.3.2: replace the file first, then bump this version.
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

    // Fancybox CSS (loaded before theme CSS so your overrides win)
    wp_enqueue_style(
        'fancybox',
        'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css',
        array(),
        '5.0'
    );

    // Keep the lightbox above the sticky header (z-index 200)
    wp_add_inline_style(
        'fancybox',
        '.fancybox__container{z-index:20500!important;}'
    );

    // Main theme CSS (last, so it overrides everything above)
    $theme_css_path = get_stylesheet_directory() . '/style.css';
    $theme_css_ver  = file_exists($theme_css_path) ? filemtime($theme_css_path) : '1.0.1';

    wp_enqueue_style(
        'theme-styles',
        THEME_THEMEROOT . '/style.css',
        array('bootstrap', 'fontawesome', 'google-fonts', 'fancybox'),
        $theme_css_ver,
        'screen'
    );

    // WordPress jQuery (kept for plugins such as Gravity Forms)
    wp_enqueue_script('jquery');

    // Bootstrap JS (Bootstrap 5 does not need jQuery)
    wp_enqueue_script(
        'bootstrap',
        THEME_JS . 'bootstrap.bundle.min.js',
        array(),
        '5.0.2',
        true
    );

    // Fancybox JS
    wp_enqueue_script(
        'fancybox',
        'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js',
        array(),
        '5.0',
        true
    );

    // One bind covers the video and gallery groups (data-fancybox="videos", "gallery", ...)
    $fancybox_init = <<<'JS'
document.addEventListener("DOMContentLoaded", function () {
    if (typeof Fancybox === "undefined") {
        return;
    }
    Fancybox.bind("[data-fancybox]", {
        animated: true,
        dragToClose: true,
        closeButton: "top"
    });
});
JS;

    wp_add_inline_script('fancybox', $fancybox_init);
}

add_action('wp_enqueue_scripts', 'theme_front_assets');