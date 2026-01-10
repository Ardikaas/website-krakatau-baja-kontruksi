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
        dots: false,
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

// History
if ($(".history-carousel").length) {
    const $carousel = $(".history-carousel");
    let autoplaySpeed = 4000;

    $carousel.owlCarousel({
        items: 1,
        loop: false,
        margin: 30,
        nav: false,
        dots: false,
        smartSpeed: 600,
        autoplay: true,
        autoplayTimeout: autoplaySpeed,
        autoplayHoverPause: true,
        responsive: {
            0: { items: 1 },
            600: { items: 1 },
            1200: { items: 1 },
        },
    });

    /* ===============================
       NAV TAHUN → CAROUSEL
    ================================ */
    $(".history-years li").on("click", function () {
        let index = $(this).data("index");

        $carousel.trigger("to.owl.carousel", [index, 600]);

        $(".history-years li").removeClass("active");
        $(this).addClass("active");

        // reset autoplay supaya smooth
        $carousel.trigger("stop.owl.autoplay");
        $carousel.trigger("play.owl.autoplay", [autoplaySpeed]);
    });

    /* ===============================
       CAROUSEL → NAV TAHUN
    ================================ */
    $carousel.on("changed.owl.carousel", function (e) {
        let index = e.item.index;

        $(".history-years li").removeClass("active");
        $(".history-years li").eq(index).addClass("active");
    });
}
