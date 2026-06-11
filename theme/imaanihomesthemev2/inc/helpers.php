<?php
defined('ABSPATH') || exit;

/** Status badge markup. */
function imaani_badge(string $status, string $label): string {
    return '<span class="badge badge--' . esc_attr($status) . '">' . esc_html($label) . '</span>';
}

/** Trust strip items — verified/spec-locked values only. */
function imaani_trust_items(): array {
    $items = [
        'Est. ' . get_theme_mod('imaani_est_year', '2019'),
        get_theme_mod('imaani_developments', '4') . ' Developments',
    ];
    $units = trim((string) get_theme_mod('imaani_units_delivered', ''));
    if ('' !== $units) {
        $items[] = $units . ' Units Delivered';
    } else {
        $items[] = get_theme_mod('imaani_sold_out_count', '2') . ' Sold Out';
    }
    $items[] = get_theme_mod('imaani_on_time', '100% On-Time');
    return $items;
}

/**
 * FAQ content. Factual, sourced from published Imaani content and the locked
 * spec — no invented numbers. Extend freely; schema is generated from this.
 */
function imaani_faq_items(): array {
    return [
        ['q' => 'Which Imaani Homes developments are currently selling?',
         'a' => 'Two developments are currently available: Regalia at Airport Residential Area (off-plan, open for reservations) and Alexis Residence in Tesano, which is over 90% sold with only three two-bedroom apartments remaining.'],
        ['q' => 'Has Imaani Homes delivered previous projects?',
         'a' => 'Yes. JAK Royale, the debut project of one- and two-bedroom residences, is fully sold out. The Ivy Townhomes, a collection of 3 and 4-bedroom townhomes, is also sold out. Both were delivered on time and to the standard buyers were promised.'],
        ['q' => 'What unit types does Regalia offer?',
         'a' => 'Regalia offers five unit types: studios (30–40 m²), 1-bedroom apartments (60–72 m²), 2-bedroom apartments (91–102 m²), 3-bedroom apartments (135 m²), and penthouse suites (257–280 m²). Every unit type has full access to all amenities, with the same finish specification throughout the building.'],
        ['q' => 'What amenities does Regalia include?',
         'a' => 'Amenities are organised across three levels: a ground-level courtyard with landscaped gardens, concierge, EV charging and a children’s play area; a mid-level gymnasium, sauna and steam room, co-working lounge and sky lounge; and a rooftop infinity-edge pool with sun deck, BBQ terrace and 360-degree panoramic deck.'],
        ['q' => 'Can I buy from abroad as a member of the diaspora?',
         'a' => 'Yes. Imaani Homes works with diaspora buyers regularly, and 2-bedroom apartments in established neighbourhoods such as Airport Residential Area and Tesano are a popular choice for diaspora returnees. Contact the sales team to arrange a consultation from wherever you are.'],
        ['q' => 'How do I reserve a unit or book a consultation?',
         'a' => 'Use the contact page to reserve a private consultation — our team responds within 24 hours. You can also call ' . get_theme_mod('imaani_phone', '+233 595 959595') . ' or email ' . get_theme_mod('imaani_email', 'info@imaanihomes.com') . '.'],
        ['q' => 'Where is Imaani Homes located?',
         'a' => get_theme_mod('imaani_address', '1st Floor, Williams Heights, Kwabena Duffour Road, Airport Residential Area, Accra') . '.'],
    ];
}

/** Renders the blog sticky side panel (list + detail). */
function imaani_blog_panel(): void {
    get_template_part('parts/blog-panel');
}

/**
 * Resolves the image for a project card/hero card.
 * Order: Customizer media override → linked page's featured image → '' (gradient fallback).
 */
function imaani_project_image(string $key, array $p, string $size = 'imaani-card'): string {
    $mod_id = (int) get_theme_mod('imaani_img_' . str_replace('-', '_', $key), 0);
    if ($mod_id) {
        $img = wp_get_attachment_image($mod_id, $size, false, ['loading' => 'lazy']);
        if ($img) return $img;
    }
    if (empty($p['external'])) {
        $page = get_page_by_path(trim((string) parse_url($p['url'], PHP_URL_PATH), '/'));
        if ($page && has_post_thumbnail($page)) {
            return get_the_post_thumbnail($page, $size, ['loading' => 'lazy']);
        }
    }
    // Final fallback: a media-library attachment by slug (cached)
    if (!empty($p['media_slug'])) {
        $tkey = 'imaani_media_' . md5($p['media_slug']);
        $att_id = get_transient($tkey);
        if (false === $att_id) {
            $found = get_posts(['post_type' => 'attachment', 'name' => $p['media_slug'], 'post_status' => 'inherit', 'posts_per_page' => 1, 'fields' => 'ids']);
            $att_id = $found ? (int) $found[0] : 0;
            set_transient($tkey, $att_id, DAY_IN_SECONDS);
        }
        if ($att_id) {
            $img = wp_get_attachment_image($att_id, $size, false, ['loading' => 'lazy']);
            if ($img) return $img;
        }
    }
    return '';
}

/** Credibility marquee items — Customizer override, else verified facts. */
function imaani_marquee_items(): array {
    $raw = trim((string) get_theme_mod('imaani_marquee_items', ''));
    if ('' !== $raw) {
        return array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $raw))));
    }
    return [
        'Est. 2019 in Accra',
        'JAK Royale — Sold Out',
        'The Ivy Townhomes — Sold Out',
        'Alexis Residence — Over 90% Sold',
        'Regalia — Now Selling at Airport Residential',
        '100% On-Time Delivery',
        'Trusted by Diaspora Buyers Worldwide',
    ];
}
