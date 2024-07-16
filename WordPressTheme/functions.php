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

