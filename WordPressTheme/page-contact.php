<?php get_header(); ?>
<main class="main sub-top-fish">
  <!-- fv -->
  <div class="sub-fv sub-fv--contact">
    <div class="sub-fv__inner">
      <!-- サブページのメインビュー -->
      <h1 class="sub-fv__title">Contact</h1>
    </div>
  </div>
  <!-- パンくずリスト -->
  <?php get_template_part('parts/breadcrumb'); ?>
  <!-- 全体のコンテナー -->
  <div class="page-contact sub-contact">
    <div class="sub-contact__inner inner">
      <?php echo do_shortcode('[contact-form-7 id="d097d43" title="お問い合わせ"]'); ?>
    </div>
  </div>
</main>
<?php get_footer(); ?>