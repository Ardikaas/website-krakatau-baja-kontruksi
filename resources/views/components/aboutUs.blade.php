{{-- About Style Three Section --}}
<section class="about-style-three alternat-2" id="company-info">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                @props([
                    'mainImages' => collect(),
                    'histories' => collect(),
                    'companyImage' => null,
                    'structureImage' => null,
                    'direksi' => collect(),
                    'komisaris' => collect(),
                ])

                <div class="image-box">
                    @foreach ($mainImages as $index => $image)
                        <figure class="image image-{{ $index + 1 }}">
                            <img src="{{ $image }}" alt="About Company Image">
                        </figure>
                    @endforeach

                    <span class="rotate-text">Since, 1992</span>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                <div class="content-box">
                    <div class="sec-title mb_35">
                        <h6>{{ __('messages.about') }}</h6>
                        <h2>{!! __('messages.about_precision_steel') !!}</h2>
                    </div>
                    <div class="text-box mb_30 text-justify">
                        <p>{{ __('messages.about_desc') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- about-style-three end --}}


{{-- history-section --}}
@php
    $defaultHistories = [
        [
            'year' => 1962,
            'image' => asset('images/resource/Trikora1.jpeg'),
            'translated_title' => 'Trikora 1',
            'translated_description' => 'President Soekarno launched Trikora Steel Factory project in Cilegon',
        ],
        [
            'year' => 1975,
            'image' => asset('images/resource/Trikora2.jpeg'),
            'translated_title' => 'Bar and Section Krakatau Steel',
            'translated_description' => 'It was inaugurated by President Soeharto and accompanied by Minister of Industry M. Jusuf',
        ],
        [
            'year' => 1992,
            'image' => asset('images/resource/Wajatama1.jpeg'),
            'translated_title' => 'PT Krakatau Wajatama was Born',
            'translated_description' => 'It was inaugurated by PT Krakatau Wajatama',
        ],
        [
            'year' => 2021,
            'image' => asset('images/resource/present.jpeg'),
            'translated_title' => 'Became PT Krakatau Baja Konstruksi',
            'translated_description' => 'Inaugurated as a Subholding by PT Krakatau Steel (Persero) TBK as of September 1st, 2021',
        ],
    ];

    // Use DB data if available, otherwise use defaults
    $historyItems = $histories->count() > 0
        ? $histories->map(fn($h) => [
            'year' => $h->year ?? '',
            'image' => $h->image ? asset('storage/' . $h->image) : asset('images/resource/present.jpeg'),
            'translated_title' => $h->translated_title,
            'translated_description' => $h->translated_description,
        ])->toArray()
        : $defaultHistories;
@endphp

<section class="history-section bg-color-1" id="history">
    <div class="outer-container">

        <div class="sec-title centred mb_45">
            <h6>{{ __('messages.history') }}</h6>
            <h2>{!! __('messages.timeline_of_precision') !!}</h2>
        </div>

        <!-- CAROUSEL -->
        <div class="history-carousel owl-carousel">
            @foreach ($historyItems as $item)
                <div class="history-item">
                    <div class="history-inner">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="history-image">
                                    <img src="{{ $item['image'] }}" alt="{{ $item['translated_title'] }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="history-content">
                                    <div class="title-text">
                                        <div class="title-shape"></div>
                                        <h2>{{ $item['translated_title'] }}</h2>
                                    </div>
                                    <p>{{ $item['translated_description'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <nav class="history-nav">
            <ul class="history-years">
                @foreach ($historyItems as $index => $item)
                    <li data-index="{{ $index }}" class="{{ $loop->first ? 'active' : '' }}">
                        {{ $item['year'] }}
                    </li>
                @endforeach
            </ul>
        </nav>


    </div>
</section>
{{-- history-section end --}}


{{-- company-section --}}
<section class="company-section" id="vision">
    <div class="bg-layer" style="background-image: url({{ $companyImage && $companyImage->value ? asset('storage/' . $companyImage->value) : asset('images/background/visi-misi-about-us.png') }});"></div>
    <div class="outer-container">
        <div class="outer-box clearfix">
            <div class="title-column">
                <div class="sec-title light">
                    <h6>{{ __('messages.company') }}</h6>
                    <h2>{{ __('messages.driven_by_innovation') }}</h2>
                </div>
            </div>
            <div class="single-column">
                <div class="inner-box">
                    <div class="static-content">
                        <h6>{{ __('messages.about') }}</h6>
                        <h3>{{ __('messages.our_company') }}</h3>
                        <p>{{ __('messages.our_company_desc_short') }}</p>
                        <div class="icon-box"><i class="flaticon-factory-1"></i></div>
                    </div>
                    <div class="overlay-content">
                        <h6>{{ __('messages.about') }}</h6>
                        <h3>{{ __('messages.our_company') }}</h3>
                        <p>{{ __('messages.our_company_desc') }}</p>
                        {{-- <h4>Journey of Excellence</h4>
                        <ul class="list-item clearfix">
                            <li>Growth & Innovation</li>
                            <li>Industry Leadership</li>
                            <li>Commitment to Quality</li>
                        </ul> --}}
                    </div>
                </div>
            </div>
            <div class="single-column">
                <div class="inner-box">
                    <div class="static-content">
                        <h6>{{ __('messages.about') }}</h6>
                        <h3>{{ __('messages.our_vision') }}</h3>
                        <p>{{ __('messages.our_vision_desc_short') }} </p>
                        <div class="icon-box"><i class="flaticon-business-vision"></i></div>
                    </div>
                    <div class="overlay-content">
                        <h6>{{ __('messages.about') }}</h6>
                        <h3>{{ __('messages.our_vision') }}</h3>
                        <p>{{ __('messages.our_vision_desc') }}</p>
                        {{-- <h4>Journey of Excellence</h4>
                        <ul class="list-item clearfix">
                            <li>Growth & Innovation</li>
                            <li>Industry Leadership</li>
                            <li>Commitment to Quality</li>
                        </ul> --}}
                    </div>
                </div>
            </div>
            <div class="single-column">
                <div class="inner-box">
                    <div class="static-content">
                        <h6>{{ __('messages.about') }}</h6>
                        <h3>{{ __('messages.our_mission') }}</h3>
                        <p>{{ __('messages.our_mission_desc_short') }}</p>
                        <div class="icon-box"><i class="flaticon-goal"></i></div>
                    </div>
                    <div class="overlay-content">
                        <h6>{{ __('messages.about') }}</h6>
                        <h3>{{ __('messages.our_mission') }}</h3>
                        <ul class="clearfix list-item">
                            <li>{{ __('messages.mission_point_1') }}</li>
                            <li>{{ __('messages.mission_point_2') }}</li>
                            <li>{{ __('messages.mission_point_3') }}</li>
                            <li>{{ __('messages.mission_point_4') }}</li>
                            <li>{{ __('messages.mission_point_5') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- company-section end --}}


{{-- chooseus-style-two --}}
<section class="organization-structure" id="corp-structure">
    <div class="auto-container">

        <div class="sec-title centred mb_45">
            <h6>{{ __('messages.corporate_structure') }}</h6>
            <h2>{!! __('messages.our_corporate_structure') !!}</h2>
            <p class="mt_12">
                {{ __('messages.corporate_structure_desc') }}
            </p>
        </div>

        <div class="structure-wrapper">
            <div class="structure-image">
                <img src="{{ $structureImage && $structureImage->value ? asset('storage/' . $structureImage->value) : asset('images/background/struktur-company.png') }}" alt="Corporate Structure" />
            </div>
        </div>

    </div>
</section>

{{-- chooseus-style-two end --}}

{{-- team-section --}}
<section class="team-section" id="directors">
    <div class="auto-container">
        <div class="sec-title centred mb_45">
            <h6>{{ __('messages.team_members') }}</h6>
            <h2>{!! __('messages.passionate_team') !!}</h2>
            <p class="mt_12">{{ __('messages.team_desc') }}</p>
        </div>
        <div class="container-team">
            <!-- Tabs -->
            <div class="tab-wrapper">
                <button class="tab active" data-tab="komisaris">{{ __('messages.board_of_commissioners') }}</button>
                <button class="tab" data-tab="direksi">{{ __('messages.board_of_directors') }}</button>
            </div>

            <!-- Dewan Komisaris -->
            <div class="image-wrapper active" id="komisaris">
                @forelse ($komisaris as $person)
                    <div class="image-card">
                        <img src="{{ asset('storage/' . $person->image) }}" alt="{{ $person->name }}" />
                        <div class="card-overlay">
                            <h4>{{ $person->name }}</h4>
                            <span>{{ $person->translated_position }}</span>
                        </div>
                    </div>
                @empty
                    <p class="text-center">No data available</p>
                @endforelse
            </div>

            <!-- Direksi -->
            <div class="image-wrapper" id="direksi">
                @forelse ($direksi as $person)
                    <div class="image-card">
                        <img src="{{ asset('storage/' . $person->image) }}" alt="{{ $person->name }}" />
                        <div class="card-overlay">
                            <h4>{{ $person->name }}</h4>
                            <span>{{ $person->translated_position }}</span>
                        </div>
                    </div>
                @empty
                    <p class="text-center">No data available</p>
                @endforelse
            </div>
        </div>
    </div>
</section>
{{-- team-section end --}}

{{-- <section class="chooseus-style-two" id="akhlak">
    <div class="auto-container">
        <div class="sec-title mb_25 centred">
            <h6>Cultural Values</h6>
            <h2>
                Core Values
                <span class="akhlak-logo">
                    <img src="{{ asset('images/logo-akhlak.png') }}" alt="AKHLAK">
                </span>
            </h2>
            <p class="mt_12">The core values ​that form the basis of BUMN work culture.</p>
        </div>

        <div class="row align-items-center">
            <!-- LEFT COLUMN -->
            <div class="col-lg-4 col-md-12 col-sm-12 left-column">
                <div class="left-content">

                    <!-- Amanah -->
                    <div class="chooseus-block-two">
                        <div class="inner-box">
                            <div class="icon-box">
                                <i class="fa-solid fa-shield-halved"></i>
                            </div>
                            <h3>
                                <i class="flaticon-thunder-bolt"></i>Amanah
                            </h3>
                            <p>
                                We uphold the trust that has been placed in us.
                            </p>
                        </div>
                    </div>

                    <!-- Kompeten -->
                    <div class="chooseus-block-two">
                        <div class="inner-box">
                            <div class="icon-box">
                                <i class="fa-solid fa-brain"></i>
                            </div>
                            <h3>
                                <i class="flaticon-thunder-bolt"></i>Competent
                            </h3>
                            <p>
                                We continuously learn and develop our capabilities.
                            </p>
                        </div>
                    </div>

                    <!-- Harmonis -->
                    <div class="chooseus-block-two">
                        <div class="inner-box">
                            <div class="icon-box">
                                <i class="fa-solid fa-people-group"></i>
                            </div>
                            <h3>
                                <i class="flaticon-thunder-bolt"></i>Harmonious
                            </h3>
                            <p>
                                We care for one another and respect differences.
                            </p>
                        </div>
                    </div>

                </div>
            </div>

            <!-- CENTER IMAGE -->
            <div class="col-lg-4 col-md-12 col-sm-12 image-column">
                <div class="image-box">
                    <figure class="image"><img src="{{ asset('images/resource/about-company-1.jpeg') }}"
                            alt="" style="width: 370px; height: 370px;"></figure>
                </div>
            </div>

            <!-- RIGHT COLUMN -->
            <div class="col-lg-4 col-md-12 col-sm-12 right-column">
                <div class="right-content align-3">

                    <!-- Loyal -->
                    <div class="chooseus-block-two">
                        <div class="inner-box">
                            <div class="icon-box">
                                <i class="fa-solid fa-flag"></i>
                            </div>
                            <h3>
                                <i class="flaticon-thunder-bolt"></i>Loyal
                            </h3>
                            <p>
                                We are dedicated and prioritize the interests of the nation and the state.
                            </p>
                        </div>
                    </div>

                    <!-- Adaptif -->
                    <div class="chooseus-block-two">
                        <div class="inner-box">
                            <div class="icon-box">
                                <i class="fa-solid fa-arrows-rotate"></i>
                            </div>
                            <h3>
                                <i class="flaticon-thunder-bolt"></i>Adaptive
                            </h3>
                            <p>
                                We continuously innovate and remain enthusiastic in driving and responding to change.
                            </p>
                        </div>
                    </div>

                    <!-- Kolaboratif -->
                    <div class="chooseus-block-two">
                        <div class="inner-box">
                            <div class="icon-box">
                                <i class="fa-solid fa-handshake"></i>
                            </div>
                            <h3>
                                <i class="flaticon-thunder-bolt"></i>Collaborative
                            </h3>
                            <p>
                                We build synergistic and mutually beneficial partnerships.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section> --}}

<section class="chooseus-section" id="akhlak">
    <div class="auto-container">
        <div class="sec-title mb_25 centred">
            <h6>Cultural Values</h6>
            <h2>
                Core Values
                <span class="akhlak-logo">
                    <img src="{{ asset('images/logo-akhlak.png') }}" alt="AKHLAK">
                </span>
            </h2>
            <p class="mt_12">The core values ​that form the basis of BUMN work culture.</p>
        </div>

        <div class="row clearfix">
            <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                <div class="chooseus-block-one">
                    <div class="inner-box">
                        <div class="light-icon"><i class="flaticon-gear"></i></div>
                        <div class="block-shape"
                            style="background-image: url({{ asset('images/shape/shape-11.png') }});"></div>
                        <div class="icon-box">
                            <div class="icon">
                                <i class="fa-solid fa-shield-halved"></i>
                            </div>
                        </div>
                        <h3>{{ __('messages.value_amanah') }}</h3>
                        <p>{{ __('messages.value_amanah_desc') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                <div class="chooseus-block-one">
                    <div class="inner-box">
                        <div class="light-icon"><i class="flaticon-gear"></i></div>
                        <div class="block-shape"
                            style="background-image: url({{ asset('images/shape/shape-11.png') }});"></div>
                        <div class="icon-box">
                            <div class="icon">
                                <i class="fa-solid fa-brain"></i>
                            </div>
                        </div>
                        <h3>{{ __('messages.value_competent') }}</h3>
                        <p>{{ __('messages.value_competent_desc') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                <div class="chooseus-block-one">
                    <div class="inner-box">
                        <div class="light-icon"><i class="flaticon-gear"></i></div>
                        <div class="block-shape"
                            style="background-image: url({{ asset('images/shape/shape-11.png') }});"></div>
                        <div class="icon-box">
                            <div class="icon">
                                <i class="fa-solid fa-people-group"></i>
                            </div>
                        </div>
                        <h3>{{ __('messages.value_harmonious') }}</h3>
                        <p>{{ __('messages.value_harmonious_desc') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                <div class="chooseus-block-one">
                    <div class="inner-box">
                        <div class="light-icon"><i class="flaticon-gear"></i></div>
                        <div class="block-shape"
                            style="background-image: url({{ asset('images/shape/shape-11.png') }});"></div>
                        <div class="icon-box">
                            <div class="icon">
                                <i class="fa-solid fa-flag"></i>
                            </div>
                        </div>
                        <h3>{{ __('messages.value_loyal') }}</h3>
                        <p>{{ __('messages.value_loyal_desc') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                <div class="chooseus-block-one">
                    <div class="inner-box">
                        <div class="light-icon"><i class="flaticon-gear"></i></div>
                        <div class="block-shape"
                            style="background-image: url({{ asset('images/shape/shape-11.png') }});"></div>
                        <div class="icon-box">
                            <div class="icon">
                                <i class="fa-solid fa-arrows-rotate"></i>
                            </div>
                        </div>
                        <h3>{{ __('messages.value_adaptive') }}</h3>
                        <p>{{ __('messages.value_adaptive_desc') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                <div class="chooseus-block-one">
                    <div class="inner-box">
                        <div class="light-icon"><i class="flaticon-gear"></i></div>
                        <div class="block-shape"
                            style="background-image: url({{ asset('images/shape/shape-11.png') }});"></div>
                        <div class="icon-box">
                            <div class="icon">
                                <i class="fa-solid fa-handshake"></i>
                            </div>
                        </div>
                        <h3>{{ __('messages.value_collaborative') }}</h3>
                        <p>{{ __('messages.value_collaborative_desc') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
