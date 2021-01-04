<?php
    /**
     *  Header template
     *
     *  @package    25wat
     */

    $url_main         = get_bloginfo( 'url' );
    $url_template_dir = get_template_directory_uri();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="icon" href="<?php echo $url_template_dir; ?>/assets/favicon/favicon.png" type="image/png">

    <?php wp_head(); ?>

    <!-- GOOGLE ANALITICS -->
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-66455196-1', 'auto');
        ga('send', 'pageview');
    </script>
    <!-- SMARTLOOK -->
    <script>
        window.smartlook || (function (d) {
            var o = smartlook = function () {
                    o.api.push(arguments)
                },
                h = d.getElementsByTagName('head')[0];
            var c = d.createElement('script');
            o.api = new Array();
            c.async = true;
            c.type = 'text/javascript';
            c.charset = 'utf-8';
            c.src = '//rec.smartlook.com/recorder.js';
            h.appendChild(c);
        })(document);
        smartlook('init', '4ad97b4ecc2f8e09a4aa7167dd89d2fdb90cfdea');
    </script>
    <!-- Facebook Pixel Code -->
    <script>
        ! function (f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function () {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '609745079830889');
        fbq('track', 'PageView');
    </script>
    <noscript><img loading="lazy" height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=609745079830889&ev=PageView&noscript=1" />
    </noscript>

</head>

<body <?php body_class(); ?>>
    <div class="wat-preloader">
        <div id="wat-canvas-wrapper"></div>
    </div>

    <div class="fixed-wrapper">
        <div class="google-partner-badge">
            <!-- <div class="g-partnersbadge" data-agency-id="7879046261"></div> -->
            <a href="https://www.google.com/partners/agency?id=7879046261">
                <img loading="lazy" src="<?php echo $url_template_dir; ?>/assets/img/g-partner.png" alt="">
            </a>
        </div>
    </div>



    <div id="bg-paralax" class="bg-paralax" data-relative-input="true">
        <img loading="lazy" data-depth="0.1" src="<?php echo $url_template_dir; ?>/assets/img/body-bg-set-1.png" alt="">
        <img loading="lazy" data-depth="0.1" src="<?php echo $url_template_dir; ?>/assets/img/body-bg-set-2.png" alt="">

    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-transparent sticky">
        <a class="navbar-brand" href="<?php echo $url_main; ?>">
            <div id="canvaslogo"></div>
        </a>

        <button class="navbar-toggler hamburger hamburger--stand" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="hamburger-txt"><?php _e( 'Menu', '25wat' ); ?></span>
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <?php
                    wp_nav_menu(
                        array(
                            'menu'           => 'Main menu',
                            'theme_location' => 'primary',
                            'container'      => '',
                            'items_wrap'     => '%3$s',
                            'walker'         => new Bootstrap_NavWalker(),
                            'fallback_cb'    => 'Bootstrap_NavWalker::fallback',
                        )
                    );
                ?>
                <?php
                if ( true === function_exists( 'icl_get_languages' ) ) {
                    $langs       = icl_get_languages( 'skip_missing=0&orderby=code&order=asc' );
                    $lang_active = 'EN';    // default .
                    $lang_others = '';
                    foreach ( $langs as $lang ) {
                        $lang_short = strtoupper( $lang['code'] );
                        $lang_url   = $lang['url'];

                        if ( $lang['active'] ) {
                            $lang_active = '<a class="nav-link dropdown-toggle" href="' . $lang_url . '" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' . $lang_short . '</a>';
                        } else {
                            $lang_others .= '<a class="dropdown-item" href="' . $lang_url . '">' . $lang_short . '</a>';
                        }
                    }

                    // only ONE language available.
                    if ( 0 >= strlen( $lang_others ) ) {
                        $lang_active = str_replace( 'dropdown-toggle', '', $lang_active );
                    }
                }
                ?>

                <li class="nav-item dropdown d-none d-md-block">
                    <?php echo $lang_active; ?>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php echo $lang_others; ?>
                    </div>
                </li>

                <li class="nav-item login-item d-none">
                    <a class="nav-link"><?php _e( 'Login', '25wat' ); ?></a>
                    <div
                        class="login-box  d-flex flex-column align-items-start justify-content-center login-box-not-visible">
                        <div class="close-btn"><i class="fa fa-times"></i></div>
                        <h3><?php _e( 'Panel Klienta', '25wat' ); ?></h3>
                        <p><?php _e( 'Aby sprawdzić postęp prac nad swoim projektem prosimy o podanie klucza:', '25wat' ); ?>
                        </p>
                        <label for="client-key">
                            <input type="text" name="client-key" placeholder="<?php _e( 'Podaj klucz', '25wat' ); ?>">
                            <button class="btn btn-primary mt-4"><?php _e( 'Zobacz projekt', '25wat' ); ?></button>
                        </label>
                    </div>
                </li>

                <li class="nav-item dropdown dropdown__mobile d-md-none">
                    <?php echo $lang_active; ?>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php echo $lang_others; ?>
                    </div>
                </li>

                <span class="estimate-btn d-none d-lg-block">
                    <a href="<?php echo $url_main; ?>/brief" style="position: absolute; right: 3%; bottom: -75%;"
                        id="dgj38Er74d4812s23FJ7">
                        <svg class="liquid-button" data-text="<?php _e( 'Consult your project', '25wat' ); ?>"
                            data-force-factor="0.1" data-layer-1-viscosity="0.3" data-layer-2-viscosity="0.4"
                            data-layer-1-mouse-force="300" data-layer-2-mouse-force="400" data-layer-1-force-limit="1"
                            data-layer-2-force-limit="2" data-color1="#0131FF" data-color2="#0131FF"
                            data-color3="#2A62F4"></svg>
                    </a>
                </span>
            </ul>


        </div>

    </nav>