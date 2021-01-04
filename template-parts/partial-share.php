<?php
    /**
     *  Partial SHARE
     *
     *  @package    25wat
     */

    $url_main         = get_bloginfo( 'url' );
    $url_template_dir = get_template_directory_uri();

    $url_facebook  = 'https://www.facebook.com/sharer?u=' . get_the_permalink() . '&t=' . get_the_title();
    $url_instagram = '';
?>
<div class="single-social-share m-0 p-0">
    <p class="m-0 p-0 mb-3"><?php _e( 'Podziel się', '25wat' ); ?> </p>
    <a class="social-item" href="<?php echo $url_facebook; ?>" target="_blank" rel="noopener noreferrer"><img
            src="<?php echo $url_template_dir; ?>/assets/img/fb-dark.svg" alt="Facebook icon"></a>
    <a class="social-item" href="<?php echo $url_instagram; ?>" target="_blank" rel="noopener noreferrer"><img
            src="<?php echo $url_template_dir; ?>/assets/img/insta-dark.svg" alt="Instagram icon"> </a>
</div>