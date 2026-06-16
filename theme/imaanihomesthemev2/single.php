<?php
defined('ABSPATH') || exit;
get_header();
while (have_posts()) : the_post();
?>
<article <?php post_class(); ?>>
  <?php if (has_post_thumbnail()) : ?>
    <section class="post-hero-header">
      <div class="post-hero-header__media">
        <?php the_post_thumbnail('imaani-hero', ['class' => 'post-hero-header__img', 'loading' => 'eager', 'fetchpriority' => 'high', 'sizes' => '100vw']); ?>
      </div>
      <div class="post-hero-header__inner">
        <p class="post-hero-header__meta"><?php echo esc_html(get_the_date()); ?><?php $cat = get_the_category(); if ($cat) echo ' &middot; ' . esc_html($cat[0]->name); ?></p>
        <h1 class="post-hero-header__title"><?php the_title(); ?></h1>
      </div>
    </section>
  <?php else : ?>
    <section class="page-head page-head--post">
      <div class="container container--narrow">
        <p class="post-card__meta"><?php echo esc_html(get_the_date()); ?><?php $cat = get_the_category(); if ($cat) echo ' &middot; ' . esc_html($cat[0]->name); ?></p>
        <h1 class="page-head__title page-head__title--post"><?php the_title(); ?></h1>
      </div>
    </section>
  <?php endif; ?>
  <section class="section section--post">
    <div class="container blog-layout">
      <div class="entry-content flow"><?php the_content(); ?></div>
      <?php imaani_blog_panel(); ?>
    </div>
  </section>
  <section class="section section--tint">
    <div class="container">
      <p class="eyebrow">Keep reading</p>
      <h2 class="section__title">Related articles</h2>
      <div class="related-grid">
        <?php
        $cats = wp_get_post_categories(get_the_ID());
        $rel = new WP_Query(['posts_per_page' => 3, 'post__not_in' => [get_the_ID()], 'category__in' => $cats, 'ignore_sticky_posts' => true]);
        if ($rel->have_posts()) : while ($rel->have_posts()) : $rel->the_post(); ?>
          <a class="related-card" href="<?php the_permalink(); ?>">
            <p class="post-card__meta"><?php echo esc_html(get_the_date()); ?></p>
            <h3><?php the_title(); ?></h3>
          </a>
        <?php endwhile; wp_reset_postdata(); endif; ?>
      </div>
    </div>
  </section>
</article>
<?php endwhile; get_footer(); ?>
