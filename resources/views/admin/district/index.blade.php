@extends('admin.layouts.app')

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <div class="container">

            <div class="card">

                <div class="card-header d-flex justify-content-between align-items-center">

                    <h4>District List</h4>

                    <a href="{{ route('admin.district.create') }}"
                        class="btn btn-primary btn-sm">

                        <i class="fas fa-plus"></i> Add District

                    </a>

                </div>

                <div class="card-body">

                    {{-- Success Message --}}
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
                                    <th>Division Name</th>
                                    <th>District Name</th>
                                    <th style="width: 130px;">Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($districts as $district)

                                    <tr>

                                        <td>{{ $loop->iteration }}</td>

                                        <td>
                                            {{ $district->division->division_name ?? 'N/A' }}
                                        </td>

                                        <td>
                                            {{ $district->district_name }}
                                        </td>

                                        <td>

                                            <a href="{{ route('admin.district.edit', $district->id) }}"
                                                class="btn btn-sm btn-primary">
                                                Edit
                                            </a>

                                            <form action="{{ route('admin.district.delete', $district->id) }}"
                                                method="POST"
                                                style="display: inline-block;">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this district?')">

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