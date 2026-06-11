<?php
defined('ABSPATH') || exit;
get_header();
?>
<section class="page-head">
  <div class="container">
    <p class="eyebrow">Portfolio</p>
    <h1 class="page-head__title">Portfolio</h1>
  </div>
</section>
<section class="section">
  <div class="container project-grid">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <a class="project-card" href="<?php the_permalink(); ?>">
        <div class="project-card__body">
          <h3 class="project-card__name"><?php the_title(); ?></h3>
          <p class="project-card__tag"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 16)); ?></p>
        </div>
      </a>
    <?php endwhile; endif; ?>
  </div>
</section>
<?php get_footer(); ?>
