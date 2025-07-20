<section class="section section--interview" id="interview">
  <div class="section__inner inner">
    <div class="interview__title-group">
      <h2 class="section__title section__title--interview">INTERVIEW</h2>
      <p class="interview__title-sub">
        FREEDGEで働くメンバーの「リアルな声」をご紹介します。<br>
        日々の業務内容やプライベートの過ごし方など、メンバーの日常をぜひご覧ください。
      </p>
    </div>
    <div class="interview__body">
      <div id="interview-swiper" class="swiper interview-swiper">
        <div class="swiper-wrapper">
          <?php
          $args = [
            'post_type' => 'interview',
            'posts_per_page' => -1,
            'orderby' => 'date',
            'order' => 'DESC',
          ];
          $interview_query = new WP_Query($args);
          $modal_count = 0;
          if ($interview_query->have_posts()):
            while ($interview_query->have_posts()): $interview_query->the_post();
              $modal_count++;
              $name_initial = get_post_meta(get_the_ID(), 'interview_name_initial', true);
              $career = get_post_meta(get_the_ID(), 'interview_career', true);
              $image_id = get_post_meta(get_the_ID(), 'interview_image', true);
              $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'medium') : '';
          ?>
          <div class="swiper-slide" data-modal="modal-<?php echo $modal_count; ?>">
            <div class="interview__item">
              <div class="interview__item-image">
                <?php if (!empty($image_url)): ?>
                  <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($name_initial); ?>">
                <?php endif; ?>
              </div>
              <div class="interview__item-text">
                <p class="interview__name"><span><?php echo esc_html($name_initial); ?></span>さん</p>
                <p class="interview__experience"><?php echo esc_html($career); ?></p>
              </div>
            </div>
          </div>
          <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
      </div>
      <div class="interview__swiper-pagination">
        <div class="swiper-button-prev swiper-button-prev-interview"></div>
        <div class="swiper-button-next swiper-button-next-interview"></div>
      </div>
    </div>

    <div class="interview__modals">
      <?php
      $interview_query = new WP_Query($args);
      $modal_count = 0;
      if ($interview_query->have_posts()):
        while ($interview_query->have_posts()): $interview_query->the_post();
          $modal_count++;
          $name_initial = get_post_meta(get_the_ID(), 'interview_name_initial', true);
          $career = get_post_meta(get_the_ID(), 'interview_career', true);
          $image_id = get_post_meta(get_the_ID(), 'interview_image', true);
          $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'medium') : '';
          $self_introduction = get_post_meta(get_the_ID(), 'self_introduction', true);
          $reason = get_post_meta(get_the_ID(), 'reason', true);
          $hobby = get_post_meta(get_the_ID(), 'hobby', true);
      ?>
      <div id="modal-<?php echo $modal_count; ?>" class="interview__modal">
        <div class="interview__modal-contents">
          <div class="interview__modal-inner">
            <div class="interview__modal-image">
              <div class="interview__item">
                <div class="interview__item-image">
                  <?php if (!empty($image_url)): ?>
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($name_initial); ?>">
                  <?php endif; ?>
                </div>
                <div class="interview__item-text">
                  <p class="interview__name"><span><?php echo esc_html($name_initial); ?></span>さん</p>
                  <p class="interview__experience"><?php echo esc_html($career); ?></p>
                </div>
              </div>
            </div>
            <div class="interview__modal-text">
              <div class="interview__modal-text-group">
                <h3 class="interview__modal-text-head">自己紹介</h3>
                <p class="interview__modal-text-description"><?php echo esc_html($self_introduction); ?></p>
              </div>
              <div class="interview__modal-text-group">
                <h3 class="interview__modal-text-head">FREEDGEを選んだ理由</h3>
                <p class="interview__modal-text-description"><?php echo esc_html($reason); ?></p>
              </div>
              <div class="interview__modal-text-group">
                <h3 class="interview__modal-text-head">趣味や休日の過ごし方</h3>
                <p class="interview__modal-text-description"><?php echo esc_html($hobby); ?></p>
              </div>
            </div>
            <span class="interview__modal-cancel"></span>
          </div>
        </div>
      </div>
      <?php endwhile; wp_reset_postdata(); endif; ?>
    </div>
  </div>
</section>