<?php get_header(); ?>

<!-- 下層ページのメインビュー -->
<div class="p-sub-mv js-mv-height">
  <div class="p-sub-mv__title">
    <div class="c-section-header--white">
      <h1 class="c-section-header__engtitle">works</h1>
      <p class="c-section-header__jatitle">制作実績</p>
    </div>
  </div>
</div>

<!-- パンくず -->
<?php get_template_part('parts/breadcrumb') ?>


<section class="l-archive-works p-archive-works">
  <div class="p-archive-works__inner l-inner">
    <div class="p-archive-works__items">
      <!-- ループ -->
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <div class="p-archive-works__item">
            <div class="p-archive-works__img">
              <?php if (has_post_thumbnail()) : ?>
                <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" alt="<?php echo esc_attr(get_the_title()) . 'のアイキャッチ画像'; ?>">
              <?php endif; ?>
            </div>
            <div class="p-archive-works__title">
              <h2 class="p-archive-works__name"><?php the_title(); ?></h2>
            </div>
          </div>
        <?php endwhile; // ここでwhileループを閉じる 
        ?>
      <?php endif; // ここでif文を閉じる 
      ?>
      <!-- ループ終了 -->
    </div><!--p-archive-works__items-->
  </div><!-- inner -->
</section>

<?php get_footer(); ?>