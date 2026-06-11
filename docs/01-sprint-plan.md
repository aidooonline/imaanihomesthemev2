# 01 — Sprint Plan

## Tech stack (default)

- Classic WordPress theme, PHP 8+, custom post types where needed
- Vite + npm for asset pipeline
- Alpine.js for interactions (matches the WebsitesGH v3 pattern)
- Hand-rolled CSS with custom properties (burgundy + white tokens)
- ACF if already installed on the WP instance; native blocks/meta otherwise
- Zero new plugins where possible — theme adapts to what's already on the WP install

## Branch strategy

- `main` — production-ready, tagged per sprint
- `develop` — integration branch
- `feature/sprint-X-...` — one branch per sprint, PR into `develop`
- Sprint complete → tag a release on `main`

## Sprint 0 — Discovery & Architecture

**Goal:** lock the ground truth before writing any code.

**Tasks:**
- Crawl `imaanihomes.com` (sitemap.xml + manual traversal of every linked URL, including all blog posts)
- Capture URL inventory + post types + taxonomies + existing slugs
- Inventory installed plugins, ACF field groups, custom post types (via staging WP admin)
- Pull verified stats from project pages (units, sizes, locations)
- Finalise theme architecture + file structure

**Deliverables:**
- `docs/03-url-inventory.md`
- `docs/04-content-model.md`
- `docs/05-plugin-inventory.md`
- `docs/06-architecture.md`

**Blockers:** needs staging WP admin access from Stephen.

## Sprint 1 — Theme Bootstrap & Design System

- Theme skeleton (`style.css`, `functions.php`, theme setup, image sizes, menus)
- Vite build pipeline, dev/prod npm scripts
- Design tokens (burgundy #7F1221, deep gold #9C7C38 accent, white, neutrals, scale, spacing, radius)
- Typography system (Playfair + Outfit, generous 18px-base type scale — no small fonts)
- Global header (logo, nav, "Get In Touch")
- Global footer (with trust strip)
- Redesigned cookie banner (light, branded)

**Deliverables:** installable theme, design tokens documented in `docs/02-design-system.md`.

## Sprint 2 — Homepage

- Hero: Imaani identity, locked H1, locked subhead, rotating featured project (all 4)
- Stats bar (Est. 2019 · 4 Developments · X Units · 100% On-Time)
- Three-pillar track record (We Deliver / Locations / Finishes)
- Founder mention block
- Testimonials section (markup + admin field, awaits real quotes)
- Homepage investor block
- Final CTA ("Your next address should be unforgettable…" polished)

## Sprint 3 — Projects

- Projects index (`/projects`)
- Single project template
- Regalia card → links to subdomain
- Alexis: deep rewrite to Regalia parity + "Starting from $…"
- The Ivy + JAK Royale: proof + waitlist template

## Sprint 4 — About · Investors · FAQ

- About page (small founder placement)
- Investors page (rental yields, capital appreciation, diaspora-ready) + nav entry
- FAQ page (collapsible Q&A + FAQPage schema)

## Sprint 5 — Blog (priority surface)

- Archive template (list)
- Single post template
- Sticky internal-CTA panel (Regalia / Alexis / Book Consultation) — list + detail
- Categories, tags, pagination, related posts
- Every existing post URL preserved exactly

## Sprint 6 — Contact

- "Reserve your private consultation…" rewrite
- Form with "I'm interested in" dropdown (Regalia / Alexis / General / Investment)
- "Our team responds within 24 hours" promise
- Submit handler wired to existing form/lead plugin on the WP install

## Sprint 7 — SEO · Performance · Polish

- Schema: Organization, RealEstateAgent, BlogPosting, FAQPage
- OG + Twitter cards per template
- Image lazy-load, WebP/AVIF, responsive `srcset`
- Lighthouse pass (target ≥ 90 mobile)
- 301 redirect map if any URL shifts (default: none)
- Cross-browser + mobile QA

## Sprint 8 — Handover

- `docs/INSTALL.md` — exact cPanel Git Version Control pull + activation steps
- `docs/CONTENT-EDITING.md` — where to edit testimonials, founder, CTAs, stats
- `docs/AGENT_HANDOVER.md` — full architecture + decisions log
- Final tagged release

## Verification standard (every sprint)

No "done" until:
1. Build passes
2. Theme activates cleanly on staging
3. All touched URLs render
4. No PHP warnings/errors in `debug.log`
5. No console errors in browser

No premature completion claims.
