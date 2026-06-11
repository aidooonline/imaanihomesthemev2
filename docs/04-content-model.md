# 04 — Content Model

> Source: staging REST API (`/test/wp-json/wp/v2/`), 11 June 2026.

## Post types in use
- **page** (11): Home, About, Projects, Alexis Residence, The Ivy, JAK Royale, Blog, Contact, Thank You, Privacy Policy, Terms & Conditions. All built in **Elementor** — no Gutenberg/classic content of consequence.
- **post** (14): standard posts, classic/HTML content (Classic Editor active). Categories + tags as below.
- **attachment**: 182 media items.
- **elementor_library / elementor_snippet / e-floating-buttons**: Elementor template parts (e.g. `services-carousel-*`). Die with Elementor — content must be rebuilt natively in the new theme.
- No ACF. No custom property CPT. No portfolio CPT registered in WP core types (Liquid portfolio is theme-registered on prod only).

## Taxonomies
- **category** (13 terms, 9 indexed): blog (13 posts), real-estate-in-ghana (9), real-estate-investment-in-ghana (7), top-neighborhoods-in-ghana (7), real-estate-market-ghana (2), diaspora-opportunities (1), interior-decoration (1), neighbourhood-guide (1), real-estate-investment (1), plus 4 empty Tesano-related terms.
- **post_tag** (54 terms, 49 indexed).
- Posts are multi-category; permalink uses primary category (Yoast primary term on prod — note Yoast is **inactive on staging**, active on prod; reactivate on staging for parity).

## Menus
**Main Menu** (ID 32): Home, About, Projects ▾ (Regalia → `regalia.imaanihomes.com`, Alexis Residence, The Ivy, JAK Royale), Contact, Blog.
Note: submenu parent ID 7650 — the "Projects" dropdown parent item itself wasn't returned in the first 100 menu-items page; verify when registering menu locations (likely the Projects page item doubles as dropdown trigger).

## Verified content facts (from live pages — no invented numbers)
- Tagline (Projects page): **"Four Addresses One Standard"**
- **Regalia** — Airport Residential Area, "Now Selling", separate subdomain site
- **Alexis Residence** — Tesano, "Now Selling", "limited units available". Amenities listed: Lift Access, Secured Gate Access, Backup Power & Water, Sun Deck & Lounge, Ultra Modern Gym, Rooftop Swimming Pool
- **The Ivy** — "SOLD OUT"; home page calls it "The Ivy Townhomes"
- **JAK Royale** — "exclusive one- and two-bedroom residences"
- Footer/contact: 1st Floor, Williams Height, Kwabena Duffour Rd, Airport Residential Area, Accra — Phone +233 595 959595 — info@imaanihomes.com (verify exact email render; truncated in extraction)
- **No unit counts, prices, sizes, or completion dates appear in static prod HTML.** Any such stats for the new theme must come from Stephen or brochures — do not invent.
- **Prod home page currently has NO `<h1>`.** The locked H1 "Top Apartments for sale in Ghana" is therefore a *new* element the rebuild introduces (spec rule: use exactly that text).
- Prod home title tag: `Home - Imaani Homes | Top Luxury Apartments in Airport` — unchanged.

## New-theme content model (proposal)
- Keep pages as pages; rebuild Home/About/Projects/project pages as native theme templates (no Elementor).
- Project pages: template-driven via theme mods/customizer or a lightweight `project` meta box — decide in `06-architecture.md`. No slug changes; existing page slugs reused.
- Posts: render classic HTML content as-is; existing posts contain inline styling/GEO blocks — theme CSS must not break them (audit in Sprint 1).
