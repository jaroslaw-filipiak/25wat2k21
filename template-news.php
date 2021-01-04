<?php
    /**
     *  Template Name: 25wat - news, top
     *
     *  @package    25wat
     */

    get_header();

    $url_main         = get_bloginfo( 'url' );
    $url_template_dir = get_template_directory_uri();
    $slug             = w25_get_current_slug( true );
    $url_base         = get_permalink( get_page_by_path( $slug ) );
    $page_current     = get_query_var( 'cpt_pagination' ) <= 1 ? 1 : get_query_var( 'cpt_pagination' );
    $item_by_page     = intval( w25_get_option( 'news_by_page' ) ) >= 1 ? w25_get_option( 'news_by_page' ) : 8;

    $image      = get_the_post_thumbnail_url();
    $image_hero = $image ? $image : $url_template_dir . '/assets/img/placeholder.jpg';
?>
<section>
    <div class="container blog-header">
        <div class="row text-left">
            <div class="col">
                <h1><?php _e( '#News', '25wat' ); ?></h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row d-flex align-items-center justify-content-center pt-5 pb-5">
        <?php
            $args = [
                'post_type'        => 'news',
                'orderby'          => 'post_date',
                'order'            => 'DESC',
                'numberposts'      => -1,
                'suppress_filters' => false,
            ];
            $data = get_posts( $args );

            if ( $data ) {
                foreach ( $data as $key => $item ) {

                    $post_title   = apply_filters( 'the_title', $item->post_title );
                    $post_content = apply_filters( 'the_content', $item->post_content );
                    $post_excerpt = w25_excerpt_text( $post_content );
                    $post_link    = get_permalink( $item->ID );
                    $post_image   = w25_seo_image_url( get_the_post_thumbnail_url( $item->ID ), '400x150' );
                    ?>
                    <div class='blog-item'>
                        <a class="blog-link" href="<?php echo $post_link; ?>">
                            <div class='blog-item-avatar' style="background-image: url(<?php echo $post_image; ?>)"></div>
                            <div class='blog-item-content'>
                                <h4><?php echo $post_title; ?></h4>
                                <?php echo $post_excerpt; ?>
                            </div>
                            <p class="pb-2 pr-3 blog-item__button"><?php _e( 'Read more', '25wat' ); ?></p>
                        </a>
                    </div>
                    <?php
                }
            }
        ?>
        </div>
    </div>
</section>

<section class="blog-pagintaion d-none">
    <div class="container">
        <div class="row">
            <div class="col d-flex align-items-center justify-content-center">
                <a href="#" class="card-button">
                    <svg class="liquid-button__blog-item d-none d-lg-block" data-text="<?php _e( 'More', '25wat' ); ?>" data-force-factor="0.1"
                        data-layer-1-viscosity="0.3" data-layer-2-viscosity="0.4" data-layer-1-mouse-force="300"
                        data-layer-2-mouse-force="400" data-layer-1-force-limit="1" data-layer-2-force-limit="2"
                        data-color1="#0131FF" data-color2="#0131FF" data-color3="#2A62F4">
                    </svg>
                </a>
                <a href="#" class="d-lg-none btn btn-card__mobile mt-5 mb-5"><?php _e( 'v', '25wat' ); ?></a>
            </div>
        </div>
    </div>
</section>

<?php
    get_footer();
