<?php
function lm_feedge_setup() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('automatic-feed-links');
  add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
}
add_action('after_setup_theme', 'lm_feedge_setup');

function lm_feedge_scripts() {
  // CSSは常にキャッシュクリア、JSはテーマバージョン使用
  $css_version = date('YmdHis');
  $js_version = wp_get_theme()->get('Version');
  
  // Swiperを確実に読み込み
  wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0');
  wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', true);
  
  // カスタムCSS/JS（キャッシュクリア用パラメータ付き）
  $cache_param = '?v=' . date('YmdHis');
  wp_enqueue_style('lm-feedge-style', get_template_directory_uri() . '/css/style.css' . $cache_param, array(), $css_version);
  wp_enqueue_script('lm-feedge-script', get_template_directory_uri() . '/js/script.js' . $cache_param, array('swiper'), $js_version, true);
  
  // SpeakerDeck埋め込みスクリプト
  wp_enqueue_script('speakerdeck-embed', 'https://speakerdeck.com/assets/embed.js', array(), null, true);
  
  // デバッグ情報をブラウザに渡す
  wp_localize_script('lm-feedge-script', 'themeData', array(
    'debug' => WP_DEBUG,
    'templateUrl' => get_template_directory_uri(),
    'ajaxUrl' => admin_url('admin-ajax.php'),
  ));
}
add_action('wp_enqueue_scripts', 'lm_feedge_scripts');

// Contact Form 7 の自動 <p><br> を削除
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
    return false;
}
