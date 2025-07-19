<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=1440">
  <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="header">
  <div class="header__inner container">
    <div class="header__logo">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="header__logo-link">
        <img src="<?php echo get_template_directory_uri(); ?>/image/logo_icon_text.png" alt="FREEDGE">
      </a>
    </div>
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
</header>
