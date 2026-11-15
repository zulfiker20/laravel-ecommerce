
@extends('admin.layouts.app')

@section('content')

    <div class="page-content">
        <div class="container-fluid">
            <div class="container">

                <div class="card">

                    <div class="card-header">
                        <h4>Edit User</h4>
                    </div>

                    <div class="card-body">

                        {{-- Validation Error --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.user.update', $user->id) }}"
                              method="POST"
                              enctype="multipart/form-data">

                            @csrf
                         

                            {{-- Name --}}
                            <div class="row mb-4 align-items-center">
                                <label class="col-sm-2 col-form-label text-secondary">
                                    Name
                                </label>

                                <div class="col-sm-10">
                                    <input type="text" name="name"
                                        class="form-control"
                                        value="{{ old('name', $user->name) }}"
                                        placeholder="Enter name" required>
                                </div>
                            </div>

                            {{-- Email --}}
                            <div class="row mb-4 align-items-center">
                                <label class="col-sm-2 col-form-label text-secondary">
                                    Email
                                </label>

                                <div class="col-sm-10">
                                    <input type="email" name="email"
                                        class="form-control"
                                        value="{{ old('email', $user->email) }}"
                                        placeholder="Enter email" required>
                                </div>
                            </div>

                            {{-- Username --}}
                            <div class="row mb-4 align-items-center">
                                <label class="col-sm-2 col-form-label text-secondary">
                                    Username
                                </label>

                                <div class="col-sm-10">
                                    <input type="text" name="username"
                                        class="form-control"
                                        value="{{ old('username', $user->username) }}"
                                        placeholder="Enter username" required>
                                </div>
                            </div>

                            {{-- Password --}}
                            <div class="row mb-4 align-items-center">
                                <label class="col-sm-2 col-form-label text-secondary">
                                    Password
                                </label>

                                <div class="col-sm-10">
                                    <input type="password" name="password"
                                        class="form-control"
                                        placeholder="Leave blank to keep old password">
                                </div>
                            </div>

                            {{-- Photo --}}
                            <div class="row mb-4 align-items-center">
                                <label class="col-sm-2 col-form-label text-secondary">
                                    Photo
                                </label>

                                <div class="col-sm-10">

                                    @if ($user->photo)
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $user->photo) }}"
                                                width="80" height="80"
                                                style="object-fit: cover; border-radius: 8px;">
                                        </div>
                                    @endif

                                    <input type="file" name="photo"
                                        class="form-control" accept="image/*">
                                </div>
                            </div>

                            {{-- Phone --}}
                            <div class="row mb-4 align-items-center">
                                <label class="col-sm-2 col-form-label text-secondary">
                                    Phone
                                </label>

                                <div class="col-sm-10">
                                    <input type="text" name="phone"
                                        class="form-control"
                                        value="{{ old('phone', $user->phone) }}"
                                        placeholder="Enter phone">
                                </div>
                            </div>

                            {{-- Address --}}
                            <div class="row mb-4 align-items-center">
                                <label class="col-sm-2 col-form-label text-secondary">
                                    Address
                                </label>

                                <div class="col-sm-10">
                                    <textarea name="address"
                                        class="form-control" rows="3"
                                        placeholder="Enter address">{{ old('address', $user->address) }}</textarea>
                                </div>
                            </div>

                            {{-- Role --}}
                            <div class="row mb-4 align-items-center">
                                <label class="col-sm-2 col-form-label text-secondary">
                                    Role
                                </label>

                                <div class="col-sm-10">
                                    <select name="role" class="form-control" required>

                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"
                                                {{ old('role', $user->roles->first()?->id) == $role->id ? 'selected' : '' }}>
                                                {{ $role->name }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            {{-- Status --}}
                            <div class="row mb-4 align-items-center">
                                <label class="col-sm-2 col-form-label text-secondary">
                                    Status
                                </label>

                                <div class="col-sm-10">
                                    <select name="status" class="form-control" required>

                                        <option value="active"
                                            {{ old('status', $user->status) == 'active' ? 'selected' : '' }}>
                                            Active
                                        </option>

                                        <option value="inactive"
                                            {{ old('status', $user->status) == 'inactive' ? 'selected' : '' }}>
                                            Inactive
                                        </option>

                                    </select>
                                </div>
                            </div>

                            {{-- Buttons --}}
                            <div class="row">
                                <div class="col-sm-2"></div>

                                <div class="col-sm-10">

                                    <button type="submit" class="btn btn-primary">
                                        Update User
                                    </button>

                                    <a href="{{ route('admin.user.index') }}"
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
