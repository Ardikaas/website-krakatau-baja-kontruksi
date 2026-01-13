/**
 * About Us Page JavaScript
 * Handles tab functionality for history section and features section
 */

document.addEventListener('DOMContentLoaded', function () {
    // Initialize tab functionality
    initTabs();

    // Initialize WOW animations if available
    if (typeof WOW !== 'undefined') {
        new WOW().init();
    }
});

/**
 * Initialize tab functionality for all tabs boxes on the page
 */
function initTabs() {
    // History Section Tabs
    const historyTabBtns = document.querySelectorAll('.history-section .tab-btn');
    historyTabBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            const tabId = this.getAttribute('data-tab');
            const tabsBox = this.closest('.tabs-box');

            // Remove active class from all buttons in this tabs box
            tabsBox.querySelectorAll('.tab-btn').forEach(function (tabBtn) {
                tabBtn.classList.remove('active-btn');
            });

            // Add active class to clicked button
            this.classList.add('active-btn');

            // Hide all tabs
            tabsBox.querySelectorAll('.tabs-content .tab').forEach(function (tab) {
                tab.classList.remove('active-tab');
            });

            // Show selected tab
            const selectedTab = document.querySelector(tabId);
            if (selectedTab) {
                selectedTab.classList.add('active-tab');
            }
        });
    });

    // Features Section Tabs
    const featureTabBtns = document.querySelectorAll('.features-section .tab-btn');
    featureTabBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            const tabId = this.getAttribute('data-tab');
            const tabsBox = this.closest('.tabs-box');

            // Remove active class from all buttons in this tabs box
            tabsBox.querySelectorAll('.tab-btn').forEach(function (tabBtn) {
                tabBtn.classList.remove('active-btn');
            });

            // Add active class to clicked button
            this.classList.add('active-btn');

            // Hide all tabs
            tabsBox.querySelectorAll('.tabs-content .tab').forEach(function (tab) {
                tab.classList.remove('active-tab');
            });

            // Show selected tab
            const selectedTab = document.querySelector(tabId);
            if (selectedTab) {
                selectedTab.classList.add('active-tab');
            }
        });
    });
}

/**
 * Curved text effect for rotating text (if circleType library is available)
 */
function initCurvedText() {
    if (typeof CircleType !== 'undefined') {
        const circleTexts = document.querySelectorAll('.curved-circle');
        circleTexts.forEach(function (el) {
            new CircleType(el);
        });
    }
}

// Initialize curved text when page loads
document.addEventListener('DOMContentLoaded', initCurvedText);
