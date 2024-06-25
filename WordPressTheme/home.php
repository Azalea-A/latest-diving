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

<div class="l-archive-home p-archive-home">
  <div class="p-archive-home__inner l-inner">

    <!-- ループ処理開始 -->


    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <div class="p-archive-home__item p-news-content">
          <div class="p-news-content__meta">
            <time datetime="<?php the_time('c'); ?>" class="p-news-content__date"><?php the_time('Y.m.d'); ?></time>
            <?php $cat = get_the_category();
            $cat = $cat[0]->cat_name; ?>
            <p class="p-news-content__category"><?php echo $cat ?></p>
          </div>
          <div class="p-news-content__link">
            <a href="<?php the_permalink(); ?>" class="p-news-content__text"><?php the_title(); ?></a>
          </div>
        </div>
    <?php endwhile;
    endif; ?>
    <!-- ループ終了 -->

    <div class="l-paginavi">
      <?php wp_pagenavi(); ?>
    </div>

    <?php get_footer(); ?>