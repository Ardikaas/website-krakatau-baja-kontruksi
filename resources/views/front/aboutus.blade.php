@extends('layouts.front')

@section('title', 'About Us - Krakatau Baja Kontruksi')
@section('meta_description', 'Learn about Krakatau Baja Kontruksi - Leaders in precision steel manufacturing since 1992')

@section('content')
    {{-- Page Title / Breadcrumb Banner --}}
    <x-landingPageSection1 
        type="page" 
        title="About Us"
        :breadcrumb="[
            ['label' => 'Home', 'url' => url('/')],
            ['label' => 'About'],
            ['label' => 'About Us']
        ]"
    />

    {{-- About Page Content --}}
    <x-aboutUs />
@endsection
