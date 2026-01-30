{{-- Project Section --}}
<section class="project-section">
    <div class="pattern-layer" style="background-image: url({{ asset('images/shape/shape-4.png') }});"></div>
    <div class="auto-container">
        {{-- Title Container with gray background --}}
        <div class="title-container">
            <div class="upper-box">
                <div class="row align-items-center">
                    
                        <div class="sec-title">
                            <h6>Product & Projects</h6>
                            <h2>Innovative <span>[Products]</span> & <span>[Projects]</span> <br />Delivered</h2>
                            <p class="mt_12">Delivering quality, innovation, and precision.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="inner-container">
            <div class="project-tab">
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-12 col-sm-12 btn-column">
                        <div class="tab-btn-box z_99">
                            <ul class="tab-btns product-tab-btns clearfix">
                                <!-- Active tab button has 'active-btn' class -->
                                <li class="p-tab-btn active-btn" data-tab="#tab-11">
                                    <h6>All</h6>
                                </li>
                                <li class="p-tab-btn" data-tab="#tab-12">
                                    <h6>Products</h6>
                                </li>
                                <li class="p-tab-btn" data-tab="#tab-13">
                                    <h6>Projects</h6>
                                </li>
                            </ul>
                            <!-- Owl Counter -->
                            <div class="owl-counter" style="margin-top: 250px;">
                                <div class="counter-text">
                                    <span class="current">01</span><span class="separator"> /</span><span
                                        class="total">04</span>
                                </div>
                                <div class="owl-nav-custom">
                                    <button class="owl-prev-custom"><i class="flaticon-right"></i> PREV</button>
                                    <button class="owl-next-custom">NEXT <i class="flaticon-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12 col-sm-12 content-column">
                        <div class="p-tabs-content">
                            <!-- Tab 11 - All (Active Tab) -->
                            <div class="p-tab active-tab" id="tab-11">
                                <div class="single-item-carousel owl-carousel owl-theme nav-style-one">
                            
                                    {{-- PRODUCTS --}}
                                    @if ($products->count())    
                                        @foreach ($products as $product)
                                            <div class="project-block-one">
                                                <div class="inner-box">
                                                    <div class="bg-layer"
                                                        style="background-image: url({{ asset('storage/'.$product->image) }});">
                                                    </div>
                                
                                                    <span class="category">{{ $product->category }}</span>
                                
                                                    <div class="content-box">
                                                        <h3>{{ $product->title }}</h3>
                                                        <p>{{ Str::limit($product->description, 80) }}</p>
                                
                                                        <h6>type</h6>
                                                        <span class="text">Product</span>
                                
                                                        <a href="#"><i class="flaticon-right-arrow"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                            
                                    {{-- PROJECTS --}}
                                    @if ($projects->count())    
                                        @foreach ($projects as $project)
                                            <div class="project-block-one">
                                                <div class="inner-box">
                                                    <div class="bg-layer"
                                                        style="background-image: url({{ asset('storage/'.$project->image) }});">
                                                    </div>
                                
                                                    <span class="category">{{ $project->category }}</span>
                                
                                                    <div class="content-box">
                                                        <h3>{{ $project->title }}</h3>
                                                        <p>{{ Str::limit($project->description, 80) }}</p>
                                
                                                        <h6>client</h6>
                                                        <span class="text">{{ $project->client }}</span>
                                
                                                        <a href="#"><i class="flaticon-right-arrow"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                            
                                </div>
                            </div>                            

                            <!-- Tab 12 - Products -->
                            <div class="p-tab" id="tab-12">
                                <div class="single-item-carousel owl-carousel owl-theme nav-style-one">
                                    @if ($products->count())    
                                        @foreach ($products as $product)
                                            <div class="project-block-one">
                                                <div class="inner-box">
                                                    <div class="bg-layer"
                                                        style="background-image: url({{ asset('storage/'.$product->image) }});">
                                                    </div>
                                
                                                    <span class="category">{{ $product->category }}</span>
                                
                                                    <div class="content-box">
                                                        <h3>{{ $product->title }}</h3>
                                                        <p>{{ Str::limit($product->description, 80) }}</p>
                                
                                                        <h6>type</h6>
                                                        <span class="text">Product</span>
                                
                                                        <a href="#"><i class="flaticon-right-arrow"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                            
                                </div>
                            </div>
                            

                            <!-- Tab 13 - Projects -->
                            <div class="p-tab" id="tab-13">
                                <div class="single-item-carousel owl-carousel owl-theme nav-style-one">
                                    @if ($projects->count())    
                                        @foreach ($projects as $project)
                                            <div class="project-block-one">
                                                <div class="inner-box">
                                                    <div class="bg-layer"
                                                        style="background-image: url({{ asset('storage/'.$project->image) }});">
                                                    </div>
                                
                                                    <span class="category">{{ $project->category }}</span>
                                
                                                    <div class="content-box">
                                                        <h3>{{ $project->title }}</h3>
                                                        <p>{{ Str::limit($project->description, 80) }}</p>
                                
                                                        <h6>client</h6>
                                                        <span class="text">{{ $project->client }}</span>
                                
                                                        <a href="#"><i class="flaticon-right-arrow"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                            
                                </div>
                            </div>
                            

                            <!-- Tab 14 - Energy -->
                            {{-- <div class="p-tab" id="tab-14">
                                <div class="single-item-carousel owl-carousel owl-theme nav-style-one">
                                    <div class="project-block-one">
                                        <div class="inner-box">
                                            <div class="bg-layer"
                                                style="background-image: url({{ asset('images/project/project-2.jpg') }});">
                                            </div>
                                            <span class="category">Energy</span>
                                            <div class="content-box">
                                                <h3>Factory Expansion Project</h3>
                                                <p>Durable and innovative metal bridge, designed with precision...</p>
                                                <h6>client</h6>
                                                <span class="text">Energy Producer Ltd</span>
                                                <a href="#"><i class="flaticon-right-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="project-block-one">
                                        <div class="inner-box">
                                            <div class="bg-layer"
                                                style="background-image: url({{ asset('images/project/project-1.jpg') }});">
                                            </div>
                                            <span class="category">Energy</span>
                                            <div class="content-box">
                                                <h3>Solar Panel Installation</h3>
                                                <p>Durable and innovative metal bridge, designed with precision...</p>
                                                <h6>client</h6>
                                                <span class="text">Energy Producer Ltd</span>
                                                <a href="#"><i class="flaticon-right-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="project-block-one">
                                        <div class="inner-box">
                                            <div class="bg-layer"
                                                style="background-image: url({{ asset('images/project/project-3.jpg') }});">
                                            </div>
                                            <span class="category">Energy</span>
                                            <div class="content-box">
                                                <h3>Power Plant Upgrade</h3>
                                                <p>Durable and innovative metal bridge, designed with precision...</p>
                                                <h6>client</h6>
                                                <span class="text">Energy Producer Ltd</span>
                                                <a href="#"><i class="flaticon-right-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <!-- Tab 15 - Transportation -->
                            {{-- <div class="p-tab" id="tab-15">
                                <div class="single-item-carousel owl-carousel owl-theme nav-style-one">
                                    <div class="project-block-one">
                                        <div class="inner-box">
                                            <div class="bg-layer"
                                                style="background-image: url({{ asset('images/project/project-1.jpg') }});">
                                            </div>
                                            <span class="category">Transportation</span>
                                            <div class="content-box">
                                                <h3>Transportation Hub Center</h3>
                                                <p>Durable and innovative metal bridge, designed with precision...</p>
                                                <h6>client</h6>
                                                <span class="text">Energy Producer Ltd</span>
                                                <a href="#"><i class="flaticon-right-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="project-block-one">
                                        <div class="inner-box">
                                            <div class="bg-layer"
                                                style="background-image: url({{ asset('images/project/project-2.jpg') }});">
                                            </div>
                                            <span class="category">Transportation</span>
                                            <div class="content-box">
                                                <h3>Railway Station Project</h3>
                                                <p>Durable and innovative metal bridge, designed with precision...</p>
                                                <h6>client</h6>
                                                <span class="text">Energy Producer Ltd</span>
                                                <a href="#"><i class="flaticon-right-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="project-block-one">
                                        <div class="inner-box">
                                            <div class="bg-layer"
                                                style="background-image: url({{ asset('images/project/project-3.jpg') }});">
                                            </div>
                                            <span class="category">Transportation</span>
                                            <div class="content-box">
                                                <h3>Airport Terminal Build</h3>
                                                <p>Durable and innovative metal bridge, designed with precision...</p>
                                                <h6>client</h6>
                                                <span class="text">Energy Producer Ltd</span>
                                                <a href="#"><i class="flaticon-right-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <!-- Tab 16 - Custom -->
                            {{-- <div class="p-tab" id="tab-16">
                                <div class="single-item-carousel owl-carousel owl-theme nav-style-one">
                                    <div class="project-block-one">
                                        <div class="inner-box">
                                            <div class="bg-layer"
                                                style="background-image: url({{ asset('images/project/project-2.jpg') }});">
                                            </div>
                                            <span class="category">Custom</span>
                                            <div class="content-box">
                                                <h3>Custom Steel Works</h3>
                                                <p>Durable and innovative metal bridge, designed with precision...</p>
                                                <h6>client</h6>
                                                <span class="text">Energy Producer Ltd</span>
                                                <a href="#"><i class="flaticon-right-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="project-block-one">
                                        <div class="inner-box">
                                            <div class="bg-layer"
                                                style="background-image: url({{ asset('images/project/project-1.jpg') }});">
                                            </div>
                                            <span class="category">Custom</span>
                                            <div class="content-box">
                                                <h3>Custom Metal Fabrication</h3>
                                                <p>Durable and innovative metal bridge, designed with precision...</p>
                                                <h6>client</h6>
                                                <span class="text">Energy Producer Ltd</span>
                                                <a href="#"><i class="flaticon-right-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="project-block-one">
                                        <div class="inner-box">
                                            <div class="bg-layer"
                                                style="background-image: url({{ asset('images/project/project-3.jpg') }});">
                                            </div>
                                            <span class="category">Custom</span>
                                            <div class="content-box">
                                                <h3>Bespoke Steel Solutions</h3>
                                                <p>Durable and innovative metal bridge, designed with precision...</p>
                                                <h6>client</h6>
                                                <span class="text">Energy Producer Ltd</span>
                                                <a href="#"><i class="flaticon-right-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>
{{-- Project Section End --}}