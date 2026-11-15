@extends('admin.layouts.app')

@section('content')
    <div class="page-content">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Add Role Form -->
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add New Role</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.all.role.store') }}" method="POST">
                                @csrf

                                <div class="card-body">

                                    <div class="row mb-3">
                                        <div class="col-sm-2">
                                            <label class="text-secondary fw-bold">Role Name</label>
                                        </div>

                                        <div class="col-sm-10">
                                            <select name="role_id" class="form-select" required>
                                                <option value="">Select Role</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">
                                                        {{ $role->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('role_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- All Permission --}}
                                    <div class="mb-3">
                                        <input type="checkbox" id="permission_all">
                                        <label for="permission_all">All Permission</label>
                                    </div>

                                    <hr>

                                    <div class="row">

                                        {{-- Permission Groups --}}
                                        <div class="col-3">
                                            @foreach ($permission_groups as $group)
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input group-check" type="checkbox"
                                                        id="group_{{ $loop->index }}"
                                                        data-group="group_{{ $loop->index }}_checkbox">

                                                    <label for="group_{{ $loop->index }}"
                                                        class="custom-control-label text-capitalize">
                                                        {{ $group->group_name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>

                                        {{-- Individual Permissions --}}
                                        <div class="col-9">
                                            @foreach ($permission_groups as $group)
                                                <div class="group_{{ $loop->index }}_checkbox">

                                                    @foreach ($permissions as $permission)
                                                        @if ($permission->group_name == $group->group_name)
                                                            <div class="custom-control custom-checkbox">

                                                                <input name="permissions[]"
                                                                    class="custom-control-input permission-check"
                                                                    type="checkbox" id="permission_{{ $permission->id }}"
                                                                    value="{{ $permission->id }}">

                                                                <label for="permission_{{ $permission->id }}"
                                                                    class="custom-control-label">
                                                                    {{ $permission->name }}
                                                                </label>

                                                            </div>
                                                        @endif
                                                    @endforeach

                                                </div>
                                            @endforeach
                                        </div>

                                    </div>

                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>

                            </form>

                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
    @push('scripts')
        <script>
            $('#permission_all').click(function() {
                if ($(this).is(':checked')) {
                    // check all the checkbox
                    $('input[type=checkbox]').prop('checked', true);
                } else {
                    // uncheck all the checkbox
                    $('input[type=checkbox]').prop('checked', false);
                }
            });

            // check permission by group
            function CheckPermissionByGroup(classname, checkthis) {
                const groupIdName = $("#" + checkthis.id);
                const classCheckBox = $('.' + classname + ' input');
                if (groupIdName.is(':checked')) {
                    // check all the checkbox
                    classCheckBox.prop('checked', true);
                } else {
                    // uncheck all the checkbox
                    classCheckBox.prop('checked', false);
                }
            }
        </script>
    @endpush
@endsection
