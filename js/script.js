jQuery(function ($) { // この中であればWordpressでも「$」が使用可能になる
  let imageSwiper = new Swiper ('.image-swiper', {
  
    // オプション設定
    slidesPerView: 'auto',
    loop: true,
    centeredSlides: true, // アクティブなスライドを中央に配置
    //オートプレイ
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    }, 
    //ページネーション表示設定
    pagination: {
      el: '#image-swiper_pagination', //ページネーション要素
      type: 'bullets', //ページネーションの種類
      clickable: true, //クリックに反応させる
    },
  
  });
})