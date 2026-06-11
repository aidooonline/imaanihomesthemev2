# 02 — Design System

> **Status:** Draft. Final values lock in Sprint 1 after a visual pass on the actual UI.

## Design direction (locked)

**Clean white, minimalist, modern — with an enchanting, luxurious real-estate feel.** Burgundy is the brand voice, gold is the whisper. Generous whitespace, large readable type, restrained motion. Nothing cramped, nothing loud.

### Gold usage rules (important — gold is an accent, not a theme)

Gold appears in **small doses only**:
- Eyebrow labels above section headings (small caps, letter-spaced, `--gold`)
- Thin divider rules and ornamental hairlines
- Icon strokes in the pillars/investor blocks
- Stat numerals or their underlines in the stats bar
- Hover transitions (burgundy → gold shimmer on link underlines)

Gold must **never** be used for: large fills, buttons (buttons are burgundy), backgrounds, or body text. If a screen feels "gold," we've overdone it. The test: squint at any page — you should see white, then burgundy, and only *then* notice the gold.

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
| `--gold` | `#9C7C38` | Deep antique gold — secondary accent. Used sparingly: eyebrow labels, dividers, icon strokes, stat numerals, hover details |
| `--gold-soft` | `#B8985A` | Lighter gold for hairline rules and subtle hover transitions |
| `--gold-deep` | `#7D6125` | Darker gold for text-on-white where contrast is needed |

Audit's dark theme direction was **rejected**. Site stays light.

## Typography

| Role | Font | Source |
|---|---|---|
| Headings | **Playfair Display** | Google Fonts, weights 400/500/600/700 |
| Body | **Outfit** | Google Fonts, weights 300/400/500/600 |
| Monospace | system mono stack | for any inline-code rendering |

### Type scale (rem, base = 18px — deliberately generous)

> Direction: **no small fonts**. Body is 18px, vivid and readable. The scale leans large across the board.

| Token | Size (px) | Line height | Usage |
|---|---|---|---|
| `--text-xs` | 0.778rem (14px) | 1.5 | Captions, badges — the floor, nothing smaller |
| `--text-sm` | 0.889rem (16px) | 1.55 | Small body, meta |
| `--text-base` | 1rem (18px) | 1.7 | Body |
| `--text-lg` | 1.167rem (21px) | 1.6 | Lead paragraph |
| `--text-xl` | 1.556rem (28px) | 1.35 | Section eyebrow / small heading |
| `--text-2xl` | 2.111rem (38px) | 1.2 | H3 |
| `--text-3xl` | 2.889rem (52px) | 1.12 | H2 |
| `--text-4xl` | 3.778rem (68px) | 1.06 | H1 (mobile clamps down to ~40px) |
| `--text-5xl` | 4.889rem (88px) | 1.02 | H1 (desktop hero) |

Fluid sizing via `clamp()` on headings so the hero feels grand on desktop without overflowing mobile.

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
