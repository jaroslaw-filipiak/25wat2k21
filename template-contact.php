<?php
    /**
     *  Template Name: 25wat - contact, top
     *
     *  @package 25wat
     */

    get_header();

    $url_main         = get_bloginfo( 'url' );
    $url_template_dir = get_template_directory_uri();

    $image      = get_the_post_thumbnail_url();
    $image_hero = $image ? $image : $url_template_dir . '/assets/img/placeholder.jpg';
?>
<section class="contact" data-aos11="fade-up" id="page-contact">

    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="contact-form">
                <h1 class="mb-4" data-aos11="fade-up"><?php _e( 'Contact us', '25wat' ); ?></h1>
                <h4><?php _e( 'We specialise in', '25wat' ); ?></h4>
                <h4><?php _e( 'webdesign, social media, advertising, branding', '25wat' ); ?></h4>

                <div class="contact__footer">
                    <h4 class="color-blue mt-3">
                        <?php _e( 'Podobają Ci się nasz realizacje i chcesz dobry projekt dla swojej marki?', '25wat' ); ?>
                    </h4>
                    <h4 class="color-yellow mt-3"><?php _e( 'Skontaktuj się bezpośrednio z:', '25wat' ); ?></h4>
                    <div class="contact__footer-team">
                        <div class="contact__footer-gabi">
                            <img src="<?php echo $url_template_dir; ?>/assets/img/g1.png" alt="Gabi">
                            <h6>Gabi</h6>
                            <p>creative</p>
                            <a href="mailto:g@25wat.com">g@25wat.com</a>
                        </div>
                        <div class="contact__footer-mateusz">
                            <img src="<?php echo $url_template_dir; ?>/assets/img/grzegorz.jpg" alt="Grzegorz">
                        <h6>Grzegorz</h6>
                        <p>head of business</p>
                            <a href="mailto:gz@25wat.com">gz@25wat.com</a>
                        </div>

                    </div>
                </div>

                <div class="our-places">
                    <div class="place " data-aos11="fade-up">
                        <img src="<?php echo $url_template_dir; ?>/assets/img/25wat-wroclaw.svg" alt="25wat-wroclaw">
                        <span class="mt-2"><?php _e( 'Kościerzyńska 32,', '25wat' ); ?></span>
                        <span class="mt-2"><?php _e( '51-430 Wrocław', '25wat' ); ?></span>
                    </div>

                    <div class="place" data-aos11="fade-up">
                        <img src="<?php echo $url_template_dir; ?>/assets/img/25wat-lodz.svg" alt="25wat-lodz">
                        <span class="mt-2"><?php _e( 'Legionów 119,', '25wat' ); ?></span>
                        <span class="mt-2"><?php _e( '91-073 Łódź', '25wat' ); ?></span>
                    </div>

                    <div class="place" data-aos11="fade-up">
                        <img src="<?php echo $url_template_dir; ?>/assets/img/25wat-warszawa.svg" alt="25wat-warszawa">
                        <span class="mt-2"><?php _e( 'In Progress,', '25wat' ); ?></span>
                        <span class="mt-2"><?php _e( 'Warszawa', '25wat' ); ?></span>
                    </div>
                </div>

                <h4 class="mb-4" data-aos11="fade-up"><?php _e( 'Contact us', '25wat' ); ?></h4>
                <a class="mt-3 color-blue font-link" href="mailto:biuro@25wat.com">biuro@25wat.com</a>
                <a class="mt-3 color-blue font-link" href="tel:+48 603 431 376">+48 603 431 376</a>

                <p class="my-4" data-aos11="fade-up"><?php _e( 'Or fill out the contact form', '25wat' ); ?></p>

                <div class="form-mail form-page-contact">
                    <?php
                    if ( 'pl' === ICL_LANGUAGE_CODE ) {
                        echo do_shortcode( '[contact-form-7 id="1857"]' );
                    } else {
                        echo do_shortcode( '[contact-form-7 id="916"]' );
                    }
                    ?>
                    <div class="form-send-btn">
                        <svg class="liquid-button__blog-item d-none d-md-block"
                            data-text="<?php _e( 'Please contact us', '25wat' ); ?>" data-force-factor="0.1"
                            data-layer-1-viscosity="0.3" data-layer-2-viscosity="0.4" data-layer-1-mouse-force="300"
                            data-layer-2-mouse-force="400" data-layer-1-force-limit="1" data-layer-2-force-limit="2"
                            data-color1="#0131FF" data-color2="#0131FF" data-color3="#2A62F4"></svg>
                        <span class="btn btn-card__mobile d-lg-none"><?php _e( 'Please contact us', '25wat' ); ?></span>
                    </div>
                </div>

                <svg class="contact-blob" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 288 288">
                    <linearGradient id="linear-gradient" x1="0.154" y1="0.098" x2="0.654" y2="0.823"
                        gradientUnits="objectBoundingBox">
                        <stop offset="0" stop-color="#ffca1b" />
                        <stop offset="1" stop-color="#fcea00" />
                    </linearGradient>
                    <path fill="url(#linear-gradient)">
                        <animate repeatCount="indefinite" attributeName="d" dur="5s" values="M37.5,186c-12.1-10.5-11.8-32.3-7.2-46.7c4.8-15,13.1-17.8,30.1-36.7C91,68.8,83.5,56.7,103.4,45
                        c22.2-13.1,51.1-9.5,69.6-1.6c18.1,7.8,15.7,15.3,43.3,33.2c28.8,18.8,37.2,14.3,46.7,27.9c15.6,22.3,6.4,53.3,4.4,60.2
                        c-3.3,11.2-7.1,23.9-18.5,32c-16.3,11.5-29.5,0.7-48.6,11c-16.2,8.7-12.6,19.7-28.2,33.2c-22.7,19.7-63.8,25.7-79.9,9.7
                        c-15.2-15.1,0.3-41.7-16.6-54.9C63,186,49.7,196.7,37.5,186z;
                        M51,171.3c-6.1-17.7-15.3-17.2-20.7-32c-8-21.9,0.7-54.6,20.7-67.1c19.5-12.3,32.8,5.5,67.7-3.4C145.2,62,145,49.9,173,43.4
                        c12-2.8,41.4-9.6,60.2,6.6c19,16.4,16.7,47.5,16,57.7c-1.7,22.8-10.3,25.5-9.4,46.4c1,22.5,11.2,25.8,9.1,42.6
                        c-2.2,17.6-16.3,37.5-33.5,40.8c-22,4.1-29.4-22.4-54.9-22.6c-31-0.2-40.8,39-68.3,35.7c-17.3-2-32.2-19.8-37.3-34.8
                        C48.9,198.6,57.8,191,51,171.3z;
                        M37.5,186c-12.1-10.5-11.8-32.3-7.2-46.7c4.8-15,13.1-17.8,30.1-36.7C91,68.8,83.5,56.7,103.4,45
                        c22.2-13.1,51.1-9.5,69.6-1.6c18.1,7.8,15.7,15.3,43.3,33.2c28.8,18.8,37.2,14.3,46.7,27.9c15.6,22.3,6.4,53.3,4.4,60.2
                        c-3.3,11.2-7.1,23.9-18.5,32c-16.3,11.5-29.5,0.7-48.6,11c-16.2,8.7-12.6,19.7-28.2,33.2c-22.7,19.7-63.8,25.7-79.9,9.7
                        c-15.2-15.1,0.3-41.7-16.6-54.9C63,186,49.7,196.7,37.5,186z   " />
                    </path>
                </svg>
            </div>
        </div>

        <div class="row" style="margin-top: 90px; margin-bottom: 50px;">
            <div class="col text-center">
                <h2><?php _e( 'Do you want to work with us?', '25wat' ); ?></h2>
                <h2><?php _e( 'We are waiting for your portfolio!', '25wat' ); ?></h2>
            </div>
        </div>

        <div class="row d-flex align-items-center">
            <div class="col-12 col-md-5  offset-md-1">
                <h3 class="pb-3 font-600"><?php _e( 'Head full of ideas is always welcome', '25wat' ); ?></h3>
                <h4 class="pb-2 font-weight-normal">
                    <?php _e( 'Designer? Writer? Programmer?', '25wat' ); ?>
                </h4>
                <p>
                    <?php _e( 'We are waiting for you', '25wat' ); ?> <a class="d-inline"
                        href="mailto:praca@25wat.com">praca@25wat.com</a>
                </p>
                <p><?php _e( 'Tell us what you are doing, send a portfolio or a CV - who knows, maybe you are about to join 25wat team?', '25wat' ); ?>
                </p>
            </div>
            <div class="d-none d-md-block col-md-5 offset-md-1 process-flubber">
                <div id="process-head-contact" data-relative-input="true" style="margin-top: 0px;">
                    <img data-depth="0.2" src="<?php echo $url_template_dir; ?>/assets/img/head-half-flubber.png"
                        style="margin-top: -150px;" alt="<?php _e( 'Process image background flubber', '25wat' ); ?>">
                    <img data-depth="0.3" class="process-head-image"
                        src="<?php echo $url_template_dir; ?>/assets/img/head-half.png"
                        alt="<?php _e( 'Process image background head', '25wat' ); ?>">
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    get_footer();
