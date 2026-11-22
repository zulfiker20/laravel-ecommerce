@extends('admin.layouts.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="container">

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>State List</h4>

                    <a href="{{ route('admin.state.create') }}"
                       class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Add State
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
                                    <th>Division</th>
                                    <th>District</th>
                                    <th>State Name</th>
                                    <th style="width: 130px;">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($states as $state)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>
                                            {{ $state->division->division_name ?? 'N/A' }}
                                        </td>

                                        <td>
                                            {{ $state->district->district_name ?? 'N/A' }}
                                        </td>

                                        <td>{{ $state->state_name }}</td>

                                        <td>
                                            <a href="{{ route('admin.state.edit', $state->id) }}"
                                                class="btn btn-sm btn-primary">
                                                Edit
                                            </a>

                                            <form action="{{ route('admin.state.delete', $state->id) }}"
                                                method="POST"
                                                style="display: inline-block;">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this state?')">
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
