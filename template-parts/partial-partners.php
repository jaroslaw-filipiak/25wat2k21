<?php
    /**
     *  Partial PARTNERS certificate
     *
     *  @package    25wat
     */

    get_header();

    $url_main         = get_bloginfo( 'url' );
    $url_template_dir = get_template_directory_uri();
?>
<section class="partner-icons-wrapper">
    <div class="partner-icons">
        <h2 class="text-center text-uppercase mb-4"><?php _e( 'Nasze certyfikaty', '25wat' ); ?></h2>

        <!-- partner icons -->
        <div class="glider-for-partners glider-for-partners-offer-page">

            <div class="glider-offer-cert">
                <div class="logo mx-auto d-flex"><img src="<?php echo $url_template_dir; ?>/assets/img/c1.jpg" alt="Partner logo">
                </div>
                <div class="logo mx-auto d-flex"><img src="<?php echo $url_template_dir; ?>/assets/img/c2.jpg" alt="Partner logo">
                </div>
                <div class="logo mx-auto d-flex"><img src="<?php echo $url_template_dir; ?>/assets/img/c3.jpg" alt="Partner logo">
                </div>
                <div class="logo mx-auto d-flex"><img src="<?php echo $url_template_dir; ?>/assets/img/c4.jpg" alt="Partner logo">
                </div>
            </div>
        </div>
        <!-- partner icons -->

    </div>
</section>