<?php
/* Template Name: Privacy Policy */
get_header();
$privacy_policy = get_field('privacy_policy');
?>
<style>
    .section-title {
        text-align: start !important;
        padding-bottom: 20px;
    }
@media (max-width: 768px) {
	h1 {
	font-size:2rem;
	}
}
</style>

<section class="banner_sec plx-target contact-bg">
    <div class="container">
        <div class="bannerwrap"
            style="background:url('<?php echo get_stylesheet_directory_uri(); ?>/assets/contact-us.png')">
            <h1 class="floating">Privacy Policy</h1>
        </div>
    </div>
</section>
<div class="">
    <div class="container py-0">
        <div class="row">

            <!-- Main Content -->
            <div class="col-lg-12">
                <div class="">
                    <div class="card-body">
                        <?php echo $privacy_policy; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .prominent {
        color: #8d2929;
    }

    ul {
        list-style: unset;
    }
</style>

<?php get_footer(); ?>