@extends('layouts.front')

@section('title', 'Home - Krakatau Baja Konstruksi')
@section('meta_description', 'Official website of PT Krakatau Baja Konstruksi')

@section('content')
    <div class="banner-section">
        <div class="pattern-layer"></div>
        <x-landingPageSection1 type="hero" title="Produsen|Baja |Berkualitas" />
        <x-landingPageSection2 :heroBanners="$heroBanners" />
        <x-landingPageSection3 />
        <x-landingPageSection4 />
        <x-landingPageSection7 :products="$products" :projects="$projects"/>
        <x-landingPageSection8 :whyChooseUs="$whyChooseUs" />
        {{-- <x-landingPageSection9 /> --}}
        <x-landingPageSection10 :news="$news" />
    </div>
@endsection
