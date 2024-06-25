<?php get_header(); ?>
<!-- 下層ページのメインビュー -->
<div class="p-sub-mv js-mv-height">
  <div class="p-sub-mv__title">
    <div class="c-section-header--white">
      <h1 class="c-section-header__engtitle">contact</h1>
      <p class="c-section-header__jatitle">お問い合わせ</p>
    </div>
  </div>
</div>

<!-- パンくず -->
<?php get_template_part('parts/breadcrumb') ?>


<div class="l-page-contact p-page-contact">
  <div class="p-page-contact__inner l-inner">
    <p class="p-page-contact__text">Webサイトの制作のご依頼やお見積りなど、<br class="u-mobile">
      お気軽にご相談ください。</p>
    <div class="p-page-contact__content p-form">
      <?php echo do_shortcode('[contact-form-7 id="4a1a63e" title="お問合せ"]'); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>