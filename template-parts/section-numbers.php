<section class="section section--numbers" id="numbers">
  <div class="section__inner inner">
    <div class="section__title-group">
      <p class="section__title-sub section__title-sub--numbers js-fadeInUp">company by the numbers</p>
      <h2 class="section__title section__title--numbers js-fadeInUp">数字で見る<span class="">FREEDGE</span></h2>
    </div>
    <div class="numbers__grid">
      <?php
      // company_numbers投稿タイプから数値データを取得
      $args = [
        'post_type' => 'company_numbers',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'ASC'
      ];
      $company_numbers_query = new WP_Query($args);
      
      if ($company_numbers_query->have_posts()):
        while ($company_numbers_query->have_posts()): $company_numbers_query->the_post();
          $head = get_post_meta(get_the_ID(), 'company_numbers_head', true);
          $number = get_post_meta(get_the_ID(), 'company_numbers_number', true);
          $unit = get_post_meta(get_the_ID(), 'company_numbers_unit', true);
      ?>
        <div class="numbers__item js-fadeInUp">
          <p class="numbers__label"><?php echo esc_html($head); ?></p>
          <p class="numbers__value"><span><?php echo esc_html($number); ?></span><?php echo esc_html($unit); ?></p>
        </div>
      <?php
        endwhile;
        wp_reset_postdata();
      endif;
      ?>
    </div>
  </div>
</section>
