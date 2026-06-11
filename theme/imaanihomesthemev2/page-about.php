<?php
defined('ABSPATH') || exit;
get_header();
the_post();
$about_content = get_the_content();
$about_legacy  = 'builder' === get_post_meta(get_the_ID(), '_elementor_edit_mode', true)
    || str_contains($about_content, 'elementor-');
?>
<section class="page-head">
  <div class="container">
    <p class="eyebrow">About Imaani Homes</p>
    <h1 class="page-head__title">Precision. Intention. Value.</h1>
    <p class="page-head__lead"><?php echo esc_html(get_theme_mod('imaani_tagline', 'Where Elegance Meets Exclusivity')); ?> — four developments in Accra's most established neighbourhoods, two already sold out and delivered on time.</p>
  </div>
</section>

<?php
// One clean image: the page's featured image, else the first project photo available.
$about_img = has_post_thumbnail() ? get_the_post_thumbnail(null, 'imaani-hero', ['loading' => 'eager']) : '';
if (!$about_img) {
    foreach (imaani_projects() as $k => $proj) {
        $about_img = imaani_project_image($k, $proj, 'imaani-hero');
        if ($about_img) break;
    }
}
if ($about_img) : ?>
<section class="about-visual">
  <div class="container">
    <figure class="about-visual__frame"><?php echo $about_img; // phpcs:ignore ?></figure>
  </div>
</section>
<?php endif; ?>
<?php if (trim($about_content) && !$about_legacy) : ?>
<section class="section">
  <div class="container container--narrow entry-content flow"><?php the_content(); ?></div>
</section>
<?php else : ?>
<section class="section">
  <div class="container container--narrow flow">
    <p class="lead">Imaani Homes builds luxury residential addresses in Accra — JAK Royale, The Ivy Townhomes, Alexis Residence in Tesano, and Regalia at Airport Residential Area.</p>
    <p>Our debut project, JAK Royale, sold out. The Ivy Townhomes followed, and sold out too. Both were delivered on time, to the standard buyers were promised at reservation. That record is why Alexis Residence is over 90% sold, and why Regalia — our most ambitious project to date — opened for off-plan reservations with confidence.</p>
    <p>We build with one finish specification per building. No tiered quality, no compromised corners. From studio to penthouse, every resident shares the same standard, the same amenities, the same address.</p>
  </div>
</section>
<?php endif; ?>
<section class="section founder">
  <div class="container founder__inner">
    <span class="founder__rule" aria-hidden="true"></span>
    <p class="founder__note">&ldquo;<?php echo esc_html(get_theme_mod('imaani_founder_note', 'Imaani Homes was founded on a simple promise: build addresses worth keeping, and deliver them on time. Two sold-out developments later, the promise stands.')); ?>&rdquo;</p>
    <?php $founder = get_theme_mod('imaani_founder_name', ''); ?>
    <p class="founder__name">— <?php echo $founder ? esc_html($founder) . ', Founder' : 'The Founder, Imaani Homes'; ?></p>
  </div>
</section>
<?php get_template_part('parts/cta-final'); get_footer(); ?>
