@extends('layouts.admin')
@section('title', 'Departments List')
@section('header-links')
<li class="breadcrumb-item"><a href="/admin/users/home"> {{__('settings.breadcrumb.settings')}}</a></li>
<li class="breadcrumb-item active" aria-current="page"> {{__('employees.breadcrumb.departments-list')}}</li>
@endsection
@section('contents')
<h1>{{ __('employees.departments-list') }}</h1>
<table class="table">
    <thead>
        <tr>
            <th>{{ __('employees.department.name') }}</th>
            <th>{{ __('employees.department.arabic_name') }}</th>
            <th>{{ __('employees.department.status') }}</th>
            <th>{{ __('employees.department.actions') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($departments as $department)
        <tr>
            <td>{{ $department->name }}</td>
            <td>{{ $department->arabic_name }}</td>
            <td>{{ $department->status }}</td>
            <td>
                <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-primary">{{ __('employees.edit') }}</a>
                <form action="{{ route('departments.destroy', $department->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">{{ __('employees.delete') }}</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection