@extends('layouts.admin')
@section('header-links')
    <li class="breadcrumb-item"><a href="/admin/users/home">Users</a></li>
    <li class="breadcrumb-item active" aria-current="page">Permissions</li>
@endsection
@section('contents')
<div class="container">
    <div class="setting-items-groups">
        <h2 class="my-3">Roles And Permissions
        </h2>
        
        <fieldset class="mt-4 mx-0 mb-0 w-75 border-radius-1">
            <legend class="border-radius-1 px-3 py-1">Roles
                <button class="btn p-0" data-bs-toggle="modal" data-bs-target="#addRoleModal">
                    <i data-bs-title="Add New Role" data-bs-toggle="tooltip" class="fa fa-plus"></i>
                </button>
            </legend>
            <table class="table table-striped table-bordered ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Role Name</th>
                        <th><i class="fa fa-cogs"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @if ($roles && count($roles))
                        @php $roles_count = 0; @endphp
                        @foreach($roles as $role)
                        <tr>
                            <td>{{++$roles_count}}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <a href="{{ route('roles-permissions-edit', ['role', $role->id]) }}">تعديل</a>
                                <form action="{{ route('roles_permissions.destroy', ['role', $role->id]) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">حذف</button>
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
     
    <fieldset class="mt-4 mx-0 mb-0 w-75 border-radius-1">
        <legend class="border-radius-1 px-3 py-1">Permissions
            <button class="btn p-0" data-bs-toggle="modal" data-bs-target="#addPermissionModal">
                <i data-bs-title="Add New Permission" data-bs-toggle="tooltip" class="fa fa-plus"></i>
            </button>
        </legend>
    <table>
        <thead>
            <tr>
                <th>الصلاحيات</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($permissions as $permission)
            <tr>
                <td>{{ $permission->name }}</td>
                <td>
                    <a href="{{ route('roles_permissions.edit', ['type' => 'permission', 'id' => $permission->id]) }}">تعديل</a>
                    <form action="{{ route('roles_permissions.destroy', ['type' => 'permission', 'id' => $permission->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
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
                <form method="POST" action="{{ route('roles-permissions-store') }}">
                    @csrf
                    <div class="input-group sm mb-2">
                        <label for="roleNameAr" class="input-group-text">Name in Arabic</label>
                        <input type="text" class="form-control" id="roleNameAr">
                    </div>
                    <div class="input-group sm mb-2">
                        <label for="roleNameEn" class="input-group-text">Name in English</label>
                        <input type="text" class="form-control" id="roleNameEn">
                    </div>
                    <div class="input-group sm mb-2">
                        <label for="brief" class="input-group-text">Description</label>
                        <input type="text" class="form-control" id="brief">
                    </div>
                    <div class="input-group sm mb-2">
                        <label for="roleGuardName" class="input-group-text">Guard Name</label>
                        <select class="form-select" id="roleGuardName">
                            <option value="User">User</option>
                            <option value="Admin">Admin</option>
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

<!-- Add Permission Modal -->
<div class="modal fade" id="addPermissionModal" tabindex="-1" aria-labelledby="addPermissionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPermissionModalLabel">Add New Permission</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="permissionNameAr" class="form-label">Name in Arabic</label>
                        <input type="text" class="form-control" id="permissionNameAr">
                    </div>
                    <div class="mb-3">
                        <label for="permissionNameEn" class="form-label">Name in English</label>
                        <input type="text" class="form-control" id="permissionNameEn">
                    </div>
                    <div class="mb-3">
                        <label for="permissionDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="permissionDescription"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="permissionGuardName" class="form-label">Guard Name</label>
                        <select class="form-select" id="permissionGuardName">
                            <option value="User">User</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection