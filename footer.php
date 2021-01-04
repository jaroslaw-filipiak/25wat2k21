<?php
    /**
     *  Footer template
     *
     *  @package    25wat
     */

    $url_main         = get_bloginfo( 'url' );
    $url_template_dir = get_template_directory_uri();
?>

<section class="google-partner">
    <div class="google-partner-text">
        <h2><?php _e( 'Jesteśmy <strong>certyfikowanym partnerem</strong>', '25wat' ); ?> </h2>
        <img loading="lazy" src="<?php echo $url_template_dir; ?>/assets/img/google.svg" alt="" style="display: block;">
    </div>

    <div class="our-awards">
        <div class="award">
            <img loading="lazy" src="<?php echo $url_template_dir ?>/assets/img/logo-google.png" alt="logo-google">
            <p>Partner</p>
           <div class="footer">
                <p>search ads</p>
           </div>
        </div>
        <div class="award">
            <img loading="lazy" src="<?php echo $url_template_dir ?>/assets/img/logo-odyssey.png" alt="logo-odyssey">
            <p>Winner</p>
            <div class="footer">
                <p>Creative</p>
             </div>
        </div>
        <div class="award">
            <img loading="lazy" src="<?php echo $url_template_dir ?>/assets/img/logo-websummit.png" alt="logo-websummit">
            <p>Participant</p>
            <div class="footer">
                <p>IT security</p>
              </div>
        </div>
        <div class="award">
            <img loading="lazy" src="<?php echo $url_template_dir ?>/assets/img/logo-brief50k.png" alt="logo-brief50k">
            <p>Laureate</p>
            <div class="footer">
                <p>Business</p>
             </div>
        </div>
        <div class="award">
            <img loading="lazy" src="<?php echo $url_template_dir ?>/assets/img/logo-internetbeta.png" alt="logo-internetbeta">
            <p>Speaker</p>
            <div class="footer">
                <p>internet</p>
            </div>
        </div>
    </div>

</section>

<footer class="footer">

    <div class="container-fluid footer-row-1">
        <div class="container ">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-4" data-aos="fade-up">
                    <h3><?php _e( '25wat', '25wat' ); ?></h3>
                    <p>
                        <strong><?php _e( '25wat Agencja Kreatywna', '25wat' ); ?></strong><br>
                        <strong><?php _e( 'ul.Kościerzyńska 32, 51-430 Wrocław', '25wat' ); ?></strong><br>
                        <small><?php _e( 'ul.Legionów 119, 91-073 Łódź', '25wat' ); ?></small><br>
                        <small><?php _e( 'ul. In Progress, Warszawa', '25wat' ); ?></small><br>
                        <?php _e( 'tel:', '25wat' ); ?> <a class="footer-link-bold" href="tel:+48 603431376">+48
                            602810304</a> |
                        <a class="footer-link-bold" href="mailto:biuro@25wat.com">biuro@25wat.com</a>
                    </p>
                    <p class="copyright d-none d-sm-block">
                        © 25wat 2013 - <?php echo date('Y') ?>
                    </p>
                </div>

                <div class="col-12 col-sm-12 col-md-5" data-aos="fade-up">
                    <h3><?php _e( 'Sitemap', '25wat' ); ?></h3>
                    <ul class="sitemap">
                        <?php
                            wp_nav_menu(
                                array(
                                    'menu'           => 'Footer menu',
                                    'theme_location' => 'primary',
                                    'container'      => '',
                                    'items_wrap'     => '%3$s',
                                    'walker'         => new Bootstrap_NavWalker(),
                                    'fallback_cb'    => 'Bootstrap_NavWalker::fallback',
                                )
                            );
                        ?>
                    </ul>
                </div>

                <div class="col-12 col-sm-12 col-md-3" data-aos="fade-up">
                    <h3><?php _e( 'Social Media', '25wat' ); ?></h3>
                    <ul class="footer-social-media">
                        <?php
                        $social_icon = [
                            'facebook'  => 'fb-footer.svg',
                            'behance'   => 'be-footer.svg',
                            'linkedin'  => 'in-footer.svg',
                            'instagram' => 'insta-footer.svg',
                        ];
                        $social_name = [
                            'facebook'  => __( 'Facebook logotype', '25wat' ),
                            'behance'   => __( 'Behance logotype', '25wat' ),
                            'linkedin'  => __( 'LinkedIn logotype', '25wat' ),
                            'instagram' => __( 'Instagram logotype', '25wat' ),
                        ];
                        foreach ( $social_name as $key => $icon ) {
                            $link = w25_get_option( 'social_' . $key );
                            if ( strlen( $link ) > 0 ) {
                            ?>
                        <li><a class="social-media-icon" href="<?php echo $link; ?>"><img loading="lazy"
                                    src="<?php echo $url_template_dir; ?>/assets/img/<?php echo $social_icon[$key]; ?>"
                                    alt="<?php echo $social_name[$key]; ?>"></a></li>
                        <?php
                            }
                        }
                    ?>
                    </ul>
                </div>
            </div>
            <div class="row" data-aos="fade-up">
                <div class="col footer-copyright d-sm-none d-md-none d-lg-none d-xl-none">
                    <p class="copyright">
                        © 25wat 2013 - <?php echo date('Y') ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mx-auto zerobullshit-container" style="background-image: url(<?php echo $url_template_dir; ?>/assets/img/zerobullsht.png)">
        <div class="col mx-auto d-flex align-items-center justify-content-center"></div>
    </div>
</footer>

<?php if(!is_page( array('1071' , '62')  )) { ?>

<section class="consult-project-mobile-btn">
    <a href="<?php echo $url_main; ?>/brief" id="dgj38Er74d4812s23FJ7">
        <svg class="liquid-button" data-text="<?php _e( 'Consult your project', '25wat' ); ?>" data-force-factor="0.1"
            data-layer-1-viscosity="0.3" data-layer-2-viscosity="0.4" data-layer-1-mouse-force="300"
            data-layer-2-mouse-force="400" data-layer-1-force-limit="1" data-layer-2-force-limit="2"
            data-color1="#0131FF" data-color2="#0131FF" data-color3="#2A62F4">
        </svg>
    </a>
</section>

<?php }
?>

<div class="cookie-consent d-none">
    <div class="cookie-content">
        <div class="cookie-left">
            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 80 80" class="like-this-cookie">
                <path id="cookie"
                    d="M80,40.5A40,40,0,0,1,0,40c13.22,3.553,25.607-6.643,20-20,15.56,2.183,22.863-7.963,20.257-20A40.011,40.011,0,0,1,80,40.5ZM28.077,26.753C27.86,38.063,18.74,46.312,7.47,47.306A33.338,33.338,0,1,0,47.247,7.453c-.923,9.693-7.937,17.856-19.17,19.3ZM45,56.666a5,5,0,1,1-5,5A5,5,0,0,1,45,56.666Zm-18.333-9.51A6.667,6.667,0,1,1,20,53.822a6.669,6.669,0,0,1,6.667-6.667ZM60,40a6.667,6.667,0,1,1-6.667,6.667A6.669,6.669,0,0,1,60,40ZM43.334,40A3.333,3.333,0,1,1,40,43.332,3.335,3.335,0,0,1,43.334,40Zm8.333-16.666a5,5,0,1,1-5,5A5,5,0,0,1,51.667,23.333ZM10,23.333a3.333,3.333,0,1,1-3.333,3.333A3.335,3.335,0,0,1,10,23.333ZM5,10a5,5,0,1,1-5,5A5,5,0,0,1,5,10ZM25,3.333a5,5,0,1,1-5,5A5,5,0,0,1,25,3.333ZM13.333,0A3.333,3.333,0,1,1,10,3.333,3.335,3.335,0,0,1,13.333,0Z"
                    fill="#fff" fill-rule="evenodd" />
            </svg>

            <p>
                <?php _e( 'This website uses cookies to ensure you get the best experience on our website.', '25wat' ); ?>
                <a href="<?php echo get_permalink( get_page_by_path( 'privacy-policy') ); ?>">
                    <?php _e( 'Learn more', '25wat' ); ?> </a>
            </p>
        </div>
        <div class="cookie-right">
            <a class="btn-cookie-accept cookie-accept-btn" href="#">
                <?php _e( 'I understand', '25wat' ); ?>
            </a>
        </div>


    </div>
</div>

<?php wp_footer(); ?>

<!-- GOOGLE CONVERSION -->
<script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = 939175575;
    var google_custom_params = window.google_tag_params;
    var google_remarketing_only = true;
    /* ]]> */
</script>
<!-- <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js" defer></script> -->
<!-- <script src="https://apis.google.com/js/platform.js"></script> -->

<noscript>
    <div style="display:inline;">
        <img loading="lazy" height="1" width="1" style="border-style:none;" alt=""
            src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/939175575/?guid=ON&amp;script=0" />
    </div>
</noscript>

</body>

</html>