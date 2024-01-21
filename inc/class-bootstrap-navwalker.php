<?php
// Bootstrap 5 wp_nav_menu walker
class bootstrap_5_wp_nav_menu_walker extends Walker_Nav_menu
{
    private $current_item;
    private $is_current_item_active;

    function start_lvl(&$output, $depth = 0, $args = null)
    {
        // Do nothing to omit children
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $this->current_item = $item;
        $this->is_current_item_active = false;

        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $li_attributes = '';
        $class_names = $value = '';

        $classes = empty($item->classes) ? array() : (array)$item->classes;

        $classes[] = 'nav-item';
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

        $classes_array = (array) $item->classes;
        $active_class = ($item->current || in_array("current_page_parent", $classes_array, true) || in_array("current-post-ancestor", $classes_array, true)) ? '' : '';
        $this->is_current_item_active = $this->is_current_item_active || !empty($active_class);

        $nav_link_class = 'nav-link ';
        $attributes .= ($depth === 0) ? ' class="' . $nav_link_class . $active_class . '"' : ' class="' . $nav_link_class . '"';

        // Convert $args to object if it's an array
        if (is_array($args)) {
            $args = (object) $args;
        }

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

// Register a new menu
register_nav_menu('main-menu', 'Main menu');
