@extends('admin.layouts.app')

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <div class="container">

            <div class="card">

                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>User List</h4>

                    <a href="{{ route('admin.user.create') }}"
                        class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Add User
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
                            style="width:100%;">

                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($users as $user)

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>
                                            @if($user->photo)
                                                <img src="{{ asset('storage/'.$user->photo) }}"
                                                    width="50"
                                                    height="50"
                                                    style="object-fit:cover;border-radius:50%;">
                                            @else
                                                <span>No Photo</span>
                                            @endif
                                        </td>

                                        <td>{{ $user->name }}</td>

                                        <td>{{ $user->email }}</td>

                                        <td>{{ $user->username ?? 'N/A' }}</td>

                                        <td>{{ $user->phone ?? 'N/A' }}</td>

                                        <td>
                                            @foreach($user->roles as $role)
    <span class="badge badge-pill bg-danger">
        {{ $role->name }}
    </span>
@endforeach
</td>
                                        </td>

                                        <td>
                                            @if($user->status == 'active')
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>

                                        <td>

                                            <a href="{{ route('admin.user.edit', $user->id) }}"
                                                class="btn btn-sm btn-primary">
                                                Edit
                                            </a>

                                            <form action="{{ route('admin.user.delete', $user->id) }}"
                                                method="POST"
                                                style="display:inline-block;">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this user?')">
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
