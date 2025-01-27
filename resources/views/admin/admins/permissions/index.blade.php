@extends('layouts.admin')
@section('header-links')
    <li class="breadcrumb-item"><a href="/admin/users/home">Users</a></li>
    <li class="breadcrumb-item active" aria-current="page">Roles</li>
@endsection
@section('contents')
<div class="container">
    <div class="setting-items-groups mt-5">
        
        <fieldset class="mt-4 mx-0 mb-0 w-75 border-radius-1">
            <legend class="border-radius-1 px-3 py-1" data-bs-title="Add New Role" data-bs-toggle="tooltip" data-bs-placement="right" >Roles
                <button class="btn pe-0 py-0" data-bs-toggle="modal" data-bs-target="#addRoleModal">
                    <a class="fa fa-plus-square text-primary"></a>
                </button>
            </legend>
            <table class="table table-striped table-bordered ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Role Name</th>
                        <th>Arabic Name</th>
                        <th>English Name</th>
                        <th>Guard</th>
                        <th><i class="fa fa-cogs"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @if ($items && count($items))
                        @php $items_count = 0; @endphp
                        @foreach($items as $permission)
                        <tr>
                            <td>{{++$items_count}}</td>
                            <td>{{ $permission->label }}</td>
                            <td>{{ $permission->permissionNameAr }}</td>
                            <td>{{ $permission->permissionNameEn }}</td>
                            <td>{{ $permission->guard_name }}</td>
                            <td>
                                <a class="btn p-0 mx-0 text-success" data-bs-toggle="tooltip" data-bs-title="Show Role Info" href="{{ route('show-permission-info', [$permission->id]) }}"><i class="fa fa-eye"></i></i></a>
                                <a class="btn p-0 mx-0 text-primary" data-bs-toggle="tooltip" data-bs-title="Edit Role Info" href="{{ route('edit-permissions-info', [$permission->id]) }}"><i class="fa fa-edit"></i></a>
                                <form action="{{ route('destroy-permission', [$permission->id]) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn text-danger p-0" type="submit" data-bs-toggle="tooltip" data-bs-title="Delete Role"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="3">No permissions has been added yet, Add your <a data-bs-toggle="modal" data-bs-target="#addRoleModal">first permission</a>.</td>
                        </tr>
                    @endif
            </tbody>
        </table>                
    </fieldset>
</div>
</div>

<!-- Add Role Modal -->
<div class="modal fade" id="addRoleModal" tabindex="-1" aria-labelledby="addRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addRoleModalLabel">Add New Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('store-permission-info') }}">
                    @csrf
                    <div class="input-group sm mb-2">
                        <label for="label" class="input-group-text">Label</label>
                        <input type="text" name="label" class="form-control @error('label') is-invalid @enderror" id="label" value="{{ old('label') }}">
                        @error('label')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group sm mb-2">
                        <label for="permissionNameAr" class="input-group-text">Name in Arabic</label>
                        <input type="text" name="permissionNameAr" class="form-control @error('permissionNameAr') is-invalid @enderror" id="permissionNameAr" value="{{ old('permissionNameAr') }}">
                        @error('permissionNameAr')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="input-group sm mb-2">
                        <label for="permissionNameEn" class="input-group-text">Name in English</label>
                        <input type="text" name="permissionNameEn" class="form-control @error('permissionNameEn') is-invalid @enderror" id="permissionNameEn" value="{{ old('permissionNameEn') }}">
                        @error('permissionNameEn')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="input-group sm mb-2">
                        <label for="brief" class="input-group-text">Description</label>
                        <input type="text" name="brief" class="form-control @error('brief') is-invalid @enderror" id="brief" value="{{ old('brief') }}">
                        @error('brief')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="input-group sm mb-2">
                        <label for="permissionGuardName" class="input-group-text">Guard Name</label>
                        <select class="form-select" name="guard_name" id="permissionGuardName">
                            <option {{ old('guard_name') == 'User' ? 'selected' : '' }} value="User">User</option>
                            <option {{ old('guard_name') == 'Admin' ? 'selected' : '' }} value="Admin">Admin</option>
                        </select>
                    </div>
                    <div class="buttons text-end">
                        <button type="submit" class="btn btn-primary py-1">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@if ($errors->any())
    <script>
        $(document).ready(function() {
            $('#addRoleModal').modal('show');
        });
    </script>
@endif

@endsection
