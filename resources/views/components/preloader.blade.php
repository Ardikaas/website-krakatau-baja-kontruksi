 <!-- preloader -->
        <div class="loader-wrap">
            <div class="preloader">
                <div id="handle-preloader" class="handle-preloader">
                    <div class="animation-preloader">
                        <div class="spinner"></div>
                        <div class="txt-loading">
                            <span data-text-preloader="k" class="letters-loading">
                                k
                            </span>
                            <span data-text-preloader="r" class="letters-loading">
                                r
                            </span>
                            <span data-text-preloader="a" class="letters-loading">
                                a
                            </span>
                            <span data-text-preloader="k" class="letters-loading">
                                k
                            </span>
                            <span data-text-preloader="a" class="letters-loading">
                                a
                            </span>
                            <span data-text-preloader="t" class="letters-loading">
                                t
                            </span>
                            <span data-text-preloader="a" class="letters-loading">
                                a
                            </span>
                            <span data-text-preloader="u" class="letters-loading">
                                u
                            </span>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
        <script>
            // Fallback preloader hide - runs immediately when DOM is ready
            (function() {
                function hidePreloader() {
                    var loader = document.querySelector('.loader-wrap');
                    if (loader) {
                        setTimeout(function() {
                            loader.style.transition = 'opacity 0.5s ease';
                            loader.style.opacity = '0';
                            setTimeout(function() {
                                loader.style.display = 'none';
                            }, 500);
                        }, 1000);
                    }
                }
                
                if (document.readyState === 'complete') {
                    hidePreloader();
                } else {
                    window.addEventListener('load', hidePreloader);
                }
            })();
        </script>
        <!-- preloader end -->