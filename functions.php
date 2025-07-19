<?php
function lm_feedge_setup() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('automatic-feed-links');
  add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
}
add_action('after_setup_theme', 'lm_feedge_setup');

function lm_feedge_scripts() {
  wp_enqueue_style('lm-feedge-style', get_template_directory_uri() . '/css/style.css', array(), null);
  wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), null);
  wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), null, true);
  wp_enqueue_script('lm-feedge-script', get_template_directory_uri() . '/js/script.js', array('swiper'), null, true);
}
add_action('wp_enqueue_scripts', 'lm_feedge_scripts');
