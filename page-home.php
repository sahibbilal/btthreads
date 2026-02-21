<?php



/* Template Name: Home Template */

get_header();

$post_id = get_queried_object_id();

$banner_count = have_rows('banner', $post_id) ? count(get_field('banner', $post_id)) : 0;

$innovation = get_field('innovation', $post_id);
$brands_group = get_field('brand_details');
$brands = $brands_group['brands'] ?? [];
$yarn_group = get_field('yarn_group');
$yarns = $yarn_group['yarn_details'] ?? [];
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<div class="wrapper">

  <section>

      <div class="container full_width" id="pinned_wrapper">

        <div class="row">

          <div class="col">

              <div id="HomeCarousel" data-pause="false" data-interval="7000" class="carousel carousel-fade">

                  <?php

                  if (have_rows('banner', $post_id)){

                    ?>

                    <ol class="carousel-indicators">

                      <?php $i = 0;

                      while (have_rows('banner', $post_id)) : the_row(); ?>

                        <li data-target="#HomeCarousel" data-slide-to="<?php echo $i; ?>" class="<?php echo $i === 0 ? 'active' : ''; ?>"></li>

                      <?php $i++; endwhile; ?>

                    </ol>

                    <?php 

                  }

                  ?>

                  <div class="carousel-inner">

                    <?php 

                    if (have_rows('banner', $post_id)) {

                      $index = 0;

                      while (have_rows('banner', $post_id)) { 

                        the_row();

                        $image = get_sub_field('banner_image');

                        $details = get_sub_field('banner_details');

                        $svg = get_sub_field('banner_svg');

                        $active_class = ($index === 0) ? ' active' : '';

                        ?>

                        <div class="carousel-item <?php echo $active_class; ?>">

                            <div class="home-img-sect">

                                <div class="banner-img" style="z-index:1;">

                                    <img itemprop="contenturl" class="thumb" src="<?php echo $image ; ?>" alt="<?php echo esc_attr($details); ?>">

                                    <div class="banner-text-shape">

                                      <?php echo $svg; ?>

                                    </div>

                                </div>

                                <div class="banner-text">

                                  <?php echo $details; ?>

                                </div>

                            </div>

                        </div>

                        <?php

                        $index++;

                      }

                    }

                    ?>

                  </div>

                  <div class="banner-controls">

                      <a class="carousel-control-prev" href="##HomeCarousel" role="button" data-slide="prev"><span class="sr-only">Previous</span></a>

                      <a class="carousel-control-next" href="##HomeCarousel" role="button" data-slide="next"><span class="sr-only">Next</span></a>

                      <div class="banner-info">

                          <div class="slide-curr">1</div>

                          <div class="slide-count"><?php echo esc_html($banner_count); ?></div>

                      </div>

                  </div>

              </div>

          </div>

        </div>

      </div>

  </section>

  <?php
  if ($innovation) {

    $title = $innovation['title'];

    $details = $innovation['details'];

    $read_more = $innovation['read_more'];

    $our_vision = $innovation['our_vision'];

    $image = $innovation['innovation_image'];

    ?>

    <section class="about_sec">

      <div class="container">

        <div class="about_cont img-sect-text">

          <div class="info_content">

            <?php if ($title): ?>

              <h2><?php echo esc_html($title); ?></h2>

            <?php endif; 

            if ($details): ?>

                <div><?php echo wp_kses_post($details); ?></div>

              <?php

            endif; ?>

            <ul class="btn_container">

              <?php if ($read_more): ?>

                <li>

                  <a href="<?php echo esc_url($read_more['url']); ?>" class="btn default-link" <?php if ($read_more['target']) echo 'target="' . esc_attr($read_more['target']) . '"'; ?>>

                    <?php echo esc_html($read_more['title']); ?>

                  </a>

                </li>

              <?php endif; ?>



              <?php if ($our_vision): ?>

                <li>

                  <a href="<?php echo esc_url($our_vision['url']); ?>" class="btn default-link btn-red" <?php if ($our_vision['target']) echo 'target="' . esc_attr($our_vision['target']) . '"'; ?>>

                    <?php echo esc_html($our_vision['title']); ?>

                  </a>

                </li>

              <?php endif; ?>

            </ul>

          </div>

        </div>

      </div>

      <div class="about_img">

        <figure>

          <img itemprop="contenturl" src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>">

        </figure>

      </div>

    </section>

    <?php 

  }?>

  <section class="plx-target">

    <div class="container">

      <div class="count_sec">

        <ul>

          <li class="count-data wow fadeInUp" data-wow-delay="0s" style="visibility: hidden; animation-delay: 0s; animation-name: none;">

            <div>

              <p>The amount of yarn we have produced can go</p>

              <h3 class="num counter"><span class="counter-value" data-count="35000"></span></h3>

              <h6 class="subtl">times</h6>

              <p>to the moon</p>

            </div>

            <div class="sprite_icon1"></div>

            <svg width="100%" height="100%" class="rect-shape">

              <rect width="100%" height="100%" style="fill:transparent;stroke:#aeaeae;stroke-width:1;opacity:1">

              </rect>

            </svg>

          </li>

          <li class="count-data wow  fadeInUp" data-wow-delay="0.5s" style="visibility: hidden; animation-delay: 0.5s; animation-name: none;">

            <div>

              <p>Highest polyester embroidery thread production capacity</p>

              <h3 class="num counter"><span class="counter-value" data-count="20"></span>m+</h3>

              <h6 class="subtl">pcs annually</h6>

            </div>

            <img itemprop="contenturl" loading="lazy" class="floaticon wow" data-wow-delay="1s" data-wow-iteration="infinite" data-wow-duration="2s" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icon-award.png" alt="Award Icon" style="visibility: hidden; animation-duration: 2s; animation-delay: 1s; animation-iteration-count: infinite; animation-name: none;">

            <svg width="100%" height="100%" class="rect-shape">

              <rect width="100%" height="100%" style="fill:transparent;stroke:#aeaeae;stroke-width:1;opacity:1">

              </rect>

            </svg>

          </li>

        </ul>

        <ul>

          <li class="count-data wow fadeInUp" data-wow-delay="0s" style="visibility: hidden; animation-delay: 0s; animation-name: none;">

            <div>

              <p>Widest colour range with</p>

              <h3 class="num counter"><span class="counter-value" data-count="400"></span>+</h3>

              <h6 class="subtl">shades</h6>

             
            </div>

            <img itemprop="contenturl" loading="lazy" class="floaticon wow" data-wow-delay="1.5s" data-wow-iteration="infinite" data-wow-duration="2s" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icon-colour.png" alt="colour_icon" style="visibility: hidden; animation-duration: 2s; animation-delay: 1.5s; animation-iteration-count: infinite; animation-name: none;">

            <svg width="100%" height="100%" class="rect-shape">

              <rect width="100%" height="100%" style="fill:transparent;stroke:#aeaeae;stroke-width:1;opacity:1">

              </rect>

            </svg>

          </li>

          <li class="count-data wow fadeInUp" data-wow-delay="0.5s" style="visibility: hidden; animation-delay: 0.5s; animation-name: none;">

            <div>

              <p>One of the largest polyester embroidery thread dying houses in pakistan with annial capacity of</p>

              <h3 class="num counter"><span class="counter-value" data-count="6.5"></span>k+</h3>

              <h6 class="subtl">metric tons</h6>

            </div>

            <img itemprop="contenturl" loading="lazy" class="floaticon wow" data-wow-delay="2s" data-wow-iteration="infinite" data-wow-duration="2s" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icon-factory.png" alt="Factory Icon" style="visibility: hidden; animation-duration: 2s; animation-delay: 2s; animation-iteration-count: infinite; animation-name: none;">

            <svg width="100%" height="100%" class="rect-shape">

              <rect width="100%" height="100%" style="fill:transparent;stroke:#aeaeae;stroke-width:1;opacity:1">

              </rect>

            </svg>

          </li>

        </ul>

      </div>

    </div>

    <div class="plx-wrapper keybg"><img itemprop="contenturl" loading="lazy" class="plx-txt-hrz" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/key-highlight-text.png" alt="Key Highlights Background" style="left: 300px;"></div>

  </section>

  <?php 
  if (!empty($yarns)) : ?>
    <section class="product_sec plx-target cust-tabs">
      <div class="plx-wrapper productbg">
        <img itemprop="contenturl" loading="lazy" class="plx-txt-hrz" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/production-text.png" alt="Products Background" style="left: 300px;">
      </div>
      <div class="productimg img-sec tab-img wow reveal-700-easein-600" data-wow-delay="0s" style="visibility: hidden; animation-delay: 0s; animation-name: none;">
        <?php
        foreach ($yarns as $index => $yarn) : ?>
          <div class="tab_cont <?php echo $index === 0 ? 'active' : ''; ?>" style="display: <?php echo $index === 0 ? 'block' : 'none'; ?>; opacity: 1;">
            <?php
            if (!empty($yarn['tab_image'])) : ?>
              <img itemprop="contenturl" loading="lazy" src="<?php echo esc_url($yarn['tab_image']['url']); ?>" alt="<?php echo esc_attr($yarn['tab_title']) . ' Yarn'; ?>">
              <?php
            endif; ?>
          </div>
          <?php
        endforeach; ?>
      </div>
      <!-- Tab Titles -->
      <div class="product_cont wow fadeInRight" data-wow-delay="0s" style="visibility: hidden; animation-delay: 0s; animation-name: none;">
        <h6>Explore a world of high-performance synthetic yarns</h6>
        <ul class="tabs-links tabs-nav yarn-block">
          <?php
          foreach ($yarns as $index => $yarn) : ?>
            <li>
              <a href="javascript:void(0);" class="sect-link <?php echo $index === 0 ? 'active' : ''; ?>">
                <?php echo esc_html($yarn['tab_title']); ?>
              </a>
            </li>
            <?php
          endforeach; ?>
        </ul>
      </div>
      <!-- Tab Content Text -->
      <div class="pro_foot wow fadeInUp tab-sect" data-wow-delay="0s" style="visibility: hidden; animation-delay: 0s; animation-name: none;">
        <?php
        foreach ($yarns as $index => $yarn) : 
          $_style='display:none;opacity:1';
          if($index ===0){
            $_style='display:block;opacity:1';
          }
          ?>
          <div class="tab_cont" <?php echo $_style; ?>>
            <?php echo wp_kses_post($yarn['tab_details']); ?>
          </div>
          <?php
        endforeach; ?>
      </div>
    </section>
    <?php
  endif; ?>

  <section class="brand_sec plx-target cust-tabs d-none">
    <div class="leftpanel-index wow fadeInLeft" data-wow-delay="0s" style="visibility: hidden; animation-delay: 0s; animation-name: none;">
      <ul class="tab_links tabs-nav vert-tabs wow fadeInLeft" data-wow-delay="1s" style="visibility: hidden; animation-delay: 1s; animation-name: none;">
        <?php foreach ($brands as $index => $brand): ?>
          <li>
            <a href="javascript:void(0);" data-target="#tab-<?php echo $index; ?>" class="<?php echo $index === 0 ? 'active' : ''; ?>">
              <?php echo esc_html($brand['tab_title']); ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>

      <div class="tab-sect wow fadeInRight" data-wow-delay="1s" style="visibility: hidden; animation-delay: 1s; animation-name: none;">
        <?php foreach ($brands as $index => $brand): ?>
          <div class="tab_cont admin-class" style="display: <?php echo $index === 0 ? 'block' : 'none'; ?>; opacity: 1;" id="tab-<?php echo $index; ?>">
            <div class="brand_cont">
              <?php if (!empty($brand['tab_logo'])): ?>
                <img itemprop="contenturl" loading="lazy" src="<?php echo esc_url($brand['tab_logo']); ?>" alt="<?php echo esc_attr($brand['tab_title']) . ' Logo'; ?>">
              <?php endif; ?>

              <?php if (!empty($brand['tab_details'])): ?>
                <p><?php echo wp_kses_post($brand['tab_details']); ?></p>
              <?php endif; ?>

              <?php if (!empty($brand['tab_links'])): ?>
                <ul class="inline-link">
                  <?php foreach ($brand['tab_links'] as $link): ?>
                    <li>
                      <a href="<?php echo esc_url($link['tab_link']['url']); ?>"
                        class="btn default-link btn-wh"
                        target="<?php echo esc_attr($link['tab_link']['target'] ?? '_self'); ?>">
                        <?php echo esc_html($link['tab_link']['title']); ?>
                      </a>
                    </li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="rightpanel wow fadeIn tab-img" data-wow-delay="1.5s" style="visibility: hidden; animation-delay: 1.5s; animation-name: none;">
      <?php foreach ($brands as $index => $brand): ?>
        <div class="tab_cont <?php echo $index === 0 ? 'active' : ''; ?>" style="display: <?php echo $index === 0 ? 'block' : 'none'; ?>; opacity: 1;">
          <?php if (!empty($brand['tab_image'])): ?>
            <img itemprop="contenturl" loading="lazy"
                src="<?php echo esc_url($brand['tab_image']['url']); ?>"
                alt="<?php echo esc_attr($brand['tab_title']) . ' Image'; ?>">
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="plx-wrapper brandtxt "><img itemprop="contenturl" loading="lazy" class="plx-txt-hrz wow fadeIn" data-wow-delay="2s" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/brand-text.png" alt="Brands Background Text" style="left: 300px; visibility: hidden; animation-delay: 2s; animation-name: none;"></div>

  </section>



  <section class="corp_sec plx-target vidopad">

    <div class="wow fadeInLeft productimg img-sec videobox-lg" data-wow-delay="0s" style="visibility: hidden; animation-delay: 0s; animation-name: none;">

      <img itemprop="contenturl" loading="lazy" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/prod-bg.jpg" class="img-fluid videobox-lg-bg" alt="Into The World Of Aym Syntex Limited Banner">

      <a role="button" href="https://www.youtube.com/watch?v=W24mVNiWtxs" target="_blank" class="play-btn">

        <span><img itemprop="contenturl" loading="lazy" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/play-btn.png" alt="Play Btn"></span>

      </a>

    </div>

    <div class="corp_cont wow slidein--lr-700-ease-600 text-left" data-wow-delay="0s" style="visibility: hidden; animation-delay: 0s; animation-name: none;">

      <h6>Dive into the world of BT threads & Albader Threads</h6>

      <p>We have two state-of-the-art manufacturing facilities in <strong>Faisalabad</strong>. Our Faisalabad units have the most advanced machinery for <strong>multi-speciality synthetic yarn production.<br> In-house master batch development, high-tech research &amp; development centre</strong> and <strong>colour matching facility</strong> are our strengths.</p>

      <div class="plx-wrapper"><img itemprop="contenturl" loading="lazy" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/corp-text.png" class="plx-txt-hrz" alt="World Of Aym Syntex Limited Background" style="left: 300px;"></div>

    </div>

  </section>

</div>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const firstTab = document.querySelector('.tab-sect .admin-class');
    if (firstTab) {
      firstTab.style.setProperty('display', 'block', 'important');
      firstTab.style.setProperty('opacity', '1', 'important');
    }
  });
  document.addEventListener("DOMContentLoaded", function () {
    const tabs = document.querySelectorAll(".yarn-block .sect-link");
    if (tabs.length > 1) {
      // Simulate click on last tab
      tabs[tabs.length - 1].click();

      // Then simulate click on first tab after slight delay
      setTimeout(function () {
        tabs[0].click();
      }, 100);
    }
  });
</script>
<?php



get_footer();


?>