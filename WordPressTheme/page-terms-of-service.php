<?php get_header(); ?>

<main class="main sub-top-fish">
  <!-- fv -->
  <div class="sub-fv sub-fv--terms-of-service">
    <div class="sub-fv__inner">
      <!-- サブページのメインビュー -->
      <h1 class="sub-fv__title">Terms of Service</h1>
    </div>
  </div>
  <!-- パンくずリスト -->
  <?php get_template_part('parts/breadcrumb'); ?>
  <!-- 全体のコンテナー -->
  <section class="page-terms-of-service terms-of-service">
    <div class="terms-of-service__sub-page-inner inner inner--terms">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <?php the_content(); ?>
      <?php endwhile;
      else :
        echo '<p>投稿が見つかりませんでした。</p>';
      endif; ?>
    </div>
  </section>


  <?php get_footer(); ?>