<?php get_header(); ?>

<main class="main">
  <!-- fv -->
  <div class="sub-fv sub-fv--privacy-policy">
    <div class="sub-fv__inner">
      <!-- サブページのメインビュー -->
      <h1 class="sub-fv__title">Site <span class="sub-fv__title--upper-case">map</span></h1>
    </div>
  </div>
  <!-- パンくずリスト -->
  <?php get_template_part('parts/breadcrumb'); ?>
  <section class="page-site-map site-map">
    <div class="site-map__sub-page-inner inner">
      <nav class="site-map__global-navigation global-navigation--footer global-navigation">
        <div class="global-navigation__columns global-navigation__columns--site-map">
            <ul class="global-navigation__items">
                <li class="global-navigation__item global-navigation__item--black">
                    <a href="<?php echo esc_url(site_url('/campaign')); ?>">キャンペーン</a>
                    <ul class="global-navigation__sub-items">
                        <li class="global-navigation__sub-item">
                        <?php
                        // 'licence' タームのリンクを取得する
                        $licence_term = get_term_by('slug', 'licence', 'campaign_category');
                        if ($licence_term) :
                            $licence_link = get_term_link($licence_term);
                        endif;
                        ?>
                            <a href="<?php echo esc_url($licence_link); ?>">ライセンス取得</a>
                        </li>
                        <li class="global-navigation__sub-item">
                        <?php 
                        // 'trial-diving' タームのリンクを取得する
                        $trial_diving_term = get_term_by('slug', 'trial-diving', 'campaign_category');
                        if ($trial_diving_term) :
                            $trial_diving_link = get_term_link($trial_diving_term);
                        endif;
                        ?>
                            <a href="<?php echo esc_url($trial_diving_link); ?>">体験ダイビング</a>
                        </li>
                        <li class="global-navigation__sub-item">
                        <?php
                        // 'fun-diving' タームのリンクを取得する
                        $fun_diving_term = get_term_by('slug', 'fun-diving', 'campaign_category');
                        if ($fun_diving_term) :
                            $fun_diving_link = get_term_link($fun_diving_term);
                        endif;
                        ?>
                            <a href="<?php echo esc_url($fun_diving_link); ?>">ファンダイビング</a>
                        </li>
                    </ul>
                </li>
                <li class="global-navigation__item global-navigation__item--black">
                    <a href="<?php echo esc_url(site_url('/about-us')); ?>">私たちについて</a>
                </li>
            </ul>
            <ul class="global-navigation__items">
                <li class="global-navigation__item global-navigation__item--black">
                    <a href="<?php echo esc_url(site_url('/information')); ?>">ダイビング情報</a>
                    <ul class="global-navigation__sub-items">
                        <li class="global-navigation__sub-item">
                            <a href="<?php echo esc_url(site_url('/information?tab=1')); ?>">ライセンス講習</a>
                        </li>
                        <li class="global-navigation__sub-item">
                            <a href="<?php echo esc_url(site_url('/information?tab=3')); ?>">体験ダイビング</a>
                        </li>
                        <li class="global-navigation__sub-item">
                            <a href="<?php echo esc_url(site_url('/information?tab=2')); ?>">ファンダイビング</a>
                        </li>
                    </ul>
                </li>
                <li class="global-navigation__item global-navigation__item--black">
                    <a href="<?php echo esc_url(site_url('/home')); ?>">ブログ</a>
                </li>
            </ul>
            <ul class="global-navigation__items">
                <li class="global-navigation__item global-navigation__item--black">
                    <a href="<?php echo esc_url(site_url('/voice')); ?>">お客様の声</a>
                </li>
                <li class="global-navigation__item global-navigation__item--black">
                    <a href="<?php echo esc_url(site_url('/price')); ?>">料金一覧</a>
                    <ul class="global-navigation__sub-items">
                        <li class="global-navigation__sub-item">
                            <a href="<?php echo esc_url(site_url('/price#license-course')); ?>">ライセンス講習</a>
                        </li>
                        <li class="global-navigation__sub-item">
                            <a href="<?php echo esc_url(site_url('/price#trial-diving')); ?>">体験ダイビング</a>
                        </li>
                        <li class="global-navigation__sub-item">
                            <a href="<?php echo esc_url(site_url('/price#fun-diving')); ?>">ファンダイビング</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="global-navigation__items">
                <li class="global-navigation__item global-navigation__item--black">
                    <a href="<?php echo esc_url(site_url('/faq')); ?>">よくある質問</a>
                </li>
                <li class="global-navigation__item global-navigation__item--black">
                    <a href="<?php echo esc_url(site_url('/privacypolicy')); ?>">プライバシー<br class="u-mobile">ポリシー</a>
                </li>
                <li class="global-navigation__item global-navigation__item--black">
                    <a href="<?php echo esc_url(site_url('/terms-of-service')); ?>">利用規約</a>
                </li>
                <li class="global-navigation__item global-navigation__item--black">
                    <a href="<?php echo esc_url(site_url('/contact')); ?>">お問い合わせ</a>
                </li>
                <li class="global-navigation__item global-navigation__item--black">
                    <a href="<?php echo esc_url(site_url('/sitemap')); ?>">サイトマップ</a>
                </li>
            </ul>
        </div>
      </nav>
    </div>
  </section>
  <?php get_footer(); ?>