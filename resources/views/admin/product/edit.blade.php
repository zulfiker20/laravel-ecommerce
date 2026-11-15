@extends('admin.layouts.app')

@section('content')
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Edit Product</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Edit Product</h5>
                <hr />
                <form action="{{ route('admin.product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                  {{-- আপনার রাউট POST হলে এই লাইনটি মুছে দিন --}}
                    
                    <input type="hidden" name="old_image" value="{{ $product->product_thumbnail }}">

                    <div class="form-body mt-4">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="border border-3 p-4 rounded">

                                    <div class="mb-3">
                                        <label for="inputProductTitle" class="form-label">Product Name</label>
                                        <input type="text" name="product_name" class="form-control"
                                            id="inputProductTitle" value="{{ old('product_name', $product->product_name) }}"
                                            placeholder="Enter product title">
                                    </div>

                                    <div class="mb-3">
                                        <label for="inputProductTags" class="form-label">Product Tags</label>
                                        <input type="text" name="product_tags" class="form-control" data-role="tagsinput"
                                            value="{{ old('product_tags', $product->product_tags) }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="inputProductSize" class="form-label">Product Size</label>
                                        <input type="text" name="product_size" class="form-control" data-role="tagsinput"
                                            value="{{ old('product_size', $product->product_size) }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="inputProductColor" class="form-label">Product Color</label>
                                        <input type="text" name="product_color" class="form-control"
                                            data-role="tagsinput" value="{{ old('product_color', $product->product_color) }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="inputProductDescription" class="form-label">Short Description</label>
                                        <textarea name="short_descp" class="form-control" id="inputProductDescription" rows="3">{{ old('short_descp', $product->short_descp) }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="mytextarea" class="form-label">Long Description</label>
                                        <textarea id="mytextarea" name="long_descp" class="form-control" rows="3">{!! old('long_descp', $product->long_descp) !!}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Main Thumbnail</label>
                                        <input name="product_thumbnail" class="form-control" type="file" id="formFile" onchange="mainThamUrl(this)">
                                        <div class="mt-2">
                                            <img src="{{ asset($product->product_thumbnail) }}" id="mainThmb" style="width: 100px; height: 100px; object-fit: cover;" class="border rounded">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="formFileMultiple" class="form-label">Multiple Image</label>
                                        <input class="form-control" name="multi_img[]" type="file" id="formFileMultiple" multiple="">
                                        
                                        {{-- পুরনো মাল্টিপল ইমেজ দেখানোর জন্য --}}
                                        @if(isset($multiImgs) && count($multiImgs) > 0)
                                            <div class="row mt-3">
                                                @foreach($multiImgs as $img)
                                                    <div class="col-md-3 mb-2 text-center">
                                                        <img src="{{ asset($img->photo_name) }}" style="width: 80px; height: 80px; object-fit: cover;" class="border rounded mb-1">
                                                        {{-- ডিলিট বাটন রাখতে চাইলে নিচের লিংক ব্যবহার করতে পারেন --}}
                                                        {{-- <a href="{{ route('admin.product.multiimg.delete', $img->id) }}" class="btn btn-danger btn-sm d-block">Delete</a> --}}
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="border border-3 p-4 rounded">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="inputPrice" class="form-label">Price</label>
                                            <input name="selling_price" type="text" class="form-control" id="inputPrice"
                                                value="{{ old('selling_price', $product->selling_price) }}" placeholder="00.00">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="inputCompareatprice" class="form-label">Discount</label>
                                            <input name="discount_price" type="text" class="form-control"
                                                id="inputCompareatprice" value="{{ old('discount_price', $product->discount_price) }}" placeholder="00.00">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="inputCostPerPrice" class="form-label">Code</label>
                                            <input name="product_code" type="text" class="form-control"
                                                id="inputCostPerPrice" value="{{ old('product_code', $product->product_code) }}" placeholder="00.00">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="inputStarPoints" class="form-label">Product quantity</label>
                                            <input name="product_qty" type="text" class="form-control"
                                                id="inputStarPoints" value="{{ old('product_qty', $product->product_qty) }}" placeholder="00.00">
                                        </div>

                                        <div class="col-12">
                                            <label for="inputProductType" class="form-label">Brand</label>
                                            <select name="brand_id" class="form-select" id="inputProductType">
                                                <option value="">Select Brand</option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id ? 'selected' : '' }}>
                                                        {{ $brand->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-12">
                                            <label for="inputVendor" class="form-label">Vendor</label>
                                            <select name="vendor_id" class="form-select" id="inputVendor">
                                                <option value="">Select Vendor</option>
                                                <option value="1" {{ $product->vendor_id == 1 ? 'selected' : '' }}>One</option>
                                                <option value="2" {{ $product->vendor_id == 2 ? 'selected' : '' }}>Two</option>
                                                <option value="3" {{ $product->vendor_id == 3 ? 'selected' : '' }}>Three</option>
                                            </select>
                                        </div>

                                        <div class="col-12">
                                            <label for="inputCollection" class="form-label">Category</label>
                                            <select name="category_id" class="form-select" id="inputCollection">
                                                <option value="">Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label">Subcategory</label>
                                            <select name="subcategory_id" class="form-select">
                                                <option value="">Select Subcategory</option>
                                                @foreach ($subcategories as $subcategory)
                                                    <option value="{{ $subcategory->id }}" {{ $subcategory->id == $product->subcategory_id ? 'selected' : '' }}>
                                                        {{ $subcategory->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-12">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="hot_deals" type="checkbox"
                                                            value="1" id="hotDeals" {{ $product->hot_deals == 1 ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="hotDeals">Hot Deals</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="featured" type="checkbox"
                                                            value="1" id="featured" {{ $product->featured == 1 ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="featured">Featured</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="special_offer"
                                                            type="checkbox" value="1" id="specialOffer" {{ $product->special_offer == 1 ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="specialOffer">Special Offer</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="special_deals"
                                                            type="checkbox" value="1" id="specialDeals" {{ $product->special_deals == 1 ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="specialDeals">Special Deals</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary">Update Product</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div>
                </form>

            </div>
        </div>

    </div>

    @push('scripts')
        <script type="text/javascript">
            // নতুন থাম্বনেইল সিলেক্ট করলে লাইভ প্রিভিউ দেখানোর জন্য
            function mainThamUrl(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#mainThmb').attr('src', e.target.result).width(100).height(100);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

            // ক্যাটাগরি পরিবর্তন করলে সাব-ক্যাটাগরি লোড করার জন্য
            $(document).ready(function() {
                $('select[name="category_id"]').on('change', function() {
                    var category_id = $(this).val();
                    if (category_id) {
                        $.ajax({
                            url: "{{ url('/admin/subcategory/ajax') }}/" + category_id,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                $('select[name="subcategory_id"]').empty();
                                $.each(data, function(key, value) {
                                    $('select[name="subcategory_id"]').append(
                                        '<option value="' + value.id + '">' + value.name + '</option>');
                                });
                            },
                        });
                    } else {
                        $('select[name="subcategory_id"]').empty();
                    }
                });
            });
        </script>
    @endpush
@endsection