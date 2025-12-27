$(document).ready(function () {

    // Project Section Tabs Logic
    if ($('.project-tab').length) {
        $('.project-tab .product-tab-btns .p-tab-btn').on('click', function (e) {
            e.preventDefault();
            var target = $($(this).attr('data-tab'));

            if ($(target).hasClass('active-tab')) {
                return false;
            } else {
                $('.project-tab .product-tab-btns .p-tab-btn').removeClass('active-btn');
                $(this).addClass('active-btn');
                $('.project-tab .p-tabs-content .p-tab').removeClass('active-tab');
                $(target).addClass('active-tab');
            }
        });
    }

    // Owl Carousel Initialization for Project Items
    if ($('.single-item-carousel').length) {
        var owlCarousel = $('.single-item-carousel');

        owlCarousel.owlCarousel({
            loop: true,
            margin: 30,
            nav: false,
            dots: false,
            smartSpeed: 500,
            autoplay: 5000,
            navText: ['<span class="flaticon-right"></span>', '<span class="flaticon-right"></span>'],
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                600: {
                    items: 1
                },
                800: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        });

        // Function to update owl counter
        function updateOwlCounter() {
            var activeTab = $('.p-tab.active-tab');
            if (activeTab.length) {
                var carousel = activeTab.find('.owl-carousel');
                var totalItems = carousel.find('.owl-item:not(.cloned)').length;
                var currentIndex = carousel.find('.owl-item.active').index() - carousel.find('.owl-item.cloned').length / 2 + 1;

                // Ensure currentIndex is within bounds
                if (currentIndex < 1) currentIndex = totalItems;
                if (currentIndex > totalItems) currentIndex = 1;

                // Format numbers with leading zero
                var currentFormatted = currentIndex < 10 ? '0' + currentIndex : currentIndex;
                var totalFormatted = totalItems < 10 ? '0' + totalItems : totalItems;

                $('.owl-counter .counter-text .current').text(currentFormatted);
                $('.owl-counter .counter-text .total').text(totalFormatted);
            }
        }

        // Update counter on carousel change
        owlCarousel.on('changed.owl.carousel', function (event) {
            setTimeout(updateOwlCounter, 100);
        });

        // Initial counter update
        setTimeout(updateOwlCounter, 500);

        // Custom navigation buttons
        $('.owl-prev-custom').on('click', function () {
            var activeTab = $('.p-tab.active-tab');
            activeTab.find('.owl-carousel').trigger('prev.owl.carousel');
        });

        $('.owl-next-custom').on('click', function () {
            var activeTab = $('.p-tab.active-tab');
            activeTab.find('.owl-carousel').trigger('next.owl.carousel');
        });

        // Update counter when tab changes and reset carousel to first item
        $('.p-tab-btn').on('click', function () {
            setTimeout(function () {
                // Get the active tab's carousel
                var activeTab = $('.p-tab.active-tab');
                var carousel = activeTab.find('.owl-carousel');

                // Reset carousel to first item (index 0)
                carousel.trigger('to.owl.carousel', [0, 300]);

                // Update counter after carousel resets
                setTimeout(updateOwlCounter, 400);
            }, 100);
        });
    }

    // Count Box Animation (Simple version, or reuse if odometer is present)
    // If you need the counter animation, ensure 'appear.js' or similar is loaded or write a simple one.
});
