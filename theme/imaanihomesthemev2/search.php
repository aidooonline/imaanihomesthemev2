<?php
defined('ABSPATH') || exit;
get_header();
?>
<section class="page-head">
  <div class="container">
    <p class="eyebrow">Archive</p>
    <h1 class="page-head__title"><?php echo wp_kses_post(get_the_archive_title()); ?></h1>
  </div>
</section>
<section class="section">
  <div class="container blog-layout">
    <div class="blog-list">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article <?php post_class('post-card'); ?>>
          <div class="post-card__body">
            <p class="post-card__meta"><?php echo esc_html(get_the_date()); ?></p>
            <h2 class="post-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p class="post-card__excerpt"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 24)); ?></p>
          </div>
        </article>
      <?php endwhile; ?>
      <nav class="pagination"><?php the_posts_pagination(['mid_size' => 1]); ?></nav>
      <?php else : ?><p>Nothing here yet.</p><?php endif; ?>
    </div>
    <?php imaani_blog_panel(); ?>
  </div>
</section>
<?php get_footer(); ?>
