<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>Nest - Multipurpose eCommerce HTML Template</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front/assets/imgs/theme/favicon.svg') }}" />

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/assets/css/main.css?v=5.3') }}" />
</head>

<body>
    <!-- Modal -->

    <!-- Quick view -->
    @include('front.layouts.partials.quickview')
    <!-- Header  -->
    @include('front.layouts.partials.header')
    <!-- End Header  -->




    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href="index.html"><img src="assets/imgs/theme/logo.svg" alt="logo" /></a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="mobile-search search-style-3 mobile-header-border">
                    <form action="#">
                        <input type="text" placeholder="Search for items…" />
                        <button type="submit"><i class="fi-rs-search"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu font-heading">
                            <li class="menu-item-has-children">
                                <a href="index.html">Home</a>

                            </li>
                            <li class="menu-item-has-children">
                                <a href="shop-grid-right.html">shop</a>
                                <ul class="dropdown">
                                    <li><a href="shop-grid-right.html">Shop Grid – Right Sidebar</a></li>
                                    <li><a href="shop-grid-left.html">Shop Grid – Left Sidebar</a></li>
                                    <li><a href="shop-list-right.html">Shop List – Right Sidebar</a></li>
                                    <li><a href="shop-list-left.html">Shop List – Left Sidebar</a></li>
                                    <li><a href="shop-fullwidth.html">Shop - Wide</a></li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Single Product</a>
                                        <ul class="dropdown">
                                            <li><a href="shop-product-right.html">Product – Right Sidebar</a></li>
                                            <li><a href="shop-product-left.html">Product – Left Sidebar</a></li>
                                            <li><a href="shop-product-full.html">Product – No sidebar</a></li>
                                            <li><a href="shop-product-vendor.html">Product – Vendor Infor</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="shop-filter.html">Shop – Filter</a></li>
                                    <li><a href="shop-wishlist.html">Shop – Wishlist</a></li>
                                    <li><a href="shop-cart.html">Shop – Cart</a></li>
                                    <li><a href="shop-checkout.html">Shop – Checkout</a></li>
                                    <li><a href="shop-compare.html">Shop – Compare</a></li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Shop Invoice</a>
                                        <ul class="dropdown">
                                            <li><a href="shop-invoice-1.html">Shop Invoice 1</a></li>
                                            <li><a href="shop-invoice-2.html">Shop Invoice 2</a></li>
                                            <li><a href="shop-invoice-3.html">Shop Invoice 3</a></li>
                                            <li><a href="shop-invoice-4.html">Shop Invoice 4</a></li>
                                            <li><a href="shop-invoice-5.html">Shop Invoice 5</a></li>
                                            <li><a href="shop-invoice-6.html">Shop Invoice 6</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="menu-item-has-children">
                                <a href="#">Mega menu</a>
                                <ul class="dropdown">
                                    <li class="menu-item-has-children">
                                        <a href="#">Women's Fashion</a>
                                        <ul class="dropdown">
                                            <li><a href="shop-product-right.html">Dresses</a></li>
                                            <li><a href="shop-product-right.html">Blouses & Shirts</a></li>
                                            <li><a href="shop-product-right.html">Hoodies & Sweatshirts</a></li>
                                            <li><a href="shop-product-right.html">Women's Sets</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Men's Fashion</a>
                                        <ul class="dropdown">
                                            <li><a href="shop-product-right.html">Jackets</a></li>
                                            <li><a href="shop-product-right.html">Casual Faux Leather</a></li>
                                            <li><a href="shop-product-right.html">Genuine Leather</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Technology</a>
                                        <ul class="dropdown">
                                            <li><a href="shop-product-right.html">Gaming Laptops</a></li>
                                            <li><a href="shop-product-right.html">Ultraslim Laptops</a></li>
                                            <li><a href="shop-product-right.html">Tablets</a></li>
                                            <li><a href="shop-product-right.html">Laptop Accessories</a></li>
                                            <li><a href="shop-product-right.html">Tablet Accessories</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="blog-category-fullwidth.html">Blog</a>
                                <ul class="dropdown">
                                    <li><a href="blog-category-grid.html">Blog Category Grid</a></li>
                                    <li><a href="blog-category-list.html">Blog Category List</a></li>
                                    <li><a href="blog-category-big.html">Blog Category Big</a></li>
                                    <li><a href="blog-category-fullwidth.html">Blog Category Wide</a></li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Single Product Layout</a>
                                        <ul class="dropdown">
                                            <li><a href="blog-post-left.html">Left Sidebar</a></li>
                                            <li><a href="blog-post-right.html">Right Sidebar</a></li>
                                            <li><a href="blog-post-fullwidth.html">No Sidebar</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="page-about.html">About Us</a></li>
                                    <li><a href="page-contact.html">Contact</a></li>
                                    <li><a href="page-account.html">My Account</a></li>
                                    <li><a href="page-login.html">Login</a></li>
                                    <li><a href="page-register.html">Register</a></li>
                                    <li><a href="page-forgot-password.html">Forgot password</a></li>
                                    <li><a href="page-reset-password.html">Reset password</a></li>
                                    <li><a href="page-purchase-guide.html">Purchase Guide</a></li>
                                    <li><a href="page-privacy-policy.html">Privacy Policy</a></li>
                                    <li><a href="page-terms.html">Terms of Service</a></li>
                                    <li><a href="page-404.html">404 Page</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Language</a>
                                <ul class="dropdown">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">German</a></li>
                                    <li><a href="#">Spanish</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-header-info-wrap">
                    <div class="single-mobile-header-info">
                        <a href="page-contact.html"><i class="fi-rs-marker"></i> Our location </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="page-login.html"><i class="fi-rs-user"></i>Log In / Sign Up </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="#"><i class="fi-rs-headphones"></i>(+01) - 2345 - 6789 </a>
                    </div>
                </div>
                <div class="mobile-social-icon mb-50">
                    <h6 class="mb-15">Follow Us</h6>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-facebook-white.svg"
                            alt="" /></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-twitter-white.svg" alt="" /></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-instagram-white.svg"
                            alt="" /></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-pinterest-white.svg"
                            alt="" /></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-youtube-white.svg" alt="" /></a>
                </div>
                <div class="site-copyright">Copyright 2022 © Nest. All rights reserved. Powered by AliThemes.</div>
            </div>
        </div>
    </div>
    <!--End header-->








    <main class="main">
        @yield('content')
    </main>







    <!-- footer -->
    @include('front.layouts.partials.footer')
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="assets/imgs/theme/loading.gif" alt="" />
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor JS -->
    <script src="{{ asset('front/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>

    <!-- Plugins JS -->
    <script src="{{ asset('front/assets/js/plugins/slick.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/jquery.elevatezoom.js') }}"></script>

    <!-- Template JS -->
    <script src="{{ asset('front/assets/js/main.js?v=5.3') }}"></script>
    <script src="{{ asset('front/assets/js/shop.js?v=5.3') }}"></script>
    {{-- modal --}}
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function productView(id) {
            $.ajax({
                type: 'GET',
                url: '/product/view/modal/' + id,
                dataType: 'json',
                success: function(data) {
                    $('#pname').text(data.product.product_name);
                    $('#pprice').text(data.product.selling_price);
                    $('#pcode').text(data.product.product_code);
                    $('#pcategory').text(data.product.category.name);
                    $('#pbrand').text(data.product.brand.name);
                    $('#pimage').attr('src', '/' + data.product.product_thambnail);
                    if (data.product.discount_price == null) {
                        $('#pprice').text('');
                        $('#oldprice').text('');
                        $('#pprice').text(data.product.selling_price);

                    } else {
                        $('#pprice').text(data.product.discount_price);
                        $('#oldprice').text(data.product.selling_price);
                    } // end else

                    if (data.product.product_qty > 0) {
                        $('#aviable').text('');
                        $('#stockout').text('');
                        $('#aviable').text('aviable');

                    } else {
                        $('#aviable').text('');
                        $('#stockout').text('');
                        $('#stockout').text('stockout');
                    }
                    ///End Start Stock Option

                    ///Size 

                    $('select[name="size"]').empty();
                    $.each(data.size, function(key, value) {
                        $('select[name="size"]').append('<option value="' + value + ' ">' + value +
                            '  </option')
                        if (data.size == "") {
                            $('#sizeArea').hide();
                        } else {
                            $('#sizeArea').show();
                        }
                    }) // end size

                    $('select[name="color"]').empty();
                    $.each(data.color, function(key, value) {
                        $('select[name="color"]').append('<option value="' + value + ' ">' + value +
                            '  </option')
                        if (data.color == "") {
                            $('#colorArea').hide();
                        } else {
                            $('#colorArea').show();
                        }
                    }) // end size
                }
            })
        }
    </script>
    {{-- insert wishlist --}}
    <script>
        function addToWishList(product_id) {

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "/add-to-wishlist/" + product_id,

                success: function(data) {

                    if (data.success) {
                        alert(data.success);
                    }

                    if (data.error) {
                        alert(data.error);
                    }

                },


            });
        }
    </script>
    {{-- get wishlist --}}
    <script type="text/javascript">
        function wishlist() {
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/get-wishlist-product/",

                success: function(result) {

                    var rows = "";

                    $.each(result.wishlist, function(key, value) {

                        rows += `<tr class="pt-30">
            <td class="image product-thumbnail pt-40">
                <img src="/${value.product.product_thumbnail}" alt="#" />
            </td>

            <td class="product-des product-name">
                <h6>
                    <a class="product-name mb-10" href="shop-product-right.html">
                        ${value.product.product_name}
                    </a>
                </h6>
                <div class="product-rate-cover">
                    <div class="product-rate d-inline-block">
                        <div class="product-rating" style="width: 90%"></div>
                    </div>
                    <span class="font-small ml-5 text-muted">(4.0)</span>
                </div>
            </td>

            <td class="price" data-title="Price">
                ${value.product.discount_price == null
                    ? `<h3 class="text-brand">$${value.product.selling_price}</h3>`
                    : `<h3 class="text-brand">$${value.product.discount_price}</h3>`
                }
            </td>

            <td class="text-center detail-info" data-title="Stock">
                ${value.product.product_qty > 0
                    ? `<span class="stock-status in-stock mb-0">In Stock</span>`
                    : `<span class="stock-status out-stock mb-0">Stock Out</span>`
                }
            </td>

            <td class="action text-center" data-title="Remove">
                <a id="${value.id}" onclick="wishlistRemove(this.id)" class="text-body">
                    <i class="fi-rs-trash"></i>
                </a>
            </td>
        </tr>`;

                    });

                    $('#wishlistall').html(rows);

                }
            })
        }
        wishlist();

        function wishlistRemove(id) {
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/wishlist-remove/" + id,

                success: function(data) {
                    wishlist();
                    // Start Message 

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })

                    } else {

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }

                    // End Message  


                }
            })
        }
    </script>

</body>

</html>
