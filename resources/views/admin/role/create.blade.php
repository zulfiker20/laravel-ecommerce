@extends('admin.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="container">

                <div class="card">
                    <div class="card-header">
                        <h4>Add Role</h4>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('admin.role.store') }}" method="POST">

                            @csrf

                            {{-- Role Name --}}
                            <div class="row mb-4 align-items-center">


                                <label for="name" class="col-sm-2 col-form-label text-secondary">
                                    Role Name
                                </label>

                                <div class="col-sm-10">

                                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                                        class="form-control" placeholder="Enter role name">

                                  

                                </div>
                            </div>


                            {{-- Buttons --}}
                            <div class="row">

                                <div class="col-sm-2"></div>

                                <div class="col-sm-10">

                                    <button type="submit" class="btn btn-primary">
                                        Save Role
                                    </button>

                                    <a href="{{ route('admin.role.index') }}" class="btn btn-secondary">
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
