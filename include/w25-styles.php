<?php

    function w25_styles() {
        // init.
        $url_template_dir = get_template_directory_uri();
        $theme_version    = '9.9.9';

        // get theme version.
        $my_theme = wp_get_theme();
        if ( $my_theme ) {
            $theme_version = $my_theme->get( 'Version' );
        }

        // common styles and sripts
        wp_enqueue_style( 'main-style', $url_template_dir . '/assets/css/main.css', array(), $theme_version, false );
        wp_enqueue_script( 'jquery', $url_template_dir . '/assets/js/jquery.min.js', array(), $theme_version, false );
        wp_enqueue_script( 'main', $url_template_dir . '/assets/js/main.js', array(), $theme_version, false );

        //  scripts for each page
        if( is_front_page() ) {
            wp_enqueue_script( 'homepage', $url_template_dir . '/assets/js/HomePage.js', array(), $theme_version, false );
        } else if( is_page_template( 'template-team.php' ) ) {
            wp_enqueue_script( 'teampage', $url_template_dir . '/assets/js/TeamPage.js', array(), $theme_version, false );
        } else if( is_page_template( 'template-case-studies.php' ) ) {
            wp_enqueue_script( 'teampage', $url_template_dir . '/assets/js/PortfolioPage.js', array(), $theme_version, false );
        } else if( is_page_template( 'template-offer.php' ) ) {
            wp_enqueue_script( 'teampage', $url_template_dir . '/assets/js/OfferPage.js', array(), $theme_version, false );
        } else if( is_page_template( 'template-news.php' ) ) {
            wp_enqueue_script( 'teampage', $url_template_dir . '/assets/js/NewsPage.js', array(), $theme_version, false );
        } else if( is_page_template( 'template-startups.php' ) ) {
            wp_enqueue_script( 'teampage', $url_template_dir . '/assets/js/InnovatorsPage.js', array(), $theme_version, false );
        } else if( is_page_template( 'template-contact.php' ) ) {
            wp_enqueue_script( 'teampage', $url_template_dir . '/assets/js/ContactPage.js', array(), $theme_version, false );
        } else if( is_page_template( 'template-brief.php' ) ) {
            wp_enqueue_script( 'teampage', $url_template_dir . '/assets/js/BriefPage.js', array(), $theme_version, false );
        } 

        //  wp_localize 
        $wp_localize = array(
            'site_url'     => site_url(),
            'url_main'     => get_bloginfo( 'url' ),
            'url_template' => $url_template_dir,
            'web_name'     => __( '25wat', '25wat' ),
            'text_cancel'  => __( 'Cancel', '25wat' ),
            'text_close'   => __( 'Close', '25wat' ),
            'text_exit'    => __( 'Exit', '25wat' ),
            'text_menu'    => __( 'Menu', '25wat' ),
            'brief_1m'     => __( '1 month', '25wat' ),
            'brief_2m6m'   => __( '2 to 6 months', '25wat' ),
            'brief_6m12m'  => __( '6 to 12 months', '25wat' ),
            'brief_12m'    => __( 'over a year', '25wat' ),
        );
        wp_localize_script( 'main', 'wp_localize', $wp_localize );
    }
    add_action( 'wp_enqueue_scripts', 'w25_styles' );

?>