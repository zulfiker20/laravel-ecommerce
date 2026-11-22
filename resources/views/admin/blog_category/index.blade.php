@extends('admin.layouts.app')


@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="container">

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">

                        <h4>Blog Category List</h4>

                        <a href="{{ route('admin.blog_category.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Add Blog Category
                        </a>

                    </div>

                    <div class="card-body">

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="table-responsive">

                            <table id="datatable" class="table table-bordered table-striped dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                <thead>
                                    <tr>
                                        <th style="width: 60px;">SL</th>
                                        <th>Category Name</th>
                                        <th>Category Slug</th>
                                        <th style="width: 150px;">Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($blogCategories as $blogCategory)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>

                                            <td>{{ $blogCategory->name }}</td>

                                            <td>{{ $blogCategory->slug }}</td>

                                            <td>

                                                <a href="{{ route('admin.blog_category.edit', $blogCategory->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    Edit
                                                </a>

                                                <form action="{{ route('admin.blog_category.delete', $blogCategory->id) }}"
                                                    method="POST" style="display: inline-block;">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this category?')">
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
