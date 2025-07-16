document.addEventListener('DOMContentLoaded', () => {
  // Swiper for about section images
  const imageSwiper = new Swiper('.image-swiper', {
    slidesPerView: 'auto',
    loop: true,
    centeredSlides: true,
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
    pagination: {
      el: '#image-swiper_pagination',
      type: 'bullets',
      clickable: true,
    },
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
