<?php get_header(); ?>
<main class="main sub-top-fish">
  <!-- fv -->
  <div class="sub-fv sub-fv--campaign">
    <div class="sub-fv__inner">
      <!-- サブページのメインビュー -->
      <h1 class="sub-fv__title">Campaign</h1>
    </div>
  </div>
  <!-- パンくずリスト -->
  <div class="breadcrumb">
    <div class="breadcrumb__inner inner">
      <div class="breadcrumb__body">
        <?php if (function_exists('bcn_display')) : ?>
          <?php bcn_display(); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <!-- 全体のコンテナー -->
  <section class="page-campaign sub-campaign">
    <div class="sub-campaign__inner inner">
      <!-- タブのボタン -->
      <div class="sub-campaign__category-tab category-tab">
      <ul class="category-tab__lists">
        <li class="category-tab__list <?php echo !is_tax('campaign_category') ? 'current' : ''; ?>">
          <a href="<?php echo esc_url(get_post_type_archive_link('campaign')); ?>">ALL</a>
        </li>
          <?php
            $terms = get_terms(array(
              'taxonomy' => 'campaign_category',
              'hide_empty' => false,
            ));
            // タームが存在するか確認
            if (!empty($terms) && !is_wp_error($terms)) :
              foreach ($terms as $term) : ?>
                <li class="category-tab__list <?php if (is_tax('campaign_category') && get_queried_object()->slug == $term->slug) echo 'current'; ?>">
                  <a href="<?php echo esc_url(get_term_link($term)); ?>"><?php echo esc_html($term->name); ?></a>
                </li>
              <?php endforeach;
            endif; ?>
        </ul>
      </div>
      <!-- タブの中身 -->
      <div class="category-tab__all-tabs-container">
        <div class="category-tab__each-tab-container js-category-tab-container is-active">
          <ul class="category-tab__items">
              <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                  <li class="category-tab__item sub-campaign-card">
                      <div class="sub-campaign-card__img">
                          <figure>
                              <?php if (get_the_post_thumbnail()) : ?>
                                  <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
                              <?php else : ?>
                                  <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/no_image.jpeg')); ?>" alt="no image">
                              <?php endif; ?>
                          </figure>
                      </div>
                      <div class="sub-campaign-card__body">
                          <div class="sub-campaign-card__title-wrapper">
                              <span class="sub-campaign-card__label category-label">
                                  <?php
                                  $terms = get_the_terms(get_the_ID(), 'campaign_category');
                                  if ($terms && !is_wp_error($terms)) :
                                      $term = array_shift($terms);
                                      echo esc_html($term->name);
                                  endif;
                                  ?>
                              </span>
                              <h3 class="sub-campaign-card__title"><?php the_title(); ?></h3>
                          </div>
                          <div class="sub-campaign-card__content-wrapper">
                              <!-- 値段グループ変更ずみここから -->
                              <div class="sub-campaign-card__price-wrapper">
                                <?php 
                                // 新しい構造：グループフィールドから取得
                                $campaign_price = get_field('campaign_price');
                                if ($campaign_price) {
                                    $price_before = isset($campaign_price['price_before']) ? $campaign_price['price_before'] : null;
                                    $special_price = isset($campaign_price['special_price']) ? $campaign_price['special_price'] : null;
                                } else {
                                    // 古い構造：直接フィールドから取得
                                    $price_before = get_field('price_before');
                                    $special_price = get_field('special_price');
                                }

                                if ($price_before || $special_price) : ?>
                                  <p class="sub-campaign-card__price-text">全部コミコミ(お一人様)</p>
                                <?php endif; ?>
                                <p class="sub-campaign-card__price">
                                  <span class="sub-campaign-card__price-center">
                                    <?php if ($price_before) : ?>
                                      <span class="sub-campaign-card__price-before">¥<?php echo number_format(floatval(preg_replace('/[^0-9.]/', '', $price_before))); ?></span>
                                    <?php endif; ?>
                                    <?php if ($special_price) : ?>
                                      ¥<?php echo number_format(floatval(preg_replace('/[^0-9.]/', '', $special_price))); ?>
                                    <?php endif; ?>
                                  </span>
                                </p>
                              </div>
                              <!-- 値段グループ変更ずみここまで -->
                              <div class="sub-campaign-card__desktop-info u-desktop">
                                  <p class="sub-campaign-card__text"><?php the_content(); ?></p>
                              </div>
                              <div class="sub-campaign-card__bottom u-desktop">
                              <div class="sub-campaign-card__period-wrap">
                                <!-- 期間グループ化変更ここから -->
                                <?php
                                  // 新しい構造：グループフィールドから取得
                                  $campaign_schedule = get_field('campaign_schedule');
                                  if ($campaign_schedule) {
                                      $start_date = isset($campaign_schedule['start_date']) ? $campaign_schedule['start_date'] : null;
                                      $end_date = isset($campaign_schedule['end_date']) ? $campaign_schedule['end_date'] : null;
                                  } else {
                                      // 古い構造：直接フィールドから取得
                                      $start_date = get_field('start_date');
                                      $end_date = get_field('end_date');
                                  }

                                  if ($start_date || $end_date):
                                  ?>
                                      <div class="sub-campaign-card__date-range">
                                          <?php if ($start_date): ?>
                                              <span class="sub-campaign-card__start-date"><?php echo esc_html($start_date); ?></span>
                                          <?php endif; ?>
                                          <span class="sub-campaign-card__separator">-</span>

                                          <?php if ($end_date): ?>
                                              <span class="sub-campaign-card__end-date"><?php echo esc_html($end_date); ?></span>
                                          <?php endif; ?>
                                      </div>
                                  <?php endif; ?>
                                  <!-- 期間グループに変更ここまで -->
                                  <p class="sub-campaign-card__cta-text">ご予約・お問い合わせはコチラ</p>
                              </div><!-- sub-campaign-card__period-wrap-->

                              <div class="sub-campaign-card__button-wrapper">
                                  <?php
                                  // スラッグ名が 'contact' のページのURLを取得
                                  $contact_page_url = get_permalink(get_page_by_path('contact'));
                                  ?>
                                  <a href="<?php echo esc_url($contact_page_url); ?>" class="button">
                                      <span class="button__span">Contact us</span>
                                  </a>
                              </div>
                              </div><!-- sub-campaign-card__bottom -->
                          </div><!-- sub-campaign-card__content-wrapper-->
                      </div>
                  </li>
              <?php endwhile;
              else : ?>
                  <li>投稿が見つかりませんでした。</li>
              <?php endif; ?>
          </ul>
        </div>
      </div><!-- category-tab__all-tabs-container -->
    </div><!-- sub-campaign__inner -->
    <!-- ページネーション -->
    <div class="sub-campaign__pagenavi pagenavi">
      <div class="pagenavi__inner">
        <!-- WP-PageNaviで出力される部分 ここから -->
        <div class='wp-pagenavi' role='navigation'>
          <?php if (get_previous_posts_link()) : ?>
            <a href="<?php echo esc_url(get_previous_posts_page_link()); ?>" class="previouspostslink">
            </a>
          <?php endif; ?>
          <?php if (function_exists('wp_pagenavi')) :
            wp_pagenavi();
          endif; ?>
          <?php if (get_next_posts_link()) : ?>
            <a href="<?php echo esc_url(get_next_posts_page_link()); ?>" class="nextpostslink">
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <!-- WP-PageNaviで出力される部分 ここまで -->
    </div>
  </section>

  <?php get_footer(); ?>