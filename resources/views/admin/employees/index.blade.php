@extends('layouts.admin')
@section('title', 'Employees List')
@section('header-links')
<li class="breadcrumb-item"><a href="/admin/users/home"> {{__('employees.employees')}}</a></li>
<li class="breadcrumb-item active" aria-current="page"> {{__('employees.employees-list')}}</li>
@endsection
@section('contents')
<h1 class="my-3 pb-2" id="view-title">
    <i class="fa fa-cogs"></i> {{__('employees.employees-list')}}
</h1>
<div class="card-body my-4 mx-3">
    <table id="AdminsTable" class="table table-striped table-hover shadow-sm">
        <thead>
            <tr class="bg-secondary">
                <th class="fw-bold" style="font-size: 14px"><i class="fa fa-hashtag"></i></th>
                <th class="fw-bold" style="font-size: 14px">{{__('employees.employee-name')}}</th>
                <th class="fw-bold" style="font-size: 14px">{{__('employees.employment-id')}}</th>
                <th class="fw-bold" style="font-size: 14px">{{__('employees.join-date')}}</th>
                <th class="fw-bold" style="font-size: 14px">{{__('employees.job-title')}}</th>
                <th class="fw-bold" style="font-size: 18px"><i class="fas fa-sliders"></i></th>
            </tr>
        </thead>
        <tbody>
        @forelse ($employees as $employee)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $employee->profile ? $employee->profile->first_name . ' ' . $employee->profile->last_name : explode('@', $employee->email)[0] }}
                    [ {{ $employee->employeeName }} ] </td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->created_at }}</td>
                <td>
                    {{$employee->roles}}
                </td>

                <td>
                    <a href="{{ route('display-admin', [$employee->id]) }}"><i class="fa fa-eye"
                            title="Display Admins info"></i></a>

                    <a href="{{ route('destroy-admin', $employee->id) }}"
                        onclick="return confirm('This action is one way, you will not able to undo this, are you sure.?')"><i
                            class="fa fa-trash text-danger" title="Delete Admin"></i></a>
                    <button class="btn" data-bs-toggle="modal" data-bs-target="#roleModal" onclick="setUserId({{ $employee->id }})">
                        <i class="fa fa-user-plus"></i>
                    </button>
                </td>
            </tr>
        @empty
        <tr>
            <td colspan="7">لم يتم بعد تسجيل أى موظفين حتى الان، بادر بـ   
                    <a href="{{ route('create-new-employee') }}"> ادخال/
                         اضافة أول موظف
                    </a>
                    في التطبيق
                </td>
            </tr>
        @endforelse
           
        </tbody>
    </table>
</div>

@endsection
