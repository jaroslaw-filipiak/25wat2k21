<?php
    /**
     *  Partial PROSSPECT
     *
     *  @package    25wat
     */

    get_header();

    $url_main         = get_bloginfo( 'url' );
    $url_template_dir = get_template_directory_uri();

    $page            = get_page_by_path( 'kontakt' );
    $page_contact_id = $page ? $page->ID : 0;

    if ( 0 === $page_contact_id ) {
        echo 'brak danych kontaktowych';
        exit();
    }

    $file_name = get_field( 'folder_name', $page_contact_id );
    $file      = get_field( 'folder_file', $page_contact_id );
    $file_url  = $file ? $file['url'] : '?';
    $file_type = $file ? $file['subtype'] : '?';
    $file_size = $file ? $file['filesize'] : 0;
    $file_mb   = round( $file_size / ( 1024 * 1024 ), 2 );
    $file_mb   = $file_mb > 0 ? $file_mb : round( $file_size / ( 1024 * 1024 ), 4 );
?>
<p class="prosspect-first-txt"><?php _e( 'Pobierz prospekt informacyjny lub skontaktuj się z nami bezpośrednio', '25wat' ); ?>
</p>

<div class="files" style="justify-content: flex-start;">
    <div class="files-list" style="width: 100%;">
        <div class="file-prosspect">
            <a href="<?php echo $file_url; ?>" target="_blank">
                <h5 class="prosspect-filename"><?php echo $file_name; ?></h5>
                <small><?php echo $file_type; ?>, <?php echo $file_mb; ?> MB</small>
            </a>
        </div>
    </div>
</div>

<div class="person d-flex align-items-center">
    <div class="avatar">
        <img src="<?php echo get_field( 'person_photo', $page_contact_id ); ?>" alt="Contact person photo" class="img-fluid">
    </div>

    <div class="person-info ml-3">
        <h5><?php echo get_field( 'person_name', $page_contact_id ); ?></h5>
        <p><?php echo get_field( 'person_title', $page_contact_id ); ?></p>
        <p class="phone"><a href="tel:<?php echo get_field( 'person_phone', $page_contact_id ); ?>" class="font-white"><?php echo get_field( 'person_phone', $page_contact_id ); ?></a></p>
        <p class="email"><a href="mailto:<?php echo get_field( 'person_email', $page_contact_id ); ?>"><?php echo get_field( 'person_email', $page_contact_id ); ?></a></p>
    </div>
</div>