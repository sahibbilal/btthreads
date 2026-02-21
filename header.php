<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- FontAwesome for menu icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <?php wp_head(); ?>
  <style>
    @media (min-width: 768px) {
      #site-header .container{
        flex-direction:column;
      }
    }
    .enquiry_link {
      top: calc(60% - 165px) !important;
    }
    .header-social i{
      color:white;
    }
    .header-social {
      top: calc(60% - 198px) !important;
      position: fixed;
      left: 0;
      z-index: 9999;
      flex-direction: column;
      background: #8d2929;
      color: white !important;
    }
    #site-header {
      padding:10px 0px !important;
    }
    /* Hamburger menu style */
    .mobile-hamburger {
      display: none;
      font-size: 24px;
      cursor: pointer;
    }
    @media (max-width: 1200px) and (min-width: 993px) {
        .custom-logo {
          width: auto !important;
          height: 180px !important;
        }
    }
    @media (max-width: 992px) and (min-width: 768px) {
        .custom-logo {
          width: auto !important;
          height: 140px !important;
        }
    }
    @media (max-width: 767px) and (min-width: 576px) {
        .custom-logo {
          width: auto !important;
          height: 100px !important;
        }
    }
    @media (max-width: 575px) {
        .custom-logo {
          width: auto !important;
          height: 60px !important;
        }
    }
    @media (max-width: 992px) {
       .container {
            max-width: 100% !important;
        }
    }
    @media (max-width: 768px) {
    .plx-target .count_sec {
      padding:0px 0 0;
    }
    .count_sec > ul:nth-child(2) {
      min-height:400px;
    }
    .yarn-block li {
      display:flex !important;
      text-align:center;
      justify-content:center;
    }
    .about_sec .info_content {
      text-align:center;
    }
    .corp_sec .corp_cont {
      text-align:center !important;
    }
    .vidopad {
      padding-top:0px;
      margin-bottom:0px;
    }
    .corp_sec .corp_cont p {
      text-align:center;
    }
    #site-navigation ul {
      display:block;
    }
    .info_content p {
      text-align:center;
    }
    .product_sec .pro_foot {
      margin-bottom:0px;
      text-align:center;
    }
    .product_sec .product_cont {
      text-align:center;
    }
    .product_sec ul.tabs-links li {
      width:100%;
    }
    .partner_sec {
      padding-top:0px;
    }
      .mobile-hamburger {
        display: block;
        position: absolute;
        top: 25px;
        right: 20px;
        z-index: 1001;
      }

      /* Hide social icons in mobile */
      .header-social {
        display: none !important;
      }

      /* Mobile nav toggle style */
      #site-navigation {
        display: none;
        position: absolute;
        top: 90px;
        left: 0;
        width: 100%;
        background-color: #fff;
        padding: 20px;
        z-index: 1000;
      }

      #site-navigation.active {
        display: block;
      }

      .main-menu {
        flex-direction: column !important;
        gap: 0 !important;
      }

      .main-menu > li {
        display: flex;
        align-items: center;
        padding: 12px 0;
        font-weight: bold;
        border-bottom: 1px solid #eee;
      }

      .main-menu > li::before {
        content: "\f105";
        font-family: "Font Awesome 6 Free";
        font-weight: 900;
        margin-right: 10px;
      }
    }
  </style>
</head>

<body <?php body_class(); ?>>
<!-- Social Icons -->
      <div class="header-social d-flex align-items-center gap-3">
          <a href="https://facebook.com" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
          <a href="https://twitter.com" target="_blank" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
          <a href="https://instagram.com" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
          <a href="https://youtube.com" target="_blank" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
          <a href="https://linkedin.com" target="_blank" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
      </div>
<header id="site-header">
  <div class="container d-flex align-items-center justify-content-between">
    <!-- Logo -->
    <div class="site-logo">
      <?php if ( has_custom_logo() ) : ?>
        <div class="site-logo">
            <?php the_custom_logo(); ?>
        </div>
        <?php
      else : ?>
        <div class="site-logo">
          <a href="<?php echo esc_url( home_url('/') ); ?>" class="custom-logo-link" rel="home">
            <img style="height:150px;width:150px;"  src="https://btthreads.com/wp-content/uploads/2025/07/fallback-image.png"  alt="<?php bloginfo('name'); ?>">
          </a>
        </div>
        <?php
      endif; ?>
    </div>
    <!-- Mobile Hamburger Icon -->
    <div class="mobile-hamburger" onclick="toggleMobileMenu()">
      <i class="fas fa-bars"></i>
    </div>
    <!-- Navigation + Social (desktop only) -->
    <div class='main-navigation'>

      <!-- Main Menu -->
      <nav id="site-navigation" class="main-navigation">
          <?php
          wp_nav_menu( array(
              'theme_location' => 'main_menu',
              'container'      => false,
              'menu_class'     => 'main-menu d-flex gap-4 list-unstyled mb-0',
              'fallback_cb'    => false
          ));
          ?>
      </nav>
    </div>
  </div>
</header>

<main id="content" class="site-content">
<script>
  function toggleMobileMenu() {
    const nav = document.getElementById('site-navigation');
    nav.classList.toggle('active');
  }
</script>