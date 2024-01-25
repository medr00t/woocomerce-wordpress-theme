(function ($) {
    wp.customize('your_control_id_image', function (value) {
        // Set the default value if the image control is empty
        if ('' === value.get()) {
            value.set(defaultImageURL_your_control_id);
        }
    });
})(jQuery);
