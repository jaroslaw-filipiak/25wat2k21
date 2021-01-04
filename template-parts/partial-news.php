<?php
    /**
     *  Partial NEWS
     *
     *  @package    25wat
     */

    $url_main         = get_bloginfo( 'url' );
    $url_template_dir = get_template_directory_uri();
?>

<?php
    $args = [
        'post_type'   => 'news',
        'orderby'     => 'date',
        'order'       => 'DESC',
        'numberposts' => 8,
    ];
    $data = get_posts( $args );
    if ( $data ) {
        foreach ( $data as $key => $item ) {
            $image = get_the_post_thumbnail_url( $item->ID );
            $image = $image ? $image : $url_template_dir . '/assets/img/placeholder.jpg';

            $item_title = apply_filters( 'get_title', $item->post_title );
            $title_hero = get_field( 'hero_title', $item->ID );
            $title_post = $title_hero ? $title_hero : $item_title;

            $item_no   = $key + 1;
            $item_href = get_permalink( $item->ID );
            ?>
                <a href="<?php echo $item_href; ?>" class="aktualnosci-item aktualnosci-item-<?php echo $item_no; ?>" style="background-image:url(<?php echo $image; ?>)">
                    <div class="aktualnosci-item-heading aktualnosci-item-heading__white">
                        <span><?php _e( 'Aktualności', '25wat' ); ?></span>
                        <h4><?php echo $title_post; ?></h4>
                    </div>
                </a>
            <?php
        }
    } else {
        echo '====== Brak postów ======';
    }
?>
