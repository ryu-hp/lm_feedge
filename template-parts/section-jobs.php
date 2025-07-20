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
            // モーダル用のカスタムフィールドを取得
            $job_duties = get_post_meta(get_the_ID(), 'job_duties', true);
            $job_requirements = get_post_meta(get_the_ID(), 'job_requirements', true);
            $job_welcome_skills = get_post_meta(get_the_ID(), 'job_welcome_skills', true);
            $job_useful_skills = get_post_meta(get_the_ID(), 'job_useful_skills', true);
            $job_ideal_person = get_post_meta(get_the_ID(), 'job_ideal_person', true);
            $employment_type = get_post_meta(get_the_ID(), 'employment_type', true);
            $salary = get_post_meta(get_the_ID(), 'salary', true);
            $bonus_raise = get_post_meta(get_the_ID(), 'bonus_raise', true);
            $benefits = get_post_meta(get_the_ID(), 'benefits', true);
            $working_hours = get_post_meta(get_the_ID(), 'working_hours', true);
            $holidays_vacation = get_post_meta(get_the_ID(), 'holidays_vacation', true);
            $work_location = get_post_meta(get_the_ID(), 'work_location', true);
            $access = get_post_meta(get_the_ID(), 'access', true);
        ?>
          <div id="job-<?php echo sprintf('%02d', $job_counter); ?>" class="jobs__item" data-modal="job-modal-<?php echo sprintf('%02d', $job_counter); ?>">
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

          <!-- Job Modal -->
          <div id="job-modal-<?php echo sprintf('%02d', $job_counter); ?>" class="job-modal">
            <div class="job-modal__inner">
              <div class="job-modal__wrapper">
                <div class="job-modal__head">
                  <h2 class="job-modal__title"><?php echo esc_html($job); ?></h2>
                  <span class="job-modal__close"></span>
                </div>
                <div class="job-modal__content">
                  <div class="job-modal__top-content">
                    <?php if ($job_duties): ?>
                    <div class="job-modal__item">
                      <h3 class="job-modal__item-title">業務内容</h3>
                      <p class="job-modal__item-description">
                        <?php echo nl2br(esc_html($job_duties)); ?>
                      </p>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($job_requirements): ?>
                    <div class="job-modal__item">
                      <h3 class="job-modal__item-title">必須条件</h3>
                      <p class="job-modal__item-description">
                        <?php echo nl2br(esc_html($job_requirements)); ?>
                      </p>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($job_welcome_skills): ?>
                    <div class="job-modal__item">
                      <h3 class="job-modal__item-title">歓迎要件</h3>
                      <p class="job-modal__item-description">
                        <?php echo nl2br(esc_html($job_welcome_skills)); ?>
                      </p>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($job_useful_skills): ?>
                    <div class="job-modal__item">
                      <h3 class="job-modal__item-title">活かせるスキル</h3>
                      <p class="job-modal__item-description">
                        <?php echo nl2br(esc_html($job_useful_skills)); ?>
                      </p>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($job_ideal_person): ?>
                    <div class="job-modal__item">
                      <h3 class="job-modal__item-title">こんな方にピッタリ！</h3>
                      <p class="job-modal__item-description">
                        <?php echo nl2br(esc_html($job_ideal_person)); ?>
                      </p>
                    </div>
                    <?php endif; ?>
                  </div>
                  <div class="job-modal__bottom-content">
                    <?php if ($employment_type): ?>
                    <div class="job-modal__table-item">
                      <p class="job-modal__table-item-head">雇用形態</p>
                      <p class="job-modal__table-item-description"><?php echo nl2br(esc_html($employment_type)); ?></p>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($salary): ?>
                    <div class="job-modal__table-item">
                      <p class="job-modal__table-item-head">給料</p>
                      <p class="job-modal__table-item-description">
                        <?php echo nl2br(esc_html($salary)); ?>
                      </p>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($bonus_raise): ?>
                    <div class="job-modal__table-item">
                      <p class="job-modal__table-item-head">昇給・賞与</p>
                      <p class="job-modal__table-item-description">
                        <?php echo nl2br(esc_html($bonus_raise)); ?>
                      </p>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($benefits): ?>
                    <div class="job-modal__table-item">
                      <p class="job-modal__table-item-head">諸手当</p>
                      <p class="job-modal__table-item-description">
                        <?php echo nl2br(esc_html($benefits)); ?>
                      </p>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($working_hours): ?>
                    <div class="job-modal__table-item">
                      <p class="job-modal__table-item-head">勤務時間</p>
                      <p class="job-modal__table-item-description">
                        <?php echo nl2br(esc_html($working_hours)); ?>
                      </p>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($holidays_vacation): ?>
                    <div class="job-modal__table-item">
                      <p class="job-modal__table-item-head">休日・休暇</p>
                      <p class="job-modal__table-item-description">
                        <?php echo nl2br(esc_html($holidays_vacation)); ?>
                      </p>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($work_location): ?>
                    <div class="job-modal__table-item">
                      <p class="job-modal__table-item-head">勤務地</p>
                      <p class="job-modal__table-item-description">
                        <?php echo nl2br(esc_html($work_location)); ?>
                      </p>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($access): ?>
                    <div class="job-modal__table-item">
                      <p class="job-modal__table-item-head">アクセス</p>
                      <p class="job-modal__table-item-description">
                        <?php echo nl2br(esc_html($access)); ?>
                      </p>
                    </div>
                    <?php endif; ?>
                  </div>
                  <div class="job-modal__button">
                    <a href="#entry-form" class="button button--primary">エントリーする</a>
                  </div>
                </div>
              </div>
            </div>
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
