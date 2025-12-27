@extends('layouts.front')

@section('title', 'Home')
@section('meta_description', 'Official website of PT Krakatau Baja Konstruksi')

@section('content')
  <div class="boxed-wrapper">
    <div class="banner-section">
      <div
          class="pattern-layer"
          style="background-image: url(assets/images/shape/shape-2.png);"
      ></div>
      <x-landingPageSection1 type="hero" title="Produsen|Baja |Berkualitas" />
    </div>
    <x-landingPageSection4,5 />
  </div>
@endsection