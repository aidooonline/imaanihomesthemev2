# 06 — Architecture (New Theme)

## Theme
- Classic WP theme, zero page builders: `imaanihomesthemev2` (same approach as WebsitesGH v3 / imaanithemev2 lineage).
- PHP templates + Vite-built assets (single CSS + single JS bundle), Alpine.js for interactivity. No jQuery dependency beyond WP core needs.
- Design tokens from `docs/02-design-system.md`: burgundy `#7F1221`, white, deep antique gold `#9C7C38` accent (restrained), 18px base, Playfair-class serif + clean sans pairing per design doc. Light theme only. No WhatsApp button.

## Templates
| Template | Serves |
|---|---|
| `front-page.php` | Home — new H1 exactly `Top Apartments for sale in Ghana`; title tag untouched (Yoast keeps current value) |
| `page-about.php`, `page-contact.php`, `page-thank-you.php` | Slug-mapped page templates |
| `page-projects.php` | "Four Addresses One Standard" grid: Regalia (→ subdomain), Alexis, Ivy (SOLD OUT badge), JAK |
| `page-templates/project.php` | Shared project-page template (Alexis, Ivy, JAK) driven by per-page meta |
| `home.php` | Blog index (`/blog/`) |
| `single.php` | Posts — must render existing classic-HTML/GEO content cleanly |
| `category.php`, `tag.php`, `author.php`, `archive.php`, `search.php`, `404.php` | Archives — all existing archive URLs preserved |
| `header.php` / `footer.php` | Menu (Main Menu loc), footer contact block (verified address/phone/email) |

## Project page data
Native meta boxes (no ACF dependency): status badge (Now Selling / Sold Out), location label, amenities list, gallery IDs, brochure link, CF7/LeadCapture form shortcode slot. Registered in theme `inc/meta.php`. Content entered by Stephen from verified sources only.

## URL preservation
- Permalinks: `/%category%/%postname%/` (match prod; fix staging first — see 03).
- No CPTs introduced for existing content → zero rewrite changes for pages/posts/archives.
- Portfolio leftovers: pending Stephen's decision (recommended 301 → `/projects/` via small mu-plugin or WPCode snippet, not theme code).

## Integrations preserved
- LeadCapture Client forms — verify event capture end-to-end after rebuild.
- CF7 forms — theme provides styled wrappers.
- Site Kit / GA — header/footer hooks intact (`wp_head`/`wp_footer` fully respected).
- Yoast — breadcrumbs optional; sitemaps/meta untouched.

## Build & deploy
- Repo → cPanel Git Version Control on TMD (`/home/imaaniho`), deploy path `wp-content/themes/imaanihomesthemev2/`. Built assets committed (no node on server) — same pattern as TechPlug; watch cPanel Git permission pitfalls encountered there.
- Staging-first: develop against `/test/`, verify, then prod deploy. Final INSTALL doc targets **prod** (staging deleted post-project).
- Disk constraint: 87% used — no extra site copies; prune inactive plugins/backups before deploying.

## Sprint 1 scope (next)
Theme bootstrap: scaffold, Vite pipeline, tokens → CSS custom properties, header/footer/menu, front-page hero with locked H1, deploy to staging, visual sign-off from Stephen.

## Open decisions for Stephen (blocking none of Sprint 1)
1. Portfolio URL handling (301 vs 410 vs 404).
2. Performance stack: WP Rocket vs Performance Lab modules.
3. Staging hardening: tick "Discourage search engines" (currently **no noindex meta on `/test/`** — confirmed 11 Jun) and optional Basic Auth.
