# 03 — URL Inventory (Prod)

> Source: `https://imaanihomes.com/sitemap_index.xml` (Yoast), crawled 11 June 2026.
> **Hard rule: every URL below must resolve identically under the new theme. No slug changes.**

## Pages (10)

| URL | Notes |
|---|---|
| `/` | Front page (page ID 6566 on staging). Title tag: `Home - Imaani Homes \| Top Luxury Apartments in Airport` — **unchanged per SEO rule** |
| `/about/` | |
| `/projects/` | "Four Addresses One Standard" index; links Regalia (subdomain), Alexis, Ivy, JAK |
| `/alexis-residence/` | Now Selling |
| `/the-ivy/` | **SOLD OUT** |
| `/jak-royale/` | |
| `/blog/` | Posts page (page ID 7943) |
| `/contact/` | |
| `/thank-you/` | Form destination — keep out of nav, noindex candidate (verify current state before changing) |
| `/privacy-policy/`, `/terms-conditions/` | Legal |

## Posts (14) — permalink structure `/%category%/%postname%/`

Most live under `/blog/` (primary category "Blog"); two have other primary categories:

| URL | Date |
|---|---|
| `/blog/a-guide-to-furnishing-your-luxurious-apartment-in-accra-ghana/` | 2025-01-10 |
| `/blog/tesano-accras-rising-residential-gem-with-strategic-connectivity/` | 2025-08-26 |
| `/blog/foreign-direct-investment-in-ghana-real-estate-surged-18-in-2024-what-the-numbers-mean-for-diaspora-investors/` | 2026-01-05 |
| `/blog/residential-apartment-vs-service-apartment/` | 2026-02-05 |
| `/blog/introducing-regalia-residence-accras-new-standard-for-luxury-living-at-airport-residential/` | 2026-02-05 |
| `/blog/airport-residential-area-ghana-the-complete-guide-to-accras-most-prestigious-neighbourhood/` | 2026-03-01 |
| `/blog/top-luxury-apartments-in-airport-residential-area-2026/` | 2026-03-05 |
| `/blog/airport-residential-area-property-prices-and-analysis-2026/` | 2026-03-05 |
| `/blog/the-ghana-cedi-in-2025-africas-best-performing-currency-and-what-it-means-for-diaspora-investors/` | 2026-03-05 |
| `/blog/ghanas-economic-default-and-recovery-what-happened-what-it-meant-and-where-ghana-stands-in-2026/` | 2026-03-05 |
| `/blog/the-real-definition-of-luxury-living-what-it-actually-means-in-2026/` | 2026-03-05 |
| `/blog/ghanas-real-estate-market-in-march-2026/` | 2026-03-05 |
| `/real-estate-investment-in-ghana/short-let-vs-long-let-accra-apartment-investment-2026/` | 2026-03-25 |
| `/diaspora-opportunities/ishowspeed-got-a-ghanaian-passport-heres-why-black-americans-and-the-african-diaspora-are-buying-property-in-accra-imaani-homes/` | 2026-06-10 |

## Category archives (9)
`/category/{blog, diaspora-opportunities, interior-decoration, neighbourhood-guide, real-estate-in-ghana, real-estate-investment, real-estate-investment-in-ghana, real-estate-market-ghana, top-neighborhoods-in-ghana}/`

## Tag archives (49 in sitemap; 54 tags total on staging, 5 empty/unindexed)
Full list in prod `post_tag-sitemap.xml`. New theme must support `/tag/{slug}/` archives.

## Author archives (2)
`/author/nuser/`, `/author/kwao/`

## Liquid theme leftovers — DECISION NEEDED (Stephen)
Indexed but demo content from the current commercial theme:
- `/portfolios/` + 6 `/portfolio/...` demo entries (data-analysis, rd-service-plan, startup-investment, global-data-analysis, research-and-development, immediate-settlement)
- 3 `/portfolio-category/...` archives
- `?liquid-header=header`, `?liquid-footer=footer`

These CPTs disappear when the Liquid/ArcHub theme + plugins are removed. **Stephen's direction: recreate the same URL structure.** Plan: register a `portfolio` CPT in the new theme with identical rewrite (`/portfolio/%postname%/`, archive `/portfolios/`, taxonomy `portfolio-category`) and migrate the 6 entries so all URLs resolve. Note: current entries are Liquid-theme demo content (e.g. "Data Analysis" — finance demo, verified live). Recommend repurposing them as real Imaani content (or noindexing) during Sprint 2; URLs preserved either way.

## Staging discrepancy — MUST FIX BEFORE PARITY TESTING
Staging post URLs resolve as `/test/{postname}/` (no category base) while prod uses `/%category%/%postname%/`. Set staging Permalinks to **Custom: `/%category%/%postname%/`** to match prod. Attempted via REST 11 Jun — not exposed; **Stephen: wp-admin → Settings → Permalinks on /test/** (one-time). Yoast was reactivated on staging via REST same day (verified active).
