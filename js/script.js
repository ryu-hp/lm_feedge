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
    pagination: {
      el: '#image-swiper_pagination',
      type: 'bullets',
      clickable: true,
    },
  });

  // Interview Swiper
  const interviewSwiper = new Swiper('.interview-swiper', {
    slidesPerView: 'auto',
    centeredSlides: true,
    spaceBetween: 32,
    loop: true,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    breakpoints: {
      600: {
        slidesPerView: 2,
        spaceBetween: 32,
      },
      900: {
        slidesPerView: 3,
        spaceBetween: 32,
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
