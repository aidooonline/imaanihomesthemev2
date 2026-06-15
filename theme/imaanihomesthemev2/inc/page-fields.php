<?php
defined('ABSPATH') || exit;

/**
 * Page content fields — lets Stephen edit every page's structural copy from the
 * normal WordPress page editor instead of touching code. Each field has a
 * sensible default (the original copy), so empty = fall back to default.
 *
 * Helper: imaani_field($key, $default = '') reads the current page's meta.
 */

function imaani_field(string $key, string $default = ''): string {
    if (!is_singular()) return $default;
    $val = get_post_meta(get_the_ID(), $key, true);
    return ('' !== $val && null !== $val) ? $val : $default;
}

/** Field definitions per page template (by page slug). */
function imaani_page_field_defs(): array {
    return [
        'about' => [
            'imaani_about_eyebrow'   => ['About Imaani Homes', 'text'],
            'imaani_about_title'     => ['Precision. Intention. Value.', 'text'],
            'imaani_about_lead'      => ['Where Elegance Meets Exclusivity — four developments in Accra\'s most established neighbourhoods, two already sold out and delivered on time.', 'textarea'],
            'imaani_about_body'      => ['', 'wysiwyg'], // blank → uses the default prose block
        ],
        'investors' => [
            'imaani_inv_eyebrow' => ['For Investors', 'text'],
            'imaani_inv_title'   => ['Invest where Accra already lives well', 'text'],
            'imaani_inv_lead'    => ['Imaani Homes builds in established neighbourhoods with a delivery record to match — two developments sold out and handed over on time.', 'textarea'],
            'imaani_inv_body'    => ['', 'wysiwyg'],
        ],
        'contact' => [
            'imaani_contact_eyebrow' => ['Contact', 'text'],
            'imaani_contact_title'   => ['Reserve your private consultation', 'text'],
            'imaani_contact_lead'    => ['Tell us what you\'re looking for — a home, an investment, or both. Our team responds within 24 hours.', 'textarea'],
        ],
        'faq' => [
            'imaani_faq_eyebrow' => ['Questions', 'text'],
            'imaani_faq_title'   => ['Frequently asked questions', 'text'],
        ],
        'projects' => [
            'imaani_projects_eyebrow' => ['Our Developments', 'text'],
            'imaani_projects_title'   => ['Four Addresses, One Standard', 'text'],
            'imaani_projects_lead'    => ['Two sold out and delivered on time. Two now selling. Every address built to the same finish specification, in neighbourhoods that hold their value.', 'textarea'],
        ],
    ];
}

/** Project pages (alexis-residence, the-ivy, jak-royale) share one field set. */
function imaani_project_field_defs(): array {
    return [
        'imaani_proj_subtitle' => ['', 'text'],
        'imaani_proj_blurb'    => ['', 'textarea'],
        'imaani_proj_body'     => ['', 'wysiwyg'],
    ];
}

/** Which slugs are project pages. */
function imaani_is_project_slug(string $slug): bool {
    return in_array($slug, ['alexis-residence', 'the-ivy', 'jak-royale'], true);
}

/* ---------- Register meta + meta box ---------- */
add_action('init', function () {
    $all = [];
    foreach (imaani_page_field_defs() as $fields) {
        foreach ($fields as $k => $d) $all[$k] = $d[1];
    }
    foreach (imaani_project_field_defs() as $k => $d) $all[$k] = $d[1];

    foreach ($all as $key => $type) {
        register_post_meta('page', $key, [
            'show_in_rest'  => true,
            'single'        => true,
            'type'          => 'string',
            'auth_callback' => function () { return current_user_can('edit_pages'); },
        ]);
    }
});

add_action('add_meta_boxes', function () {
    global $post;
    if (!$post) return;
    $slug = $post->post_name;
    $defs = imaani_page_field_defs();
    $has = isset($defs[$slug]) || imaani_is_project_slug($slug);
    if (!$has) return;

    add_meta_box('imaani_page_fields', 'Imaani — Page Content', function ($post) use ($slug, $defs) {
        wp_nonce_field('imaani_page_fields', 'imaani_page_fields_nonce');
        $fields = imaani_is_project_slug($slug) ? imaani_project_field_defs() : $defs[$slug];
        echo '<style>.imaani-mb{display:grid;gap:16px}.imaani-mb label{display:block;font-weight:600;margin-bottom:4px}.imaani-mb input[type=text],.imaani-mb textarea{width:100%;padding:8px;border:1px solid #ddd;border-radius:4px}.imaani-mb .hint{color:#777;font-weight:400;font-size:12px;margin:2px 0 6px}</style>';
        echo '<div class="imaani-mb">';
        echo '<p class="hint">Leave any field blank to use the theme default. These control the visible copy on this page.</p>';
        foreach ($fields as $key => $d) {
            [$default, $type] = $d;
            $val = get_post_meta($post->ID, $key, true);
            $label = ucwords(str_replace(['imaani_', 'about_', 'inv_', 'contact_', 'faq_', 'projects_', 'proj_', '_'], ['', '', '', '', '', '', '', ' '], $key));
            echo '<div>';
            echo '<label for="' . esc_attr($key) . '">' . esc_html($label) . '</label>';
            if ('' !== $default) echo '<p class="hint">Default: ' . esc_html(wp_trim_words($default, 18)) . '</p>';
            if ('wysiwyg' === $type) {
                wp_editor($val, $key, ['textarea_rows' => 8, 'media_buttons' => true, 'teeny' => false]);
            } elseif ('textarea' === $type) {
                echo '<textarea id="' . esc_attr($key) . '" name="' . esc_attr($key) . '" rows="3">' . esc_textarea($val) . '</textarea>';
            } else {
                echo '<input type="text" id="' . esc_attr($key) . '" name="' . esc_attr($key) . '" value="' . esc_attr($val) . '">';
            }
            echo '</div>';
        }
        echo '</div>';
    }, 'page', 'normal', 'high');
});

add_action('save_post_page', function ($post_id) {
    if (!isset($_POST['imaani_page_fields_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['imaani_page_fields_nonce'])), 'imaani_page_fields')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_page', $post_id)) return;

    $slug = get_post_field('post_name', $post_id);
    $defs = imaani_page_field_defs();
    $fields = imaani_is_project_slug($slug) ? imaani_project_field_defs() : ($defs[$slug] ?? []);

    foreach ($fields as $key => $d) {
        if (!isset($_POST[$key])) continue;
        $type = $d[1];
        $raw = wp_unslash($_POST[$key]);
        if ('wysiwyg' === $type) {
            $clean = wp_kses_post($raw);
        } elseif ('textarea' === $type) {
            $clean = sanitize_textarea_field($raw);
        } else {
            $clean = sanitize_text_field($raw);
        }
        update_post_meta($post_id, $key, $clean);
    }
});
