@extends('admin.layouts.app')

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <div class="container">

            <div class="card">

                <div class="card-header">
                    <h4>Edit Category</h4>
                </div>

                <div class="card-body">

                    <form action="{{ route('admin.category.update', $category->id) }}"
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
                                    value="{{ old('name', $category->name) }}"
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
                                    value="{{ old('slug', $category->slug) }}"
                                    class="form-control"
                                    placeholder="Enter category slug">

                                @error('slug')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>

                        {{-- Old Image --}}
                        <div class="row mb-3 align-items-center">

                            <label class="col-sm-2 col-form-label text-secondary">
                                Old Image
                            </label>

                            <div class="col-sm-10">

                                @if($category->image)

                                    <img src="{{ asset('storage/' . $category->image) }}"
                                        width="100"
                                        height="80"
                                        style="object-fit: cover;">

                                @else

                                    <span>No Image Available</span>

                                @endif

                            </div>
                        </div>

                        {{-- New Image --}}
                        <div class="row mb-4 align-items-center">

                            <label for="image"
                                class="col-sm-2 col-form-label text-secondary">
                                New Image
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
                                    Update Category
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