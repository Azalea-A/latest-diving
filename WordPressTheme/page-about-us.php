<?php get_header(); ?>
<main class="main sub-top-fish">
  <!-- fv -->
  <div class="sub-fv sub-fv--aboutus">
    <div class="sub-fv__inner">
      <!-- サブページのメインビュー -->
      <h1 class="sub-fv__title">About us</h1>
    </div>
  </div>
  <!-- パンくずリスト -->
  <?php get_template_part('parts/breadcrumb'); ?>
  <!-- 全体のコンテナー -->
  <section class="page-aboutus sub-aboutus-top">
    <div class="sub-aboutus-top__inner inner">
      <div class="sub-aboutus-top__container">
        <div class="sub-aboutus-top__img-wrapper">
          <div class="sub-aboutus-top__img01 u-desktop">
            <figure>
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/about_us-top01.jpg" alt="屋根の上のシーサーと青空の写真" loading="lazy" decoding="async">
            </figure>
          </div>
          <div class="sub-aboutus-top__img02">
            <figure>
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/about_us-top02.jpg" alt="2匹の黄色と黒の魚が水色の海の中で泳いでいる写真" loading="lazy" decoding="async">
            </figure>
          </div>
        </div>
        <div class="sub-aboutus-top__body">
          <div class="sub-aboutus-top__heading-wrapper">
            <h2 class="sub-aboutus-top__heading">Dive into<br>the Ocean</h2>
          </div>
          <div class="sub-aboutus-top__content-wrapper">
            <p class="sub-aboutus-top__text">ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="page-aboutus-gallery sub-aboutus-gallery">
    <div class="sub-aboutus-gallery__inner inner">
      <div class="sub-aboutus-gallery__section-title section-title">
        <p class="section-title__english section-title__english">Gallery</p>
        <h2 class="section-title__japanese section-title__japanese">フォト</h2>
      </div>
      <div class="sub-aboutus-gallery__gallery-grid gallery-grid">
        <!-- モーダル -->
        <div class="gallery-grid__modal js-modal"></div>
        <!-- ここからSCF使ったギャラリー -->
        <?php
        // 現在の投稿のIDを取得
        $post_id = get_the_ID();

        // SCFからギャラリー画像を取得
        $gallery_images = SCF::get('gallery_images', $post_id);

        if (is_array($gallery_images) && !empty($gallery_images)) {
        ?>
          <div class="gallery-grid__items">
            <?php
            foreach ($gallery_images as $gallery_image) {
              // 各ギャラリーアイテムの画像IDを取得
              $image_id = $gallery_image['gallery_img'];
              // 画像IDが正しいかどうか確認
              if (is_numeric($image_id)) {
                // ここでギャラリー画像のURLを取得
                $image_url = wp_get_attachment_image_src($image_id, 'full')[0];
                if (!empty($image_url)) {
            ?>
                  <div class="gallery-grid__item js-modal-img">
                    <img src="<?php echo esc_url($image_url); ?>" alt="">
                  </div>
            <?php
                }
              }
            }
            ?>
          </div><!-- gallery-grid__items -->
        <?php
        } else {
          echo '<p>No gallery images found.</p>';
        }
        ?>


      </div><!-- gallery-grid -->
    </div><!-- inner -->
  </section>
  <?php get_footer(); ?>