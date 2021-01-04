<?php
    /**
     *  Template Name: 25wat - front page, home
     *
     *  @package    25wat
     */

    get_header();

    $url_main         = get_bloginfo( 'url' );
    $url_template_dir = get_template_directory_uri();
    $slug             = w25_get_current_slug( true );
    $url_base         = get_permalink( get_page_by_path( $slug ) );
    $page_current     = get_query_var( 'cpt_pagination' ) <= 1 ? 1 : get_query_var( 'cpt_pagination' );
    $item_by_page     = intval( w25_get_option( 'news_by_page' ) ) >= 1 ? w25_get_option( 'news_by_page' ) : 8;

    $image      = get_the_post_thumbnail_url();
    $image_hero = $image ? $image : $url_template_dir . '/assets/img/placeholder.jpg';
?>

<section class="home-video" id="page-home">
    <video class="d-none d-md-block" src="<?php echo $url_template_dir; ?>/assets/videos/hero-move.mp4" autoplay muted
        loop playsinline></video>
    <video class="d-block d-md-none" src="<?php echo $url_template_dir; ?>/assets/videos/hero-move-mobile.mp4" autoplay
        muted loop playsinline></video>
</section>

<section class="video-sound-switcher">
    <p><?php _e( 'Sound on/off', '25wat' ); ?></p>
    <label class="switch ml-3">
        <input id="sound-switcher" type="checkbox">
        <span class="slider round"></span>
    </label>

    <div class="video-sound-switcher__blob">
            <svg xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 310 350">
                <path
                    d="M156.4,339.5c31.8-2.5,59.4-26.8,80.2-48.5c28.3-29.5,40.5-47,56.1-85.1c14-34.3,20.7-75.6,2.3-111  c-18.1-34.8-55.7-58-90.4-72.3c-11.7-4.8-24.1-8.8-36.8-11.5l-0.9-0.9l-0.6,0.6c-27.7-5.8-56.6-6-82.4,3c-38.8,13.6-64,48.8-66.8,90.3c-3,43.9,17.8,88.3,33.7,128.8c5.3,13.5,10.4,27.1,14.9,40.9C77.5,309.9,111,343,156.4,339.5z" />
            </svg>
    </div>
</section>

<section class="d-none d-xl-block position-relative sound-switcher-wrapper" style="display: none !important;">
    <div class="container">
        <div class="row">
            <div class="col">
            </div>
        </div>
    </div>
    <span class="d-block sound-flubber">
        <div class="sound-flubber-txt-wrapper d-flex align-items-center justify-content-center mb-1">
            <p><?php _e( 'Sound on/off', '25wat' ); ?></p>
            <label class="switch ml-3">
                <input id="sound-switcher" type="checkbox">
                <span class="slider round"></span>
            </label>
        </div>

        <div class="blob-startup" style="">
            <svg xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 310 350">
                <path
                    d="M156.4,339.5c31.8-2.5,59.4-26.8,80.2-48.5c28.3-29.5,40.5-47,56.1-85.1c14-34.3,20.7-75.6,2.3-111  c-18.1-34.8-55.7-58-90.4-72.3c-11.7-4.8-24.1-8.8-36.8-11.5l-0.9-0.9l-0.6,0.6c-27.7-5.8-56.6-6-82.4,3c-38.8,13.6-64,48.8-66.8,90.3c-3,43.9,17.8,88.3,33.7,128.8c5.3,13.5,10.4,27.1,14.9,40.9C77.5,309.9,111,343,156.4,339.5z" />
            </svg>
        </div>
    </span>
</section>

<section class="changers" data-aos="fade-in">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-6">
                <h1 class="text-uppercase mt-2 mt-lg-5 pt-3"><?php _e( 'CREATIVE & DIGITAL AGENCY FOR GAME CHANGERS', '25wat' ); ?></h1>
                <p><?php _e( 'We create brands, develop startups and scale-ups 25wat support game changers with 360° marketing', '25wat' ); ?>
                </p>
            </div>
        </div>
    </div>
</section>

<div class="container-fluid portfolio landing-portfolio" data-aos="fade-in">
    <div class="row pt-2 pb-4">
        <div class="col-12 text-center">
            <h2 class="pt-3 pb-3 d-none d-md-block" data-aos="fade-up"><?php _e( 'Case studies', '25wat' ); ?></h2>
        </div>
    </div>

    <section class='row competences'>
        <?php
            $args = [
                'post_type'        => 'case-study',
                'orderby'          => 'date',
                'order'            => 'DESC',
                'numberposts'      => 6,
                'suppress_filters' => false,
            ];
            $data = get_posts( $args );

            if ( $data ) {
                foreach ( $data as $key => $item ) {
                    $post_title   = apply_filters( 'the_title', $item->post_title );
                    $post_content = apply_filters( 'the_content', $item->post_content );
                    $post_excerpt = w25_excerpt_text( $post_content );
                    $post_link    = get_permalink( $item->ID );
                    $post_image   = w25_seo_image_url( get_the_post_thumbnail_url( $item->ID ), '650x450' );

                    ?>
        <div class='d-none d-md-block col-12a col-md-6 col-lg-4 portfolio-item item-1' data-aos='fade-up'>
            <a href='<?php echo $post_link; ?>'>
                <div class='hover-box'>
                    <h3><?php echo $post_title; ?></h3>
                    <div class='sep hb-sep' style='width: 200px;'></div>
                    <div class=' hb-hashtags'>
                        <ul>
                            <?php
                                            set_query_var( 'partial-post-id', $item->ID );
                                            get_template_part( 'template-parts/partial-case-study-list' );
                                        ?>
                        </ul>
                    </div>
                    <div class="hover-box__overlay"></div>
                </div>
                <img src='<?php echo $post_image; ?>' class='img-fluid hb-img'>
            </a>
        </div>
        <?php
                }
            }
        ?>

        <span class="glider">
            <?php
                $args = [
                    'post_type'        => 'case-study',
                    'orderby'          => 'date',
                    'order'            => 'DESC',
                    'numberposts'      => 6,
                    'suppress_filters' => false,
                ];
                $data = get_posts( $args );

                if ( $data ) {
                    foreach ( $data as $key => $item ) {
                        $post_title   = apply_filters( 'the_title', $item->post_title );
                        $post_content = apply_filters( 'the_content', $item->post_content );
                        $post_excerpt = w25_excerpt_text( $post_content );
                        $post_link    = get_permalink( $item->ID );
                        $post_image   = w25_seo_image_url( get_the_post_thumbnail_url( $item->ID ), '650x450' );
                        ?>
            <div class='d-block d-md-none portfolio-item item-1' data-aos='fade-up'>
                <a href='<?php echo $post_link; ?>'>
                    <div class='hover-box'>
                        <h3><?php echo $post_title; ?></h3>
                        <div class='sep hb-sep' style='width: 200px;'></div>
                        <div class=' hb-hashtags'>
                            <ul>
                                <?php
                                            set_query_var( 'partial-post-id', $item->ID );
                                            get_template_part( 'template-parts/partial-case-study-list' );
                                        ?>
                            </ul>
                        </div>
                    </div>
                    <img loading="lazy" src='<?php echo $post_image; ?>' class='img-fluid hb-img'>
                </a>
            </div>
            <?php
                    }
                }
            ?>
        </span>

        <div class="row " data-aos="fade-in">
            <div class="col-12 col-md-6 offset-md-3 text-left text-md-center competences__home">
                <h2 class="pt-5 pb-5" data-aos="fade-up"><?php _e( 'What we do', '25wat' ); ?></h2>
                <p data-aos="fade-up">
                    <?php _e( 'Our misson is to develop startups and scale-ups. We\'re doing that with the help of 27 specialist in fields of strategy, branding, web design, content management, photo/video production and IT. Our experience comes from more than 200 projects in over 50 industries. We provide solutions based on Human-Centered Design. We tailor custom communication for brands and its audiences using creative tools and technologies. In result, we deliver measurable effects.', '25wat' ); ?>
                </p>
            </div>
        </div>

        <div class="row cards">

            <?php
        $offer_page = get_page_by_path( 'offer' );
        $offer_childs = get_posts(
            [
                'post_type'        => 'page',
                'post_parent'      => $offer_page->ID,
                'orderby'          => 'menu_order',
                'order'            => 'ASC',
                'numberposts'      => -1,
                'suppress_filters' => false,
            ]
        );

        if ( $offer_childs ) {
            foreach ( $offer_childs as $key => $item ) {

                $post_link        = get_permalink( $item->ID );
                $post_title       = apply_filters( 'the_title', $item->post_title );
                $post_description = get_field( 'description', $item->ID );
                $post_button      = get_field( 'button', $item->ID );
                $post_button      = strlen( $post_button ) > 0 ? $post_button : $post_title;

                $childs = get_posts(
                    [
                        'post_type'        => 'page',
                        'post_parent'      => $item->ID,
                        'orderby'          => 'menu_order',
                        'order'            => 'ASC',
                        'numberposts'      => -1,
                        'suppress_filters' => false,
                    ]
                );
                if ( $childs ) {
                    foreach ( $childs as $child ) {
                        $child_title = apply_filters( 'the_title', $child->post_title );
                        $child_link  = get_permalink( $child->ID );
                    }
                }
                ?>
            <div class='d-md-block card' data-aos='flip-up'>
                <h2 class='hvr-shrink text-center'><?php echo $item->post_title; ?></h2>
                <ul class='text-center'>
                    <?php
                        if ( $childs ) {
                            foreach ( $childs as $child ) {
                                $child_title = apply_filters( 'the_title', $child->post_title );
                                $child_link  = get_permalink( $child->ID );
                    ?>
                    <li class='hvr-forward'><a href="<?php echo $child_link; ?>"><?php echo $child_title; ?></a></li>
                    <?php
                            }
                        }
                    ?>
                </ul>
                <a class="cards-fluid-button-wrapper d-block" href="<?php echo $post_link; ?>">
                    <svg class="liquid-button__blog-item" data-text="<?php echo $post_button; ?>"
                        data-force-factor="0.1" data-layer-1-viscosity="0.3" data-layer-2-viscosity="0.4"
                        data-layer-1-mouse-force="300" data-layer-2-mouse-force="400" data-layer-1-force-limit="1"
                        data-layer-2-force-limit="2" data-color1="#0131FF" data-color2="#0131FF" data-color3="#2A62F4"
                        data-width="280">
                    </svg>
                </a>
            </div>
            <?php
            }
        }
        ?>

            <div class="row process" data-aos="fade-up">
                <div class="col-12 col-md-7 process-img">
                    <div class="dots-animation">
                        <div class='process-dot'></div>
                        <div class='process-dot'></div>
                        <div class='process-dot'></div>
                        <div class='process-dot'></div>
                        <div class='process-dot'></div>
                        <div class='process-dot'></div>
                        <div class='process-dot'></div>
                        <div class='process-dot'></div>
                        <div class='process-dot'></div>
                        <div class='process-dot'></div>
                        <div class='process-dot'></div>
                        <div class='process-dot'></div>
                        <div class='process-dot'></div>
                        <div class='process-dot'></div>
                        <div class='process-dot'></div>
                        <div class='process-dot'></div>
                        <div class='process-dot'></div>
                        <div class='process-dot'></div>
                        <div class='process-dot'></div>
                        <div class='process-dot'></div>
                        <div class='process-dot'></div>
                        <div class='process-dot'></div>
                        <div class='process-dot'></div>
                        <div class='process-dot'></div>
                        <div class='process-dot'></div>
                        <div class='process-dot'></div>
                        <div class='process-dot'></div>
                        <div class='process-dot'></div>
                        <div class='process-dot'></div>
                        <div class='process-dot'></div>
                        <div class='process-dot'></div>
                        <div class='process-dot'></div>
                        <div class='process-dot'></div>
                        <div class='process-dot'></div>
                        <div class='process-dot'></div>
                        <div class='process-dot'></div>
                        <div class='process-dot'></div>
                        <div class='process-dot'></div>
                        <div class='process-dot'></div>
                        <div class='process-dot'></div>
                    </div>

                    <div id="process-head" style="z-index: 444 !important;" class="bg-paralax"
                        data-relative-input="true">
                        <img loading="lazy" data-depth="0.2" src="<?php echo $url_template_dir; ?>/assets/img/process.png" alt=""
                            class="img-fluid process-head" data-aos="zoom-out" style="z-index: 4444;">
                    </div>
                </div>

                <div class="col-12 col-md-5 pl-5 pr-5 pt-0 pt-lg-5 mt-lg-5 mb-4">
                    <h2 class="pt-4 pb-4"><?php _e( 'Creative Process:', '25wat' ); ?></h2>
                    <p class="w-80">
                        <?php _e( 'Behind each success, there\'s a well-planned campaign. In communication design, we leverage the unique talents of our team who use workshop tools (Design Thinking, Design Sprint, Service Design Canvas) and innovative technologies to pursue campaign goals.', '25wat' ); ?>
                    </p>
                    <a class="link-arrow"
                        href="<?php echo get_permalink( get_page_by_path( 'marketing-agency-people' ) ); ?>"><?php _e( 'Check our way to effective solutions.', '25wat' ); ?></a>
                </div>
            </div>

            <!-- <div class="container-fluid home__team ">
                <div class="row">
                    <div class="col-12 col-xl-6 txt-pos">
                        <img loading="lazy" class="img-fluid d-block d-lg-none border"
                            src="<?php echo $url_template_dir; ?>/assets/img/team-bg.jpg" alt="">

                        <span class="forpadding mt-5">
                            <h2 class="pb-4"><?php _e( 'Team', '25wat' ); ?></h2>
                            <p>
                                <?php _e( '25wat consists of goal-oriented #people that deliver win-win communication. Our clients achieve their goals when we deliver engaging content to their audiences. We tell #stories with real #feelings to enrich our world.', '25wat' ); ?>
                            </p>
                        </span>

                        <svg id="index-zespol-flubber" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                            viewBox="0 0 700 600">
                            <linearGradient id="linear-gradient" x1="0.154" y1="0.098" x2="0.654" y2="0.823"
                                gradientUnits="objectBoundingBox">
                                <stop offset="0" stop-color="#ffca1b" />
                                <stop offset="1" stop-color="#fcea00" />
                            </linearGradient>
                            <path fill="url(#linear-gradient)" />
                        </svg>
                        
                    </div>
                </div>
            </div> -->

            <div class="home__team2"
                style="z-index: -1; background-image: url(<?php echo $url_template_dir; ?>/assets/img/team-bg.jpg)">
                <img loading="lazy" class="img-fluid d-xl-none" src="<?php echo $url_template_dir; ?>/assets/img/team-bg.jpg"
                    alt="our team">
                <div class="home__team2-info">
                    <h2 class="pb-4"><?php _e( 'Team', '25wat' ); ?></h2>
                    <p> <?php _e( '25wat consists of goal-oriented #people that deliver win-win communication. Our clients achieve their goals when we deliver engaging content to their audiences. We tell #stories with real #feelings to enrich our world.', '25wat' ); ?>
                    </p>
                </div>

            </div>

            <div class="container-fluid mt-2 own-projects" data-aos="fade-up">
                <div class="row d-flex align-items-center justify-content-center">
                    <div class="col-12 col-lg-4 offset-lg-1">
                        <h2 class="pt-4 pb-4 text-capitalize"><?php _e( 'Our own projects', '25wat' ); ?></h2>
                        <p>
                            <?php _e( 'We like to work with innovators that change market rules. We do that ourselves as well, by developing our own solutions to elevate our work. They\'re used by our clients too. To deal with problems globally, we power up our projects with our practical experience in marketing, business, and technology.', '25wat' ); ?>
                        </p>
                        <a class="link-arrow mt-3"
                            href="<?php echo get_permalink( get_page_by_path( 'marketing-agency-people' ) ); ?>#our-projects"><?php _e( 'See our own projects', '25wat' ); ?></a>
                    </div>
                    <div data-relative-input="true" id="own-projects-photo" class="col-12 col-md-7">
                        <img loading="lazy" class="d-none d-lg-block" data-depth="0.2"
                            src="<?php echo $url_template_dir; ?>/assets/img/own-projects.png" alt="" class="img-fluid"
                            data-aos="zoom-out">
                    </div>
                </div>
            </div>
        </div>

        <section class="container-fluid no-paddings">
            <div class="row">
                <div class="col-12 offset-0 col-lg-4 offset-lg-1 testimonials-heading">
                    <h2 class="pt-4 pb-3"><?php _e( 'Our Partners', '25wat' ); ?></h2>
                </div>
            </div>
            <div class="row">
                <div class="our-partners">
                    <div>
                        <a href="https://ikona.co/" target="_blank">
                            <img loading="lazy" src="<?php echo $url_template_dir; ?>/assets/img/our-partners/ikona.png"
                                alt="ikona logo" class="img-fluid">
                        </a>
                    </div>
                    <div>
                        <a href="https://www.eactive.pl/" target="_blank">
                            <img loading="lazy" src="<?php echo $url_template_dir; ?>/assets/img/our-partners/logo-eactive.png"
                                alt="eactive logo" class="img-fluid">
                        </a>
                    </div>
                    <div>
                        <a href="https://like.agency/pl/" target="_blank">
                            <img loading="lazy" src="<?php echo $url_template_dir; ?>/assets/img/our-partners/likelogo.png"
                                alt="like agency logo" class="img-fluid">
                        </a>
                    </div>
                    <div>
                        <a href="http://www.prometeia.pl/" target="_blank">
                            <img loading="lazy" src="<?php echo $url_template_dir; ?>/assets/img/our-partners/prometeia_pif.png"
                                alt="prometeia logo" class="img-fluid">
                        </a>
                    </div>
                    <div>
                        <a href="https://dwgdesign.pl/" target="_blank">
                            <img loading="lazy" src="<?php echo $url_template_dir; ?>/assets/img/our-partners/dwg-design-logo.png"
                                alt="dwg design logo" class="img-fluid">
                        </a>
                    </div>
                    <div>
                        <a href="https://tytani24.com/" target="_blank">
                            <img loading="lazy" src="<?php echo $url_template_dir; ?>/assets/img/our-partners/logotytani.png"
                                alt="tytani24 logo" class="img-fluid">
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="container-fluid no-paddings">
            <div class="row">
                <div class="col-12 offset-0 col-lg-4 offset-lg-1 testimonials-heading">
                    <h2 class="pt-4 pb-3"><?php _e( 'Testimonials', '25wat' ); ?></h2>
                </div>
            </div>
            <div class="testimonials testimonials-row-1 d-flex">
                <?php
                    set_query_var( 'testimonials-rows', 3 );
                    set_query_var( 'testimonials-part', 0 );
                    get_template_part( 'template-parts/partial-home-testimonials' );
                ?>
            </div>
            <div dir="rtl">
                <div class="testimonials testi d-flex ">
                    <?php
                        set_query_var( 'testimonials-rows', 3 );
                        set_query_var( 'testimonials-part', 1 );
                        get_template_part( 'template-parts/partial-home-testimonials' );
                    ?>
                </div>
            </div>
            <div class="testimonials last-testmin d-flex " data-aos="zoom-out">
                <?php
                    set_query_var( 'testimonials-rows', 3 );
                    set_query_var( 'testimonials-part', 2 );
                    get_template_part( 'template-parts/partial-home-testimonials' );
                ?>
            </div>
        </section>

        <div class="container logos mt-5" data-aos="fade-up" style="max-width: 1200px;">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-3 col-md-2 col-lg-2 col-xl-2"><img loading="lazy"
                        src="<?php echo $url_template_dir; ?>/assets/img/2.png" alt="Partner logotype"
                        class="img-fluid">
                </div>
                <div class="col-3 col-md-2 col-lg-2 col-xl-2"><img loading="lazy"
                        src="<?php echo $url_template_dir; ?>/assets/img/natura.svg" alt="Partner logotype"
                        class="img-fluid">
                </div>
                <div class="col-3 col-md-2 col-lg-2 col-xl-2"><img loading="lazy"
                        src="<?php echo $url_template_dir; ?>/assets/img/essity.svg" alt="Partner logotype"
                        class="img-fluid">
                </div>
                <div class="col-3 col-md-2 col-lg-2 col-xl-2"><img loading="lazy"
                        src="<?php echo $url_template_dir; ?>/assets/img/organique.svg" alt="Partner logotype"
                        class="img-fluid">
                </div>
                <div class="col-3 col-md-2 col-lg-2 col-xl-2"><img loading="lazy"
                        src="<?php echo $url_template_dir; ?>/assets/img/craftova.svg" alt="Partner logotype"
                        class="img-fluid">
                </div>
                <div class="col-3 col-md-2 col-lg-2 col-xl-2"><img loading="lazy"
                        src="<?php echo $url_template_dir; ?>/assets/img/arbuzz.svg" alt="Partner logotype"
                        class="img-fluid">
                </div>
            </div>
            <div class="row d-none d-md-flex  pt-5 align-items-center justify-content-center" data-aos="fade-up">
                <div class="col-3 col-md-2 col-lg-2 col-xl-2"><img loading="lazy"
                        src="<?php echo $url_template_dir; ?>/assets/img/sony.png" alt="Partner logotype"
                        class="img-fluid">
                </div>
                <div class="col-3 col-md-2 col-lg-2 col-xl-2"><img loading="lazy"
                        src="<?php echo $url_template_dir; ?>/assets/img/ovh.svg" alt="Partner logotype"
                        class="img-fluid">
                </div>
                <div class="col-3 col-md-2 col-lg-2 col-xl-2"><img loading="lazy"
                        src="<?php echo $url_template_dir; ?>/assets/img/neonet.svg" alt="Partner logotype"
                        class="img-fluid">
                </div>
                <div class="col-3 col-md-2 col-lg-2 col-xl-2"><img loading="lazy"
                        src="<?php echo $url_template_dir; ?>/assets/img/asbo.svg" alt="Partner logotype"
                        class="img-fluid">
                </div>
                <div class="col-3 col-md-2 col-lg-2 col-xl-2"><img loading="lazy"
                        src="<?php echo $url_template_dir; ?>/assets/img/kopalnia.svg" alt="Partner logotype"
                        class="img-fluid">
                </div>
                <div class="col-3 col-md-2 col-lg-2 col-xl-2"><img loading="lazy"
                        src="<?php echo $url_template_dir; ?>/assets/img/foodito.svg" alt="Partner logotype"
                        class="img-fluid">
                </div>
            </div>
            <div class="row d-none d-md-flex align-items-center justify-content-center" data-aos="fade-up"
                style="padding-top: 77px !important;">

                <div class="col-3 col-md-2 col-lg-2 col-xl-2"><img loading="lazy"
                        src="<?php echo $url_template_dir; ?>/assets/img/logo25w_logo-echo-investment.svg"
                        alt="echo investments" class="img-fluid">
                </div>
                <div class="col-3 col-md-2 col-lg-2 col-xl-2"><img loading="lazy"
                        src="<?php echo $url_template_dir; ?>/assets/img/logo25w_logo-lukasiuk.svg" alt="lukasiuk"
                        class="img-fluid">
                </div>
                <div class="col-3 col-md-2 col-lg-2 col-xl-2"><img loading="lazy"
                        src="<?php echo $url_template_dir; ?>/assets/img/logo25w_logo-socoffee.svg" alt="socoffee"
                        class="img-fluid">
                </div>

                <!-- ----------- -->
                <div class="col-3 col-md-2 col-lg-2 col-xl-2"><img loading="lazy"
                        src="<?php echo $url_template_dir; ?>/assets/img/nutsbe_logo.svg" alt="Partner logotype"
                        class="img-fluid">
                </div>
                <div class="col-3 col-md-2 col-lg-2 col-xl-2"><img loading="lazy"
                        src="<?php echo $url_template_dir; ?>/assets/img/selena_logo.svg" alt="Partner logotype"
                        class="img-fluid">
                </div>
                <div class="col-3 col-md-2 col-lg-2 col-xl-2"><img loading="lazy"
                        src="<?php echo $url_template_dir; ?>/assets/img/olesinski-i-wspolnicy-partner-25wat.svg"
                        alt="Partner logotype" class="img-fluid">
                </div>
            </div>
        </div>

        <div class="container-fluid contact-bg">
            <div class="row">
                <div id="cf-team-photo" data-relative-input="true" class="d-none d-lg-block col-6"></div>
                <div
                    class="contact-home col-12 col-lg-6 d-flex flex-column align-items-center justify-content-center position-relative">
                    <svg id="index-zespol-flubber2" class=""
                        style="transform: scale(3.5); overflow: visible;  position: relative; top: 113px;"
                        xmlns="http://www.w3.org/2000/svg" x="0px" y="0px">
                        <linearGradient id="linear-gradient" x1="0.154" y1="0.098" x2="0.654" y2="0.823"
                            gradientUnits="objectBoundingBox">
                            <stop offset="0" stop-color="#ffca1b" />
                            <stop offset="1" stop-color="#fcea00" />
                        </linearGradient>
                        <path fill="url(#linear-gradient)" />
                    </svg>

                    <div class="form-mail form-page-home">
                        <h2 class="mt-3"><?php _e( 'Contact', '25wat' ); ?></h2>
                        <h5 class="mb-3"><?php _e( 'Please contact us', '25wat' ); ?></h5>

                        <?php
                            if ( 'pl' === ICL_LANGUAGE_CODE ) {
                                echo do_shortcode( '[contact-form-7 id="1856"]' );
                            } else {
                                echo do_shortcode( '[contact-form-7 id="1858"]' );
                            }
                        ?>

                        <div class="form-send-btn">
                            <svg class="liquid-button__blog-item d-none d-md-block"
                                data-text="<?php _e( 'Please contact us', '25wat' ); ?>" data-force-factor="0.1"
                                data-layer-1-viscosity="0.3" data-layer-2-viscosity="0.4" data-layer-1-mouse-force="300"
                                data-layer-2-mouse-force="400" data-layer-1-force-limit="1" data-layer-2-force-limit="2"
                                data-color1="#0131FF" data-color2="#0131FF" data-color3="#2A62F4"></svg>
                            <span
                                class="btn btn-card__mobile d-lg-none"><?php _e( 'Please contact us', '25wat' ); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>

<style>
    svg#index-zespol-flubber path {
        d: path('M37.5,186c-12.1-10.5-11.8-32.3-7.2-46.7c4.8-15,13.1-17.8,30.1-36.7C91,68.8,83.5,56.7,103.4,45	c22.2-13.1,51.1-9.5,69.6-1.6c18.1,7.8,15.7,15.3,43.3,33.2c28.8,18.8,37.2,14.3,46.7,27.9c15.6,22.3,6.4,53.3,4.4,60.2	c-3.3,11.2-7.1,23.9-18.5,32c-16.3,11.5-29.5,0.7-48.6,11c-16.2,8.7-12.6,19.7-28.2,33.2c-22.7,19.7-63.8,25.7-79.9,9.7	c-15.2-15.1,0.3-41.7-16.6-54.9C63,186,49.7,196.7,37.5,186z');
        animation: morph2 5s infinite;
    }

    svg#index-zespol-flubber:hover path {
        d: path:hover('M51,171.3c-6.1-17.7-15.3-17.2-20.7-32c-8-21.9,0.7-54.6,20.7-67.1c19.5-12.3,32.8,5.5,67.7-3.4C145.2,62,145,49.9,173,43.4 c12-2.8,41.4-9.6,60.2,6.6c19,16.4,16.7,47.5,16,57.7c-1.7,22.8-10.3,25.5-9.4,46.4c1,22.5,11.2,25.8,9.1,42.6	c-2.2,17.6-16.3,37.5-33.5,40.8c-22,4.1-29.4-22.4-54.9-22.6c-31-0.2-40.8,39-68.3,35.7c-17.3-2-32.2-19.8-37.3-34.8	C48.9,198.6,57.8,191,51,171.3z');
    }

    @keyframes morph2 {

        0%,
        100% {
            d: path('M37.5,186c-12.1-10.5-11.8-32.3-7.2-46.7c4.8-15,13.1-17.8,30.1-36.7C91,68.8,83.5,56.7,103.4,45	c22.2-13.1,51.1-9.5,69.6-1.6c18.1,7.8,15.7,15.3,43.3,33.2c28.8,18.8,37.2,14.3,46.7,27.9c15.6,22.3,6.4,53.3,4.4,60.2	c-3.3,11.2-7.1,23.9-18.5,32c-16.3,11.5-29.5,0.7-48.6,11c-16.2,8.7-12.6,19.7-28.2,33.2c-22.7,19.7-63.8,25.7-79.9,9.7	c-15.2-15.1,0.3-41.7-16.6-54.9C63,186,49.7,196.7,37.5,186z');
        }

        50% {
            d: path('M51,171.3c-6.1-17.7-15.3-17.2-20.7-32c-8-21.9,0.7-54.6,20.7-67.1c19.5-12.3,32.8,5.5,67.7-3.4C145.2,62,145,49.9,173,43.4 c12-2.8,41.4-9.6,60.2,6.6c19,16.4,16.7,47.5,16,57.7c-1.7,22.8-10.3,25.5-9.4,46.4c1,22.5,11.2,25.8,9.1,42.6	c-2.2,17.6-16.3,37.5-33.5,40.8c-22,4.1-29.4-22.4-54.9-22.6c-31-0.2-40.8,39-68.3,35.7c-17.3-2-32.2-19.8-37.3-34.8	C48.9,198.6,57.8,191,51,171.3z')
        }
    }

    svg#index-zespol-flubber2 path {
        d: path('M37.5,186c-12.1-10.5-11.8-32.3-7.2-46.7c4.8-15,13.1-17.8,30.1-36.7C91,68.8,83.5,56.7,103.4,45	c22.2-13.1,51.1-9.5,69.6-1.6c18.1,7.8,15.7,15.3,43.3,33.2c28.8,18.8,37.2,14.3,46.7,27.9c15.6,22.3,6.4,53.3,4.4,60.2	c-3.3,11.2-7.1,23.9-18.5,32c-16.3,11.5-29.5,0.7-48.6,11c-16.2,8.7-12.6,19.7-28.2,33.2c-22.7,19.7-63.8,25.7-79.9,9.7	c-15.2-15.1,0.3-41.7-16.6-54.9C63,186,49.7,196.7,37.5,186z');
        animation: morph2 5s infinite;
    }

    svg#index-zespol-flubber2:hover path {
        d: path:hover('M51,171.3c-6.1-17.7-15.3-17.2-20.7-32c-8-21.9,0.7-54.6,20.7-67.1c19.5-12.3,32.8,5.5,67.7-3.4C145.2,62,145,49.9,173,43.4 c12-2.8,41.4-9.6,60.2,6.6c19,16.4,16.7,47.5,16,57.7c-1.7,22.8-10.3,25.5-9.4,46.4c1,22.5,11.2,25.8,9.1,42.6	c-2.2,17.6-16.3,37.5-33.5,40.8c-22,4.1-29.4-22.4-54.9-22.6c-31-0.2-40.8,39-68.3,35.7c-17.3-2-32.2-19.8-37.3-34.8	C48.9,198.6,57.8,191,51,171.3z');
    }

    @keyframes morph2 {

        0%,
        100% {
            d: path('M37.5,186c-12.1-10.5-11.8-32.3-7.2-46.7c4.8-15,13.1-17.8,30.1-36.7C91,68.8,83.5,56.7,103.4,45	c22.2-13.1,51.1-9.5,69.6-1.6c18.1,7.8,15.7,15.3,43.3,33.2c28.8,18.8,37.2,14.3,46.7,27.9c15.6,22.3,6.4,53.3,4.4,60.2	c-3.3,11.2-7.1,23.9-18.5,32c-16.3,11.5-29.5,0.7-48.6,11c-16.2,8.7-12.6,19.7-28.2,33.2c-22.7,19.7-63.8,25.7-79.9,9.7	c-15.2-15.1,0.3-41.7-16.6-54.9C63,186,49.7,196.7,37.5,186z');
        }

        50% {
            d: path('M51,171.3c-6.1-17.7-15.3-17.2-20.7-32c-8-21.9,0.7-54.6,20.7-67.1c19.5-12.3,32.8,5.5,67.7-3.4C145.2,62,145,49.9,173,43.4 c12-2.8,41.4-9.6,60.2,6.6c19,16.4,16.7,47.5,16,57.7c-1.7,22.8-10.3,25.5-9.4,46.4c1,22.5,11.2,25.8,9.1,42.6	c-2.2,17.6-16.3,37.5-33.5,40.8c-22,4.1-29.4-22.4-54.9-22.6c-31-0.2-40.8,39-68.3,35.7c-17.3-2-32.2-19.8-37.3-34.8	C48.9,198.6,57.8,191,51,171.3z')
        }
    }
</style>

<?php
    get_footer();
