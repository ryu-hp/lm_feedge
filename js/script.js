document.addEventListener('DOMContentLoaded', () => {
  // Swiper for about section images
  const imageSwiper = new Swiper('.image-swiper', {
    slidesPerView: 'auto',
    loop: true,
    centeredSlides: true,
    allowTouchMove: false,
    freeMode: true,
    freeModeMomentum: false,
    speed: 4000, // スライドが1周する速度（ミリ秒）
    autoplay: {
      delay: 0, // 0にすることで止まらず流れ続ける
      disableOnInteraction: false,
    },
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
