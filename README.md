# Imaani Homes Theme v2 (Main Domain)

Custom WordPress theme for **imaanihomes.com** (main domain — Regalia stays on its subdomain).

> **Status:** Sprint 0 — Discovery & Architecture (in progress)
> **Built on:** the design language of `aidooonline/imaanithemev2`, clean-slate codebase
> **Stack:** Classic WP theme · PHP 8+ · Vite · Alpine.js · hand-rolled CSS with design tokens

## Documentation

| Doc | Purpose |
|-----|---------|
| [`docs/00-spec.md`](docs/00-spec.md) | Locked build spec (every decision from the questionnaire) |
| [`docs/01-sprint-plan.md`](docs/01-sprint-plan.md) | Sprint-by-sprint delivery plan |
| [`docs/02-design-system.md`](docs/02-design-system.md) | Palette, typography, tokens |
| `docs/03-url-inventory.md` | (Sprint 0 deliverable — pending staging access) |
| `docs/04-content-model.md` | (Sprint 0 deliverable — pending staging access) |
| `docs/05-plugin-inventory.md` | (Sprint 0 deliverable — pending staging access) |

## Verification standard

No "done" until: build passes, theme activates cleanly on a test environment, all touched URLs render, no PHP warnings/errors in debug log, no console errors. No premature completion claims.

## Deployment

Theme is built and pushed here, then pulled into the staging WP install at `test.imaanihomes.com` via cPanel Git Version Control for QA. Promoted to prod (`imaanihomes.com`) only after sign-off.
