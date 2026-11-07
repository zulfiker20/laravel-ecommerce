
@extends('admin.layouts.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="container">

            <div class="card">
                <div class="card-header">
                    <h4>Edit Slider</h4>
                </div>

                <div class="card-body">

                    <form action="{{ route('admin.slider.update', $slider->id) }}"
                        method="POST"
                        enctype="multipart/form-data">

                        @csrf

                        {{-- Title --}}
                        <div class="row mb-4 align-items-center">
                            <label for="title"
                                class="col-sm-2 col-form-label text-secondary">
                                Title
                            </label>

                            <div class="col-sm-10">
                                <input type="text"
                                    name="title"
                                    id="title"
                                    value="{{ old('title', $slider->title) }}"
                                    class="form-control"
                                    placeholder="Enter Slider Title">

                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- URL --}}
                        <div class="row mb-4 align-items-center">
                            <label for="url"
                                class="col-sm-2 col-form-label text-secondary">
                                URL
                            </label>

                            <div class="col-sm-10">
                                <input type="url"
                                    name="url"
                                    id="url"
                                    value="{{ old('url', $slider->url) }}"
                                    class="form-control"
                                    placeholder="https://example.com">

                                @error('url')
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
                                @if($slider->image)
                                    <img src="{{ asset('storage/' . $slider->image) }}"
                                        width="150"
                                        height="100"
                                        style="object-fit: cover; border-radius: 5px;">
                                @else
                                    <p class="text-muted">No image uploaded</p>
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
                                    class="form-control"
                                    accept="image/*">

                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <small class="text-muted">
                                    Leave empty if you don't want to change the image.
                                </small>
                            </div>
                        </div>

                        {{-- Buttons --}}
                        <div class="row">
                            <div class="col-sm-2"></div>

                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">
                                    Update Slider
                                </button>

                                <a href="{{ route('admin.slider.index') }}"
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
