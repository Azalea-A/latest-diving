<?php get_header(); ?>
<main class="main sub-top-fish">
  <!-- fv -->
  <div class="sub-fv sub-fv--voice">
    <div class="sub-fv__inner">
      <!-- サブページのメインビュー -->
      <h1 class="sub-fv__title">Voice</h1>
    </div>
  </div>
  <!-- パンくずリスト -->
  <?php get_template_part('parts/breadcrumb'); ?>
  <!-- 全体のコンテナー -->
  <section class="page-voice sub-voice">
    <div class="sub-voice__inner inner">
      <!-- タブのボタン -->
      <div class="sub-voice__category-tab category-tab">
        <ul class="category-tab__lists">
          <li class="category-tab__list <?php if (!is_tax('voice_category')) echo 'current'; ?>">
            <a href="<?php echo esc_url(get_post_type_archive_link('voice')); ?>">ALL</a>
          </li>
          <?php
            $terms = get_terms(array(
              'taxonomy' => 'voice_category',
              'hide_empty' => false,
            ));
            // タームが存在するか確認
            if (!empty($terms) && !is_wp_error($terms)) :
              foreach ($terms as $term) : ?>
                <li class="category-tab__list <?php if (is_tax('voice_category') && get_queried_object()->slug == $term->slug) echo 'current'; ?>">
                  <a href="<?php echo esc_url(get_term_link($term)); ?>"><?php echo esc_html($term->name); ?></a>
                </li>
              <?php endforeach;
            endif; ?>
        </ul>
      </div>
      <!-- タブのコンテンツ -->
      <div class="category-tab__each-tab-container is-active">
        <ul class="category-tab__items category-tab__items--voice voice-cards">
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
              <li class="voice-cards__item voice-card">
                <div class="voice-card__inner">
                  <div class="voice-card__top">
                    <div class="voice-card__title-wrapper">
                      <div class="voice-card__title-flex-box">
                        <p class="voice-card__personal-info"><?php the_field('age') ?>代(<?php the_field('gender') ?>)</p>
                        <span class="voice-card__label category-label category-label--voice">
                          <?php
                          $terms = get_the_terms(get_the_ID(), 'voice_category');
                          if ($terms && !is_wp_error($terms)) {
                            $term = array_shift($terms);
                            echo esc_html($term->name);
                          }
                          ?>
                        </span>
                      </div>
                      <h3 class="voice-card__title"><?php the_title(); ?></h3>
                    </div>
                    <div class="voice-card__img">
                      <figure>
                        <?php if (get_the_post_thumbnail()) : ?>
                          <img src="<?php the_post_thumbnail_url('full') ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
                        <?php else : ?>
                          <img src="<?php echo get_theme_file_uri('/assets/images/common/no_image.jpeg'); ?>" alt="no image">
                        <?php endif; ?>
                      </figure>
                    </div>
                  </div>
                  <div class="voice-card__bottom">
                    <p class="voice-card__text"><?php the_field('voice-content') ?></p>
                  </div>
                </div>
              </li>
          <?php endwhile;
            else :
              echo '<li>投稿が見つかりませんでした。</li>';
            endif;
          ?>
        </ul>
      </div>
    </div>
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
          }
          ?>
          <?php if (get_next_posts_link()) : ?>
            <a href="<?php echo esc_url(get_next_posts_page_link()); ?>" class="nextpostslink">
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <!-- WP-PageNaviで出力される部分 ここまで -->
  </section>

  <?php get_footer(); ?>