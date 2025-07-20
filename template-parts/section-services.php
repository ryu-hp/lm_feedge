<section class="section section--services" id="services">
  <div class="section__inner inner">
    <div class="services__title-group">
      <h2 class="section__title section__title--services">OUR SERVICES</h2>
      <p class="services__title-sub services__title-sub--services">会社案内</p>
    </div>
    <?php
    // our_services投稿タイプからデータを取得
    $args = [
      'post_type' => 'our_services',
      'posts_per_page' => 1,
      'orderby' => 'date',
      'order' => 'DESC'
    ];
    $our_services_query = new WP_Query($args);
    
    if ($our_services_query->have_posts()):
      while ($our_services_query->have_posts()): $our_services_query->the_post();
        $pdf_id = get_post_meta(get_the_ID(), 'our_services_pdf', true);
        $pdf_url = $pdf_id ? wp_get_attachment_url($pdf_id) : '';
        $image_id = get_post_meta(get_the_ID(), 'our_services_image', true);
        $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'full') : '';
    ?>
      <?php if (!empty($pdf_url) && !empty($image_url)): ?>
        <a href="<?php echo esc_url($pdf_url); ?>" target="_blank" class="services__pdf">
          <img src="<?php echo esc_url($image_url); ?>" alt="会社案内の資料">
        </a>
      <?php endif; ?>
    <?php
      endwhile;
      wp_reset_postdata();
    endif;
    ?>
  </div>
</section>
