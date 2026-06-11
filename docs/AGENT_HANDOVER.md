# AGENT_HANDOVER — imaanihomesthemev2

**State as of 11 June 2026 (later):** theme ACTIVATED and LIVE on staging. Post-activation fatal traced to ArcHub companion plugins (archub-core, archub-elementor-addons, archub-portfolio) which require the ArcHub theme — all three deactivated via REST, front end recovered. Portfolio migration script run against staging: all 10 /portfolio* URLs 200. Full page matrix 14/14 200 live. Staging noindex confirmed active. PHP 8.4.21 on staging.

**Note:** the legacy portfolio entries already existed in the staging DB (created by ArcHub Portfolio under the same `liquid-portfolio` CPT key) — the theme's identical CPT registration picked them up seamlessly; the script confirmed rather than recreated them.

## Architecture

Classic WP theme, PHP 8+, zero plugins required, zero build step.

```
theme/imaanihomesthemev2/
├── functions.php            → loads inc/*
├── inc/
│   ├── setup.php            → theme supports, menus, image sizes, REST meta
│   │                          (imaani_form_shortcode, imaani_units_json),
│   │                          template router: alexis/ivy/jak → page-project.php
│   ├── assets.php           → Google Fonts (Playfair Display + Outfit), main.css/js
│   ├── customizer.php       → all admin-editable content (see CONTENT-EDITING.md)
│   ├── projects.php         → project registry — VERIFIED FACTS ONLY (docs/07)
│   ├── cpt-portfolio.php    → CPT `liquid-portfolio` preserving legacy
│   │                          /portfolio/* /portfolios/ /portfolio-category/* URLs
│   ├── schema.php           → RealEstateAgent (front), FAQPage (/faq/); Yoast does the rest
│   ├── forms.php            → native form handler (admin-post.php, nonce, honeypot,
│   │                          wp_mail, redirect → /thank-you/, honest mail-fail state)
│   └── helpers.php          → trust strip, badges, FAQ data, blog panel
├── front-page.php           → locked H1 + subhead, rotating 4-project hero, stats bar,
│                              3 pillars, project grid, investor block,
│                              testimonials (hidden until filled), founder, final CTA
├── page-project.php         → shared: active (amenities/units/price/form)
│                              vs sold-out (proof story + waitlist)
├── page-{projects,contact,investors,faq,about,thank-you}.php
├── home.php / single.php    → blog list + detail, both with sticky CTA panel
├── archive.php = search.php, 404.php, page.php, index.php
├── archive-liquid-portfolio.php / single-liquid-portfolio.php
├── parts/{project-card,cta-final,blog-panel}.php
└── assets/{css/main.css, js/main.js}
```

## Deviations from docs/01-sprint-plan.md (deliberate)

1. **No Vite, no Alpine.js.** One hand-written CSS file + one small vanilla JS file. Rationale: zero build dependencies on cPanel, nothing to compile on deploy, fewer failure modes (cf. TechPlug LiteSpeed/cPanel issues). Design tokens are implemented as CSS custom properties exactly per docs/02.
2. **No CF7 dependency for forms.** CF7's REST create endpoint on staging accepts the request but silently fails to persist (id:null). Theme ships a native handler instead — fully verified end-to-end locally (valid submit → 302 /thank-you/, honeypot swallowed, bad nonce → error state). CF7 can still override per page via `imaani_form_shortcode` meta. LeadCapture wiring remains possible later via the same hook point in `imaani_handle_contact()`.
3. **Testimonials hidden until real quotes exist** (rather than visible lorem placeholders on a live site). Markup + admin field shipped per spec.
4. **"X Units Delivered" stat** — no verified total exists anywhere in live content (docs/07 gap). Field exists in Customizer; strip shows "2 Sold Out" until Stephen supplies a verified number.

## Hard rules honoured

- H1 = `Top Apartments for sale in Ghana` (exactly one h1 on home, verified in rendered HTML)
- Subhead locked text verified
- Title tag untouched (Yoast-managed; theme only declares title-tag support)
- No WhatsApp anywhere (grepped)
- Light theme; gold used only as eyebrow/hairline/numeral accent
- Every indexed URL preserved — 27-URL matrix all 200 locally, incl. all 9 portfolio URLs + both off-blog category permalinks
- No invented stats — all claims traceable to docs/07-verified-stats.md

## Verification performed (local WP 6.8.3 + SQLite, content mirrored from staging via REST)

- `php -l` clean on all 40 files; WP_DEBUG log empty across full crawl
- URL matrix: 27/27 expected statuses (26×200, 1×404 control)
- Content assertions: H1/subhead/stats/cookie-banner/RealEstateAgent on home; FAQPage + 7 items; Alexis amenities + 90% sold; Ivy waitlist + sold-out story; contact dropdown 4 options + 24h promise; sticky panel on blog list/detail; related posts; nav incl. Investors/FAQ
- Forms: rendered nonce + honeypot; valid POST → /thank-you/; spam POST → silent swallow; bad nonce → /contact/?form=expired
- deploy/post-activate.py executed against a clean local instance: creates 3 categories + 6 entries, then verifies all 10 portfolio URLs 200

## Staging actions already completed via REST (11 Jun)

- Yoast reactivated; perf plugins deactivated (PL + 6 modules, Image Optimizer, Performant Translations)
- Investors (8552) + FAQ (8553) pages created
- Main Menu (32): Investors + FAQ added, Contact moved last —
  Home | About | Projects (▾ Regalia, Alexis, Ivy, JAK) | Investors | Blog | FAQ | Contact
- CF7 forms NOT created (endpoint broken — see deviation 2)

## Outstanding (blocked on Stephen)

1. wp-admin on /test/: Permalinks → Custom `/%category%/%postname%/` — STILL PENDING (posts currently 301 from category-base URLs; prod uses the category base). Reading noindex: DONE ✓
3. Add `regalia.imaanihomes.com` to Claude network allowlist → agent crawls remaining Regalia stats (totals/prices/completion)
4. Supply: verified units-delivered total, Alexis unit specs (`imaani_units_json`), Regalia/Alexis starting prices, real testimonials, founder name
5. Decide: LeadCapture wiring for form submissions (hook point ready), perf-plugin reactivation, repurpose-vs-noindex for the 6 demo portfolio entries
6. Prod cutover after staging sign-off (same INSTALL.md steps against the live site; Stephen deletes /test/ after)

## Credentials / repos

- Repo: github.com/aidooonline/imaanihomesthemev2 (PAT in Stephen's memory store, expires ~Aug 2026)
- Staging REST: imaanadmin app password (verified working)
- regalia subdomain: blocked by egress allowlist as of 11 Jun
