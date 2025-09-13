document.addEventListener('DOMContentLoaded', () => {
  console.log('DOM loaded'); // デバッグ用
  
  try {
    // Swiperの存在確認
    if (typeof Swiper === 'undefined') {
      console.error('Swiper is not loaded');
      return;
    }
    
    console.log('Swiper loaded successfully'); // デバッグ用

    const imageSwiper = new Swiper('.image-swiper', {
    slidesPerView: 'auto',
    loop: true,
    // centeredSlides: true,
    spaceBetween: 28,
    allowTouchMove: false,
    speed: 3000,
    updateOnImagesReady: true,
    reverseDirection: true,
    autoplay: {
      delay: 0,
      disableOnInteraction: false,
      pauseOnMouseEnter: false,
    },
    loopedSlides: 3,
    slidesPerGroup: 1,
    simulateTouch: false,
    on: {
      init: function() {
        document.querySelectorAll('.image-swiper .swiper-slide').forEach(slide => {
          slide.style.display = 'flex';
          slide.style.alignItems = 'center';
          slide.style.justifyContent = 'center';
        });
        document.querySelectorAll('.image-swiper .swiper-slide img').forEach(img => {
          img.addEventListener('load', function() {
            const slide = img.closest('.swiper-slide');
            if (img.naturalWidth > img.naturalHeight) {
              slide.classList.add('slide-landscape');
            } else {
              slide.classList.add('slide-portrait');
            }
          });
          // fallback: キャッシュ時でも即判定
          if (img.complete) {
            const slide = img.closest('.swiper-slide');
            if (img.naturalWidth > img.naturalHeight) {
              slide.classList.add('slide-landscape');
            } else {
              slide.classList.add('slide-portrait');
            }
          }
        });
      }
    }
  });

  // Interview Swiper
  // 画面サイズに応じてinitialSlideを設定
  const isPC = window.innerWidth > 768;
  const initialSlideIndex = isPC ? 1 : Math.floor(document.querySelectorAll('.interview-swiper .swiper-slide').length / 2);
  
  const interviewSwiper = new Swiper('.interview-swiper', {
    slidesPerView: 'auto',
    centeredSlides: window.innerWidth <= 767, // スマホでは中央、PCでは左寄り
    spaceBetween: 32,
    loop: true,
    initialSlide: initialSlideIndex, // PCでは1（左から2番目）、スマホでは中央
    slidesOffsetBefore: window.innerWidth > 768 ? 170 : 0, // PCでは170px右にずらす
    navigation: {
      nextEl: '.swiper-button-next-interview',
      prevEl: '.swiper-button-prev-interview',
    },
    on: {
      init: function() {
        document.querySelectorAll('.interview-swiper .swiper-slide').forEach(slide => {
          // 画面サイズに応じてスライド幅を設定
          if (window.innerWidth <= 768) {
            slide.style.width = '70vw';
          } else {
            slide.style.width = '340px';
          }
        });
      }
    }
  });

  // モーダル開く処理
  document.querySelectorAll('.swiper-slide').forEach(slide => {
    slide.addEventListener('click', () => {
      const modalId = slide.dataset.modal;
      const modal = document.getElementById(modalId);
      if (modal) {
        modal.classList.add('is-open');
        // モーダルが開いたときにmainのz-indexを60に設定
        const mainElement = document.querySelector('main');
        if (mainElement) {
          mainElement.style.zIndex = '60';
        }
      }
    });
  });

  // モーダル閉じる処理
  document.querySelectorAll('.interview__modal-cancel').forEach(cancel => {
    cancel.addEventListener('click', (e) => {
      e.stopPropagation();
      const modal = cancel.closest('.interview__modal');
      if (modal) {
        modal.classList.remove('is-open');
        // モーダルが閉じたときにmainのz-indexを元に戻す
        const mainElement = document.querySelector('main');
        if (mainElement) {
          mainElement.style.zIndex = '';
        }
      }
    });
  });

  // オーバーレイ背景クリックでも閉じる（任意）
  document.querySelectorAll('.interview__modal').forEach(modal => {
    modal.addEventListener('click', (e) => {
      if (e.target.classList.contains('interview__modal')) {
        modal.classList.remove('is-open');
        // モーダルが閉じたときにmainのz-indexを元に戻す
        const mainElement = document.querySelector('main');
        if (mainElement) {
          mainElement.style.zIndex = '';
        }
      }
    });
  });

  // FAQ accordion (event delegation)
  document.addEventListener('click', function(e) {
    console.log('クリックイベント発生:', e.target); // デバッグ用
    
    // .faq__questionがクリックされたかチェック
    const question = e.target.closest('.faq__question');
    console.log('FAQ question要素:', question); // デバッグ用
    
    if (question) {
      e.preventDefault(); // デフォルト動作を防ぐ
      e.stopPropagation(); // イベントバブリングを停止
      
      console.log('FAQ questionがクリックされました'); // デバッグ用
      const item = question.closest('.faq__item');
      console.log('FAQ item要素:', item); // デバッグ用
      
      if (item) {
        console.log('現在のis-openクラス:', item.classList.contains('is-open')); // デバッグ用
        item.classList.toggle('is-open');
        console.log('トグル後のis-openクラス:', item.classList.contains('is-open')); // デバッグ用
      }
    }
  });
  
  // Job Modal機能
  // Job itemのクリックでモーダルを開く
  document.querySelectorAll('.jobs__item').forEach(jobItem => {
    jobItem.addEventListener('click', () => {
      const modalId = jobItem.dataset.modal;
      const modal = document.getElementById(modalId);
      if (modal) {
        modal.classList.add('is-open');
        document.body.style.overflow = 'hidden'; // スクロールを無効化
        // モーダルが開いたときにmainのz-indexを60に設定
        const mainElement = document.querySelector('main');
        if (mainElement) {
          mainElement.style.zIndex = '60';
        }
      }
    });
  });

  // Job modalの閉じる処理
  document.querySelectorAll('.job-modal__close').forEach(closeBtn => {
    closeBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      const modal = closeBtn.closest('.job-modal');
      if (modal) {
        modal.classList.remove('is-open');
        document.body.style.overflow = ''; // スクロールを有効化
        // モーダルが閉じたときにmainのz-indexを元に戻す
        const mainElement = document.querySelector('main');
        if (mainElement) {
          mainElement.style.zIndex = '';
        }
      }
    });
  });

  // エントリーボタンクリック時にモーダルを閉じる
  document.querySelectorAll('.job-modal .button--primary').forEach(entryBtn => {
    entryBtn.addEventListener('click', () => {
      const modal = entryBtn.closest('.job-modal');
      if (modal) {
        modal.classList.remove('is-open');
        document.body.style.overflow = ''; // スクロールを有効化
        // モーダルが閉じたときにmainのz-indexを元に戻す
        const mainElement = document.querySelector('main');
        if (mainElement) {
          mainElement.style.zIndex = '';
        }
      }
    });
  });

  // Job modalの背景クリックで閉じる
  document.querySelectorAll('.job-modal').forEach(modal => {
    modal.addEventListener('click', (e) => {
      if (e.target.classList.contains('job-modal')) {
        modal.classList.remove('is-open');
        document.body.style.overflow = ''; // スクロールを有効化
        // モーダルが閉じたときにmainのz-indexを元に戻す
        const mainElement = document.querySelector('main');
        if (mainElement) {
          mainElement.style.zIndex = '';
        }
      }
    });
  });

  // ドロワーメニュー機能
  const hamburgerBtn = document.getElementById('hamburger-btn');
  const drawer = document.getElementById('drawer');
  const drawerOverlay = document.getElementById('drawer-overlay');
  const drawerLinks = document.querySelectorAll('.drawer__link');

  // ハンバーガーメニューボタンクリック
  if (hamburgerBtn) {
    hamburgerBtn.addEventListener('click', () => {
      hamburgerBtn.classList.toggle('is-active');
      drawer.classList.toggle('is-open');
      document.body.classList.toggle('drawer-open');
    });
  }

  // オーバーレイクリックでドロワーを閉じる
  if (drawerOverlay) {
    drawerOverlay.addEventListener('click', () => {
      hamburgerBtn.classList.remove('is-active');
      drawer.classList.remove('is-open');
      document.body.classList.remove('drawer-open');
    });
  }

  // ドロワーメニューのリンククリックでドロワーを閉じる
  drawerLinks.forEach(link => {
    link.addEventListener('click', () => {
      hamburgerBtn.classList.remove('is-active');
      drawer.classList.remove('is-open');
      document.body.classList.remove('drawer-open');
    });
  });

  // エントリーボタンクリック時にモーダルを閉じる
  document.querySelectorAll('.job-modal__button a').forEach(entryBtn => {
    entryBtn.addEventListener('click', () => {
      const modal = entryBtn.closest('.job-modal');
      if (modal) {
        modal.classList.remove('is-open');
        document.body.style.overflow = ''; // スクロールを有効化
        // モーダルが閉じたときにmainのz-indexを元に戻す
        const mainElement = document.querySelector('main');
        if (mainElement) {
          mainElement.style.zIndex = '';
        }
      }
    });
  });
  
  // FAQ要素の存在確認（ページ読み込み時）
  setTimeout(() => {
    const faqQuestions = document.querySelectorAll('.faq__question');
    const faqItems = document.querySelectorAll('.faq__item');
    console.log('FAQ questions の数:', faqQuestions.length); // デバッグ用
    console.log('FAQ items の数:', faqItems.length); // デバッグ用
    console.log('FAQ questions:', faqQuestions); // デバッグ用
    console.log('FAQ items:', faqItems); // デバッグ用
  }, 1000); // 1秒後に確認

  // 画面リサイズ時にアクティブスライドを調整
  window.addEventListener('resize', () => {
    const isPC = window.innerWidth > 768;
    const targetSlide = isPC ? 1 : Math.floor(document.querySelectorAll('.interview-swiper .swiper-slide').length / 2);
    
    // スライドサイズも調整
    document.querySelectorAll('.interview-swiper .swiper-slide').forEach(slide => {
      if (window.innerWidth <= 768) {
        slide.style.width = '70vw';
      } else {
        slide.style.width = '340px';
      }
    });
    
    // Swiperの設定を更新
    if (interviewSwiper && !interviewSwiper.destroyed) {
      // centeredSlidesの設定を更新
      interviewSwiper.params.centeredSlides = window.innerWidth <= 767;
      interviewSwiper.params.slidesOffsetBefore = window.innerWidth > 768 ? 170 : 0;
      
      // Swiperを更新
      interviewSwiper.update();
      
      // リサイズ後にスライドを調整
      setTimeout(() => {
        interviewSwiper.slideTo(targetSlide, 300);
      }, 100);
    }
  });

  // スクロールアニメーション機能
  function fadeAnimation() {
    document.querySelectorAll('.js-fadeInUp').forEach(function(element) {
      const elemPos = element.getBoundingClientRect().top + window.pageYOffset;
      const windowHeight = window.innerHeight;
      const scrollPos = window.pageYOffset + windowHeight - 100;

      if (scrollPos > elemPos) {
        element.classList.add('visible');
      }
    });
  }

  // ページトップボタンの表示/非表示制御
  function togglePageTopButton() {
    const pageTopButton = document.getElementById('page-top');
    const footer = document.querySelector('.footer');
    
    if (window.pageYOffset > 300) {
      pageTopButton.classList.add('visible');
    } else {
      pageTopButton.classList.remove('visible');
    }
    
    // PCのときのみフッターが画面に現れたときにbottomを9remに変更
    if (footer && window.innerWidth > 768) {
      const footerRect = footer.getBoundingClientRect();
      const windowHeight = window.innerHeight;
      
      // フッターが画面内に現れたかどうかを判定
      if (footerRect.top < windowHeight) {
        pageTopButton.style.bottom = '9rem';
      } else {
        pageTopButton.style.bottom = ''; // デフォルト値に戻す
      }
    } else if (window.innerWidth <= 768) {
      // スマホ・タブレットの場合はデフォルト値に戻す
      pageTopButton.style.bottom = '';
    }
  }

  // ページトップボタンのクリックイベント
  const pageTopButton = document.getElementById('page-top');
  if (pageTopButton) {
    pageTopButton.addEventListener('click', () => {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });
  }

  // 初期実行
  fadeAnimation();
  togglePageTopButton();

  // スクロール時に実行
  window.addEventListener('scroll', () => {
    fadeAnimation();
    togglePageTopButton();
  });
  
  } catch (error) {
    console.error('JavaScript error occurred:', error);
  }
});