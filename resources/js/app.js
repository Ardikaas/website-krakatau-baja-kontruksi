import "./bootstrap";
import "./jquery.lettering.min.js";
import "./jquery.circleType.js";
import "./script.js";
import "./parallax-scroll";
import "./aboutUs.js";
import "./newsEditor";

document.addEventListener('DOMContentLoaded', function() {
    const langSwitches = document.querySelectorAll('.custom-lang-switch');

    langSwitches.forEach(function(switcher) {
        const toggle = switcher.querySelector('.lang-toggle');

        // Toggle dropdown on button click
        toggle.addEventListener('click', function(e) {
            e.stopPropagation();
            switcher.classList.toggle('open');
        });
    });

    // Close dropdown when clicking anywhere else
    document.addEventListener('click', function() {
        langSwitches.forEach(function(switcher) {
            switcher.classList.remove('open');
        });
    });
});
