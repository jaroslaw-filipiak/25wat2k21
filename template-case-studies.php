<?php
    /**
     *  Template Name: 25wat - case studies, top
     *
     *  @package    25wat
     */

    get_header();

    $url_main         = get_bloginfo( 'url' );
    $url_template_dir = get_template_directory_uri();
    $slug             = w25_get_current_slug( true );
    $url_base         = get_permalink( get_page_by_path( $slug ) );
    $page_current     = get_query_var( 'cpt_pagination' ) <= 1 ? 1 : get_query_var( 'cpt_pagination' );
    $item_by_page     = intval( w25_get_option( 'portfolio_by_page' ) ) >= 1 ? w25_get_option( 'portfolio_by_page' ) : 6;

    $image      = get_the_post_thumbnail_url();
    $image_hero = $image ? $image : $url_template_dir . '/assets/img/placeholder.jpg';
?>
 <section class="offer-heading">
<div class="container">
        <div class="row">
            <div class="col text-center">
                <h1 class="entry-title"><?php _e( 'Case studies', '25wat' ); ?></h1>
            </div>
        </div>
    </div>
</section>

 <div class="container blog-header">
    
    <div class="container portfolio-header" id="case-studies">
        <div class="row">
            <div class="col-12">
           
                <ul class="hashtags d-flex portfolioFilter">
                    <li><a class="hashtag-active fil-cat category-filtr-all" href="#" onclick="return false;" data-rel="part-0" data-category-slug="all">#All</a> </li>
                    <?php
                        // show category .
                        $cs_category_list = get_terms( 'case-study_category' );  // category .
                        if ( $cs_category_list ) {
                            foreach ( $cs_category_list as $key => $cs_category ) {
                                echo '<li><a class="fil-cat" href="#" onclick="return false;" data-rel="part-' . ( $key + 1 ) . '" data-category-slug="' . $cs_category->slug . '">#' . $cs_category->name . '</a> </li>';
                            }
                        }

                        // parse tags .
                        $case_studies_all = get_posts(
                            [
                                'post_type'   => 'case-study',
                                'orderby'     => 'date',
                                'order'       => 'DESC',
                                'numberposts' => -1,
                                'suppress_filters' => false,
                            ]
                        );
                        $all_tags         = get_terms(
                            [
                                'taxonomy' => 'case-study_tag',
                            ]
                        );

                        // all tags .
                        $all_tags_li = '';
                        foreach ( $all_tags as $item ) {
                            $all_tags_li .= '<li><a href="#">' . $item->name . '</a></li>';
                        }

                        // parse tags by catgory .
                        $tags_by_category = [];
                        foreach ( $case_studies_all as $key => $case_study ) {
                            $category_by_post = wp_get_post_terms( $case_study->ID, 'case-study_category' );
                            $tags_by_post     = wp_get_post_terms( $case_study->ID, 'case-study_tag' );

                            foreach ( $category_by_post as $post_category ) {
                                $category_slug = $post_category->slug;

                                $case_study->category_list .= $category_slug . ',';
                                //var_dump($case_study);

                                foreach ( $tags_by_post as $post_tag ) {
                                    $tags_by_category[ $category_slug ][] = $post_tag->name;
                                }
                            }
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>

    
    <div class="marque marques">
                <ul class="more-tags part-0-more-tags not-visible">
                    <?php echo $all_tags_li; ?>
                </ul>
                <?php
                    foreach ( $cs_category_list as $key => $cs_category ) {
                        echo '<ul class="more-tags part-' . ( $key + 1 ) . '-more-tags not-visible">';
                        $category_slug = $cs_category->slug;

                        if ( isset( $tags_by_category[ $category_slug ] ) ) {
                            foreach ( $tags_by_category[ $category_slug ] as $item ) {
                                echo '<li><a href="#">' . $item . '</a></li>';
                            }
                        }

                        echo '</ul>' . "\n\r";
                    }
                ?>
    </div>
       

    <div class="container portfolio case-studies-boxes">
        <div id="portfolio" class="row">
            <?php
                if ( $case_studies_all ) {
                    foreach ( $case_studies_all as $key => $item ) {
                        $post_title   = apply_filters( 'the_title', $item->post_title );
                        $post_content = apply_filters( 'the_content', $item->post_content );
                        $post_excerpt = w25_excerpt_text( $post_content );
                        $post_link    = get_permalink( $item->ID );
                        $post_image   = w25_seo_image_url( get_the_post_thumbnail_url( $item->ID ), '650x450' );

                        $category_array = explode( ',', $item->category_list );
                        $category_array = array_filter( $category_array, 'strlen' );
                        $category_class = ' category_all';
                        foreach ( $category_array as $category_slug ) {
                            $category_class .= ' category_' . $category_slug;
                        }
            ?>
                        <div class="portfolio-label col-12 col-md-6 col-lg-4 portfolio-item item-$i scale-anm <?php echo $category_class; ?>">
                            <a href='<?php echo $post_link; ?>'>
                                <div class='hover-box'>
                                    <h3><?php echo $post_title; ?></h3>
                                    <div class='sep hb-sep' style='width: 200px;'></div>
                                    <div class='hb-hashtags'>
                                        <ul>
                                            <?php
                                                set_query_var( 'partial-post-id', $item->ID );
                                                get_template_part( 'template-parts/partial-case-study-list' );
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                                  <div class="hover-box__overlay"></div>
                                <img src='<?php echo $post_image; ?>' class='img-fluid hb-img'>
                            </a>
                        </div>
            <?php
                    }
                }
            ?>
        </div>
    </div>
</div>

<?php
    get_footer();
