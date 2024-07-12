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
        <?php if (function_exists('bcn_display')) {
          bcn_display();
        } ?></div>
    </div>
  </div>
  <!-- 全体のコンテナー -->
  <section class="page-campaign sub-campaign">
    <div class="sub-campaign__inner inner">
      <!-- タブのボタン -->
      <div class="sub-campaign__category-tab category-tab">
        <ul class="category-tab__lists">
          <li class="category-tab__list <?php if (!is_tax('campaign_category')) echo 'current'; ?>">
            <a href="<?php echo esc_url(get_post_type_archive_link('campaign')); ?>">ALL</a>
          </li>
          <?php
          $terms = get_terms(array(
            'taxonomy' => 'campaign_category',
            'hide_empty' => false,
          ));
          // タームをスラッグ名に基づいて並べ替える
          $ordered_slugs = array('licence', 'fun-diving', 'trial-diving');
          $ordered_terms = array();
          foreach ($ordered_slugs as $slug) {
            foreach ($terms as $term) {
              if ($term->slug === $slug) {
                $ordered_terms[] = $term;
              }
            }
          }
          // 並べ替えたタームを出力
          foreach ($ordered_terms as $term) : ?>
            <li class="category-tab__list <?php if (is_tax('campaign_category') && get_queried_object()->slug == $term->slug) echo 'current'; ?>">
              <a href="<?php echo esc_url(get_term_link($term)); ?>"><?php echo esc_html($term->name); ?></a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="category-tab__all-tabs-container">
        <div class="category-tab__each-tab-container js-category-tab-container is-active">
          <ul class="category-tab__items">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <li class="category-tab__item sub-campaign-card" id="campaign-license">
                  <div class="sub-campaign-card__img">
                    <figure>
                      <?php if (get_the_post_thumbnail()) : ?>
                        <img src="<?php the_post_thumbnail_url('full') ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
                      <?php else : ?>
                        <img src="<?php echo get_theme_file_uri('/assets/images/common/no_image.jpeg'); ?>" alt="no image">
                      <?php endif; ?>
                    </figure>
                  </div>
                  <div class="sub-campaign-card__body">
                    <div class="sub-campaign-card__title-wrapper">
                      <span class="sub-campaign-card__label category-label">
                        <?php
                        $terms = get_the_terms(get_the_ID(), 'campaign_category');
                        if ($terms && !is_wp_error($terms)) {
                          $term = array_shift($terms);
                          echo esc_html($term->name);
                        }
                        ?>
                      </span>
                      <h3 class="sub-campaign-card__title"><?php the_title(); ?></h3>
                    </div>
                    <div class="sub-campaign-card__price-wrapper">
                      <p class="sub-campaign-card__price-text">全部コミコミ(お一人様)</p>
                      <p class="sub-campaign-card__price"><span class="sub-campaign-card__price-center"><span class="sub-campaign-card__price-before">¥<?php the_field('price_before') ?></span>¥<?php the_field('special_price') ?></span></p>
                    </div>
                    <div class="sub-campaign-card__desktop-info u-desktop">
                      <p class="sub-campaign-card__text"> <?php the_content(); ?></p>
                      <div class="sub-campaign-card__period-wrap">
                        <time datetime="<?php echo get_field('start_year') . '-' . get_field('start_month') . '-' . get_field('start_date'); ?>"><?php the_field('start_year') ?>/<?php the_field('start_month') ?>/<?php the_field('start_date') ?></time>- <time datetime="<?php echo get_field('end_year') . '-' . get_field('end_month') . '-' . get_field('end_date'); ?>"><?php the_field('end_year') ?><?php the_field('end_month') ?>/<?php the_field('end_date') ?></time>
                        <p sub-campaign-card__cta-text>ご予約・お問い合わせはコチラ</p>
                      </div>
                      <div class="sub-campaign-card__button-wrapper">
                        <a href="<?php echo esc_url($contact_page_url); ?>" class="button">
                          <span class="button__span">Contact us</span>
                        </a>
                      </div>
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
    </div>
  </section>

  <?php get_footer(); ?>