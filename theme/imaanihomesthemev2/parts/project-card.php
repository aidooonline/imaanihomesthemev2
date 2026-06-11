<?php
defined('ABSPATH') || exit;
$p = $args['project'] ?? null;
if (!$p) return;
$href = $p['external'] ? $p['url'] : home_url($p['url']);
$page = get_page_by_path(trim((string) parse_url($p['url'], PHP_URL_PATH), '/'));
?>
<a class="project-card project-card--<?php echo esc_attr($p['status']); ?>" href="<?php echo esc_url($href); ?>" <?php echo $p['external'] ? 'target="_blank" rel="noopener"' : ''; ?>>
  <div class="project-card__media">
    <?php if ($page && has_post_thumbnail($page)) {
        echo get_the_post_thumbnail($page, 'imaani-card', ['loading' => 'lazy']);
    } ?>
    <?php echo imaani_badge($p['status'], $p['badge']); // phpcs:ignore ?>
  </div>
  <div class="project-card__body">
    <h3 class="project-card__name"><?php echo esc_html($p['name']); ?></h3>
    <p class="project-card__location"><?php echo esc_html($p['location']); ?></p>
    <p class="project-card__tag"><?php echo esc_html($p['tag']); ?></p>
    <span class="project-card__link"><?php echo $p['external'] ? 'Visit Regalia' : ($p['status'] === 'sold-out' ? 'See the story' : 'Explore'); ?> →</span>
  </div>
</a>
