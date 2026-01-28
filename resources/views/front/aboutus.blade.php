@extends('layouts.front')

@section('title', 'About Us - Krakatau Baja Kontruksi')
@section('meta_description', 'Learn about Krakatau Baja Kontruksi - Leaders in precision steel manufacturing since
    1992')

@section('content')
    {{-- Page Title / Breadcrumb Banner --}}
    <x-landingPageSection1 type="page" title="About Us" :breadcrumb="[['label' => 'Home', 'url' => url('/')], ['label' => 'About Us']]" imagePath="images/background/page-title.jpg" />

    {{-- About Page Content --}}
    <x-aboutUs :main-images="$mainImages" :histories="$histories" :company-image="$companyImage" :structure-image="$structureImage" :direksi="$direksi"
        :komisaris="$komisaris" />
@endsection
