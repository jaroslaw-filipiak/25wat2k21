<?php
/**
 * Global performance settings.
 *
 * @package    25wat
 */

/**
 * 25wat.com - WP performance functions
 */
class W25_Seo_And_Performance {
    const IMAGE_LOGO = '/assets/img/placeholder.jpg';

    /**
     * INIT
     */
    public static function load() {

        // wp_performance + contact form 7
        add_action( 'init', array( 'w25_Seo_And_Performance', 'sap_wp_adds_cleaning' ) );
        // ---
        //add_action( 'wp_enqueue_scripts', array( 'w25_Seo_And_Performance', 'sap_load_cf7_on_contact_page' ) );

        // wp_seo: title & canonical & meta
        add_theme_support( 'title-tag' );
        // ---
        $yoast_active = self::sap___genesis_detect_seo_plugins();
        if ( false === $yoast_active ) {
            // do yourself
            add_filter( 'pre_get_document_title', array( 'w25_Seo_And_Performance', 'sap_get_the_title' ) );
            // ---
            remove_action( 'wp_head', 'rel_canonical' );
            add_action( 'wp_head', array( 'w25_Seo_And_Performance', 'sap_add_rel_canonical' ) );
            // ---
            add_action( 'wp_head', array( 'w25_Seo_And_Performance', 'sap_add_meta_description' ) );
        }

        // wp_upload: max image size 2500x2500
        add_filter( 'wp_handle_upload', array( 'w25_Seo_And_Performance', 'sap_handle_upload' ) );

        // wp_update
        add_filter( 'automatic_updater_disabled', '__return_true' );
        add_filter( 'auto_update_plugin', '__return_false' );
        add_filter( 'auto_update_theme', '__return_false' );
        add_filter( 'auto_update_translation', '__return_false' );

        // yoast: to_bottom
        add_filter( 'wpseo_metabox_prio', function() { return 'low'; } );

        // yoast: !!! OVERRIDE !!!
        //add_filter( 'wpseo_title', array( 'w25_Seo_And_Performance', 'sap_change_yoast_page_titles'), 100 );
        //add_filter( 'wpseo_metadesc', array( 'w25_Seo_And_Performance', 'sap_change_yoast_description'), 100, 1 );
        //add_filter( 'wpseo_canonical', array( 'w25_Seo_And_Performance', 'sap_change_yoast_canonical'), 100, 1 );

        // admin panel
        if ( is_admin() ) {
            // ...
        }
    }

    /*********************************
     *        PUBLIC FUNCTION
     *********************************/
    public static function sap_wp_adds_cleaning() {

        remove_action( 'wp_head', 'wp_generator' );                         // Removes meta name generator.
        remove_action( 'wp_head', 'rsd_link' );                             // Removes EditURI/RSD (Really Simple Discovery) link.
        remove_action( 'wp_head', 'wlwmanifest_link' );                     // Removes wlwmanifest (Windows Live Writer) link.
        remove_action( 'wp_head', 'wp_shortlink_wp_head' );                 // Removes shortlink.
        remove_action( 'wp_head', 'feed_links', 2 );                        // Removes feed links.
        remove_action( 'wp_head', 'feed_links_extra', 3 );                  // Removes comments feed.

        remove_action( 'rest_api_init', 'wp_oembed_register_route' );       // remove the REST API endpoint
        remove_action( 'rest_api_init', 'create_initial_rest_routes' );     // remove the REST API endpoint
        remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 ); // turn off oEmbed auto discovery (don't filter oEmbed results)
        remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );        // remove oEmbed discovery links
        remove_action( 'wp_head', 'wp_oembed_add_host_js' );                // remove oEmbed-specific JavaScript from the front-end and back-end
        remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );         // remove wp-json

        /**
         * Instead use recommended plugin: Disable REST API
         */
        //add_filter( 'json_enabled', '__return_false' );                   // filters for WP-API version 1.x
        //add_filter( 'json_jsonp_enabled', '__return_false' );
        //add_filter( 'rest_enabled', '__return_false' );                   // filters for WP-API version 2.x
        //add_filter( 'rest_jsonp_enabled', '__return_false' );
        //add_filter( 'rest_authentication_errors', '__return_false' );

        // remove version
        add_filter( 'style_loader_src', array( 'w25_Seo_And_Performance', 'sap_remove_wp_ver_css_js' ), 9999 );
        add_filter( 'script_loader_src', array( 'w25_Seo_And_Performance', 'sap_remove_wp_ver_css_js' ), 9999 );

        // disable_emojis
        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
        remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
        remove_action( 'wp_print_styles', 'print_emoji_styles' );
        remove_action( 'admin_print_styles', 'print_emoji_styles' );
        remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
        remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
        remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
        // ---
        add_filter( 'tiny_mce_plugins', array( 'w25_Seo_And_Performance', 'sap_disable_emojis_tinymce' ) );
        add_filter( 'emoji_svg_url', '__return_false' );
    }

    public static function sap_remove_wp_ver_css_js( $wp_source ) {
        if ( strpos( $wp_source, 'ver=' . get_bloginfo( 'version' ) ) ) {
            $wp_source = remove_query_arg( 'ver', $wp_source );
        }

        return $wp_source;
    }

    public static function sap_disable_emojis_tinymce( $plugins ) {
        if ( is_array( $plugins ) ) {
            return array_diff( $plugins, array( 'wpemoji' ) );
        } else {
            return array();
        }
    }

    public static function sap_get_the_title() {
        return self::_sap_get_site_title();
    }

    public static function sap_add_rel_canonical() {
        $strMetaUrl = self::_sap_get_canonical_url();
        // ---
        echo '<link rel="canonical" href="' . $strMetaUrl . '" />';
    }

    public static function sap_add_meta_description() {
        // init
        $strMeta = "\n";

        /*
            *** FACEBOOK EXAMPLE ***
            ( also Google+, Pinterest and LinkedIn )
            !<meta property="og:title" content="Social Meta Tags"/>
            !<meta property="og:description" content="Description Here" />
            !<meta property="og:url" content=" http://www.example.com" />
            !<meta property="og:site_name" content="Your Site Name"/>
            !<meta property="og:type" content="website , article" />
            !<meta property="og:image" content="http://example.com/ogp.jpg" />
            <meta property="og:image:secure_url" content="https://secure.example.com/ogp.jpg" />
            <meta property="og:image:type" content="image/jpeg" />
            <meta property="og:image:width" content="500" />
            <meta property="og:image:height" content="400" />

            *** TWITTER EXAMPLE ***
            !<meta name="twitter:card" content="Summary">
            !<meta name="twitter:site" content="@SiteName">
            !<meta name="twitter:creator" content="@AuthorHandle">
            !<meta name="twitter:title" content="Article Title ">
            !<meta name="twitter:description" content="Page Description">
            !<meta name="twitter:image:src" content="Image URL">
        */

        // parse data
        $strMetaTitle = self::_sap_get_site_title( false );
        $strMetaDesc = self::_sap_get_post_description( 155 );
        $strMetaUrl = self::_sap_get_canonical_url();
        $strMetaSiteName = get_bloginfo( 'name' );
        $strMetaAuthor = self::_sap_get_sanitize_blogname( 15 );
        $strMetaImage = self::_sap_get_post_image();

        // create
        $strMeta .= '<meta name="description" content="'.$strMetaDesc.'" />'."\n";
        // ---
        $strMeta .= '<meta property="og:title" content="'.$strMetaTitle.'" />'."\n";
        $strMeta .= '<meta property="og:description" content="'.$strMetaDesc.'" />'."\n";
        $strMeta .= '<meta property="og:url" content="'.$strMetaUrl.'" />'."\n";
        $strMeta .= '<meta property="og:site_name" content="'.$strMetaSiteName.'"/>'."\n";
        $strMeta .= '<meta property="og:type" content="website" />'."\n";
        $strMeta .= '<meta property="og:image" content="'.$strMetaImage.'" />'."\n";
        // ---
        $strMeta .= '<meta name="twitter:card" content="Summary" />'."\n";
        $strMeta .= '<meta name="twitter:title" content="'.$strMetaTitle.'" />'."\n";
        $strMeta .= '<meta name="twitter:description" content="'.$strMetaDesc.'" />'."\n";
        $strMeta .= '<meta name="twitter:creator" content="@'.$strMetaAuthor.'" />'."\n";
        $strMeta .= '<meta name="twitter:site" content="@'.$strMetaSiteName.'" />'."\n";
        $strMeta .= '<meta name="twitter:image:src" content="'.$strMetaImage.'" />'."\n";

        // add to head html
        echo $strMeta;
    }

    public static function sap_handle_upload( $params ) {
        // temp uploaded image
        $file_path = $params['file'];

        // parse
        if ( ( ! is_wp_error( $params ) ) && file_exists( $file_path ) && in_array( $params['type'], array( 'image/png', 'image/jpeg' ) ) ) {
            // set new param
            $quality                            = 90;
            list( $largeWidth, $largeHeight )   = array( 2500, 2500 );
            list( $oldWidth, $oldHeight )       = getimagesize( $file_path );
            list( $newWidth, $newHeight )       = wp_constrain_dimensions( $oldWidth, $oldHeight, $largeWidth, $largeHeight );

            // resize image
            $image_resize = image_resize( $file_path, $newWidth, $newHeight, false, null, null, $quality);

            // unset send file
            unlink( $file_path );

            // check + set new image
            if ( ! is_wp_error( $image_resize ) ) {
                $newFilePath = $image_resize;
                rename( $newFilePath, $file_path );
            } else {
                $params = wp_handle_upload_error( $file_path, $image_resize->get_error_message() );
            }
        }

        return $params;
    }

    public static function sap_load_cf7_on_contact_page() {
        // block for other page != kontakt
        if ( ! strpos( self::_sap_get_current_url(), 'kontakt' ) > 0 ) {
            wp_dequeue_script( 'contact-form-7' );          // dequeue JS Script file
            wp_dequeue_style( 'contact-form-7' );           // dequeue CSS file
        }
    }

    public static function sap_admin_permalink_hide() {
        //echo '<style> #edit-slug-box { display:none; } </style>'."\n";
    }

    public static function sap_yoast_column_filter_hide() {
        //echo '<style> #wpseo-filter { display:none; } </style>'."\n";
    }

    public static function sap_admin_hide_yoast_box( $post_type = '' ) {
        global $post;

        if ( $post ) {
            if ( $post->post_type === $post_type ) {
                remove_meta_box( 'wpseo_meta', $post_type, 'normal' );

                // hide permalink url
                echo '<style> #wpseo-filter { display:none; } </style>' . "\n";
                // hide yoast filter
                echo '<style> #edit-slug-box { display:none; } </style>' . "\n";
            }
        }
    }

    /**
     * YOAST HOOK
     */
    public static function sap_change_yoast_page_titles() {
        return self::_sap_get_site_title();
    }

    public static function sap_change_yoast_description() {
        return self::_sap_get_post_description( 155 );
    }

    public static function sap_change_yoast_canonical() {
        return self::_sap_get_canonical_url();
    }

    public static function sap___genesis_detect_seo_plugins() {
        return self::sap___genesis_detect_plugin(
            apply_filters(
                'genesis_detect_seo_plugins',
                array(
                    'classes' => array(
                        'All_in_One_SEO_Pack',
                        'All_in_One_SEO_Pack_p',
                        'HeadSpace_Plugin',
                        'Platinum_SEO_Pack',
                        'wpSEO',
                    ),
                    'functions' => array(),
                    'constants' => array( 'WPSEO_VERSION', ),
                )
            )
        );
    }

    public static function sap___genesis_detect_plugin( $plugins ) {
        // check for classes
        if ( isset( $plugins['classes'] ) ) {
            foreach ( $plugins['classes'] as $name ) {
                if ( class_exists( $name ) )
                    return true;
            }
        }

        // check for functions
        if ( isset( $plugins['functions'] ) ) {
            foreach ( $plugins['functions'] as $name ) {
                if ( function_exists( $name ) )
                    return true;
            }
        }

        // check for constants
        if ( isset( $plugins['constants'] ) ) {
            foreach ( $plugins['constants'] as $name ) {
                if ( defined( $name ) )
                    return true;
            }
        }

        // no class, function or constant found to exist
        return false;
    }

    /**
     * PRIVATE FUNCTION
     */
    private static function _sap_get_current_url() {
        // connection type
        if ( is_ssl() ){
            $strConnType = 'https://';
        } else {
            $strConnType = 'http://';
        }

        return $strConnType.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    }

    private static function _sap_get_current_slug() {
        return basename(self::_sap_get_current_url());
    }

    private static function _sap_get_site_title( $addPageName=true ) {
        // init
        $strReturn = get_bloginfo( 'name' );
        $strSeparator = ' | ';
        // ---
        $strTitle = '';
        $strSlug = '';

        // parse
        if( !is_front_page() ) {

            // get current post title by slug
            $strUrl = self::_sap_get_current_url();
            $strSite = get_site_url();
            // ---
            $strUrl = str_replace($strSite, '', $strUrl);
            $arrUrl = explode( '/', $strUrl);
            $intLen = count($arrUrl)-1;
            // ---
            if ( $intLen>0 ) {
                for($i=$intLen; $i>=0; $i--) {
                    // find slug (exclude empty)
                    $item = $arrUrl[$i];
                    // ---
                    if ( !strlen($item)>0 ) { continue; }
                    // ---
                    if ( !is_numeric($arrUrl[$i]) ) {
                        $strSlug = $arrUrl[$i];
                        break;
                    }
                }
                
                if ( strlen($strSlug)>0 ) {
                    // get title
                    $post_data = self::_sap_db_get_post_by_slug( $item );
                    // ---
                    if ($post_data) {
                        $strTitle = $post_data->post_title;
                        // ---
                        if ( function_exists( 'qtranxf_gettext') ) {
                            $strTitle = qtranxf_gettext( $strTitle );
                        }
                    } 
                }
            }
            
            // parse title
            if ( strlen($strTitle)>0 ) {
                $strReturn = $strTitle.$strSeparator.$strReturn;
            }
        } 
        
        // remove page name (function argument false)
        if ( $addPageName==false ) {
            $strReturn = str_replace(get_bloginfo( 'name'), '', $strReturn);
            $strReturn = str_replace($strSeparator, '', $strReturn);
        }
        
        // title new hack
        if ( isset($GLOBALS['seo_new_title']) ) {
            $strReturn = $GLOBALS['seo_new_title'];
        }
        
        // last check
        $strReturn = trim($strReturn);
        // ---
        if ( !strlen($strReturn)>0 ) {
            $strReturn = get_bloginfo( 'name' );
        }
        
        return $strReturn;
    }

    private static function _sap_db_get_post_by_slug( $strSlug ) {
        global $wpdb;
            
        // init
        $objReturn = false;
        // ---
        $strTableName = $wpdb->prefix.'posts';
        
        // query
        $strQuery =  ' SELECT * FROM '.$strTableName.' WHERE ';
        $strQuery .= '   post_name LIKE \''.$strSlug.'\' ';
        
        // execute
        $result = $wpdb->get_results($strQuery, OBJECT);
        // ---
        if ( isset($result[0]) )  {
            $objReturn = $result[0];
        }
        
        return $objReturn;
    }
    
    private static function _sap_db_get_post_by_id( $intID ) {
        global $wpdb;
            
        // init
        $objReturn = false;
        // ---
        $strTableName = $wpdb->prefix.'posts';
        
        // query
        $strQuery =  ' SELECT * FROM '.$strTableName.' WHERE ';
        $strQuery .= '   ID='.$intID.' ';
        
        // execute
        $result = $wpdb->get_results($strQuery, OBJECT);
        // ---
        if ( isset($result[0]) )  {
            $objReturn = $result[0];
        }
        
        return $objReturn;
    }
    
    private static function _sap_get_canonical_url() {
        // init
        $strCanonicalUrl = self::_sap_get_current_url();
        
        // remove last slug > page number
        $strBasename = basename($strCanonicalUrl);
        // ---
        if ( is_numeric($strBasename)==true ) {
            $strCanonicalUrl = str_replace($strBasename.'/', '', $strCanonicalUrl);
        }
        
        return $strCanonicalUrl;
    }
    
    private static function _sap_get_sanitize_blogname( $intMaxLength=0 ) {
        // init
        $strReturn = get_bloginfo( 'name' );
        
        // parse
        $strReturn = ucwords(strtolower($strReturn));
        // ---
        $strReturn = str_replace( ' ', '', $strReturn);
        $strReturn = str_replace( '-', '', $strReturn);
        $strReturn = str_replace( '|', '', $strReturn);
        // ---
        if ( $intMaxLength>0 ) {
            if ( strlen($strReturn)>$intMaxLength ) {
                $strReturn = substr($strReturn, 0, $intMaxLength);
            }
        }
        
        return $strReturn;
    }
    
    private static function _sap_get_post_description( $intMaxLength=155 ) {
        // init
        $strReturn = '';

        // front page >> wp description
        if ( is_front_page() ) {
            $strReturn = get_bloginfo( 'description' );
        }
        
        // parse
        if ( !$strReturn>0 ) {
        
            // get post data
            $intPageFrontID = intval( get_option( 'page_on_front' ) );
            $intPageBlogID = intval( get_option( 'page_for_posts' ) );
            $strSlug = basename( self::_sap_get_canonical_url() );
            // ---
            if ( is_front_page() ) {
                $objPost = self::_sap_db_get_post_by_id( $intPageFrontID );
            } else {
                $objPost = self::_sap_db_get_post_by_slug( $strSlug );
            }
                
            if ( $objPost ) {
                $strPostContent = $objPost->post_content;
                // ---
                $GLOBALS['_sap_first_image_post_id'] = $objPost->ID;
                
                // check shortcode
                $strFirstChar = substr($strPostContent, 0, 1);
                // ---
                if ( $strFirstChar=='[' ) {
                    
                    // get html source
                    ob_start();
                    $strHtmlContent = do_shortcode( $strPostContent );
                    $strReturn = ob_get_clean();
                    
                    // get first image
                    $output = preg_match_all( '@src="([^"]+)"@', $strHtmlContent, $matches);
                    // ---
                    if ( isset($matches[0][0]) ) {
                        // parse
                        $strFirstImage = $matches[0][0];
                        $strFirstImage = str_replace( 'src=', '', $strFirstImage);
                        $strFirstImage = str_replace( '"', '', $strFirstImage);
                        // ---
                        $GLOBALS['_sap_first_image_from_html_content'] = $strFirstImage;
                    }
                    
                    // parse html
                    $strPostContent = $strHtmlContent;
                }
                
                // translate
                if ( function_exists( 'qtranxf_gettext') ) {
                    $strPostContent = qtranxf_gettext( $strPostContent );
                }
                
                // fin
                $strReturn = $strPostContent;
            }
        }
        
        // desc new hack
        if ( isset($GLOBALS['seo_new_desc']) ) {
            $strReturn = $GLOBALS['seo_new_desc'];
        }
        
        // remove white space
        $strReturn = strip_tags($strReturn);
        // ---
        $strReturn = preg_replace( '/[\t\n\r\0\x0B]/', '', $strReturn);
        $strReturn = preg_replace( '/([\s])\1+/', ' ', $strReturn);
        // ---
        $strReturn = trim($strReturn);
        
        // check length
        if ( $intMaxLength>0 ) {
            if ( strlen($strReturn)>$intMaxLength ) {
                $strReturn = substr($strReturn, 0, $intMaxLength);
            }
        }
        
        // last check >> wp blog name
        if ( !strlen($strReturn)>0 ) {
            $strReturn = get_bloginfo( 'name' );
        }
        
        return $strReturn;
    }
    
    private static function _sap_get_post_image() {
        global $post;
        
        // init
        $strReturn = '';
        $strImageUrl = '';
        $intPostID = 0;
        // ---
        $strImgLogo = get_bloginfo( 'template_url').self::IMAGE_LOGO; 
        
        // default >> logo
        $strReturn = $strImgLogo;
        
        // post data
        if ( isset($GLOBALS['_sap_first_image_post_id']) ) {
            $intPostID = $GLOBALS['_sap_first_image_post_id'];
        }
        // ---
        if ($intPostID > 0) {
            
            // image from thumbnail
            if ( !strlen($strImageUrl)>0 ) {
                $arrImage = wp_get_attachment_image_src(get_post_thumbnail_id($intPostID), 'large' );
                // ---
                if (isset($arrImage[0])) {
                    if (strlen($arrImage[0]) > 0) {
                        $strImageUrl = $arrImage[0];
                    }
                }
            }
            
            // image from meta data
            if ( !strlen($strImageUrl)>0 ) {
                $arrPostMeta = get_post_meta($intPostID);
                // ---
                if (isset($arrPostMeta['_image_id'][0])) {
                    $strTemp = wp_get_attachment_url($arrPostMeta['_image_id'][0]);
                    // ---
                    if (strlen($strTemp) > 0) {
                        $strImageUrl = $strTemp;
                    }
                }
            }
        }
        
        // image from content parse > _sap_get_post_description()
        if ( !strlen($strImageUrl)>0 ) {
            if ( isset($GLOBALS['_sap_first_image_from_html_content']) ) {
                $strImageUrl = $GLOBALS['_sap_first_image_from_html_content'];
            }
        }
        
        // set post image
        if ( strlen($strImageUrl)>0 ) {
            $strReturn = $strImageUrl;
        }

        // debug
        if ( strpos(get_bloginfo( 'url'), 'localhost')!==false ) {
            if ( current_user_can( 'administrator' ) ) {
                // image exist
                $bolImgExist = self::_sap_check_url_exist( $strImgLogo );
                // ---
                if ( $bolImgExist==false ) {
                    echo 'DEBUG: _sap_get_post_image() >> default image doesnt exist';
                }
            }
        }
        
        return $strReturn;
    }
    
    private static function _sap_check_url_exist($strUrl) {
        // init
        $bolReturn = false;

        // localhost
        $strUrl = str_replace( 'https://', 'http://', $strUrl );
        
        // get only 1 byte (https://hungred.com/how-to/php-check-remote-email-url-image-link-exist/)
        $result = @file_get_contents($strUrl, 0, NULL, 0, 1);
        // ---
        if ($result) {
            $bolReturn = true;
        }

        // result
        return $bolReturn;
    }
    
}
