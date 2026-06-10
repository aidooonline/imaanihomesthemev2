# 02 — Design System

> **Status:** Draft. Final values lock in Sprint 1 after a visual pass on the actual UI.

## Palette

| Token | Hex | Usage |
|---|---|---|
| `--brand` | `#7F1221` | Primary CTAs, key links, brand accent |
| `--brand-dark` | `#5E0D18` | Hover/active state for brand colour |
| `--brand-deep` | `#3F0810` | Pressed/emphasis variants |
| `--brand-tint` | `#F7E8EB` | Subtle wash backgrounds, badges |
| `--white` | `#FFFFFF` | Cards, panels, primary surfaces |
| `--page-bg` | `#FAFAF7` | Page background (warm off-white, not clinical) |
| `--ink` | `#1A1A1A` | Body text |
| `--ink-muted` | `#3A3A3A` | Secondary text |
| `--ink-soft` | `#6B6B6B` | Tertiary text, captions |
| `--line` | `#E5E2DC` | Borders, hairlines |
| `--gold-accent` | TBD | Optional accent (currently in current site; decide in Sprint 1) |

Audit's dark theme direction was **rejected**. Site stays light.

## Typography

| Role | Font | Source |
|---|---|---|
| Headings | **Playfair Display** | Google Fonts, weights 400/500/600/700 |
| Body | **Outfit** | Google Fonts, weights 300/400/500/600 |
| Monospace | system mono stack | for any inline-code rendering |

### Type scale (rem, base = 16px)

| Token | Size | Line height | Usage |
|---|---|---|---|
| `--text-xs` | 0.75rem | 1.5 | Captions, badges |
| `--text-sm` | 0.875rem | 1.55 | Small body |
| `--text-base` | 1rem | 1.65 | Body |
| `--text-lg` | 1.125rem | 1.6 | Lead paragraph |
| `--text-xl` | 1.5rem | 1.4 | Section eyebrow / small heading |
| `--text-2xl` | 2rem | 1.25 | H3 |
| `--text-3xl` | 2.75rem | 1.15 | H2 |
| `--text-4xl` | 3.5rem | 1.1 | H1 (mobile) |
| `--text-5xl` | 4.5rem | 1.05 | H1 (desktop) |

## Spacing scale (rem)

`--space-1` 0.25 · `--space-2` 0.5 · `--space-3` 0.75 · `--space-4` 1 · `--space-5` 1.5 · `--space-6` 2 · `--space-8` 3 · `--space-10` 4 · `--space-12` 6 · `--space-16` 8 · `--space-20` 12

## Radii

`--radius-sm` 4px · `--radius` 8px · `--radius-lg` 16px · `--radius-pill` 999px

## Shadows

| Token | Value |
|---|---|
| `--shadow-sm` | `0 1px 2px rgba(20,20,20,0.04), 0 1px 1px rgba(20,20,20,0.03)` |
| `--shadow` | `0 4px 12px rgba(20,20,20,0.06), 0 2px 4px rgba(20,20,20,0.04)` |
| `--shadow-lg` | `0 12px 32px rgba(20,20,20,0.08), 0 4px 8px rgba(20,20,20,0.05)` |

## Buttons

- **Primary** — burgundy fill, white text, no shadow, slight letter-spacing
- **Outline** — transparent fill, burgundy border + text, hover fills burgundy
- **Ghost** — no border, burgundy text, underline on hover

## Motion

- Default transition: `180ms ease-out`
- Hover lifts: 1–2px on cards, no large translations
- No bouncy/spring physics — this is a luxury brand, motion is restrained
