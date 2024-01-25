<?php 
function add_text_and_image_controls($wp_customize, $section_id, $control_id) {
    // Add text setting
    $wp_customize->add_setting($control_id . '_text', array(
        'default'           => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Add text control
    $wp_customize->add_control($control_id . '_text', array(
        'label'    => __('Text ' . $control_id, 'mytheme'),
        'section'  => $section_id,
        'type'     => 'text',
    ));

    // Add image setting
    $wp_customize->add_setting($control_id . '_image', array(
        'default'           => get_template_directory_uri() . '/assets/images/home/' . $control_id . '.jpg',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Add image control
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, $control_id . '_image', array(
        'label'   => __('Image', 'mytheme'),
        'section' => $section_id,
    )));

    // Enqueue custom JavaScript
    wp_enqueue_script('customize-controls', get_template_directory_uri() . 'assets/js/customize-controls.js', array('customize-controls'), '', true);

    // Pass default image URL to JavaScript
    wp_localize_script('customize-controls', 'defaultImageURL_' . $control_id, get_template_directory_uri() . '/assets/images/home/' . $control_id . '.jpg');
}


function mytheme_customize_register($wp_customize) {
    // Main section for Bootstrap
    $wp_customize->add_section('homepage_section', array(
        'title'    => __('Home Page', 'mytheme'),
        'priority' => 10,
    ));

    // Add controls for Section 1
    add_text_and_image_controls($wp_customize, 'homepage_section', 'section_1_1');
    add_text_and_image_controls($wp_customize, 'homepage_section', 'section_1_2');
    add_text_and_image_controls($wp_customize, 'homepage_section', 'section_1_3');

    // Add controls for Section 2
    add_text_and_image_controls($wp_customize, 'homepage_section', 'section_2');
}

add_action('customize_register', 'mytheme_customize_register');

