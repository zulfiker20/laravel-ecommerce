@extends('admin.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="container">

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Permission List</h4>

                        <a href="{{ route('admin.permission.create') }}"
                            class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Add Permission
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
                                        <th>Permission Name</th>
                                        <th>Guard Name</th>
                                        <th style="width: 150px;">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>

                                            <td>{{ $permission->name }}</td>

                                            <td>{{ $permission->guard_name }}</td>

                                            <td>
                                                <a href="{{ route('admin.permission.edit', $permission->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    Edit
                                                </a>

                                                <form action="{{ route('admin.permission.delete', $permission->id) }}"
                                                    method="POST"
                                                    style="display: inline-block;">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this permission?')">
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