<?php
defined('ABSPATH') || exit;

/**
 * Preserves the legacy Liquid-theme portfolio URL structure exactly:
 *   /portfolio/{slug}/  ·  archive /portfolios/  ·  /portfolio-category/{slug}/
 * Entries migrated from the old theme. See docs/03-url-inventory.md.
 */
add_action('init', function () {
    register_post_type('liquid-portfolio', [
        'labels' => ['name' => 'Portfolio', 'singular_name' => 'Portfolio Item'],
        'public' => true,
        'has_archive' => 'portfolios',
        'rewrite' => ['slug' => 'portfolio', 'with_front' => false],
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'menu_icon' => 'dashicons-portfolio',
        'show_in_rest' => true,
        'rest_base' => 'liquid-portfolio',
    ]);

    register_taxonomy('liquid-portfolio-category', 'liquid-portfolio', [
        'labels' => ['name' => 'Portfolio Categories'],
        'public' => true,
        'hierarchical' => true,
        'rewrite' => ['slug' => 'portfolio-category', 'with_front' => false],
        'show_in_rest' => true,
        'rest_base' => 'liquid-portfolio-category',
    ]);
});

// Flush rewrites once on theme switch so the preserved URLs resolve immediately.
add_action('after_switch_theme', 'flush_rewrite_rules');
