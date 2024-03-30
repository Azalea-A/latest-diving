
jQuery(function ($) { // この中であればWordpressでも「$」が使用可能になる

      //ハンバーガー
    $(function () {
      // ハンバーガーメニュー
      $(".js-hamburger,.js-drawer a").click(function () {
        $(".js-hamburger").toggleClass("is-active");
        $(".js-drawer").fadeToggle();
      });
    });

    //fvスライダー
    const swiper1 = new Swiper(".js-fvSwiper", {
      loop: true,
      effect: "slide",
      speed: 4000,
      allowTouchMove: false,
      autoplay: {
        delay: 3000,
      },
    });

    //topページ campaignのswiper
    const swiper2 = new Swiper(".js-topCampaignSwiper", {
      slidesPerView: "auto",
      loop: "true",
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

  //topへ戻る
    //トップへ戻るボタン
$(function () {
  const pagetop = $("#js-pagetop");
  pagetop.hide(); //最初はボタンを非表示
  $(window).scroll(function () {
    if ($(this).scrollTop() > 100) { //100px以上スクロールしたら
      pagetop.fadeIn(); //ボタンをフェードイン
    } else {
      pagetop.fadeOut(); //ボタンをフェードアウト
    }
  });
  pagetop.click(function () {
    $("body,html").animate({
        scrollTop: 0, //上から0pxの位置に戻る
      },800); //800ミリ秒かけて上に戻る
    return false;
  });
});

// スクロール時にフッター手前で止まるボタンの表示位置を調整する
  $(document).ready(function () {
    $(".js-toTop").hide();
    $(window).on("scroll", function () {
      let scrollHeight = $(document).height(); // ドキュメントの高さ
      let scrollPosition = $(window).height() + $(window).scrollTop(); // 現在の位置
      let footHeight = $(".footer").innerHeight(); // フッターの高さ
      if (scrollHeight - scrollPosition <= footHeight) {
        $(".js-toTop").css({ position: "absolute", bottom: footHeight}); // ボタンをフッター手前に固定
      } else {
        $(".js-toTop").css({ position: "fixed", bottom: 20 }); // ボタンを固定表示
      }
    });
    $(".js-toTop").show(); // ボタンを表示する
  });
});
