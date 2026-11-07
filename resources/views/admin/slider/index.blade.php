
@extends('admin.layouts.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="container">

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Slider List</h4>

                    <a href="{{ route('admin.slider.create') }}"
                        class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Add Slider
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
                            style="width: 100%;">

                            <thead>
                                <tr>
                                    <th style="width: 60px;">SL</th>
                                    <th>Title</th>
                                    <th>URL</th>
                                    <th>Image</th>
                                    <th style="width: 150px;">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($sliders as $slider)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>{{ $slider->title }}</td>

                                    <td>
                                        @if($slider->url)
                                            <a href="{{ $slider->url }}"
                                                target="_blank">
                                                {{ $slider->url }}
                                            </a>
                                        @endif
                                    </td>

                                    <td>
                                        @if($slider->image)
                                            <img src="{{ asset('storage/' . $slider->image) }}"
                                                width="100"
                                                height="60"
                                                style="object-fit: cover;">
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{ route('admin.slider.edit', $slider->id) }}"
                                            class="btn btn-sm btn-primary">
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.slider.delete', $slider->id) }}"
                                            method="POST"
                                            style="display: inline-block;">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this slider?')">
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
