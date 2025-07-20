<section class="section section--work-style" id="work-style">
  <div class="section__inner inner">
    <h2 class="section__title">WORK STYLE</h2>
    <div class="work-style__head-group">
      <p class="work-style__head-en second-font-family">culture</p>
      <p class="work-style__head-ja">社内制度<span>・</span>福利厚生</p>
    </div>
    <div class="work__contents">
      <div class="work__grid">
        <?php
        $args = [
          'post_type' => 'work_style',
          'posts_per_page' => -1,
          'orderby' => 'date',
          'order' => 'ASC'
        ];
        $work_style_query = new WP_Query($args);
        
        if ($work_style_query->have_posts()):
          $counter = 1;
          while ($work_style_query->have_posts()): $work_style_query->the_post();
            $work_style_head = get_post_meta(get_the_ID(), 'work_style_head', true);
            $work_style_description = get_post_meta(get_the_ID(), 'work_style_description', true);
            $work_style_image_id = get_post_meta(get_the_ID(), 'work_style_image', true);
            $work_style_image_url = $work_style_image_id ? wp_get_attachment_image_url($work_style_image_id, 'full') : '';
        ?>
        <div class="work__item">
          <p class="work__item-number"><?php printf('%02d', $counter); ?></p>
          <div class="work__item-text">
            <p class="work__item-head"><?php echo esc_html($work_style_head); ?></p>
            <p class="work__item-description"><?php echo esc_html($work_style_description); ?></p>
          </div>
          <div class="work__item-image">
            <?php if (!empty($work_style_image_url)): ?>
              <img src="<?php echo esc_url($work_style_image_url); ?>" alt="<?php echo esc_attr($work_style_head); ?>">
            <?php endif; ?>
          </div>
        </div>
        <?php
            $counter++;
          endwhile;
          wp_reset_postdata();
        endif;
        ?>
      </div>
    </div>
  </div>
</section>
