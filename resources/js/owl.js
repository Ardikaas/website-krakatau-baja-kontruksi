// Owl Carousel Initialization
// Using Owl Carousel 2 library

(function ($) {
    "use strict";

    $(document).ready(function () {
        if ($(".banner-carousel").length) {
            $(".banner-carousel").owlCarousel({
                loop: true,
                margin: 0,
                nav: true,
                dots: false,
                animateOut: "fadeOut",
                animateIn: "fadeIn",
                smartSpeed: 1000,
                autoplay: true,
                navText: ["<span>&lt;</span>", "<span>&gt;</span>"],
                responsive: {
                    0: {
                        items: 1,
                    },
                    600: {
                        items: 1,
                    },
                    800: {
                        items: 1,
                    },
                    1024: {
                        items: 1,
                    },
                },
            });
        }

        // Three Item Carousel (Service Section)
        if ($(".three-item-carousel").length) {
            $(".three-item-carousel").owlCarousel({
                loop: true,
                margin: 0,
                nav: true,
                autoplay: true,
                autoplayTimeout: 4000,
                autoplayHoverPause: true,
                smartSpeed: 500,
                navText: ["<span>&lt;</span>", "<span>&gt;</span>"],
                responsive: {
                    0: {
                        items: 1,
                    },
                    768: {
                        items: 2,
                    },
                    992: {
                        items: 3,
                    },
                },
            });
        }
    });
})(jQuery);
