# CONTENT-EDITING — where to change what

Everything an admin edits lives in **Appearance → Customize → Imaani Homes** unless noted.

| What | Where | Notes |
|---|---|---|
| Stats bar / footer trust strip | Customize → Stats & Trust Strip | "Units delivered" stays hidden until you enter a **verified** number; until then the strip shows "2 Sold Out" in its place |
| Testimonials | Customize → Testimonials | One per line: `Quote | Name | Context`. Homepage section stays hidden until at least one line exists |
| Founder name + note | Customize → Founder Mention | Blank name renders "— The Founder, Imaani Homes" |
| Phone / email / address / tagline | Customize → Company Details | Feeds header, footer, contact page, schema, and form recipient |
| "Starting from $…" prices | Customize → Project Pricing | Regalia + Alexis fields. Blank = price line hidden. Enter verified prices only |
| Logo | Customize → Site Identity → Logo | Falls back to styled text brand if unset |
| Menus | Appearance → Menus | `primary` and `footer` locations |
| Project facts (status, blurb, amenities) | `inc/projects.php` in the theme | Code-versioned on purpose — these are marketing-critical claims. Edit via repo + redeploy |
| Alexis unit types/sizes | Page → Custom Fields → `imaani_units_json` | JSON array: `[{"type":"2-Bedroom","size":"91–102 m²","features":"…"}]`. Renders the unit grid once filled |
| Replace native form with CF7 | Page → Custom Fields → `imaani_form_shortcode` | Paste a CF7 shortcode; it overrides the built-in form on that page |
| FAQ questions | `inc/helpers.php` → `imaani_faq_items()` | Schema (FAQPage) regenerates automatically from the same list |
| Cookie banner text | `footer.php` | Links to Privacy Policy |

## Form submissions

The built-in form mails **Company Details → Email** (default info@imaanihomes.com) with subject `Consultation request — {interest} — {name}` or `Waitlist signup — …`, Reply-To set to the enquirer. Honeypot + nonce included. If mail delivery fails, the visitor lands on /thank-you/ with a visible "email us directly" notice rather than a false success.

## What NOT to change

- Home H1 (`Top Apartments for sale in Ghana`) and subhead — locked SEO decisions (docs/00-spec.md)
- Title tag — managed by Yoast, intentionally unchanged
- Post slugs/permalinks — every indexed URL is preserved; changing slugs breaks SEO
