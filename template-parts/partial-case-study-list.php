<?php
    /**
     *  Partial CASE STUDY - category list, html:UL:LI
     *
     *  @package    25wat
     */

    $url_main         = get_bloginfo( 'url' );
    $url_template_dir = get_template_directory_uri();

    $post_var_id      = get_query_var( 'partial-post-id' );
    $post_category    = get_the_terms( $post_var_id, 'case-study_category' );  // category .
    $post_category_li = '';

    if ( $post_category ) {
        foreach ( $post_category as $tax ) {
            $post_category_li .= '<li>#' . $tax->name . '</li>';
        }

        echo '<ul>' . $post_category_li . '</ul>';
    }
