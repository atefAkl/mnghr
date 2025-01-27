@extends('layouts.admin')
@section('header-links')
    <li class="breadcrumb-item"><a href="/admin/users/home">Users</a></li>
    <li class="breadcrumb-item"><a href="{{route('roles-permissions-index')}}">Roles</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
@endsection
@section('contents')
<div class="container">
    <div class="setting-items-groups">
        <h2 class="my-3">تعديل {{ $type === 'role' ? 'دور' : 'صلاحية' }}</h2>

<form action="{{ route('roles_permissions.update', ['type' => $type, 'id' => @$item->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">الاسم:</label>
    <input type="text" name="name" id="name" value="{{ @$item->name }}" required>

    <button type="submit">تحديث</button>
</form>
    </div>

</div>
@append
