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
                                    <li class="dropdown"><a href="/">{{ __('messages.home') }}</a></li>
                                    <li class="dropdown"><a href="{{ route('about') }}">{{ __('messages.about_us') }}</a>
                                        <ul>
                                            <li><a href="/about-us/#company-info">{{ __('messages.company_info') }}</a></li>
                                            <li><a href="/about-us/#history">{{ __('messages.history') }}</a></li>
                                            <li><a href="/about-us/#vision">{{ __('messages.vision_mission') }}</a></li>
                                            <li><a href="/about-us/#corp-structure">{{ __('messages.ksg_structure') }}</a></li>
                                            <li><a href="/about-us/#directors">{{ __('messages.directors') }}</a></li>
                                            <li><a href="/about-us/#akhlak">{{ __('messages.akhlak') }}</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">{{ __('messages.business') }}</a>
                                        <ul>
                                            <li><a href="/product">{{ __('messages.product') }}</a></li>
                                            <li><a href="/projects">{{ __('messages.project') }}</a></li>
                                            <li><a href="{{ route('subholding') }}">{{ __('messages.subholding') }}</a></li>
                                            <li><a href="/contact">{{ __('messages.sales_contact') }}</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="{{ route('compgov') }}">{{ __('messages.company_governance') }}</a>
                                    </li>
                                    <li class="dropdown"><a href="https://krasmedia.id/" target="_blank">{{ __('messages.news') }}</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <ul class="menu-right-content">
                    <li class="contact-link"><a href="{{ route('contact') }}"><i
                                class="flaticon-headphones"></i><span>{{ __('messages.contact') }}</span></a></li>
                    <li class="language-box">
                        <div class="icon-box"><i class="flaticon-global"></i></div>
                        <div class="select-box">
                            <select class="wide" onchange="window.location.href=this.value;">
                                <option data-display="{{ app()->getLocale() == 'id' ? 'ID' : 'EN' }}" value="">{{ app()->getLocale() == 'id' ? 'ID' : 'EN' }}</option>
                                <option value="{{ route('lang.switch', 'en') }}" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>EN</option>
                                <option value="{{ route('lang.switch', 'id') }}" {{ app()->getLocale() == 'id' ? 'selected' : '' }}>ID</option>
                            </select>
                        </div>
                    </li>
                    <li class="btn-box">
                        <a href="https://wa.me/6281234567890" target="_blank" class="theme-btn btn-one"><i
                                class="flaticon-mail"></i><span>{{ __('messages.get_quote') }}</span></a>
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
                                class="flaticon-headphones"></i><span>{{ __('messages.contact') }}</span></a></li>
                    <li class="language-box">
                        <div class="icon-box"><i class="flaticon-global"></i></div>
                        <div class="select-box">
                            <select class="wide" onchange="window.location.href=this.value;">
                                <option data-display="{{ app()->getLocale() == 'id' ? 'ID' : 'EN' }}" value="">{{ app()->getLocale() == 'id' ? 'ID' : 'EN' }}</option>
                                <option value="{{ route('lang.switch', 'en') }}" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>EN</option>
                                <option value="{{ route('lang.switch', 'id') }}" {{ app()->getLocale() == 'id' ? 'selected' : '' }}>ID</option>
                            </select>
                        </div>
                    </li>
                    <li class="btn-box">
                        <a href="https://wa.me/6281234567890" target="_blank" class="theme-btn btn-one"><i
                                class="flaticon-mail"></i><span>{{ __('messages.get_quote') }}</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
