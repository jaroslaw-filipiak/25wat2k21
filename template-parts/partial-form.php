<?php
    /**
     *  Partial FROM contact
     *
     *  @package    25wat
     */

    get_header();

    $url_main         = get_bloginfo( 'url' );
    $url_template_dir = get_template_directory_uri();
?>

<section class="contact image-bg" style="margin: 0;">
    <div class="contact-heading-and-person">
        <div class="cf-heading">
            <h1><?php _e( 'Kontakt', '25wat' ); ?></h1>
            <p><?php _e( 'Bezpośrednio lub poprzez formularz', '25wat' ); ?></p>
        </div>
        <div class="person">
            <?php
                $page_data = get_page_by_path( 'kontakt' );
            ?>
            <div class="avatar">
                <img src="<?php echo get_field( 'person_photo', $page_data->ID ); ?>" alt="Contact person photo" class="img-fluid">
            </div>

            <div class="person-info">
                <h5><?php echo get_field( 'person_name', $page_data->ID ); ?></h5>
                <p><?php echo get_field( 'person_title', $page_data->ID ); ?></p>
                <p class="phone"><a href="tel:<?php echo get_field( 'person_phone', $page_data->ID ); ?>" class="font-white"><?php echo get_field( 'person_phone', $page_data->ID ); ?></a></p>
                <p class="email"><a href="mailto:<?php echo get_field( 'person_email', $page_data->ID ); ?>"><?php echo get_field( 'person_email', $page_data->ID ); ?></a></p>
            </div>
        </div>
    </div>

    <div class="contact-form">
        <?php echo do_shortcode( get_field( 'form_shortcode', $page_data->ID ) ); ?>
        <div class="form-check rodo-accept">
            <label class="form-check-label d-flex align-items-flex-start " for="exampleCheck1">
                <div style="width: 35px;">
                    <span class="checkbox-container">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <span class="checkmark"></span>
                    </span>
                </div>
                <div class="font-white">
                    <p class="rodo noselect rodo-info">
                        <?php _e( 'Administratorem danych przekazanych za pośrednictwem formularza kontaktowego jest: 25wat SMART SOLUTIONS Spółka z ograniczoną odpowiedzialnością z siedzibą w Siedlcach (08-110) przy ul. 3 Maja 34. ', '25wat' ); ?>
                    </p>
                    <p class="rodo noselect rodo-info rodo__more" style="display: none;">
                        <?php _e( 'Przetwarzanie danych osobowych odbywać się będzie wyłącznie w celu odpowiedzi na wiadomość przesłaną w formularzu kontaktowym (podstawa przetwarzania danych to realizacja prawnie uzasadnionych interesów administratora danych w postaci komunikacji z użytkownikami strony internetowej). Przekazane dane osobowe przetwarzane będą nie dłużej, niż jest to konieczne do udzielenia odpowiedzi na otrzymaną wiadomość, a po tym czasie mogą być przetwarzane przez okres przedawnienia ewentualnych roszczeń. Podanie danych osobowych jest dobrowolne, ale konieczne celem udzielenia odpowiedzi na  trzymaną wiadomość. Osobom, które przekazały swoje dane osobowe za pośrednictwem formularza kontaktowego, przysługuje prawo żądania dostępu do swoich danych osobowych, ich sprostowania, usunięcia lub ograniczenia przetwarzania, a także prawo wniesienia sprzeciwu wobec przetwarzania, a ponadto prawo do przenoszenia swoich danych osobowych oraz wniesienia skargi do organu nadzorczego.', '25wat' ); ?>
                    </p>
                </div>
            </label>
            <span class="rodo__more-btn rodo__more-btn-more hvr-underline-from-left__dark-color"><?php _e( 'Więcej', '25wat' ); ?></span>
            <span class="rodo__more-btn rodo__more-btn-less hvr-underline-from-left__dark-color" style="display: none;"><?php _e( 'Mniej', '25wat' ); ?></span>
        </div>
    </div>
</section>
