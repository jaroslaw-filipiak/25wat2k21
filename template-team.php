<?php
    /**
    *  Template Name: 25wat - team, top
    *
    *  @package    25wat
    */

    get_header();

    $url_main         = get_bloginfo( 'url' );
    $url_template_dir = get_template_directory_uri();
?>
<section class="team-hero" id="page-team">
</section>

<section class="team-info">
    <div class="container">
        <div class="row">

            <div class="col-12 col-lg-6 team-info_col-1">
                <h1 class="d-none d-lg-block"><?php _e( '#Team', '25wat' ); ?></h1>
                <h2 class="d-block d-lg-none mt-3"><?php _e( 'Our values', '25wat' ); ?></h2>
                <h2 class="mt-4 mt-lg-0 d-none d-lg-block"><?php _e( 'Our values', '25wat' ); ?></h2>
                <div class="row our-values-wrapper">
                    <div class="col">
                        <ul class="our-values">
                            <li style="color: #0131FF;"><?php _e( '#Creativity', '25wat' ); ?></li>
                            <li><?php _e( '#Producibility', '25wat' ); ?></li>
                            <li style="color: #FFCA1B"><?php _e( '#Quality', '25wat' ); ?></li>
                            <li><?php _e( '#Professionalism', '25wat' ); ?></li>
                            <li style="color: #FFCA1B"><?php _e( '#Dependability', '25wat' ); ?></li>
                        </ul>
                    </div>
                    <div class="col">
                        <ul class="our-values">
                            <li><?php _e( '#Agility and flexibility', '25wat' ); ?></li>
                            <li style="color: #0131FF;"><?php _e( '#Personal development', '25wat' ); ?></li>
                            <li style="color: #FFCA1B"><?php _e( '#Problem solving', '25wat' ); ?></li>
                            <li><?php _e( '#Responsibility', '25wat' ); ?></li>
                            <li style="color: #0131FF;"><?php _e( '#Positive emotions', '25wat' ); ?></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6 team-info_col-2 d-flex flex-column align-items-start justify-content-center">
                <h2><?php _e( 'We are 25wat.'); ?></h2>
                <p>
                    <?php _e( 'Our mission is to support startups, scale-ups and modern companies that want to change the world. Our organization consists of a team of 27 specialists. We\'ve brought to life more than 200 projects for companies in dozens of markets around the world. Our designers have provided solutions for +50 industries.', '25wat' ); ?>
                </p>
                <p class="mt-2">
                    <?php _e( 'Our goal is to solve problems and create effective win-win communication through which our clients achieve their goals when we deliver engaging content to their audiences. Why 25wat? Because it\'s worth asking, and we like to talk. During intense creative work, human brain produces exactly as much power as a 25wat lightbulb needs.', '25wat' ); ?>
                </p>

                <span class="team-flubber">
                    <div class="team-flubber-txt-wrapper d-flex align-items-center justify-content-center mb-1">
                    </div>

                    <div class="blob-team">
                        <!-- This SVG is from https://codepen.io/Ali_Farooq_/pen/gKOJqx -->
                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 310 350">
                            <path
                                d="M156.4,339.5c31.8-2.5,59.4-26.8,80.2-48.5c28.3-29.5,40.5-47,56.1-85.1c14-34.3,20.7-75.6,2.3-111  c-18.1-34.8-55.7-58-90.4-72.3c-11.7-4.8-24.1-8.8-36.8-11.5l-0.9-0.9l-0.6,0.6c-27.7-5.8-56.6-6-82.4,3c-38.8,13.6-64,48.8-66.8,90.3c-3,43.9,17.8,88.3,33.7,128.8c5.3,13.5,10.4,27.1,14.9,40.9C77.5,309.9,111,343,156.4,339.5z" />
                        </svg>
                    </div>
                </span>
            </div>

        </div>
    </div>
</section>

<section class="we-and-our-friends">

    <!-- Gabi -->
    <div class="person person-1">
        <div class="person-info person__not-visible">
            <h4 class="font-600">Gabi Czesak</h4>
            <p>#creative</p>
            <p>#co-founder</p>
            <p>#designmanagement</p>

        </div>
        <img src="<?php echo $url_template_dir; ?>/assets/img/person-path.svg" alt="">
    </div>

    <!-- Mateusz Romanów -->
    <div class="person person-16">
        <div class="person-info person__not-visible">
            <h4 class="font-600">Mateusz Romanów</h4>
            <p>#ceo </p>
            <p>#strategy</p>
            <p>#bizdev</p>

        </div>
        <img src="<?php echo $url_template_dir; ?>/assets/img/person-path.svg" alt="">
    </div>

    <!-- Joanna Gancarzyk -->
    <div class="person person-8">
        <div class="person-info person__not-visible">
            <h4 class="font-600">Joanna Gancarczyk</h4>
            <p>#community </p>
            <p>#publicrelations</p>
            <p>#strategy</p>
        </div>
        <img src="<?php echo $url_template_dir; ?>/assets/img/person-path.svg" alt="">
    </div>

    <!-- Łukasz Lasek -->
    <div class="person person-12">
        <div class="person-info person__not-visible">
            <h4 class="font-600">Łukasz Lasek</h4>
            <p>#webdesign </p>
            <p>#projectmanagement</p>
        </div>
        <img src="<?php echo $url_template_dir; ?>/assets/img/person-path.svg" alt="">
    </div>

    <!-- Krzysztof Gachowski -->
    <div class="person person-7">
        <div class="person-info person__not-visible">
            <h4 class="font-600">Krzysztof Gachowski</h4>
            <p>#projectmanagement </p>
            <p>#publicrelations</p>
            <p>#sales</p>
        </div>
        <img src="<?php echo $url_template_dir; ?>/assets/img/person-path.svg" alt="">
    </div>

    <!-- Piotr Bardadyn -->
    <div class="person person-14">
        <div class="person-info person__not-visible">
            <h4 class="font-600">Piotr Bardadyn</h4>
            <p>#bizdev </p>
            <p>#sales</p>
            <p>#business</p>
        </div>
        <img src="<?php echo $url_template_dir; ?>/assets/img/person-path.svg" alt="">
    </div>

    <!-- Gracjan  Majchrzak -->
    <div class="person person-5">
        <div class="person-info person__not-visible">
            <h4 class="font-600">Gracjan Majchrzak</h4>
            <p>#creative </p>
            <p>#design</p>
            <p>#graphics</p>
        </div>
        <img src="<?php echo $url_template_dir; ?>/assets/img/person-path.svg" alt="">
    </div>

    <!--  -->
    <div class="person person-6">
        <div class="person-info person__not-visible">
            <h4 class="font-600">Patryk Sowa</h4>
            <p>#creative </p>
            <p>#design</p>
            <p>#graphics</p>
        </div>
        <img src="<?php echo $url_template_dir; ?>/assets/img/person-path.svg" alt="">
    </div>

    <!-- Kasia Gajlewicz -->
    <div class="person person-9">
        <div class="person-info person__not-visible">
            <h4 class="font-600">Kasia Gajlewicz</h4>
            <p>#socialmedia </p>
            <p>#community</p>
            <p>#content</p>
        </div>
        <img src="<?php echo $url_template_dir; ?>/assets/img/person-path.svg" alt="">
    </div>

    <!-- Aleksander Kubica -->
    <div class="person person-10">
        <div class="person-info person__not-visible">
            <h4 class="font-600">Aleksander Kubica</h4>
            <p>#socialmedia </p>
            <p>#community</p>
            <p>#content</p>
        </div>
        <img src="<?php echo $url_template_dir; ?>/assets/img/person-path.svg" alt="">
    </div>

    <!-- Łukasz Dąbrzalski -->
    <div class="person person-11">
        <div class="person-info person__not-visible">
            <h4 class="font-600">Łukasz Dąbrzalski</h4>
            <p>#fullstackdeveloper </p>
            <p>#frontend</p>
            <p>#backend</p>
        </div>
        <img src="<?php echo $url_template_dir; ?>/assets/img/person-path.svg" alt="">
    </div>

    <!-- Bartek Tomczak -->
    <div class="person person-15">
        <div class="person-info person__not-visible">
            <h4 class="font-600">Bartek Tomczak</h4>
            <p> #technology </p>
            <p>#DevOps</p>
            <p>#it</p>
        </div>
        <img src="<?php echo $url_template_dir; ?>/assets/img/person-path.svg" alt="">
    </div>

    <!-- Jarek Filipiak -->
    <div class="person person-3">
        <div class="person-info person__not-visible">
            <h4 class="font-600">Jarek Filipiak</h4>
            <p> #frontend </p>
            <p>#webdev</p>
        </div>
        <img src="<?php echo $url_template_dir; ?>/assets/img/person-path.svg" alt="">
    </div>

    <!-- Asia Gawinek -->
    <div class="person person-2">
        <div class="person-info person__not-visible">
            <h4 class="font-600">Asia Gawinek</h4>
            <p> #coach </p>
            <p>#leadership</p>
        </div>
        <img src="<?php echo $url_template_dir; ?>/assets/img/person-path.svg" alt="">
    </div>

</section>

<section class="d-none d-lg-block mt-5 pt-5 achievements" data-aos1="fade-up">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h2 class="text-center"><?php _e( '#Our achievements', '25wat' ); ?></h2>
            </div>
        </div>

        <div class="row">
            <div class="col-4 d-flex flex-column justify-content-center align-items-center">
                <ul class="our-milestones">
                    <li class="our-milestones__item-1 active"><a href="#"
                            onclick="return false;"><?php _e( '#Arbuzzz', '25wat' ); ?></a></li>
                    <li class="our-milestones__item-2"><a href="#"
                            onclick="return false;"><?php _e( '#50 Kreatywnych', '25wat' ); ?></a></li>
                    <li class="our-milestones__item-3"><a href="#"
                            onclick="return false;"><?php _e( '#Odyseja Umysłu', '25wat' ); ?></a></li>
                    <li class="our-milestones__item-4"><a href="#"
                            onclick="return false;"><?php _e( '#Internet Beta 2019', '25wat' ); ?></a></li>
                    <li class="our-milestones__item-5"><a href="#"
                            onclick="return false;"><?php _e( '#WebSummit 2019', '25wat' ); ?></a></li>
                </ul>
                <a href="#">
                    <svg class="liquid-button__blog-item d-none" data-text="<?php _e( 'View project', '25wat' ); ?>"
                        data-force-factor="0.1" data-layer-1-viscosity="0.3" data-layer-2-viscosity="0.4"
                        data-layer-1-mouse-force="300" data-layer-2-mouse-force="400" data-layer-1-force-limit="1"
                        data-layer-2-force-limit="2" data-color1="#0131FF" data-color2="#0131FF"
                        data-color3="#2A62F4"></svg>
                </a>
            </div>
            <div class="col-8" style="position: relative">

                <!-- arbuzzz -->
                <div class="milestone-container our-milestones__item-1__content">
                    <div class="milestone-content">
                        <h3> <?php _e( '#Pierwsza w PL aplikacja do komunikacji w AR', '25wat' ); ?></h3>
                    </div>
                    <img class="img-fluid position-relative our-milestones__image"
                        src="<?php echo $url_template_dir; ?>/assets/img/proj_arbuz.jpg" alt="arbuzzz">
                </div>

                <!-- 50 kreatywnych -->
                <div class="milestone-container our-milestones__item-2__content">
                    <div class="milestone-content">
                        <h3><?php _e( '50 kreatywnych', '25wat' ); ?></h3>
                    </div>
                    <img class="img-fluid position-relative our-milestones__image"
                        src="<?php echo $url_template_dir; ?>/assets/img/proj_kreatywnych.jpg" alt="50 kreatywnych">
                </div>

                <!-- Odyseja umysłu -->
                <div class="milestone-container our-milestones__item-3__content">
                    <div class="milestone-content">
                        <h3><?php _e( 'Odyseja umysłu', '25wat' ); ?></h3>
                    </div>
                    <img class="img-fluid position-relative our-milestones__image"
                        src="<?php echo $url_template_dir; ?>/assets/img/proj_odyseja.jpg" alt="Odyseja umysłu">
                </div>

                <!-- Internet Beta -->
                <div class="milestone-container our-milestones__item-4__content">
                    <div class="milestone-content">
                        <h3><?php _e( 'Internet Beta', '25wat' ); ?></h3>
                    </div>
                    <img class="img-fluid position-relative our-milestones__image"
                        src="<?php echo $url_template_dir; ?>/assets/img/proj_beta.jpg" alt="nternet beta">
                </div>

                <!-- WebSummit-->
                <div class="milestone-container our-milestones__item-5__content">
                    <div class="milestone-content">
                        <h3><?php _e( 'WebSummit 2019', '25wat' ); ?></h3>
                    </div>
                    <img class="img-fluid position-relative our-milestones__image"
                        src="<?php echo $url_template_dir; ?>/assets/img/proj_websummit.jpg" alt="WebSummit">
                </div>

            </div>
        </div>
    </div>
</section>

<section class="mx-auto" data-aos1="fade-up" id="our-projects">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h2 class="text-center mb-4 mt-4 text-capitalize"><?php _e( 'Our own projects', '25wat' ); ?></h2>
            </div>
        </div>

        <!-- titans24 -->
        <div class="row">
            <div class="own-projects-item-wrapper container-fluid titans24-container">
                <div class="titans-paralax">
                    <img data-depth=".5" src="<?php echo $url_template_dir; ?>/assets/img/titans-screen.png" alt=""
                        style="position: absolute; right: 1px !important;">
                </div>
                <div class="row own-projects-item-2 mx-auto titans-mask" data-aos1="fade-up">

                    <div class="col-12 col-xl-6 order-last order-md-first titans24-content
                     ">
                        <div class="d-block d-xl-none">
                            <img class="img-fluid pb-4"
                                src="<?php echo $url_template_dir; ?>/assets/img/titans-screen.png" alt="">
                        </div>

                        <h2 class="font-weight-normal"><?php _e( 'TITANS24', '25wat' ); ?></h2>
                        <p>
                            <?php _e( 'Titans24 is a technology startup delivering cybersecurity for websites, webservices, applications, and e-commerce in full GDPR-compliance. We have created a system that provides protection at 11 levels. Our mission is to provide #cybersecurity solutions for all.', '25wat' ); ?>
                        </p>
                        <a class="btn btn-primary mr-auto mt-4 hvr-grow d-none"
                            href="#"><?php _e( 'View project', '25wat' ); ?></a>
                    </div>

                    <div class="col-12 col-md-6 col-lg-5 col-xl-5 order-first order-md-last ">
                        <img class="img-fluid t24screen d-none"
                            src="<?php echo $url_template_dir; ?>/assets/img/titans-screen.png" alt="">
                    </div>

                </div>
            </div>
        </div>

        <!-- arbuzz -->
        <div class="row">
            <div class="own-projects-item-wrapper container-fluid arbuzz-container">

                <div class="arbuzz-paralax">
                    <img data-depth=".3" src="<?php echo $url_template_dir; ?>/assets/img/arbuz-elem-4.png" alt=""
                        style="position: absolute; right: 1px !important;">
                    <img data-depth=".1" src="<?php echo $url_template_dir; ?>/assets/img/arbuz-elem-1.png" alt="">
                    <img data-depth=".2" src="<?php echo $url_template_dir; ?>/assets/img/arabuz-elem-2.png" alt="">
                    <img data-depth=".4" src="<?php echo $url_template_dir; ?>/assets/img/arbuz-elem-3.png" alt="">
                </div>

                <div class="row own-projects-item-3 mx-auto arbuzz-mask">
                    <div class="col-12 col-xs-6 order-last order-sm-last order-md-first arbuzz-content">
                        <div class="d-block d-xl-none">
                            <img class="img-fluid pb-4"
                                src="<?php echo $url_template_dir; ?>/assets/img/arbuz-elem-4.png" alt="">
                        </div>
                        <h2 class="font-weight-normal"><?php _e( 'ARBUZZ', '25wat' ); ?></h2>
                        <p>
                            <?php _e( 'ARBUZZ is a mobile platform designed for communication using Augmented Reality. It is a bridge between the real and digital world. Through ARBUZZ, we can embed any multimedia content on triggers to give people an unforgettable experience. Interacting with Augmented Reality lets you experience something amazing in places we know and with things that surround us every day. The platform and application is currently under reconstruction.', '25wat' ); ?>
                        </p>
                        <a class="btn btn-primary mr-auto mt-4 hvr-grow d-none"
                            href="#"><?php _e( 'View project', '25wat' ); ?></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- fuckup -->
        <div class="row">
            <div class="own-projects-item-wrapper container-fluid">
                <div class="fuckup-paralax">
                    <img class="fckp-photo-cup" data-depth="0.1"
                        src="<?php echo $url_template_dir; ?>/assets/img/cup.png" alt=""
                        style="position: absolute; right: 1px !important;">
                    <img class="fckp-photo-1" data-depth="0.3" src="<?php echo $url_template_dir; ?>/assets/img/fn1.png"
                        alt="">
                    <img class="fckp-photo-3" data-depth="0.4" src="<?php echo $url_template_dir; ?>/assets/img/fn3.png"
                        alt="">
                    <img class="fckp-photo-2" data-depth="0.4" src="<?php echo $url_template_dir; ?>/assets/img/fn2.png"
                        alt="">

                    <img class="fckp-photo-4" data-depth="0.6" src="<?php echo $url_template_dir; ?>/assets/img/fn4.png"
                        alt="">

                    <img class="fckp-photo-5" data-depth="0.2"
                        src="<?php echo $url_template_dir; ?>/assets/img/fuckup-logo.png" alt="">
                </div>
                <div class="row own-projects-item-4 mx-auto fuckup-mask">
                    <div class="col-12 order-last order-sm-last order-md-first fuckup-content">
                        <div class="d-block d-xl-none">
                            <img class="img-fluid pb-4" src="<?php echo $url_template_dir; ?>/assets/img/fn3.png"
                                alt="">
                        </div>
                        <h2 class="font-weight-normal">Fuckup Nights Wrocław</h2>
                        <p>
                            Koniec słuchania o lukrowanych historiach oraz opowieściach na temat sukcesów. Pora na
                            #fuckup!
                            Stworzyliśmy wrocławską edycję wydarzenia znanego na całym świecie, aby dzielić się
                            największymi
                            biznesowymi wtopami we Wrocławiu. Prelegenci kończą z historiami słodkimi jak wata cukrowa
                            oraz
                            opowiadają o najbardziej spektakularnych Fuckupach w biznesie i w życiu prywatnym. Dziewięć
                            edycji wydarzenia pozwoliło na zebranie ponad 2000 publiczności Fuckup Nights Wrocław.
                        </p>
                        <a class="btn btn-primary mr-auto mt-4 hvr-grow d-none"
                            href="#"><?php _e( 'View project', '25wat' ); ?></a>
                    </div>
                </div>

            </div>
        </div>

        <!-- kko -->
        <div class="row">
            <div class="own-projects-item-wrapper container-fluid">
                <div class="kko-paralax">
                    <img data-depth="0.3" src="<?php echo $url_template_dir; ?>/assets/img/zespol-ilu-kko.svg" alt="">
                </div>
                <div class="row own-projects-item-1 kko-mask mx-auto kko-content" data-aos1="fade-up">

                    <div class="col-12 col-xs-6 col-xl-6 ">
                        <div class="d-block d-xl-none">
                            <img class="img-fluid pb-4"
                                src="<?php echo $url_template_dir; ?>/assets/img/zespol-ilu-kko.svg" alt="">
                        </div>
                        <h2 class="font-weight-normal">
                            <?php _e( 'RESPONSIBLE COMMUNICATION CLUB', '25wat' ); ?>
                        </h2>
                        <p>
                            <?php _e( 'We work for NGOs, organizations, non-profit projects, and groups for which the support of a creative agency has so far been out of financial reach.', '25wat' ); ?>
                        </p>
                        <a class="btn btn-primary mr-auto mt-4 hvr-grow d-none"
                            href="#"><?php _e( 'View project', '25wat' ); ?></a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<div id="bg-paralax" class="bg-paralax d-none" data-relative-input="true" data-aos1="fade-in">
    <img data-depth="0.1" src="<?php echo $url_template_dir; ?>/assets/img/body-bg-set-1.png" alt="">
    <img data-depth="0.2" src="<?php echo $url_template_dir; ?>/assets/img/body-bg-set-2.png" alt="">
</div>



<?php
    get_footer();