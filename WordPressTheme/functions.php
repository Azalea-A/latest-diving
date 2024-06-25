<?php
// メタ情報とOGP情報を追加
function add_meta_and_ogp_tags()
{
  echo '
  <!-- meta情報 -->
  <title>CodeUps</title>
  <meta name="description" content="Dive into the Ocean" />
  <meta name="keywords" content="codeups, ダイビング, ライセンス" />
  <!-- ogp -->
  <meta property="og:title" content="" />
  <meta property="og:type" content="" />
  <meta property="og:url" content="" />
  <meta property="og:image" content="" />
  <meta property="og:site_name" content="" />
  <meta property="og:description" content="" />
  <!-- ファビコン -->
  <link rel="icon" href="#" />
  <!-- google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Gotu&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Noto+Sans+JP:wght@100..900&family=Noto+Serif+JP&display=swap" rel="stylesheet">
  ';
}
add_action('wp_head', 'add_meta_and_ogp_tags');

// Google Fontsを追加
function add_google_fonts()
{
  wp_enqueue_style(
    'google-fonts',
    'https://fonts.googleapis.com/css2?family=Gotu&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Noto+Sans+JP:wght@100..900&family=Noto+Serif+JP&display=swap',
    array(),
    null
  );
}

// SwiperのCSSを追加
function add_swiper_styles()
{
  wp_enqueue_style(
    'swiper',
    'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css',
    array(),
    null
  );
}

// テーマのメインCSSを追加
function add_theme_styles()
{
  wp_enqueue_style(
    'theme-style',
    get_theme_file_uri('/assets/css/style.css'),
    array(),
    null
  );
}

// jQueryを追加
function add_jquery()
{
  wp_enqueue_script(
    'jquery',
    'https://code.jquery.com/jquery-3.6.0.js',
    array(),
    null,
    true // deferの代わりにフッターに読み込む
  );
}

// SwiperのJavaScriptを追加
function add_swiper_script()
{
  wp_enqueue_script(
    'swiper',
    'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js',
    array(),
    null,
    true
  );
}

// InviewのJavaScriptとテーマのメインJavaScriptを追加
function add_theme_scripts()
{
  wp_enqueue_script(
    'jquery-inview',
    get_theme_file_uri('/assets/js/jquery.inview.min.js'),
    array('jquery'),
    null,
    true
  );

  // wp_enqueue_script(
  //   'theme-script',
  //   get_theme_file_uri('/assets/js/script.js'),
  //   array('jquery', 'jquery-inview', 'swiper'),
  //   null,
  //   true
  // );
}

// 管理画面用スクリプトの読み込み
function enqueue_admin_scripts()
{
  wp_enqueue_script(
    'restrict-taxonomy',
    get_template_directory_uri() . '/assets/js/restrict-taxonomy.js',
    array('jquery'),
    null,
    true
  );
}

// ヴィジットの人気投稿の数字のスタイル用
function enqueue_custom_scripts()
{
  wp_enqueue_script('custom-date-format', get_template_directory_uri() . '/assets/js/script.js', array(), null, true);
}

// 全てのスタイルとスクリプトを追加する関数
function add_all_theme_assets()
{
  add_google_fonts();
  add_swiper_styles();
  add_theme_styles();
  add_jquery();
  add_swiper_script();
  add_theme_scripts();
  enqueue_custom_scripts(); // 人気投稿のスタイル用スクリプトを追加
}

// フックを使ってテーマのスタイルとスクリプトを読み込む
add_action('wp_enqueue_scripts', 'add_all_theme_assets');
add_action('admin_enqueue_scripts', 'enqueue_admin_scripts');



/* ========================================
  //アイキャッチ
  ======================================== */
function my_setup()
{
  add_theme_support('post-thumbnails'); /* アイキャッチ */
  add_theme_support('automatic-feed-links'); /* RSSフィード */
  add_theme_support('title-tag'); /* タイトルタグ自動生成 */
  add_theme_support(
    'html5',
    array( /* HTML5のタグで出力 */
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    )
  );
}
add_action('after_setup_theme', 'my_setup');

/* ========================================
    voice page のメインループのための投稿の設定
  ======================================== */
//archive-voice.php
function modify_voice_archive_query($query)
{
  if (is_post_type_archive('voice') && !is_admin() && $query->is_main_query()) {
    $query->set('posts_per_page', 6);
  }
}
add_action('pre_get_posts', 'modify_voice_archive_query');


//taxonomy-voice_category.php
function modify_voice_category_query($query)
{
  if (is_tax('voice_category') && !is_admin() && $query->is_main_query()) {
    $query->set('posts_per_page', 6);
  }
}
add_action('pre_get_posts', 'modify_voice_category_query');

/* ========================================
    campaign page のメインループのための投稿の設定
  ======================================== */

//archive-campaign.php
function modify_campaign_archive_query($query)
{
  if (is_post_type_archive('campaign') && !is_admin() && $query->is_main_query()) {
    $query->set('posts_per_page', 4);
  }
}
add_action('pre_get_posts', 'modify_campaign_archive_query');

//taxonomy-campaign_category.php
function modify_campaign_category_query($query)
{
  if (is_tax('campaign_category') && !is_admin() && $query->is_main_query()) {
    $query->set('posts_per_page', 4);
  }
}
add_action('pre_get_posts', 'modify_campaign_category_query');


/* ========================================
  カスタムタクソノミーのターム選択を1項目に制限
  ======================================== */
function restrict_taxonomy_terms($terms, $taxonomy, $object_id)
{
  // 制限したいタクソノミーのスラッグを配列で指定
  $restricted_taxonomies = array('voice_category', 'campaign_category');

  if (in_array($taxonomy, $restricted_taxonomies) && count($terms) > 1) {
    return new WP_Error('too_many_terms', '1つのタームしか選択できません。');
  }

  return $terms;
}
add_filter('wp_set_object_terms', 'restrict_taxonomy_terms', 10, 3);

function restrict_taxonomy_terms_error_handler($location)
{
  if (isset($_REQUEST['taxonomy'])) {
    $taxonomy = $_REQUEST['taxonomy'];
    $restricted_taxonomies = array('voice_category', 'campaign_category');
    if (in_array($taxonomy, $restricted_taxonomies)) {
      $terms = isset($_REQUEST['tax_input'][$taxonomy]) ? (array)$_REQUEST['tax_input'][$taxonomy] : array();
      if (count($terms) > 1) {
        $location = add_query_arg('too_many_terms', '1', $location);
      }
    }
  }
  return $location;
}
add_filter('redirect_post_location', 'restrict_taxonomy_terms_error_handler');

function display_too_many_terms_error()
{
  if (isset($_GET['too_many_terms'])) {
    echo '<div class="error"><p>1つのタームしか選択できません。</p></div>';
  }
}
add_action('admin_notices', 'display_too_many_terms_error');


/* ========================================
  ヴィジットの設定
  ======================================== */

function my_widget_init()
{
  register_sidebar(array(
    'name'  => 'サイドバーの設定',
    'id'    => 'sidebar',
    'before_widget' => '<section class="aside__popular-articles-wrap">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="aside__heading"><span class="aside__heading-span">',
    'after_title'   => '</span></h2>',
  ));
}
add_action('widgets_init', 'my_widget_init');

/* ========================================
   ウィジットに人気投稿を追加
  ======================================== */
// ビュー数をカウントするカスタムフィールドを追加
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

// 投稿が表示されたときにビュー数を更新
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

//ここまでビュー数を追跡する
//ここから人気投稿を表示するウィジェットを作成
// カスタムウィジェットを作成
class Popular_Posts_Widget extends WP_Widget
{
  public function __construct()
  {
    parent::__construct(
      'popular_posts_widget', // ウィジェットID
      __('Popular Posts', 'text_domain'), // ウィジェット名
      array('description' => __('Displays the popular posts.', 'text_domain')) // ウィジェットの説明
    );
  }

  public function widget($args, $instance)
  {
    echo $args['before_widget'];
    if (!empty($instance['title'])) {
      echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
    }

    // 人気の3件の投稿を取得
    $popular_posts = new WP_Query(array(
      'posts_per_page' => 3,
      'meta_key' => 'post_views_count',
      'orderby' => 'meta_value_num',
      'order' => 'DESC',
      'post_status' => 'publish'
    ));

    if ($popular_posts->have_posts()) {
      echo '<ul class="aside-popular-article__items">';
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
      echo '</ul>';
      wp_reset_postdata();
    }

    echo $args['after_widget'];
  }

  public function form($instance)
  {
    $title = !empty($instance['title']) ? $instance['title'] : __('Popular Posts', 'text_domain');
    ?>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:', 'text_domain'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
    </p>
    <?php
  }

  public function update($new_instance, $old_instance)
  {
    $instance = array();
    $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
    return $instance;
  }
}

// ウィジェットを登録
function register_popular_posts_widget()
{
  register_widget('Popular_Posts_Widget');
}
add_action('widgets_init', 'register_popular_posts_widget');


/* ========================================
voiceの最新投稿を出したい
カスタム投稿タイプ 'voice' から最新の投稿を表示するカスタムウィジェットを作成
  ======================================== */
// カスタムウィジェットを作成
class Latest_Voice_Post_Widget extends WP_Widget
{
  // ウィジェットの初期化
  function __construct()
  {
    parent::__construct(
      'latest_voice_post_widget', // Base ID
      'Latest Voice Post', // ウィジェット名
      array('description' => 'Displays the latest post from the Voice custom post type') // ウィジェットの説明
    );
  }

  // フロントエンドの表示
  public function widget($args, $instance)
  {
    echo $args['before_widget'];

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
        <section class="aside__voice-wrap">
          <h2 class="aside__heading"><span class="aside__heading-span">口コミ</span></h2>
          <div class="aside__voice-content aside-voice">
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
          </div>
        </section>
    <?php
      }
      wp_reset_postdata();
    } else {
      echo '<p>No voice posts found.</p>';
    }

    echo $args['after_widget'];
  }

  // ウィジェットの設定フォーム
  public function form($instance)
  {
    $title = !empty($instance['title']) ? $instance['title'] : 'Latest Voice Post';
    ?>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">Title:</label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
    </p>
    <?php
  }

  // ウィジェットの設定を保存
  public function update($new_instance, $old_instance)
  {
    $instance = array();
    $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
    return $instance;
  }
}

// カスタムウィジェットを登録
function register_latest_voice_post_widget()
{
  register_widget('Latest_Voice_Post_Widget');
}
add_action('widgets_init', 'register_latest_voice_post_widget');


/* ========================================
  キャンペーンの最新投稿2件を表示する
  カスタム投稿タイプ 'campaign' から最新の投稿を表示するカスタムウィジェットを作成
  ======================================== */
// カスタムウィジェットを作成
class Latest_Campaign_Posts_Widget extends WP_Widget
{
  // ウィジェットの初期化
  function __construct()
  {
    parent::__construct(
      'latest_campaign_posts_widget', // Base ID
      'Latest Campaign Posts', // ウィジェット名
      array('description' => 'Displays the latest two posts from the Campaign custom post type') // ウィジェットの説明
    );
  }

  // フロントエンドの表示
  public function widget($args, $instance)
  {
    echo $args['before_widget'];

    // 最新のカスタム投稿タイプ 'campaign' を取得
    $latest_campaign_posts = new WP_Query(array(
      'post_type' => 'campaign',
      'posts_per_page' => 2, // 表示する記事の数
      'post_status' => 'publish' // 公開済みの記事のみ
    ));

    if ($latest_campaign_posts->have_posts()) {
    ?>
      <section class="aside__campaign-wrap">
        <h2 class="aside__heading"><span class="aside__heading-span">キャンペーン</span></h2>
        <div class="aside__campaign-content aside-campaign">
          <ul class="aside-campaign__items">
            <?php
            while ($latest_campaign_posts->have_posts()) {
              $latest_campaign_posts->the_post();
            ?>
              <li class="aside-campaign__item">
                <div class="aside-campaign__sub-campaign-card sub-campaign-card sub-campaign-card--aside">
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
                </div>
              </li>
            <?php
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
    <?php
      wp_reset_postdata();
    } else {
      echo '<p>No campaign posts found.</p>';
    }

    echo $args['after_widget'];
  }

  // ウィジェットの設定フォーム
  public function form($instance)
  {
    $title = !empty($instance['title']) ? $instance['title'] : 'Latest Campaign Posts';
    ?>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">Title:</label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
    </p>
  <?php
  }

  // ウィジェットの設定を保存
  public function update($new_instance, $old_instance)
  {
    $instance = array();
    $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
    return $instance;
  }
}

// カスタムウィジェットを登録
function register_latest_campaign_posts_widget()
{
  register_widget('Latest_Campaign_Posts_Widget');
}
add_action('widgets_init', 'register_latest_campaign_posts_widget');

/* ========================================
  投稿タイプ(デフォルト)年月アーカイブ
  ======================================= */
// カスタムウィジェットを作成
class Monthly_Archive_Widget extends WP_Widget
{
  // ウィジェットの初期化
  function __construct()
  {
    parent::__construct(
      'monthly_archive_widget', // Base ID
      'Monthly Archive', // ウィジェット名
      array('description' => 'Displays monthly archive links') // ウィジェットの説明
    );
  }

  // フロントエンドの表示
  public function widget($args, $instance)
  {
    // 年月別アーカイブを取得して表示
    global $wpdb;

    $years = $wpdb->get_results("
          SELECT DISTINCT YEAR(post_date) AS year, MONTH(post_date) AS month
          FROM $wpdb->posts
          WHERE post_status = 'publish' AND post_type = 'post'
          ORDER BY post_date DESC
      ");

    if ($years) {
      echo '<section class="aside__archive-wrap">
                  <h2 class="aside__heading"><span class="aside__heading-span">アーカイブ</span></h2>
                  <div class="aside__archive aside-archive js-aside-archive">
                    <ul class="aside-archive__container">';

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

      echo '</ul></li>
                </ul>
                </div>
                </section>';
    }

    echo $args['after_widget'];
  }

  // ウィジェットの設定フォーム
  public function form($instance)
  {
    $title = !empty($instance['title']) ? $instance['title'] : 'Monthly Archive';
  ?>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">Title:</label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
    </p>
  <?php
  }

  // ウィジェットの設定を保存
  public function update($new_instance, $old_instance)
  {
    $instance = array();
    $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
    return $instance;
  }
}

// カスタムウィジェットを登録
function register_monthly_archive_widget()
{
  register_widget('Monthly_Archive_Widget');
}
add_action('widgets_init', 'register_monthly_archive_widget');


/* ========================================
  SCFを使うためになくてもいいらしいが一応チャッピーに追加してと言われたこと
  ======================================== */
if (!function_exists('scf')) {
  function scf($field_name, $post_id = null)
  {
    return Smart_Custom_Fields::get($field_name, $post_id);
  }
}

/* ========================================
   フォーム送信後にthanksにリダイレクト先を設定
  ======================================== */
function custom_redirect_after_submission()
{
  ?>
  <script type="text/javascript">
    document.addEventListener('wpcf7mailsent', function(event) {
      location = '/contact/thanks';
    }, false);
  </script>
<?php
}
add_action('wp_footer', 'custom_redirect_after_submission');


/* ========================================
  メニューの設定 //header
  ======================================== */
class Custom_Walker_Nav_Menu extends Walker_Nav_Menu
{
  // Starts the element output.
  public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
  {
    $classes = empty($item->classes) ? array() : (array) $item->classes;
    $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
    $class_names = $class_names ? ' class="header-nav__item ' . esc_attr($class_names) . '"' : ' class="header-nav__item"';

    $output .= '<li' . $class_names . '>';

    $attributes  = !empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) . '"' : '';
    $attributes .= !empty($item->target)     ? ' target="' . esc_attr($item->target) . '"' : '';
    $attributes .= !empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn) . '"' : '';
    $attributes .= !empty($item->url)        ? ' href="'   . esc_attr($item->url) . '"' : '';

    $title = apply_filters('the_title', $item->title, $item->ID);

    // Wrap the title in a span tag for styling
    $item_output = $args->before;
    $item_output .= '<a' . $attributes . '>';
    $item_output .= $args->link_before . $title . '<span>' . $item->description . '</span>' . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }
}

function register_my_menus()
{
  register_nav_menus(
    array(
      'header-menu' => __('Header Menu'),
      'global-nav' => __('Global Navigation')
    )
  );
}
add_action('init', 'register_my_menus');


/* ========================================
  メニューの設定 //global navigation
  footer
  カスタムウォーカークラス
  ======================================== */
class Custom_Footer_Walker_Nav_Menu extends Walker_Nav_Menu
{
  // Start Level
  public function start_lvl(&$output, $depth = 0, $args = null)
  {
    $indent = str_repeat("\t", $depth);
    $submenu = ($depth == 0) ? 'global-navigation__sub-items' : 'sub-menu';
    $output .= "\n$indent<ul class=\"$submenu depth_$depth\">\n";
  }

  // Start Element
  public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
  {
    $indent = ($depth) ? str_repeat("\t", $depth) : '';
    $li_attributes = '';
    $class_names = $value = '';

    $classes = empty($item->classes) ? array() : (array) $item->classes;
    $classes[] = ($args->walker->has_children) ? 'global-navigation__item--has-children' : '';
    $classes[] = 'global-navigation__item';

    $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
    $class_names = ' class="' . esc_attr($class_names) . '"';

    $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
    $id = $id ? ' id="' . esc_attr($id) . '"' : '';

    $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

    $attributes  = !empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) . '"' : '';
    $attributes .= !empty($item->target)     ? ' target="' . esc_attr($item->target) . '"' : '';
    $attributes .= !empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn) . '"' : '';
    $attributes .= !empty($item->url)        ? ' href="'   . esc_attr($item->url) . '"' : '';

    $item_output = $args->before;
    $item_output .= '<a' . $attributes . '>';
    $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }
}

/* ========================================
    管理画面で、「投稿」を「ブログ」に変更
  ======================================== */
// 投稿メニューのラベルを変更
function change_post_menu_label()
{
  global $menu;
  global $submenu;
  $menu[5][0] = 'ブログ'; // メニュー名を変更
  $submenu['edit.php'][5][0] = 'ブログ一覧'; // サブメニュー「投稿一覧」を変更
  $submenu['edit.php'][10][0] = '新しいブログ'; // サブメニュー「新規追加」を変更
  $submenu['edit.php'][16][0] = 'タグ'; // サブメニュー「タグ」を変更
  echo '';
}
add_action('admin_menu', 'change_post_menu_label');

// 投稿タイプのラベルを変更
function change_post_object_label()
{
  global $wp_post_types;
  $labels = &$wp_post_types['post']->labels;
  $labels->name = 'ブログ';
  $labels->singular_name = 'ブログ';
  $labels->add_new = '新規追加';
  $labels->add_new_item = '新しいブログを追加';
  $labels->edit_item = 'ブログを編集';
  $labels->new_item = '新しいブログ';
  $labels->view_item = 'ブログを見る';
  $labels->search_items = 'ブログを検索';
  $labels->not_found = 'ブログが見つかりません';
  $labels->not_found_in_trash = 'ゴミ箱にブログは見つかりませんでした';
  $labels->all_items = 'すべてのブログ';
  $labels->menu_name = 'ブログ';
  $labels->name_admin_bar = 'ブログ';
}
add_action('init', 'change_post_object_label');
?>