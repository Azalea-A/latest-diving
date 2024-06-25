<section class="l-contact p-contact" <?php if (is_post_type_archive('recruit')) {
                                        echo 'l-contact--mt0';
                                      } ?>>
  <div class="p-contact__inner l-inner">
    <div class="p-contact__title c-section-header">
      <h2 class="c-section-header__engtitle">CONTACT</h2>
      <p class="c-section-header__jatitle">お問い合わせ</p>
    </div>
    <div class="p-contact__contents">
      <div class="p-contact__text-block">
        <p class="p-contact__text">Webサイトの制作のご依頼やお見積りなど、<br>お気軽にご相談ください。</p>
      </div>
      <div class="p-contact__btn">
        <a href="#" class="c-button">more</a>
      </div>
    </div>
  </div>
</section>

<div class="c-to-top">
  <a href="#top"><span></span></a>
</div>

<footer class="l-footer p-footer">
  <div class="p-footer__inner">

    <nav class="p-footer__nav p-footer-nav">
      <ul class="p-footer-nav__items">
        <li class="p-footer-nav__item">
          <a href="">HOME</a>
        </li>
        <li class="p-footer-nav__item">
          <a href="">NEWS</a>
        </li>
        <li class="p-footer-nav__item">
          <a href="">SERVICE</a>
        </li>
        <li class="p-footer-nav__item">
          <a href="">WORKS</a>
        </li>
        <li class="p-footer-nav__item">
          <a href="">COMPANY</a>
        </li>
        <li class="p-footer-nav__item">
          <a href="">RECRUIT</a>
        </li>
        <li class="p-footer-nav__item">
          <a href="">CONTACT</a>
        </li>
      </ul>
    </nav>
    <div class="p-footer__copyright">
      <small>&copy; CodeUps</small>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>