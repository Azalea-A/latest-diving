<?php get_header(); ?>

<div class="not-found ">
  <!-- パンくずリスト -->
  <?php get_template_part('parts/breadcrumb'); ?>
  <div class="not-found__inner inner inner--not-found">
    <div class="not-found__content-wrapper">
      <h1 class="not-found__heading">404</h1>
      <p class="not-found__text">申し訳ありません。<br>お探しのページが見つかりません。</p>
      <div class="not-found__button-wrapper">
        <a href="<?php echo home_url(); ?>" class="button button--white">
          <span class="button__span">Page <span class="button__span--uppercase">TOP</span></span>
        </a>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>