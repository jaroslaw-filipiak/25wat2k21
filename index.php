<?php
/**
 *  Template Name: 25wat -- default view (index)
 *
 *  @package    25wat
 */

get_header();

$post_id          = get_the_ID();
$cpt_type         = get_post_type();
$url_current      = w25_get_current_url();
$url_template_dir = get_template_directory_uri();

$image      = get_the_post_thumbnail_url();
$image_hero = $image ? $image : $url_template_dir . '/assets/img/placeholder.jpg';

/* template exception */
if ( 'company' === $cpt_type ) {
    get_template_part( 'single-company' );

} else {
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

            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="content text-left">
                            <h1 class="entry-title"><?php the_content(); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php
}

get_footer();
