
@extends('admin.layouts.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="container">

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Brand List</h4>

                    <a href="{{ route('admin.brand.create') }}"
                       class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Add Brand
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
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Image</th>
                                    <th style="width: 150px;">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($brands as $brand)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>{{ $brand->name }}</td>

                                        <td>{{ $brand->slug }}</td>

                                        <td>
                                            @if($brand->image)
                                                <img src="{{ asset('storage/'.$brand->image) }}"
                                                    width="70"
                                                    height="50"
                                                    style="object-fit: cover;">
                                            @else
                                                No Image
                                            @endif
                                        </td>

                                        <td>
                                            <a href="{{ route('admin.brand.edit', $brand->id) }}"
                                                class="btn btn-sm btn-primary">
                                                Edit
                                            </a>

                                            <form action="{{ route('admin.brand.delete', $brand->id) }}"
                                                method="POST"
                                                style="display: inline-block;">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this brand?')">
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
