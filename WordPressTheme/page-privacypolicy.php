<?php get_header();?>

<main class="main sub-top-fish">
    <!-- fv -->
    <div class="sub-fv sub-fv--privacy-policy">
      <div class="sub-fv__inner">
        <!-- サブページのメインビュー -->
        <h1 class="sub-fv__title"><?php the_title(); ?></h1>
      </div>
    </div>
    <!-- パンくずリスト -->
    <?php get_template_part('parts/breadcrumb'); ?>
    <!-- 全体のコンテナー -->
    <section class="page-privacy-policy privacy-policy">
      <div class="privacy-policy__sub-page-inner inner inner--terms">

        <div class="privacy-policy__body">
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
              <?php the_content(); ?>
        </div>
      </div>
    </section>
    <?php endwhile;
        else :
          echo '<p>投稿が見つかりませんでした。</p>';
    endif; ?>

    <?php get_footer(); ?>