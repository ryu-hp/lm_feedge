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
    speed: 6000, // スライドアニメーションの速度（ミリ秒）
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
    navigation: {
      nextEl: '.swiper-button-next-interview',
      prevEl: '.swiper-button-prev-interview',
    },
    on: {
      init: function() {
        document.querySelectorAll('.interview-swiper .swiper-slide').forEach(slide => {
          slide.style.width = '340px';
        });
      }
    }
  });

  // モーダル開く処理
  document.querySelectorAll('.swiper-slide').forEach(slide => {
    slide.addEventListener('click', () => {
      const modalId = slide.dataset.modal;
      const modal = document.getElementById(modalId);
      if (modal) modal.classList.add('is-open');
    });
  });

  // モーダル閉じる処理
  document.querySelectorAll('.interview__modal-cancel').forEach(cancel => {
    cancel.addEventListener('click', (e) => {
      e.stopPropagation();
      const modal = cancel.closest('.interview__modal');
      if (modal) modal.classList.remove('is-open');
    });
  });

  // オーバーレイ背景クリックでも閉じる（任意）
  document.querySelectorAll('.interview__modal').forEach(modal => {
    modal.addEventListener('click', (e) => {
      if (e.target.classList.contains('interview__modal')) {
        modal.classList.remove('is-open');
      }
    });
  });

  // FAQ accordion (event delegation)
  document.addEventListener('click', function(e) {
    const item = e.target.closest('.faq__item');
    if (item) {
      item.classList.toggle('is-open');
    }
  });
});