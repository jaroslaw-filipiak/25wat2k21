<?php
    /**
     *  Template Name: 25wat - 404
     *
     *  @package    25wat
     */

    get_header();

    $url_main         = get_bloginfo( 'url' );
    $url_template_dir = get_template_directory_uri();
?>

<div class="container not-found" id="page-404">
    <div class="row d-flex align-items-center justify-content-center">
        <div id="process-head-contact2" data-relative-input="true" style="margin-top: 100px;">
            <img data-depth="0.2" src="<?php echo $url_template_dir; ?>/assets/img/head-half-flubber.png"
                style="margin-top: -150px;" alt="" />
            <img class="half-head__not-found" data-depth="0.3"
                src="<?php echo $url_template_dir; ?>/assets/img/head-half.png" alt="" style="    top: -23vh !important;
                           left: 6vw !important;" />
        </div>

        <div class="col-12 col-md-5 d-flex align-items-center justify-content-center flex-column not-found-info">
            <h1 style="font-size:200px; font-weight: semibold">404</h1>
            <h2 class="mb-4"><?php _e( 'Page Not Found', '25wat' ); ?></h2>

            <a href="<?php echo $url_main; ?>">
                <svg class="liquid-button__blog-item" data-text="<?php _e( 'Back to home page', '25wat' ); ?>"
                    data-force-factor="0.1" data-layer-1-viscosity="0.3" data-layer-2-viscosity="0.4"
                    data-layer-1-mouse-force="300" data-layer-2-mouse-force="400" data-layer-1-force-limit="1"
                    data-layer-2-force-limit="2" data-color1="#0131FF" data-color2="#0131FF"
                    data-color3="#2A62F4"></svg>
            </a>
        </div>
    </div>
</div>

<?php
    get_footer();
