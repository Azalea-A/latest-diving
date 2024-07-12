<?php get_header(); ?>

<main class="main">
  <!-- fv -->
  <div class="top-fv fv">
    <!-- メインビュー -->
    <div class="fv__inner">
      <div class="fv__swiper swiper js-fvSwiper">
        <div class="swiper-wrapper">
          <?php for ($i = 1; $i <= 4; $i++) :
          $main_visual_pc = get_field('main_visual_pc_' . $i);
          $main_visual_sp = get_field('main_visual_sp_' . $i);
          if ($main_visual_pc && $main_visual_sp) : ?>
            <div class="swiper-slide">
              <picture>
                <source srcset="<?php echo esc_url($main_visual_sp); ?>" media="(max-width: 767px)">
                <img src="<?php echo esc_url($main_visual_pc); ?>" alt="メインビジュアル<?php echo $i; ?>">
              </picture>
            </div>
          <?php endif;
          endfor; ?>
        </div><!-- swiper-wrapper -->
        <!-- タイトルたち -->
        <div class="fv__title-wrap">
          <p class="fv__title-large">
            DIVING
          </p>
          <p class="fv__title-small">
            into the ocean
          </p>
        </div><!-- fv__title-wrap-->
      </div><!-- fv__slider swiper -->
    </div><!-- fv__inner -->
  </div>

  <!-- top page campaign -->
  <section class="top-campaign-section top-campaign">
    <div class="top-campaign__inner inner">
      <div class="top-campaign__header section-title">
        <p class="section-title__english">Campaign</p>
        <h2 class="section-title__japanese">キャンペーン</h2>
      </div>
      <div class="top-campaign__swiper-container">
        <div class="top-campaign__swiper-arrow-wrap">
          <div class="swiper-button-prev top-campaign__swiper-button-prev u-desktop"></div>
          <div class="swiper-button-next top-campaign__swiper-button-next u-desktop"></div>
        </div>
        <!-- Swiper -->
        <div class="top-campaign__swiper swiper js-topCampaignSwiper">
          <div class="swiper-wrapper">
            <?php
            // カスタム投稿タイプ 'campaign' の投稿を取得
            $args = array(
              'post_type' => 'campaign',
              'posts_per_page' => -1, // すべての投稿を取得
            );
            $campaign_query = new WP_Query($args);
            if ($campaign_query->have_posts()) :
              while ($campaign_query->have_posts()) : $campaign_query->the_post();
              $price_before = get_field('price_before'); // ACFフィールド 'price_before' から取得
              $special_price = get_field('special_price'); // ACFフィールド 'special_price' から取得
            ?>
              <div class="swiper-slide top-campaign__swiper-slide">
                <div class="campaign-card">
                  <div class="campaign-card__img">
                    <figure>
                      <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('full'); ?>
                      <?php else : ?>
                        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/default.jpg" alt="デフォルト画像">
                      <?php endif; ?>
                    </figure>
                  </div>
                  <div class="campaign-card__body">
                    <div class="campaign-card__title-wrapper">
                      <?php $categories = get_the_terms(get_the_ID(), 'campaign_category'); ?>
                      <?php if ($categories && !is_wp_error($categories)) : ?>
                        <?php foreach ($categories as $category) : ?>
                          <span class="campaign-card__label category-label"><?php echo esc_html($category->name); ?></span>
                        <?php endforeach; ?>
                      <?php endif; ?>
                      <h3 class="campaign-card__title"><?php the_title(); ?></h3>
                    </div>
                    <div class="campaign-card__price-wrapper">
                      <p class="campaign-card__price-text">全部コミコミ(お一人様)</p>
                      <p class="campaign-card__price">
                        <?php if ($price_before) : ?><span class="campaign-card__price-before">¥<?php echo number_format(floatval(preg_replace('/[^0-9.]/', '', $price_before))); ?></span><?php endif; ?>¥<?php echo number_format(floatval(preg_replace('/[^0-9.]/', '', $special_price))); ?>
                      </p>
                    </div>
                  </div> <!-- campaign-card__body -->
                </div> <!-- campaign-card -->
              </div><!-- swiper-slide -->
            <?php endwhile;
              wp_reset_postdata();
            endif;?>
          </div> <!-- swiper-wrapper -->
        </div><!-- swiper-->
      </div> <!-- top-campaign__swiper-container -->
      <div class="top-campaign__button-wrapper">
        <?php
        // カスタムポストタイプ 'campaign' のアーカイブページURLを取得
        $campaign_archive_url = get_post_type_archive_link('campaign');
        ?>
        <a href="<?php echo esc_url($campaign_archive_url); ?>" class="button">
          <span class="button__span">View more</span>
        </a>
      </div>
    </div>
  </section>

  <!-- top about -->
  <section class="top-about-section top-about">
    <div class="top-about__inner inner">
      <div class="top-about__section-title section-title">
        <p class="section-title__english">About us</p>
        <h2 class="section-title__japanese">私たちについて</h2>
      </div>
      <div class="top-about__container">
        <div class="top-about__img-wrapper">
          <div class="top-about__img01">
            <figure>
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/about_us-top01.jpg" alt="屋根の上のシーサーと青空の写真" loading="lazy" decoding="async">
            </figure>
          </div>
          <div class="top-about__img02">
            <figure>
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/about_us-top02.jpg" alt="2匹の黄色と黒の魚が水色の海の中で泳いでいる写真" loading="lazy" decoding="async">
            </figure>
          </div>
        </div>
        <div class="top-about__body">
          <div class="top-about__heading-wrapper">
            <h3 class="top-about__heading">Dive into<br>the Ocean</h3>
          </div>
          <div class="top-about__content-wrapper">
            <p class="top-about__text">ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。</p>
            <div class="top-about__button-wrapper">
              <?php
              // スラッグ名が 'about-us' のページのURLを取得
              $about_us_page_url = get_permalink(get_page_by_path('about-us'));
              ?>
              <a href="<?php echo esc_url($about_us_page_url); ?>" class="button"><span class="button__span">View more</span></a>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- top-about__inner inner -->
  </section>
  <!-- top information -->
  <section class="top-information-section top-information">
    <div class="top-information__inner inner">
      <div class="top-information__section-title section-title">
        <p class="section-title__english">Information</p>
        <h2 class="section-title__japanese">ダイビング情報</h2>
      </div>
      <div class="top-information__container">
        <div class="top-information__img color-box js-color-box">
          <figure>
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/top-information01.jpg" alt="海底のサンゴと魚たちが泳いでいる様子" loading="lazy" decoding="async">
          </figure>
        </div>
        <div class="top-information__body-container">
          <div class="top-information__body">
            <h3 class="top-information__heading">ライセンス講習</h3>
            <p class="top-information__text">当店はダイビングライセンス（Cカード）世界最大の教育機関PADIの「正規店」として店舗登録されています。<br>正規登録店として、安心安全に初めての方でも安心安全にライセンス取得をサポート致します。</p>
            <div class="top-information__button-wrapper">
              <?php
              // スラッグ名が 'information' のページのURLを取得
              $information_page_url = get_permalink(get_page_by_path('information'));
              ?>
              <a href="<?php echo esc_url($information_page_url); ?>" class="button">
                <span class="button__span">View more</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- top blog -->
  <section class="top-blog-section top-blog">
    <div class="top-blog__inner inner">
      <div class="top-blog__section-title section-title">
        <p class="section-title__english section-title__english--white">Blog</p>
        <h2 class="section-title__japanese section-title__japanese--white">ブログ</h2>
      </div>
      <ul class="top-blog__blog-cards blog-cards">
        <?php
        // 最新の投稿3件を取得
        $args = array(
          'post_type' => 'post',
          'posts_per_page' => 3,
        );
        $latest_posts = new WP_Query($args);

        if ($latest_posts->have_posts()) :
        while ($latest_posts->have_posts()) : $latest_posts->the_post();
        ?>
        <li class="blog-cards__item blog-card">
          <a href="<?php echo esc_url(get_permalink()); ?>" class="blog-card__link">
            <div class="blog-card__inner">
              <div class="blog-card__img">
                <figure>
                  <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('full', array('loading' => 'lazy')); ?>
                  <?php else : ?>
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/no_image.jpeg" alt="<?php the_title(); ?>" loading="lazy">
                  <?php endif; ?>
                </figure>
              </div>
              <div class="blog-card__content">
                <div class="blog-card__head">
                  <time class="blog-card__date" datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('Y.m/d'); ?></time>
                  <h3 class="blog-card__title"><?php the_title(); ?></h3>
                </div>
                <p class="blog-card__text"><?php echo wp_trim_words(get_the_excerpt(), 90, '...'); ?></p>
              </div>
            </div>
          </a>
        </li>
        <?php
          endwhile;
          wp_reset_postdata();
        endif;
        ?>
      </ul>
      <div class="top-blog__button-wrapper">
        <?php
        // 投稿ページのURLを取得
        $posts_page_url = get_permalink(get_option('page_for_posts'));
        ?>
        <a href="<?php echo esc_url($posts_page_url); ?>" class="button">
          <span class="button__span">View more</span>
        </a>
      </div>
    </div>
  </section>

  <!-- top voice -->
  <section class="top-voice-section top-voice">
    <div class="top-voice__inner inner">
      <div class="top-voice__section-title section-title">
        <p class="section-title__english">Voice</p>
        <h2 class="section-title__japanese">お客様の声</h2>
      </div>
      <ul class="top-voice__voice-cards voice-cards">
        <?php
        // 最新のカスタム投稿 'voice' の投稿2件を取得
        $args = array(
          'post_type' => 'voice',
          'posts_per_page' => 2,
        );
        $latest_voice_posts = new WP_Query($args);
        if ($latest_voice_posts->have_posts()) :
          while ($latest_voice_posts->have_posts()) : $latest_voice_posts->the_post();
            // ACF フィールドからデータを取得
            $age = get_field('age'); // 年齢
            $gender = get_field('gender'); // 性別
            $category_terms = get_the_terms(get_the_ID(), 'voice_category'); // カテゴリー
            $voice_content = get_field('voice-content'); // ACF フィールド 'voice-content' から取得
        ?>
        <li class="voice-cards__item voice-card">
          <div class="voice-card__inner">
            <div class="voice-card__top">
              <div class="voice-card__title-wrapper">
                <div class="voice-card__title-flex-box">
                  <p class="voice-card__personal-info"><?php echo esc_html($age); ?>代(<?php echo esc_html($gender); ?>)</p>
                  <?php if ($category_terms && !is_wp_error($category_terms)) : ?>
                    <?php foreach ($category_terms as $category_term) : ?>
                      <span class="voice-card__label category-label category-label--voice"><?php echo esc_html($category_term->name); ?></span>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </div>
                <h3 class="voice-card__title"><?php the_title(); ?></h3>
              </div>
              <div class="voice-card__img color-box js-color-box">
                <figure>
                  <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('full', array('loading' => 'lazy', 'decoding' => 'async')); ?>
                  <?php else : ?>
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/default.jpg" alt="<?php the_title(); ?>" loading="lazy" decoding="async">
                  <?php endif; ?>
                </figure>
              </div>
            </div>
            <div class="voice-card__bottom">
              <p class="voice-card__text"><?php echo esc_html($voice_content); ?></p>
            </div>
          </div>
        </li>
        <?php
          endwhile;
          wp_reset_postdata();
        endif;
        ?>
      </ul>

      <div class="top-voice__button-wrapper">
        <?php
        // カスタムポストタイプ 'voice' のアーカイブページURLを取得
        $voice_archive_url = get_post_type_archive_link('voice');
        ?>
        <a href="<?php echo esc_url($voice_archive_url); ?>" class="button">
          <span class="button__span">View more</span>
        </a>
      </div>
    </div>
  </section>

  <!-- top price  -->
  <section class="top-price-section top-price">
    <div class="top-price__inner inner">
      <div class="top-price__section-title section-title">
        <p class="section-title__english">Price</p>
        <h2 class="section-title__japanese">料金一覧</h2>
      </div>
      <div class="top-price__container">
        <div class="top-price__img-wrapper color-box js-color-box">
          <picture>
            <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/top-price-sp.jpg" media="(max-width: 767px)">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/top-price-pc.jpg" alt="深海と魚たちの写真">
          </picture>
        </div>
        <div class="top-price__body">
          <ul class="top-price__category-items">
            <!-- ライセンス講習 -->
            <li class="top-price__category-item">
              <?php
              // 固定ページのID 109 を指定してデータを取得
              $licence_category = SCF::get('licence_category', 109);
              $licence_lists = SCF::get('licence_lists', 109);
              ?>
              <h3 class="top-price__category-item-title"><?php echo esc_html($licence_category); ?></h3>
              <dl class="top-price__menu-lists">
                <?php
                if (!empty($licence_lists) && is_array($licence_lists)) {
                  foreach ($licence_lists as $licence) {
                    $licence_course_name = $licence['licence_course_name'];
                    $licence_course_price = $licence['licence_course_price'];
                ?>
                  <div class="top-price__menu-flexbox">
                    <dt><?php echo esc_html($licence_course_name); ?></dt>
                    <dd><?php echo esc_html($licence_course_price); ?></dd>
                  </div>
                <?php
                  }
                } else {
                  echo '<div>No courses found.</div>';
                }
                ?>
              </dl>
            </li>
            <!-- 体験ダイビング -->
            <li class="top-price__category-item">
              <?php
              // 固定ページのID 109 を指定してデータを取得
              $trial_diving_category = SCF::get('trial_diving_category', 109);
              $trial_diving_lists = SCF::get('trial_diving_lists', 109);
              ?>
              <h3 class="top-price__category-item-title"><?php echo esc_html($trial_diving_category); ?></h3>
              <dl class="top-price__menu-lists">
                <?php
                if (!empty($trial_diving_lists) && is_array($trial_diving_lists)) {
                  foreach ($trial_diving_lists as $trial_diving) {
                    $trial_diving_course_name = $trial_diving['trial_diving_course_name'];
                    $trial_diving_course_price = $trial_diving['trial_diving_course_price'];
                ?>
                    <div class="top-price__menu-flexbox">
                      <dt><?php echo esc_html($trial_diving_course_name); ?></dt>
                      <dd><?php echo esc_html($trial_diving_course_price); ?></dd>
                    </div>
                <?php
                  }
                } else {
                  echo '<div>No courses found.</div>';
                }
                ?>
              </dl>
            </li>
            <!-- ファンダイビング -->
            <li class="top-price__category-item">
              <?php
              // 固定ページのID 109 を指定してデータを取得
              $fun_diving_category = SCF::get('fun_diving_category', 109);
              $fun_diving_lists = SCF::get('fun_diving_lists', 109);
              ?>
              <h3 class="top-price__category-item-title"><?php echo esc_html($fun_diving_category); ?></h3>
              <dl class="top-price__menu-lists">
                <?php
                if (!empty($fun_diving_lists) && is_array($fun_diving_lists)) {
                  foreach ($fun_diving_lists as $fun_diving) {
                    $fun_diving_course_name = $fun_diving['fun_diving_course_name'];
                    $fun_diving_course_price = $fun_diving['fun_diving_course_price'];
                ?>
                  <div class="top-price__menu-flexbox">
                    <dt><?php echo esc_html($fun_diving_course_name); ?></dt>
                    <dd><?php echo esc_html($fun_diving_course_price); ?></dd>
                  </div>
                <?php
                  }
                } else {
                  echo '<div>No courses found.</div>';
                }
                ?>
              </dl>
            </li>
            <!-- スペシャルダイビング -->
            <li class="top-price__category-item">
              <?php
              // 固定ページのID 109 を指定してデータを取得
              $special_diving_category = SCF::get('special_diving_category', 109);
              $special_diving_lists = SCF::get('special_diving_lists', 109);
              ?>
              <h3 class="top-price__category-item-title"><?php echo esc_html($special_diving_category); ?></h3>
              <dl class="top-price__menu-lists">
                <?php
                if (!empty($special_diving_lists) && is_array($special_diving_lists)) {
                  foreach ($special_diving_lists as $special_diving) {
                    $special_diving_course_name = $special_diving['special_diving_course_name'];
                    $special_diving_course_price = $special_diving['special_diving_course_price'];
                ?>
                  <div class="top-price__menu-flexbox">
                    <dt><?php echo esc_html($special_diving_course_name); ?></dt>
                    <dd><?php echo esc_html($special_diving_course_price); ?></dd>
                  </div>
                <?php
                  }
                } else {
                  echo '<div>No courses found.</div>';
                }
                ?>
              </dl>
            </li>
          </ul>
        </div><!-- top-price__lists-container -->
      </div><!-- top-price__flex-container -->
    </div>
    <div class="top-price__button-wrapper">
      <?php
      // スラッグ名が 'price' のページのURLを取得
      $price_page_url = get_permalink(get_page_by_path('price'));
      ?>
      <a href="<?php echo esc_url($price_page_url); ?>" class="button">
        <span class="button__span">View more</span>
      </a>
    </div>
  </section>

  <?php get_footer(); ?>