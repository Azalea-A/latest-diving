<?php
// ビュー数をカウントするカスタムフィールドを追加する関数
function set_post_views($postID)
{
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if ($count == '') {
    $count = 0;
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, '0');
  } else {
    $count++;
    update_post_meta($postID, $count_key, $count);
  }
}

// 投稿が表示されたときにビュー数を更新する関数
function track_post_views($post_id)
{
  if (!is_single()) return;
  if (empty($post_id)) {
    global $post;
    $post_id = $post->ID;
  }
  set_post_views($post_id);
}
add_action('wp_head', 'track_post_views');

// ビュー数を取得する関数
function get_post_views($postID)
{
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if ($count == '') {
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, '0');
    return "0 View";
  }
  return $count . ' Views';
}
?>

<!-- <aside class="sub-blog__aside aside"> -->
  <section class="aside__popular-articles-wrap">
    <h2 class="aside__heading"><span class="aside__heading-span">人気記事</span></h2>
    <div class="aside__popular-articles aside-popular-article">
      <ul class="aside-popular-article__items">
        <?php
        // 人気の3件の投稿を取得
        $popular_posts = new WP_Query(array(
          'posts_per_page' => 3,
          'meta_key' => 'post_views_count',
          'orderby' => 'meta_value_num',
          'order' => 'DESC',
          'post_status' => 'publish'
        ));

        if ($popular_posts->have_posts()) {
          while ($popular_posts->have_posts()) : $popular_posts->the_post();
            $post_id = get_the_ID();
            $post_thumbnail = get_the_post_thumbnail_url($post_id, 'thumbnail');
            $post_title = get_the_title();
            $post_url = get_permalink();
            $post_date = get_the_date('Y.m/d');
        ?>
            <li class="aside-popular-article__item">
              <a href="<?php echo esc_url($post_url); ?>" class="aside-popular-article__link">
                <div class="aside-popular-article__image">
                  <?php if ($post_thumbnail) : ?>
                    <img src="<?php echo esc_url($post_thumbnail); ?>" alt="<?php echo esc_attr($post_title); ?>" loading="lazy" decoding="async">
                  <?php else : ?>
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/no_image.jpeg" alt="no_image" loading="lazy" decoding="async">
                  <?php endif; ?>
                </div>
                <div class="aside-popular-article__body">
                  <time class="aside-popular-article__date" datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo $post_date; ?></time>
                  <h3 class="aside-popular-article__title"><?php echo $post_title; ?></h3>
                </div>
              </a>
            </li>
        <?php
          endwhile;
          wp_reset_postdata();
        }
        ?>
      </ul>
    </div>
  </section>

  <section class="aside__voice-wrap">
    <h2 class="aside__heading"><span class="aside__heading-span">口コミ</span></h2>
    <div class="aside__voice-content aside-voice">
      <?php
      // 最新のカスタム投稿タイプ 'voice' を取得
      $latest_voice_post = new WP_Query(array(
        'post_type' => 'voice',
        'posts_per_page' => 1, // 表示する記事の数
        'post_status' => 'publish' // 公開済みの記事のみ
      ));

      if ($latest_voice_post->have_posts()) {
        while ($latest_voice_post->have_posts()) {
          $latest_voice_post->the_post();
      ?>
          <div class="aside-voice__image">
            <?php if (has_post_thumbnail()) {
              the_post_thumbnail('medium', array('alt' => get_the_title(), 'loading' => 'lazy', 'decoding' => 'async'));
            } else { ?>
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/aside-voice.jpg" alt="お客様の写真" loading="lazy" decoding="async">
            <?php } ?>
          </div>
          <div class="aside-voice__body">
            <p class="aside-voice__customer-info"><?php the_field('age') ?>代(<?php the_field('gender') ?>)</p>
            <p class="aside-voice__title"><?php echo esc_html(get_the_title()); ?></p>
            <div class="aside-voice__button-wrapper">
              <a href="<?php echo esc_url(get_post_type_archive_link('voice')); ?>" class="button">
                <span class="button__span">View more</span>
              </a>
            </div>
          </div>
      <?php
        }
        wp_reset_postdata();
      } else {
        echo '<p>No voice posts found.</p>';
      }
      ?>
    </div>
  </section>

  <section class="aside__campaign-wrap">
    <h2 class="aside__heading"><span class="aside__heading-span">キャンペーン</span></h2>
    <div class="aside__campaign-content aside-campaign">
      <ul class="aside-campaign__items">
        <?php
        // 最新のカスタム投稿タイプ 'campaign' を取得
        $latest_campaign_posts = new WP_Query(array(
          'post_type' => 'campaign',
          'posts_per_page' => 2, // 表示する記事の数
          'post_status' => 'publish' // 公開済みの記事のみ
        ));

        if ($latest_campaign_posts->have_posts()) {
          while ($latest_campaign_posts->have_posts()) {
            $latest_campaign_posts->the_post();
        ?>
            <li class="aside-campaign__item">
              <a href="#" class="aside-campaign__sub-campaign-card sub-campaign-card sub-campaign-card--aside">
                <div class="sub-campaign-card__img sub-campaign-card__img--aside">
                  <figure>
                    <?php if (has_post_thumbnail()) {
                      the_post_thumbnail('medium', array('alt' => get_the_title(), 'loading' => 'lazy', 'decoding' => 'async'));
                    } else { ?>
                      <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign01.jpg" alt="<?php echo esc_attr(get_the_title()); ?>" loading="lazy" decoding="async">
                    <?php } ?>
                  </figure>
                </div>
                <div class="sub-campaign-card__body sub-campaign-card__body--aside">
                  <div class="sub-campaign-card__title-wrapper">
                    <h3 class="sub-campaign-card__title sub-campaign-card__title--aside"><?php echo esc_html(get_the_title()); ?></h3>
                  </div>
                  <div class="sub-campaign-card__price-wrapper">
                    <p class="sub-campaign-card__price-text sub-campaign-card__price-text--aside">全部コミコミ(お一人様)</p>
                    <p class="sub-campaign-card__price sub-campaign-card__price--aside">
                      <span class="sub-campaign-card__price-center">
                        <span class="sub-campaign-card__price-before--aside sub-campaign-card__price-before">¥<?php the_field('price_before') ?></span>
                        ¥<?php the_field('special_price') ?>
                      </span>
                    </p>
                  </div>
                </div>
              </a>
            </li>
        <?php
          }
          wp_reset_postdata();
        } else {
          echo '<p>No campaign posts found.</p>';
        }
        ?>
      </ul>
      <div class="aside-campaign__button-wrapper">
        <a href="<?php echo esc_url(get_post_type_archive_link('campaign')); ?>" class="button">
          <span class="button__span">View more</span>
        </a>
      </div>
    </div>
  </section>

  <section class="aside__archive-wrap">
    <h2 class="aside__heading"><span class="aside__heading-span">アーカイブ</span></h2>
    <div class="aside__archive aside-archive js-aside-archive">
      <?php
      global $wpdb;
      $years = $wpdb->get_results("
        SELECT DISTINCT YEAR(post_date) AS year, MONTH(post_date) AS month
        FROM $wpdb->posts
        WHERE post_status = 'publish' AND post_type = 'post'
        ORDER BY post_date DESC
      ");
      if ($years) {
      ?>
        <ul class="aside-archive__container">
          <?php
          $current_year = 0;
          foreach ($years as $year) {
            if ($current_year != $year->year) {
              if ($current_year != 0) {
                echo '</ul></li>';
              }
              $current_year = $year->year;
              echo '<li class="aside-archive__item js-aside-archive__item">
                      <h3 class="aside-archive__year js-aside-archive__year">' . esc_html($year->year) . '</h3>
                      <ul class="aside-archive__content js-aside-archive__content">';
            }
            $month_name = date_i18n('F', mktime(0, 0, 0, $year->month, 10));
            echo '<li class="aside-archive__month">
                    <a href="' . esc_url(get_month_link($year->year, $year->month)) . '">' . esc_html($month_name) . '</a>
                  </li>';
          }
          echo '</ul></li>';
          ?>
        </ul>
      <?php } ?>
    </div>
  </section>
<!-- </aside> -->
