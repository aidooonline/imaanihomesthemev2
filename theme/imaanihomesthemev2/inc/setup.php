<?php
defined('ABSPATH') || exit;

add_action('after_setup_theme', function () {
    add_theme_support('title-tag'); // Yoast keeps the existing prod title, do not override
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form','comment-form','comment-list','gallery','caption','style','script']);
    add_theme_support('responsive-embeds');
    add_theme_support('custom-logo', ['height' => 64, 'width' => 220, 'flex-width' => true, 'flex-height' => true]);

    register_nav_menus([
        'primary' => __('Primary Menu', 'imaani'),
        'footer'  => __('Footer Menu', 'imaani'),
    ]);

    add_image_size('imaani-card', 720, 520, true);
    add_image_size('imaani-hero', 1600, 1000, true);
});

add_action('init', function () {
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
});

// Page meta editable remotely (REST) and via custom fields UI
add_action('init', function () {
    foreach (['imaani_form_shortcode', 'imaani_units_json'] as $key) {
        register_post_meta('page', $key, [
            'show_in_rest'  => true,
            'single'        => true,
            'type'          => 'string',
            'auth_callback' => function () { return current_user_can('edit_pages'); },
        ]);
    }
});

// Route the three project pages to the shared project template
add_filter('template_include', function ($template) {
    if (is_page(['alexis-residence', 'the-ivy', 'jak-royale'])) {
        $t = locate_template('page-project.php');
        if ($t) return $t;
    }
    return $template;
});
