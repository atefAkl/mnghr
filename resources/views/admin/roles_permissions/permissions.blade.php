@extends('layouts.admin')
@section('header-links')
    <li class="breadcrumb-item"><a href="/admin/users/home">Users</a></li>
    <li class="breadcrumb-item active" aria-current="page">Permissions</li>
@endsection
@section('contents')
<div class="container">
    <div class="setting-items-groups">
        <h2 class="my-3">Permissions
        </h2>
        
        <fieldset class="mt-4 mx-0 mb-0 w-75 border-radius-1">
            <legend class="border-radius-1 px-3 py-1">Permissions
                <button class="btn p-0" data-bs-toggle="modal" data-bs-target="#addPermissionModal">
                    <i data-bs-title="Add New Permission" data-bs-toggle="tooltip" class="fa fa-plus"></i>
                </button>
            </legend>
            <table class="table table-striped table-bordered ">
                <thead>
                    <tr>
                        <th>Permission Name</th>
                        <th>Actions</th>
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

<!-- Add Permission Modal -->
<div class="modal fade" id="addPermissionModal" tabindex="-1" aria-labelledby="addPermissionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPermissionModalLabel">Add New Permission</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('roles-permissions-store') }}">
                    @csrf
                    <div class="input-group sm mb-2">
                        <label for="permissionNameAr" class="input-group-text">Name in Arabic</label>
                        <input type="text" class="form-control" id="permissionNameAr">
                    </div>
                    <div class="input-group sm mb-2">
                        <label for="permissionNameEn" class="input-group-text">Name in English</label>
                        <input type="text" class="form-control" id="permissionNameEn">
                    </div>
                    <div class="input-group sm mb-2">
                        <label for="permissionDescription" class="input-group-text">Description</label>
                        <textarea class="form-control" id="permissionDescription"></textarea>
                    </div>
                    <div class="input-group sm mb-2">
                        <label for="permissionGuardName" class="input-group-text">Guard Name</label>
                        <select class="form-select" id="permissionGuardName">
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
@endsection
