 <!-- preloader -->
        <div class="loader-wrap">
            <div class="preloader">
                <div id="handle-preloader" class="handle-preloader">
                    <div class="animation-preloader">
                        <div class="spinner"></div>
                        <div class="txt-loading">
                            <span data-text-preloader="P" class="letters-loading">P</span>
                            <span data-text-preloader="T" class="letters-loading">T</span>
                            <span class="letters-loading space">&nbsp;</span>
                            <span data-text-preloader="K" class="letters-loading">K</span>
                            <span data-text-preloader="r" class="letters-loading">r</span>
                            <span data-text-preloader="a" class="letters-loading">a</span>
                            <span data-text-preloader="k" class="letters-loading">k</span>
                            <span data-text-preloader="a" class="letters-loading">a</span>
                            <span data-text-preloader="t" class="letters-loading">t</span>
                            <span data-text-preloader="a" class="letters-loading">a</span>
                            <span data-text-preloader="u" class="letters-loading">u</span>
                            <span class="letters-loading space">&nbsp;</span>
                            <span data-text-preloader="B" class="letters-loading">B</span>
                            <span data-text-preloader="a" class="letters-loading">a</span>
                            <span data-text-preloader="j" class="letters-loading">j</span>
                            <span data-text-preloader="a" class="letters-loading">a</span>
                            <span class="letters-loading space">&nbsp;</span>
                            <span data-text-preloader="K" class="letters-loading">K</span>
                            <span data-text-preloader="o" class="letters-loading">o</span>
                            <span data-text-preloader="n" class="letters-loading">n</span>
                            <span data-text-preloader="s" class="letters-loading">s</span>
                            <span data-text-preloader="t" class="letters-loading">t</span>
                            <span data-text-preloader="r" class="letters-loading">r</span>
                            <span data-text-preloader="u" class="letters-loading">u</span>
                            <span data-text-preloader="k" class="letters-loading">k</span>
                            <span data-text-preloader="s" class="letters-loading">s</span>
                            <span data-text-preloader="i" class="letters-loading">i</span>
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