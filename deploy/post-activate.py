#!/usr/bin/env python3
"""
Post-activation setup for imaanihomesthemev2.
Run AFTER the theme is activated on the target WordPress site.

What it does (all via REST, idempotent):
  1. Verifies the theme's portfolio CPT is live (REST route exists)
  2. Recreates the 3 legacy portfolio categories + 6 legacy portfolio entries
     so every indexed /portfolio/* URL keeps resolving
  3. Verifies the preserved URLs return 200

Usage:
  python3 deploy/post-activate.py https://imaanihomes.com/test 'user:app password'
"""
import json, subprocess, sys

if len(sys.argv) != 3:
    sys.exit(__doc__)
BASE, AUTH = sys.argv[1].rstrip('/'), sys.argv[2]
API = f"{BASE}/wp-json"

ENTRIES = [
    ("data-analysis", "Data Analysis", "analytics"),
    ("rd-service-plan", "RD Service Plan", "business"),
    ("startup-investment", "Startup Investment", "business"),
    ("global-data-analysis", "Global Data Analysis", "analytics"),
    ("research-and-development", "Research And Development", "business"),
    ("immediate-settlement", "Immediate Settlement", "marketing"),
]
CATS = ["analytics", "business", "marketing"]

def curl(method, path, payload=None):
    cmd = ["curl", "-s", "-u", AUTH, "-X", method, f"{API}{path}"]
    if payload is not None:
        cmd += ["-H", "Content-Type: application/json", "-d", json.dumps(payload)]
    out = subprocess.run(cmd, capture_output=True, text=True).stdout
    try:
        return json.loads(out)
    except json.JSONDecodeError:
        return {"_raw": out[:300]}

# 1. CPT live?
probe = curl("GET", "/wp/v2/liquid-portfolio?per_page=1")
if isinstance(probe, dict) and probe.get("code") == "rest_no_route":
    sys.exit("ABORT: portfolio CPT route missing — is the theme activated?")
print("CPT route live ✓")

# 2. Categories
catmap = {}
for slug in CATS:
    existing = curl("GET", f"/wp/v2/liquid-portfolio-category?slug={slug}")
    if isinstance(existing, list) and existing:
        catmap[slug] = existing[0]["id"]
    else:
        c = curl("POST", "/wp/v2/liquid-portfolio-category", {"name": slug.title(), "slug": slug})
        catmap[slug] = c.get("id")
    print(f"category {slug} -> {catmap[slug]}")

# 3. Entries
for slug, title, cat in ENTRIES:
    existing = curl("GET", f"/wp/v2/liquid-portfolio?slug={slug}")
    if isinstance(existing, list) and existing:
        print(f"entry {slug} exists ({existing[0]['id']})")
        continue
    e = curl("POST", "/wp/v2/liquid-portfolio", {
        "title": title, "slug": slug, "status": "publish",
        "liquid-portfolio-category": [catmap[cat]] if catmap.get(cat) else [],
        "content": f"<p>{title} — portfolio entry preserved during the 2026 theme migration. Replace with real Imaani content or noindex via Yoast.</p>",
    })
    print(f"entry {slug} -> {e.get('id', e)}")

# 4. Verify URLs
print("\nURL verification:")
ok = True
for u in ["/portfolios/"] + [f"/portfolio/{s}/" for s, _, _ in ENTRIES] + [f"/portfolio-category/{c}/" for c in CATS]:
    code = subprocess.run(["curl", "-s", "-o", "/dev/null", "-w", "%{http_code}", f"{BASE}{u}"],
                          capture_output=True, text=True).stdout
    print(code, u)
    if code != "200":
        ok = False
print("\nALL PRESERVED URLS OK" if ok else "\nSOME URLS FAILED — flush permalinks (Settings → Permalinks → Save) and re-run")
