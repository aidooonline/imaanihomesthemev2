<?php
defined('ABSPATH') || exit;

add_action('wp_enqueue_scripts', function () {
    $css = IMAANI_DIR . '/assets/css/main.css';
    $js  = IMAANI_DIR . '/assets/js/main.js';

    wp_enqueue_style('imaani-fonts',
        'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Outfit:wght@300;400;500;600&display=swap',
        [], null);
    wp_enqueue_style('imaani-main', IMAANI_URI . '/assets/css/main.css', ['imaani-fonts'], file_exists($css) ? filemtime($css) : IMAANI_VERSION);
    wp_enqueue_script('imaani-main', IMAANI_URI . '/assets/js/main.js', [], file_exists($js) ? filemtime($js) : IMAANI_VERSION, true);
});

add_filter('style_loader_tag', function ($tag, $handle) {
    if ('imaani-fonts' === $handle) {
        $tag = '<link rel="preconnect" href="https://fonts.googleapis.com">' .
               '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . $tag;
    }
    return $tag;
}, 10, 2);
