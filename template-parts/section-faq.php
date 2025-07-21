<section class="section section--faq" id="faq">
  <div class="section__inner inner section__faq--inner">
    <div class="faq__flex">
      <h2 class="section__title section__title--faq js-fadeInUp">FAQ</h2>
      <?php
      $args = [
        'post_type' => 'faq',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'ASC'
      ];
      $faq_query = new WP_Query($args);

      if ($faq_query->have_posts()):
      ?>
      <div class="faq__body">
      <?php while ($faq_query->have_posts()): $faq_query->the_post(); ?>
        <?php
          $question = get_field('question');
          $answer = get_field('answer');
        ?>
        <?php if ($question && $answer): ?>
          <div class="faq__item js-fadeInUp">
            <div class="faq__question">
              <p class="faq__icon">Q</p>
              <h3 class="faq__description"><?= esc_html($question); ?></h3>
            </div>
            <div class="faq__answer">
              <p class="faq__icon">A</p>
              <p class="faq__description"><?= esc_html($answer); ?></p>
            </div>
          </div>
        <?php endif; ?>
      <?php endwhile; wp_reset_postdata(); ?>
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>
