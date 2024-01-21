<?php get_header() ?>
<div class="container">

    <!--  the first section  -->
    <section class="section-1 ">
    <div class="bootstrap-section">
            <p><?php echo esc_html(get_theme_mod('bootstrap_text', 'Default Text')); ?></p>

            <?php
            $image_url = esc_url(get_theme_mod('bootstrap_image', get_template_directory_uri() . '/assets/images/pexels-lisa-fotios-1092644.jpg'));
            $image_id = attachment_url_to_postid($image_url);

            // Check if the image ID is valid
            if ($image_id) {
                // Retrieve the custom image size URL
                $custom_image_url = wp_get_attachment_image_url($image_id, 'section1-1');

                // Output the image with the custom size
                echo '<img src="' . esc_url($custom_image_url) . '">';
            } else {
                // Output a fallback image if the custom image is not available
                echo '<img src="' . esc_url($image_url) . '"';
            }
            ?>
        </div>
    </section>

</div>

<?php get_footer() ?>