<section class="section section--services" id="services">
  <div class="section__inner inner">
    <div class="services__title-group">
      <h2 class="section__title section__title--services js-fadeInUp">OUR SERVICES</h2>
      <p class="services__title-sub services__title-sub--services js-fadeInUp">会社案内</p>
    </div>
    <?php
    // our_services投稿タイプからデータを取得
    $args = [
      'post_type' => 'our_servはこれをices',
      'posts_per_page' => 1,
      'orderby' => 'date',
      'order' => 'DESC'
    ];
    $our_services_query = new WP_Query($args);
    
    if ($our_services_query->have_posts()):
      while ($our_services_query->have_posts()): $our_services_query->the_post();
        // $pdf_id = get_post_meta(get_the_ID(), 'our_services_pdf', true);
        // $pdf_url = $pdf_id ? wp_get_attachment_url($pdf_id) : '';
        // $image_id = get_post_meta(get_the_ID(), 'our_services_image', true);
        // $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'full') : '';
        $speaker_deck_url = get_post_meta(get_the_ID(), 'speaker_deck_url', true);
    ?>
      <?php if (!empty($speaker_deck_url)): ?>
      <div class="services__pdf js-fadeInUp">
        <iframe class="speakerdeck-iframe" frameborder="0" src="<?php echo esc_url($speaker_deck_url); ?>" title="FREEDGE_pdf_01" allowfullscreen="true" style="border: 0px; background: padding-box padding-box rgba(0, 0, 0, 0.1); margin: 0px; padding: 0px; border-radius: 6px; box-shadow: rgba(0, 0, 0, 0.2) 0px 5px 40px; width: 100%; height: auto; aspect-ratio: 560 / 396;" data-ratio="1.4141414141414141"></iframe>
      </div>
      <?php endif; ?>
    <?php
      endwhile;
      wp_reset_postdata();
    endif;
    ?>
  </div>
</section>
