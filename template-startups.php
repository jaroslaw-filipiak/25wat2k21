<?php
    /**
     *  Template Name: 25wat - startups, top
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
<div class="content hello-staruper-txt" id="video-init-stop" >
    <div class="container">
        <div class="row">
            <div class="col d-flex align-items-center justify-content-center text-center">
                <h1 class="startuper-heading"><?php _e( 'Hello Innovators, Startupers, and Enterpreneurs!', '25wat' ); ?></h1>
            </div>
        </div>
    </div>
</div>

<div id="page-startups">
    <svg class="startups-blob" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 288 288">
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
            c-15.2-15.1,0.3-41.7-16.6-54.9C63,186,49.7,196.7,37.5,186z	" />
        </path>
    </svg>
</div>

<section> 
    <div class="container-fluid startups-video " id="video-play">
        <div class="row">
            <div class="col p-0">
                <video src="<?php echo $url_template_dir; ?>/assets/videos/startup-movie.mp4" playsinline muted="muted"></video>
            </div>
        </div>
    </div>
</section>

<section class="what-can-we-do-for-you" id="video-stop">
    <div class="container">
        <div class="row pt-5 pb-5">
            <div class="col">
                <h3><?php _e( 'What can we do for you ?', '25wat' ); ?></h3>
            </div>
        </div>
        <div class="row offer-for-startups">

            <div class="col-12 col-lg-6 pb-5 pb-lg-0">
                <div class="elem elem-1 elem-active">
                    <p>&#35;<?php _e( 'Strategy', '25wat' ); ?></p>
                </div>
                <div class="elem elem-2">
                    <p>&#35;<?php _e( 'Branding', '25wat' ); ?></p>
                </div>
                <div class="elem elem-3">
                    <p>&#35;<?php _e( 'Community', '25wat' ); ?></p>
                </div>
                <div class="elem elem-4">
                    <p>&#35;<?php _e( 'Webdesign', '25wat' ); ?></p>
                </div>
            </div>

            <div class="items--content col-12 col-lg-6">
                <div class="  align-items-center elem-1--content">
                    <h4 class="mb-2"><?php _e( '#Strategy', '25wat' ); ?></h4>
                    <p>
                        <?php _e( 'We create complex strategies for online/offline channels. We run integrated campaigns, choosing the right channels and tools, so that we deliver results that fit your needs.', '25wat' ); ?>
                    </p>
                </div>
                <div class="  align-items-center elem-2--content d-none">
                    <h4 class="mb-2"><?php _e( '#Branding', '25wat' ); ?></h4>
                    <p>
                        <?php _e( 'We transform brands by giving them shape, feeling, and character through visual media: 2D graphics, 3D models, photo, animations, video marketing, augumented reality & virtual reality.', '25wat' ); ?>
                    </p>
                </div>
                <div class="  align-items-center elem-3--content d-none">
                    <h4 class="mb-2"><?php _e( '#Community', '25wat' ); ?></h4>
                    <p>
                        <?php _e( 'We design communication focused on building a community for the brand. We make sure that the messaging reaches users exactly where it should. We use all available channels to deliver your goals. Coommunity-building is the first step to a successful performance marketing campaign. WWe make people feel inspired so that they become ambassadors of your brand.', '25wat' ); ?>
                    </p>
                </div>
                <div class="  align-items-center elem-4--content d-none">
                    <h4 class="mb-2"><?php _e( '#Webdesign', '25wat' ); ?></h4>
                    <p>
                        <?php _e( 'We research, design, implement, and maintain web services. Customer experience crafting based on UX, UI, and design is vital. We\'re up to date with tech so you\'ll always be one step ahead.', '25wat' ); ?>
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="startuper-our-team mt-5 ">
    <div class="container-fluid">
        <div class="row">
            <div class="col">

            </div>
        </div>
    </div>
</section>

<section class="pricing-branding">
    <div class="container">
        <div class="row subtitle">
            <div class="col">
                <h2 class="text-capitalize"><?php _e( 'Choose your 25wat full service plan', '25wat' ); ?></h2>
            </div>
        </div>
        <div class="row ">
            <div class="col cards">

                <div class='d-md-block card' data-aos1='flip-up'>
                    <h2 class=' hvr-shrink title'><?php _e( '#GAME CHANGER', '25wat' ); ?></h2>
                    <h4 class=' hvr-shrink'><?php _e( 'Boost + 400% / Discount -15%', '25wat' ); ?></h4>
                    <ul class='text-center'>
                        <li class='hvr-forward'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <p><?php _e( 'Full social media management', '25wat' ); ?></p>
                        </li>
                        <li class='hvr-forward'> <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <p><?php _e( 'Moderation, animation, and special events in selected channels', '25wat' ); ?></p>
                        </li>
                        <li class='hvr-forward'> <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <p><?php _e( 'Google Business management', '25wat' ); ?></p>
                        </li>
                        <li class='hvr-forward'> <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <p><?php _e( 'Advertising campaigns - Facebook / Instagram / Linkedin / Youtube', '25wat' ); ?></p>
                        </li>
                        <li class='hvr-forward'> <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <p><?php _e( 'Public Relations and Media Relations', '25wat' ); ?></p>
                        </li>
                        <li class='hvr-forward'> <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <p><?php _e( 'Public image consulting and crisis management counselling ', '25wat' ); ?></p>
                        </li>
                        <li class='hvr-forward'> <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <p><?php _e( 'Content management: 2 articles, 4 entries, 60 posts / monthly', '25wat' ); ?></p>
                        </li>
                        <li class='hvr-forward'> <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <p><?php _e( 'SEO content management on the website', '25wat' ); ?></p>
                        </li>
                        <li class='hvr-forward'> <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <p><?php _e( 'Video content - 4x15sec video / quarterly', '25wat' ); ?></p>
                        </li>
                        <li class='hvr-forward'> <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <p><?php _e( 'Photo content - 1 day of shooting session + 30 photos / quarterly', '25wat' ); ?></p>
                        </li>
                        <li class='hvr-forward'> <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <p><?php _e( 'SEM / PPC campaigns - Google Search Network, Google Display Network, YouTube', '25wat' ); ?></p>
                        </li>
                        <li class='hvr-forward'> <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <p><?php _e( 'Audit of Google Ads and Google Analytics accounts', '25wat' ); ?></p>
                        </li>
                        <li class='hvr-forward'> <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <p><?php _e( 'Online and offline media monitoring', '25wat' ); ?></p>
                        </li>
                        <li class='hvr-forward'> <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <p><?php _e( 'Counseling and consulting on call', '25wat' ); ?></p>
                        </li>
                    </ul>
                </div>

                <div class='d-md-block card' data-aos1='flip-up'>
                    <h2 class=' hvr-shrink title'><?php _e( '#StartUp HERO', '25wat' ); ?></h2>
                    <h4 class=' hvr-shrink'><?php _e( 'Boost + 250% / Discount -10%', '25wat' ); ?></h4>
                    <ul class='text-center'>
                        <li class='hvr-forward'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <p><?php _e( 'Full social media management', '25wat' ); ?></p>
                        </li>
                        <li class='hvr-forward'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <p><?php _e( 'Moderation, animation, special events on selected Social Media channels', '25wat' ); ?></p>
                        </li>
                        <li class='hvr-forward'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <p><?php _e( 'Advertising campaigns - Facebook / Instagram / Linkedin ADS', '25wat' ); ?></p>
                        </li>
                        <li class='hvr-forward'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <p><?php _e( 'Public Relations and Media Relations', '25wat' ); ?></p>
                        </li>
                        <li class='hvr-forward'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <p><?php _e( 'Public image consulting and crisis management counselling ', '25wat' ); ?></p>
                        </li>
                        <li class='hvr-forward'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <p><?php _e( 'Content management: 1 article, 2 entries, 30 posts / month', '25wat' ); ?></p>
                        </li>
                        <li class='hvr-forward'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <p><?php _e( 'Online and offline media monitoring', '25wat' ); ?></p>
                        </li>
                        <li class='hvr-forward'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <p><?php _e( 'Counseling and consulting on call', '25wat' ); ?></p>
                        </li>
                    </ul>
                </div>

                <div class='d-md-block card' data-aos1='flip-up'>
                    <h2 class=' hvr-shrink title'><?php _e( '#Marketing WARRIOR', '25wat' ); ?></h2>
                    <h4 class=' hvr-shrink'><?php _e( 'Boost + 150% / Discount -5%', '25wat' ); ?></h4>
                    <ul class='text-center'>
                        <li class='hvr-forward'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <p><?php _e( 'Performance social media marketing', '25wat' ); ?></p>
                        </li>
                        <li class='hvr-forward'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <p><?php _e( 'Moderation, animation, special events in selected channels', '25wat' ); ?></p>
                        </li>
                        <li class='hvr-forward'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <p><?php _e( 'Google Business management	', '25wat' ); ?></p>
                        </li>
                        <li class='hvr-forward'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <p><?php _e( 'Advertising campaigns - Facebook / Instagram / Linkedin / Youtube', '25wat' ); ?></p>
                        </li>
                        <li class='hvr-forward'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <p><?php _e( 'SEM / PPC campaigns - Google Search Network, Google Display Network, YouTube	', '25wat' ); ?></p>
                        </li>
                        <li class='hvr-forward'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <p><?php _e( 'Audit of Google Ads and Google Analytics accounts', '25wat' ); ?></p>
                        </li>
                        <li class='hvr-forward'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <p><?php _e( 'Internet monitoring', '25wat' ); ?></p>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="pricing-executive">
    <div class="container">
        <div class="row subtitle">
            <div class="col">
                <h2 class="text-capitalize"><?php _e( 'or a communication plan for starters', '25wat' ); ?></h2>
            </div>
        </div>
        <div class="row ">
            <div class="col cards">
                <div class='d-md-block card' data-aos1='flip-up'>
                    <h2 class='hvr-shrink'><?php _e( '#New Strategy', '25wat' ); ?></h2>
                    <ul class='text-center'>
                        <li class='hvr-forward'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <?php _e( '2-day strategic workshop with the management', '25wat' ); ?>
                        </li>
                        <li class='hvr-forward'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <?php _e( 'Workshop report', '25wat' ); ?>
                        </li>
                        <li class='hvr-forward'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <?php _e( 'Brand marketing strategy development as part of a 6/12 monthly plan', '25wat' ); ?>
                        </li>
                        <li class='hvr-forward'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <?php _e( 'Brand marketing strategy as a 50-150 page reort', '25wat' ); ?>
                        </li>
                        <li class='hvr-forward'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <?php _e( '20h consultation during the introduction of the strategy', '25wat' ); ?>
                        </li>
                    </ul>
                </div>
 
                <div class='d-md-block card' data-aos1='flip-up'>
                    <h2 class=' hvr-shrink'><?php _e( '#New Branding', '25wat' ); ?></h2>
                    <ul class='text-center'>
                        <li class='hvr-forward'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <?php _e( 'A new brand #name', '25wat' ); ?>
                        </li>
                        <li class='hvr-forward'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <?php _e( 'Unique #logotype of the brand', '25wat' ); ?>
                        </li>
                        <li class='hvr-forward'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <?php _e( 'A new #Identity Manual', '25wat' ); ?>
                        </li>
                        <li class='hvr-forward'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <?php _e( 'Creative brand  #KeyVisual', '25wat' ); ?>
                        </li>
                        <li class='hvr-forward'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <?php _e( 'Effective marketing  #slogan or #claim', '25wat' ); ?>
                        </li>
                        <li class='hvr-forward'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <?php _e( 'Counseling and consulting on call', '25wat' ); ?>
                        </li>
                    </ul>
                </div>

                <div class='d-md-block card' data-aos1='flip-up'>
                    <h2 class=' hvr-shrink'><?php _e( '#New Business', '25wat' ); ?></h2>
                    <ul class='text-center'>
                        <li class='hvr-forward'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <?php _e( 'Audit and market analysis', '25wat' ); ?>
                        </li>
                        <li class='hvr-forward'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <?php _e( 'Analysis report', '25wat' ); ?>
                        </li>
                        <li class='hvr-forward'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <?php _e( 'Brand representation', '25wat' ); ?>
                        </li>
                        <li class='hvr-forward'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <?php _e( 'Implementation of the pilot programme', '25wat' ); ?>
                        </li>
                        <li class='hvr-forward'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <?php _e( 'Office, administration, and accounting coordination', '25wat' ); ?>
                        </li>
                        <li class='hvr-forward'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.113" height="11.647"
                                viewBox="0 0 16.113 11.647">
                                <path d="M-1946,10876.917l3.844,3.844,8.026-8.026"
                                    transform="translate(1948.121 -10870.613)" fill="none" stroke="#0131ff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                            <?php _e( 'Counseling and consulting on call', '25wat' ); ?>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</section>

<div class="content mt-5" id="video-init-stop">
    <div class="container">
        <div class="row">
            <div class="col d-flex align-items-center justify-content-center text-center">
                <h3 class="startuper-heading-contact"><?php _e( 'WANNA START NOW?', '25wat' ); ?></h3>
            </div>
        </div>
    </div>
</div>

<div>
    <svg class="startups-blob" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 288 288">

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
            c-15.2-15.1,0.3-41.7-16.6-54.9C63,186,49.7,196.7,37.5,186z	" />

        </path>

    </svg>
</div>

<div class="contact-home col-12 d-flex flex-column align-items-center justify-content-center position-relative">
    <h2 class="pt-4"><?php _e( 'Contact', '25wat' ); ?></h2>
    <div class="form-mail form-page-startups">
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
            <span class="btn btn-card__mobile d-lg-none"><?php _e( 'Please contact us', '25wat' ); ?></span>
        </div>
    </div>
</div>


<section class="startup-cta">
    <div class="container">
        <div class="row">
            <div class="col d-flex flex-column align-items-center justify-content-center startup-cta__txt-content">
                <h4 class="font-white text-center">
                    <?php _e( 'Innovation distinguishes between a leader and a follower.', '25wat' ); ?>
                </h4>
                <h6><?php _e( '- Steve Jobs', '25wat' ); ?></h6>
            </div>
        </div>
    </div>
</section>

<?php
    get_footer();
