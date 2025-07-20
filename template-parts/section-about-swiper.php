<div class="slide-image">
  <div id="image-swiper" class="swiper image-swiper">
    <div class="swiper-wrapper">
      <?php
      // image_slide投稿タイプから画像を取得
      $args = [
        'post_type' => 'image_slide',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'ASC'
      ];
      $image_slide_query = new WP_Query($args);
      $slide_images = [];
      
      if ($image_slide_query->have_posts()):
        while ($image_slide_query->have_posts()): $image_slide_query->the_post();
          $image_id = get_post_meta(get_the_ID(), 'image_slide_image', true);
          $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'full') : '';
          if (!empty($image_url)) {
            $slide_images[] = $image_url;
          }
        endwhile;
        wp_reset_postdata();
      endif;
      
      // 3回繰り返して出力
      for ($repeat = 1; $repeat <= 3; $repeat++):
        foreach ($slide_images as $image_url):
      ?>
        <div class="swiper-slide">
          <img src="<?php echo esc_url($image_url); ?>" alt="FREEDGEの従業員の様子">
        </div>
      <?php
        endforeach;
      endfor;
      ?>
    </div>
  </div>
</div>
