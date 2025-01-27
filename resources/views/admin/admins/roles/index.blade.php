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
                    @if ($roles && count($roles))
                        @php $roles_count = 0; @endphp
                        @foreach($roles as $role)
                        <tr>
                            <td>{{++$roles_count}}</td>
                            <td>{{ $role->label }}</td>
                            <td>{{ $role->roleNameAr }}</td>
                            <td>{{ $role->roleNameEn }}</td>
                            <td>{{ $role->guard_name }}</td>
                            <td>
                                <a class="btn p-0 mx-0 text-success" data-bs-toggle="tooltip" data-bs-title="Show Role Info" href="{{ route('show-role-info', [$role->id]) }}"><i class="fa fa-eye"></i></i></a>
                                <a class="btn p-0 mx-0 text-primary" data-bs-toggle="tooltip" data-bs-title="Edit Role Info" href="{{ route('edit-roles-info', [$role->id]) }}"><i class="fa fa-edit"></i></a>
                                <form action="{{ route('destroy-role', [$role->id]) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn text-danger p-0" type="submit" data-bs-toggle="tooltip" data-bs-title="Delete Role"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="3">No roles has been added yet, Add your <a data-bs-toggle="modal" data-bs-target="#addRoleModal">first role</a>.</td>
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
                <form method="POST" action="{{ route('store-role-info') }}">
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
                        <label for="roleNameAr" class="input-group-text">Name in Arabic</label>
                        <input type="text" name="roleNameAr" class="form-control @error('roleNameAr') is-invalid @enderror" id="roleNameAr" value="{{ old('roleNameAr') }}">
                        @error('roleNameAr')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="input-group sm mb-2">
                        <label for="roleNameEn" class="input-group-text">Name in English</label>
                        <input type="text" name="roleNameEn" class="form-control @error('roleNameEn') is-invalid @enderror" id="roleNameEn" value="{{ old('roleNameEn') }}">
                        @error('roleNameEn')
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
                        <label for="roleGuardName" class="input-group-text">Guard Name</label>
                        <select class="form-select" name="guard_name" id="roleGuardName">
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
