# PROJECT STATE — Resume Point

> Read this first when resuming work. Combined with `docs/00-spec.md`, `docs/01-sprint-plan.md`,
> and `docs/02-design-system.md`, this is the complete project state.

**Last updated:** 11 June 2026 — end of discovery conversation

## Where we are

**Sprint 0 (Discovery & Architecture) — IN PROGRESS, blocked only on network access.**

### Done
- Full discovery questionnaire completed with Stephen → every decision locked in `docs/00-spec.md`
- Sprint plan agreed → `docs/01-sprint-plan.md`
- Design direction locked → `docs/02-design-system.md` (burgundy `#7F1221`, white, deep antique gold `#9C7C38` accent, 18px-base type, minimalist luxury)
- Repo scaffolded and pushed
- Staging built by Stephen: **`https://imaanihomes.com/test/`** — prod clone via WPvivid restore (Softaculous fresh install + WPvivid scan-local-backup + restore). Confirmed up and running.
- WP application password created on staging: username `imaanadmin` (Stephen sends the password directly in chat — never store credentials in this repo)

### Immediately next (Sprint 0 completion)
1. Verify network access to `imaanihomes.com` from the build environment (`curl https://imaanihomes.com/test/wp-json/`)
2. Authenticate with the app password against staging REST API
3. Inventory: plugins (`/wp-json/wp/v2/plugins`), post types (`/types`), taxonomies, all pages + posts + slugs, ACF field groups, menus
4. Crawl prod URL inventory (sitemap + traversal) — every page and blog post, preserved exactly
5. Pull verified project stats (units, sizes, locations) from live pages — no invented numbers
6. Write + push: `docs/03-url-inventory.md`, `docs/04-content-model.md`, `docs/05-plugin-inventory.md`, `docs/06-architecture.md`
7. Stephen reviews Sprint 0 docs → then Sprint 1 (theme bootstrap)

### Open items / risks
- **Staging is NOT password-protected** (no Directory Privacy). "Discourage search engines" should be ticked — confirm. Recommend adding Basic Auth, but Stephen hasn't created it; do not assume credentials exist.
- Network allowlist: Stephen added `imaanihomes.com` to Claude's Capabilities → Code execution domain allowlist; it did not propagate to the old conversation — new session should have access. If still `host_not_allowed`, re-check the setting saved.
- Hosting is **TMD Hosting** (shared IP 184.154.70.198, cPanel user `imaaniho`, home `/home/imaaniho`, cPanel theme jupiter). NOT Namecheap. Disk is at 87% (21.89/25 GB) — the /test/ clone roughly doubled usage; bear in mind before creating more copies, and clean up staging when project completes.
- Stephen plans to **delete /test/ after the project** — final INSTALL docs must cover prod deployment, not staging-only.

## Hard rules (do not violate)
- `git pull` before starting work; push after completing work
- Never claim "done"/"fixed" without verified, tangible results (no "it compiles" claims)
- Title tag on prod stays unchanged (SEO decision)
- H1 is `Top Apartments for sale in Ghana` — do not "improve" it
- No WhatsApp button. Light theme only. Gold is a restrained accent (see design system rules)
- Every existing indexed URL must be preserved — no slug changes
- No invented stats — every number verified from live site content
- Never commit credentials (PATs, app passwords, Basic Auth) to this repo

## Key references
- Repo: `github.com/aidooonline/imaanihomesthemev2` (PAT supplied by Stephen in chat)
- Prod: `https://imaanihomes.com` (current theme: commercial page-builder theme — Liquid/Ave family)
- Staging: `https://imaanihomes.com/test/`
- Regalia subdomain: `https://regalia.imaanihomes.com` (stays separate; Projects index links to it)
- Prior design-language reference: `github.com/aidooonline/imaanithemev2`
