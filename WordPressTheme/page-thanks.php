<?php get_header(); ?>

<main class="main sub-top-fish sub-top-fish">
  <!-- fv -->
  <div class="sub-fv sub-fv--contact">
    <div class="sub-fv__inner">
      <!-- サブページのメインビュー -->
      <h1 class="sub-fv__title">Contact</h1>
    </div>
  </div>
  <!-- パンくずリスト -->
  <?php get_template_part('parts/breadcrumb'); ?>
  <!-- 全体のコンテナー -->
  <div class="page-thanks thanks">
    <div class="thanks-inner inner">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <?php the_content(); ?>
      <?php endwhile;
      endif; ?>
    </div>
  </div>

  <?php get_footer(); ?>