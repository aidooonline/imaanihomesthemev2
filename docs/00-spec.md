# 00 — Build Spec (Locked)

Every decision below is locked from the discovery questionnaire and overrides anything contradicting it (including the audit document).

## Foundation

| Item | Decision |
|---|---|
| Codebase | Fresh repo (`imaanihomesthemev2`), built referencing the design language of `imaanithemev2` |
| Domain | `imaanihomes.com` (main domain). Regalia stays on its subdomain |
| Staging | `test.imaanihomes.com` (subdomain, cloned from prod) |
| Title tag | **Unchanged from current** (SEO decision) |
| Theme | Light, clean — **not** the dark direction the audit proposed |
| Palette | Clean white + burgundy `#7F1221` |
| Fonts | Playfair Display (headings) + Outfit (body) |
| Logo | Keep current Imaani logo |
| Tagline | Keep current ("Where Elegance Meets Exclusivity") in header/footer |
| Imagery | Use existing project photography from current site |

## Site-wide

| Item | Decision |
|---|---|
| WhatsApp float button | **No** |
| Testimonials | Section built with placeholders; real quotes added later |
| Founder | Small mention on homepage |
| Cookie banner | Restyled clean & branded (light, not dark) |
| Footer trust strip | `Est. 2019 · 4 Developments · 100% On-Time` style |

## Homepage

| Section | Decision |
|---|---|
| Hero leads | Imaani identity, with rotating featured project (all 4 projects rotate; sold-outs serve as proof) |
| H1 | `Top Apartments for sale in Ghana` |
| Subhead | `Four luxury developments. Two sold out. Every one delivered on time.` |
| Stats bar | `Est. 2019 · 4 Developments · [X] Units Delivered · 100% On-Time` (X verified at crawl) |
| Track-record block | Three pillars: We Deliver / Locations That Appreciate / Finishes That Speak |
| Investor block | Rental Yields / Capital Appreciation / Diaspora-Ready |
| Testimonials | Section markup + admin field; real quotes pending |
| Founder mention | Small block |
| Final CTA | Polished `Your next address should be unforgettable…` block |

## Projects

| Project | Decision |
|---|---|
| Regalia | Card on Projects index links to subdomain; keep current depth |
| Alexis | **Rewrite to match Regalia depth** (unit types, sizes, persona). Show `Starting from $…` |
| Regalia + Alexis | Show `Starting from $…` pricing |
| The Ivy | Convert to **proof + waitlist** page (sold-out story + waitlist signup) |
| JAK Royale | Convert to **proof + waitlist** page (sold-out story + waitlist signup) |

## Pages in scope

Home · About · Projects (+ 4 project pages) · **Investors (new)** · Contact · Blog · **FAQ (new)**

## Blog (primary surface)

| Item | Decision |
|---|---|
| Status | Treated as primary surface, not secondary |
| List page | Sticky/static side panel with internal CTAs (Regalia / Alexis / Book Consultation) |
| Detail page | Same sticky panel |
| URL preservation | **Every existing post URL preserved exactly** — no slug change, no redirect required |

## Contact page

| Item | Decision |
|---|---|
| Tone | Rewrite to `Reserve your private consultation…` |
| Form | Add `I'm interested in` dropdown — Regalia / Alexis / General / Investment |
| Response promise | `Our team responds within 24 hours` |
| WhatsApp | Not present |

## Audit items rejected

| Audit recommended | Decision | Reason |
|---|---|---|
| Dark theme direction | Rejected | Staying light/clean |
| WhatsApp float button | Rejected | Stephen's call |
| Change `Top Luxury Apartments in Airport` title tag | Rejected | SEO call |
| `Accra's finest addresses. Delivered.` H1 | Rejected | SEO call — H1 stays keyword-forward |

## Build-time research (mandatory, before any code)

1. Crawl every URL on `imaanihomes.com` — main pages + every blog post — and inventory all
2. Inspect the staging WP install for plugins, ACF field groups, custom post types, current options
3. Preserve every indexed URL — no slug broken, no SEO lost
4. Pull verified numbers (units, sizes, locations) from live project pages — no invented stats
