
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
      }

    });


});
