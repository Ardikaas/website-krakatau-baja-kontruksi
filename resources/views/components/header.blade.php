<header class="main-header">
    <div class="bg-color"></div>
    <!-- header-lower -->
    <div class="header-lower">
        <div class="outer-container">
            <div class="outer-box">
                <div class="left-column">
                    <div class="menu-area">
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler">
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                        </div>
                        <nav class="main-menu navbar-expand-md navbar-light clearfix">
                            <div class="navbar-collapse show clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <li class="dropdown"><a href="/">Home</a></li>
                                    <li class="dropdown"><a href="{{ route('about') }}">About Us</a>
                                        <ul>
                                            <li><a href="/about-us/#company-info">Company Info</a></li>
                                            <li><a href="/about-us/#history">History</a></li>
                                            <li><a href="/about-us/#vision">Vision & Mision</a></li>
                                            <li><a href="/about-us/#corp-structure">KSG Structure</a></li>
                                            <li><a href="/about-us/#directors">Directors & Commissioners</a></li>
                                            <li><a href="/about-us/#akhlak">Akhlak</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">Business</a>
                                        <ul>
                                            <li><a href="/product">Product</a></li>
                                            <li><a href="/projects">Project</a></li>
                                            <li><a href="{{ route('subholding') }}">Subholding</a></li>
                                            <li><a href="/contact">Sales Contact</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="{{ route('compgov') }}">Company Governance</a>
                                    </li>
                                    <li class="dropdown"><a href="https://krasmedia.id/" target="_blank">News</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <ul class="menu-right-content">
                    <li class="contact-link"><a href="{{ route('contact') }}"><i
                                class="flaticon-headphones"></i><span>Contact</span></a></li>
                    <li class="language-box">
                        <div class="icon-box"><i class="flaticon-global"></i></div>
                        <div class="select-box">
                            <select class="wide">
                                <option data-display="Eng">Eng</option>
                                <option value="1">Ind</option>
                            </select>
                        </div>
                    </li>
                    <li class="btn-box">
                        <a href="https://wa.me/6281234567890" target="_blank" class="theme-btn btn-one"><i
                                class="flaticon-mail"></i><span>Get a
                                Quote</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!--sticky Header-->
    <div class="sticky-header">
        <div class="bg-color"></div>
        <div class="outer-container">
            <div class="outer-box">
                <div class="left-column">
                    <div class="menu-area">
                        <nav class="main-menu clearfix">
                            <!--Keep This Empty / Menu will come through Javascript-->
                        </nav>
                    </div>
                </div>
                <ul class="menu-right-content">
                    <li class="contact-link"><a href="{{ route('contact') }}"><i
                                class="flaticon-headphones"></i><span>Contact</span></a></li>
                    <li class="language-box">
                        <div class="icon-box"><i class="flaticon-global"></i></div>
                        <div class="select-box">
                            <select class="wide">
                                <option data-display="Eng">Eng</option>
                                <option value="1">Ind</option>
                            </select>
                        </div>
                    </li>
                    <li class="btn-box">
                        <a href="https://wa.me/6281234567890" target="_blank" class="theme-btn btn-one"><i
                                class="flaticon-mail"></i><span>Get a
                                Quote</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
