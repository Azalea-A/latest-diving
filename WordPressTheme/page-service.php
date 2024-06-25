<?php get_header(); ?>

  <!-- 下層ページのメインビュー -->
  <div class="p-sub-mv js-mv-height">
    <div class="p-sub-mv__title">
      <div class="c-section-header--white">
        <h1 class="c-section-header__engtitle">service</h1>
        <p class="c-section-header__jatitle">事業内容</p>
      </div>
    </div>
  </div>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb') ?>

  <section class="l-page-service p-page-service">
    <div class="p-page-service__inner l-inner">
      <div class="p-page-service__items">
        <!-- ループ -->
        <div class="p-page-service__item">
          <div class="p-page-service__image">
            <img src="<?php echo get_theme_file_uri(); ?>/images/common/service_1.jpg" alt="Webサイト制作の画像">
          </div>
          <div class="p-page-service__text-block">
            <h2 class="p-page-service__title">Webサイト制作</h2>
            <p class="p-page-service__text">新規サイトはもちろん、サイトリニューアルやランディングページ制作も承っております。<br>
          サイトのゴールはお客様の夢や目的を実現することです。そのためにまずはしっかりとお話をうかがい、サイトに必要な要素を洗い出します。その後、ワイヤーフレーム（サイトのレイアウト）の作成、デザインの制作、コーディングと進みます。制作の過程でお客様とのお打ち合わせを数回実施させていただき、ご要望とご意見を反映しながらサイトを制作していきます。</p>
          </div>
        </div>
        <div class="p-page-service__item">
          <div class="p-page-service__image">
            <img src="<?php echo get_theme_file_uri(); ?>/images/common/service_2.jpg" alt="Webサイト運用の画像">
          </div>
          <div class="p-page-service__text-block">
            <h2 class="p-page-service__title">Webサイト運用</h2>
            <p class="p-page-service__text">サイトの更新作業や独自のアクセス解析に基づいたサイト改善のご提案が可能です。<br>
          日々の面倒な更新作業は私たちにおまかせください。テキストの修正やリンクの張り替えなどの簡単な作業から、特集ページやバナーのデザインまで可能です。<br>
          また、アクセス解析によるサイト改善も承っております。ご購入やお申込数などにお悩みでしたらぜひご相談ください。サイトの課題を発見し、改善案のご提案から実装までワンストップで対応いたします。</p>
          </div>
        </div>
        <div class="p-page-service__item">
          <div class="p-page-service__image">
            <img src="<?php echo get_theme_file_uri(); ?>/images/common/service_3.jpg" alt="アプリ開発の画像">
          </div>
          <div class="p-page-service__text-block">
            <h2 class="p-page-service__title">アプリ開発</h2>
            <p class="p-page-service__text">スマートフォンアプリ開発の他、Vue.jsやReactによるWebアプリの開発が可能です。開発力のみならず、充実したユーザー体験をもたらすためのUXデザインにも自信があります。作って終わり、ではなくユーザーに愛されるUI（ユーザーインターフェース）を実現し、アプリ開発によるお客様の事業の目的を達成する推進力となることを目指します。</p>
          </div>
        </div>
      </div>

    </div>
  </section>
<?php get_footer(); ?>