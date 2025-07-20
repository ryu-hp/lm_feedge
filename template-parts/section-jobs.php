<section class="section section--jobs" id="jobs">
  <div class="section__inner inner">
    <div class="jobs__flex">
      <div class="jobs__title-group">
        <h2 class="section__title section__title--jobs">job</h2>
        <p>
          FREEDGEは、エンジニアをはじめとしたプロフェッショナルな人材を募集中です。<br>
          自由な働き方と成長できる環境で、あなたの力を発揮してください。
        </p>
      </div>
      <div class="jobs__contents">
        <?php
        // jobs投稿タイプから求人データを取得
        $args = [
          'post_type' => 'jobs',
          'posts_per_page' => -1,
          'orderby' => 'date',
          'order' => 'ASC'
        ];
        $jobs_query = new WP_Query($args);
        
        if ($jobs_query->have_posts()):
          $job_counter = 1;
          while ($jobs_query->have_posts()): $jobs_query->the_post();
            $job = get_post_meta(get_the_ID(), 'job', true);
            $job_description = get_post_meta(get_the_ID(), 'job_description', true);
        ?>
          <div id="job-<?php echo sprintf('%02d', $job_counter); ?>" class="jobs__item">
            <div class="jobs__item-head">
              <h3 class="jobs__item-head-main">
                <?php echo esc_html($job); ?>
              </h3>
              <div class="jobs__item-arrow">
                <img src="<?php echo get_template_directory_uri(); ?>/image/job-arrow.svg">
              </div>
            </div>
            <p class="jobs__item-description">
              <?php echo esc_html($job_description); ?>
            </p>
          </div>
        <?php
            $job_counter++;
          endwhile;
          wp_reset_postdata();
        endif;
        ?>
      </div>
    </div>
  </div>
</section>
