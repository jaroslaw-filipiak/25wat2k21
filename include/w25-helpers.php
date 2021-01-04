<?php

/**
 * Get current url by SERVER_VARIABLES
 *
 * @return string url_current
 */
function w25_get_current_url() {
    // connection type.
    if ( is_ssl() ) {
        $connection_type = 'https://';
    } else {
        $connection_type = 'http://';
    }

    return $connection_type . wp_unslash( $_SERVER['HTTP_HOST'] ) . $_SERVER['REQUEST_URI'];
}

/**
 * Get current slug by URL
 *
 * @param boolean $exclude_number   Cut last pagination number.
 * @return string url_current_slug
 */
function w25_get_current_slug( $exclude_number = true ) {
    $slug = basename( w25_get_current_url() );

    // pagination number
    if ( $exclude_number ) {
        if ( is_numeric( $slug ) ) {
            $url_current = w25_get_current_url();
            $url_current = str_replace( $slug . '/', '', $url_current );
            $slug        = basename( $url_current );
        }
    }

    return $slug;
}

/**
 * Excerpt text.
 *
 * @param  string  $text_full       Starting text.
 * @param  integer $letters_crop    Letters limit.
 * @return string  text_croped
 */
function w25_excerpt_text( $text_full, $letters_crop = 200 ) {
    $text_crop = $text_full;

    if ( strlen( $text_full ) > $letters_crop ) {
        $text_crop = wp_strip_all_tags( $text_full );
        $text_crop = substr( $text_crop, 0, $letters_crop );
        $text_crop = substr( $text_crop, 0, strripos( $text_crop, ' ' ) );
        $text_crop = $text_crop . ' ... ';
    }

    return $text_crop;
}

function w25_get_shortdate( $strDate ) {
    return date("Y-m-d", strtotime($strDate));
}

function w25_sanitize_text_with_break_lines( $strText ) {
    return implode( "\n", array_map( 'sanitize_text_field', explode( "\n", $strText ) ) );
}

function w25_clean_phone( $strNumber ){
    $remove_text = array('(', ')', '+', ' ', '-');
    $cleaned_phone = str_replace($remove_text, '', $strNumber);
    
    return $cleaned_phone;
}

function w25_parse_url( $url_page, $strScheme = 'http://' ) {
    return parse_url($url_page, PHP_URL_SCHEME) === null ?  $strScheme.$url_page : $url_page;
}

function w25_check_url_exist( $url_page ) {
    // init
    $bolReturn = false;

    // get only 1 byte (https://hungred.com/how-to/php-check-remote-email-url-image-link-exist/)
    $result = @file_get_contents($url_page, 0, NULL, 0, 1);
    // ---
    if ($result) {
        $bolReturn = true;
    }

    // result
    return $bolReturn;
}

function w25_check_url( $url_page, $bolGetCurrent = false ) {
    // init
    $strReturn = '';

    // check
    if ( !strlen($url_page)>0 ) {
        $url_page = '#';
    }
    // ---
    if (filter_var($url_page, FILTER_VALIDATE_URL) === FALSE) {
        $strReturn = __( 'Błędny url:', '25wat' ) . ' <strike>'.wp_strip_all_tags($url_page) . '</strike> ';

        // option
        if ($bolGetCurrent) {
            $strReturn = $get_site_url;
        }
    } else {
        $strReturn = $url_page;
    }

    return $strReturn;
}

/**
 *  Create breadcrumbs array (slug, name, lang)
 *
 * @return array breadcrumbs_data
 */
function w25_get_breadcrumbs() {
    // init.
    $url_site         = get_site_url();
    $url_current      = w25_get_current_url();
    $current_slug     = w25_get_current_slug();
    $current_lang     = w25_get_current_lang();
    $menu_item        = array();
    $breadcrumbs_item = array();

    // wp menu items.
    $wp_menu_item    = w25_get_all_menu_items();
    $wp_menu_parents = w25_get_postid_menu_item_parents();
    // ---
    foreach ( $wp_menu_item as $item ) {
        $menu_item_name                               = $item['post_name'];
        $menu_item[ $menu_item_name ]['post_id']      = $item['post_id'];
        $menu_item[ $menu_item_name ]['post_title']   = apply_filters( 'the_title', $item['post_title'] );
        $menu_item[ $menu_item_name ]['has_children'] = array_search( $item['post_id'], $wp_menu_parents, true ) ? true : false;
    }

    // init home.
    $item_path                      = $url_site . '/';  // start url.
    $breadcrumbs_item['page_title'] = 'Home';           // default start page.
    $breadcrumbs_item[]             = array( 
        'title' => __( 'Home', '25wat' ),
        'url'   => $item_path,
        'slug'  => $url_site,
    );

    // breadcrumbs: parse url.
    $url_current       = str_replace( $url_site, '', $url_current );
    $url_current_items = explode( '/', $url_current );
    $item_title        = '';
    // ---
    foreach ( $url_current_items as $key => $item ) {
        // exclude: empty, number, lang_slug.
        if ( ! strlen( $item ) > 0 || is_numeric( $item ) || $item === $current_lang ) {
            continue;
        }

        // init.
        $item_title = '';
        $item_path .= $item . '/';

        // title by menu data.
        if ( ! strlen( $item_title ) > 0 ) {
            if ( isset( $menu_item[ $item ] ) ) {
                // set title.
                $item_title = $menu_item[ $item ]['post_title'];
                $item_path  = true === $menu_item[ $item ]['has_children'] ? '' : $item_path;
            }
        }

        // title by post data.
        if ( ! strlen( $item_title ) > 0 ) {
            $post_data = w25_get_post_by_slug( $item );
            if ( $post_data ) {
                $item_title = apply_filters( 'the_title', $post_data->post_title );
            }
        }

        // title by slug.
        if ( ! strlen( $item_title ) > 0 ) {
            $item_title = trim( $item );
            $item_title = apply_filters( 'the_title', $item_title );
            $item_title = ucfirst( strtolower( $item_title ) );
            $item_title = str_replace( '-', ' ', $item_title );
            $item_title = apply_filters( 'the_title', $item_title );
        }

        // current page title.
        $breadcrumbs_item['page_title'] = $item_title;

        // last item - reset url (without link).
        if ( $current_slug === $item ) {
            $item_path = '';
        }

        // add breadcrumbs item.
        $breadcrumbs_item[] = array( 
            'title' => $item_title,
            'url'   => $item_path,
            'slug'  => $item,
        );
    }

    return $breadcrumbs_item;
}

function w25_get_current_lang() {
    // init
    $strResult = 'pl';
    
    // get
    if ( function_exists('qtranxf_getLanguage') ) {
        $strResult = qtranxf_getLanguage();
    }
    
    // result
    return $strResult;
}

function w25_get_translate_text( $strText ) {
    // check function "qtranxf_gettext" - qTranslate plugin
    if ( function_exists('qtranxf_gettext') ) {
        $strText = qtranxf_gettext( $strText );
    }
    
    return $strText;
}

function w25_get_all_menu_items() {
    global $wpdb;

    // init
    $arrReturn = array();

    // query
    $strQuery =  ' SELECT wp_postmeta.post_id, wp_posts.* ' . "\n";
    $strQuery .= ' FROM wp_postmeta ' . "\n";
    $strQuery .= ' JOIN wp_posts ' . "\n";
    $strQuery .= ' ON wp_postmeta.meta_value = wp_posts.ID ' . "\n";
    $strQuery .= ' WHERE wp_postmeta.meta_key LIKE \'_menu_item_object_id\' ' . "\n";

    // prepare tab name > wp prefix
    $strQuery = str_replace( 'wp_posts', $wpdb->prefix. 'posts', $strQuery );
    $strQuery = str_replace( 'wp_postmeta', $wpdb->prefix. 'postmeta', $strQuery );

    // execute
    $result = $wpdb->get_results($strQuery, ARRAY_A);
    // ---
    if ( count($result)>0 ) {
        $arrReturn = $result;
    }

    //result
    return $arrReturn;
}

function w25_get_postid_menu_item_parents() {
    global $wpdb;

    // init
    $arrReturn = array();

    // query
    $strQuery =  ' SELECT DISTINCT wp_postmeta.meta_value ' . "\n";
    $strQuery .= ' FROM wp_postmeta ' . "\n";
    $strQuery .= ' WHERE ' . "\n";
    $strQuery .= '   wp_postmeta.meta_key LIKE \'_menu_item_menu_item_parent\' ' . "\n";
    $strQuery .= ' AND ' . "\n";
    $strQuery .= '   wp_postmeta.meta_value > 0 ' . "\n";

    // prepare tab name > wp prefix
    $strQuery = str_replace( 'wp_postmeta', $wpdb->prefix. 'postmeta', $strQuery );

    // execute
    $result = $wpdb->get_results($strQuery, ARRAY_A);
    // ---
    if ( count($result)>0 ) {
        // parse
        foreach ( $result as $item ) {
            $arrReturn[] = $item['meta_value'];
        }
    }

    //result
    return $arrReturn;
}

/**
 * Get ancestor count.
 *
 * @param integer $post_id      Post ID to check.
 */
function w25_get_ancestor_count( $post_id ) {
    $ancestors        = get_post_ancestors( $post_id );
    $ancestors_number = is_array( $ancestors ) ? count( $ancestors ) : 0;

    return $ancestors_number;
}

/**
 * Get post date by slug (WP DB SQL: post_name).
 *
 * @param string $slug      WP post_name.
 */
function w25_get_post_by_slug( $slug ) {
    global $wpdb;

    // init.
    $post_data = array();
    // ---
    $table_name = $wpdb->prefix . 'posts';

    // query.
    $guery  = ' SELECT * FROM ' . $table_name . ' WHERE ';
    $guery .= '   post_name LIKE \'' . $slug . '\' AND ';
    $guery .= '   post_status LIKE \'publish\' ';
    $guery .= ' LIMIT 1 ';

    // execute.
    $result = $wpdb->get_results( $guery, OBJECT );
    // ---
    if ( isset( $result[0] ) ) {
        $post_data = $result[0];
    }

    return $post_data;
}

function w25_get_posts_by_type( $strPostType, $intQuantity = -1, $strOrderByASC = '', $strOrderByDESC = '' ) {
    // init
    $arrPosts = array();

    // check
    $strPostType = strval($strPostType);
    // ---
    if (strlen($strPostType) > 0) {
        // param
        $args = array(
            'post_type' => $strPostType,
            'numberposts' => $intQuantity
        );

        // order by ASC
        if (strlen($strOrderByASC) > 0) {
            $args['orderby'] = array($strOrderByASC => 'ASC');
        }

        // order by DESC
        if (strlen($strOrderByDESC) > 0) {
            $args['orderby'] = array($strOrderByDESC => 'DESC');
        }

        // get
        $result = get_posts($args);

        // result
        if (count($result) > 0) {
            $arrPosts = $result;
        }
    }

    return $arrPosts;
}

function w25_get_terms_by_type( $strTaxonomyType ) {
    // init
    $arrReturn = array();

    // get data
    $terms = get_terms( $strTaxonomyType );
    // ---
    if ( !empty( $terms ) && !is_wp_error( $terms ) ) {
        foreach ( $terms as $term ) {
            $arrReturn[$term->slug] = w25_get_translate_text( $term->name );
        }
    }

    // result
    return $arrReturn;
}

function w25_count_posts_by_type( $strPostType, $strCategory = '', $strTag = '' ) {
    // init
    $intPosts    = array();
    $arrTaxQuery = array();

    // category
    if ( strlen( $strCategory ) > 0 ) {
        $arrTaxQuery = array(
            array(
                'taxonomy' => $strPostType . '_category',
                'field'    => 'slug',
                'terms'    => $strCategory,
                'operator' => 'IN',
            )
        );
    }

    // tag
    if ( strlen( $strTag ) > 0 ) {
        $arrTaxQuery = array(
            array(
                'taxonomy' => 'post_tag',
                'field'    => 'slug',
                'terms'    => $strTag,
                'operator' => 'IN',
            )
        );
    }

    // check
    $strPostType = strval( $strPostType );
    // ---
    if ( strlen( $strPostType ) > 0 ) {
        // param
        $args = array(
            'post_type' => $strPostType,
            'numberposts' => -1,
            'tax_query' => $arrTaxQuery
        );

        // get
        $result = get_posts( $args );

        // result
        $intPosts = count( $result );
    }

    return $intPosts;
}

/**
 * Get info about time text reading.
 *
 * @param string $text_1    Text part 1.
 * @param string $text_2    Text part 2.
 */
function w25_read_text_info( $text_1, $text_2 = '' ) {
    // count words (default read speed: 200 words/min).
    $text_words   = str_word_count( $text_1 ) + str_word_count( $text_2 );
    $text_time_in = intval( $text_words / 200 ) + 1;

    // text info.
    switch ( $text_time_in ) {
        case $text_time_in > 1 && $text_time_in < 5:
            $info = $text_time_in . ' ' . __( 'minuty czytania', '25wat' );
            break;
        case $text_time_in >= 5:
            $info =  $text_time_in . ' ' . __( 'minut czytania', '25wat' );
            break;
        default:
            $info = __( '1 minuta czytania', '25wat' );
    }

    return $info;
}

/**
 * Remove base url from given url.
 *
 * @param string $url_full      Full url to clean.
 * @param string $url_main      Optional, string to remove.
 */
function w25_get_url_path( $url_full, $url_main = '' ) {
    if ( ! strlen( $url_main ) > 0 ) {
        $url_main = get_bloginfo( 'url' );
    }
    return str_replace( $url_main, '', $url_full );
}

/**
 * Check product post child.
 *
 * @param integer $product_id       ID product to check.
 */
function w25_product_child_count( $product_id ) {
    $args     = array(
        'post_parent' => $product_id,
        'post_type'   => 'product',
        'numberposts' => -1,
    );
    $children = get_children( $args );

    return count( $children );
}


/**
 * Get products hierarchy by category.
 *
 * @param integer $category_post_id    Category ID.
 */
function w25_get_product_category_hierarchy( $category_post_id ) {
    // get children .
    $args     = array(
        'post_parent' => $category_post_id,
        'post_type'   => 'product',
        'numberposts' => -1,
        'orderby'     => 'menu_order',
        'order'       => 'asc',
    );
    $children = get_children( $args );

    // parse .
    $GLOBALS['hierarchy'][ $category_post_id ] = '';
    foreach ( $children as $child ) {

        $GLOBALS['hierarchy'][ $category_post_id ] .= $child->ID . ',';

        $product_childs = w25_product_child_count( $child->ID );
        if ( $product_childs > 0 ) {
            w25_get_product_category_hierarchy( $child->ID );
            $GLOBALS['hierarchy'][ $child->ID ] = isset( $GLOBALS['hierarchy'][ $child->ID ] ) ? $GLOBALS['hierarchy'][ $child->ID ] : 'err';
        }
    }

    $GLOBALS['hierarchy'][ $category_post_id ] = substr( $GLOBALS['hierarchy'][ $category_post_id ], 0, -1 );
}

/**
 * Get company products hierarchy by CPT meta.
 *
 * @param integer $company_post_id    Company ID (CPT).
 */
function w25_get_product_company_hierarchy( $company_post_id ) {
    // init .
    $company_products  = array();
    $company_hierarchy = array();

    // get product item by producent .
    $posts_by_company = get_posts(array(
        'numberposts' => -1,
        'post_status' => 'publish',
        'post_type'   => 'product',
        'meta_key'    => 'cpt_product_company',
        'meta_value'  => $company_post_id,
        'orderby'     => 'menu_order',
        'order'       => 'asc',
    ));

    // get parents and create hierarchy .
    foreach ( $posts_by_company as $post_company ) {

        $ancestors = get_post_ancestors( $post_company->ID );
        $ancestors = array_reverse( $ancestors );

        // parse parents.
        $product_path = '';
        foreach ( $ancestors as $key => $part_id ) {
            $menu_order    = get_post_field( 'menu_order', $part_id );
            $product_path .= $menu_order . '-' . $part_id . ' / ';
        }

        // add parent .
        $parent_path = substr( $product_path, 0, -3);
        if ( strlen( $parent_path ) > 0 ) {
            if ( false === in_array( $parent_path, $company_products, true ) ) {
                $company_products[] = $parent_path;
            }
        }

        // add product .
        $menu_order = get_post_field( 'menu_order', $post_company->ID );
        if ( strlen( $parent_path ) > 0 ) {
            $product_path = $parent_path . ' / ' . $menu_order . '-' . $post_company->ID;
        } else {
            $product_path = $menu_order . '-' . $post_company->ID;
        }

        if ( false === in_array( $product_path, $company_products, true ) ) {
            $company_products[] = $product_path;
        }
    }

    // sort by menu_order .
    sort( $company_products, SORT_NATURAL );

    // remove order number and create finally structure.
    foreach ( $company_products as $item ) {
        $part     = explode( ' / ', $item );
        $part_lvl = count( $part );

        $prev_parent_id = 0;
        for ( $i = 0; $i < $part_lvl; $i++ ) {
            $product    = explode( '-', $part[ $i ] );
            $product_id = $product[1];

            if ( isset( $company_hierarchy[ $prev_parent_id ] ) ) {
                if ( false === strpos( $company_hierarchy[ $prev_parent_id ], $product_id ) ) {
                    $company_hierarchy[ $prev_parent_id ] .= ',' . $product_id;
                }
            } else {
                $company_hierarchy[ $prev_parent_id ] =  $product_id;
            }

            $prev_parent_id = $product_id;
        }
    }

    return $company_hierarchy;
}

function w25_html_product_file( $product_id ) {
    $files = get_field( 'cpt_product_file_list', $product_id );
    if ( $files ) {
        foreach ( $files as $key => $item ) {
            $file_url  = isset( $item['cpt_product_file'] ) ? $item['cpt_product_file']['url'] : '';
            $file_name = isset( $item['cpt_product_file'] ) ? $item['cpt_product_file']['filename'] : '';

            $file_front_name = strlen( $item['cpt_product_file_name'] ) > 0 ? $item['cpt_product_file_name'] : $file_name;

            $arrUploadDir  = wp_upload_dir();
            $strUploadUrl  = $arrUploadDir['baseurl'];
            $strUploadPath = $arrUploadDir['basedir'];
            $strFileName   = basename( $file_url );
            // ---
            $strUploadDir = $file_url;
            $strUploadDir = str_replace($strFileName, '', $strUploadDir);
            $strUploadDir = str_replace($strUploadUrl, '', $strUploadDir);
            // ---
            $strFilePath = $strUploadPath.$strUploadDir;
            $strFilePath = $strFilePath.$strFileName;

            $size = round( (int)filesize($strFilePath) / 1024, 0 );    // kB
            ?>
                <a href="<?php echo $file_url; ?>" class="file-link" target="_blank"><span class="file-image"></span><span class="file-data"><?php echo $file_front_name; ?> <?php echo $size; ?><?php _e( 'kB', '25wat' ); ?></span></a>
            <?php
        }
    }
}

function w25_html_product_item( $product_hierarchy, $product_id ) {

    if ( isset( $product_hierarchy[ $product_id ] ) ) {
        // drow product (category) .
        $products = explode( ',', $product_hierarchy[ $product_id ] );
        foreach ( $products as $key => $post_id ) {

            $post_item    = get_post( $post_id );
            $post_title   = apply_filters( 'the_title', $post_item->post_title );
            $post_content = apply_filters( 'the_content', $post_item->post_content );

            $parents      = get_post_ancestors( $post_id );
            $post_lvl     = count( $parents );

            $class_category_lvl = 'category_level_' . $post_lvl;
            $class_border_top   = $key > 0 ? 'border-top' : '';
            $class_category     = isset( $product_hierarchy[ $post_id ] ) ? 'category' : 'item';
            $class_children     = isset( $product_hierarchy[ $post_id ] ) ? 'has_children' : 'no_children';
            $class_content      = strlen( $post_content ) > 0 ? '' : 'd-none';

            ?>
            <li class="<?php echo $class_border_top; ?> <?php echo $class_category_lvl; ?>">
                <a class="content category container" id="p<?php echo $post_id; ?>">
                    <h5 class="title color-orange"><?php echo $post_title; ?></h5>
                    <div class="btn-toggle">
                        <div class="btn-down">
                            <span class="toggle-image"></span><span class="toggle-text">Rozwiń</span>
                        </div>
                        <div class="btn-up">
                            <span class="toggle-image"></span><span class="toggle-text">Zwiń</span>
                        </div>
                    </div>
                </a>
                <ul>
                    <div class="<?php echo $class_category_lvl; ?>">
                        <div class="content item container">
                            <div class="text <?php echo $class_content; ?>">
                                <?php echo $post_content; ?>
                            </div>    
                            <div class="file <?php echo $class_children; ?>">
                                <?php w25_html_product_file( $post_item->ID ); ?>
                            </div>
                            <div class="link <?php echo $class_children; ?>">
                                <a href="<?php echo get_permalink( get_page_by_path( 'kontakt' ) ); ?>" class="btn btn-orange">Zapytaj o ofertę</a>
                            </div>                        
                        </div>
                    </div>
                    <?php
                        // drow child .
                        w25_html_product_item( $product_hierarchy, $post_id );
                    ?>
                </ul>
            </li>
            <?php
        }
    }
}


/**
 * Add products data to Algolia index.
 * Site: https://www.algolia.com/dashboard
 */
function w25_refresh_algoliasearch_index() {
    /* init */
    require_once 'algoliasearch.php';

    $url_main       = get_bloginfo( 'url' );
    $product_export = array();
    $result         = null;

    $algolia_app   = w25_get_option( 'algolia_app' );
    $algolia_key   = w25_get_option( 'algolia_admin_key' );
    $algolia_index = w25_get_option( 'algolia_search_index' );

    try {
        $client = new \AlgoliaSearch\Client( $algolia_app, $algolia_key );
        $index  = $client->initIndex( $algolia_index );

        $index->setSettings(
            [
                'searchableAttributes' => [
                    'product_title',
                    'product_content',
                    'product_category_title',
                    'product_category_content',
                    'product_company_title',
                    'product_company_content',
                ],
                'typoTolerance'        => 'min',    // search patern tolerance: 1 char.
            ]
        );

        /* get WP data */
        $product_items = get_posts(
            array(
                'numberposts' => -1,
                'post_type'   => 'product',
                'orderby'     => 'menu_order',
                'order'       => 'ASC',
            )
        );

        /* prepare product data */
        foreach ( $product_items as $item ) {
            $arr_temp = array();

            $arr_temp['objectID'] = $item->ID;
            // ---
            $arr_temp['product_host']      = $url_main;
            $arr_temp['product_id']        = $item->ID;
            $arr_temp['product_url']       = w25_get_url_path( get_permalink( $item->ID ), $url_main );
            $arr_temp['product_slug']      = $item->post_name;
            $arr_temp['product_title']     = $item->post_title;
            $arr_temp['product_content']   = $item->post_content;
            $arr_temp['product_has_child'] = w25_product_child_count( $item->ID );

            $parent_item = $item->post_parent > 0 ? get_post( $item->post_parent ) : false;
            // ---
            $arr_temp['product_category_id']         = $parent_item ? $parent_item->ID : 0;
            $arr_temp['product_category_url']        = $parent_item ? w25_get_url_path( get_permalink( $parent_item->ID ), $url_main ) : '---';
            $arr_temp['product_category_slug']       = $parent_item ? $parent_item->post_name : '---';
            $arr_temp['product_category_title']      = $parent_item ? $parent_item->post_title : './';
            $arr_temp['product_category_content']    = $parent_item ? $parent_item->post_content : '---';
            $arr_temp['product_category_level']      = $parent_item ? w25_get_ancestor_count( $parent_item->ID ) : '0';
            $arr_temp['product_category_level_path'] = str_repeat( './', $arr_temp['product_category_level'] ) . $arr_temp['product_category_title'];

            $company_item = get_field( 'cpt_product_company', $item->ID );
            // ---
            $arr_temp['product_company_id']      = $company_item ? $company_item->ID : 0;
            $arr_temp['product_company_url']     = $company_item ? w25_get_url_path( get_permalink( $company_item->ID ), $url_main ) : '---';
            $arr_temp['product_company_slug']    = $company_item ? $company_item->post_name : '---';
            $arr_temp['product_company_title']   = $company_item ? $company_item->post_title : '---';
            $arr_temp['product_company_content'] = $company_item ? $company_item->post_content : '---';

            $product_export[] = $arr_temp;
        }

        /* index refresh */
        $result = $index->addObjects( $product_export );

    } catch ( Exception $e ) {
        $result = 'AlgoliaSearch exception: ' . $e->getMessage();
    }

    return $result;
}



/**
 * IMAGE SEO
 *
 * @param string $image        Image URL/ID.
 * @param string $image_size   Image size (width x height || width) px.
 */
function w25_seo_image_url( $image, $image_size = '' ) {
    // init.
    $placeholder_dir   = '/assets/img/';
    $placeholder_name  = 'placeholder.jpg';
    $dir_template_path = get_stylesheet_directory();
    $dir_template_url  = get_stylesheet_directory_uri();
    $dir_upload_wp     = wp_upload_dir();
    $dir_upload_path   = $dir_upload_wp['basedir'];
    $dir_upload_url    = $dir_upload_wp['baseurl'];

    // image details.
    $image_source_url    = '';
    $image_source_path   = '';
    $image_source_dir    = '';
    $image_source_width  = 0;
    $image_source_height = 0;

    // image URL.
    if ( is_numeric( $image ) ) {
        $image_source_url = wp_get_attachment_url( $image );
    } else {
        $image_source_url = $image;
    }

    // https: fix for Tytan Docker.
    if ( is_ssl() ) {
        $image_source_url = str_replace( 'http://', 'https://', $image_source_url );
    }

    // init return image.
    $return_image_url = $image_source_url;

    // image source path.
    $image_info = pathinfo( $image_source_url );
    // --- .
    if ( isset( $image_info['extension'] ) ) {
        $image_basename = $image_info['basename'];
        $image_filename = $image_info['filename'];
        $image_ext      = $image_info['extension'];
        // ---
        $image_source_dir = $image_source_url;
        $image_source_dir = str_replace( $image_basename, '', $image_source_dir );
        $image_source_dir = str_replace( $dir_template_url, '', $image_source_dir );
        $image_source_dir = str_replace( $dir_upload_url, '', $image_source_dir );
        // ---
        if ( false !== strpos( $image_source_url, '/uploads/' ) ) {
            // uploads images.
            $image_source_url  = $dir_upload_url . $image_source_dir . $image_basename;
            $image_source_path = $dir_upload_path . $image_source_dir . $image_basename;
        } else {
            // theme images.
            $image_source_url  = $dir_template_url . $image_source_dir . $image_basename;
            $image_source_path = $dir_template_path . $image_source_dir . $image_basename;
        }
    }

    // check exist source file.
    if ( false === file_exists( $image_source_path ) ) {
        $image_source_url = '';
    }

    // PLACEHOLDER: check image source.
    if ( ! strlen( $image_source_url ) > 0 ) {
        $image_source_url  = $dir_template_url . $placeholder_dir . $placeholder_name;
        $image_source_path = $dir_template_path . $placeholder_dir . $placeholder_name;
        $image_source_dir  = $placeholder_dir;

        $return_image_url = $image_source_url;
    }

    // PLACEHOLDER: debug.
    if ( false !== strpos( get_bloginfo( 'url' ), 'localhost' ) ) {
        if ( current_user_can( 'administrator' ) ) {
            // placeholder exist.
            if ( false === file_exists( $dir_template_path . $placeholder_dir . $placeholder_name ) ) {
                echo 'DEBUG: w25_seo_image_url() >> placeholder image doesn\'t exist';
                return '';
            }
        }
    }

    // get source image details.
    $image_source_size   = getimagesize( $image_source_path );
    $image_source_width  = $image_source_size[0];
    $image_source_height = $image_source_size[1];

    // set output SIZE.
    if ( strlen( $image_size ) > 0 ) {
        $size_exp            = explode( 'x', $image_size );
        $image_output_width  = isset( $size_exp[0] ) ? intval( $size_exp[0] ) : 0;
        $image_output_height = isset( $size_exp[1] ) ? intval( $size_exp[1] ) : 0;

        // calculate height.
        if ( ! $image_output_height > 0 ) {
            $source_ratio = $image_source_height / $image_source_width;
            $image_output_height = round( $image_output_width * $source_ratio );
        }

        // output IMAGE.
        $image_source_info  = pathinfo( $image_source_url );
        // --- .
        if ( isset( $image_source_info['extension'] ) ) {
            // parse.
            $image_basename = $image_source_info['basename'];
            $image_filename = $image_source_info['filename'];
            $image_ext      = $image_source_info['extension'];
            // --- .
            $image_size_name   = $image_filename . '-' . $image_output_width . 'x' . $image_output_height;
            $image_output_url  = str_replace( $image_filename, $image_size_name, $image_source_url );
            $image_output_path = str_replace( $image_filename, $image_size_name, $image_source_path );
        }
    } else {
        // placeholder.
        $image_output_url  = $image_source_url;
        $image_output_path = $image_source_path;
    }

    // create image in right size.
    if ( file_exists( $image_output_path ) ) {
        // image exist, dont create image.
        $return_image_url = $image_output_url;

    } else {
        /*
            Retina >> https://github.com/serbanghita/Mobile-Detect
            TO_DO: check current source JPG interlace (progressive jpeg).
        */

        // make by mime_type.
        $im = null;
        // ---
        if ( strlen( $image_source_path ) > 0 ) {

            // crop center.
            $size = getimagesize( $image_source_path );
            // ---
            $image_type       = $size['mime'];
            $image_org_width  = $size[0];
            $image_org_height = $size[1];

            // resize.
            $image_dim = image_resize_dimensions( $image_org_width, $image_org_height, $image_output_width, $image_output_height, array( 'center', 'center' ) );

            // create template img.
            switch ( $image_type ) {
                case 'image/jpeg':
                    $im = imageCreateFromJpeg( $image_source_path );
                    break;
                case 'image/png':
                    $im = imageCreateFromPng( $image_source_path );
                    break;
                case 'image/gif':
                    $im = imageCreateFromGif( $image_source_path );
                    break;
                case 'image/bmp':
                    $im = imageCreateFromBmp( $image_source_path );
                    break;
            }
        }

        // resize && save.
        if ( ! is_null( $im ) ) {

            // new image base.
            $tmp = imagecreatetruecolor( $image_output_width, $image_output_height );
            // ---
            if ( ( 'image/png' === $image_type ) || ( 'image/gif' === $image_type ) ) {
                // Check if this image is PNG or GIF, then set if Transparent.
                imagealphablending( $tmp, false );
                imagesavealpha( $tmp, true );
                $transparent = imagecolorallocatealpha( $tmp, 255, 255, 255, 127 );
                imagefilledrectangle( $tmp, 0, 0, $image_output_width, $image_output_height, $transparent );
            }

            // create image - crop center.
            imagecopyresampled( $tmp, $im, $image_dim[0], $image_dim[1], $image_dim[2], $image_dim[3], $image_dim[4], $image_dim[5], $image_dim[6], $image_dim[7] );

            // save by mime_type.
            switch ( $image_type ) {
                case 'image/jpeg':
                    imageinterlace( $tmp, 1 );                  // progressive JPEG.
                    imagejpeg( $tmp, $image_output_path, 85 );  // 0 (best compression) to 100 (no compression).
                    break;
                case 'image/png':
                    imagepng( $tmp, $image_output_path, 7 );    // 0 (no compression) to 9.
                    break;
                case 'image/gif':
                    imagegif( $tmp, $image_output_path );
                    break;
                case 'image/bmp':
                    imagewbmp( $tmp, $image_output_path );
                    break;
            }

            // clean.
            imagedestroy( $im );
            imagedestroy( $tmp );
            // ---
            unset( $im );
            unset( $tmp );
        }

        // success.
        if ( file_exists( $image_output_path ) ) {
            $return_image_url = $image_output_url;
        }
    }

    return $return_image_url;
}

function w25_thumbnail_upscale( $default, $orig_w, $orig_h, $new_w, $new_h, $crop ) {
    if ( ! $crop ) {
        /* let the WP default function handle this */
        return null;
    }

    $aspect_ratio = $orig_w / $orig_h;
    $size_ratio   = max($new_w / $orig_w, $new_h / $orig_h);

    $crop_w = round($new_w / $size_ratio);
    $crop_h = round($new_h / $size_ratio);

    $s_x = floor( ($orig_w - $crop_w) / 2 );
    $s_y = floor( ($orig_h - $crop_h) / 2 );

    return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
}
add_filter( 'image_resize_dimensions', 'w25_thumbnail_upscale', 10, 6 );



