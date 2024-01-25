<?php get_header() ?>

<?php
$lorem_ipsum= 'Lorem ipsum dolor sit amet consectetur adipisicing elit.';
$section_1_1_text = get_theme_mod('section_1_1_text', $lorem_ipsum);
$section_1_1_image_url = esc_url(get_theme_mod('section_1_1_image', get_template_directory_uri() . '/assets/images/home/section_1_1.jpg'));
$section_1_1_image_id = attachment_url_to_postid($section_1_1_image_url);

$section_1_2_text = get_theme_mod('section_1_2_text',$lorem_ipsum);
$section_1_2_image_url = esc_url(get_theme_mod('section_1_2_image', get_template_directory_uri() . '/assets/images/home/section_1_2.jpg'));
$section_1_2_image_id = attachment_url_to_postid($section_1_2_image_url);

$section_1_3_text = get_theme_mod('section_1_3_text', $lorem_ipsum);
$section_1_3_image_url = esc_url(get_theme_mod('section_1_3_image', get_template_directory_uri() . '/assets/images/home/section_1_3.jpg'));
$section_1_3_image_id = attachment_url_to_postid($section_1_3_image_url);
?>

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner">
        <div class="carousel-item active">
            <?php if ($section_1_1_image_id) {
                $custom_image_url = wp_get_attachment_image_url($section_1_1_image_id, 'section1-1');
                echo '<img src="' . esc_url($custom_image_url) . '" class="d-block w-100" alt="Section 1.1 Image">';
            } else {
                echo '<img src="' . esc_url($section_1_1_image_url) . '" class="d-block w-100" alt="Section 1.1 Image">';
            } ?>

            <div class="carousel-caption d-none d-md-block">
                <h5><?php echo esc_html($section_1_1_text); ?></h5>
            </div>
        </div>

        <div class="carousel-item">
            <?php if ($section_1_2_image_id) {
                $custom_image_url = wp_get_attachment_image_url($section_1_2_image_id, 'section1-1');
                echo '<img src="' . esc_url($custom_image_url) . '" class="d-block w-100" alt="Section 1.2 Image">';
            } else {
                echo '<img src="' . esc_url($section_1_2_image_url) . '" class="d-block w-100" alt="Section 1.2 Image">';
            } ?>

            <div class="carousel-caption d-none d-md-block">
                <h5><?php echo esc_html($section_1_2_text); ?></h5>
            </div>
        </div>

        <div class="carousel-item">
            <?php if ($section_1_3_image_id) {
                $custom_image_url = wp_get_attachment_image_url($section_1_3_image_id, 'section1-1');
                echo '<img src="' . esc_url($custom_image_url) . '" class="d-block w-100" alt="Section 1.3 Image">';
            } else {
                echo '<img src="' . esc_url($section_1_3_image_url) . '" class="d-block w-100" alt="Section 1.3 Image">';
            } ?>

            <div class="carousel-caption d-none d-md-block">
                <h5><?php echo esc_html($section_1_3_text); ?></h5>
            </div>
        </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>







<?php get_footer() ?>