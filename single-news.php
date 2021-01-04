<?php
    /**
     *  Template Name: 25wat - news, single
     *
     *  @package    25wat
     */

    get_header();

    $url_main         = get_bloginfo( 'url' );
    $url_template_dir = get_template_directory_uri();
    $slug             = w25_get_current_slug();
    $url_full         = w25_get_current_url();
    $site_comments    = w25_get_option( 'disqus_site' );

    $image      = get_the_post_thumbnail_url();
    $image_hero = $image ? $image : $url_template_dir . '/assets/img/placeholder.jpg';
?>

<section class="single-content">
    <div class="container">
        <div class="row">
            <div class="col text-center" style="background: #fff;">
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </div>
        </div>
    </div>

    <div class="container-fluid border single-cover-photo" style="background-image: url(<?php echo $image_hero; ?>)">
    </div>

    <div class="container single-content">
        <div class="row">
            <div class="col">
                <div class="content text-left">
                <?php 
                    while ( have_posts() ) {
                        the_post();
                        the_content();
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="comments">
    <?php
    if ( strlen( $site_comments ) > 0 ) {
        ?>
        <div id="disqus_thread"></div>
        <script>
        var disqus_config = function () {
        this.page.url = '<?php echo $url_full; ?>';
        this.page.identifier = '<?php the_title(); ?>';
        };
        (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://<?php echo $site_comments; ?>.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
        })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
        <?php
    }
    ?>
</section>

<section class="single-content-more mt-5">
    <?php
        $args = [
            'post_type'        => 'news',
            'orderby'          => 'date',
            'order'            => 'DESC',
            'numberposts'      => 3,
            'suppress_filters' => false,
            'exclude'          => array(get_the_id()),
        ];
        $data = get_posts( $args );
        if ( $data ) {
    ?>
    <div class="container">
        <div class="row">
            <div class="col-10 offset-1">
                <h2 class="text-center text-lg-left font-500"><?php _e( 'Read also', '25wat' ); ?></h2>
            </div>
        </div>
        <div class="row d-flex align-items-center justify-content-center pt-5 pb-5">
            <?php
                foreach ( $data as $key => $item ) {
                    $post_title   = apply_filters( 'the_title', $item->post_title );
                    $post_content = apply_filters( 'the_content', $item->post_content );
                    $post_excerpt = w25_excerpt_text( $post_content );
                    $post_link    = get_permalink( $item->ID );
                    $post_image   = w25_seo_image_url( get_the_post_thumbnail_url( $item->ID ), '400x150' );

                    ?>
                        <div class='blog-item'>
                            <div class='blog-item-avatar' style="background-image: url(<?php echo $post_image; ?>)"></div>
                            <div class='blog-item-content'>
                                <h4><?php echo $post_title; ?></h4>
                                <?php echo $post_excerpt; ?>
                                <a class="pb-0 pr-3 mb--2 blog-item__button" href='<?php echo $post_link; ?>'><?php _e( 'Read more', '25wat' ); ?></a>
                            </div>
                        </div>
                    <?php
                }
            ?>
        </div>
    </div>
    <?php
        }
    ?>
</section>

<?php
    get_footer();
