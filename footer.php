</main>

<?php
$title  = get_field('title', 'option');
$button = get_field('enquire_button', 'option');
$strip  = get_field('strip_image', 'option');
$yarns  = get_field('yarns', 'option');
?>

<section class="partner_sec">

  <?php if ($strip): ?>
    <figure class="floatingrope wow fadeInUp" data-wow-delay="0.5s">
      <img itemprop="contenturl" loading="lazy" src="<?php echo esc_url($strip); ?>" alt="Red Fabric Strips" class="movestrip" data-wow-delay="0.5s" data-wow-iteration="infinite">
    </figure>
  <?php endif; ?>

  <div class="container">
    <?php if ($title): ?>
      <span class="partnertitle wow slideInUp" data-wow-delay="0.5s">
        <?php echo wp_kses_post($title); ?>
      </span>
    <?php endif; ?>

    <div class="yarncircle wow fadeInUp" data-wow-delay="0.5s">
      <div class="rotate">
        <?php
        if (!empty($yarns)) :
          foreach ($yarns as $yarn) :
            $yarn_img = $yarn['yarn_image'];
            if ($yarn_img): ?>
              <figure>
                <img itemprop="contenturl" loading="lazy" src="<?php echo esc_url($yarn_img); ?>" alt="Yarn - Let's Partner">
              </figure>
            <?php endif;
          endforeach;
        endif;
        ?>
      </div>
    </div>

    <?php if ($button): ?>
      <div class="enquirenow">
        <a href="https://btthreads.com/contact-us/" class="eq-btn wow fadeInUp d-inline" data-wow-delay="1s"
           <?php if (!empty($button['target'])) echo 'target="' . esc_attr($button['target']) . '"'; ?>>
          <?php echo esc_html($button['title']); ?>
        </a>
      </div>
    <?php endif; ?>
  </div>

</section>


<footer id="site-footer">
  <div class="footer-top">
    <div class="container d-flex justify-content-between align-items-center flex-wrap">
      
      <!-- Social -->
      <div class="footer-social">
        <p>Follow us on</p>
        <div class="social-icons d-flex gap-3">
          <?php if ($fb = get_field('facebook_url', 'option')) : ?>
            <a href="<?php echo esc_url($fb); ?>" aria-label="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
          <?php endif; ?>

          <?php if ($tw = get_field('twitter_url', 'option')) : ?>
            <a href="<?php echo esc_url($tw); ?>" aria-label="Twitter" target="_blank"><i class="fab fa-twitter"></i></a>
          <?php endif; ?>

          <?php if ($ig = get_field('instagram_url', 'option')) : ?>
            <a href="<?php echo esc_url($ig); ?>" aria-label="Instagram" target="_blank"><i class="fab fa-instagram"></i></a>
          <?php endif; ?>

          <?php if ($yt = get_field('youtube_url', 'option')) : ?>
            <a href="<?php echo esc_url($yt); ?>" aria-label="YouTube" target="_blank"><i class="fab fa-youtube"></i></a>
          <?php endif; ?>

          <?php if ($ln = get_field('linkedin_url', 'option')) : ?>
            <a href="<?php echo esc_url($ln); ?>" aria-label="LinkedIn" target="_blank"><i class="fab fa-linkedin-in"></i></a>
          <?php endif; ?>
        </div>

      </div>

      <!-- Logo -->
      <div class="footer-logo text-center">
        <?php if ( has_custom_logo() ) : ?>
            <div class="site-logo"><?php the_custom_logo(); ?></div>
        <?php else : ?>
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <?php bloginfo( 'name' ); ?></a>
            </h1>
        <?php endif; ?>
      </div>

      <!-- Contact Email -->
      <div class="footer-contact text-end">
        <p>Contact Us</p>
	<div style="display:grid;">
<a href="tel:+923226239505" style="text-decoration: none; color: inherit;font-size:22px;">

  <strong>(+92) 322 6239505</strong>
</a>
<a href="tel:+92324 8002722" style="text-decoration: none; color: inherit;font-size:22px;">

  <strong>(+92)324 8002722</strong>
</a>

	 <a href="mailto:Sales@btthread.com" class="email">Sales@btthread.com</a>
	 <a href="mailto:Sales@albader.pk" class="email">Sales@albader.pk</a>



	</div>
        
      </div>

    </div>
  </div>

  <!-- Navigation Menu (Main) -->
  <div class="footer-nav-main">
    <div class="container">
      <?php
      wp_nav_menu([
        'theme_location' => 'footer',
        'menu_class'     => 'footer-main-menu d-flex justify-content-center gap-4 flex-wrap',
        'container'      => false,
        'fallback_cb'      => false
      ]);
      ?>
    </div>
  </div>

  <!-- Footer Bottom -->
  <div class="footer-bottom">
    <div class="container d-flex justify-content-center flex-wrap">
     
      <div class="copy d-flex col-12 text-center justify-content-center">
        <p style="font-size:16px;">© Copyright <?php echo date('Y'); ?> BT Threads</p>
        
      </div>
    </div>
  </div>

  <!-- Scroll to Top Button -->
  <div id="scrollTopBtn" onclick="window.scrollTo({ top: 0, behavior: 'smooth' });">
    <i class="fas fa-chevron-up"></i>
  </div>

  <?php wp_footer(); ?>
</footer>
<a href="https://btthreads.com/contact-us/" class="enquiry_link"><span>Quick Enquiry</span><img itemprop="contenturl" src="https://www.aymsyntex.com/resources/images/mail-icon-white.png" alt="Email Envelope Icon"></a>