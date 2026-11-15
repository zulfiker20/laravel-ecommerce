        @extends('front.layouts.app')
        @section('content')
            <section class="home-slider position-relative mb-30">
                <div class="container">
                    <div class="home-slide-cover mt-30">
                        <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                            @foreach ($sliders as $slider)
                                <div class="single-hero-slider single-animation-wrap"
                                    style="background-image: url(assets/imgs/slider/slider-1.png)">
                                    <div class="slider-content">
                                        <h1 class="display-2 mb-40">
                                            {{ $slider->title }}
                                        </h1>
                                        <p class="mb-65">{{ $slider->sub_title }}</p>
                                        <form class="form-subcriber d-flex">
                                            <input type="email" placeholder="Your emaill address" />
                                            <button class="btn" type="submit">Subscribe</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="slider-arrow hero-slider-1-arrow"></div>
                    </div>
                </div>
            </section>
            <!--End hero slider-->
            <section class="popular-categories section-padding">
                <div class="container wow animate__animated animate__fadeIn">
                    <div class="section-title">
                        <div class="title">
                            <h3>Featured Categories</h3>

                        </div>
                        <div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow"
                            id="carausel-10-columns-arrows"></div>
                    </div>
                    <div class="carausel-10-columns-cover position-relative">
                        <div class="carausel-10-columns" id="carausel-10-columns">
                            @foreach ($categories as $category)
                                <div class="card-2 bg-9 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                                    <figure class="img-hover-scale overflow-hidden">
                                        <a href="shop-grid-right.html"><img src="{{ asset('$category->image') }}"
                                                alt="" /></a>
                                    </figure>
                                    <h6><a href="shop-grid-right.html">{{ $category->name }}</a></h6>
                                    <span>26 items</span>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </section>
            <!--End category slider-->
            <section class="banners mb-25">
                <div class="container">
                    <div class="row">
                        @foreach ($banners as $banner)
                            <div class="col-lg-4 col-md-6">
                                <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay="0">
                                    <img src="{{ asset('$banner->image') }}" alt="{{ $banner->title }}" />
                                    <div class="banner-text">
                                        <h4>
                                            {{ $banner->title }}
                                        </h4>
                                        <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i
                                                class="fi-rs-arrow-small-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </section>
            <!--End banners-->




            <section class="product-tabs section-padding position-relative">
                <div class="container">
                    <div class="section-title style-2 wow animate__animated animate__fadeIn">
                        <h3> New Products </h3>
                        <ul class="nav nav-tabs links" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab"
                                    data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one"
                                    aria-selected="true">All</button>
                            </li>
                            @foreach ($categories->take(6) as $category)
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="nav-tab-two" href="#category{{ $category->id }}"
                                        data-bs-toggle="tab" type="button" role="tab"
                                        aria-controls="tab-two" aria-selected="false">{{ $category->name }}</a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                    <!--End nav-tabs-->
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                            <div class="row product-grid-4">
                                @foreach ($products->take(15) as $product)
                                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn"
                                            data-wow-delay=".1s">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="shop-product-right.html">
                                                        <img class="default-img" src="assets/imgs/shop/product-1-1.jpg"
                                                            alt="" />
                                                        <img class="hover-img" src="assets/imgs/shop/product-1-2.jpg"
                                                            alt="" />
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Add To Wishlist" class="action-btn"
                                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                                            class="fi-rs-shuffle"></i></a>
                                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                                </div>
                                                @php
                                                    $amount = $product->selling_price - $product->discount_price;
                                                    $discount = ($amount / $product->selling_price) * 100;

                                                @endphp
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    @if ($product->discount_price == null)
                                                        <span class="new">New</span>
                                                    @else
                                                        <span class="hot"> {{ round($discount) }} %</span>
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <div class="product-category">
                                                    <a href="shop-grid-right.html">Snack</a>
                                                </div>
                                                <h2><a href="shop-product-right.html">{{ $product->product_name }}</a>
                                                </h2>
                                                <div class="product-rate-cover">
                                                    <div class="product-rate d-inline-block">
                                                        <div class="product-rating" style="width: 90%"></div>
                                                    </div>
                                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                                </div>
                                                <div>
                                                    @if ($product->vendor_id == null)
                                                        <span class="font-small text-muted">By <a
                                                                href="vendor-details-1.html">Owner</a></span>
                                                    @else
                                                        <span class="font-small text-muted">By <a
                                                                href="vendor-details-1.html">{{ $product->vendor->name ?? 'Unknown' }}</a></span>
                                                    @endif

                                                </div>
                                                <div class="product-card-bottom">
                                                    @if ($product->discount_price == null)
                                                        <div class="product-price">
                                                            <span>${{ $product->selling_price }}</span>
                                                        </div>
                                                    @else
                                                        <div class="product-price">
                                                            <span>${{ $product->discount_price }}</span>
                                                            <span class="old-price">${{ $product->selling_price }}</span>
                                                        </div>
                                                    @endif
                                                    <div class="add-cart">
                                                        <a class="add" href="shop-cart.html"><i
                                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end product card-->
                                @endforeach
                            </div>
                            <!--End product-grid-4-->
                        </div>
                        <!--En tab one-->

                        @foreach ($categories as $category)
                            <div class="tab-pane fade" id="category{{ $category->id }}" role="tabpanel"
                                aria-labelledby="tab-two">
                                <div class="row product-grid-4">
                                    @php
                                        $catwiseProduct = App\Models\Product::where('category_id', $category->id)
                                            ->orderBy('id', 'DESC')
                                            ->get();
                                    @endphp
                                    @forelse ($catwiseProduct->take(15) as $product)
                                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                            <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn"
                                                data-wow-delay=".1s">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="shop-product-right.html">
                                                            <img class="default-img"
                                                                src="assets/imgs/shop/product-1-1.jpg" alt="" />
                                                            <img class="hover-img" src="assets/imgs/shop/product-1-2.jpg"
                                                                alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="Add To Wishlist" class="action-btn"
                                                            href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                        <a aria-label="Compare" class="action-btn"
                                                            href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                        <a aria-label="Quick view" class="action-btn"
                                                            data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                                class="fi-rs-eye"></i></a>
                                                    </div>
                                                    @php
                                                        $amount = $product->selling_price - $product->discount_price;
                                                        $discount = ($amount / $product->selling_price) * 100;

                                                    @endphp
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        @if ($product->discount_price == null)
                                                            <span class="new">New</span>
                                                        @else
                                                            <span class="hot"> {{ round($discount) }} %</span>
                                                        @endif

                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <div class="product-category">
                                                        <a href="shop-grid-right.html">Snack</a>
                                                    </div>
                                                    <h2><a href="shop-product-right.html">{{ $product->product_name }}</a>
                                                    </h2>
                                                    <div class="product-rate-cover">
                                                        <div class="product-rate d-inline-block">
                                                            <div class="product-rating" style="width: 90%"></div>
                                                        </div>
                                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                                    </div>
                                                    <div>
                                                        @if ($product->vendor_id == null)
                                                            <span class="font-small text-muted">By <a
                                                                    href="vendor-details-1.html">Owner</a></span>
                                                        @else
                                                            <span class="font-small text-muted">By <a
                                                                    href="vendor-details-1.html">{{ $product->vendor->name ?? 'Unknown' }}</a></span>
                                                        @endif

                                                    </div>
                                                    <div class="product-card-bottom">
                                                        @if ($product->discount_price == null)
                                                            <div class="product-price">
                                                                <span>${{ $product->selling_price }}</span>
                                                            </div>
                                                        @else
                                                            <div class="product-price">
                                                                <span>${{ $product->discount_price }}</span>
                                                                <span
                                                                    class="old-price">${{ $product->selling_price }}</span>
                                                            </div>
                                                        @endif
                                                        <div class="add-cart">
                                                            <a class="add" href="shop-cart.html"><i
                                                                    class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end product card-->
                                    @empty
                                        <h1>No product found</h1>
                                    @endforelse

                                </div>
                                <!--End product-grid-4-->
                            </div>
                        @endforeach
                    </div>
                    <!--End tab-content-->
                </div>
            </section>
            <!--Products Tabs-->




            <section class="section-padding pb-5">
                <div class="container">
                    <div class="section-title wow animate__animated animate__fadeIn">
                        <h3 class=""> Featured Products </h3>

                    </div>
                    <div class="row">
                        <div class="col-lg-3 d-none d-lg-flex wow animate__animated animate__fadeIn">
                            <div class="banner-img style-2">
                                <div class="banner-text">
                                    <h2 class="mb-100">Bring nature into your home</h2>
                                    <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i
                                            class="fi-rs-arrow-small-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                            <div class="tab-content" id="myTabContent-1">
                                <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel"
                                    aria-labelledby="tab-one-1">
                                    <div class="carausel-4-columns-cover arrow-center position-relative">
                                        <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow"
                                            id="carausel-4-columns-arrows"></div>
                                        <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">
                                            <div class="product-cart-wrap">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="shop-product-right.html">
                                                            <img class="default-img"
                                                                src="assets/imgs/shop/product-1-1.jpg" alt="" />
                                                            <img class="hover-img" src="assets/imgs/shop/product-1-2.jpg"
                                                                alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="Quick view" class="action-btn small hover-up"
                                                            data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i
                                                                class="fi-rs-eye"></i></a>
                                                        <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                                            href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                        <a aria-label="Compare" class="action-btn small hover-up"
                                                            href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                    </div>
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="hot">Save 15%</span>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <div class="product-category">
                                                        <a href="shop-grid-right.html">Hodo Foods</a>
                                                    </div>
                                                    <h2><a href="shop-product-right.html">Seeds of Change Organic Quinoa,
                                                            Brown</a></h2>
                                                    <div class="product-rate d-inline-block">
                                                        <div class="product-rating" style="width: 80%"></div>
                                                    </div>
                                                    <div class="product-price mt-10">
                                                        <span>$238.85 </span>
                                                        <span class="old-price">$245.8</span>
                                                    </div>
                                                    <div class="sold mt-15 mb-15">
                                                        <div class="progress mb-5">
                                                            <div class="progress-bar" role="progressbar"
                                                                style="width: 50%" aria-valuemin="0" aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                        <span class="font-xs text-heading"> Sold: 90/120</span>
                                                    </div>
                                                    <a href="shop-cart.html" class="btn w-100 hover-up"><i
                                                            class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                                </div>
                                            </div>
                                            <!--End product Wrap-->
                                        </div>
                                    </div>
                                </div>
                                <!--End tab-pane-->


                            </div>
                            <!--End tab-content-->
                        </div>
                        <!--End Col-lg-9-->
                    </div>
                </div>
            </section>
            <!--End Best Sales-->









            <!-- TV Category -->

            <section class="product-tabs section-padding position-relative">
                <div class="container">
                    <div class="section-title style-2 wow animate__animated animate__fadeIn">
                        <h3>TV Category </h3>

                    </div>
                    <!--End nav-tabs-->
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                            <div class="row product-grid-4">



                                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                    <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn"
                                        data-wow-delay=".1s">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="shop-product-right.html">
                                                    <img class="default-img" src="assets/imgs/shop/product-1-1.jpg"
                                                        alt="" />
                                                    <img class="hover-img" src="assets/imgs/shop/product-1-2.jpg"
                                                        alt="" />
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Add To Wishlist" class="action-btn"
                                                    href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                                        class="fi-rs-shuffle"></i></a>
                                                <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                                    data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot">Hot</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="shop-grid-right.html">Snack</a>
                                            </div>
                                            <h2><a href="shop-product-right.html">Seeds of Change Organic Quinoa, Brown,
                                                </a></h2>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                            <div>
                                                <span class="font-small text-muted">By <a
                                                        href="vendor-details-1.html">NestFood</a></span>
                                            </div>
                                            <div class="product-card-bottom">
                                                <div class="product-price">
                                                    <span>$28.85</span>
                                                    <span class="old-price">$32.8</span>
                                                </div>
                                                <div class="add-cart">
                                                    <a class="add" href="shop-cart.html"><i
                                                            class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end product card-->

                            </div>
                            <!--End product-grid-4-->
                        </div>


                    </div>
                    <!--End tab-content-->
                </div>


            </section>
            <!--End TV Category -->





            <!-- Tshirt Category -->

            <section class="product-tabs section-padding position-relative">
                <div class="container">
                    <div class="section-title style-2 wow animate__animated animate__fadeIn">
                        <h3>Tshirt Category </h3>

                    </div>
                    <!--End nav-tabs-->
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                            <div class="row product-grid-4">



                                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                    <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn"
                                        data-wow-delay=".1s">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="shop-product-right.html">
                                                    <img class="default-img" src="assets/imgs/shop/product-1-1.jpg"
                                                        alt="" />
                                                    <img class="hover-img" src="assets/imgs/shop/product-1-2.jpg"
                                                        alt="" />
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Add To Wishlist" class="action-btn"
                                                    href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                                        class="fi-rs-shuffle"></i></a>
                                                <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                                    data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot">Hot</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="shop-grid-right.html">Snack</a>
                                            </div>
                                            <h2><a href="shop-product-right.html">Seeds of Change Organic Quinoa, Brown,
                                                </a></h2>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                            <div>
                                                <span class="font-small text-muted">By <a
                                                        href="vendor-details-1.html">NestFood</a></span>
                                            </div>
                                            <div class="product-card-bottom">
                                                <div class="product-price">
                                                    <span>$28.85</span>
                                                    <span class="old-price">$32.8</span>
                                                </div>
                                                <div class="add-cart">
                                                    <a class="add" href="shop-cart.html"><i
                                                            class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end product card-->

                            </div>
                            <!--End product-grid-4-->
                        </div>


                    </div>
                    <!--End tab-content-->
                </div>


            </section>
            <!--End Tshirt Category -->








            <!-- Computer Category -->

            <section class="product-tabs section-padding position-relative">
                <div class="container">
                    <div class="section-title style-2 wow animate__animated animate__fadeIn">
                        <h3>Computer Category </h3>

                    </div>
                    <!--End nav-tabs-->
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                            <div class="row product-grid-4">



                                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                    <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn"
                                        data-wow-delay=".1s">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="shop-product-right.html">
                                                    <img class="default-img" src="assets/imgs/shop/product-1-1.jpg"
                                                        alt="" />
                                                    <img class="hover-img" src="assets/imgs/shop/product-1-2.jpg"
                                                        alt="" />
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Add To Wishlist" class="action-btn"
                                                    href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                                        class="fi-rs-shuffle"></i></a>
                                                <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                                    data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot">Hot</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="shop-grid-right.html">Snack</a>
                                            </div>
                                            <h2><a href="shop-product-right.html">Seeds of Change Organic Quinoa, Brown,
                                                </a></h2>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                            <div>
                                                <span class="font-small text-muted">By <a
                                                        href="vendor-details-1.html">NestFood</a></span>
                                            </div>
                                            <div class="product-card-bottom">
                                                <div class="product-price">
                                                    <span>$28.85</span>
                                                    <span class="old-price">$32.8</span>
                                                </div>
                                                <div class="add-cart">
                                                    <a class="add" href="shop-cart.html"><i
                                                            class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end product card-->

                            </div>
                            <!--End product-grid-4-->
                        </div>


                    </div>
                    <!--End tab-content-->
                </div>


            </section>
            <!--End Computer Category -->




















            <section class="section-padding mb-30">
                <div class="container">
                    <div class="row">

                        <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-xl-block wow animate__animated animate__fadeInUp"
                            data-wow-delay=".3s">
                            <h4 class="section-title style-1 mb-30 animated animated"> Special Deals </h4>
                            <div class="product-list-small animated animated">
                                <article class="row align-items-center hover-up">
                                    <figure class="col-md-4 mb-0">
                                        <a href="shop-product-right.html"><img src="assets/imgs/shop/thumbnail-10.jpg"
                                                alt="" /></a>
                                    </figure>
                                    <div class="col-md-8 mb-0">
                                        <h6>
                                            <a href="shop-product-right.html">Foster Farms Takeout Crispy Classic Buffalo
                                                Wings</a>
                                        </h6>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div class="product-price">
                                            <span>$32.85</span>
                                            <span class="old-price">$33.8</span>
                                        </div>
                                    </div>
                                </article>
                                <article class="row align-items-center hover-up">
                                    <figure class="col-md-4 mb-0">
                                        <a href="shop-product-right.html"><img src="assets/imgs/shop/thumbnail-11.jpg"
                                                alt="" /></a>
                                    </figure>
                                    <div class="col-md-8 mb-0">
                                        <h6>
                                            <a href="shop-product-right.html">Angie’s Boomchickapop Sweet & Salty Kettle
                                                Corn</a>
                                        </h6>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div class="product-price">
                                            <span>$32.85</span>
                                            <span class="old-price">$33.8</span>
                                        </div>
                                    </div>
                                </article>
                                <article class="row align-items-center hover-up">
                                    <figure class="col-md-4 mb-0">
                                        <a href="shop-product-right.html"><img src="assets/imgs/shop/thumbnail-12.jpg"
                                                alt="" /></a>
                                    </figure>
                                    <div class="col-md-8 mb-0">
                                        <h6>
                                            <a href="shop-product-right.html">All Natural Italian-Style Chicken
                                                Meatballs</a>
                                        </h6>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div class="product-price">
                                            <span>$32.85</span>
                                            <span class="old-price">$33.8</span>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--End 4 columns-->









            <!--Vendor List -->

            <div class="container">

                <div class="section-title wow animate__animated animate__fadeIn" data-wow-delay="0">
                    <h3 class="">All Our Vendor List </h3>
                    <a class="show-all" href="shop-grid-right.html">
                        All Vendors
                        <i class="fi-rs-angle-right"></i>
                    </a>
                </div>


                <div class="row vendor-grid">
                    <div class="col-lg-3 col-md-6 col-12 col-sm-6 justify-content-center">
                        <div class="vendor-wrap mb-40">
                            <div class="vendor-img-action-wrap">
                                <div class="vendor-img">
                                    <a href="vendor-details-1.html">
                                        <img class="default-img" src="assets/imgs/vendor/vendor-1.png" alt="" />
                                    </a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Mall</span>
                                </div>
                            </div>
                            <div class="vendor-content-wrap">
                                <div class="d-flex justify-content-between align-items-end mb-30">
                                    <div>
                                        <div class="product-category">
                                            <span class="text-muted">Since 2012</span>
                                        </div>
                                        <h4 class="mb-5"><a href="vendor-details-1.html">Nature Food</a></h4>
                                        <div class="product-rate-cover">

                                            <span class="font-small total-product">380 products</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="vendor-info mb-30">
                                    <ul class="contact-infor text-muted">

                                        <li><img src="assets/imgs/theme/icons/icon-contact.svg"
                                                alt="" /><strong>Call Us:</strong><span>(+91) -
                                                540-025-124553</span></li>
                                    </ul>
                                </div>
                                <a href="vendor-details-1.html" class="btn btn-xs">Visit Store <i
                                        class="fi-rs-arrow-small-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!--end vendor card-->


                </div>
            </div>


            <!--End Vendor List -->
        @endsection
