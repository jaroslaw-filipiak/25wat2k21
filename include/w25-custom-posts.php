<?php
/**
 * Custom post type (short: CPT).
 *
 * @package    25wat
 */

/**
 * Initialize CPT:
 * - news, realization, person, etc
 * - admin CPT menu
 * - refresh rewrite rules
 */
function w25_init_custom_post() {
    global $cpt_asbo;

    /* init CPT */
    w25_def_theme_cpt();

    /* add CPT */
    w25_add_theme_cpt();

    /* add CPT pagination param */
    add_rewrite_rule( 'news/([0-9]+)$', 'index.php?pagename=news&cpt_pagination=$matches[1]', 'top' );                  // DIGITAL only.
    add_rewrite_rule( 'case-studies/([0-9]+)$', 'index.php?pagename=case-studies&cpt_pagination=$matches[1]', 'top' );  // DIGITAL only.
    add_rewrite_rule( 'baza-wiedzy/([0-9]+)$', 'index.php?pagename=baza-wiedzy&cpt_pagination=$matches[1]', 'top' );    // DIGITAL only.
    //add_rewrite_rule( 'offer/?$', 'index.php?pagename=offer', 'top' );
    //add_rewrite_rule( 'offer/(.+)/?$', 'index.php?s=$matches[1]', 'top' );

    // Request: offer/komunikacja
    // Matched Rewrite Rule: offer/(.+?)/?$
    // Matched Rewrite Query: category_name=komunikacja
    // Loaded Template: 404.php
    // Post type: 
    // Search param: 
    

    /* refresh rewrites (required for refresh/rewrite CPT) */
    flush_rewrite_rules();

    /* add custom column to admin CPT view */
    add_filter( 'manage_product_posts_columns', 'w25_edit_columns_add', 10, 1 );
    add_action( 'manage_product_posts_custom_column', 'w25_edit_columns_content' );

    add_filter( 'manage_process_posts_columns', 'w25_edit_columns_add', 10, 1 );
    add_action( 'manage_process_posts_custom_column', 'w25_edit_columns_content' );

    add_filter( 'manage_firm_posts_columns', 'w25_edit_columns_add', 10, 1 );
    add_action( 'manage_firm_posts_custom_column', 'w25_edit_columns_content' );

    add_filter( 'manage_downloads_posts_columns', 'w25_edit_columns_add', 10, 1 );
    add_action( 'manage_downloads_posts_custom_column', 'w25_edit_columns_content' );

    add_filter( 'manage_realization_posts_columns', 'w25_edit_columns_add', 10, 1 );
    add_action( 'manage_realization_posts_custom_column', 'w25_edit_columns_content' );

    add_filter( 'manage_partners_posts_columns', 'w25_edit_columns_add', 10, 1 );
    add_action( 'manage_partners_posts_custom_column', 'w25_edit_columns_content' );

    add_filter( 'manage_testimonial_posts_columns', 'w25_edit_columns_add', 10, 1 );
    add_action( 'manage_testimonial_posts_custom_column', 'w25_edit_columns_content' );

    add_filter( 'manage_edit-product_sortable_columns', 'w25_sortable_columns' );
    add_filter( 'manage_edit-process_sortable_columns', 'w25_sortable_columns' );
    add_filter( 'manage_edit-firm_sortable_columns', 'w25_sortable_columns' );
    add_filter( 'manage_edit-downloads_sortable_columns', 'w25_sortable_columns' );
    add_filter( 'manage_edit-realization_sortable_columns', 'w25_sortable_columns' );
    add_filter( 'manage_edit-partners_sortable_columns', 'w25_sortable_columns' );
    add_filter( 'manage_edit-testimonial_sortable_columns', 'w25_sortable_columns' );
}

/**
 * Add custom post type to theme (register CPT).
 */
function w25_def_theme_cpt() {
    global $cpt_asbo;

    /* init CPT */
    $cpt_asbo = array(
        'news'        => array(
            'name'          => __( 'News', '25wat' ),
            'singular_name' => __( 'News', '25wat' ),
            'rewrite'       => array(
                'with_front' => true,
                'slug'       => 'news',
            ),
            'supports'      => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'revisions' ),
            'show_ui'       => true,
            'show_in_menu'  => true,
            'show_in_rest' => true,
            'show_in_graphql' => true,
            'graphql_single_name' => 'news-item',
            'graphql_plural_name' => 'news',
            'menu_position' => 41,
            'menu_icon'     => 'dashicons-welcome-write-blog',
        ),

        'case-study' => array(
            'name'          => __( 'Case Studies', '25wat' ),
            'singular_name' => __( 'Case Study', '25wat' ),
            'public'        => true,
            'show_ui'       => true,
            'hierarchical'  => true,
            'rewrite'       => array(
                'with_front' => true,
                'slug'       => 'case-study',
            ),
            'supports'      => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'revisions' ),
            'taxonomies'    => array( 'category', 'tag' ),
            'show_in_menu'  => true,
            'show_in_rest' => true,
            'graphql_single_name' => 'case-study',
            'graphql_plural_name' => 'case-studies',
            'show_in_navs_menu'  => true,   // ???
            'menu_position' => 42,
            'menu_icon'     => 'dashicons-portfolio',

            // 'exclude_from_search' => false,
            // 'publicly_queryable' => true,
            // 'capability_type' => 'page',

            'has_archive' => true,
        ),
        'testimonial'       => array(
            'name'          => __( 'Testimonials', '25wat' ),
            'singular_name' => __( 'Testimonial', '25wat' ),
            'public'        => false,
            'show_ui'       => true,
            'show_in_rest' => true,
            'graphql_single_name' => 'testimonial',
            'graphql_plural_name' => 'testimonials',
            'supports'      => array( 'title', 'revisions', 'page-attributes' ),
            'admin_orderby' => '&orderby=menu_order&order=asc',
        ),
        // 'offer'     => array(
        //     'name'          => __( 'Offer', '25wat' ),
        //     'singular_name' => __( 'Offer', '25wat' ),
        //     'public'        => true,
        //     'show_ui'       => true,
        //     //'hierarchical'  => true,
        //     'rewrite'       => array(
        //         'with_front' => true,
        //         'slug'       => 'ofertunio/category-slug-to-modify',
        //     ),
        //     'taxonomies'    => array( 'category' ),
        //     'supports'      => array( 'title', 'page-attributes', 'revisions' ),
        //     'admin_orderby' => '&orderby=menu_order&order=asc',
        // ),
    );
}

/**
 * Add custom post type to theme (register CPT).
 */
function w25_add_theme_cpt() {
    global $cpt_asbo;

    foreach ( $cpt_asbo as $key => $item ) {
        /* add CPT type */
        $labels_type = array(
            'name'          => $item['name'],
            'singular_name' => $item['singular_name'],
            'add_new'       => __( 'Add', '25wat' ),
            'search_items'  => __( 'Search', '25wat' ),
            'edit_item'     => __( 'Edit', '25wat' ),
        );
        register_post_type(
            $key,
            array(
                'labels'              => $labels_type,
                'public'              => isset( $item['public'] ) ? $item['public'] : true,                           // show in admin panel.
                'hierarchical'        => isset( $item['hierarchical'] ) ? $item['hierarchical'] : false,              // not hierarchical.
                'exclude_from_search' => isset( $item['exclude_from_search'] ) ? $item['exclude_from_search'] : true, // not search by default: site/?s=search-term.
                'rewrite'             => isset( $item['rewrite'] ) ? $item['rewrite'] : true,                         // default: site/key/post_slug.
                'supports'            => $item['supports'],
                'has_archive'         => isset( $item['has_archive'] ) ? $item['has_archive'] : false,                 // special post type, TRUE for WPML slug translations.
                'show_ui'             => isset( $item['show_ui'] ) ? $item['show_ui'] : true,                         // public FALSE but show in admin panel.
                'show_in_menu'        => isset( $item['show_in_menu'] ) ? $item['show_in_menu'] : false,              // do not show CPT.
                'menu_position'       => isset( $item['menu_position'] ) ? $item['menu_position'] : false,            // show by custom CPT menu.
                'menu_icon'           => isset( $item['menu_icon'] ) ? $item['menu_icon'] : 'dashicons-star-empty',   // default icon.
                'taxonomies'          => isset( $item['taxonomies'] ) ? $item['taxonomies'] : array(),                // array taxonomies.
            )
        );

        $category_labels = array(
            'name'          => _x( 'Categories', 'taxonomy general name' ),
            'singular_name' => _x( 'Category', 'taxonomy singular name' ),
            'menu_name'     => __( 'Categories' ),
        );
        $tag_labels      = array(
            'name'          => _x( 'Tags', 'taxonomy general name' ),
            'singular_name' => _x( 'Tag', 'taxonomy singular name' ),
            'menu_name'     => __( 'Tags' ),
        );

        if ( isset( $item['taxonomies'] ) ) {
            foreach ( $item['taxonomies'] as $tax ) {

                $tax_tag = $key . '_' . $tax;

                //var_dump($tax_tag);

                register_taxonomy(
                    $tax_tag,
                    array( $key ),
                    array(
                        'hierarchical'          => 'category' === $tax ? true : false, // true > like category .
                        'labels'                => 'category' === $tax ? $category_labels : $tag_labels,
                        'show_ui'               => true,
                        'show_admin_column'     => true,
                        'update_count_callback' => '_update_post_term_count',
                        'query_var'             => true,
                        'rewrite'               => array( 'slug' => $tax_tag, 'with_front' => true ),
                    )
                );
            }
        }
    }
}

/**
 * Add sortable column to admin panel.
 */
function w25_sortable_columns() {
    return array(
        'title'     => 'title',
        'w25_order' => 'menu_order',
        'date'      => 'date',
    );
}

/**
 * Add custom column to admin panel.
 *
 * @param array $columns        WP default.
 */
function w25_edit_columns_add( $columns ) {

    global $post_type;

    if ( 'process' === $post_type ) {
        $columns = array(
            'cb'        => '<input type="checkbox" />',
            'title'     => __( 'Nazwa', '25wat' ),
            'w25_order' => __( 'Kolejność', '25wat' ),
            'date'      => __( 'Data', '25wat' ),
        );
    } elseif ( 'partners' === $post_type ) {
        $columns = array(
            'cb'        => '<input type="checkbox" />',
            'title'     => __( 'Nazwa', '25wat' ),
            'w25_image' => __( 'Logotyp', '25wat' ),
            'w25_order' => __( 'Kolejność', '25wat' ),
            'date'      => __( 'Data', '25wat' ),
        );
    } else {
        $columns = array(
            'cb'        => '<input type="checkbox" />',
            'title'     => __( 'Nazwa', '25wat' ),
            'w25_order' => __( 'Kolejność', '25wat' ),
            'date'      => __( 'Data', '25wat' ),
        );
    }
    return $columns;
}

/**
 * Set value for custom column.
 *
 * @param array $column         WP default.
 */
function w25_edit_columns_content( $column ) {
    global $post;

    switch ( $column ) {
        case 'w25_order':
            $value = str_repeat( '&mdash; ', count( get_post_ancestors( $post->ID ) ) ) . $post->menu_order;
            echo $value;
            break;
        case 'w25_image':
            $value = get_field( 'image', $post->ID );
            echo '<img height="60" src=" ' . $value . ' ">';
            break;
        case 'w25_company':
            $value = get_field( 'cpt_product_company', $post->ID );
            $value = is_object( $value ) ? $value->post_title : '---';
            echo $value;
            break;
        case 'w25_thumbnail':
            $image_id  = get_post_thumbnail_id( $post->ID );
            $image_src = wp_get_attachment_url( $image_id );
            // ---
            echo '<img height="60" src=" ' . $image_src . ' ">';
            break;
    }
}

/**
 * Add CPT param for pagination.
 *
 * @param array $query_vars      WP default.
 */
function w25_cpt_query_vars( $query_vars ) {
    $query_vars[] = 'cpt_pagination';
    return $query_vars;
}
add_filter( 'query_vars', 'w25_cpt_query_vars' );

/**
 * Add admin panel CPT menu.
 * Correct current menu and submenu parent.
 */
function w25_add_admin_menu() {
    global $cpt_asbo;

    /* add separators to CPT */
    add_menu_page( '', '', 'read', 'wp-menu-separator1', '', '', '40' );
    add_menu_page( '', '', 'read', 'wp-menu-separator2', '', '', '44' );

    /* add CPT top menu 'theme-settings' */
    add_menu_page(
        __( 'Informacje', '25wat' ),
        __( '25wat', '25wat' ),
        'manage_options',
        'theme-settings',
        function () {
            get_template_part( 'include/w25-admin-page-info' );
        },
        'dashicons-admin-home',
        43
    );

    /**
     * Add admin option page (global settings)
     */
    add_submenu_page(
        'theme-settings',
        __( 'Settings', '25wat' ),
        __( ' - Settings', '25wat' ),
        'manage_options',
        'theme-options',
        array( 'W25_Admin_Options', 'load_admin_options_page' )
    );

    /**
     * Add CPT submenu for 'theme-settings'
     */
    foreach ( $cpt_asbo as $key => $item ) {
        /* exclude top menu items */
        if ( isset( $item['menu_position'] ) && $item['menu_position'] > 0 ) {
            continue;
        }

        /* param */
        $slug         = $key;
        $name         = $item['name'];
        $orderby      = isset( $item['admin_orderby'] ) ? $item['admin_orderby'] : '';
        $submenu_slug = 'edit.php?post_type=' . $slug . $orderby;
        $callable     = '';

        /* submenu */
        add_submenu_page(
            'theme-settings',
            $name,
            ' - ' . $name,
            'manage_options',
            $submenu_slug,
            $callable
        );
    }

    /* change first submenu name */
    global $submenu;
    if ( isset( $submenu['theme-settings'][0] ) ) {
        $submenu['theme-settings'][0][0] = __( 'About', '25wat' );
    }
}
add_action( 'admin_menu', 'w25_add_admin_menu', 10 );

/**
 * WP filter: set theme-settings for current submenu
 *
 * @param object $parent_file     WP default.
 */
function w25_cpt_parent_file( $parent_file ) {
    global $current_screen;
    global $cpt_asbo;

    if ( 'edit' === $current_screen->base || 'post' === $current_screen->base ) {
        foreach ( $cpt_asbo as $key => $item ) {
            /* exclude top menu items */
            if ( isset( $item['menu_position'] ) && $item['menu_position'] > 0 ) {
                continue;
            }

            if ( $current_screen->post_type === $key ) {
                $parent_file = 'theme-settings';
                break;
            }
        }
    }

    return $parent_file;
}
add_filter( 'parent_file', 'w25_cpt_parent_file' );

/**
 * WP filter: set current submenu (theme-settings)
 *
 * @param object $submenu_file      WP default.
 */
function w25_cpt_submenu_file( $submenu_file ) {
    global $current_screen;
    global $cpt_asbo;

    if ( 'edit' === $current_screen->base || 'post' === $current_screen->base ) {
        foreach ( $cpt_asbo as $key => $item ) {
            /* exclude top menu items */
            if ( isset( $item['menu_position'] ) && $item['menu_position'] > 0 ) {
                continue;
            }

            if ( $current_screen->post_type === $key ) {
                $orderby      = isset( $item['admin_orderby'] ) ? $item['admin_orderby'] : '';
                $submenu_file = 'edit.php?post_type=' . $current_screen->post_type . $orderby;
                break;
            }
        }
    }

    return $submenu_file;
}
add_filter( 'submenu_file', 'w25_cpt_submenu_file' );

/**
 * ACF (Advanced Custom Fields) hide definition menu.
 *
 * @param boolean $show     ACF default.
 */
function my_acf_show_admin( $show ) {
    return current_user_can( 'manage_options' );
}
add_filter( 'acf/settings/show_admin', 'my_acf_show_admin' );
