<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <!-- Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-SRFS3H1TJG"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-SRFS3H1TJG');
  </script>
  <!-- End Google Analytics -->
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title> -->
  <title>FREEDGE採用サイト</title>
  <meta name="description" content="あなたの自由と本気で向き合う会社">
  <meta name="keywords" content="FREEDGE,採用,転職,求人,エンジニア,キャリア,自由,本気">
  
  <!-- OGP設定 -->
  <meta property="og:title" content="FREEDGE採用サイト">
  <meta property="og:description" content="あなたの自由と本気で向き合う会社">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://www.freedge.co.jp/recruit">
  <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/image/logo-squeare.webp">
  <meta property="og:site_name" content="FREEDGE採用サイト">
  <meta property="og:locale" content="ja_JP">
  
  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:title" content="FREEDGE採用サイト">
  <meta name="twitter:description" content="あなたの自由と本気で向き合う会社 - FREEDGE採用サイト">
  <meta name="twitter:image" content="<?php echo get_template_directory_uri(); ?>/image/logo-squeare.webp">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="header">
  <div class="header__inner inner">
    <div class="header__logo">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="header__logo-link">
        <img src="<?php echo get_template_directory_uri(); ?>/image/logo_icon_text.png" alt="FREEDGE">
      </a>
    </div>
    
    <!-- ハンバーガーメニューボタン（スマホのみ表示） -->
    <button class="header__hamburger hamburger" id="hamburger-btn">
      <span class="hamburger__line"></span>
      <span class="hamburger__line"></span>
    </button>
    
    <!-- PCナビゲーション -->
    <nav class="header__nav nav">
      <ul class="nav__list">
        <li class="nav__item"><a href="#about" class="nav__link">ABOUT</a></li>
        <li class="nav__item"><a href="#work-style" class="nav__link">WORK STYLE</a></li>
        <li class="nav__item"><a href="#interview" class="nav__link">INTERVIEW</a></li>
        <li class="nav__item"><a href="#jobs" class="nav__link">JOBS</a></li>
        <li class="nav__item"><a href="#faq" class="nav__link">FAQ</a></li>
        <li class="nav__item"><a href="#services" class="nav__link">OUR SERVICES</a></li>
        <li class="nav__item"><a href="#entry" class="nav__link nav__link--primary">ENTRY</a></li>
      </ul>
    </nav>
  </div>
  
  <!-- ドロワーメニュー（スマホのみ） -->
  <div class="drawer" id="drawer">
    <div class="drawer__overlay" id="drawer-overlay"></div>
    <div class="drawer__content">
      <nav class="drawer__nav">
        <ul class="drawer__list">
          <li class="drawer__item"><a href="#about" class="drawer__link">ABOUT</a></li>
          <li class="drawer__item"><a href="#work-style" class="drawer__link">WORK STYLE</a></li>
          <li class="drawer__item"><a href="#interview" class="drawer__link">INTERVIEW</a></li>
          <li class="drawer__item"><a href="#jobs" class="drawer__link">JOBS</a></li>
          <li class="drawer__item"><a href="#faq" class="drawer__link">FAQ</a></li>
          <li class="drawer__item"><a href="#services" class="drawer__link">OUR SERVICES</a></li>
          <li class="drawer__item"><a href="#entry" class="drawer__link drawer__link--primary">ENTRY</a></li>
        </ul>
      </nav>
    </div>
  </div>
</header>
