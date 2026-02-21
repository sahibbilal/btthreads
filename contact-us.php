<?php
/* Template Name: Contact Us */
get_header();
$contact_details = get_field('contact_details');
$address = get_field('address');
?>
<style>
  .contact-item br{
    display:none;
  }
  .contact-item{
    display: flex;
    gap: 5px;
  }
</style>
<section class="banner_sec plx-target contact-bg">
    <div class="container">
        <div class="bannerwrap" style="background:url('<?php echo get_stylesheet_directory_uri(); ?>/assets/contact-us.png')">
            <h1 class="floating">Contact us</h1>
            </div>
    </div>
</section>

<section class="contact_map_area">
<div class="container py-0 py-md-5">
  <div class="row align-items-start g-4">
    
    <!-- Left Column: Contact Info -->
    <div class="col-12 col-lg-6">
      <div class="contact-section">
        <?php echo $contact_details; ?>
      </div>
    </div>

    <!-- Right Column: Map -->
    <div class="col-12 col-lg-6 py-3 py-md-0">
      <?php echo $address; ?>
    </div>

  </div>
</div>

    </section>

<?php get_footer(); ?>
