<?php
defined('ABSPATH') || exit;
get_header();
?>
<section class="page-head">
  <div class="container">
    <p class="eyebrow"><?php echo esc_html(imaani_field('imaani_projects_eyebrow', 'Our Developments')); ?></p>
    <h1 class="page-head__title"><?php echo esc_html(imaani_field('imaani_projects_title', 'Four Addresses, One Standard')); ?></h1>
    <p class="page-head__lead"><?php echo esc_html(imaani_field('imaani_projects_lead', 'Two sold out and delivered on time. Two now selling. Every address built to the same finish specification, in neighbourhoods that hold their value.')); ?></p>
  </div>
</section>
<section class="section">
  <div class="container--wide container">
    <div class="project-grid project-grid--index">
      <?php foreach (imaani_projects() as $slug => $p) {
          get_template_part('parts/project-card', null, ['project' => $p, 'key' => $slug]);
      } ?>
    </div>
  </div>
</section>
<?php get_template_part('parts/cta-final'); get_footer(); ?>
