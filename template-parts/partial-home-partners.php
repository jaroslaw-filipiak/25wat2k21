<?php
    /**
     *  Partial PARTNERS
     *
     *  @package    25wat
     */

    $url_main         = get_bloginfo( 'url' );
    $url_template_dir = get_template_directory_uri();

    $args = [
        'post_type'        => 'partners',
        'orderby'          => 'menu_order',
        'order'            => 'ASC',
        'numberposts'      => -1,
        'suppress_filters' => false,
    ];
    $data = get_posts( $args );
    if ( $data ) {
        foreach ( $data as $key => $item ) {
            $image = get_field( 'image', $item->ID );
            $image = $image ? $image : $url_template_dir . '/assets/img/placeholder.jpg';

            $item_title = apply_filters( 'get_title', $item->post_title );
            ?>
                <div class="logo mx-auto d-flex">
                    <img src="<?php echo $image; ?>" alt="Logo - <?php echo $item_title; ?>">
                </div>
            <?php
        }
    } else {
        echo '<div>====== Brak partnerów ======</div>';
    }
?>
