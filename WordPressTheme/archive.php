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
          <ul class="sub-blog__blog-cards blog-cards blog-cards--sub-blog">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <li class="blog-cards__item blog-card">
                  <a href="<?php the_permalink(); ?>" class="blog-card__link">
                    <div class="blog-card__inner">
                      <div class="blog-card__img blog-card__img--scale-bigger">
                        <figure>
                          <?php if (get_the_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url('full') ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
                          <?php else : ?>
                            <img src="<?php echo get_theme_file_uri('/assets/images/common/no_image.jpeg'); ?>" alt="no image">
                          <?php endif; ?>
                        </figure>
                      </div>
                      <div class="blog-card__content blog-card__content--sub-page">
                        <div class="blog-card__head">
                          <time class="blog-card__date" datetime="<?php the_time('c'); ?>"><?php the_time('Y.m/d'); ?></time>
                          <h2 class="blog-card__title"><?php the_title(); ?></h2>
                        </div>
                        <p class="blog-card__text">
                          <?php
                          // 投稿の抜粋を表示する
                          if (has_excerpt()) :
                              the_excerpt();
                          else :
                            // 投稿の冒頭部分をカスタムで表示する場合
                            $content = get_the_content();
                            $content = wp_trim_words($content, 98, '...'); // 98語まで表示
                            echo $content;
                          endif;
                          ?>
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
            <?php endwhile;
            else :
              echo '<li>投稿が見つかりませんでした。</li>';
            endif; ?>
          </ul>

          <!-- ページネーション -->
          <div class="sub-voice__pagenavi pagenavi">
            <div class="pagenavi__inner">
              <!-- WP-PageNaviで出力される部分 ここから -->
              <div class='wp-pagenavi' role='navigation'>
                <?php if (get_previous_posts_link()) : ?>
                  <a href="<?php echo esc_url(get_previous_posts_page_link()); ?>" class="previouspostslink">
                  </a>
                <?php endif; ?>

                <?php if (function_exists('wp_pagenavi')) {
                  wp_pagenavi();
                } ?>

                <?php if (get_next_posts_link()) : ?>
                  <a href="<?php echo esc_url(get_next_posts_page_link()); ?>" class="nextpostslink">
                  </a>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <!-- WP-PageNaviで出力される部分 ここまで -->
        </div><!-- sub-blog__main -->
        <aside class="sub-blog__aside aside">
          <!-- サイドバー sidebar.phpを呼び出す -->
          <?php get_sidebar(); ?>
        </aside>
        <!-- サイドバーここまで -->
      </div><!-- sub-blog__flex -->
    </div><!-- sub-blog__inner -->
  </div>
  <?php get_footer(); ?>