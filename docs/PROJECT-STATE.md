# PROJECT STATE — Resume Point

> Read this first when resuming work. Combined with `docs/00-spec.md`, `docs/01-sprint-plan.md`,
> and `docs/02-design-system.md`, this is the complete project state.

**Last updated:** 11 June 2026 — Sprint 0 complete; decisions locked; staging prepped (Yoast active, perf plugins off)

## Where we are

**Sprint 0 (Discovery & Architecture) — COMPLETE pending Stephen's doc review.**

### Done
- Full discovery questionnaire completed with Stephen → every decision locked in `docs/00-spec.md`
- Sprint plan agreed → `docs/01-sprint-plan.md`
- Design direction locked → `docs/02-design-system.md` (burgundy `#7F1221`, white, deep antique gold `#9C7C38` accent, 18px-base type, minimalist luxury)
- Repo scaffolded and pushed
- Staging built by Stephen: **`https://imaanihomes.com/test/`** — prod clone via WPvivid restore (Softaculous fresh install + WPvivid scan-local-backup + restore). Confirmed up and running.
- WP application password created on staging: username `imaanadmin` (Stephen sends the password directly in chat — never store credentials in this repo)

### Immediately next
1. **Stephen (2 mins, wp-admin on /test/):** set Permalinks to Custom `/%category%/%postname%/`; tick Settings → Reading → Discourage search engines
2. **Stephen:** add `regalia.imaanihomes.com` to Claude network allowlist (Capabilities → Code execution) so remaining Regalia stats can be crawled (`docs/07-verified-stats.md` gaps)
3. Sprint 1: theme bootstrap (scaffold, Vite, tokens, header/footer/menu, front-page hero with locked H1, portfolio CPT registration)

### Decisions locked 11 Jun (Stephen)
- Portfolio URLs recreated via theme CPT (same structure) — see 03
- Perf plugins deactivated during build (done + verified on staging); reactivation is Stephen's call post-build
- Staging gets noindex (test folder); prod is the real target
- New H1 `Top Apartments for sale in Ghana` is a build goal (prod currently has no H1)
- Project stats sourced from live content → `docs/07-verified-stats.md`

### Sprint 0 verification log (11 Jun 2026)
- Network: `curl https://imaanihomes.com/test/wp-json/` → 200 ✓
- Auth: app password verified against `/users/me` (user id 1) and `/plugins` (200) ✓
- Inventoried: 42 plugins, 11 pages, 14 posts, 13 categories, 54 tags, 182 media, Main Menu (ID 32), active theme ArcHub Child
- Prod sitemap crawled: 9 child sitemaps, all URLs recorded in `docs/03-url-inventory.md`
- Key findings: staging permalink mismatch; Yoast inactive on staging but active on prod; prod home has NO h1 currently; no hard stats (units/prices/sizes) exist in static prod HTML; Liquid portfolio demo URLs indexed; no noindex on staging

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
