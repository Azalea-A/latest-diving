<?php get_header(); ?>

<main class="main sub-top-fish">
  <!-- fv -->
  <div class="sub-fv sub-fv--faq">
    <div class="sub-fv__inner">
      <!-- サブページのメインビュー -->
      <h1 class="sub-fv__title sub-fv__title--upper-case">faq</h1>
    </div>
  </div>
  <!-- パンくずリスト -->
  <?php get_template_part('parts/breadcrumb'); ?>
  <!-- 全体のコンテナー -->
  <section class="page-faq sub-faq">
    <div class="sub-faq__inner inner">
      <div class="sub-faq__accordion accordion js-accordion">
        <div class="accordion__items">
            <?php
            // 現在の投稿のIDを取得
            $post_id = get_the_ID();
            // SCFプラグインを使ってカスタムフィールドグループを取得
            $faq_qa_group = SCF::get('faq_qa', $post_id);
            if (!empty($faq_qa_group)) :
                foreach ($faq_qa_group as $faq_qa) :
                    $faq_question = $faq_qa['faq_question'];
                    $faq_answer = $faq_qa['faq_answer'];
                    // 質問と回答が両方存在する場合のみ表示
                    if (!empty($faq_question) && !empty($faq_answer)) :
            ?>
            <div class="accordion__item js-accordion__item">
                <h2 class="accordion__title js-accordion__title is-open">
                    <?php echo esc_html($faq_question); ?>
                </h2>
                <div class="accordion__content js-accordion__content">
                    <p class="accordion__text">
                        <?php echo nl2br(esc_html($faq_answer)); ?>
                    </p>
                </div>
            </div>
            <?php
                    endif;
                  endforeach;
            else :
                echo '<p>No FAQ items found.</p>';
            endif;
            ?>
        </div>
      </div>
    </div>
  </section>
  <?php get_footer(); ?>