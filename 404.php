<?php get_header(); ?>
<div class="error">
    <div class="container-floud">
        <div class="col-xs-12 ground-color text-center">
            <div class="container-error-404">
                <div class="clip">
                    <div class="shadow"><span class="digit thirdDigit"></span></div>
                </div>
                <div class="clip">
                    <div class="shadow"><span class="digit secondDigit"></span></div>
                </div>
                <div class="clip">
                    <div class="shadow"><span class="digit firstDigit"></span></div>
                </div>
                <div class="msg">OH!<span class="triangle"></span></div>
            </div>
            <h2 class="h1">Sorry! Page not found</h2>
        </div>
    </div>
</div>
<div class="container link-redirect">
    <a class="redirect-404 text-success" href="<?php echo esc_url(home_url('/')); ?>">Go Home</a>
</div>

<script src="<?php bloginfo('template_directory') ?>/assets/js/404.js"></script>

<?php get_footer(); ?>