<section class="section section--interview" id="interview">
  <div class="section__inner container">
    <div class="interview__title-group">
      <h2 class="section__title">INTERVIEW</h2>
      <p class="interview__title-sub">
        FREEDGEで働くメンバーの「リアルな声」をご紹介します。<br>
        日々の業務内容やプライベートの過ごし方など、メンバーの日常をぜひご覧ください。
      </p>
    </div>
    <div class="interview__body">
      <div id="interview-swiper" class="swiper interview-swiper">
        <div class="swiper-wrapper">
          <?php for ($i = 1; $i <= 3; $i++): ?>
            <div class="swiper-slide">
              <div class="interview__item">
                <div class="interview__item-image">
                  <img src="<?php echo get_template_directory_uri(); ?>/image/interview_image_0<?php echo $i; ?>.jpg" alt="S.Nさん">
                </div>
                <div class="interview__item-text">
                  <p class="interview__name">S.Nさん</p>
                  <p class="interview__experience">ITエンジニア経験年数 5年</p>
                </div>
              </div>
            </div>
          <?php endfor; ?>
          <?php for ($i = 1; $i <= 3; $i++): ?>
            <div class="swiper-slide">
              <div class="interview__item">
                <div class="interview__item-image">
                  <img src="<?php echo get_template_directory_uri(); ?>/image/interview_image_0<?php echo $i; ?>.jpg" alt="S.Nさん">
                </div>
                <div class="interview__item-text">
                  <p class="interview__name">S.Nさん</p>
                  <p class="interview__experience">ITエンジニア経験年数 5年</p>
                </div>
              </div>
            </div>
          <?php endfor; ?>
        </div>
      </div>
      <div class="interview__swiper-pagination">
        <div class="swiper-button-prev swiper-button-prev-interview"></div>
        <div class="swiper-button-next swiper-button-next-interview"></div>
      </div>
    </div>
  </div>
</section>
