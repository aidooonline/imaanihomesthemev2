<?php
defined('ABSPATH') || exit;
get_header();
?>
<section class="page-head">
  <div class="container">
    <p class="eyebrow">The Imaani Journal</p>
    <h1 class="page-head__title">Insight on Accra real estate</h1>
    <p class="page-head__lead">Neighbourhood guides, market analysis, and investment thinking — from the team building Accra's most coveted addresses.</p>
  </div>
</section>
<section class="section">
  <div class="container blog-layout">
    <div class="blog-list">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article <?php post_class('post-card'); ?>>
          <?php if (has_post_thumbnail()) : ?>
            <a class="post-card__media" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('imaani-card', ['loading' => 'lazy']); ?></a>
          <?php endif; ?>
          <div class="post-card__body">
            <p class="post-card__meta"><?php echo esc_html(get_the_date()); ?><?php $cat = get_the_category(); if ($cat) echo ' · ' . esc_html($cat[0]->name); ?></p>
            <h2 class="post-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p class="post-card__excerpt"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 28)); ?></p>
            <a class="post-card__more" href="<?php the_permalink(); ?>">Read article →</a>
          </div>
        </article>
      <?php endwhile; ?>
      <nav class="pagination"><?php the_posts_pagination(['mid_size' => 1]); ?></nav>
      <?php else : ?>
        <p>No articles yet — check back soon.</p>
      <?php endif; ?>
    </div>
    <?php imaani_blog_panel(); ?>
  </div>
</section>
<?php get_footer(); ?>
