@extends('layouts.front')

@section('title', $person->name . ' - CV Detail')
@section('meta_description', 'CV Detail of ' . $person->name . ' at PT Krakatau Baja Konstruksi')

@section('content')
    {{-- Page Title / Breadcrumb Banner --}}
    <x-landingPageSection1 type="page" title="CV Detail" :breadcrumb="[['label' => 'Home', 'url' => url('/')], ['label' => __('messages.about_us'), 'url' => route('about')], ['label' => $person->name]]" imagePath="images/background/page-title.jpg" />

    <section class="cv-section" style="padding: 100px 0; background-color: var(--color-f9f9f9); width: 100%; overflow: hidden;">
        <div class="auto-container">
            <div class="row clearfix align-items-center">
                
                {{-- Image Column --}}
                <div class="col-lg-5 col-md-12 col-sm-12 image-column">
                    <div class="image-box" style="position: relative; overflow: hidden; box-shadow: 0 20px 40px rgba(0,0,0,0.1); margin-bottom: 30px;">
                        @if ($person->full_body_image && Storage::disk('public')->exists($person->full_body_image))
                            <img src="{{ route('admin.aboutus.people.view', ['filename' => basename($person->full_body_image)]) }}" alt="{{ $person->name }} Full Body" style="width: 100%; height: auto; object-fit: cover; display: block;">
                        @elseif ($person->image && Storage::disk('public')->exists($person->image))
                            <img src="{{ route('admin.aboutus.people.view', ['filename' => basename($person->image)]) }}" alt="{{ $person->name }}" style="width: 100%; height: auto; object-fit: cover; display: block;">
                        @else
                            {{-- DUMMY IMAGE FALLBACK --}}
                            <img src="{{ asset('images/resource/team-1.jpg') }}" alt="Dummy Image" style="width: 100%; height: auto; object-fit: cover; display: block;">
                        @endif
                        <div class="overlay-shape" style="position: absolute; bottom: -50px; left: -50px; width: 150px; height: 150px; background: var(--color-rgba-0-161-209-0-12); border-radius: 50%; filter: blur(30px);"></div>
                    </div>
                </div>

                {{-- Content Column --}}
                <div class="col-lg-7 col-md-12 col-sm-12 content-column">
                    <div class="content-box" style="padding: 0 20px; padding-left: 40px;">
                        <div class="sec-title mb_35">
                            <h6 style="color: var(--color-00a1d1); font-weight: 600; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 10px;">{{ $person->type == 'direksi' ? __('messages.board_of_directors') : __('messages.board_of_commissioners') }}</h6>
                            <h2 style="font-size: 48px; font-weight: 700; color: var(--color-1a1a1a); margin-bottom: 15px;">{{ $person->name }}</h2>
                            <span class="designation" style="display: inline-block; padding: 8px 20px; background: var(--color-e6f7ff); color: var(--color-00a1d1); font-weight: 600; font-size: 16px; margin-bottom: 30px;">
                                {{ $person->translated_position }}
                            </span>
                        </div>

                        <div class="text-box mb_40">
                            <h4 style="font-size: 24px; font-weight: 700; color: var(--color-1a1a1a); margin-bottom: 20px; position: relative; padding-bottom: 10px;">
                                {{ app()->getLocale() == 'id' ? 'Ringkasan' : 'Summary' }}
                                <span style="position: absolute; bottom: 0; left: 0; width: 40px; height: 3px; background: var(--color-00a1d1);"></span>
                            </h4>
                            <div class="summary-text text-justify" style="font-size: 16px; color: var(--color-666666); line-height: 1.8;">
                                @php
                                    $summary = app()->getLocale() == 'en' && $person->summary_en ? $person->summary_en : $person->summary;
                                    
                                    // DUMMY TEXT FALLBACK
                                    if (empty(trim($summary))) {
                                        $summary = app()->getLocale() == 'id' 
                                            ? "Ini adalah ringkasan dummy karena data di database saat ini kosong. " . $person->name . " adalah seorang profesional berpengalaman dengan rekam jejak yang terbukti bekerja di industri baja dan konstruksi. Terampil dalam negosiasi, perencanaan bisnis, manajemen operasi, dan kemampuan analitis. Profesional pengembangan bisnis yang kuat dan berdedikasi untuk mencapai visi dan misi perusahaan."
                                            : "This is a dummy summary since the database field is currently empty. " . $person->name . " is an experienced professional with a demonstrated history of working in the steel and construction industry. Skilled in negotiation, business planning, operations management, and analytical skills. Strong business development professional dedicated to achieving the company's vision and mission.";
                                    }
                                @endphp
                                <p>{!! nl2br(e($summary)) !!}</p>
                            </div>
                        </div>

                        <div class="experience-box" style="margin-top: 50px;">
                            <h4 style="font-size: 24px; font-weight: 700; color: var(--color-1a1a1a); margin-bottom: 25px; position: relative; padding-bottom: 10px;">
                                {{ app()->getLocale() == 'id' ? 'Pengalaman Kerja Sebelumnya' : 'Previous Jobs Experience' }}
                                <span style="position: absolute; bottom: 0; left: 0; width: 40px; height: 3px; background: var(--color-00a1d1);"></span>
                            </h4>
                            @php
                                $prevJobs = app()->getLocale() == 'en' && $person->previous_jobs_en ? $person->previous_jobs_en : $person->previous_jobs;

                                // DUMMY TEXT FALLBACK
                                if (empty(trim($prevJobs))) {
                                    $prevJobs = app()->getLocale() == 'id'
                                        ? "• Penasihat Senior di PT Dummy Corporation (2018 - 2021)\n• Direktur Operasional di SteelWorks Ltd (2012 - 2018)\n• Manajer Pabrik di Industrial Tech Nusantara (2007 - 2012)"
                                        : "• Senior Advisor at PT Dummy Corporation (2018 - 2021)\n• Operations Director at SteelWorks Ltd (2012 - 2018)\n• Plant Manager at Industrial Tech Nusantara (2007 - 2012)";
                                }
                            @endphp
                            
                            <div class="jobs-timeline" style="background: var(--color-ffffff); padding: 30px; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
                                <div style="font-size: 16px; color: var(--color-555555); line-height: 1.8;">
                                    {!! nl2br(e($prevJobs)) !!}
                                </div>
                            </div>
                        </div>

                        <div class="btn-box mt_40" style="margin-top: 40px;">
                            <a href="{{ route('about') }}" class="theme-btn btn-one" style="padding: 12px 30px; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
                                <i class="fa fa-arrow-left"></i> {{ app()->getLocale() == 'id' ? 'Kembali ke Tentang Kami' : 'Back to About Us' }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .cv-section .content-box {
            animation: fadeInUp 0.8s ease forwards;
        }
        .cv-section .image-box {
            animation: fadeInLeft 0.8s ease forwards;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .cv-section .image-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 45px rgba(0,0,0,0.15);
        }
        .jobs-timeline {
            border-left: 3px solid var(--color-00a1d1);
        }
        @media only screen and (max-width: 991px) {
            .cv-section .content-column .content-box {
                padding-left: 0 !important;
                margin-top: 40px;
            }
            .cv-section .sec-title h2 {
                font-size: 36px !important;
            }
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeInLeft {
            from { opacity: 0; transform: translateX(-30px); }
            to { opacity: 1; transform: translateX(0); }
        }
    </style>
@endsection
