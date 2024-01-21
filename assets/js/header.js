
function toggleMobileNavbar() {
    jQuery('#mobileNavbar').modal('toggle');
}

jQuery(document).ready(function ($) {
    $('.navbar-toggler').on('click', function () {
        toggleMobileNavbar();
    });
});
document.addEventListener('DOMContentLoaded', function () {
    // Get the current page URL without the protocol
    var currentUrlWithoutProtocol = window.location.pathname;

    // Find all menu items
    var menuItems = document.querySelectorAll('.nav-item a');

    // Iterate through menu items
    menuItems.forEach(function (item) {
        var menuItemUrlWithoutProtocol = new URL(item.href).pathname;

        if (currentUrlWithoutProtocol.indexOf(menuItemUrlWithoutProtocol) !== -1) {
            item.classList.add('active');

        }
        if (currentUrlWithoutProtocol === menuItemUrlWithoutProtocol) {
            item.classList.add('active');
        } else {
            item.classList.remove('active');
        }
    });
});


document.addEventListener('DOMContentLoaded', function () {
    // large devices bug fixed ( sub items )
    var navbarNav = document.getElementById('navbarNav');
    var topLevelLisOutsideUl = Array.from(navbarNav.children).filter(function (element) {
        return element.tagName === 'LI' && !element.closest('ul');
    });
    var mainUl = navbarNav.querySelector('ul');
    topLevelLisOutsideUl.forEach(function (li) {
        mainUl.appendChild(li);
    });

    // mobile bug fixed 
    var navbarNavMob = document.querySelector('.modal-body');
    var topLevelLisOutsideUlMob = Array.from(navbarNavMob.children).filter(function (element) {
        return element.tagName === 'LI' && !element.closest('ul');
    });
    var mainUlMob = navbarNavMob.querySelector('ul');
    topLevelLisOutsideUlMob.forEach(function (li) {
        mainUlMob.appendChild(li);
    });

});


// 
// 
// 

