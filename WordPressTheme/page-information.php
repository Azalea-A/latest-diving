<?php get_header(); ?>

<main class="main sub-top-fish">
  <!-- fv -->
  <div class="sub-fv sub-fv--information">
    <div class="sub-fv__inner">
      <!-- サブページのメインビュー -->
      <h1 class="sub-fv__title">Information</h1>
    </div>
  </div>
  <!-- パンくずリスト -->
  <?php get_template_part('parts/breadcrumb'); ?>
  <!-- 全体のコンテナー -->
  <section class="page-information sub-information">
    <div class="sub-information__sub-page-inner inner">
      <div class="sub-information__tab-container">
        <div class="sub-information__tab information-tab">
          <!-- タブのボタン -->
          <ul class="information-tab__lists">
            <li class="information-tab__list">
              <a class="information-tab__link js-information-tab-link is-active"><span class="information-tab__link-span">ライセンス<br class="u-mobile">講習</span></a>
            </li>
            <li class="information-tab__list">
              <a class="information-tab__link js-information-tab-link"><span class="information-tab__link-span">ファン<br class="u-mobile">ダイビング</span></a>
            </li>
            <li class="information-tab__list">
              <a class="information-tab__link js-information-tab-link"><span class="information-tab__link-span">体験<br class="u-mobile">ダイビング</span></a>
            </li>
          </ul>
          <!-- タブの中身 -->
          <div class="information-tab__contents">
            <!-- タブ１ -->
            <div class="information-tab__content js-information-tab-content is-active">
              <div class="information-tab__content-inner">
                <div class="information-tab__body">
                  <h2 class="information-tab__heading">ライセンス講習</h2>
                  <p class="information-tab__text">泳げない人も、ちょっと水が苦手な人も、ダイビングを「安全に」楽しんでいただけるよう、スタッフがサポートいたします！スキューバダイビングを楽しむためには最低限の知識とスキルが要求されます。知識やスキルと言ってもそんなに難しい事ではなく、安全に楽しむ事を目的としたものです。プロダイバーの指導のもと知識とスキルを習得しCカードを取得して、ダイバーになろう！</p>
                </div>
                <div class="information-tab__image">
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/info-license.jpg" alt="ライセンス講習のイメージ" class="information-tab__img">
                </div>
              </div>
            </div>
            <!-- タブ２ -->
            <div class="information-tab__content js-information-tab-content">
              <div class="information-tab__content-inner">
                <div class="information-tab__body">
                  <h2 class="information-tab__heading">ファンダイビング</h2>
                  <p class="information-tab__text">ブランクダイバー、ライセンスを取り立ての方も安心！沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意！</p>
                </div>
                <div class="information-tab__image">
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/info-fundiving.jpg" alt="ファンダイビングのイメージ" class="information-tab__img">
                </div>
              </div>
            </div>
            <!-- タブ3 -->
            <div class="information-tab__content js-information-tab-content">
              <div class="information-tab__content-inner">
                <div class="information-tab__body">
                  <h2 class="information-tab__heading">体験ダイビング</h2>
                  <p class="information-tab__text">ブランクダイバー、ライセンスを取り立ての方も安心！沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意！</p>
                </div>
                <div class="information-tab__image">
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/info-trial-diving.jpg" alt="体験ダイビングのイメージ" class="information-tab__img">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php get_footer(); ?>