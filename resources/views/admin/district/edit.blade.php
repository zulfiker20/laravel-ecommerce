@extends('admin.layouts.app')

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <div class="container">

            <div class="card">

                <div class="card-header">
                    <h4>Edit District</h4>
                </div>

                <div class="card-body">

                    <form action="{{ route('admin.district.update', $district->id) }}"
                        method="POST">

                        @csrf

                        {{-- Division --}}
                        <div class="row mb-4 align-items-center">

                            <label for="division_id"
                                class="col-sm-2 col-form-label text-secondary">

                                Division

                            </label>

                            <div class="col-sm-10">

                                <select name="division_id"
                                    id="division_id"
                                    class="form-control">

                                    <option value="">Select Division</option>

                                    @foreach ($divisions as $division)

                                        <option value="{{ $division->id }}"

                                            {{ old('division_id', $district->division_id) == $division->id ? 'selected' : '' }}>

                                            {{ $division->division_name }}

                                        </option>

                                    @endforeach

                                </select>

                                @error('division_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>

                        </div>

                        {{-- District Name --}}
                        <div class="row mb-4 align-items-center">

                            <label for="district_name"
                                class="col-sm-2 col-form-label text-secondary">

                                District Name

                            </label>

                            <div class="col-sm-10">

                                <input type="text"
                                    name="district_name"
                                    id="district_name"
                                    value="{{ old('district_name', $district->district_name) }}"
                                    class="form-control"
                                    placeholder="Enter District Name">

                                @error('district_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>

                        </div>

                        {{-- Buttons --}}
                        <div class="row">

                            <div class="col-sm-2"></div>

                            <div class="col-sm-10">

                                <button type="submit" class="btn btn-primary">

                                    Update District

                                </button>

                                <a href="{{ route('admin.district.index') }}"
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