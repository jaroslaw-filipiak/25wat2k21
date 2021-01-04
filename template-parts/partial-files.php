<?php
    /**
     *  Partial FILES
     *
     *  @package    25wat
     */

    get_header();

    $url_main         = get_bloginfo( 'url' );
    $url_template_dir = get_template_directory_uri();
?>

<section class="files">
    <div class="files-heading">
        <h3><?php _e( 'Pliki', '25wat' ); ?></h3>
        <p><?php _e( 'Do pobrania', '25wat' ); ?></p>
    </div>
    <div class="files-list">
        <?php
            $args = [
                'post_type'   => 'downloads',
                'orderby'     => 'menu_order',
                'order'       => 'ASC',
                'numberposts' => -1,
            ];
            $data = get_posts( $args );
            if ( $data ) {
                foreach ( $data as $key => $item ) {

                    $file_name = apply_filters( 'get_title', $item->post_title );
                    $file      = get_field( 'file', $item->ID );
                    $file_url  = $file ? $file['url'] : '?';
                    $file_type = $file ? $file['subtype'] : '?';
                    $file_size = $file ? $file['filesize'] : 0;
                    $file_mb   = round( $file_size / ( 1024 * 1024 ), 2 );
                    $file_mb   = $file_mb > 0 ? $file_mb : round( $file_size / ( 1024 * 1024 ), 4 );

                    ?>
                        <div class="file">
                            <a href="<?php echo $file_url; ?>" target="_blank">
                                <h5><?php echo $file_name; ?></h5>
                                <small><?php echo $file_type; ?>, <?php echo $file_mb; ?> MB</small>
                            </a>
                        </div>
                    <?php
                }
            } else {
                echo '====== Brak plików ======';
            }
        ?>
    </div>
</section>