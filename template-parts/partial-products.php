<?php
    /**
     *  Partial PRODUCTS
     *
     *  @package    25wat
     */

    $url_main         = get_bloginfo( 'url' );
    $url_template_dir = get_template_directory_uri();

    $args = [
        'post_type'        => 'product',
        'orderby'          => 'menu_order',
        'order'            => 'ASC',
        'numberposts'      => 2,
        'suppress_filters' => false,
    ];
    $data = get_posts( $args );
    if ( $data ) {
        foreach ( $data as $key => $item ) {
            $image = get_the_post_thumbnail_url( $item->ID );
            $image = $image ? $image : $url_template_dir . '/assets/img/placeholder.jpg';

            $title      = $item->post_title;
            $title_hero = get_field( 'hero_title', $item->ID );
            $title_post = $title_hero ? $title_hero : $title;
            ?>
                <a href="<?php echo get_permalink( $item->ID ); ?>">
                    <div class="offer-item ">
                        <img src="<?php echo $image; ?>" alt="<?php echo $title; ?>" class="img-fluid">
                        <div class="offer-txt">
                            <p class="offer-label">Oferta</p>
                            <h2 data-aos="fade-up"><?php echo $title_post; ?></h2>
                        </div>
                    </div>
                </a>
            <?php
        }
    } else {
        echo '====== Brak ofert ======';
    }
?>