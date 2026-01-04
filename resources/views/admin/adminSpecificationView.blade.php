@extends('layouts.admin')

@section('title', 'Admin')
@section('meta_description', 'Official website of PT Krakatau Baja Konstruksi')

@section('content')
    <div class="spec-editor">
      <h1 class="page-title">Specifications Editor</h1>

      <div class="spec-wrapper">
        <div class="spec-header">
          <h2 class="spec-title">Specifications</h2>
          <button class="btn-add">Add New Specification</button>
        </div>

        <div class="spec-list">
          <!-- Card -->
          <div class="spec-card">
            <div class="spec-field">
              <span class="label">Title</span>
              <div class="value title">Equal Angles</div>
            </div>

            <div class="image-group">
              <img src="https://placehold.co/135x135" alt="" />
              <div class="image-overlay">
                <span>1+</span>
              </div>
            </div>

            <div class="spec-field">
              <span class="label">Sizing</span>
              <div class="value">40 x 40 ~ 200 x 200</div>
            </div>

            <div class="spec-field">
              <span class="label">Standardization</span>
              <div class="value">SNI 07-0054-2006</div>
            </div>

            <div class="spec-field">
              <span class="label">Standardization Equivalent</span>
              <div class="value">ASTM A 36, JIS G 3101</div>
            </div>
          </div>
          <div class="spec-card">
            <div class="spec-field">
              <span class="label">Title</span>
              <div class="value title">Equal Angles</div>
            </div>

            <div class="image-group">
              <img src="https://placehold.co/135x135" alt="" />
              <div class="image-overlay">
                <span>1+</span>
              </div>
            </div>

            <div class="spec-field">
              <span class="label">Sizing</span>
              <div class="value">40 x 40 ~ 200 x 200</div>
            </div>

            <div class="spec-field">
              <span class="label">Standardization</span>
              <div class="value">SNI 07-0054-2006</div>
            </div>

            <div class="spec-field">
              <span class="label">Standardization Equivalent</span>
              <div class="value">ASTM A 36, JIS G 3101</div>
            </div>
          </div>
          <div class="spec-card">
            <div class="spec-field">
              <span class="label">Title</span>
              <div class="value title">Equal Angles</div>
            </div>

            <div class="image-group">
              <img src="https://placehold.co/135x135" alt="" />
              <div class="image-overlay">
                <span>1+</span>
              </div>
            </div>

            <div class="spec-field">
              <span class="label">Sizing</span>
              <div class="value">40 x 40 ~ 200 x 200</div>
            </div>

            <div class="spec-field">
              <span class="label">Standardization</span>
              <div class="value">SNI 07-0054-2006</div>
            </div>

            <div class="spec-field">
              <span class="label">Standardization Equivalent</span>
              <div class="value">ASTM A 36, JIS G 3101</div>
            </div>
          </div>
        </div>       
      </div>
    </div>
@endsection