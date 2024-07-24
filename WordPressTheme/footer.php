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
    <footer class="footer<?php echo is_404() ? ' footer--mt0' : ''; ?>">
      <div class="footer__inner inner">
        <div class="footer__top">
          <div class="footer__logo">
            <a href="<?php echo home_url(); ?>"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/CodeUps_logo.svg" alt="CodeUps" loading="lazy" decoding="async"></a>
          </div>
          <div class="footer__sns-wrap">
            <a class="footer__sns-icon sns-icon" href="https://www.facebook.com/?locale=ja_JP" target=" _blank">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/facebook.svg" alt="facebookのアイコン" loading="lazy" decoding="async">
            </a>
            <a class="footer__sns-icon sns-icon" href="https://www.instagram.com/" target="_blank">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/instagram.svg" alt="インスタグラムのアイコン" loading="lazy" decoding="async">
            </a>
          </div>
        </div>
        <nav class="global-navigation--footer global-navigation">
          <div class="global-navigation__columns">
            <ul class="global-navigation__items">
              <li class="global-navigation__item">
                <a href="<?php echo esc_url(get_post_type_archive_link('campaign')); ?>">キャンペーン</a>
                <ul class="global-navigation__sub-items">
                  <li class="global-navigation__sub-item">
                    <a href="<?php echo esc_url(home_url('/campaign_category/licence')); ?>">ライセンス取得</a>
                  </li>
                  <li class="global-navigation__sub-item">
                    <a href="<?php echo esc_url(home_url('/campaign_category/trial-diving')); ?>">体験ダイビング</a>
                  </li>
                  <li class="global-navigation__sub-item">
                    <a href="<?php echo esc_url(home_url('/campaign_category/fun-diving')); ?>">ファンダイビング</a>
                  </li>
                </ul>
              </li>
              <li class="global-navigation__item">
                <a href="<?php echo esc_url(home_url('/about-us')); ?>">私たちについて</a>
              </li>
            </ul>
            <ul class="global-navigation__items">
              <li class="global-navigation__item">
                <a href="<?php echo esc_url(home_url('/information')); ?>">ダイビング情報</a>
                <ul class="global-navigation__sub-items">
                  <li class="global-navigation__sub-item">
                    <a href="<?php echo esc_url(home_url('/information/?tab=1')); ?>">ライセンス講習</a>
                  </li>
                  <li class="global-navigation__sub-item">
                    <a href="<?php echo esc_url(home_url('/information/?tab=3')); ?>">体験ダイビング</a>
                  </li>
                  <li class="global-navigation__sub-item">
                    <a href="<?php echo esc_url(home_url('/information/?tab=2')); ?>">ファンダイビング</a>
                  </li>
                </ul>
              </li>
              <li class="global-navigation__item">
                <a href="<?php echo esc_url(home_url('/home')); ?>">ブログ</a>
              </li>
            </ul>
            <ul class="global-navigation__items">
              <li class="global-navigation__item">
                <a href="<?php echo esc_url(get_post_type_archive_link('voice')); ?>">お客様の声</a>
              </li>
              <li class="global-navigation__item">
                <a href="<?php echo esc_url(home_url('/price')); ?>">料金一覧</a>
                <ul class="global-navigation__sub-items">
                  <li class="global-navigation__sub-item">
                    <a href="<?php echo esc_url(home_url('/price#license-course')); ?>">ライセンス講習</a>
                  </li>
                  <li class="global-navigation__sub-item">
                    <a href="<?php echo esc_url(home_url('/price#trial-diving')); ?>">体験ダイビング</a>
                  </li>
                  <li class="global-navigation__sub-item">
                    <a href="<?php echo esc_url(home_url('/price#fun-diving')); ?>">ファンダイビング</a>
                  </li>
                </ul>
              </li>
            </ul>
            <ul class="global-navigation__items">
              <li class="global-navigation__item">
                <a href="<?php echo esc_url(home_url('/faq')); ?>">よくある質問</a>
              </li>
              <li class="global-navigation__item">
                <a href="<?php echo esc_url(home_url('/privacypolicy')); ?>">プライバシー<br class="u-mobile">ポリシー</a>
              </li>
              <li class="global-navigation__item">
                <a href="<?php echo esc_url(home_url('/terms-of-service')); ?>">利用規約</a>
              </li>
              <li class="global-navigation__item">
                <a href="<?php echo esc_url(home_url('/contact')); ?>">お問い合わせ</a>
              </li>
              <li class="global-navigation__item">
                <a href="<?php echo esc_url(home_url('/sitemap')); ?>">サイトマップ</a>
              </li>
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
      <a href="<?php echo esc_url(home_url()); ?>"></a>
    </div>
  </body>

</html>