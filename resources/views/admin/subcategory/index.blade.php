@extends('admin.layouts.app')

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <div class="container">

            <div class="card">

                <div class="card-header d-flex justify-content-between align-items-center">

                    <h4>Subcategory List</h4>

                    <a href="{{ route('admin.subcategory.create') }}"
                        class="btn btn-primary btn-sm">

                        <i class="fas fa-plus"></i> Add Subcategory

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
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                            <thead>
                                <tr>
                                    <th style="width: 60px;">SL</th>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Image</th>
                                    <th style="width: 150px;">Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($subcategories as $subcategory)

                                    <tr>

                                        <td>{{ $loop->iteration }}</td>

                                        <td>
                                            {{ $subcategory->category->name ?? 'N/A' }}
                                        </td>

                                        <td>{{ $subcategory->name }}</td>

                                        <td>{{ $subcategory->slug }}</td>

                                        <td>

                                            @if($subcategory->image)

                                                <img src="{{ asset('storage/' . $subcategory->image) }}"
                                                    width="70"
                                                    height="60"
                                                    style="object-fit: cover;">

                                            @else

                                                No Image

                                            @endif

                                        </td>

                                        <td>

                                            <a href="{{ route('admin.subcategory.edit', $subcategory->id) }}"
                                                class="btn btn-sm btn-primary">
                                                Edit
                                            </a>

                                            <form action="{{ route('admin.subcategory.delete', $subcategory->id) }}"
                                                method="POST"
                                                style="display: inline-block;">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this subcategory?')">

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