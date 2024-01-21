<?php 
function mytheme_customize_register($wp_customize)
{
    // Create a custom section for Bootstrap
    $wp_customize->add_section('bootstrap_section', array(
        'title' => __('Home Page', 'mytheme'),
        'priority' => 10,
    ));

    // Add text setting
    $wp_customize->add_setting('bootstrap_text', array(
        'default' => 'Default Text',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Add text control
    $wp_customize->add_control('bootstrap_text', array(
        'label' => __('Text', 'mytheme'),
        'section' => 'bootstrap_section',
        'type' => 'text',
    ));

    // Add image setting
    $wp_customize->add_setting('bootstrap_image', array(
        'default' => get_template_directory_uri() . '/assets/images/pexels-lisa-fotios-1092644.jpg',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Add image control
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'bootstrap_image', array(
        'label' => __('Image', 'mytheme'),
        'section' => 'bootstrap_section',
    )));
}

add_action('customize_register', 'mytheme_customize_register');



