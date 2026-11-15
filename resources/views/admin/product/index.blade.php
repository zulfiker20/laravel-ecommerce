@extends('admin.layouts.app')

@section('content') <div class="page-content">

    <!-- Breadcrumb -->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Product List</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item">
                        <a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active">Product List</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="{{ route('admin.product.create') }}" class="btn btn-primary">
                <i class="bx bx-plus"></i> Add Product
            </a>
        </div>
    </div>

    <!-- Product Table -->
    <div class="card">
        <div class="card-body">

            <div class="d-flex align-items-center mb-3">
                <h5 class="mb-0">All Products</h5>
                <div class="ms-auto">
                   
                </div>
            </div>

            <hr>

            <div class="table-responsive">
                <table class="table table-striped table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th width="5%">SL</th>
                            <th width="10%">Thumbnail</th>
                            <th>Product Name</th>
                            <th>Code</th>
                            <th>Brand</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Images</th>
                            <th>Status</th>
                            <th width="12%">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($products as $key => $product)
                            <tr>
                                <td></td>

                                <td>
                                    <img src="{{ asset($product->product_thumbnail) }}"
                                         width="65"
                                         height="65"
                                         style="object-fit: cover; border-radius: 5px;">
                                </td>

                                <td>
                                    <strong>{{ $product->product_name }}</strong>
                                    <br>
                                    <small class="text-muted">
                                        {{ $product->product_slug }}
                                    </small>
                                </td>

                                <td>{{ $product->product_code }}</td>

                                <td>{{ $product->brand->name ?? 'N/A' }}</td>

                                <td>
                                    {{ $product->category->name ?? 'N/A' }}
                                </td>

                                <td>
                                    <strong>৳{{ $product->selling_price }}</strong>
                                    @if($product->discount_price)
                                        <br>
                                        <del class="text-danger">
                                            ৳{{ $product->discount_price }}
                                        </del>
                                    @endif
                                </td>

                                <td>{{ $product->product_qty }}</td>

                                <td>
                                    <span class="badge bg-info">
                                       
                                    </span>
                                </td>

                                <td>
                                    @if($product->status == 'active')
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>

                                <td>
                                    <div class="d-flex gap-2">

                                        <a href="{{ route('admin.product.edit', $product->id) }}"
                                           class="btn btn-sm btn-warning">
                                            <i class="bx bx-edit"></i>
                                        </a>

                                        <form action=""
                                              method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this product?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="11" class="text-center">
                                    <h6 class="text-danger mb-0">No Product Found!</h6>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-3">
               
            </div>

        </div>
    </div>

</div>


@endsection