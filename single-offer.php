<?php
    /**
     *  Template Name: 25wat - offer, single
     *
     *  @package    25wat
     */

    get_header();

    $url_main         = get_bloginfo( 'url' );
    $url_template_dir = get_template_directory_uri();

    $post_id   = get_the_ID();
    $parent_id = wp_get_post_parent_id( $post_id );

    $post_title       = get_the_title();
    $post_link        = get_permalink( $post_id );
    $post_description = get_field( 'description', $post_id );
    $post_button      = get_field( 'button', $post_id );
    $items            = get_field( 'items', $post_id );

    $childs = get_posts(
        array(
            'post_type'        => 'page',
            'post_parent'      => $post_id,
            'orderby'          => 'menu_order',
            'order'            => 'ASC',
            'numberposts'      => -1,
            'suppress_filters' => false,
        )
    );

    // if is last item then last level .
    if ( ! $childs ) {
        $childs = get_posts(
            array(
                'post_type'        => 'page',
                'post_parent'      => $parent_id,
                'orderby'          => 'menu_order',
                'order'            => 'ASC',
                'numberposts'      => -1,
                'suppress_filters' => false,
            )
        );
    }
    ?>

<div class="container info-header">
    <div class="row">
        <div class="col-12 col-md-7 pb-0 pb-lg-5 offer-page-heading">
            <div>
                <h2 class="mb-0"><?php _e( 'Offer', '25wat' ); ?></h2>
                <h1 class="mt-3 mb-3"><?php echo $post_title; ?></h1>
            </div>
            <p  class="font-500">
                <?php echo $post_description; ?>
            </p>
        </div>

        <div class="col-12 col-md-5 offer-right ">
            <div class="d-flex align-items-center">
                <ul class="offer-list">
                    <?php
                    if ( $childs ) {
                        foreach ( $childs as $child ) {
                            $child_title = apply_filters( 'the_title', $child->post_title );
                            $child_link  = get_permalink( $child->ID );
                            ?>
                        <li class="m-2"><a href="<?php echo $child_link; ?>"><?php echo $child_title; ?></a></li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>

<?php
    $tooltip_parts = false;
if ( $tooltip_parts ) {

    ?>
        <div class="row">
        <?php
        if ( $items ) {
            foreach ( $items as $key => $item ) {
                $image = false !== $item['background_image'] ? $item['background_image'] : $url_template_dir . '/assets/img/placeholder.jpg';

                $image_id  = attachment_url_to_postid( $image );
                $image_alt = $image_id ? get_post_meta( $image_id, '_wp_attachment_image_alt', true ) : __( 'Offer placeholder' );

                $type   = $item['type_content_template'];
                $title  = $item['title'];
                $text   = $item['description'];
                $anchor = sanitize_title( $key );

                if ( 'text_tooltip' === $type ) {
                    ?>
                    <a name="<?php echo $anchor; ?>"></a>
                    <div class="col-12 position-relative">
                        <img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>" class="img-fluid">

                    <?php if ( strlen( $text ) > 0 ) { ?>
                        <div class="position-absolute offer-tooltip " data-aos="fade-up" style="left: -20px; top: 25%;">
                            <?php echo $text; ?>
                        </div>
                    <?php } ?>
                    </div>
                    <?php
                }

                if ( 'text_bottom' === $type ) {
                    ?>
                    <a name="<?php echo $anchor; ?>"></a>
                    <div class="col-12 position-relative">
                        <img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>" class="img-fluid">

                    <?php if ( strlen( $text ) > 0 ) { ?>
                            <div class="position-absolute offer-txt-box dark-overlay">
                                <span class="acf-field-1">
                                    <?php echo $text; ?>
                                </span>
                            </div>
                        <?php } ?>
                    </div>
                    <?php
                }

                if ( 'text_bottom_right' === $type ) {
                    ?>
                    <a name="<?php echo $anchor; ?>"></a>
                    <div class="col-12 position-relative">
                        <img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>" class="img-fluid">

                    <?php if ( strlen( $text ) > 0 ) { ?>
                            <div class="position-absolute offer-txt-box">
                                <div class="d-none d-lg-block" style="color: #fff; max-width: 500px; text-align:right; align-self: flex-end; position: absolute; right: 50px; bottom: 50px;">
                                    <?php echo $text; ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <?php
                }
            }
        }
        ?>
        </div>
    <?php
}
?>

</div>

<div class="container offer-page-content">
    <div class="row">
        <div class="col">
            <div class="content text-left">
            <?php
                // for continuously images .
                remove_filter( 'the_content', 'wpautop' );
                the_content();
            ?>
            </div>
        </div>
    </div>
</div>

<?php
    get_footer();
