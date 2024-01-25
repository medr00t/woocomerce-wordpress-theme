<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
    <script src="<?php bloginfo('template_directory') ?>/assets/js/header.js" type="text/javascript"></script>

    
</head>
<body <?php body_class('test') ?>>
    
    <header class="">
        <div class="container">
            <div class="row align-items-center header">
                <div class="col-auto">
                    <img src="<?php bloginfo('template_directory') ?>/assets/images/woocommerce-logo.png" alt="logo" class="img-fluid logo">
                </div>
                <div class="col text-center navbar-centred">
                    <nav class="navbar navbar-expand-lg navbar-light bg-white">
                        <button class="navbar-toggler" type="button" onclick="toggleMobileNavbar()">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'header-menu',
                                'menu_class' => 'navbar-nav mx-auto nav-list',
                                'container' => false,
                                'walker' => new bootstrap_5_wp_nav_menu_walker(),
                            ));
                            ?>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- Mobile Navbar Modal -->
    <div class="modal fade" id="mobileNavbar" tabindex="-1" role="dialog" aria-labelledby="mobileNavbarLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="toggleMobileNavbar()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="navbarNavMob">
                    <!-- Include your mobile navigation content here -->
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'header-menu',
                        'menu_class' => 'navbar-nav mx-auto nav-list',
                        'container' => false,
                        'walker' => new bootstrap_5_wp_nav_menu_walker(),
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>


