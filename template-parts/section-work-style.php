<section class="section section--work-style" id="work-style">
  <div class="section__inner inner">
    <h2 class="section__title">WORK STYLE</h2>
    <div class="work__contents">
      <div class="work__grid">
        <?php
        $work_items = [
          [
            'title' => '社会保険完備',
            'desc'  => '雇用・労災・健康・厚生年金',
          ],
          [
            'title' => '案件選択制',
            'desc'  => '常時3000件以上の案件から選択',
          ],
          [
            'title' => 'キャリア支援制度',
            'desc'  => 'エンジニア出身の営業/経営陣がサポート',
          ],
          [
            'title' => '資格取得支援制度',
            'desc'  => '不合格の場合でも会社で負担',
          ],
          [
            'title' => 'テックチャレンジ',
            'desc'  => '年間12万円までの書籍購入やUdemyなどに会社で負担',
          ],
          [
            'title' => 'ビジネス創出チャレンジ',
            'desc'  => '自分のアイディアを新規事業として実現',
          ],
          [
            'title' => 'フリーランス制度',
            'desc'  => '独立に向けた支援が可能',
          ],
          [
            'title' => '副業OK',
            'desc'  => '副業にも協力的な職場です',
          ],
          [
            'title' => 'ウェルカム休暇',
            'desc'  => '入社時に5日間の休暇を付与',
          ],
          [
            'title' => 'ハッピーウェディング休暇',
            'desc'  => '結婚時に使える2日間の休暇',
          ],
          [
            'title' => 'バースデーギフト',
            'desc'  => '毎年会社からギフトが届きます',
          ],
          [
            'title' => '結婚出産お祝い金',
            'desc'  => '会社からご祝儀があります',
          ],
        ];
        foreach ($work_items as $i => $item): ?>
        <div class="work__item">
          <p class="work__item-number"><?php printf('%02d', $i + 1); ?></p>
          <div class="work__item-text">
            <p class="work__item-head"><?php echo esc_html($item['title']); ?></p>
            <p class="work__item-description"><?php echo esc_html($item['desc']); ?></p>
          </div>
          <div class="work__item-image">
            <img src="<?php echo get_template_directory_uri(); ?>/image/work_style_icon_<?php printf('%02d', $i + 1); ?>.png" alt="">
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
