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

<body class="<?php if (is_404()) {
                echo 'error404';
              } ?>">
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
                  <a href="<?php echo get_post_type_archive_link('campaign'); ?>">キャンペーン</a>
                  <ul class="global-navigation__sub-items">
                    <li class="global-navigation__sub-item">
                      <a href="<?php echo get_post_type_archive_link('campaign'); ?>#campaign-license">ライセンス取得</a>
                    </li>
                    <li class="global-navigation__sub-item">
                      <a href="<?php echo get_post_type_archive_link('campaign'); ?>#campaign-chartered-trial">貸切体験ダイビング</a>
                    </li>
                    <li class="global-navigation__sub-item">
                      <a href="<?php echo get_post_type_archive_link('campaign'); ?>#campaign-night">ナイトダイビング</a>
                    </li>
                  </ul>
                </li>
                <li class="global-navigation__item">
                  <a href="<?php echo get_permalink(get_page_by_path('about-us')); ?>">私たちについて</a>
                </li>
              </ul>
              <ul class="global-navigation__items">
                <li class="global-navigation__item">
                  <a href="<?php echo get_permalink(get_page_by_path('information')); ?>">ダイビング情報</a>
                  <ul class="global-navigation__sub-items">
                    <?php
                    // スラッグ名が 'information' のページのURLを取得
                    $information_page_url = get_permalink(get_page_by_path('information'));
                    ?>
                    <li class="global-navigation__sub-item">
                      <a href="<?php echo esc_url($information_page_url); ?>?tab=1">ライセンス講習</a>
                    </li>
                    <li class="global-navigation__sub-item">
                      <a href="<?php echo esc_url($information_page_url); ?>?tab=3">体験ダイビング</a>
                    </li>
                    <li class="global-navigation__sub-item">
                      <a href="<?php echo esc_url($information_page_url); ?>?tab=2">ファンダイビング</a>
                    </li>
                  </ul>
                </li>
                <li class="global-navigation__item">
                  <?php
                  // 投稿ページ（ブログページ）のURLを取得
                  $blog_page_url = get_permalink(get_option('page_for_posts'));
                  ?>
                  <a href="<?php echo esc_url($blog_page_url); ?>">ブログ</a>
                </li>
              </ul>
              <ul class="global-navigation__items">
                <li class="global-navigation__item">
                  <a href="<?php echo get_post_type_archive_link('voice'); ?>">お客様の声</a>
                </li>
                <li class="global-navigation__item">
                  <?php
                  // スラッグ名が 'contact' のページのURLを取得
                  $price_page_url = get_permalink(get_page_by_path('price'));
                  ?>
                  <a href="<?php echo esc_url($price_page_url); ?>">料金一覧</a>
                  <ul class="global-navigation__sub-items">
                    <?php
                    // スラッグ名が 'price' のページのURLを取得
                    $price_page_url = get_permalink(get_page_by_path('price'));
                    ?>
                    <li class="global-navigation__sub-item">
                      <a href="<?php echo esc_url($price_page_url); ?>#license-course">ライセンス講習</a>
                    </li>
                    <li class="global-navigation__sub-item">
                      <a href="<?php echo esc_url($price_page_url); ?>#trial-diving">体験ダイビング</a>
                    </li>
                    <li class="global-navigation__sub-item">
                      <a href="<?php echo esc_url($price_page_url); ?>#fun-diving">ファンダイビング</a>
                    </li>
                  </ul>
                </li>
              </ul>
              <ul class="global-navigation__items">
                <li class="global-navigation__item">
                  <?php
                  // スラッグ名が 'faq' のページのURLを取得
                  $faq_page_url = get_permalink(get_page_by_path('faq'));
                  ?>
                  <a href="<?php echo esc_url($faq_page_url); ?>">よくある質問</a>
                </li>
                <li class="global-navigation__item">
                  <?php
                  // スラッグ名が 'privacy-policy' のページのURLを取得
                  $privacy_policy_page_url = get_permalink(get_page_by_path('privacypolicy'));
                  ?>
                  <a href="<?php echo esc_url($privacy_policy_page_url); ?>">プライバシー<br class="u-mobile">ポリシー</a>
                </li>
                <li class="global-navigation__item">
                  <?php
                  // スラッグ名が 'terms-of-service' のページのURLを取得
                  $terms_of_service_page_url = get_permalink(get_page_by_path('terms-of-service'));
                  ?>
                  <a href="<?php echo esc_url($terms_of_service_page_url); ?>">利用規約</a>
                </li>
                <li class="global-navigation__item">
                  <?php
                  // スラッグ名が 'contact' のページのURLを取得
                  $contact_page_url = get_permalink(get_page_by_path('contact'));
                  ?>
                  <a href="<?php echo esc_url($contact_page_url); ?>">お問い合わせ</a>
                </li>
                <li class="global-navigation__item">
                  <?php
                  // スラッグ名が 'sitemap' のページのURLを取得
                  $sitemap_page_url = get_permalink(get_page_by_path('sitemap'));
                  ?>
                  <a href="<?php echo esc_url($sitemap_page_url); ?>">サイトマップ</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
      <!-- ここからPC 用メニュー-->
      <div class="header__pc-nav u-desktop">
        <nav class="header__header-nav header-nav">
          <?php
          wp_nav_menu(array(
            'theme_location' => 'header-menu',
            'container' => false,
            'menu_class' => 'header-nav__items',
            'items_wrap' => '<ul class="%2$s">%3$s</ul>',
            'fallback_cb' => false,
            'walker' => new Custom_Walker_Nav_Menu()
          ));
          ?>
        </nav>
      </div>

    </div>
  </header>