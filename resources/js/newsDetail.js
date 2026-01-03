document.addEventListener('DOMContentLoaded', function () {
    if (typeof $.fancybox !== 'undefined') {
        $('.lightbox-image').fancybox({
            openEffect: 'fade',
            closeEffect: 'fade'
        });
    }
});
