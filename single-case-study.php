<?php
    /**
     *  Template Name: 25wat - case study, single
     *
     *  @package    25wat
     */

    get_header();

    $url_main         = get_bloginfo( 'url' );
    $url_template_dir = get_template_directory_uri();
    $slug             = w25_get_current_slug();
    $url_full         = w25_get_current_url();
    $site_comments    = w25_get_option( 'disqus_site' );

    $image      = get_the_post_thumbnail_url();
    $image_hero = $image ? $image : $url_template_dir . '/assets/img/placeholder.jpg';
?>

<section class="single-content case-study">
    <div class="container">
        <div class="row">
            <div class="col text-center" style="background: #fff;">
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="content text-left">
                <?php
                    while ( have_posts() ) {
                        the_post();
                        
                        // for continuously images .
                        remove_filter('the_content', 'wpautop');
                        the_content();
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="single-content-more">
    <div class="portfolio case-studies-boxes">
        <div class="row">
            <div class="col-10 offset-1">
                <h2 class="mt-5 pt-4 text-center text-lg-left font-500"><?php _e( 'View also', '25wat' ); ?></h2>
            </div>
        </div>
        <div id="portfolio" class="row d-flex align-items-center justify-content-center pt-5 pb-5">
        <?php
                $args = [
                    'post_type'        => 'case-study',
                    'orderby'          => 'date',
                    'order'            => 'DESC',
                    'numberposts'      => 3,
                    'suppress_filters' => false,
                ];
                $data = get_posts( $args );

                if ( $data ) {
                    foreach ( $data as $key => $item ) {
                        $post_title   = apply_filters( 'the_title', $item->post_title );
                        $post_content = apply_filters( 'the_content', $item->post_content );
                        $post_excerpt = w25_excerpt_text( $post_content );
                        $post_link    = get_permalink( $item->ID );
                        $post_image   = w25_seo_image_url( get_the_post_thumbnail_url( $item->ID ), '650x450' );
                        ?>
                        <div class='portfolio-label col-12 col-md-6 col-lg-4 portfolio-item item-$i scale-anm'>
                            <a href='<?php echo $post_link; ?>'>
                                <div class='hover-box'>
                                    <h3><?php echo $post_title; ?></h3>
                                    <div class='sep hb-sep' style='width: 200px;'></div>
                                    <div class=' hb-hashtags'>
                                        <ul>
                                            <?php
                                                set_query_var( 'partial-post-id', $item->ID );
                                                get_template_part( 'template-parts/partial-case-study-list' );
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                                <img src='<?php echo $post_image; ?>' class='img-fluid hb-img'>
                            </a>
                        </div>
                        <?php
                    }
                }
            ?>
        </div>
    </div>
</section>

<?php
    get_footer();
