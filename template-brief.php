<?php
    /**
     *  Template Name: 25wat - brief, top
     *
     *  @package    25wat
     */

    get_header();

    $url_main         = get_bloginfo( 'url' );
    $url_template_dir = get_template_directory_uri();
    $slug             = w25_get_current_slug( true );
    $url_base         = get_permalink( get_page_by_path( $slug ) );
    $page_current     = get_query_var( 'cpt_pagination' ) <= 1 ? 1 : get_query_var( 'cpt_pagination' );
    $item_by_page     = intval( w25_get_option( 'news_by_page' ) ) >= 1 ? w25_get_option( 'news_by_page' ) : 4;

    $image      = get_the_post_thumbnail_url();
    $image_hero = $image ? $image : $url_template_dir . '/assets/img/placeholder.jpg';
?>

<div class="container form-container page-brief" id="page-brief">

    <div class="row ">
        <div class="estimate-form-hello mx-auto">
            <h1 class="consult-project-title"><?php _e( 'Consult your project', '25wat' ); ?></h1>

            <div class="form-heading">
                <div class="form-heading-info">
                    <p class="font-300">
                        <?php _e( 'A well-designed and optimized website can increase sales conversions by up to 300%. What is more, website visuals affect over 40% of brand perception. According to Gemius, as many as 54% of Poles shop online. To reach them, the website must be tailored to the needs of the target group. When implementing web projects, we evaluate what solutions are best for the Client. We take into account goals, prepare an initial project following the principles of User Experience, adjust the necessary technologies and create unique content and graphics that emphasize the uniqueness of the brand. ', '25wat' ); ?>
                    </p>
                </div>

                <div class="form-heading-team">

                    <!-- gabi -->
                    <div class="form-heading-people">
                       <?php echo wp_get_attachment_image('2009', '100x100')?>
                        <h5><?php _e( 'Gabi', '25wat' ); ?></h5>
                        <small><?php _e( 'Creative', '25wat' ); ?></small>
                    </div>

                    <!-- mateusz -->
                    <div class="form-heading-people">
                      <?php echo wp_get_attachment_image('2019', '100x100')?>
                        <h5><?php _e( 'Mateusz', '25wat' ); ?></h5>
                        <small><?php _e( 'Strategy', '25wat' ); ?></small>
                    </div>

                    <!-- asia -->
                    <div class="form-heading-people">
                      <?php echo wp_get_attachment_image('2005', '100x100')?>
                        <h5><?php _e( 'Asia', '25wat' ); ?></h5>
                        <small><?php _e( 'Community', '25wat' ); ?></small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form id="brief-form">
        <input type="hidden" id="value-budget" name="budget" value="-1">
        <input type="hidden" id="value-time" name="duration" value="-1">

        <!-- 01 -->
        <div class="form-row row-1 val-1">
            <div class="step-heading">
                <p class="step-number">01</p>
                <h4><?php _e( 'Project area', '25wat' ); ?></h4>
                <p class="small-info"><?php _e( '(Select one or more fields)', '25wat' ); ?></p>
            </div>

            <div class="checkboxes">
                <div class="checkbox ">
                    <span class="info">
                        <assets src="<?php echo $url_template_dir; ?>/assets/img/quote-gray.png" alt="">
                    </span>
                    <input type="checkbox" name="app_design">
                    <label for="app_design"><?php _e( '#Web', '25wat' ); ?><br><?php _e( '#App Design', '25wat' ); ?></label>
                    <span class="checkmark"></span>
                </div>

                <div class="checkbox">
                    <span class="info">
                        <assets src="<?php echo $url_template_dir; ?>/assets/img/quote-gray.png" alt="">
                    </span>
                    <input type="checkbox" name="social_media">
                    <label for="social_media"><?php _e( '#Social media', '25wat' ); ?></label>
                    <span class="checkmark"></span>
                </div>

                <div class="checkbox">
                    <span class="info">
                        <assets src="<?php echo $url_template_dir; ?>/assets/img/quote-gray.png" alt="">
                    </span>
                    <input type="checkbox" name="advertising">
                    <label for="advertising"><?php _e( '#Advertising', '25wat' ); ?></label>
                    <span class="checkmark"></span>
                </div>

                <div class="checkbox">
                    <span class="info">
                        <assets src="<?php echo $url_template_dir; ?>/assets/img/quote-gray.png" alt="">
                    </span>
                    <input type="checkbox" name="branding">
                    <label for="branding"><?php _e( '#Branding', '25wat' ); ?></label>
                    <span class="checkmark"></span>
                </div>
            </div>
        </div>
        <!-- 01 -->

        <!-- 02 -->
        <div class="form-row row-2 val-2">
            <div class="step-heading">
                <p class="step-number">02</p>
                <h4><?php _e( 'Field of work', '25wat' ); ?></h4>
                <p class="small-info"><?php _e( '(Select one or more fields)', '25wat' ); ?></p>
            </div>

            <div class="checkboxes">
                <div class="checkbox">
                    <span class="info">
                        <assets src="<?php echo $url_template_dir; ?>/assets/img/quote-white.png" alt="">
                    </span>
                    <input type="checkbox" name="brand_strategy">
                    <label for="brand_strategy"><?php _e( '#Brand strategy', '25wat' ); ?></label>
                    <span class="checkmark"></span>
                </div>

                <div class="checkbox">
                    <span class="info">
                        <assets src="<?php echo $url_template_dir; ?>/assets/img/quote-gray.png" alt="">
                    </span>
                    <input type="checkbox" name="graphic_design">
                    <label for="graphic_design"><?php _e( '#Graphic design', '25wat' ); ?></label>
                    <span class="checkmark"></span>
                </div>

                <div class="checkbox">
                    <span class="info">
                        <assets src="<?php echo $url_template_dir; ?>/assets/img/quote-gray.png" alt="">
                    </span>
                    <input type="checkbox" name="advertising_campaign">
                    <label for="advertising_campaign"><?php _e( '#Advertising campaign', '25wat' ); ?></label>
                    <span class="checkmark"></span>
                </div>

                <div class="checkbox">
                    <span class="info">
                        <assets src="<?php echo $url_template_dir; ?>/assets/img/quote-gray.png" alt="">
                    </span>
                    <input type="checkbox" name="programming">
                    <label for="programming"><?php _e( '#Programming', '25wat' ); ?></label>
                    <span class="checkmark"></span>
                </div>
            </div>
        </div>
        <!-- 02 -->

        <!-- 03 -->
        <div class="form-row row-3 val-3">
            <div class="step-heading">
                <p class="step-number">03</p>
                <h4><?php _e( 'Estimated budget', '25wat' ); ?></h4>
                <div id="range-output"></div>
                <div id="budget-value" class="d-none">-1</div>
            </div>

            <div class="budget-range">
                <input id="input-budget" class="input-selector" type="range" min="0" value="0" max="3" step="1">
                <div class="range-outputs">
                    <div class="budget-range-output output-step-1"><?php _e( '3000 - 5000', '25wat' ); ?></div>
                    <div class="budget-range-output output-step-2"><?php _e( '5000 - 10000', '25wat' ); ?></div>
                    <div class="budget-range-output output-step-3"><?php _e( '10000 - 20000', '25wat' ); ?></div>
                    <div class="budget-range-output output-step-4"><?php _e( '20000 - 100000', '25wat' ); ?></div>
                </div>
            </div>
        </div>
        <!-- 03 -->

        <!-- 04 -->
        <div class="form-row row-3 val-4">
            <div class="step-heading">
                <p class="step-number">04</p>
                <h4><?php _e( 'Estimated project duration', '25wat' ); ?></h4>
                <div id="range-output-time"></div>
                <div id="time-value" class="d-none"></div>
            </div>

            <div class="budget-range">
                <input id="input-time" class="input-selector" type="range" min="0" value="0" max="3" step="1">
                <div class="range-outputs">
                    <div class="budget-range-output output-step-1"><?php _e( '1m', '25wat' ); ?></div>
                    <div class="budget-range-output output-step-2"><?php _e( '2 - 6m', '25wat' ); ?></div>
                    <div class="budget-range-output output-step-3"><?php _e( '6 - 12m', '25wat' ); ?></div>
                    <div class="budget-range-output output-step-4"><?php _e( '12m +', '25wat' ); ?></div>
                </div>
            </div>
        </div>
        <!-- 04 -->

        <div class="form-row row-4">
            <input type="email" name="email" id="input-mail" placeholder="<?php _e( 'type your e-mail', '25wat' ); ?>">
            <label class="email-label" for="email">
                <assets style="position:absolute; left: 1px; top: -36px;"
                    src="<?php echo $url_template_dir; ?>/assets/img/email.png" alt="">
            </label>
            <div class="error_email text-center w-100 mt-1 color-red d-none"><?php _e( 'Please input your e-mail', '25wat' ); ?></div>
        </div>

        <div class="form-row row-5">
            <textarea name="message" placeholder="<?php _e( 'Describe your idea', '25wat' ); ?>" cols="30" rows="10"></textarea>
            <p class="mt-3 mb-2 text-left"><?php _e( 'Want to sign the NDA? Send us a message at biuro@25wat.com', '25wat' ); ?></p>
        </div>

        <div class="form-row row-6">
            <label for="rodo" class="rodo">

                <input type="checkbox" name="rodo" id="input-rodo">
                <p>
                    <?php _e( 'I agree to the processing of my personal data provided on the form by 25wat.', '25wat' ); ?>
                </p>

                <span class="checkmark"></span>
            </label>
        </div>

        <div class="form-row row-7">
            <div class="form-mail form-page-contact">
                <div class="form-send-btn">
                    <svg class="liquid-button__blog-item d-none d-md-block"
                        data-text="<?php _e( 'Send', '25wat' ); ?>" data-force-factor="0.1"
                        data-layer-1-viscosity="0.3" data-layer-2-viscosity="0.4" data-layer-1-mouse-force="300"
                        data-layer-2-mouse-force="400" data-layer-1-force-limit="1" data-layer-2-force-limit="2"
                        data-color1="#0131FF" data-color2="#0131FF" data-color3="#2A62F4"></svg>
                    <span class="btn btn-card__mobile d-lg-none"><?php _e( 'Send', '25wat' ); ?></span>
                </div>
            </div>
            <h5 class="error-info color-red text-center w-100 mt-3 mt-sm-3 mt-md-3 border border-danger p-3 d-none"><?php _e( 'One or more fields have an error. Please check and try again.', '25wat' ); ?></h5>
            <h5 class="info-mail-send color-green text-center w-100 mt-3 mt-sm-3 mt-md-3 border border-green p-3 d-none"><?php _e( 'Thank you for your message. It has been sent.', '25wat' ); ?></h5>
            <h5 class="info-mail-error color-red text-center w-100 mt-3 mt-sm-3 mt-md-3 border border-danger p-3 d-none"><?php _e( 'There was an error trying to send your message. Please try again.', '25wat' ); ?></h5>
        </div>
    </form>
</div>

<?php
    get_footer();
