@extends('admin.layouts.app')

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <div class="container">

            <div class="card">

                <div class="card-header">
                    <h4>Edit Banner</h4>
                </div>

                <div class="card-body">

                    <form action="{{ route('admin.banner.update', $banner->id) }}"
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
                                    value="{{ old('title', $banner->title) }}"
                                    class="form-control"
                                    placeholder="Enter Banner Title">

                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>

                        </div>

                        {{-- Short Title --}}
                        <div class="row mb-4 align-items-center">

                            <label for="short_title"
                                class="col-sm-2 col-form-label text-secondary">
                                Short Title
                            </label>

                            <div class="col-sm-10">

                                <input type="text"
                                    name="short_title"
                                    id="short_title"
                                    value="{{ old('short_title', $banner->short_title) }}"
                                    class="form-control"
                                    placeholder="Enter Short Title">

                                @error('short_title')
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
                                    class="form-control"
                                    accept="image/*">

                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                {{-- Existing Image --}}
                                @if($banner->image)
                                    <div class="mt-3">
                                        <img src="{{ asset('uploads/banner/' . $banner->image) }}"
                                             alt="Banner Image"
                                             width="150"
                                             class="img-thumbnail">
                                    </div>
                                @endif

                            </div>

                        </div>

                        {{-- Buttons --}}
                        <div class="row">

                            <div class="col-sm-2"></div>

                            <div class="col-sm-10">

                                <button type="submit" class="btn btn-primary">
                                    Update Banner
                                </button>

                                <a href="{{ route('admin.banner.index') }}"
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