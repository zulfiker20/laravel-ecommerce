@extends('admin.layouts.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="container">

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Coupon List</h4>

                    <a href="{{ route('admin.coupon.create') }}"
                       class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Add Coupon
                    </a>
                </div>

                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table id="datatable"
                            class="table table-bordered table-striped dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                            <thead>
                                <tr>
                                    <th style="width: 60px;">SL</th>
                                    <th>Coupon Name</th>
                                    <th>Discount (%)</th>
                                    <th>Coupon Validity</th>
                                    <th>Status</th>
                                    <th style="width: 130px;">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($coupons as $coupon)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>{{ $coupon->coupon_name }}</td>

                                        <td>{{ $coupon->coupon_discount }}%</td>

                                        <td>{{ $coupon->coupon_validity }}</td>

                                        <td>
                                            @if($coupon->status == 1)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>

                                        <td>
                                            <a href="{{ route('admin.coupon.edit', $coupon->id) }}"
                                               class="btn btn-sm btn-primary">
                                                Edit
                                            </a>

                                            <form action="{{ route('admin.coupon.delete', $coupon->id) }}"
                                                  method="POST"
                                                  style="display: inline-block;">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this coupon?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection