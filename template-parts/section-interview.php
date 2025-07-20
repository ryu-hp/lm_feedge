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
          // まず全インタビュー投稿を配列に格納
          $args = [
            'post_type'      => 'interview',
            'posts_per_page' => -1,
            'orderby'        => 'date',
            'order'          => 'DESC',
          ];
          $interview_query = new WP_Query($args);
          $interview_items = [];
          if ($interview_query->have_posts()):
            while ($interview_query->have_posts()): $interview_query->the_post();
              $name_initial = get_post_meta(get_the_ID(), 'interview_name_initial', true);
              $career      = get_post_meta(get_the_ID(), 'interview_career', true);
              $image_id    = get_post_meta(get_the_ID(), 'interview_image', true);
              $image_url   = $image_id ? wp_get_attachment_image_url($image_id, 'medium') : '';
              $interview_items[] = [
                'name_initial' => $name_initial,
                'career'       => $career,
                'image_url'    => $image_url,
              ];
            endwhile;
            wp_reset_postdata();
          endif;

          // 2回繰り返して出力
          for ($repeat = 0; $repeat < 2; $repeat++) {
            foreach ($interview_items as $item):
          ?>
          <div class="swiper-slide">
            <div class="interview__item">
              <div class="interview__item-image">
                <?php if (!empty($item['image_url'])): ?>
                  <img src="<?php echo esc_url($item['image_url']); ?>" alt="<?php echo esc_attr($item['name_initial']); ?>">
                <?php endif; ?>
              </div>
              <div class="interview__item-text">
                <p class="interview__name"><span><?php echo esc_html($item['name_initial']); ?></span>さん</p>
                <p class="interview__experience"><?php echo esc_html($item['career']); ?></p>
              </div>
            </div>
          </div>
          <?php
            endforeach;
          }
          ?>
        </div>
      </div>
      <div class="interview__swiper-pagination">
        <div class="swiper-button-prev swiper-button-prev-interview"></div>
        <div class="swiper-button-next swiper-button-next-interview"></div>
      </div>
    </div>
  </div>
</section>
