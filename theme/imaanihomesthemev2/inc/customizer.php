<?php
defined('ABSPATH') || exit;

/**
 * Customizer, every "Stephen edits this later" value lives here.
 * Appearance → Customize → Imaani Homes.
 */
add_action('customize_register', function (WP_Customize_Manager $wp_customize) {

    $wp_customize->add_panel('imaani', ['title' => 'Imaani Homes', 'priority' => 10]);

    // ---- Stats / trust strip ----
    $wp_customize->add_section('imaani_stats', ['title' => 'Stats & Trust Strip', 'panel' => 'imaani']);
    $stats = [
        'imaani_est_year'       => ['Established year', '2019'],
        'imaani_developments'   => ['Developments count', '4'],
        'imaani_units_delivered'=> ['Units delivered (leave blank to hide, must be a verified number)', ''],
        'imaani_sold_out_count' => ['Sold-out developments', '2'],
        'imaani_on_time'        => ['On-time delivery claim', '100% On-Time'],
    ];
    foreach ($stats as $id => [$label, $default]) {
        $wp_customize->add_setting($id, ['default' => $default, 'sanitize_callback' => 'sanitize_text_field']);
        $wp_customize->add_control($id, ['label' => $label, 'section' => 'imaani_stats', 'type' => 'text']);
    }

    $wp_customize->add_setting('imaani_marquee_items', ['default' => '', 'sanitize_callback' => 'sanitize_textarea_field']);
    $wp_customize->add_control('imaani_marquee_items', [
        'label'       => 'Credibility marquee (one item per line)',
        'description' => 'Scrolls in the top bar. Leave blank for the built-in verified list.',
        'section'     => 'imaani_stats',
        'type'        => 'textarea',
    ]);

    // ---- Testimonials ----
    $wp_customize->add_section('imaani_testimonials', ['title' => 'Testimonials', 'panel' => 'imaani']);
    $wp_customize->add_setting('imaani_testimonials_raw', ['default' => '', 'sanitize_callback' => 'sanitize_textarea_field']);
    $wp_customize->add_control('imaani_testimonials_raw', [
        'label'       => 'Testimonials (one per line)',
        'description' => 'Format: Quote | Name | Context. Example: The finish exceeded the brochure. | K. Mensah | Alexis Residence owner. Section stays hidden until at least one real quote is entered.',
        'section'     => 'imaani_testimonials',
        'type'        => 'textarea',
    ]);

    // ---- Founder block ----
    $wp_customize->add_section('imaani_founder', ['title' => 'Founder Mention', 'panel' => 'imaani']);
    $wp_customize->add_setting('imaani_founder_name', ['default' => '', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('imaani_founder_name', ['label' => 'Founder name (blank = generic note)', 'section' => 'imaani_founder', 'type' => 'text']);
    $wp_customize->add_setting('imaani_founder_note', [
        'default' => 'Imaani Homes was founded on a simple promise: build addresses worth keeping, and deliver them on time. Two sold-out developments later, the promise stands.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('imaani_founder_note', ['label' => 'Founder note', 'section' => 'imaani_founder', 'type' => 'textarea']);

    // ---- Contact / company ----
    $wp_customize->add_section('imaani_contact', ['title' => 'Company Details', 'panel' => 'imaani']);
    $contact = [
        'imaani_phone'   => ['Phone', '+233 595 959595'],
        'imaani_email'   => ['Email', 'info@imaanihomes.com'],
        'imaani_address' => ['Address', '1st Floor, Williams Heights, Kwabena Duffour Road, Airport Residential Area, Accra'],
        'imaani_tagline' => ['Tagline', 'Where Elegance Meets Exclusivity'],
    ];
    foreach ($contact as $id => [$label, $default]) {
        $wp_customize->add_setting($id, ['default' => $default, 'sanitize_callback' => 'sanitize_text_field']);
        $wp_customize->add_control($id, ['label' => $label, 'section' => 'imaani_contact', 'type' => 'text']);
    }


    // ---- Project card images (used when the page has no featured image; Regalia has no page) ----
    $wp_customize->add_section('imaani_images', ['title' => 'Project Images', 'panel' => 'imaani']);
    foreach (['regalia' => 'Regalia', 'alexis-residence' => 'Alexis Residence', 'the-ivy' => 'The Ivy', 'jak-royale' => 'JAK Royale'] as $key => $label) {
        $id = 'imaani_img_' . str_replace('-', '_', $key);
        $wp_customize->add_setting($id, ['default' => 0, 'sanitize_callback' => 'absint']);
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, $id, [
            'label' => $label . ', card/hero image',
            'description' => 'Overrides (or supplies) the image shown on homepage hero cards and project cards.',
            'section' => 'imaani_images',
            'mime_type' => 'image',
        ]));
    }

    // ---- Project pricing (shown only when set, verified numbers only) ----
    $wp_customize->add_section('imaani_pricing', ['title' => 'Project Pricing', 'panel' => 'imaani']);
    foreach (['regalia' => 'Regalia', 'alexis' => 'Alexis Residence'] as $key => $label) {
        $id = "imaani_price_{$key}";
        $wp_customize->add_setting($id, ['default' => '', 'sanitize_callback' => 'sanitize_text_field']);
        $wp_customize->add_control($id, [
            'label' => "{$label}, Starting from (e.g. \$120,000). Blank hides the price line.",
            'section' => 'imaani_pricing', 'type' => 'text',
        ]);
    }
});

/** Parsed testimonials, or empty array. */
function imaani_testimonials(): array {
    $raw = trim((string) get_theme_mod('imaani_testimonials_raw', ''));
    if ('' === $raw) return [];
    $out = [];
    foreach (preg_split('/\r\n|\r|\n/', $raw) as $line) {
        $bits = array_map('trim', explode('|', $line));
        if ('' === ($bits[0] ?? '')) continue;
        $out[] = ['quote' => $bits[0], 'name' => $bits[1] ?? '', 'context' => $bits[2] ?? ''];
    }
    return $out;
}
