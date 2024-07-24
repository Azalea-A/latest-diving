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
        <!-- ライセンスセクション -->
        <?php
        $licence_category = SCF::get('licence_category'); // カテゴリを取得
        $licence = SCF::get('licence_lists'); // ライセンスリストを取得

        if ($licence && is_array($licence)) : // 配列であることを確認
            // 有効なエントリをフィルタリング
            $valid_entries = array_filter($licence, function($licence_item) {
                return !empty($licence_item['licence_course_name']) && !empty($licence_item['licence_course_price']);
            });
            // 有効なエントリが存在する場合のみ表示
            if (!empty($valid_entries)) :
        ?>
            <div class="sub-price__table-block table-block">
                <h2 class="table-block__heading" id="licence_category">
                    <span class="table-block__heading-span table-block__heading-span--line3">
                        <?php echo esc_html($licence_category); ?>
                    </span>
                </h2>
                <table class="table-block__table">
                    <?php foreach ($valid_entries as $licence_item) : ?>
                        <tr>
                            <td class="table-block__table-data"><?php echo esc_html($licence_item['licence_course_name']); ?></td>
                            <td class="table-block__table-data"><?php echo esc_html($licence_item['licence_course_price']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        <?php
            endif;
        endif;
        ?>
        <!-- 体験ダイビングセクション -->
        <?php
        $trial_diving_category = SCF::get('trial_diving_category'); // カテゴリを取得
        $trial_diving = SCF::get('trial_diving_lists'); // 体験ダイビングリストを取得

        if ($trial_diving && is_array($trial_diving)) : // 配列であることを確認
            // 有効なエントリをフィルタリング
            $valid_entries = array_filter($trial_diving, function($trial_diving_item) {
                return !empty($trial_diving_item['trial_diving_course_name']) && !empty($trial_diving_item['trial_diving_course_price']);
            });
            // 有効なエントリが存在する場合のみ表示
            if (!empty($valid_entries)) :
        ?>
            <div class="sub-price__table-block table-block">
                <h2 class="table-block__heading" id="trial-diving">
                    <span class="table-block__heading-span table-block__heading-span--line3">
                        <?php echo esc_html($trial_diving_category); ?>
                    </span>
                </h2>
                <table class="table-block__table">
                    <?php foreach ($valid_entries as $trial_diving_item) : ?>
                        <tr>
                            <td class="table-block__table-data"><?php echo esc_html($trial_diving_item['trial_diving_course_name']); ?></td>
                            <td class="table-block__table-data"><?php echo esc_html($trial_diving_item['trial_diving_course_price']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        <?php
            endif;
        endif;
        ?>
        <!-- ファンダイビングセクション -->
        <?php
        $fun_diving_category = SCF::get('fun_diving_category'); // カテゴリを取得
        $fun_diving = SCF::get('fun_diving_lists'); // ファンダイビングリストを取得

        if ($fun_diving && is_array($fun_diving)) : // 配列であることを確認
            // 有効なエントリをフィルタリング
            $valid_entries = array_filter($fun_diving, function($fun_diving_item) {
                return !empty($fun_diving_item['fun_diving_course_name']) && !empty($fun_diving_item['fun_diving_course_price']);
            });
            // 有効なエントリが存在する場合のみ表示
            if (!empty($valid_entries)) :
        ?>
            <div class="sub-price__table-block table-block">
                <h2 class="table-block__heading" id="fun-diving">
                    <span class="table-block__heading-span table-block__heading-span--line3">
                        <?php echo esc_html($fun_diving_category); ?>
                    </span>
                </h2>
                <table class="table-block__table">
                    <?php foreach ($valid_entries as $fun_diving_item) : ?>
                        <tr>
                            <td class="table-block__table-data"><?php echo esc_html($fun_diving_item['fun_diving_course_name']); ?></td>
                            <td class="table-block__table-data"><?php echo esc_html($fun_diving_item['fun_diving_course_price']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        <?php
            endif;
        endif;
        ?>
        <!-- スペシャルダイビングセクション -->
        <?php
        $special_diving_category = SCF::get('special_diving_category'); // カテゴリを取得
        $special_diving = SCF::get('special_diving_lists'); // スペシャルダイビングリストを取得

        if ($special_diving && is_array($special_diving)) : // 配列であることを確認
            // 有効なエントリをフィルタリング
            $valid_entries = array_filter($special_diving, function($special_diving_item) {
                return !empty($special_diving_item['special_diving_course_name']) && !empty($special_diving_item['special_diving_course_price']);
            });
            // 有効なエントリが存在する場合のみ表示
            if (!empty($valid_entries)) :
        ?>
            <div class="sub-price__table-block table-block">
                <h2 class="table-block__heading" id="special-diving-course">
                    <span class="table-block__heading-span table-block__heading-span--line3">
                        <?php echo esc_html($special_diving_category); ?>
                    </span>
                </h2>
                <table class="table-block__table">
                    <?php foreach ($valid_entries as $special_diving_item) : ?>
                        <tr>
                            <td class="table-block__table-data"><?php echo esc_html($special_diving_item['special_diving_course_name']); ?></td>
                            <td class="table-block__table-data"><?php echo esc_html($special_diving_item['special_diving_course_price']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        <?php
            endif;
        endif;
        ?>
        </div><!-- sub-price__table-container -->
    </div>
  </section>
  <?php get_footer(); ?>