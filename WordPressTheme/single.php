<?php get_header(); ?>
<main class="main sub-top-fish">
  <!-- fv -->
  <div class="sub-fv sub-fv--blog">
    <div class="sub-fv__inner">
      <!-- サブページのメインビュー -->
      <h1 class="sub-fv__title">Blog</h1>
    </div>
  </div>
  <!-- パンくずリスト -->
  <?php get_template_part('parts/breadcrumb'); ?>
  <!-- 全体のコンテナー -->
  <div class="page-blog sub-blog">
    <div class="sub-blog__inner inner">
      <div class="sub-blog__flex">
        <div class="sub-blog__main">
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
              <div class="sub-blog__body single-body">
                <div class="single-body__meta"><time datetime="<?php the_time('c'); ?>"><?php the_time('Y.m/d'); ?></time></div>
                <div class="single-body__title">
                  <h1><?php the_title(); ?></h1>
                </div>
                <div class="single-body__eyecatch">
                  <?php if (get_the_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url('full') ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
                  <?php else : ?>
                    <img src="<?php echo get_theme_file_uri('/assets/images/common/no_image.jpeg'); ?>" alt="no image">
                  <?php endif; ?>
                </div>
                <div class="single-body__content">
                  <?php the_content(); ?>
                </div>
              </div>
              <!-- ページネーション -->
              <div class="sub-blog__pagenavi--single pagenavi">
                <div class="pagenavi__inner">
                  <!-- WP-PageNaviで出力される部分 ここから -->
                  <div class='wp-pagenavi' role='navigation'>
                    <?php
                    $prev_post = get_previous_post();
                    if (!empty($prev_post)) {
                      $prev_post_url = get_permalink($prev_post->ID);
                      echo '<a class="previouspostslink" href="' . esc_url($prev_post_url) . '"></a>';
                    }
                    ?>
                    <?php
                    $next_post = get_next_post();
                    if (!empty($next_post)) {
                      $next_post_url = get_permalink($next_post->ID);
                      echo '<a class="nextpostslink" href="' . esc_url($next_post_url) . '"></a>';
                    }
                    ?>
                  </div>
                </div>
              </div>
          <?php endwhile;
          endif; ?>
        </div><!-- main -->
        <aside class="sub-blog__aside aside">
          <!-- サイドバー sidebar.phpを呼び出す -->
          <?php get_sidebar(); ?>
        </aside>
      </div>
    </div>
    <?php get_footer(); ?>