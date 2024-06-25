<?php get_header(); ?>

<!-- 下層ページのメインビュー -->
<div class="p-sub-mv js-mv-height">
  <div class="p-sub-mv__title">
    <div class="c-section-header--white">
      <h1 class="c-section-header__engtitle">company</h1>
      <p class="c-section-header__jatitle">私たちについて</p>
    </div>
  </div>
</div>

<!-- パンくず -->
<?php get_template_part('parts/breadcrumb') ?>


<section class="p-company p-company--subPage">
  <div class="p-company__inner l-inner">
    <div class="p-company__title c-section-header">
      <h2 class="c-section-header__subpage">メッセージ</h2>
    </div>
    <div class="p-company__contents">
      <h3 class="p-company__subtitle"><span class="p-company__yellow">サイトのゴール =</span><br class="u-mobile"><span class="p-company__yellow">夢を叶えること</span></h3>
      <div class="p-company__content">
        <p class="p-company__text">
          お客様の夢を叶えること。<br>
          それがWebサイトのゴールであり、<br class="u-mobile">
          私たちが目指すことです。<br>
          だからこそちゃんと成果を出すサイトを<br class="u-mobile">
          全力でお作りします。<br>
          お客様の笑顔を見たい。<br>
          夢を実現する手助けをさせてください。
        </p>
      </div>
    </div>
    <div class="p-company__message">
      <div class="p-company__message-image">
        <img src="<?php echo get_theme_file_uri(); ?>/images/common/message.jpg" alt="">
      </div>
      <div class="p-company__message-text">
        <p>テキストが入りますテキストが入りますテキストが入りますテキストが入りますテキストが入りますテキストが入りますテキストが入りますテキストが入りますテキストが入ります</p>
        <p>テキストが入りますテキストが入りますテキストが入りますテキストが入りますテキストが入りますテキストが入りますテキストが入りますテキストが入りますテキストが入りますテキストが入りますテキストが入りますテキストが入りますテキストが入りますテキストが入りますテキストが入りますテキストが入りますテキストが入りますテキストが入ります</p>
        <p>代表取締役社長 HIROKI</p>
      </div>
    </div>
  </div>
</section>
<section class="l-company-info p-company-info">
  <div class="p-compnay-info__inner l-inner">
    <div class="p-company-info__title c-section-header">
      <h2 class="c-section-header__subpage">会社概要</h2>
    </div>
    <dl class="p-company-info__items p-common-lists">
      <div class="p-common-lists__list">
        <dt>社名</dt>
        <dd>合同会社CodeUps</dd>
      </div>
      <div class="p-common-lists__list">
        <dt>設立</dt>
        <dd>合同会社CodeUps</dd>
      </div>
      <div class="p-common-lists__list">
        <dt>代表取締役</dt>
        <dd>合同会社CodeUps</dd>
      </div>
      <div class="p-common-lists__list">
        <dt>資本金</dt>
        <dd>合同会社CodeUps</dd>
      </div>
      <div class="p-common-lists__list">
        <dt>所在地</dt>
        <dd>合同会社CodeUps</dd>
      </div>
    </dl>
    <div class="p-compnay-info__map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26235.941246534418!2d135.48055015181578!3d34.71797434136136!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6000e68d95e3a70b%3A0x1baec822e859c84a!2z5aSn6Ziq6aeF!5e0!3m2!1sja!2sjp!4v1673093614084!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="p-company-info__map-link">
      <a href="https://goo.gl/maps/Z831PEpVbS81vDph8" target="_blank" rel="noopener noreferrer">Google mapで見る</a>
    </div>
  </div>

</section>
<?php get_footer(); ?>