@extends('admin.layouts.app')


@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="container">

            <div class="card">
                <div class="card-header">
                    <h4>Edit State</h4>
                </div>

                <div class="card-body">

                    <form action="{{ route('admin.state.update', $state->id) }}"
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

                                    @foreach($divisions as $division)
                                        <option value="{{ $division->id }}"
                                            {{ old('division_id', $state->division_id) == $division->id ? 'selected' : '' }}>
                                            {{ $division->division_name }}
                                        </option>
                                    @endforeach

                                </select>

                                @error('division_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- District --}}
                        <div class="row mb-4 align-items-center">
                            <label for="district_id"
                                class="col-sm-2 col-form-label text-secondary">
                                District
                            </label>

                            <div class="col-sm-10">
                                <select name="district_id"
                                    id="district_id"
                                    class="form-control">

                                    <option value="">Select District</option>

                                    @foreach($districts as $district)
                                        <option value="{{ $district->id }}"
                                            {{ old('district_id', $state->district_id) == $district->id ? 'selected' : '' }}>
                                            {{ $district->district_name }}
                                        </option>
                                    @endforeach

                                </select>

                                @error('district_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- State Name --}}
                        <div class="row mb-4 align-items-center">
                            <label for="state_name"
                                class="col-sm-2 col-form-label text-secondary">
                                State Name
                            </label>

                            <div class="col-sm-10">
                                <input type="text"
                                    name="state_name"
                                    id="state_name"
                                    value="{{ old('state_name', $state->state_name) }}"
                                    class="form-control"
                                    placeholder="Enter State Name">

                                @error('state_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- Buttons --}}
                        <div class="row">
                            <div class="col-sm-2"></div>

                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">
                                    Update State
                                </button>

                                <a href="{{ route('admin.state.index') }}"
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


