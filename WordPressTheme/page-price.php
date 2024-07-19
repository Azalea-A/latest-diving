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
        <?php
        // 現在の投稿のIDを取得
        $post_id = get_the_ID();

        // ライセンスセクション
        $licence_category = SCF::get('licence_category', $post_id);
        $licence_lists = SCF::get('licence_lists', $post_id);

        $has_valid_licence = false;
        if (!empty($licence_lists) && is_array($licence_lists)) :
            foreach ($licence_lists as $licence) :
                if (!empty($licence['licence_course_name']) && !empty($licence['licence_course_price'])) :
                    $has_valid_licence = true;
                    break;
                endif;
            endforeach;
        endif;

        if ($has_valid_licence) :
        ?>
            <div class="sub-price__table-block table-block">
                <h2 class="table-block__heading" id="licence_category">
                    <span class="table-block__heading-span table-block__heading-span--line3">
                        <?php echo esc_html($licence_category); ?>
                    </span>
                </h2>
                <table class="table-block__table">
                    <?php
                    foreach ($licence_lists as $licence) :
                        if (!empty($licence['licence_course_name']) && !empty($licence['licence_course_price'])) :
                    ?>
                            <tr>
                                <td class="table-block__table-data"><?php echo esc_html($licence['licence_course_name']); ?></td>
                                <td class="table-block__table-data"><?php echo esc_html($licence['licence_course_price']); ?></td>
                            </tr>
                    <?php
                        endif;
                    endforeach;
                    ?>
                </table>
            </div>
        <?php
        endif;
        // 体験ダイビングセクション
        $trial_diving_category = SCF::get('trial_diving_category', $post_id);
        $trial_diving_lists = SCF::get('trial_diving_lists', $post_id);

        $has_valid_trial_diving = false;
        if (!empty($trial_diving_lists) && is_array($trial_diving_lists)) :
            foreach ($trial_diving_lists as $trial_diving) :
                if (!empty($trial_diving['trial_diving_course_name']) && !empty($trial_diving['trial_diving_course_price'])) :
                    $has_valid_trial_diving = true;
                    break;
                endif;
            endforeach;
        endif;

        if ($has_valid_trial_diving) :
        ?>
            <div class="sub-price__table-block table-block">
                <h2 class="table-block__heading" id="trial-diving">
                    <span class="table-block__heading-span table-block__heading-span--line3">
                        <?php echo esc_html($trial_diving_category); ?>
                    </span>
                </h2>
                <table class="table-block__table">
                    <?php
                    foreach ($trial_diving_lists as $trial_diving) :
                        if (!empty($trial_diving['trial_diving_course_name']) && !empty($trial_diving['trial_diving_course_price'])) :
                    ?>
                            <tr>
                                <td class="table-block__table-data"><?php echo esc_html($trial_diving['trial_diving_course_name']); ?></td>
                                <td class="table-block__table-data"><?php echo esc_html($trial_diving['trial_diving_course_price']); ?></td>
                            </tr>
                    <?php
                        endif;
                    endforeach;
                    ?>
                </table>
            </div>
        <?php
        endif;
        // ファンダイビングセクション
        $fun_diving_category = SCF::get('fun_diving_category', $post_id);
        $fun_diving_lists = SCF::get('fun_diving_lists', $post_id);

        $has_valid_fun_diving = false;
        if (!empty($fun_diving_lists) && is_array($fun_diving_lists)) {
            foreach ($fun_diving_lists as $fun_diving) {
                if (!empty($fun_diving['fun_diving_course_name']) && !empty($fun_diving['fun_diving_course_price'])) {
                    $has_valid_fun_diving = true;
                    break;
                }
            }
        }

        if ($has_valid_fun_diving) :
        ?>
            <div class="sub-price__table-block table-block">
                <h2 class="table-block__heading" id="fun-diving">
                    <span class="table-block__heading-span table-block__heading-span--line3">
                        <?php echo esc_html($fun_diving_category); ?>
                    </span>
                </h2>
                <table class="table-block__table">
                    <?php
                    foreach ($fun_diving_lists as $fun_diving) :
                        if (!empty($fun_diving['fun_diving_course_name']) && !empty($fun_diving['fun_diving_course_price'])) :
                    ?>
                            <tr>
                                <td class="table-block__table-data"><?php echo esc_html($fun_diving['fun_diving_course_name']); ?></td>
                                <td class="table-block__table-data"><?php echo esc_html($fun_diving['fun_diving_course_price']); ?></td>
                            </tr>
                    <?php
                        endif;
                    endforeach;
                    ?>
                </table>
            </div>
        <?php
        endif;

        // スペシャルダイビングセクション
        $special_diving_category = SCF::get('special_diving_category', $post_id);
        $special_diving_lists = SCF::get('special_diving_lists', $post_id);

        $has_valid_special_diving = false;
        if (!empty($special_diving_lists) && is_array($special_diving_lists)) :
            foreach ($special_diving_lists as $special_diving) :
                if (!empty($special_diving['special_diving_course_name']) && !empty($special_diving['special_diving_course_price'])) :
                    $has_valid_special_diving = true;
                    break;
                endif;
            endforeach;
        endif;

        if ($has_valid_special_diving) :
        ?>
            <div class="sub-price__table-block table-block">
                <h2 class="table-block__heading" id="special-diving-course">
                    <span class="table-block__heading-span table-block__heading-span--line3">
                        <?php echo esc_html($special_diving_category); ?>
                    </span>
                </h2>
                <table class="table-block__table">
                    <?php
                    foreach ($special_diving_lists as $special_diving) :
                        if (!empty($special_diving['special_diving_course_name']) && !empty($special_diving['special_diving_course_price'])) :
                    ?>
                            <tr>
                                <td class="table-block__table-data"><?php echo esc_html($special_diving['special_diving_course_name']); ?></td>
                                <td class="table-block__table-data"><?php echo esc_html($special_diving['special_diving_course_price']); ?></td>
                            </tr>
                    <?php
                        endif;
                    endforeach;
                    ?>
                </table>
            </div>
        <?php
        endif;
        ?>
      </div>
    </div>
  </section>
  <?php get_footer(); ?>