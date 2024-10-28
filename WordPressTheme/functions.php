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

  wp_enqueue_script(
    'theme-script',
    get_theme_file_uri('/assets/js/script.js'),
    array('jquery', 'jquery-inview', 'swiper'),
    null,
    true
  );
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

// 全てのスタイルとスクリプトを追加する関数
function add_all_theme_assets()
{
  add_google_fonts();
  add_swiper_styles();
  add_theme_styles();
  add_jquery();
  add_swiper_script();
  add_theme_scripts();
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
      location = '/cu-divingwp/contact/thanks';
    }, false);
  </script>
<?php
}
add_action('wp_footer', 'custom_redirect_after_submission');


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

  /* ========================================
  　管理画面ログイン画面のロゴと背景img
  ======================================== */
  function login_logo() {
    echo '<style type="text/css">
      #login h1 a {
        background: url('.get_template_directory_uri().'/assets/images/common/CodeUps_logo.svg) no-repeat center;
        background-size: contain;
        width: 336px;
        height: 64px;
      }
      body {
        background: url('.get_template_directory_uri().'/assets/images/common/top-fv01.jpg) no-repeat center;
        background-size: cover;
      }
    </style>';
  }
  add_action('login_head', 'login_logo');

  /* ========================================
ダッシュボードトップに投稿へのショートカットを設定
======================================== */
function add_dashboard_widgets() {
  wp_add_dashboard_widget(
      'quick_action_dashboard_widget', // ウィジェットのスラッグ名
      'クイックアクション', // ウィジェットに表示するタイトル
      'dashboard_widget_function' // 実行する関数
  );
}
add_action('wp_dashboard_setup', 'add_dashboard_widgets');

// ここからクイックアクションの中身
function dashboard_widget_function() {
  // 固定ページのスラッグからIDを取得
  $top_page = get_page_by_path('top');
  $top_page_id = $top_page ? $top_page->ID : null;

  $price_page = get_page_by_path('price');
  $price_page_id = $price_page ? $price_page->ID : null;

  $faq_page = get_page_by_path('faq');
  $faq_page_id = $faq_page ? $faq_page->ID : null;
  ?>
  <p>追加・変更したい項目をクリックしてください</p>
  <ul class="quick-action">
      <li>
          <a href="<?php echo admin_url('post-new.php?post_type=post'); ?>" class="quick-action-button">
              <span class="dashicons-before dashicons-admin-post"></span>
              ブログ
          </a>
      </li>
      <?php if (current_user_can('administrator')) : ?>
          <li>
              <a href="<?php echo admin_url('post-new.php?post_type=voice'); ?>" class="quick-action-button">
                  <span class="dashicons-before dashicons-admin-users"></span>
                  お客様の声
              </a>
          </li>
          <li>
              <a href="<?php echo admin_url('post-new.php?post_type=campaign'); ?>" class="quick-action-button">
                  <span class="dashicons-before dashicons-pressthis"></span>
                  キャンペーン
              </a>
          </li>
          <?php if ($top_page_id): ?>
              <li>
                  <a href="<?php echo get_edit_post_link($top_page_id); ?>" class="quick-action-button">
                      <span class="dashicons-before dashicons-welcome-view-site"></span>
                      メインビジュアル
                  </a>
              </li>
          <?php endif; ?>
          <?php if ($price_page_id): ?>
              <li>
                  <a href="<?php echo get_edit_post_link($price_page_id); ?>" class="quick-action-button">
                      <span class="dashicons-before dashicons-money-alt"></span>
                      料金表
                  </a>
              </li>
          <?php endif; ?>
          <?php if ($faq_page_id): ?>
              <li>
                  <a href="<?php echo get_edit_post_link($faq_page_id); ?>" class="quick-action-button">
                      <span class="dashicons-before dashicons-editor-help"></span>
                      よくある質問
                  </a>
              </li>
          <?php endif; ?>
      <?php endif; ?>
  </ul>
  <?php
}

// 管理画面にカスタムCSSを追加する関数
function my_admin_dashboard_css() {
  echo '<style>
      .quick-action {
          width: 100%;
          list-style: none;
          padding-top: 24px;
          padding-bottom: 24px;
          margin-inline: auto;
          display: grid;
          grid-template-columns: repeat(2, 1fr);
          gap: 24px;
          justify-content: center;
      }
      .quick-action li {
          height: 100%;
      }
      .quick-action .quick-action-button {
          display: flex;
          align-items: center;
          padding: 10px 15px;
          border: 1px solid #0073aa;
          background-color: #fff;
          color: #0073aa;
          text-decoration: none;
          border-radius: 4px;
          height: 100%;
          transition: transform 0.3s ease, background-color 0.3s ease;
      }
      .quick-action .quick-action-button:hover {
          background-color: #0073aa;
          color: #fff;
      }
      .dashicons-before {
          margin-right: 5px;
      }
  </style>';
}
add_action('admin_head', 'my_admin_dashboard_css');

  /* ========================================
    管理画面の投稿タイプ3つ(デフォルトとCPT UI)の
    アイキャッチを設定し、
    不要な投稿者とコメントの列が非表示にする
  ======================================== */
// 管理画面の投稿一覧にアイキャッチ画像の列を追加
function add_thumbnail_column($columns) {
  $columns['thumbnail'] = __('アイキャッチ画像');
  return $columns;
}
add_filter('manage_posts_columns', 'add_thumbnail_column');

// アイキャッチ画像の列に画像を表示
function show_thumbnail_column($column_name, $post_id) {
  if ($column_name === 'thumbnail') {
      $thumbnail = get_the_post_thumbnail($post_id, array(180, 120));
      echo $thumbnail ? $thumbnail : __('なし');
  }
}
add_action('manage_posts_custom_column', 'show_thumbnail_column', 10, 2);

// 投稿一覧から投稿者とコメントの列を削除
function remove_unwanted_columns($columns) {
  unset($columns['author']);
  unset($columns['comments']);
  return $columns;
}
add_filter('manage_posts_columns', 'remove_unwanted_columns');

// CSSで列の幅と画像のスタイルを調整
function thumbnail_column_width() {
  echo '<style>
      .column-thumbnail {
          width: 180px;
          text-align: center;
      }
      .column-thumbnail img {
          max-width: 100%;
          height: auto;
      }
  </style>';
}
add_action('admin_head', 'thumbnail_column_width');

add_filter('use_block_editor_for_post',function($use_block_editor,$post){
	if($post->post_type==='page'){
		if(in_array($post->post_name,['top'])){ //ページスラッグが「about」または「company」ならコンテンツエディターを非表示
			remove_post_type_support('page','editor');
			return false;
		}
	}
	return $use_block_editor;
},10,2);
