
@extends('admin.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="container">

                <div class="card">
                    <div class="card-header">
                        <h4>Edit Division</h4>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('admin.division.update', $division->id) }}"
                            method="POST">

                            @csrf

                            {{-- Division Name --}}
                            <div class="row mb-4 align-items-center">

                                <label for="division_name"
                                    class="col-sm-2 col-form-label text-secondary">
                                    Division Name
                                </label>

                                <div class="col-sm-10">

                                    <input type="text"
                                        name="division_name"
                                        id="division_name"
                                        value="{{ old('division_name', $division->division_name) }}"
                                        class="form-control @error('division_name') is-invalid @enderror"
                                        placeholder="Enter Division Name">

                                    @error('division_name')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>
                            </div>

                            {{-- Buttons --}}
                            <div class="row">
                                <div class="col-sm-2"></div>

                                <div class="col-sm-10">

                                    <button type="submit" class="btn btn-primary">
                                        Update Division
                                    </button>

                                    <a href="{{ route('admin.division.index') }}"
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
