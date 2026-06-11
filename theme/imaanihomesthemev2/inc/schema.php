<?php
defined('ABSPATH') || exit;

/**
 * JSON-LD. Yoast (active) emits its own graph for posts/pages; we add only
 * what Yoast doesn't: RealEstateAgent organization details and FAQPage on /faq/.
 */
add_action('wp_head', function () {
    if (is_front_page()) {
        $schema = [
            '@context' => 'https://schema.org',
            '@type'    => 'RealEstateAgent',
            'name'     => 'Imaani Homes',
            'slogan'   => get_theme_mod('imaani_tagline', 'Where Elegance Meets Exclusivity'),
            'url'      => home_url('/'),
            'telephone'=> get_theme_mod('imaani_phone', '+233 595 959595'),
            'email'    => get_theme_mod('imaani_email', 'info@imaanihomes.com'),
            'address'  => [
                '@type' => 'PostalAddress',
                'streetAddress'   => '1st Floor, Williams Heights, Kwabena Duffour Road',
                'addressLocality' => 'Airport Residential Area, Accra',
                'addressCountry'  => 'GH',
            ],
        ];
        echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
    }

    if (is_page('faq') && function_exists('imaani_faq_items')) {
        $items = [];
        foreach (imaani_faq_items() as $qa) {
            $items[] = [
                '@type' => 'Question',
                'name'  => $qa['q'],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => $qa['a']],
            ];
        }
        if ($items) {
            echo '<script type="application/ld+json">' . wp_json_encode([
                '@context'   => 'https://schema.org',
                '@type'      => 'FAQPage',
                'mainEntity' => $items,
            ], JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
        }
    }
}, 5);
