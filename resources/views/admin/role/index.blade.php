@extends('admin.layouts.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="container">

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Role List</h4>

                    <a href="{{ route('admin.role.create') }}"
                        class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Add Role
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
                                    <th>Role Name</th>
                              
                                    <th style="width: 150px;">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>{{ $role->name }}</td>


                                        <td>
                                            <a href="{{ route('admin.role.edit', $role->id) }}"
                                                class="btn btn-sm btn-primary">
                                                Edit
                                            </a>

                                            <form action="{{ route('admin.role.delete', $role->id) }}"
                                                method="POST"
                                                style="display:inline-block;">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this role?')">
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