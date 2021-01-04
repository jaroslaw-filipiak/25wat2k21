<?php
    /**
     *  Partial PROCESS STEPS
     *
     *  @package    25wat
     */

    get_header();

    $url_main         = get_bloginfo( 'url' );
    $url_template_dir = get_template_directory_uri();
?>
<div class="drag-slider mx-auto">

    <img class="drag-slider-handler drag-slider-handler-1 " src="<?php echo $url_template_dir; ?>/assets/img/etap-a.png"
        alt="Process step">

    <img class="drag-slider-handler drag-slider-handler-2 d-none"
        src="<?php echo $url_template_dir; ?>/assets/img/etap-b.png" alt="Process step">

    <img class="drag-slider-handler drag-slider-handler-3 d-none"
        src="<?php echo $url_template_dir; ?>/assets/img/etap-c.png" alt="Process step">

    <img class="drag-slider-handler drag-slider-handler-4 d-none"
        src="<?php echo $url_template_dir; ?>/assets/img/etap-d.png" alt="Process step">

    <div class="drag-slider-step drag-slider-step-1">

        <div class="countdown-position-absolute-wrapper">
            <div id="countdown__homepage">
                <div id="countdown-number__homepage"></div>
                <svg class="countdown countdown--process__item-1">
                    <circle r="18" cx="20" cy="20" class="circle-transparent step-svg step-for-item-1"></circle>
                </svg>
            </div>
        </div>

    </div>

    <div class="drag-slider-step drag-slider-step-2">

        <div class="countdown-position-absolute-wrapper">
            <div id="countdown__homepage">
                <div id="countdown-number__homepage"></div>
                <svg class="countdown countdown--process__item-2">
                    <circle r="18" cx="20" cy="20" class="circle-transparent step-svg step-for-item-2"></circle>
                </svg>
            </div>
        </div>

    </div>

    <div class="drag-slider-step drag-slider-step-3">

        <div class="countdown-position-absolute-wrapper">
            <div id="countdown__homepage">
                <div id="countdown-number__homepage"></div>
                <svg class="countdown countdown--process__item-3">
                    <circle r="18" cx="20" cy="20" class="circle-transparent step-svg step-for-item-3"></circle>
                </svg>
            </div>
        </div>

    </div>

    <div class="drag-slider-step drag-slider-step-4">

        <div class="countdown-position-absolute-wrapper">
            <div id="countdown__homepage">
                <div id="countdown-number__homepage"></div>
                <svg class="countdown countdown--process__item-4">
                    <circle r="18" cx="20" cy="20" class="circle-transparent step-svg step-for-item-4"></circle>
                </svg>
            </div>
        </div>

    </div>

    <!-- <div class="drag-area"></div> -->



</div>

<?php
    $args = [
        'post_type'   => 'process',
        'orderby'     => 'menu_order',
        'order'       => 'ASC',
        'numberposts' => -1,
    ];
    $data = get_posts( $args );
    if ( $data ) {
        $hide = '';
        foreach ( $data as $key => $item ) {
            $image = get_the_post_thumbnail_url( $item->ID );
            $image = $image ? $image : $url_template_dir . '/assets/img/placeholder.jpg';

            $title   = apply_filters( 'get_title', $item->post_title );
            $content = apply_filters( 'get_content', $item->post_content );
            ?>
<div class="step step-<?php echo ($key + 1); ?> mx-auto text-center <?php echo $hide; ?>" style="min-height: 240px;">
    <h4><?php echo $title; ?></h4>
    <p class="step--text-content">
        <?php echo $content; ?>
    </p>
</div>
            <?php
            $hide = 'd-none';
        }
    } else {
        echo '====== Brak kroków ======';
    }
?>