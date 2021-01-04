<?php
/**
 * Global admin options (WP register_settings).
 *
 * @package    25wat
 */

/**
 * Helper - get option by simply function.
 *
 * @param string $option_name       Option to return.
 * @param string $default_value     Option default value.
 */
function w25_get_option( $option_name, $default_value = '' ) {
    $value = nl2br( W25_Admin_Options::get_option( $option_name ) );

    if ( strlen( $default_value ) > 0 ) {
        if ( ! strlen( $value ) > 0 ) {
            $value = $default_value;
        }
    }

    return $value;
}

/**
 * Custom theme global options (WP register_settings).
 */
class W25_Admin_Options {

    /**
     * Load for admin.
     */
    public static function load() {
        if ( is_admin() ) {
            add_action( 'admin_init', array( 'W25_Admin_Options', 'register_settings' ) );
        }
    }

    /**
     * Define option structure (variable and description)
     */
    public static function def_options_item() {
        $def_options = array();

        /* separator */
        $def_options[] = array(
            'desc' => __( 'Globalne', '25wat' ),
            'tag'  => '',
            'type' => 'header',
        );

        $def_options[] = array(
            'desc' => __( 'DISQUS, slug serwisu (brak ukrywa komentarze)', '25wat' ),
            'tag'  => 'disqus_site',
            'type' => 'input',
            'lang' => false,
        );
        $def_options[] = array(
            'desc' => __( 'Pozycja markera na mapie (lat, lng)', '25wat' ),
            'tag'  => 'map_marker_location',
            'type' => 'input',
            'lang' => false,
        );

        /* separator */
        $def_options[] = array(
            'desc' => __( 'Kontakt - dane adresowe', '25wat' ),
            'tag'  => '',
            'type' => 'header',
        );
        $def_options[] = array(
            'desc' => __( 'Firma - nazwa', '25wat' ),
            'tag'  => 'contact_company',
            'type' => 'input',
            'lang' => true,
        );
        
        /* separator */
        $def_options[] = array(
            'desc' => __( 'Stopka - elementy social (puste ukrywają ikonę)', '25wat' ),
            'tag'  => '',
            'type' => 'header',
        );

        $def_options[] = array(
            'desc' => 'Facebook (http://...)',
            'tag'  => 'social_facebook',
            'type' => 'input',
        );
        $def_options[] = array(
            'desc' => 'Behance (http://...)',
            'tag'  => 'social_behance',
            'type' => 'input',
        );
        $def_options[] = array(
            'desc' => 'Linkedin (http://...)',
            'tag'  => 'social_linkedin',
            'type' => 'input',
        );
        $def_options[] = array(
            'desc' => 'Instagram (http://...)',
            'tag'  => 'social_instagram',
            'type' => 'input',
        );

        return $def_options;
    }

    /**
     * Register WP options for theme.
     */
    public static function register_settings() {
        register_setting( 'admin_options', 'admin_options', array( 'W25_Admin_Options', 'sanitize_def_option' ) );
    }

    /**
     * Get and parse option for option_name.
     *
     * @param string $option_name    Option to return.
     */
    public static function get_option( $option_name ) {
        $mix_return = null;

        /* get option data */
        $options = get_option( 'admin_options' );
        if ( isset( $options[ $option_name ] ) ) {
            $mix_return = $options[ $option_name ];
        }

        return $mix_return;
    }

    /**
     * Sanitize options definition.
     *
     * @param string $options    Option to return.
     */
    public static function sanitize_def_option( $options ) {
        if ( $options ) {
            $def_options = self::def_options_item();
            foreach ( $def_options as $item ) {
                /* exclude 'separator' */
                if ( ! strlen( $item['tag'] ) > 0 ) {
                    continue;
                }

                /* sanitize data */
                $def_tag = $item['tag'];
                // ---
                if ( ! empty( $options[ $def_tag ] ) ) {
                    $options[ $def_tag ] = filter_var( $options[ $def_tag ], FILTER_SANITIZE_STRING );
                } else {
                    unset( $options[ $def_tag ] );
                }
            }
        }

        return $options;
    }

    /**
     * Show admin page (option list).
     * Result: echo HTML page.
     */
    public static function load_admin_options_page() {
        ?>
            <br>
            <div class="wrap" id="w25_qt">
                <form method="post" action="options.php">
                    <?php settings_fields( 'admin_options' ); ?>

                    <table class="form-table" class="w25_table_contact">
                        <?php
                        $def_options = self::def_options_item();
                        foreach ( $def_options as $item ) {
                            /* separator - show description only */
                            if ( $item['type'] == 'header' ) {
                                echo '<tr> <td></td> <td> <br> <b>' . $item['desc'] . '</b> </td></tr>';
                                continue;
                            }

                            /* tag - show & get value option */
                            $option_name  = $item['tag'];
                            $option_value = esc_attr( self::get_option( $option_name ) );
                            $option_class = isset( $item['lang'] ) && true === $item['lang'] ? 'i18n-multilingual' : '';

                            ?>
                                <tr valign="top">
                                    <th><?php echo $item['desc']; ?></th>
                                    <td>
                                        <?php
                                        if ( 'textarea' === $item['type'] ) {
                                            ?>
                                                <textarea name="admin_options[<?php echo $option_name; ?>]" class="<?php echo $option_class; ?>" rows="4" cols="78"><?php echo $option_value; ?></textarea>
                                            <?php
                                        } else {
                                            ?>
                                                <input type="text" name="admin_options[<?php echo $option_name; ?>]" class="w25_options_input_500 <?php echo $option_class; ?>" value="<?php echo $option_value; ?>">
                                            <?php
                                            }
                                        ?>
                                        <br>
                                    </td>
                                </tr>
                            <?php
                        }
                        ?>
                                <tr>
                                    <th></th>
                                    <td><?php /* _e( '(pozostawienie pustego pola adresu powoduje ukrycie ikony)', '25wat' ); */ ?></td>
                                </tr>
                    </table>
                    <?php submit_button(); ?>
                </form>
            </div>
        <?php 
    }
}
