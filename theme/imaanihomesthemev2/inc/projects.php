<?php
defined('ABSPATH') || exit;

/**
 * Project registry. Every fact sourced from live published Imaani content —
 * see docs/07-verified-stats.md. Unverified fields are null/empty and the
 * templates hide them. Unit-type rows can be overridden per page via the
 * `imaani_units_json` post meta (array of {type,size,features}).
 */
function imaani_projects(): array {
    return [
        'regalia' => [
            'name'     => 'Regalia',
            'location' => 'Airport Residential Area',
            'status'   => 'now-selling',
            'badge'    => 'Now Selling',
            'url'      => 'https://regalia.imaanihomes.com',
            'external' => true,
            'tag'      => 'Off-plan · Open for reservations',
            'blurb'    => 'Imaani Homes’ most ambitious project to date. Five unit types from 30 m² studios to 280 m² penthouses, with a three-level amenity offering crowned by a rooftop infinity-edge pool.',
        ],
        'alexis-residence' => [
            'name'     => 'Alexis Residence',
            'location' => 'Tesano',
            'status'   => 'now-selling',
            'badge'    => 'Now Selling',
            'url'      => '/alexis-residence/',
            'external' => false,
            'tag'      => 'Over 90% sold · 3 two-bedroom apartments remaining',
            'blurb'    => 'A boutique collection of modern apartments in the heart of Tesano — design, comfort, and location together. Over 90% sold.',
            'price_key'=> 'imaani_price_alexis',
            'amenities'=> ['Lift Access','Secured Gate Access','Backup Power & Water','Sun Deck & Lounge','Ultra Modern Gym','Rooftop Swimming Pool'],
            'units'    => [], // sizes/types pending verified data from Stephen — template hides empty
        ],
        'the-ivy' => [
            'name'     => 'The Ivy Townhomes',
            'location' => 'Accra',
            'status'   => 'sold-out',
            'badge'    => 'Sold Out',
            'url'      => '/the-ivy/',
            'external' => false,
            'tag'      => '3 & 4-bedroom townhomes · Delivered on time',
            'blurb'    => 'A collection of 3 and 4-bedroom townhomes — fully sold out and delivered on time, to the standard buyers were promised.',
            'proof'    => true,
        ],
        'jak-royale' => [
            'name'     => 'JAK Royale',
            'location' => 'Accra',
            'status'   => 'sold-out',
            'badge'    => 'Sold Out',
            'url'      => '/jak-royale/',
            'external' => false,
            'tag'      => 'Debut project · Fully sold out',
            'blurb'    => 'Imaani Homes’ debut residential project — exclusive one- and two-bedroom residences blending luxury, comfort, and privacy. Fully sold out, delivered on time.',
            'proof'    => true,
        ],
    ];
}

function imaani_project(string $slug): ?array {
    $all = imaani_projects();
    // page slug the-ivy ↔ key the-ivy etc.
    return $all[$slug] ?? null;
}
