<?php
defined('ABSPATH') || exit;
get_header();
?>
<section class="page-head page-head--center section--tall">
  <div class="container container--narrow">
    <p class="eyebrow">404</p>
    <h1 class="page-head__title">That address doesn't exist</h1>
    <p class="page-head__lead">The page you're looking for has moved or never was. These do exist:</p>
    <div class="hero__actions hero__actions--center">
      <a class="btn btn--primary" href="<?php echo esc_url(home_url('/projects/')); ?>">Our Projects</a>
      <a class="btn btn--outline" href="<?php echo esc_url(home_url('/blog/')); ?>">The Blog</a>
    </div>
  </div>
</section>
<?php get_footer(); ?>
