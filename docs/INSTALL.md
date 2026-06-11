# INSTALL — imaanihomesthemev2

Two supported paths. Path A is fastest; Path B gives git-driven deploys going forward.

## Path A — ZIP upload (5 minutes)

1. wp-admin → Appearance → Themes → Add New Theme → Upload Theme
2. Upload `deploy/imaanihomesthemev2.zip` → Install → **Activate**
3. Settings → Permalinks → **Save Changes** (flushes rewrites so `/portfolio/*` resolves)
4. Run the post-activation script from any machine with Python 3:
   ```
   python3 deploy/post-activate.py https://imaanihomes.com/test 'imaanadmin:APP PASSWORD'
   ```
   It recreates the 6 legacy portfolio entries + 3 categories and verifies every preserved URL returns 200. Idempotent — safe to re-run.
5. Spot-check: home H1, /investors/, /faq/, contact form submit → /thank-you/.

For **production** later: same steps against `https://imaanihomes.com` (the post-activate script takes the base URL as its first argument). Menu items for Investors/FAQ already exist on staging; on prod they'll need adding once (Appearance → Menus, or ask the agent to repeat the REST calls).

## Path B — cPanel Git Version Control

> Lessons from the TechPlug deployment apply: cPanel Git clones as the cPanel user; permissions issues come from cloning into a directory the webserver can't traverse, and stale caches mask updates.

1. cPanel → Git Version Control → Create
   - Clone URL: `https://github.com/aidooonline/imaanihomesthemev2.git`
   - Repository path: a **non-webroot** path, e.g. `/home/imaaniho/repos/imaanihomesthemev2`
2. Add `.cpanel.yml` deployment (already in repo) or symlink/copy:
   ```
   cp -a /home/imaaniho/repos/imaanihomesthemev2/theme/imaanihomesthemev2 \
         /home/imaaniho/public_html/test/wp-content/themes/
   ```
3. Activate in wp-admin, then steps 3–5 from Path A.
4. Future updates: push to `main` → cPanel Git "Update from Remote" → "Deploy HEAD Commit".

## After activation — old theme cleanup (when satisfied)

- Keep ArcHub/ArcHub Child installed but inactive until prod cutover is proven, then delete.
- Plugins the new theme makes redundant (candidates to deactivate after testing): Elementor + Elementor Pro + ArcHub Core/Addons/Portfolio (theme no longer uses them — **but** old page content was Elementor-built; the new theme renders its own templates for every page in scope, so Elementor is only needed if you re-edit legacy content), Liquid GDPR Box (theme ships its own light cookie banner).
- Performance plugins: reactivate per your call post-build (currently deactivated on staging).

## Disk note

Prod cPanel is at 87% disk. The theme adds <1 MB, but before prod cutover consider clearing old WPvivid backups.
