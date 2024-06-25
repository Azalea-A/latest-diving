<?php get_header(); ?>

<!-- 下層ページのメインビュー -->
<div class="p-sub-mv js-mv-height">
  <div class="p-sub-mv__title">
    <div class="c-section-header--white">
      <h1 class="c-section-header__engtitle">news</h1>
      <p class="c-section-header__jatitle">お知らせ</p>
    </div>
  </div>
</div>

<!-- パンくず -->
<?php get_template_part('parts/breadcrumb') ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <section class="l-single-body p-single-body">
      <div class="p-single-body__inner l-inner">

        <div class="p-single-body__title">
          <h1><?php the_title(); ?></h1>
        </div>
        <div class="p-single-body__meta">
          <div class="p-news-content">
            <div class="p-news-content__meta">
              <time datetime="<?php the_time('c'); ?>" class="p-news-content__date"><?php the_time('Y.m.d'); ?></time>
              <?php $cat = get_the_category();
              $cat = $cat[0]->cat_name; ?>
              <p class="p-news-content__category"><?php echo $cat ?></p>
            </div>
          </div>
        </div>
        <div class="p-single-body__image">
          <?php if (get_the_post_thumbnail()) : ?>
            <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
          <?php else : ?>
            <img src="<?php echo get_theme_file_uri(); ?>/images/common/noimage.jpg" alt="no image">
          <?php endif; ?>
        </div>
        <div class="p-single-body__content">
          <?php the_content(); ?>
        </div>

        <div class="c-page-link">
          <div class="c-page-link__inner">
            <div class="c-page-link__flex">
              <?php
              $prev_post = get_previous_post();
              if (!empty($prev_post)) : ?>
                <div class="c-page-link__prev">
                  <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>">前の記事</a>
                </div>
              <?php endif; ?>

              <?php
              $next_post = get_next_post();
              if (!empty($next_post)) : ?>
                <div class="c-page-link__next">
                  <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>">次の記事</a>
                </div>
              <?php endif; ?>
            </div>


            <div class="c-page-link__archive">
              <a href="">NEWS一覧</a>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php endwhile;
endif; ?>

<?php get_footer(); ?>