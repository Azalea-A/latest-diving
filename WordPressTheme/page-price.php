<?php get_header(); ?>

<main class="main sub-top-fish">

  <!-- fv -->
  <div class="sub-fv sub-fv--price">
    <div class="sub-fv__inner">
      <!-- サブページのメインビュー -->
      <h1 class="sub-fv__title">Price</h1>
    </div>
  </div>
  <!-- パンくずリスト -->
  <?php get_template_part('parts/breadcrumb'); ?>
  <!-- 全体のコンテナー -->
  <section class="page-price sub-price">
    <div class="sub-price__inner inner">

      <div class="sub-price__table-container">
        <!-- ライセンス -->
        <div class="sub-price__table-block table-block">
          <?php
          // 現在の投稿のIDを取得
          $post_id = get_the_ID();

          // SCFプラグインを使ってカスタムフィールドの値を取得
          $licence_category = SCF::get('licence_category', $post_id);
          $licence_lists = SCF::get('licence_lists', $post_id);
          ?>


          <h2 class="table-block__heading" id="licence_category">
            <span class="table-block__heading-span table-block__heading-span--line3">
              <?php echo esc_html($licence_category); ?>
            </span>
          </h2>

          <table class="table-block__table">
            <?php
            if (!empty($licence_lists) && is_array($licence_lists)) {
              foreach ($licence_lists as $licence) {
                $licence_course_name = $licence['licence_course_name'];
                $licence_course_price = $licence['licence_course_price'];
            ?>
                <tr>
                  <td class="table-block__table-data"><?php echo esc_html($licence_course_name); ?></td>
                  <td class="table-block__table-data"><?php echo esc_html($licence_course_price); ?></td>
                </tr>
            <?php
              }
            } else {
              echo '<p>No courses found.</p>';
            }
            ?>
          </table>
        </div>
        <!-- 体験ダイビング -->
        <div class="sub-price__table-block table-block">
          <?php
          // 現在の投稿のIDを取得
          $post_id = get_the_ID();
          // SCFプラグインを使ってカスタムフィールドの値を取得
          $trial_diving_category = SCF::get('trial_diving_category', $post_id);
          $trial_diving_lists = SCF::get('trial_diving_lists', $post_id);
          ?>

          <h2 class="table-block__heading" id="trial-diving">
            <span class="table-block__heading-span table-block__heading-span--line3">
              <?php echo esc_html($trial_diving_category); ?>
            </span>
          </h2>

          <table class="table-block__table">
            <?php
            if (!empty($trial_diving_lists) && is_array($trial_diving_lists)) {
              foreach ($trial_diving_lists as $trial_diving) {
                $trial_diving_course_name = $trial_diving['trial_diving_course_name'];
                $trial_diving_course_price = $trial_diving['trial_diving_course_price'];
            ?>
                <tr>
                  <td class="table-block__table-data"><?php echo esc_html($trial_diving_course_name); ?></td>
                  <td class="table-block__table-data"><?php echo esc_html($trial_diving_course_price); ?></td>
                </tr>
            <?php
              }
            } else {
              echo '<p>No courses found.</p>';
            }
            ?>
          </table>
        </div>
        <!-- ファンダイビング -->
        <div class="sub-price__table-block table-block">
          <?php
          // 現在の投稿のIDを取得
          $post_id = get_the_ID();

          // SCFプラグインを使ってカスタムフィールドの値を取得
          $fun_diving_category = SCF::get('fun_diving_category', $post_id);
          $fun_diving_lists = SCF::get('fun_diving_lists', $post_id);
          ?>

          <h2 class="table-block__heading" id="fun-diving">
            <span class="table-block__heading-span table-block__heading-span--line3">
              <?php echo esc_html($fun_diving_category); ?>
            </span>
          </h2>

          <table class="table-block__table">
            <?php
            if (!empty($fun_diving_lists) && is_array($fun_diving_lists)) {
              foreach ($fun_diving_lists as $fun_diving) {
                $fun_diving_course_name = $fun_diving['fun_diving_course_name'];
                $fun_diving_course_price = $fun_diving['fun_diving_course_price'];
            ?>
                <tr>
                  <td class="table-block__table-data"><?php echo esc_html($fun_diving_course_name); ?></td>
                  <td class="table-block__table-data"><?php echo esc_html($fun_diving_course_price); ?></td>
                </tr>
            <?php
              }
            } else {
              echo '<p>No courses found.</p>';
            }
            ?>
          </table>
        </div>
        <!-- スペシャルダイビング -->
        <div class="sub-price__table-block table-block">
          <?php
          // 現在の投稿のIDを取得
          $post_id = get_the_ID();

          // SCFプラグインを使ってカスタムフィールドの値を取得
          $special_diving_category = SCF::get('special_diving_category', $post_id);
          $special_diving_lists = SCF::get('special_diving_lists', $post_id);
          ?>

          <h2 class="table-block__heading">
            <span class="table-block__heading-span table-block__heading-span--line3" id="special-diving-course">
              <?php echo esc_html($special_diving_category); ?>
            </span>
          </h2>

          <table class="table-block__table">
            <?php
            if (!empty($special_diving_lists) && is_array($special_diving_lists)) {
              foreach ($special_diving_lists as $special_diving) {
                $special_diving_course_name = $special_diving['special_diving_course_name'];
                $special_diving_course_price = $special_diving['special_diving_course_price'];
            ?>
                <tr>
                  <td class="table-block__table-data"><?php echo esc_html($special_diving_course_name); ?></td>
                  <td class="table-block__table-data"><?php echo esc_html($special_diving_course_price); ?></td>
                </tr>
            <?php
              }
            } else {
              echo '<p>No courses found.</p>';
            }
            ?>
          </table>
        </div>

      </div>
    </div>
  </section>
  <?php get_footer(); ?>