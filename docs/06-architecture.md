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
- Portfolio URLs: **preserved** — theme registers `portfolio` CPT + `portfolio-category` taxonomy with rewrites matching current structure; 6 entries migrated (see 03).

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

## Decisions (resolved 11 Jun)
1. Portfolio URLs: recreate same structure via theme CPT (see 03).
2. Performance plugins: **deactivated during build** (done on staging via REST, verified: Performance Lab + all 6 modules, Image Optimizer, Performant Translations inactive; WP Rocket already inactive). Stephen decides reactivation post-build.
3. Staging noindex: yes — **Stephen action:** tick Settings → Reading → "Discourage search engines" on /test/ (not exposed via REST).
4. Home H1: new theme ships `Top Apartments for sale in Ghana` as the H1 (prod currently has none — this is a build goal).
5. Project stats: sourced from live content → `docs/07-verified-stats.md`. Remaining gaps need `regalia.imaanihomes.com` added to the network allowlist.
