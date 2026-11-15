@extends('admin.layouts.app')

@section('content')
    <div class="page-content">
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">

                        <div class="card card-primary">

                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h3 class="card-title">All Roles</h3>

                                <a href="{{ route('admin.all.role.create') }}"
                                    class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus"></i> Add New Role
                                </a>
                            </div>

                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th width="5%">SL</th>
                                                <th>Role Name</th>
                                                <th>Permissions</th>
                                                <th width="20%">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @forelse ($roles as $key => $role)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>

                                                    <td>
                                                        <strong>{{ $role->name }}</strong>
                                                    </td>

                                                    <td>
                                                       @foreach ($role->permissions as $perm)
                                                            <span class="badge bg-info">{{ $perm->name }}</span>
                                                           
                                                       @endforeach
                                                    </td>

                                                    <td>
                                                        <a href="{{ route('admin.all.role.edit', $role->id) }}"
                                                            class="btn btn-sm btn-warning">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </a>

                                                        <form action="{{ route('admin.all.role.delete', $role->id) }}"
                                                            method="POST"
                                                            class="d-inline"
                                                            onsubmit="return confirm('Are you sure you want to delete this role?')">

                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit"
                                                                class="btn btn-sm btn-danger">
                                                                <i class="fas fa-trash"></i> Delete
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center text-danger">
                                                        No Role Found!
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                <div class="mt-3">
                                    
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
