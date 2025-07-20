<div class="slide-image">
  <div id="image-swiper" class="swiper image-swiper">
    <div class="swiper-wrapper">
      <?php for ($repeat = 1; $repeat <= 3; $repeat++): ?>
        <?php for ($i = 1; $i <= 4; $i++): ?>
          <div class="swiper-slide">
            <img src="<?php echo get_template_directory_uri(); ?>/image/about_slide_0<?php echo $i; ?>.jpg" alt="FREEDGEの従業員の様子">
          </div>
        <?php endfor; ?>
      <?php endfor; ?>
    </div>
  </div>
</div>
