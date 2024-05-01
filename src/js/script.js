
jQuery(function ($) { // この中であればWordpressでも「$」が使用可能になる

     // ハンバーガー
    $(function () {
      // ハンバーガーメニュー
      $(".js-hamburger,.js-drawer a").click(function () {
        $(".js-hamburger").toggleClass("is-active");
        $(".js-drawer").fadeToggle();
      });
    });
    //ドロワーオープン時bodyスクロールさせない
    $(document).ready(function() {
      $('.js-hamburger').click(function() {
      $('body').toggleClass('js-drawer-menu__overflow-hidden');
      });
      });

    //fvスライダー
    const swiper1 = new Swiper(".js-fvSwiper", {
      loop: true,
      effect: "fade",
      speed: 4000,
      allowTouchMove: false,
      autoplay: {
        delay: 3000,
      },
    });

    //topページ campaignのswiper
    const swiper2 = new Swiper(".js-topCampaignSwiper", {
      slidesPerView: "auto",
      loop: true,
      speed: 3000,
      spaceBetween: 24,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      autoplay: {
        delay: 3000,
      },
      breakpoints: {
        768: {
          spaceBetween: 40,
        },
      },
      navigation: {
        nextEl: ".top-campaign__swiper-button-next",
        prevEl: ".top-campaign__swiper-button-prev",
    },
    });

    //chat GPT topへ戻る
    $(document).ready(function () {
      const pagetop = $(".js-toTop");
      const footer = $(".footer");
      const footHeight = footer.innerHeight();
      pagetop.hide(); // 初期状態でボタンを非表示

      // スクロール時にページトップへ戻るボタンの表示/非表示を制御
      $(window).scroll(function () {
        if ($(this).scrollTop() > 400) {
          pagetop.fadeIn();
        } else {
          pagetop.fadeOut();
        }
      });

      // ページトップへ戻るボタンをクリックしたときの動作
      pagetop.click(function () {
        $("body,html").animate({
          scrollTop: 0,
        }, 800);
        return false;
      });
      // フッター手前でボタンを固定表示する
      $(window).on("scroll", function () {
        let scrollHeight = $(document).height();
        let scrollPosition = $(window).height() + $(window).scrollTop();
        let bottomMargin = 20; // ボタンの底辺マージン
        if (scrollHeight - scrollPosition <= footHeight + bottomMargin) {
          pagetop.css({ position: "absolute", bottom: footHeight + bottomMargin });
        } else {
          pagetop.css({ position: "fixed", bottom: bottomMargin });
        }
      });
    });

  //information, voice, priceの画像のエフェクト
  var box = $('.color-box'),
  speed = 700;
  //↑要素の取得とスピードの設定
  //.color-boxの付いた全ての要素に対して下記の処理を行う
  box.each(function(){
  $(this).append('<div class="js-color-box"></div>')
  var color = $(this).find($('.js-color-box')),
  image = $(this).find('img');
  var counter = 0;

  image.css('opacity','0');
  color.css('width','0%');
  //inviewを使って背景色が画面に現れたら処理をする
  $(this).on('inview', function(){
      if(counter == 0){
        $(color).delay(200).animate({'width':'100%'}, speed, function(){
          $(image).css('opacity','1');
          $(color).css({'left':'0', 'right':'auto'});
          $(color).animate({'width':'0'}, speed);
        });
        counter = 1;
      }
    });
  });

//ここから下層ページ
//下層campaign page タブ
$(function () {
  $(".js-category-tab-container.is-active").css("display", "block");
  $(".js-category-tab").on("click", function () {
    $(".js-category-tab.current").removeClass("current");
    $(this).addClass("current");
    const index = $(this).index();
    $("js-category-tab-container").hide().eq(index).fadeIn(300);
  });
});

//下層information page タブ
  $(function () {
    const informationTabButton = $(".js-information-tab-button"),
      informationTabContent = $(".js-information-tab-content");
      informationTabButton.on("click", function () {
      let index = informationTabButton.index(this);

      informationTabButton.removeClass("is-active");
      $(this).addClass("is-active");
      informationTabContent.removeClass("is-active");
      informationTabContent.eq(index).addClass("is-active");
    });
  });

  //FAQアコーディオン
  $(function () {
    $(".js-accordion__item .js-accordion__content").css(
      "display",
      "block"
    );
    $(".js-accordion__item .js-accordion__title").addClass(
      "is-open"
    );
    $(".js-accordion__title").on("click", function () {
      $(this).toggleClass("is-open");
      $(this).next().slideToggle(300);
    });
  });

});