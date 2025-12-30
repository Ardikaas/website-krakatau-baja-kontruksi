// resources/js/owl.js
import $ from "jquery";
window.$ = window.jQuery = $;
import "owl.carousel";

$(document).ready(function () {
    // Banner Carousel
    if ($(".banner-carousel").length && $.fn.owlCarousel) {
        $(".banner-carousel").owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            dots: false,
            animateOut: "fadeOut",
            animateIn: "fadeIn",
            smartSpeed: 1000,
            autoplay: true,
            navText: ["&#10094;", "&#10095;"],
            responsive: {
                0: { items: 1 },
                600: { items: 1 },
                800: { items: 1 },
                1024: { items: 1 },
            },
        });
    }

    // Three Item Carousel
    if ($(".three-item-carousel").length && $.fn.owlCarousel) {
        $(".three-item-carousel").owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverPause: true,
            smartSpeed: 500,
            navText: ["&#10094;", "&#10095;"],
            responsive: {
                0: { items: 1 },
                768: { items: 2 },
                992: { items: 3 },
            },
        });
    }
});
if ($(".single-item-carousel").length) {
    $(".single-item-carousel").owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        smartSpeed: 500,
        autoplay: 1000,
        navText: [
            '<span class="flaticon-right"></span>',
            '<span class="flaticon-right"></span>',
        ],
        responsive: {
            0: {
                items: 1,
            },
            480: {
                items: 1,
            },
            600: {
                items: 1,
            },
            800: {
                items: 1,
            },
            1200: {
                items: 1,
            },
        },
    });
}

// two-item-carousel
if ($(".two-item-carousel").length) {
    $(".two-item-carousel").owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        smartSpeed: 500,
        autoplay: 1000,
        navText: [
            '<span class="flaticon-right"></span>',
            '<span class="flaticon-right"></span>',
        ],
        responsive: {
            0: {
                items: 1,
            },
            480: {
                items: 1,
            },
            600: {
                items: 1,
            },
            800: {
                items: 1,
            },
            1200: {
                items: 2,
            },
        },
    });
}

// four-item-carousel
if ($(".four-item-carousel").length) {
    $(".four-item-carousel").owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        smartSpeed: 500,
        autoplay: 1000,
        navText: [
            '<span class="flaticon-right"></span>',
            '<span class="flaticon-right"></span>',
        ],
        responsive: {
            0: {
                items: 1,
            },
            480: {
                items: 1,
            },
            600: {
                items: 2,
            },
            800: {
                items: 3,
            },
            1200: {
                items: 4,
            },
        },
    });
}

// five-item-carousel
if ($(".five-item-carousel").length) {
    $(".five-item-carousel").owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        smartSpeed: 500,
        autoplay: 1000,
        navText: [
            '<span class="fal fa-angle-left"></span>',
            '<span class="fal fa-angle-right"></span>',
        ],
        responsive: {
            0: {
                items: 1,
            },
            480: {
                items: 2,
            },
            600: {
                items: 3,
            },
            800: {
                items: 4,
            },
            1200: {
                items: 5,
            },
        },
    });
}

// six-item-carousel
if ($(".six-item-carousel").length) {
    $(".six-item-carousel").owlCarousel({
        loop: true,
        margin: 100,
        nav: true,
        smartSpeed: 500,
        autoplay: 1000,
        navText: [
            '<span class="fal fa-angle-left"></span>',
            '<span class="fal fa-angle-right"></span>',
        ],
        responsive: {
            0: {
                items: 1,
            },
            480: {
                items: 2,
            },
            600: {
                items: 3,
            },
            800: {
                items: 4,
            },
            1200: {
                items: 6,
            },
        },
    });
}

// tab-btn-carousel
if ($(".tab-btn-carousel").length) {
    $(".tab-btn-carousel").owlCarousel({
        loop: false,
        margin: 0,
        nav: true,
        smartSpeed: 500,
        autoplay: 1000,
        navText: [
            '<span class="flaticon-next"></span>',
            '<span class="flaticon-next"></span>',
        ],
        responsive: {
            0: {
                items: 1,
            },
            480: {
                items: 1,
            },
            600: {
                items: 2,
            },
            800: {
                items: 3,
            },
            1200: {
                items: 4,
            },
        },
    });
}

// tab-carousel
if ($(".tab-carousel").length) {
    $(".tab-carousel").owlCarousel({
        loop: false,
        margin: 30,
        nav: true,
        smartSpeed: 500,
        autoplay: 1000,
        navText: [
            '<span class="flaticon-right"></span>',
            '<span class="flaticon-right"></span>',
        ],
        responsive: {
            0: {
                items: 1,
            },
            480: {
                items: 1,
            },
            600: {
                items: 2,
            },
            800: {
                items: 2,
            },
            1200: {
                items: 3,
            },
        },
    });
}
