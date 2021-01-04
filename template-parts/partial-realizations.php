<?php
    /**
     *  Partial REALIZATIONS
     *
     *  @package    25wat
     */

    $url_main         = get_bloginfo( 'url' );
    $url_template_dir = get_template_directory_uri();

    $realization_mobile  = '';
    $realization_desktop = '';

    $args = [
        'post_type'   => 'realization',
        'orderby'     => 'menu_order',
        'order'       => 'ASC',
        'numberposts' => 3,
    ];
    $data = get_posts( $args );
    if ( $data ) {
        foreach ( $data as $key => $item ) {
            $image = get_the_post_thumbnail_url( $item->ID );
            $image = $image ? $image : $url_template_dir . '/assets/img/placeholder.jpg';

            $realization_mobile .= '
                <a href="' . get_permalink( $item->ID ) . '" class="mobile-item mobile-item-' . $key . '"
                    data-aos="fade-up" style="max-height: 340px; overflow: hidden;">
                    <div class="mobile-item-heading mobile-item-heading__dark">
                        <span>Portfolio</span>
                        <h4>' . $item->post_title . '</h4>
                    </div>
                    <img class="img-fluid" src="' . $image . '" alt="' . $item->post_title . '">
                </a>
            ';

            // fix for vertical image - remove IMG, background image only .
            if ( 2 === $key ) {
                $realization_desktop .= '
                    <a href="' . get_permalink( $item->ID ) . '" class="image-bg desktop-item desktop-item-' . $key . '"
                        data-aos="fade-up" style="background-image: url(' . $image . ');">
                        <div class="desktop-item-heading desktop-item-heading__dark">
                            <span>Portfolio</span>
                            <h4>' . $item->post_title . '</h4>
                        </div>
                    </a>
                ';
            } else {
                $realization_desktop .= '
                    <a href="' . get_permalink( $item->ID ) . '" class="image-bg desktop-item desktop-item-' . $key . '"
                    data-aos="fade-up" style="background-image: url(' . $image . ');">
                    <div class="desktop-item-heading desktop-item-heading__dark">
                    <span>Portfolio</span>
                    <h4>' . $item->post_title . '</h4>
                    </div>
                    <img src="' . $image . '" alt="' . $item->post_title . '" style="height: 100%;">
                    </a>
                    ';
            }
        }
    } else {
        echo '====== Brak realizacji ======';
    }
?>

<!-- glider only for mobile and tablet -->
<div class="glider-contain1">
    <div class="slick-home-portfolio">
        <?php echo $realization_mobile; ?>
    </div>
</div>
<!-- glider only for mobile and tablet -->

<!-- desktop portfolio-->
<div class="desktop-portfolio">
    <?php echo $realization_desktop; ?>
</div>
<!-- desktop portfolio-->