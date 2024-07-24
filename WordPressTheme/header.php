<!DOCTYPE html>
<html lang="ja">

<head>
  <!-- noindex -->
  <meta name="robots" content="noindex">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <meta name="format-detection" content="telephone=no" />
  <meta name="robots" content="noindex" />
  <!-- blogのパンくずで表示のためにmetaを取り除いて、代わりにここに配置 -->
  <meta property="position" content="%position%">
  <!-- OGP 設定 -->
  <meta property="og:title" content="<?php echo get_the_title(); ?>" />
  <meta property="og:description" content="<?php echo get_the_excerpt(); ?>" />
  <meta property="og:url" content="<?php echo get_permalink(); ?>" />
  <meta property="og:image" content="<?php echo get_the_post_thumbnail_url(); ?>" />
  <meta property="og:type" content="website" />
  <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />

  <?php wp_head(); ?>
</head>

<body class="<?php echo is_404() ? 'error404' : ''; ?>">
  <header class="header js-header">
    <div class="header__inner">
      <h1 class="header__logo">
        <a class="header__logo-link" href="<?php echo home_url(); ?>">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/CodeUps_logo.svg" alt="CodeUps" loading="lazy" decoding="async">
        </a>
      </h1>
      <div class="header__hamburger hamburger js-hamburger u-mobile">
        <!-- ハンバーガーメニューの線 -->
        <span></span>
        <span></span>
        <span></span>
      </div>
      <!-- 出てくるドロワーの中身 -->
      <div class="header__drawer-menu drawer-menu js-drawer u-mobile">
        <div class="drawer-menu__inner">
          <!--  footerのnavと同じ -->
          <nav class="global-navigation global-navigation--drawer">
            <div class="global-navigation__columns global-navigation__columns--drawer">
              <ul class="global-navigation__items">
                <li class="global-navigation__item">
                  <a href="<?php echo esc_url(get_post_type_archive_link('campaign')); ?>">キャンペーン</a>
                  <ul class="global-navigation__sub-items">
                    <li class="global-navigation__sub-item">
                      <a href="<?php echo esc_url(home_url('/campaign_category/licence')); ?>">ライセンス取得</a>
                    </li>
                    <li class="global-navigation__sub-item">
                      <a href="<?php echo esc_url(home_url('/campaign_category/trial-diving')); ?>">体験ダイビング</a>
                    </li>
                    <li class="global-navigation__sub-item">
                      <a href="<?php echo esc_url(home_url('/campaign_category/fun-diving')); ?>">ファンダイビング</a>
                    </li>
                  </ul>
                </li>
                <li class="global-navigation__item">
                  <a href="<?php echo esc_url(home_url('/about-us')); ?>">私たちについて</a>
                </li>
              </ul>
              <ul class="global-navigation__items">
                <li class="global-navigation__item">
                  <a href="<?php echo esc_url(home_url('/information')); ?>">ダイビング情報</a>
                  <ul class="global-navigation__sub-items">
                    <li class="global-navigation__sub-item">
                      <a href="<?php echo esc_url(home_url('/information/?tab=1')); ?>">ライセンス講習</a>
                    </li>
                    <li class="global-navigation__sub-item">
                      <a href="<?php echo esc_url(home_url('/information/?tab=3')); ?>">体験ダイビング</a>
                    </li>
                    <li class="global-navigation__sub-item">
                      <a href="<?php echo esc_url(home_url('/information/?tab=2')); ?>">ファンダイビング</a>
                    </li>
                  </ul>
                </li>
                <li class="global-navigation__item">
                  <a href="<?php echo esc_url(home_url('/home')); ?>">ブログ</a>
                </li>
              </ul>
              <ul class="global-navigation__items">
                <li class="global-navigation__item">
                  <a href="<?php echo esc_url(get_post_type_archive_link('voice')); ?>">お客様の声</a>
                </li>
                <li class="global-navigation__item">
                  <a href="<?php echo esc_url(home_url('/price')); ?>">料金一覧</a>
                  <ul class="global-navigation__sub-items">
                    <li class="global-navigation__sub-item">
                      <a href="<?php echo esc_url(home_url('/price#license-course')); ?>">ライセンス講習</a>
                    </li>
                    <li class="global-navigation__sub-item">
                      <a href="<?php echo esc_url(home_url('/price#trial-diving')); ?>">体験ダイビング</a>
                    </li>
                    <li class="global-navigation__sub-item">
                      <a href="<?php echo esc_url(home_url('/price#fun-diving')); ?>">ファンダイビング</a>
                    </li>
                  </ul>
                </li>
              </ul>
              <ul class="global-navigation__items">
                <li class="global-navigation__item">
                  <a href="<?php echo esc_url(home_url('/faq')); ?>">よくある質問</a>
                </li>
                <li class="global-navigation__item">
                  <a href="<?php echo esc_url(home_url('/privacypolicy')); ?>">プライバシー<br class="u-mobile">ポリシー</a>
                </li>
                <li class="global-navigation__item">
                  <a href="<?php echo esc_url(home_url('/terms-of-service')); ?>">利用規約</a>
                </li>
                <li class="global-navigation__item">
                  <a href="<?php echo esc_url(home_url('/contact')); ?>">お問い合わせ</a>
                </li>
                <li class="global-navigation__item">
                  <a href="<?php echo esc_url(home_url('/sitemap')); ?>">サイトマップ</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
      <!-- ここからPC 用メニュー-->
      <div class="header__pc-nav u-desktop">
        <nav class="header__header-nav header-nav">
          <ul class="header-nav__items">
                <li class="header-nav__item">
                  <a href="<?php echo esc_url(get_post_type_archive_link('campaign')); ?>">Campaign<span>キャンペーン</span></a>
                </li>
                <li class="header-nav__item">
                  <a href="<?php echo esc_url(get_permalink(get_page_by_path('about-us'))); ?>">About us<span>私たちについて</span></a>
                </li>
                <li class="header-nav__item">
                  <a href="<?php echo esc_url(get_permalink(get_page_by_path('information'))); ?>">Information<span>ダイビング情報</span></a>
                </li>
                <li class="header-nav__item">
                <?php
                  // 投稿ページ（ブログページ）のURLを取得
                  $blog_page_url = get_permalink(get_option('page_for_posts'));
                  ?>
                  <a href="<?php echo esc_url($blog_page_url); ?>">Blog<span>ブログ</span></a>
                </li>
                <li class="header-nav__item">
                  <a href="<?php echo get_post_type_archive_link('voice'); ?>">Voice<span>お客様の声</span></a>
                </li>
                <li class="header-nav__item">
                  <?php
                  // スラッグ名が 'price' のページのURLを取得
                  $price_page_url = get_permalink(get_page_by_path('price'));
                  ?>
                  <a href="<?php echo esc_url($price_page_url); ?>">Price<span>料金一覧</span></a>
                </li>
                <li class="header-nav__item">
                  <?php
                  // スラッグ名が 'faq' のページのURLを取得
                  $faq_page_url = get_permalink(get_page_by_path('faq'));
                  ?>
                  <a href="<?php echo esc_url($faq_page_url); ?>">FAQ<span>よくある質問</span></a>
                </li>
                <li class="header-nav__item">
                  <?php
                  // スラッグ名が 'contact' のページのURLを取得
                  $contact_page_url = get_permalink(get_page_by_path('contact'));
                  ?>
                  <a href="<?php echo esc_url($contact_page_url); ?>">Contact<span>お問い合わせ</span></a>
                </li>
              </ul>
          </nav>
      </div>
    </div>
  </header>