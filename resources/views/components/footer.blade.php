<!-- download-section -->
@inject('documentService', \App\Services\DocumentService::class)
@php
    $footerDocuments = $documentService->list()->take(2);
@endphp

@if (isset($footerDocuments) && $footerDocuments->count())
    <section class="download-section">
        <div class="bg-layer"></div>
        <div class="auto-container">
            <div class="row clearfix">

                @foreach ($footerDocuments as $doc)
                    <div class="col-lg-6 col-md-12 col-sm-12 single-column">
                        <div class="single-item {{ $loop->first ? 'pr_35' : 'pl_35' }}">
                            <div class="text-box">
                                <div class="icon-box">
                                    <i class="flaticon-brochure"></i>
                                </div>
                                <div class="inner">
                                    <h4>{{ $doc->title }}</h4>
                                    <h6>pdf ({{ $doc->size }})</h6>
                                </div>
                            </div>

                            <a href="{{ url('/api/documents/download/' . $doc->id) }}">
                                <i class="flaticon-download"></i>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endif
<!-- download-section end -->

<footer class="main-footer">
    <div class="widget-section">
        <div class="auto-container">
            <div class="row clearfix">
                <!-- Contact Widget -->
                <div class="col-lg-2 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget contact-widget">
                        <div class="widget-title">
                            <h3>Contact</h3>
                        </div>
                        <div class="widget-content">
                            <p>Gedung Krakatau Steel Lantai 2, Jl. jend. Gatot Subroto Kav. 54, Jakarta 12950</p>
                            <div class="phone"><a href="https://wa.me/6281234567890" target="_blank">[+66] 12 000
                                    3456</a></div>
                            <div class="email"><a
                                    href="mailto:marketing@bajakonstruksi.co.id">marketing@bajakonstruksi.co.id</a>
                            </div>
                            <div class="map-link"><a href="#"><i class="flaticon-right-arrow"></i><span>Google
                                        Map</span></a></div>
                        </div>
                    </div>
                </div>

                <!-- Links Widget -->
                <div class="col-lg-2 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget links-widget">
                        <div class="widget-title">
                            <h3>Useful Links</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="links-list clearfix">
                                <li><a href="/"><i class="flaticon-right"></i><span>Home</span></a></li>
                                <li><a href="about"><i class="flaticon-right"></i><span>About Us</span></a></li>
                                <li><a href="#"><i class="flaticon-right"></i><span>Products</span></a></li>
                                <li><a href="news"><i class="flaticon-right"></i><span>News</span></a></li>
                                <li><a href="contact"><i class="flaticon-right"></i><span>Contact Us</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Services Widget -->
                <div class="col-lg-2 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget links-widget">
                        <div class="widget-title">
                            <h3>Product</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="links-list clearfix">
                                <li><a href="#"><i class="flaticon-right"></i><span>Fabrication</span></a></li>
                                <li><a href="#"><i class="flaticon-right"></i><span>Metal Processing</span></a>
                                </li>
                                <li><a href="#"><i class="flaticon-right"></i><span>CNC Machining</span></a></li>
                                <li><a href="#"><i class="flaticon-right"></i><span>Metal Casting</span></a></li>
                                <li><a href="#"><i class="flaticon-right"></i><span>Welding</span></a></li>
                                <li><a href="#"><i class="flaticon-right"></i><span>Punching</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget links-widget">
                        <div class="widget-title">
                            <h3>Projects</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="links-list clearfix">
                                <li><a href="#"><i class="flaticon-right"></i><span>Fabrication</span></a></li>
                                <li><a href="#"><i class="flaticon-right"></i><span>Metal Processing</span></a>
                                </li>
                                <li><a href="#"><i class="flaticon-right"></i><span>CNC Machining</span></a></li>
                                <li><a href="#"><i class="flaticon-right"></i><span>Metal Casting</span></a></li>
                                <li><a href="#"><i class="flaticon-right"></i><span>Welding</span></a></li>
                                <li><a href="#"><i class="flaticon-right"></i><span>Punching</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>


                <!-- Support Widget -->
                <div class="col-lg-2 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget support-widget">
                        <div class="widget-title">
                            <a href="{{ url('/wbs') }}">
                                <img src="{{ asset('images/icons/Untitled design (1).png') }}" alt="WBS"
                                    style="max-width: 100%; height: auto; cursor: pointer;">
                            </a>
                        </div>
                        <div class="widget-content">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="auto-container">
            <div class="bottom-inner">
                <div class="left-column">
                    <ul class="social-links">
                        <li><a href="https://www.facebook.com/ksbajakonstruksi" target="_blank"><i
                                    class="flaticon-facebook"></i></a></li>
                        <li><a href="https://www.instagram.com/ksbajakonstruksi/" target="_blank"><i
                                    class="flaticon-instagram-logo"></i></a></li>
                        <li><a href="https://www.linkedin.com/company/krakataubajakonstruksi/" target="_blank"><i
                                    class="flaticon-linkedin"></i></a></li>
                        <li><a href="https://www.youtube.com/@ksbajakonstruksi" target="_blank"><i
                                    class="flaticon-youtube"></i></a></li>
                    </ul>
                    <p><a href="#">Terms & Conditions</a>&nbsp;&nbsp;.&nbsp;&nbsp;<a href="#">Policies
                            <br />Legal
                            Notice.</a></p>
                </div>
                <div class="right-column align-3">
                    <figure class="footer-logo">
                        <a href="#"><img src="{{ asset('images/logo.png') }}"
                                alt="Krakatau Baja Kontruksi"></a>
                    </figure>
                    <div class="copyright">
                        <p>Copyrights &copy; {{ date('Y') }} <a href="#">PT. Krakatau Baja Konstruksi,</a>
                            <br />All Rights Reserved.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
