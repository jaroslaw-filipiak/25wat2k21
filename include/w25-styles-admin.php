<?php
/** ============== ADMIN PANEL ============== */

/**
 * Add admin backend style.
 */
function w25_admin_style() {
    // init.
    $url_template_dir = get_template_directory_uri();
    $theme_version    = '9.9.9';

    // get theme version.
    $my_theme = wp_get_theme();
    if ( $my_theme ) {
        $theme_version = $my_theme->get( 'Version' );
    }

    wp_enqueue_style( 'admin', $url_template_dir . '/assets/css/admin.css', array(), $theme_version );
}
add_action( 'admin_enqueue_scripts', 'w25_admin_style' );

/**
 * Edit WP admin panel menu
 *
 * @param array $menu_order     Current menu array (set as default).
 */
function w25_custom_menu_order( $menu_order ) {
    /* https://whiteleydesigns.com/editing-wordpress-admin-menus/ */

    // hide: post, comments.
    // remove_menu_page( 'edit.php' );
    remove_menu_page( 'edit-comments.php' );

    // move to end: activity_log_page > plugin: "Dziennik aktywności".
    $key = array_search( 'activity_log_page', $menu_order, true );
    if ( $menu_order[ $key ] ) {
        unset( $key );
        $menu_order[] = 'activity_log_page';
    }

    return $menu_order;
}
add_filter( 'custom_menu_order', '__return_true' );
add_filter( 'menu_order', 'w25_custom_menu_order', 1 );

/**
 * Remove WP admin bar items
 *
 * @param object $wp_admin_bar  Current admin bar items (set as default).
 */
function w25_admin_bar( $wp_admin_bar ) {
    // hide menu elements.
    $wp_admin_bar->remove_menu( 'updates' );          // updates link.
    $wp_admin_bar->remove_menu( 'comments' );         // comments link.
    $wp_admin_bar->remove_menu( 'new-content' );      // content link.
    $wp_admin_bar->remove_menu( 'w3tc' );             // w3 total cache.
    $wp_admin_bar->remove_menu( 'wpseo-menu' );       // Yoast SEO.
}
add_action( 'admin_bar_menu', 'w25_admin_bar', 999 );

/**
 * Hide admin bar on front page.
 */
function w25_filter_head() {
    remove_action( 'wp_head', '_admin_bar_bump_cb' );
}
add_action( 'get_header', 'w25_filter_head' );

?>