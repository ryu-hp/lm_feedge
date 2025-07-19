<section class="section section--work-style" id="work-style">
  <div class="section__inner container">
    <h2 class="section__title">WORK STYLE</h2>
    <div class="work__contents">
      <div class="work__grid">
        <?php for ($i = 1; $i <= 12; $i++): ?>
        <div class="work__item">
          <p class="work__item-number"><?php printf('%02d', $i); ?></p>
          <div class="work__item-text">
            <p class="work__item-head"><?php /* 各項目のタイトルを配列で管理しても良い */ ?></p>
            <p class="work__item-description"><?php /* 各項目の説明を配列で管理しても良い */ ?></p>
          </div>
          <div class="work__item-image">
            <img src="<?php echo get_template_directory_uri(); ?>/image/work_style_icon_<?php printf('%02d', $i); ?>.png" alt="">
          </div>
        </div>
        <?php endfor; ?>
      </div>
    </div>
  </div>
</section>
