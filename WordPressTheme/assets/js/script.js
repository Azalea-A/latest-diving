"use strict";

jQuery(function ($) {
  // この中であればWordpressでも「$」が使用可能になる

  /* ========================================
  // ハンバーガー
  ======================================== */
  $(function () {
    // ハンバーガーメニュー
    $(".js-hamburger,.js-drawer a").click(function () {
      $(".js-hamburger").toggleClass("is-active");
      $(".js-drawer").fadeToggle();
    });
  });
  //ドロワーオープン時bodyスクロールさせない
  $(document).ready(function () {
    $('.js-hamburger').click(function () {
      $('body').toggleClass('js-drawer-menu__overflow-hidden');
    });
  });

  /* ========================================
  //fvスライダー
  ======================================== */
  var swiper1 = new Swiper(".js-fvSwiper", {
    loop: true,
    effect: "fade",
    speed: 4000,
    allowTouchMove: false,
    autoplay: {
      delay: 3000
    }
  });

  /* ========================================
  // topページ campaignのswiper
  ======================================== */
  var swiper2 = new Swiper(".js-topCampaignSwiper", {
    slidesPerView: "auto",
    loop: true,
    speed: 3000,
    spaceBetween: 24,
    pagination: {
      el: ".swiper-pagination",
      clickable: true
    },
    autoplay: {
      delay: 3000
    },
    breakpoints: {
      768: {
        spaceBetween: 40
      }
    },
    navigation: {
      nextEl: ".top-campaign__swiper-button-next",
      prevEl: ".top-campaign__swiper-button-prev"
    }
  });

  /* ========================================
  // topへ戻る
  ======================================== */
  $(document).ready(function () {
    var pagetop = $(".js-toTop");
    var footer = $(".footer");
    var footHeight = footer.innerHeight();
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
        scrollTop: 0
      }, 800);
      return false;
    });
    // フッター手前でボタンを固定表示する
    $(window).on("scroll", function () {
      var scrollHeight = $(document).height();
      var scrollPosition = $(window).height() + $(window).scrollTop();
      var bottomMargin = 20; // ボタンの底辺マージン
      if (scrollHeight - scrollPosition <= footHeight + bottomMargin) {
        pagetop.css({
          position: "absolute",
          bottom: footHeight + bottomMargin
        });
      } else {
        pagetop.css({
          position: "fixed",
          bottom: bottomMargin
        });
      }
    });
  });

  /* ========================================
  //informationなど画像のエフェクト
  ======================================== */
  var box = $('.color-box'),
    speed = 700;
  //↑要素の取得とスピードの設定
  //.color-boxの付いた全ての要素に対して下記の処理を行う
  box.each(function () {
    $(this).append('<div class="js-color-box"></div>');
    var color = $(this).find($('.js-color-box')),
      image = $(this).find('img');
    var counter = 0;
    image.css('opacity', '0');
    color.css('width', '0%');
    //inviewを使って背景色が画面に現れたら処理をする
    $(this).on('inview', function () {
      if (counter == 0) {
        $(color).delay(200).animate({
          'width': '100%'
        }, speed, function () {
          $(image).css('opacity', '1');
          $(color).css({
            'left': '0',
            'right': 'auto'
          });
          $(color).animate({
            'width': '0'
          }, speed);
        });
        counter = 1;
      }
    });
  });
  /* ========================================
  // ここから下層
  ======================================== */
  /* ========================================
  // 下層campaign/voice page タブ
  ======================================== */
  $(function () {
    $(".js-category-tab-container.is-active").css("display", "block");
    $(".js-category-tab").on("click", function () {
      $(".js-category-tab.current").removeClass("current");
      $(this).addClass("current");
      var index = $(this).index();
      $("js-category-tab-container").hide().eq(index).fadeIn(300);
    });
  });

  /* ========================================
   //インフォメーションのタブ
   ======================================== */
  $(function () {
    // タブをクリックしたときの処理
    $(".js-information-tab-link").on("click", function (event) {
      event.preventDefault();
      var index = $(this).parent().index();
      showTab(index);
    });

    // タブを表示する関数
    function showTab(index) {
      $(".js-information-tab-content").hide().eq(index).show();
      $(".js-information-tab-link").removeClass("is-active").eq(index).addClass("is-active");
    }

    // 初期状態では最初のタブを表示
    showTab(0);

    // URLパラメータからタブを指定する
    var urlParams = new URLSearchParams(window.location.search);
    var tabParam = urlParams.get('tab');
    if (tabParam) {
      var tabIndex = parseInt(tabParam, 10) - 1; // インデックスは0から始まるので-1する
      if (tabIndex >= 0 && tabIndex < $(".js-information-tab-link").length) {
        showTab(tabIndex);
      }
    }
  });

  /* ========================================
  //FAQアコーディオン
  ======================================== */
  $(function () {
    // 初期状態でアコーディオンを全て開ける
    $(".js-accordion__item .js-accordion__content").css("display", "block");
    $(".js-accordion__item .js-accordion__title").addClass("is-open");

    // クリックしたら開閉する
    $(".js-accordion__title").on("click", function () {
      $(this).toggleClass("is-open is-closed");
      $(this).next(".js-accordion__content").slideToggle(300);
    });
  });

  //asideのarchive
  $(function () {
    $(".js-aside-archive__item:first-child .js-aside-archive__content").css("display", "block");
    $(".js-aside-archive__item:first-child .js-aside-archive__year").addClass("is-open");
    $(".js-aside-archive__year").on("click", function () {
      $(this).toggleClass("is-open");
      $(this).next().slideToggle(300);
    });
  });

  /* ========================================
  // モーダル（ギャラリー）
  ======================================== */
  function galleryModal() {
    var windowSize = $(window).width();
    var modalImage = $(".js-modal-img img");
    var modal = $(".js-modal");
    modalImage.click(function () {
      if (windowSize < 768) {
        return false;
      } else {
        // modal内に画像を複製して表示(背景をスクロール不可)
        modal.html($(this).prop("outerHTML"));
        modal.fadeIn();
        $("html,body").css("overflow", "hidden");
        return false;
      }
    });

    // モーダル画像を非表示（背景をスクロール可）
    modal.click(function () {
      modal.fadeOut();
      $("html,body").css("overflow", "auto");
      return false;
    });
  }
  galleryModal();
}); //js全体の締め