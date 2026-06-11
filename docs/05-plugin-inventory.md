# 05 — Plugin Inventory (Staging, 42 plugins)

> Source: `/test/wp-json/wp/v2/plugins`, 11 June 2026. Status = staging; prod differs where noted.

## Theme-coupled — REMOVED with new theme
| Plugin | Ver | Status | Action |
|---|---|---|---|
| ArcHub Core | 1.2.13 | active | Remove (theme framework) |
| ArcHub Elementor Addons | 1.2.13 | active | Remove |
| ArcHub Portfolio | 1.0 | active | Remove — kills `/portfolio/*` URLs (see 03 decision) |
| Elementor | 4.1.2 | active | Remove after rebuild verified |
| Elementor Pro | 4.1.1 | active | Remove after rebuild verified |
| Liquid GDPR Box | 1.0.2 | active | Remove; replace with theme-native cookie notice (WP Consent API stays) |

## Keep — business critical
| Plugin | Ver | Status | Notes |
|---|---|---|---|
| LeadCapture Client | 2.1.0 | active | Stephen's SaaS — must keep working; test forms post-rebuild |
| Contact Form 7 | 6.1.6 | active | Powers contact forms; new theme styles CF7 output |
| Mailchimp | 2.1.0 | active | |
| Site Kit by Google | 1.180.0 | active | GA/GSC |
| Yoast SEO | 27.8 | **inactive on staging** | **Active on prod** (sitemaps prove it). Reactivate on staging — primary-category permalinks depend on it |
| Akismet | 5.7 | active | |
| WP Consent API | 2.0.1 | active | |
| WPvivid Backup | 0.9.129 | active | Used for staging clone; keep for prod deploy |

## Keep — ops/security (review hardening post-launch)
Classic Editor, Classic Widgets, Easy Updates Manager, Login Lockdown, Manage Notification E-mails, WP Activity Log, WPCode Lite, WordPress Importer.

## Performance stack — consolidate (currently double-stacked)
Active: Performance Lab + 5 PL modules (Embed Optimizer, Image Placeholders, Modern Image Formats, Optimization Detective, Speculative Loading, Web Worker Offloading), Image Optimizer 1.7.5, Performant Translations.
Inactive: **WP Rocket 3.12.4** (licensed? check prod — if active on prod it overlaps PL modules).
**Recommendation:** new theme is lightweight; pick ONE stack (WP Rocket alone, or PL modules) and document in 06. Decision: Stephen.

## Inactive — candidates for deletion (disk at 87%)
AIOS 5.4.9, All-in-One WP Migration 7.105, Hello Dolly, Instant Images, Maintenance, Popup Maker, UpdraftPlus, WPS Hide Login, Yoast Duplicate Post.
WP File Manager 8.0.4 is **active** — security risk class of plugin; recommend deactivating on prod once project ends.

## Flags
- Verify prod active-plugin list before launch (staging clone may have drifted; Yoast already proves drift).
- Disk 87% on TMD shared — deleting inactive plugins + old backups buys headroom before Sprint 1 deploys.
