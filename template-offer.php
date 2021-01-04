<?php
    /**
     *  Template Name: 25wat - offer, top
     *
     *  @package    25wat
     */

    get_header();

    $url_main         = get_bloginfo( 'url' );
    $url_template_dir = get_template_directory_uri();

    $post_id   = get_the_ID();
    $parent_id = wp_get_post_parent_id( $post_id );

    $image      = get_the_post_thumbnail_url();
    $image_hero = $image ? $image : $url_template_dir . '/assets/img/placeholder.jpg';
?>
<div>
    <svg class="offerpage-blob" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 288 288">
        <linearGradient id="linear-gradient" x1="0.154" y1="0.098" x2="0.654" y2="0.823"
            gradientUnits="objectBoundingBox">
            <stop offset="0" stop-color="#ffca1b" />
            <stop offset="1" stop-color="#fcea00" />
        </linearGradient>
        <path fill="url(#linear-gradient)">
            <animate repeatCount="indefinite" attributeName="d" dur="5s" values="M37.5,186c-12.1-10.5-11.8-32.3-7.2-46.7c4.8-15,13.1-17.8,30.1-36.7C91,68.8,83.5,56.7,103.4,45
            c22.2-13.1,51.1-9.5,69.6-1.6c18.1,7.8,15.7,15.3,43.3,33.2c28.8,18.8,37.2,14.3,46.7,27.9c15.6,22.3,6.4,53.3,4.4,60.2
            c-3.3,11.2-7.1,23.9-18.5,32c-16.3,11.5-29.5,0.7-48.6,11c-16.2,8.7-12.6,19.7-28.2,33.2c-22.7,19.7-63.8,25.7-79.9,9.7
            c-15.2-15.1,0.3-41.7-16.6-54.9C63,186,49.7,196.7,37.5,186z;
            M51,171.3c-6.1-17.7-15.3-17.2-20.7-32c-8-21.9,0.7-54.6,20.7-67.1c19.5-12.3,32.8,5.5,67.7-3.4C145.2,62,145,49.9,173,43.4
            c12-2.8,41.4-9.6,60.2,6.6c19,16.4,16.7,47.5,16,57.7c-1.7,22.8-10.3,25.5-9.4,46.4c1,22.5,11.2,25.8,9.1,42.6
            c-2.2,17.6-16.3,37.5-33.5,40.8c-22,4.1-29.4-22.4-54.9-22.6c-31-0.2-40.8,39-68.3,35.7c-17.3-2-32.2-19.8-37.3-34.8
            C48.9,198.6,57.8,191,51,171.3z;
            M37.5,186c-12.1-10.5-11.8-32.3-7.2-46.7c4.8-15,13.1-17.8,30.1-36.7C91,68.8,83.5,56.7,103.4,45
            c22.2-13.1,51.1-9.5,69.6-1.6c18.1,7.8,15.7,15.3,43.3,33.2c28.8,18.8,37.2,14.3,46.7,27.9c15.6,22.3,6.4,53.3,4.4,60.2
            c-3.3,11.2-7.1,23.9-18.5,32c-16.3,11.5-29.5,0.7-48.6,11c-16.2,8.7-12.6,19.7-28.2,33.2c-22.7,19.7-63.8,25.7-79.9,9.7
            c-15.2-15.1,0.3-41.7-16.6-54.9C63,186,49.7,196.7,37.5,186z	" />
        </path>
    </svg>
</div>

<section class="offer-heading">
<div class="container">
        <div class="row">
            <div class="col text-center">
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
</section>


<section class="offer-boxes ">
<?php
    $offer_childs = get_posts(
        [
            'post_type'        => 'page',
            'post_parent'      => $post_id,
            'orderby'          => 'menu_order',
            'order'            => 'ASC',
            'numberposts'      => -1,
            'suppress_filters' => false,
        ]
    );

    if ( $offer_childs ) {
        foreach ( $offer_childs as $key => $item ) {

            $post_link        = get_permalink( $item->ID );
            $post_title       = apply_filters( 'the_title', $item->post_title );
            $post_description = get_field( 'description', $item->ID );
            $post_button      = get_field( 'button', $item->ID );
            $post_button      = strlen( $post_button ) > 0 ? $post_button : $post_title;

            if ( false !== strpos( $item->post_name, 'strategy' ) || false !== strpos( $item->post_name, 'strategia' ) ) {
                $icon_file = 'strategy-tab.svg';
            } elseif ( false !== strpos( $item->post_name, 'community' ) ) {
                $icon_file = 'socialmedia-tab.svg';
            } elseif ( false !== strpos( $item->post_name, 'branding' ) ) {
                $icon_file = 'branding-tab.svg';
            } else {
                $icon_file = 'webdesign-tab.svg';
            }

            $item_childs = get_posts(
                [
                    'post_type'        => 'page',
                    'post_parent'      => $item->ID,
                    'orderby'          => 'menu_order',
                    'order'            => 'ASC',
                    'numberposts'      => -1,
                    'suppress_filters' => false,
                ]
            );
            ?>
            <div class="offer-box">
                <h2><?php echo $post_title; ?></h2>
                <ul>
            <?php
                if ( $item_childs ) {
                    foreach ( $item_childs as $child ) {
                        $child_title = apply_filters( 'the_title', $child->post_title );
                        $child_link  = get_permalink( $child->ID );
            ?>
                <li class="m-2"><?php echo $child_title; ?></li>
            <?php
                    }
                }
            ?>
                </ul>
                <a class="cards-fluid-button-wrapper" href="<?php echo $post_link; ?>">
                    <svg class="liquid-button__blog-item" data-text="<?php echo $post_button; ?>" data-force-factor="0.1"
                        data-layer-1-viscosity="0.3" data-layer-2-viscosity="0.4" data-layer-1-mouse-force="300"
                        data-layer-2-mouse-force="400" data-layer-1-force-limit="1" data-layer-2-force-limit="2"
                        data-color1="#0131FF" data-color2="#0131FF" data-color3="#2A62F4" data-width="280"></svg>
                </a>
                <img src="<?php echo $url_template_dir; ?>/assets/img/<?php echo $icon_file; ?>" alt="<?php echo $post_title; ?> logo">
                <div class="offer-icon-blob">
                    <svg xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 310 350">
                        <path
                            d="M156.4,339.5c31.8-2.5,59.4-26.8,80.2-48.5c28.3-29.5,40.5-47,56.1-85.1c14-34.3,20.7-75.6,2.3-111  c-18.1-34.8-55.7-58-90.4-72.3c-11.7-4.8-24.1-8.8-36.8-11.5l-0.9-0.9l-0.6,0.6c-27.7-5.8-56.6-6-82.4,3c-38.8,13.6-64,48.8-66.8,90.3c-3,43.9,17.8,88.3,33.7,128.8c5.3,13.5,10.4,27.1,14.9,40.9C77.5,309.9,111,343,156.4,339.5z" />
                    </svg>
                </div>
            </div>
            <?php
        }
    }
?>
</section>

<?php
    get_footer();
