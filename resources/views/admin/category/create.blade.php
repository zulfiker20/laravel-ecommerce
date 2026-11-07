@extends('admin.layouts.app')

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <div class="container">

            <div class="card">

                <div class="card-header">
                    <h4>Add Category</h4>
                </div>

                <div class="card-body">

                    <form action="{{ route('admin.category.store') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

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
                                    placeholder="Enter category name">

                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>

                        {{-- Slug --}}
                        <div class="row mb-4 align-items-center">

                            <label for="slug"
                                class="col-sm-2 col-form-label text-secondary">
                                Slug
                            </label>

                            <div class="col-sm-10">

                                <input type="text"
                                    name="slug"
                                    id="slug"
                                    value="{{ old('slug') }}"
                                    class="form-control"
                                    placeholder="Enter category slug (Optional)">

                                @error('slug')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>

                        {{-- Image --}}
                        <div class="row mb-4 align-items-center">

                            <label for="image"
                                class="col-sm-2 col-form-label text-secondary">
                                Image
                            </label>

                            <div class="col-sm-10">

                                <input type="file"
                                    name="image"
                                    id="image"
                                    class="form-control">

                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>

                        {{-- Buttons --}}
                        <div class="row">

                            <div class="col-sm-2"></div>

                            <div class="col-sm-10">

                                <button type="submit" class="btn btn-primary">
                                    Save Category
                                </button>

                                <a href="{{ route('admin.category.index') }}"
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