<?php get_header(); ?>

<main class="main">
  <!-- fv -->
  <div class="top-fv fv">
    <!-- メインビュー -->
    <div class="fv__inner">
      <div class="fv__swiper swiper js-fvSwiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <picture>
              <source srcset="./assets/images/common/top-fv-sp01.jpg" media="(max-width: 767px)">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/top-fv01.jpg" alt="カメが海を泳いでいる様子">
            </picture>
          </div><!-- swiper-slide -->
          <div class="swiper-slide">
            <picture>
              <source srcset="./assets/images/common/top-fv-sp02.jpg" media="(max-width: 767px)">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/top-fv02.jpg" alt="海の中でダイバー2人とカメが出会う様子">
            </picture>
          </div><!-- swiper-slide -->
          <div class="swiper-slide">
            <picture>
              <source srcset="./assets/images/common/top-fv-sp03.jpg" media="(max-width: 767px)">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/top-fv03.jpg" alt="海に船が浮かんでいて、晴天で山のある景色">
            </picture>
          </div><!-- swiper-slide -->
          <div class="swiper-slide">
            <picture>
              <source srcset="./assets/images/common/top-fv-sp04.jpg" media="(max-width: 767px)">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/top-fv04.jpg" alt="砂浜と透き通った海、晴天の様子">
            </picture>
          </div><!-- swiper-slide -->
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
            <div class="swiper-slide top-campaign__swiper-slide">
              <div class="campaign-card">
                <div class="campaign-card__img">
                  <figure>
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign01.jpg" alt="キャンペーンのイメージ画像">
                  </figure>
                </div>
                <div class="campaign-card__body">
                  <div class="campaign-card__title-wrapper">
                    <span class="campaign-card__label category-label">ライセンス講習</span>
                    <h3 class="campaign-card__title">ライセンス講習</h3>
                  </div>
                  <div class="campaign-card__price-wrapper">
                    <p class="campaign-card__price-text">全部コミコミ(お一人様)</p>
                    <p class="campaign-card__price"><span class="campaign-card__price-before">¥56,000</span>¥46,000</p>
                  </div>
                </div> <!-- campaign-card__body -->
              </div> <!-- campaign-card -->
            </div><!-- swiper-slide -->
            <div class="swiper-slide top-campaign__swiper-slide">
              <div class="campaign-card">
                <div class="campaign-card__img">
                  <figure>
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign02.jpg" alt="キャンペーンのイメージ画像">
                  </figure>
                </div>
                <div class="campaign-card__body">
                  <div class="campaign-card__title-wrapper">
                    <span class="campaign-card__label category-label">体験ダイビング</span>
                    <h3 class="campaign-card__title">貸切体験ダイビング</h3>
                  </div>
                  <div class="campaign-card__price-wrapper">
                    <p class="campaign-card__price-text">全部コミコミ(お一人様)</p>
                    <p class="campaign-card__price"><span class="campaign-card__price-before">¥24,000</span>¥18,000</p>
                  </div>
                </div> <!-- campaign-card__body -->
              </div> <!-- campaign-card -->
            </div><!-- swiper-slide -->
            <div class="swiper-slide top-campaign__swiper-slide">
              <div class="campaign-card">
                <div class="campaign-card__img">
                  <figure>
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign03.jpg" alt="キャンペーンのイメージ画像">
                  </figure>
                </div>
                <div class="campaign-card__body">
                  <div class="campaign-card__title-wrapper">
                    <span class="campaign-card__label category-label">体験ダイビング</span>
                    <h3 class="campaign-card__title">ナイトダイビング</h3>
                  </div>
                  <div class="campaign-card__price-wrapper">
                    <p class="campaign-card__price-text">全部コミコミ(お一人様)</p>
                    <p class="campaign-card__price"><span class="campaign-card__price-before">¥10,000</span>¥8,000</p>
                  </div>
                </div> <!-- campaign-card__body -->
              </div> <!-- campaign-card -->
            </div><!-- swiper-slide -->
            <div class="swiper-slide top-campaign__swiper-slide">
              <div class="campaign-card">
                <div class="campaign-card__img">
                  <figure>
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign04.jpg" alt="キャンペーンのイメージ画像">
                  </figure>
                </div>
                <div class="campaign-card__body">
                  <div class="campaign-card__title-wrapper">
                    <span class="campaign-card__label category-label">ファンダイビング</span>
                    <h3 class="campaign-card__title">貸切ファンダイビング</h3>
                  </div>
                  <div class="campaign-card__price-wrapper">
                    <p class="campaign-card__price-text">全部コミコミ(お一人様)</p>
                    <p class="campaign-card__price"><span class="campaign-card__price-before">¥20,000</span>¥16,000</p>
                  </div>
                </div> <!-- campaign-card__body -->
              </div> <!-- campaign-card -->
            </div><!-- swiper-slide -->
          </div> <!-- swiper-wrapper -->
        </div><!-- swiper-->
      </div> <!-- top-campaign__swiper-container -->
      <div class="top-campaign__button-wrapper">
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
        <li class="blog-cards__item blog-card">
          <a href="#" class="blog-card__link">
            <div class="blog-card__inner">
              <div class="blog-card__img">
                <figure>
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog01.jpg" alt="ブログイメージ画像" loading="lazy">
                </figure>
              </div>
              <div class="blog-card__content">
                <div class="blog-card__head">
                  <time class="blog-card__date" datetime="2023-11-17">2023.11/17</time>
                  <h3 class="blog-card__title">ライセンス取得</h3>
                </div>
                <p class="blog-card__text">ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキスト</p>
              </div>
            </div>
          </a>
        </li>
        <li class="blog-cards__item blog-card">
          <a href="#" class="blog-card__link">
            <div class="blog-card__inner">
              <div class="blog-card__img">
                <figure>
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog02.jpg" alt="ブログイメージ画像" loading="lazy">
                </figure>
              </div>
              <div class="blog-card__content">
                <div class="blog-card__head">
                  <time class="blog-card__date" datetime="2023-11-17">2023.11/17</time>
                  <h3 class="blog-card__title">ウミガメと泳ぐ</h3>
                </div>
                <p class="blog-card__text">ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキスト</p>
              </div>
            </div>
          </a>
        </li>
        <li class="blog-cards__item blog-card">
          <a href="#" class="blog-card__link">
            <div class="blog-card__inner">
              <div class="blog-card__img">
                <figure>
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog03.jpg" alt="ブログイメージ画像" loading="lazy">
                </figure>
              </div>
              <div class="blog-card__content">
                <div class="blog-card__head">
                  <time class="blog-card__date" datetime="2023-11-17">2023.11/17</time>
                  <h3 class="blog-card__title">カクレクマノミ</h3>
                </div>
                <p class="blog-card__text">ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキスト</p>
              </div>
            </div>
          </a>
        </li>
      </ul>
      <div class="top-blog__button-wrapper">
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
        <li class="voice-cards__item voice-card">
          <div class="voice-card__inner">
            <div class="voice-card__top">
              <div class="voice-card__title-wrapper">
                <div class="voice-card__title-flex-box">
                  <p class="voice-card__personal-info">20代(女性)</p>
                  <span class="voice-card__label category-label category-label--voice">ライセンス講習</span>
                </div>
                <h3 class="voice-card__title">ここにタイトルが入ります。ここにタイトル</h3>
              </div>
              <div class="voice-card__img color-box js-color-box">
                <figure>
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/voice01.jpg" alt="20代女性の写真" loading="lazy" decoding="async">
                </figure>
              </div>
            </div>
            <div class="voice-card__bottom">
              <p class="voice-card__text">ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります</p>
            </div>
          </div>
        </li>
        <li class="voice-cards__item voice-card">
          <div class="voice-card__inner">
            <div class="voice-card__top">
              <div class="voice-card__title-wrapper">
                <div class="voice-card__title-flex-box">
                  <p class="voice-card__personal-info">30代(女性)</p>
                  <span class="voice-card__label category-label category-label--voice">ファンダイビング</span>
                </div>
                <h3 class="voice-card__title">ここにタイトルが入ります。ここにタイトル</h3>
              </div>
              <div class="voice-card__img color-box js-color-box">
                <figure>
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/voice02.jpg" alt="30代女性の写真" loading="lazy" decoding="async">
                </figure>
              </div>
            </div>
            <div class="voice-card__bottom">
              <p class="voice-card__text">ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります</p>
            </div>
          </div>
        </li>
      </ul>
      <div class="top-voice__button-wrapper">
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
            <source srcset="./assets/images/common/top-price-sp.jpg" media="(max-width: 767px)">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/top-price-pc.jpg" alt="深海と魚たちの写真">
          </picture>
        </div>
        <div class="top-price__body">
          <ul class="top-price__category-items">
            <li class="top-price__category-item">
              <h3 class="top-price__category-item-title">ライセンス講習</h3>
              <dl class="top-price__menu-lists">
                <div class="top-price__menu-flexbox">
                  <dt>オープンウォーターダイバーコース</dt>
                  <dd>¥50,000</dd>
                </div>
                <div class="top-price__menu-flexbox">
                  <dt>アドバンスドオープンウォーターコース</dt>
                  <dd>¥60,000</dd>
                </div>
                <div class="top-price__menu-flexbox">
                  <dt>レスキュー＋EFRコース</dt>
                  <dd>¥70,000</dd>
                </div>
              </dl>
            </li>
            <li class="top-price__category-item">
              <h3 class="top-price__category-item-title">体験ダイビング</h3>
              <dl class="top-price__menu-lists">
                <div class="top-price__menu-flexbox">
                  <dt>ビーチ体験ダイビング(半日)</dt>
                  <dd>¥7,000</dd>
                </div>
                <div class="top-price__menu-flexbox">
                  <dt>ビーチ体験ダイビング(1日)</dt>
                  <dd>¥14,000</dd>
                </div>
                <div class="top-price__menu-flexbox">
                  <dt>ボート体験ダイビング(半日)</dt>
                  <dd>¥10,000</dd>
                </div>
                <div class="top-price__menu-flexbox">
                  <dt>ボート体験ダイビング(1日)</dt>
                  <dd>¥18,000</dd>
                </div>
              </dl>
            </li>
            <li class="top-price__category-item">
              <h3 class="top-price__category-item-title">ファンダイビング</h3>
              <dl class="top-price__menu-lists">
                <div class="top-price__menu-flexbox">
                  <dt>ビーチダイビング(2ダイブ)</dt>
                  <dd>¥14,000</dd>
                </div>
                <div class="top-price__menu-flexbox">
                  <dt>ボートダイビング(2ダイブ)</dt>
                  <dd>¥18,000</dd>
                </div>
                <div class="top-price__menu-flexbox">
                  <dt>スペシャルダイビング(2ダイブ)</dt>
                  <dd>¥24,000</dd>
                </div>
                <div class="top-price__menu-flexbox">
                  <dt>ナイトダイビング(1ダイブ)</dt>
                  <dd>¥10,000</dd>
                </div>
              </dl>
            </li>
            <li class="top-price__category-item">
              <h3 class="top-price__category-item-title">スペシャルダイビング</h3>
              <dl class="top-price__menu-lists">
                <div class="top-price__menu-flexbox">
                  <dt>貸切ダイビング(2ダイブ)</dt>
                  <dd>¥24,000</dd>
                </div>
                <div class="top-price__menu-flexbox">
                  <dt>1日ダイビング(3ダイブ)</dt>
                  <dd>¥32,000</dd>
                </div>
              </dl>
            </li>
          </ul>
        </div><!-- top-price__lists-container -->
      </div><!-- top-price__flex-container -->
    </div>
    <div class="top-price__button-wrapper">
      <a href="<?php echo esc_url($price_page_url); ?>" class="button">
        <span class="button__span">View more</span>
      </a>
    </div>
  </section>


  <?php get_footer(); ?>