    <!-- shop infoとcontact -->
    <?php
    // 特定のページIDまたは条件に基づいてフッターセクションを表示しないようにする
    if (!is_page(array('contact', 'thanks')) && !is_404()) :
    ?>
      <section class="top-shopInfo-contact-section shopInfo-contact">
        <div class="shopInfo-contact__inner inner">
          <div class="shopInfo-contact__container">
            <div class="shopInfo-contact__shop-info shop-info">
              <div class="shop-info__inner">
                <div class="shop-info__title-wrapper">
                  <div class="shop-info__title">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/CodeUps-logo_blue.svg" alt="Code Ups" loading="lazy" decoding="async">
                  </div>
                </div>
                <div class="shop-info__body">
                  <div class="shop-info__body-flex-box">
                    <ul class="shop-info__items">
                      <li class="shop-info__item">沖縄県那覇市1-1</li>
                      <li class="shop-info__item">
                        <a href="tel:01200000000">TEL:0120-000-0000</a>
                      </li>
                      <li class="shop-info__item">営業時間:8:30-19:00</li>
                      <li class="shop-info__item">定休日:毎週火曜日</li>
                    </ul>
                    <div class="shop-info__google-map">
                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d829413.616731413!2d139.16943580072484!3d35.70415365296447!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6019bf2da754df55%3A0x1e064360cec6807c!2z54ax5rW344K144Oz44OT44O844OB!5e0!3m2!1sja!2sjp!4v1712982594489!5m2!1sja!2sjp" width="273" height="148" style="border:0;" allowfullscreen="" loading="lazy" title="地図" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="shopInfo-contact__contact contact">
              <div class="contact__inner">
                <div class="contact__section-title section-title">
                  <p class="section-title__english section-title__english--large">Contact</p>
                  <h2 class="section-title__japanese section-title__japanese--english-large">お問い合せ</h2>
                </div>
                <p class="contact__text">ご予約・お問い合わせはコチラ</p>
                <div class="contact__button-wrapper">
                  <?php
                  // スラッグ名が 'contact' のページのURLを取得
                  $contact_page_url = get_permalink(get_page_by_path('contact'));
                  ?>
                  <a href="<?php echo esc_url($contact_page_url); ?>" class="button">
                    <span class="button__span">Contact us</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    <?php endif; ?>
    </main>
    <footer class="footer<?php if (is_404()) {
                            echo ' footer--mt0';
                          } ?>">
      <div class="footer__inner inner">
        <div class="footer__top">
          <div class="footer__logo">
            <a href="<?php echo home_url(); ?>"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/CodeUps_logo.svg" alt="CodeUps" loading="lazy" decoding="async"></a>
          </div>
          <div class="footer__sns-wrap">
            <a class="fooer__sns-icon sns-icon" href="https://www.facebook.com/?locale=ja_JP" target=" _blank">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/facebook.svg" alt="facebookのアイコン" loading="lazy" decoding="async">
            </a>
            <a class="fooer__sns-icon sns-icon" href="https://www.instagram.com/" target="_blank">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/instagram.svg" alt="インスタグラムのアイコン" loading="lazy" decoding="async">
            </a>
          </div>
        </div>
        <nav class="global-navigation--footer global-navigation">
          <div class="global-navigation__columns">
            <?php
            // メニューIDを取得
            $menu_name = 'global-nav';
            $locations = get_nav_menu_locations();
            $menu_id = $locations[$menu_name];
            $menus = wp_get_nav_menu_items($menu_id);
            // メニューアイテムを構造化するための配列を作成
            $menu_structure = array();

            foreach ($menus as $menu_item) {
              if (!$menu_item->menu_item_parent) {
                $menu_structure[$menu_item->ID] = array(
                  'item' => $menu_item,
                  'children' => array()
                );
              } else {
                $menu_structure[$menu_item->menu_item_parent]['children'][] = $menu_item;
              }
            }
            // メニューを表示
            function render_menu_items($items){
              foreach ($items as $menu_item) {
                echo '<li class="global-navigation__item">';
                echo '<a href="' . esc_url($menu_item['item']->url) . '">' . esc_html($menu_item['item']->title) . '</a>';
                if (!empty($menu_item['children'])) {
                  echo '<ul class="global-navigation__sub-items">';
                  foreach ($menu_item['children'] as $child_item) {
                    echo '<li class="global-navigation__sub-item">';
                    echo '<a href="' . esc_url($child_item->url) . '">' . esc_html($child_item->title) . '</a>';
                    echo '</li>';
                  }
                  echo '</ul>';
                }
                echo '</li>';
              }
            }
            ?>

            <ul class="global-navigation__items">
              <?php render_menu_items(array_slice($menu_structure, 0, 2)); // 1列目
              ?>
            </ul>
            <ul class="global-navigation__items">
              <?php render_menu_items(array_slice($menu_structure, 2, 2)); // 2列目
              ?>
            </ul>
            <ul class="global-navigation__items">
              <?php render_menu_items(array_slice($menu_structure, 4, 2)); // 3列目
              ?>
            </ul>
            <ul class="global-navigation__items">
              <?php
              // 最後の列のアイテムを取得
              $last_column_items = array_slice($menu_structure, 6);
              // 必要なアイテムを追加
              $required_items = ['利用規約', 'お問い合わせ', 'サイトマップ'];
              foreach ($required_items as $required_item) {
                $found = false;
                foreach ($last_column_items as $item) {
                  if ($item['item']->title == $required_item) {
                    $found = true;
                    break;
                  }
                }
                if (!$found) {
                  foreach ($menu_structure as $item) {
                    if ($item['item']->title == $required_item) {
                      $last_column_items[] = $item;
                      break;
                    }
                  }
                }
              }
              render_menu_items($last_column_items); // 4列目
              ?>
            </ul>
          </div>
        </nav>

        <div class="footer__copyright">
          <small>Copyright &copy; 2021 - 2023 CodeUps LLC. All Rights Reserved.</small>
        </div>
      </div>
    </footer>
    <?php wp_footer(); ?>
    <div class="toTop js-toTop">
      <a href="<?php echo home_url(); ?>"></a>
    </div>
  </body>

</html>