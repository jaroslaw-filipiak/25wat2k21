<?php
    /**
     *  Partial TESTIMONIALS
     *
     *  @package    25wat
     */

    $url_main         = get_bloginfo( 'url' );
    $url_template_dir = get_template_directory_uri();

    $colors = [
        'color-blue',
        'color-yellow',
        'color-black',
    ];

    $data = get_posts(
        [
            'post_type'        => 'testimonial',
            'numberposts'      => -1,
            'suppress_filters' => false,
        ]
    );
    if ( $data ) {

        $post_rows    = get_query_var( 'testimonials-rows' );
        $post_part    = get_query_var( 'testimonials-part' );
        $post_total   = count( $data );
        $posts_by_row = round( $post_total / $post_rows, 0, PHP_ROUND_HALF_UP );

        $args = [
            'post_type'        => 'testimonial',
            'orderby'          => 'menu_order',
            'order'            => 'ASC',
            'numberposts'      => $posts_by_row,
            'offset'           => $post_part * $posts_by_row,
            'suppress_filters' => false,
        ];
        $data = get_posts( $args );

        foreach ( $data as $key => $item ) {
            $testimonial_id = $item->ID;

            $image     = get_field( 'image', $testimonial_id );
            $image_url = $image ? $image : $url_template_dir . '/assets/img/placeholder.jpg';

            // get EN image > broken WMPL media translations .
            if ( is_numeric( $image_url ) ) {
                $testimonial_id = icl_object_id( $item->ID, 'testimonial', true, 'en' );
                $image          = get_field( 'image', $testimonial_id );
                $image_url      = $image ? $image : $url_template_dir . '/assets/img/placeholder.jpg';
            }

            $image_alt = $testimonial_id ? get_post_meta( $testimonial_id, '_wp_attachment_image_alt', true ) : __( 'Testimonials placeholder' );

            $text    = get_field( 'text', $item->ID );
            $person  = get_field( 'person', $item->ID );
            $company = get_field( 'company', $item->ID );

            $random_index = array_rand( $colors );
            $random_color = $colors[ $random_index ];
            ?>
                <div class="testimonial d-flex">
                    <div class="info">
                        <h3 class="<?php echo $random_color; ?>"><?php echo $text; ?></h3>
                        <p class="author">- <?php echo $person; ?>, <?php echo $company; ?></p>
                    </div>
                    <div class="avatar">
                        <img loading="lazy" src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>" class="img-fluid">
                    </div>
                </div>
            <?php
        }
    }
