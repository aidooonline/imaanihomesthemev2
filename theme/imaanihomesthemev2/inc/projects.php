<?php
defined('ABSPATH') || exit;

/**
 * Project registry. Every fact sourced from live published Imaani content , 
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
            'media_slug' => 'regalia-residence-aerial',
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
            'media_slug' => 'alexis-residences_final-stills_exterior_1',
            'subtitle' => 'Live in Style',
            'blurb'    => 'Welcome to Alexis Residence, a boutique collection of modern apartments in the heart of Tesano, where design, comfort, and location come together seamlessly, thoughtfully designed homes filled with natural light and generous space, ideal for professionals, couples, and families looking for stylish urban living in one of Accra\'s most well-connected neighbourhoods.',
            'body'     => [
                'Thoughtfully designed to redefine modern living, Alexis Residence features facades with a harmonious blend of natural tones and textures, perfectly complementing the serene surroundings. Every home is crafted with meticulous attention to detail, offering an unmatched living experience.',
                'Alexis Residence is Tesano\'s newest address worth paying attention to, a home that works for you, an asset that performs. Get in touch today to find out more.',
            ],
            'gallery_slugs' => [
                'alexis-residences_final-stills_exterior_1',
                'alexis-residences_final-stills_orastudio_-interior-_-living-area',
                'alexis-residences-interior-_-kitchen-area',
                'alexis-residences_final-stills_orastudio_-interior-_-bathroom2',
            ],
            'price_key'=> 'imaani_price_alexis',
            'amenities'=> ['Lift Access','Secured Gate Access','Backup Power & Water','Sun Deck & Lounge','Ultra Modern Gym','Rooftop Swimming Pool'],
            'units'    => [],
        ],
        'the-ivy' => [
            'name'     => 'The Ivy Townhomes',
            'location' => 'Accra',
            'status'   => 'sold-out',
            'badge'    => 'Sold Out',
            'url'      => '/the-ivy/',
            'external' => false,
            'tag'      => '3 & 4-bedroom townhomes · Delivered on time',
            'blurb'    => 'A collection of 3 and 4-bedroom townhomes, fully sold out and delivered on time, to the standard buyers were promised.',
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
            'blurb'    => 'Imaani Homes\' debut residential project: exclusive one- and two-bedroom residences blending luxury, comfort, and privacy. Fully sold out, delivered on time.',
            'proof'    => true,
        ],
    ];
}

function imaani_project(string $slug): ?array {
    $all = imaani_projects();
    // page slug the-ivy ↔ key the-ivy etc.
    return $all[$slug] ?? null;
}
