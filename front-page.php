<?php get_header() ?>
<div class="container">

    <!--  the first section  -->
    <section class="section-1">
        <div class="bootstrap-section">
            <?php
            $section_1_text = get_theme_mod('section_1_text', 'Default Text for Section 1');
            $section_1_image_url = esc_url(get_theme_mod('section_1_image', get_template_directory_uri() . '/assets/images/section1.jpg'));
            $section_1_image_id = attachment_url_to_postid($section_1_image_url);

            //text 1.0
            echo '<p>' . esc_html($section_1_text) . '</p>';

            //image 1.0
            if ($section_1_image_id) {
                // Retrieve the custom image size URL
                $custom_image_url = wp_get_attachment_image_url($section_1_image_id, 'section1-1');

                // Output the image with the custom size
                echo '<img src="' . esc_url($custom_image_url) . '" alt="Section 1 Image">';
            } else {
                // Output a fallback image if the custom image is not available
                echo '<img src="' . esc_url($section_1_image_url) . '" alt="Section 1 Image">';
            }
            ?>
        </div>
    </section>
            


</div>

<?php get_footer() ?>