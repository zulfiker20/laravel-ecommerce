@extends('admin.layouts.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="container">

            <div class="card">
                <div class="card-header">
                    <h4>Edit Coupon</h4>
                </div>

                <div class="card-body">

                    <form action="{{ route('admin.coupon.update', $coupon->id) }}"
                          method="POST">

                        @csrf

                        {{-- Coupon Name --}}
                        <div class="row mb-4 align-items-center">
                            <label for="coupon_name"
                                class="col-sm-2 col-form-label text-secondary">
                                Coupon Name
                            </label>

                            <div class="col-sm-10">
                                <input type="text"
                                    name="coupon_name"
                                    id="coupon_name"
                                    value="{{ old('coupon_name', $coupon->coupon_name) }}"
                                    class="form-control"
                                    placeholder="Enter Coupon Name">

                                @error('coupon_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- Coupon Discount --}}
                        <div class="row mb-4 align-items-center">
                            <label for="coupon_discount"
                                class="col-sm-2 col-form-label text-secondary">
                                Coupon Discount (%)
                            </label>

                            <div class="col-sm-10">
                                <input type="number"
                                    name="coupon_discount"
                                    id="coupon_discount"
                                    value="{{ old('coupon_discount', $coupon->coupon_discount) }}"
                                    class="form-control"
                                    placeholder="Enter Discount"
                                    min="1"
                                    max="100">

                                @error('coupon_discount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- Coupon Validity --}}
                        <div class="row mb-4 align-items-center">
                            <label for="coupon_validity"
                                class="col-sm-2 col-form-label text-secondary">
                                Coupon Validity
                            </label>

                            <div class="col-sm-10">
                                <input type="date"
                                    name="coupon_validity"
                                    id="coupon_validity"
                                    value="{{ old('coupon_validity', $coupon->coupon_validity) }}"
                                    class="form-control">

                                @error('coupon_validity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- Status --}}
                        <div class="row mb-4 align-items-center">
                            <label for="status"
                                class="col-sm-2 col-form-label text-secondary">
                                Status
                            </label>

                            <div class="col-sm-10">
                                <select name="status"
                                    id="status"
                                    class="form-control">

                                    <option value="1"
                                        {{ old('status', $coupon->status) == '1' ? 'selected' : '' }}>
                                        Active
                                    </option>

                                    <option value="0"
                                        {{ old('status', $coupon->status) == '0' ? 'selected' : '' }}>
                                        Inactive
                                    </option>

                                </select>

                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- Buttons --}}
                        <div class="row">
                            <div class="col-sm-2"></div>

                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">
                                    Update Coupon
                                </button>

                                <a href="{{ route('admin.coupon.index') }}"
                                    class="btn btn-secondary">
                                    Back
                                </a>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection