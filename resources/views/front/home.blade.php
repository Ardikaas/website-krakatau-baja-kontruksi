@extends('layouts.front')

@section('title', 'Home')
@section('meta_description', 'Official website of PT Krakatau Baja Konstruksi')

@section('content')
  <div class="banner-section">
    <div
        class="pattern-layer"
    ></div>
    <x-landingPageSection1 type="hero" title="Produsen|Baja |Berkualitas" />
    <x-landingPageSection2 />
    <x-landingPageSection3 />
    <x-landingPageSection4dan5 />
    <x-landingPageSection8 />
    <x-landingPageSection9 />
  </div>
@endsection