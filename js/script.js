document.addEventListener('DOMContentLoaded', () => {
  // Swiper for about section images
  const imageSwiper = new Swiper('.image-swiper', {
    slidesPerView: 'auto',
    loop: true,
    centeredSlides: true,
    spaceBetween: 28,
    allowTouchMove: false,
    freeMode: false,
    freeModeMomentum: false,
    speed: 4000, // スライドアニメーションの速度（ミリ秒）
    autoplay: {
      delay: 1, // 最小の遅延でスムーズな流れを維持
      disableOnInteraction: false,
      pauseOnMouseEnter: false,
    },
    loopAdditionalSlides: 1, // ループ時のスムーズさを向上
    slidesPerGroup: 1,
    // 上下中央寄せ
    on: {
      init: function() {
        // スライドの上下中央寄せのみ（幅はCSSで制御するためJSで幅指定は不要）
        document.querySelectorAll('.image-swiper .swiper-slide').forEach(slide => {
          slide.style.display = 'flex';
          slide.style.alignItems = 'center';
          slide.style.justifyContent = 'center';
        });
      }
    }
  });

  // Interview Swiper
  const interviewSwiper = new Swiper('.interview-swiper', {
    slidesPerView: 'auto',
    centeredSlides: true,
    spaceBetween: 32,
    loop: true,
    pagination: {
      el: '.interview__swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next-interview',
      prevEl: '.swiper-button-prev-interview',
    },
    on: {
      init: function() {
        // スライド幅を340pxに固定
        document.querySelectorAll('.interview-swiper .swiper-slide').forEach(slide => {
          slide.style.width = '340px';
        });
      }
    }
  });

  // FAQ accordion
  document.querySelectorAll('.faq__question').forEach((question) => {
    question.addEventListener('click', () => {
      const item = question.closest('.faq__item');
      if (item) {
        item.classList.toggle('is-open');
      }
    });
  });
});
