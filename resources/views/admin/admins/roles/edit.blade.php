@extends('layouts.admin')
@section('header-links')
    <li class="breadcrumb-item"><a href="/admin/users/home">Users</a></li>
    <li class="breadcrumb-item"><a href="{{route('display-roles-list')}}">Roles</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
@endsection
@section('contents')

    <div class="setting-items-groups mt-5">
        
        <fieldset class="mt-4 mx-0 mb-0 w-75 border-radius-1">
            <legend class="border-radius-1 px-3 py-1">{{__('Edit Role Info') }}</legend>
            
            <form method="POST" action="{{ route('update-roles-info', [$role->id]) }}">
                @csrf
                @method('put')
                <div class="input-group sm mb-2">
                    <label for="label" class="input-group-text">Label</label>
                    <input type="text" name="label" class="form-control @error('label') is-invalid @enderror" id="label" value="{{ old('label', $role->label) }}">
                    @error('label')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="input-group sm mb-2">
                    <label for="roleNameAr" class="input-group-text">Name in Arabic</label>
                    <input type="text" name="roleNameAr" class="form-control @error('roleNameAr') is-invalid @enderror" id="roleNameAr" value="{{ old('roleNameAr', $role->roleNameAr) }}">
                    @error('roleNameAr')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="input-group sm mb-2">
                    <label for="roleNameEn" class="input-group-text">Name in English</label>
                    <input type="text" name="roleNameEn" class="form-control @error('roleNameEn') is-invalid @enderror" id="roleNameEn" value="{{ old('roleNameEn', $role->roleNameEn) }}">
                    @error('roleNameEn')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="input-group sm mb-2">
                    <label for="brief" class="input-group-text">Description</label>
                    <input type="text" name="brief" class="form-control @error('brief') is-invalid @enderror" id="brief" value="{{ old('brief', $role->brief) }}">
                    @error('brief')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="input-group sm mb-2">
                    <label for="roleGuardName" class="input-group-text">Guard Name</label>
                    <select class="form-select @error('guard_name') is-invalid @enderror" name="guard_name" id="roleGuardName">
                        <option value="User" {{ $role->guard_name == 'User' ? 'selected' : '' }}>User</option>
                        <option value="Admin" {{ $role->guard_name == 'Admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                    @error('guard_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="buttons text-end">
                    <button type="submit" class="btn btn-primary py-1">Save</button>
                </div>
            </form>
        </fieldset>
    </div>

@append
