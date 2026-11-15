@extends('admin.layouts.app')

@section('content')
    <div class="page-content">
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <div class="card card-primary">

                            <div class="card-header">
                                <h3 class="card-title">Edit Role & Permissions</h3>
                            </div>

                            <form action="{{ route('admin.all.role.update', $role->id) }}" method="POST">
                                @csrf
                              

                                <div class="card-body">

                                    {{-- Role Name --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-2">
                                            <label class="text-secondary fw-bold">
                                                Role Name
                                            </label>
                                        </div>

                                        <div class="col-sm-10">
                                            <input type="text"
                                                class="form-control"
                                                value="{{ $role->name }}"
                                                readonly>
                                        </div>
                                    </div>

                                    <hr>

                                    {{-- All Permission --}}
                                    <div class="mb-3">
                                        <input type="checkbox" id="permission_all">

                                        <label for="permission_all" class="fw-bold">
                                            All Permission
                                        </label>
                                    </div>

                                    <hr>

                                    <div class="row">

                                        {{-- Permission Groups --}}
                                        <div class="col-md-3">

                                            <h5 class="mb-3">Permission Groups</h5>

                                            @foreach ($permission_groups as $group)
                                                <div class="custom-control custom-checkbox mb-2">

                                                    <input
                                                        class="custom-control-input group-check"
                                                        type="checkbox"
                                                        id="group_{{ $loop->index }}"
                                                        data-group="group_{{ $loop->index }}_checkbox">

                                                    <label
                                                        for="group_{{ $loop->index }}"
                                                        class="custom-control-label text-capitalize">

                                                        {{ $group->group_name }}

                                                    </label>

                                                </div>
                                            @endforeach

                                        </div>

                                        {{-- Individual Permissions --}}
                                        <div class="col-md-9">

                                            <h5 class="mb-3">Assign Permissions</h5>

                                            @foreach ($permission_groups as $group)

                                                <div class="group_{{ $loop->index }}_checkbox mb-3">

                                                    <h6 class="text-primary text-capitalize">
                                                        {{ $group->group_name }}
                                                    </h6>

                                                    <div class="row">

                                                        @foreach ($permissions as $permission)

                                                            @if ($permission->group_name == $group->group_name)

                                                                <div class="col-md-4 mb-2">

                                                                    <div class="custom-control custom-checkbox">

                                                                        <input
                                                                            name="permissions[]"
                                                                            class="custom-control-input permission-check"
                                                                            type="checkbox"
                                                                            id="permission_{{ $permission->id }}"
                                                                            value="{{ $permission->id }}"

                                                                            {{ $role->permissions->contains('id', $permission->id) ? 'checked' : '' }}>

                                                                        <label
                                                                            for="permission_{{ $permission->id }}"
                                                                            class="custom-control-label">

                                                                            {{ $permission->name }}

                                                                        </label>

                                                                    </div>

                                                                </div>

                                                            @endif

                                                        @endforeach

                                                    </div>

                                                </div>

                                            @endforeach

                                        </div>

                                    </div>

                                </div>

                                {{-- Card Footer --}}
                                <div class="card-footer">

                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Update Role
                                    </button>

                                    <button type="reset" class="btn btn-secondary">
                                        <i class="fas fa-undo"></i> Reset
                                    </button>

                                    <a href="{{ route('admin.all.role.index') }}"
                                        class="btn btn-dark">
                                        <i class="fas fa-arrow-left"></i> Back
                                    </a>

                                </div>

                            </form>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {

                // All Permission Checkbox
                $('#permission_all').on('change', function() {

                    let checked = $(this).is(':checked');

                    $('.permission-check, .group-check').prop('checked', checked);

                });

                // Group Permission Checkbox
                $('.group-check').on('change', function() {

                    let groupClass = $(this).data('group');
                    let checked = $(this).is(':checked');

                    $('.' + groupClass + ' .permission-check').prop('checked', checked);

                    checkAllPermission();

                });

                // Individual Permission Checkbox
                $('.permission-check').on('change', function() {

                    checkGroupPermission();
                    checkAllPermission();

                });

                // Check Group Checkbox Status
                function checkGroupPermission() {

                    $('.group-check').each(function() {

                        let groupClass = $(this).data('group');

                        let total = $('.' + groupClass + ' .permission-check').length;

                        let checked = $('.' + groupClass + ' .permission-check:checked').length;

                        $(this).prop('checked', total > 0 && total === checked);

                    });

                }

                // Check All Permission Status
                function checkAllPermission() {

                    let total = $('.permission-check').length;

                    let checked = $('.permission-check:checked').length;

                    $('#permission_all').prop('checked', total > 0 && total === checked);

                }

                // Initial Checkbox Status
                checkGroupPermission();
                checkAllPermission();

                // Reset Checkbox Status
                $('button[type="reset"]').on('click', function() {

                    setTimeout(function() {
                        checkGroupPermission();
                        checkAllPermission();
                    }, 10);

                });

            });
        </script>
    @endpush

@endsection
