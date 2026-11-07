@extends('admin.layouts.app')

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <div class="container">

            <div class="card">

                <div class="card-header">
                    <h4>Add Subcategory</h4>
                </div>

                <div class="card-body">

                    <form action="{{ route('admin.subcategory.store') }}"
                        method="POST"
                        enctype="multipart/form-data">

                        @csrf

                        {{-- Category --}}
                        <div class="row mb-4 align-items-center">

                            <label for="category_id"
                                class="col-sm-2 col-form-label text-secondary">
                                Category
                            </label>

                            <div class="col-sm-10">

                                <select name="category_id"
                                    id="category_id"
                                    class="form-control">

                                    <option value="">Select Category</option>

                                    @foreach($categories as $category)

                                        <option value="{{ $category->id }}"
                                            {{ old('category_id') == $category->id ? 'selected' : '' }}>

                                            {{ $category->name }}

                                        </option>

                                    @endforeach

                                </select>

                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>

                        </div>

                        {{-- Name --}}
                        <div class="row mb-4 align-items-center">

                            <label for="name"
                                class="col-sm-2 col-form-label text-secondary">
                                Name
                            </label>

                            <div class="col-sm-10">

                                <input type="text"
                                    name="name"
                                    id="name"
                                    value="{{ old('name') }}"
                                    class="form-control"
                                    placeholder="Enter subcategory name">

                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>

                        </div>


                        {{-- Buttons --}}
                        <div class="row">

                            <div class="col-sm-2"></div>

                            <div class="col-sm-10">

                                <button type="submit" class="btn btn-primary">
                                    Save Subcategory
                                </button>

                                <a href="{{ route('admin.subcategory.index') }}"
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