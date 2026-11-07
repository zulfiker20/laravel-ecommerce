
@extends('admin.layouts.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="container">

            <div class="card">
                <div class="card-header">
                    <h4>Add Slider</h4>
                </div>

                <div class="card-body">

                    <form action="{{ route('admin.slider.store') }}"
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
                                    value="{{ old('title') }}"
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
                                    value="{{ old('url') }}"
                                    class="form-control"
                                    placeholder="https://example.com">

                                @error('url')
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
                            </div>
                        </div>

                        {{-- Buttons --}}
                        <div class="row">
                            <div class="col-sm-2"></div>

                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">
                                    Save Slider
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
