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
