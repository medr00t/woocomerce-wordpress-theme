<?php

// Enqueue styles and scripts
function load_stylesheets()
{
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/node_modules/bootstrap/dist/css/bootstrap.min.css');
    wp_enqueue_style('stylesheet', get_template_directory_uri() . '/style.css', array('bootstrap'), '1.0', 'all');
}

function load_javascript()
{
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.3.0', true);
    wp_enqueue_script('custom', get_template_directory_uri() . '/app.js', array('bootstrap'), '1.0', true);
}

add_action('wp_enqueue_scripts', 'load_stylesheets');
add_action('wp_enqueue_scripts', 'load_javascript');

// Register menus
function register_my_menus()
{
    register_nav_menus(
        array(
            'primary-menu' => __('Primary Menu'),
        )
    );
}
add_action('init', 'register_my_menus');

// Create theme pages
function create_theme_pages()
{
    // Delete all existing pages
    $existing_pages = get_pages();
    foreach ($existing_pages as $page) {
        wp_delete_post($page->ID, true);
    }

    // Define your page data
    $pages = array(
        array(
            'post_title'   => 'Home',
            'post_content' => get_front_page_content(),
            'post_status'  => 'publish',
            'post_type'    => 'page',
        ),
        array(
            'post_title'   => 'Blog',
            'post_content' => get_archive_template_content(),
            'post_status'  => 'publish',
            'post_type'    => 'page',
        ),
        array(
            'post_title'   => 'Contact',
            'post_content' => get_part_template_contact(),
            'post_status'  => 'publish',
            'post_type'    => 'page',
        ),
    );

    // Check if the "Home" page exists
    $home_query = new WP_Query(array(
        'post_type'      => 'page',
        'post_title'     => 'Home',
        'posts_per_page' => 1,
    ));

    if ($home_query->have_posts()) {
        // If the "Home" page exists, set it as the front page
        $home_query->the_post();
        update_option('page_on_front', get_the_ID());
        update_option('show_on_front', 'page');
        wp_reset_postdata();

        // Set the "Blog" page as the posts page only if the "Home" page is found
        $blog_query = new WP_Query(array(
            'post_type'      => 'page',
            'post_title'     => 'Blog',
            'posts_per_page' => 1,
        ));

        if ($blog_query->have_posts()) {
            // If the "Blog" page exists, set it as the posts page
            $blog_query->the_post();
            update_option('page_for_posts', get_the_ID());
            wp_reset_postdata();
        } else {

            $blog_page_id = wp_insert_post(array(
                'post_title'   => 'Blog',
                'post_content' => '',
                'post_status'  => 'publish',
                'post_type'    => 'page',
            ));

            // Set the "Blog" page as the posts page
            if ($blog_page_id > 0) {
                update_option('page_for_posts', $blog_page_id);
            }
        }
    } else {
        // If the "Home" page does not exist, create it
        foreach ($pages as $page_data) {
            $page_id = wp_insert_post($page_data);
            // Set the "Home" page as the front page
            if ($page_data['post_title'] === 'Home' && isset($page_id) && $page_id > 0) {
                update_option('page_on_front', $page_id);
                update_option('show_on_front', 'page');
            }
        }
    }

    create_theme_menu();
}


function get_front_page_content()
{
    ob_start();
    include 'front-page.php';
    return ob_get_clean();
}
function get_archive_template_content()
{
    ob_start();
    include 'archive.php';
    return ob_get_clean();
}
function get_part_template_contact()
{
    ob_start();
    include 'inc/section-contact.php';
    return ob_get_clean();
}

// add_action('after_switch_theme', 'create_theme_pages');

require_once get_template_directory() . '/inc/class-bootstrap-navwalker.php';
require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/images-sizes.php';
function create_theme_menu()
{
    // Deleting all existing menus if they exist when the theme is installed 
    $menus = get_terms('nav_menu', array('hide_empty' => false));

    if (!empty($menus) && !is_wp_error($menus)) {
        foreach ($menus as $menu) {
            wp_delete_term($menu->term_id, 'nav_menu');
        }
    }

    // Create the menu
    $menu_name = 'my theme';
    $existing_menu = wp_get_nav_menu_object($menu_name);

    if (!$existing_menu) {
        // Create the menu
        $menu_id = wp_create_nav_menu($menu_name);

        // Set the created menu as the primary menu
        $locations = get_theme_mod('nav_menu_locations');
        $locations['primary-menu'] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);

        // Display the menu with the custom walker
        wp_nav_menu(array(
            'theme_location' => 'primary-menu',
            'walker' => new bootstrap_5_wp_nav_menu_walker(),
            'depth' => 1,  // Set depth to 1 to remove submenus
        ));


        // Add menu items
        $menu_items = array(
            'Home'    => esc_url(home_url('/')),
            'Blogs'   => esc_url(get_permalink(get_page_by_title('Blog'))),
            'Contact' => esc_url(get_permalink(get_page_by_title('Contact'))),
        );

        // Add menu items to the created menu
        if (!is_wp_error($menu_id)) {
            foreach ($menu_items as $menu_item_title => $menu_item_url) {
                if ($menu_item_title === 'Contact') {
                    $contact_page = get_page_by_title('Contact');
                    $menu_item_url = get_permalink($contact_page->ID);
                }

                // Update menu item
                wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-title' => $menu_item_title,
                    'menu-item-url'   => $menu_item_url,
                    'menu-item-status' => 'publish',
                ));
            }
        }
    }
}



// recommend plugins `Elementor `
// Include the TGM Plugin Activation class

add_action('tgmpa_register', 'my_theme_register_required_plugins');

function my_theme_register_required_plugins() {
    $plugins = array(
        array(
            'name'               => 'Elementor',
            'slug'               => 'elementor',
            'required'           => false, 
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://wordpress.org/plugins/elementor/', 
        ),
    );

    $config = array(
        'id'           => 'my-theme-tgmpa',
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins',
        'parent_slug'  => 'themes.php',
        'capability'   => 'edit_theme_options',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false, // Users have to manually install the recommended plugins ! else set true ... 
        'message'      => '',
    );

    tgmpa($plugins, $config);
}


require_once get_template_directory() . '/lib/TGM-Plugin-Activation-develop/class-tgm-plugin-activation.php';


wp_cache_flush();
