# CONTENT-EDITING — where to change what

> **All page copy is now editable from the page editor.** Open any page in wp-admin → scroll to the **"Imaani — Page Content"** panel below the editor. Each field shows its default; leave blank to use it. The About, Investors, and project pages also have a full visual (WYSIWYG) body editor for free-form content with images.

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
| Project card/hero images | Page editor → Featured Image (Alexis/Ivy/JAK), or Customize → Project Images | Customizer slot overrides the featured image; it's also the only image slot for Regalia (no page exists). Hero rotator, project cards, and the project-page banner all use these |
| Extra page content (text + images) | Page editor (Alexis/Ivy/JAK/About) | Anything added in the normal WordPress editor renders below the intro section. Legacy Elementor content is intentionally not rendered — clear it before editing these pages in the editor |
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
