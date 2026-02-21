<?php
/* Template Name: About Us */
get_header();

$about_header = get_field('about_header');
$about_info = get_field('about_info');
$vision = get_field('about_core_vision');
$vision_details = get_field('vision_details');
$why_you_choose_us = get_field('why_you_choose_us');
?>
<style>
@media (max-width: 768px) {
  .info_sec {
	padding:0px;
	}
  .mobile-font {
	font-size:2rem;
	}
 .adjust-items {
	display:block !important;
	text-align:center;
		
	}
 .adjust-items .value {
	max-width:100% !important;
	padding-left:0px;
	}
 .adjust-items .value h3 {
	font-size:1rem;
	white-space:nowrap;
	}
 .values_sec {
	margin-top:0px !important;
	}
 .management_sec .teamlist, .milestone_sec {
	margin-bottom:0px;
	}
 .fullbanner .banner_sec .bannerwrap {
	padding-top:10px;
	}
 .partnertitle {
	margin-bottom:0px;
	}
}
</style>
<div class="fullbanner">
    <section class="banner_sec about-bg"
        style="background:url('<?php echo get_stylesheet_directory_uri(); ?>/assets/banner.jpg') no-repeat;background-size:cover">
        <div class="container">
            <div class="bannerwrap">
                <?php echo $about_header; ?>
            </div>
        </div>
    </section>
    <?php echo $about_info; ?>

    <section>
        <div class="container my-0 my-md-5" id="vision">
            <?php echo $vision; ?>

            <div class="values_sec" style="margin-top:60px">
                <div class="values_wrap wow zoomIn" data-wow-delay="0s"
                    style="visibility: visible; animation-delay: 0s; animation-name: zoomIn;background:url('<?php echo get_stylesheet_directory_uri(); ?>/assets/valuesbg.jpg') no-repeat;background-size:cover">
                    <?php echo $vision_details; ?>
                    <div class="topfloat wow fadeIn" data-wow-delay="1.2s"
                        style="visibility: visible; animation-delay: 1.2s; animation-name: fadeIn; right:0; left:0; margin: 0 auto; width: fit-content; ">
                        <figure><img itemprop="contenturl" loading="lazy"
                                src="https://www.aymsyntex.com/images/smallmachimg.jpg" alt="Vision"
                                title="AYM Syntex Vision"></figure>
                    </div>
                    <div class="rightfloat wow fadeIn" data-wow-delay="1.6s"
                        style="visibility: visible; animation-delay: 1.6s; animation-name: fadeIn; top:50%;   transform: translateY(-50%);">
                        <figure><img itemprop="contenturl" loading="lazy"
                                src="https://www.aymsyntex.com/images/custimg.jpg" alt="Process"
                                title="AYM Syntex Process"></figure>
                    </div>
                    <div class="bottomfloat wow fadeIn" data-wow-delay="1.6s"
                        style="visibility: visible; animation-delay: 1.6s; animation-name: fadeIn; right:0; left:0; margin: 0 auto; width: fit-content;">
                        <figure><img itemprop="contenturl" loading="lazy"
                                src="https://www.aymsyntex.com/images/peopledev.jpg" alt="Business Models"
                                title="AYM Syntex Business Models"></figure>
                    </div>
                    <div class="leftfloat wow fadeIn" data-wow-delay="2s"
                        style="visibility: visible; animation-delay: 2s; animation-name: fadeIn; top:50%;   transform: translateY(-50%);">
                        <figure><img itemprop="contenturl" style="width : 228px; height: 243px" loading="lazy"
                                src="https://www.aymsyntex.com/images/innovationimg.jpg" alt="Innovative Products"
                                title="AYM Syntex Innovative Products"></figure>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="aymval_sec" id="values">
        <div class="container">
            <div class="aymval_cont">
                <h3 class="wow fadeIn txt_white" data-wow-delay="0.2s"
                    style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">Our Values</h3>
                <ul class="values_list">
                    <li>
                        <figure>
                            <img itemprop="contenturl" loading="lazy" class="img-fluid"
                                src="https://www.aymsyntex.com/images/about/peopledevicon.png"
                                alt="People Development Icon">
                        </figure>
                        <h5>People Development</h5>
                    </li>
                    <li>
                        <figure>
                            <img itemprop="contenturl" loading="lazy" class="img-fluid"
                                src="https://www.aymsyntex.com/images/about/customerfocus_icon.png"
                                alt="Customer Focus - Our Values">
                        </figure>
                        <h5>Customer Focus</h5>
                    </li>
                    <li>
                        <figure>
                            <img itemprop="contenturl" loading="lazy" class="img-fluid"
                                src="https://www.aymsyntex.com/images/about/innovation_icon.png"
                                alt="Innovation Icon - Aym Values">
                        </figure>
                        <h5>Innovation</h5>
                    </li>
                </ul>
            </div>
        </div>
    </section>

	<section class="core-values container mt-0 py-0  mt-md-2 py-md-5">
        <?php echo $why_you_choose_us; ?>
  	</section>

    <section class="plx-target" id="committee">
        <div class="container">
            <div class="management_sec">
                <h1 class="prominent mobile-font wow fadeIn pt-0 py-3 py-md-0 pt-md-5 text-center" data-wow-delay="0.2s"
                    style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;"><strong>Board of
                        Directors</strong></h3>
                    <ul class="teamlist justify-content-center mt-2">
                        <li class="wow fadeInUp inview" data-wow-delay="0.2s"
                            style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                            <a class="teamlink" data-effect="mfp-3d-unfold">
                                <svg width="365" height="365" class="rect-shape">
                                    <rect width="100%" height="100%"
                                        style="fill:transparent;stroke:#aeaeae;stroke-width:5;opacity:1"></rect>
                                </svg>
                                <div class="teamprofile">
                                    <figure class="team-img">
                                        <img itemprop="contenturl" loading="lazy" class="img-fluid"
                                            src="https://btthreads.com/wp-content/themes/twentytwentyfive-child/assets/bt.jpeg"
                                            alt="Rajesh R Mandawewala - Board Of Directors | About Us">
                                    </figure>
                                    <div>
                                        <h5>Talha Tariq</h5>
                                        <span class="designationtxt"> Director of Production & Development</span>
                                        <div class="selfinfo">
                                            <p>Talha Tariq  Director of Production & Development of BT Threads. </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="wow fadeInUp inview" data-wow-delay="0.2s"
                            style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                            <a class="teamlink" data-effect="mfp-3d-unfold">
                                <svg width="365" height="365" class="rect-shape">
                                    <rect width="100%" height="100%"
                                        style="fill:transparent;stroke:#aeaeae;stroke-width:5;opacity:1"> </rect>
                                </svg>
                                <div class="teamprofile">
                                    <figure class="team-img">
                                        <img style="height:250px;width:500px" itemprop="contenturl" loading="lazy"
                                            src="https://btthreads.com/wp-content/themes/twentytwentyfive-child/assets/alb.jpeg"
                                            alt="Bader">
                                    </figure>
                                    <div>
                                        <h5>Mr.Bader SB</h5>
                                        <span class="designationtxt">Managing Director &amp; CEO</span>
                                        <div class="selfinfo">
                                            <p>Mr. Bader SB Director Sales & Marketing ; </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
            </div>
        </div>
    </section>
</div>
<style>
    .prominent {
        color: #8d2929;
    }
</style>
<?php get_footer(); ?>