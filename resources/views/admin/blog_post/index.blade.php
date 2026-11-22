@extends('admin.layouts.app')

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <div class="container">

            <div class="card">

                <div class="card-header d-flex justify-content-between align-items-center">

                    <h4>Blog Post List</h4>

                    <a href="{{ route('admin.blog_post.create') }}"
                       class="btn btn-primary btn-sm">

                        <i class="fas fa-plus"></i> Add Blog Post

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
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                   
                                    <th style="width: 130px;">Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($blogPosts as $blogPost)

                                    <tr>

                                        <td>{{ $loop->iteration }}</td>

                                        <td>
                                            {{ $blogPost->category->name ?? 'N/A' }}
                                        </td>

                                        <td>
                                            @if($blogPost->image)
                                                <img src="{{ asset('storage/' . $blogPost->image) }}"
                                                    width="70"
                                                    height="60"
                                                    style="object-fit: cover;">
                                            @else
                                                No Image
                                            @endif
                                        </td>

                                        <td>{{ $blogPost->title }}</td>

                                      

                                        <td>

                                            <a href="{{ route('admin.blog_post.edit', $blogPost->id) }}"
                                                class="btn btn-sm btn-primary">
                                                Edit
                                            </a>

                                            <form action="{{ route('admin.blog_post.delete', $blogPost->id) }}"
                                                method="POST"
                                                style="display: inline-block;">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this blog post?')">

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