<?php
/**
 * Global WP settings.
 *
 * @package    25wat
 */

/** ============== INCLUDE ============== */
require_once 'include/w25-styles.php';
require_once 'include/w25-styles-admin.php';
require_once 'include/class-w25-seo-and-performance.php';
require_once 'include/class-w25-admin-options.php';
require_once 'include/class-bootstrap-navwalker.php';
require_once 'include/w25-helpers.php';
require_once 'include/w25-custom-posts.php';

/**
 * Proper ob_end_flush() for all levels
 *
 * This replaces the WordPress `wp_ob_end_flush_all()` function
 * with a replacement that doesn't cause PHP notices.
 */
remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );
add_action( 'shutdown', function() {
   while ( @ob_end_flush() );
} );

/** MAIL ERRORS */
add_action( 'wp_mail_failed', 'onMailError', 10, 1 );
function onMailError( $wp_error ) {
    $error_info = 'Mail error: unknow' . "\r\n";
    if ( isset( $wp_error->errors['wp_mail_failed']['01'] ) ) {
        $error_info = $wp_error->errors['wp_mail_failed']['01'] . "\r\n";
    }
    echo $error_info;
}

/** MAIL BRIEF */
add_action( 'wp_ajax_mail_before_submit', 'send_AJAX_mail_before_submit' );
add_action( 'wp_ajax_nopriv_mail_before_submit', 'send_AJAX_mail_before_submit' );
function send_AJAX_mail_before_submit() {
    if ( isset( $_POST['action'] ) && isset( $_POST['form_data'] ) ) {
        if ( 'mail_before_submit' === $_POST['action'] ) {

            $form_data = array_column( $_POST['form_data'], 'value', 'name' );

            // sanitize data .
            foreach ( $form_data as $key => $item ) {
                $item['name']  = filter_input_array( $item['name'], FILTER_SANITIZE_STRING );
                $item['value'] = filter_input_array( $item['value'], FILTER_SANITIZE_STRING );
            }

            // init brief elements .
            $brief_items = [
                [
                    'desc'   => 'Project area',
                    'values' => [
                        'app_design'   => '#Web',
                        'social_media' => '#Social media',
                        'advertising'  => '#Advertising',
                        'branding'     => '#Branding',
                    ],
                ],
                [
                    'desc'   => 'Field of work',
                    'values' => [
                        'brand_strategy'       => '#Brand strategy',
                        'graphic_design'       => '#Graphic design',
                        'advertising_campaign' => '#Advertising campaign',
                        'programming'          => '#Programming',
                    ],
                ],
                [
                    'values' => [
                        'budget' => 'Estimated budget',
                    ],
                ],
                [
                    'values' => [
                        'duration' => 'Estimated project duration',
                    ],
                ],
            ];

            // set range info .
            $range_items           = [
                '1 month',
                '2 to 6 months',
                '6 to 12 months',
                'over a year',
            ];
            $form_data['duration'] = $range_items[ intval( $form_data['duration'] ) ];

            $title     = '[INQUIRY] - brief from 25wat.com';
            $from_name = 'Brief from 25wat.com';
            $from_mail = 'biuro@25wat.com';
            $body      = '';
            $reply_to  = isset( $form_data['email'] ) ? $form_data['email'] : 'no_email';
            $footer    = '<br><br>---<br>Have a nice day! 25wat';

            // brief elements .
            foreach ( $brief_items as $item ) {
                // description .
                if ( isset( $item['desc'] ) ) {
                    $body .= '<tr><td> <b>' . nl2br( $item['desc'] ) . '</b> </td><td> &nbsp; </td></tr>' . "\r\n";
                }

                // value .
                foreach ( $item['values'] as $key => $name ) {

                    $value = isset( $form_data[ $key ] ) ? $form_data[ $key ] : '&#45;';
                    $value = 'on' === $value ? 'YES' : $value;
                    $name  = str_replace( '#', '&nbsp;&nbsp;&nbsp;#', $name );

                    $body .= '<tr><td style="width: 210px"> <b>' . $name . '</b> &nbsp; </td><td>' . nl2br( $value ) . '</td></tr>' . "\r\n";
                }
            }
            // ---
            $body .= '<tr><td colspan="2"><hr></td></tr>' . "\r\n";
            $body .= '<tr><td style="width: 210px"> <b>Email</b> &nbsp; </td><td>' . $form_data['email'] . '</td></tr>' . "\r\n";
            $body .= '<tr><td colspan="2"> <b>Message</b> </td></tr>' . "\r\n";
            $body .= '<tr><td colspan="2">' . $form_data['message'] . '</td></tr>' . "\r\n";
            // ---
            $body = '<table>' . $body . '</table>';

            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-Type: text/html; charset=UTF-8' . "\r\n";
            $headers .= 'From: ' . $from_name . ' <' . $from_mail . '>' . "\r\n";
            $headers .= 'Reply-To: ' . $reply_to . ' <' . $reply_to . '>' . "\r\n";

            $result = wp_mail(
                [ $from_mail ],
                $title,
                $body,
                $headers
            );

            // debug .
            if ( $result ) {
                $result = wp_mail(
                    [ 'lukasz.dabrzalski@gmail.com' ],
                    $title,
                    $body,
                    $headers
                );
            }

            echo $result;   // JS verification - success info, 1 / 0 .
            die();
        }
    }
}

/** INIT THEME */
W25_Seo_And_Performance::load();
W25_Admin_Options::load();
/** --- */
w25_init_custom_post();

/** ============== WP THEME SETUP ============== */
function w25_theme_setup() {
    // language.
    load_theme_textdomain( '25wat' );

    // main menu.
    register_nav_menu( 'primary', 'Main Menu' );

    // featured image.
    add_theme_support( 'post-thumbnails' );

    // image size remove.
    remove_image_size( 'medium' );
    remove_image_size( 'medium_large' );
    remove_image_size( 'large' );
    // ---
    update_option( 'medium_large_size_h', 0 );
    update_option( 'medium_large_size_w', 0 );
}
add_action( 'after_setup_theme', 'w25_theme_setup' );

/** ============== REMOVE BR (for continuously images pages) ============== */
//remove_filter( 'the_content', 'wpautop' );
//remove_filter( 'the_excerpt', 'wpautop' );

function disable_wp_auto_p( $content ) {
    $cpt_type         = get_post_type();

    if ( 'case-study' === $cpt_type ) {
        remove_filter( 'the_content', 'wpautop' );
        remove_filter( 'the_excerpt', 'wpautop' );
    }
    return $content;
}
//add_filter( 'the_content', 'disable_wp_auto_p', 0 );

/** ============== WP JS/CSS SETUP + DEFER ============== */
function wpassist_remove_block_library_css() {
    wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_enqueue_scripts', 'wpassist_remove_block_library_css' );

function script_async_defer( $tag, $handle, $src ) {
    $files_defer = [
        'main-style',
        'font-awsome',
        'jquery',
        'main',
    ];

    if ( true === in_array( $handle, $files_defer, true ) ) {
        return str_replace( '<script', '<script defer', $tag );
    } else {
        return $tag;
    }
}
add_filter( 'script_loader_tag', 'script_async_defer', 10, 3 );



/** ================= REWRITE ================== */
function w25_rewrite_rule() {
    // catch all search action > template: search.php.
    add_rewrite_rule( 'szukaj/(.+)/?$', 'index.php?s=$matches[1]', 'top' );
    add_rewrite_rule( 'szukaj/?', 'index.php?s=$matches[1]', 'top' );

    // REFRESH > its necessary for rewrite.
    flush_rewrite_rules();
}
add_action( 'init', 'w25_rewrite_rule', 100, 0 );


/** ============== AUTOPTIMIZE PLUGIN ============== */
add_filter( 'autoptimize_filter_cache_create_static_gzip', '__return_true' );

/** ============== SVG UPLOAD ============== */
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/** ============== TOP MENU - CLASS FOR CURRENT PAGE ============== */

/**
 * Add current class to menu page (to CPT post)
 *
 * @param array $items      WP default.
 * @param array $menu       WP default.
 * @param array $args       WP default.
 */
function w25_menu_current_item( $items, $menu, $args ) {
    // add WP class.
    _wp_menu_item_classes_by_context( $items );

    // parse.
    $url_current = w25_get_current_url();
    foreach ( $items as $menu_item ) {
        /* CPT: case-studies */
        if ( false !== strpos( $menu_item->url, 'case-studies' ) ) {
            if ( false !== strpos( $url_current, 'case-study' ) ) {
                $menu_item->classes[] = 'current-menu-item';
                break;
            }
        }

        /* CPT: aktualnosci */
        if ( false !== strpos( $menu_item->url, 'news' ) ) {
            if ( false !== strpos( $url_current, 'news' ) ) {
                $menu_item->classes[] = 'current-menu-item';
                break;
            }
        }

        /* CPT: offer */
        if ( false !== strpos( $menu_item->url, 'offer' ) ) {
            if ( false !== strpos( $url_current, 'offer' ) ) {
                $menu_item->classes[] = 'current-menu-item';
                break;
            }
        }
    }

    return $items;
}
add_filter( 'wp_get_nav_menu_items', 'w25_menu_current_item', 10, 3 );



/**
 * DEBUG: rewrite.
 */
function debug_rewrite_rules() {
    global $wp, $template, $wp_rewrite;

    echo '<pre>';
    echo 'Request: ';
    echo empty( $wp->request ) ? '---' . PHP_EOL : esc_html($wp->request) . PHP_EOL;
    echo 'Matched Rewrite Rule: ';
    echo empty( $wp->matched_rule ) ? '---' . PHP_EOL : esc_html($wp->matched_rule) . PHP_EOL;
    echo 'Matched Rewrite Query: ';
    echo empty($wp->matched_query) ? '---' . PHP_EOL : esc_html($wp->matched_query) . PHP_EOL;
    echo 'Loaded Template: ';
    echo basename($template) . PHP_EOL;
    echo 'Post type: ';
    echo get_post_type() . PHP_EOL;
    echo 'Search param: ';
    echo get_query_var( 's' ) . PHP_EOL;
    echo '</pre>' . PHP_EOL;

    echo '<pre>';
    print_r( $wp_rewrite->rules );
    echo '</pre>';
}
//add_action( 'wp_head', 'debug_rewrite_rules' );


