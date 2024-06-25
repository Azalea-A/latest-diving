<?php

function add_custom_scripts()
{
  // Google Fontsの追加
  wp_enqueue_style('google-fonts-montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Noto+Serif+JP:wght@300;400;500;700&display=swap', false);
  wp_enqueue_style('google-fonts-noto', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Noto+Sans+JP:wght@400;700&family=Noto+Serif+JP:wght@300;400;500;700&display=swap', false);

  // swiperのCSSの追加
  wp_enqueue_style('swiper', 'https://unpkg.com/swiper@8/swiper-bundle.min.css', false);

  // テーマのCSSの追加
  wp_enqueue_style('theme-styles', get_theme_file_uri('css/styles.css'), false);

  // jQueryの追加
  wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.0.js', array(), '3.6.0', true);

  // swiperのJSの追加
  wp_enqueue_script('swiper', 'https://unpkg.com/swiper@8/swiper-bundle.min.js', array('jquery'), '8.0.0', true);

  // テーマのJSの追加
  wp_enqueue_script('theme-scripts', get_theme_file_uri('js/script.js'), array('jquery'), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'add_custom_scripts');

// crossorigin属性を持つタグに対する対応
function add_rel_preconnect($html, $handle, $href, $media)
{
  if ('google-fonts-montserrat' === $handle || 'google-fonts-noto' === $handle || 'swiper' === $handle) {
    $html = <<<EOT
<link rel='preconnect' href='https://fonts.googleapis.com'>
<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
$html
EOT;
  }
  return $html;
}

add_filter('style_loader_tag', 'add_rel_preconnect', 10, 4);

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


//アーカイブの表示件数を変える関数がある
function change_posts_per_page($query)
{
  if (is_admin() || !$query->is_main_query())
    return;
  if ($query->is_archive(array('works', 'recruit'))) {
    $query->set('posts_per_page', '-1');
  }
}
add_action('pre_get_posts', 'change_posts_per_page');
