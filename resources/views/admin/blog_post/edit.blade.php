@extends('admin.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="container">

                <div class="card">

                    <div class="card-header">
                        <h4>Edit Blog Post</h4>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('admin.blog_post.update', $blogPost->id) }}"
                            method="POST" enctype="multipart/form-data">

                            @csrf

                            {{-- Category --}}
                            <div class="row mb-4 align-items-center">

                                <label for="category_id" class="col-sm-2 col-form-label text-secondary">
                                    Category
                                </label>

                                <div class="col-sm-10">

                                    <select name="category_id" id="category_id" class="form-control">

                                        <option value="">Select Category</option>

                                        @foreach ($blogcategory as $cat)
                                            <option value="{{ $cat->id }}"
                                                {{ old('category_id', $blogPost->category_id) == $cat->id ? 'selected' : '' }}>
                                                {{ $cat->name }}
                                            </option>
                                        @endforeach

                                    </select>

                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>

                            {{-- Title --}}
                            <div class="row mb-4 align-items-center">

                                <label for="title" class="col-sm-2 col-form-label text-secondary">
                                    Title
                                </label>

                                <div class="col-sm-10">

                                    <input type="text" name="title" id="title"
                                        value="{{ old('title', $blogPost->title) }}"
                                        class="form-control" placeholder="Enter Blog Title">

                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>

                            {{-- Image --}}
                            <div class="row mb-4 align-items-center">

                                <label for="image" class="col-sm-2 col-form-label text-secondary">
                                    Image
                                </label>

                                <div class="col-sm-10">

                                    {{-- Existing Image --}}
                                    @if ($blogPost->image)
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $blogPost->image) }}"
                                                alt="Blog Image"
                                                width="120"
                                                height="90"
                                                style="object-fit: cover;">
                                        </div>
                                    @endif

                                    <input type="file" name="image" id="image" class="form-control">

                                    <small class="text-muted">
                                        Leave empty if you don't want to change the image.
                                    </small>

                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>

                            {{-- Short Description --}}
                            <div class="row mb-4 align-items-center">

                                <label for="short_description" class="col-sm-2 col-form-label text-secondary">
                                    Short Description
                                </label>

                                <div class="col-sm-10">

                                    <textarea name="short_description" id="short_description" rows="4"
                                        class="form-control"
                                        placeholder="Enter Short Description">{{ old('short_description', $blogPost->short_description) }}</textarea>

                                    @error('short_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>

                            {{-- Long Description --}}
                            <div class="row mb-4 align-items-center">

                                <label for="long_description" class="col-sm-2 col-form-label text-secondary">
                                    Long Description
                                </label>

                                <div class="col-sm-10">

                                    <textarea name="long_description" id="long_description" rows="8"
                                        class="form-control"
                                        placeholder="Enter Long Description">{{ old('long_description', $blogPost->long_description) }}</textarea>

                                    @error('long_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>

                            {{-- Buttons --}}
                            <div class="row">

                                <div class="col-sm-2"></div>

                                <div class="col-sm-10">

                                    <button type="submit" class="btn btn-primary">
                                        Update Blog Post
                                    </button>

                                    <a href="{{ route('admin.blog_post.index') }}" class="btn btn-secondary">
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
