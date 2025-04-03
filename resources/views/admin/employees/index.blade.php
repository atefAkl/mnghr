@extends('layouts.admin')
@section('title', 'Employees List')
@section('header-links')
<li class="breadcrumb-item"><a href="/admin/users/home"> {{__('employees.employees')}}</a></li>
<li class="breadcrumb-item active" aria-current="page"> {{__('employees.employees-list')}}</li>
@endsection
@section('contents')
<nav class="mt-3">
    <div class="nav nav-tabs gap-1" id="myTab" role="tablist">
        <a href="{{route('display-department-levels-list')}}" class="nav-item nav-link ms-5" aria-selected="true">{{__('layout.tabs.hierarchy-group')}}</a>
        <a href="{{route('display-departments-list')}}" class="nav-item nav-link" aria-selected="true">{{__('layout.tabs.departments')}}</a>
        <a href="{{route('display-jobtitles-list')}}" class="nav-item nav-link" aria-selected="false">{{__('layout.tabs.jobtitles')}}</a>
        <a href="{{route('display-employees-list')}}" class="nav-item nav-link active" aria-selected="true">{{__('layout.tabs.employees')}}</a>
    </div>
</nav>
<div id="view-content" class="tab-content w-100 px-3 pt-2 mb-5" style="">
    <div class="d-flex py-2 justify-content-between">
        <h4 class=" col-auto" id="view-title">{{ __('employees.employees-list') }}</h4>
       <a data-bs-toggle="modal" data-bs-target="#createModal" 
           class="btn btn-outline-primary py-0">
           <i class="fa fa-copy"></i> 
       </a>
   </div>

<div class="card-body my-4">
    <table id="AdminsTable" class="table table-striped table-hover shadow-sm">
        <thead>
            <tr class="bg-secondary">
                <th><i class="fa fa-hashtag"></i></th>
                <th>{{__('employees.employee-name')}}</th>
                <th>{{__('employees.employment-id')}}</th>
                <th>{{__('employees.joined-at')}}</th>
                <th>{{__('employees.job-title')}}</th>
                <th><i class="fas fa-sliders"></i></th>
            </tr>
        </thead>
        <tbody>
        @forelse ($employees as $employee)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $employee->name }} </td>
                <td>{{ $employee->uuid }}</td>
                <td>{{ \Carbon\Carbon::parse($employee->joined_at)->format('Y-m-d') }}</td>
                <td>
                    {{$employee->jobtitle->title}}
                </td>
                <td>
                    <form action="{{ route('delete-employee') }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="id" value="{{ $employee->id }}">
                        {{-- عرض بيانات الموظف فى واجهة جديدة --}}
                        <a class="btn py-0 btn-outline-info btn-sm" href="{{ route('display-employee-info', [$employee->id]) }}" 
                            data-bs-toggle="tooltip" title="{{ __('employees.display') }}">
                            <i class="fa fa-id-card"></i>
                        </a>
                        {{-- تعديل بيانات الموظف فى واجهة منفصلة --}}
                        <a class="btn py-0 btn-outline-primary btn-sm" href="{{ route('display-employee-info', [$employee->id]) }}" 
                            data-bs-toggle="tooltip" title="{{ __('employees.edit') }}">
                            <i class="fa fa-edit"></i>
                        </a>
                        {{-- ترقية الموظف --}}
                        <a class="btn py-0 btn-outline-success btn-sm" href="{{ route('display-employee-info', [$employee->id]) }}" 
                            data-bs-toggle="modal" data-bs-target="#promoteModal">
                            <i data-bs-toggle="tooltip" title="{{ __('employees.promote') }}" class="fa fa-arrow-up"></i>
                        </a>
                        {{-- انهاء عقد الموظف --}}
                        <a href="#" class="btn py-0 btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#terminateModal">
                            <i data-bs-toggle="tooltip" title="{{__('employees.terminate')}}" class="fas fa-user-slash"></i>
                        </a>
                        {{-- حذف الموظف من قاعدة البيانات بشكل نهائي --}}
                        <button class="btn py-0 btn-outline-danger btn-sm" type="submit" onclick="return confirm('This action is one way, you will not able to undo this, are you sure.?')" 
                            data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('employees.delete') }}">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @empty
        <tr>
            {{-- رسالة تظهر فى حالة عدم وجود موظفين --}}
            <td colspan="7">لم يتم بعد تسجيل أى موظف حتى الآن، بادر بـ   
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


{{-- Modals --}}
{{-- Create New Employee Modal --}}
<div class="modal w-992 fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header py-1 d-flex align-items-between">
                <h5 class="modal-title py-0 my-0 col" id="createModalLabel">{{ __('employees.create-new-employee') }}</h5>
                <button type="button" class="close rounded-circle" data-bs-dismiss="modal" aria-label="Close" style="width: 30px">
                    <span class="fw-bold" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" action="{{ route('store-employee-info') }}" method="post">
                    @csrf    
                    <div class="input-group mb-1">
                        <label for="name_ar" class="input-group-text">{{__('employees.name')}}</label>
                        <input type="text" value="{{ old('name.ar') }}" name="name[ar]" 
                        id="name_ar" class="form-control" placeholder="{{__('employees.name-ar-placeholder')}}" required>
                        
                        <input type="text" value="{{ old('name.en') }}" name="name[en]" 
                        id="name_en" class="form-control" placeholder="{{__('employees.name-en-placeholder')}}" required>
                    </div>
        
                    <div class="input-group mb-1">
                        <label for="natid_number" class="input-group-text">{{__('employees.natid-number')}}</label>
                        <input type="text" value="{{ old('natid_number') }}" name="natid_number" 
                        placeholder="{{__('employees.nat-id-placeholder')}}" id="natid_number" class="form-control" >
                        <label for="natid_type" class="input-group-text">{{__('employees.natid-type')}}</label>
                        <select value="{{ old('natid_type') }}" name="natid_type" id="id_type" class="form-select" >
                            <option hidden>{{__('employees.select-natid-type')}}</option>
                            <option {{old('nat_type') == 'citizen' ? 'selected' : ''}} value="citizen">{{__('employees.citizen')}}</option>
                            <option {{old('nat_type') == 'resident' ? 'selected' : ''}} value="resident">{{__('employees.resident')}}</option>
                            <option {{old('nat_type') == 'visitor' ? 'selected' : ''}} value="visitor">{{__('employees.visitor')}}</option>
                            <option {{old('nat_type') == 'tourist' ? 'selected' : ''}} value="tourist">{{__('employees.tourist')}}</option>
                            <option {{old('nat_type') == 'passport' ? 'selected' : ''}} value="passport">{{__('employees.passport')}}</option>
                        </select>
                        <label for="joined_at" class="input-group-text">{{__('employees.joined-at')}}</label>
                        <input type="date" name="joined_at" id="joined_at" class="form-control" value="{{old('joined_at')}}">
                    </div>
        
                    <div class="input-group mb-1">
                        <label for="department" class="input-group-text">{{__('employees.department')}}</label>
                        <select name="department_id" id="department" class="form-select">
                            <option value="">{{__('employees.select-department')}}</option>
                            @forelse($departments as $department)
                            <option {{ old('department') == $department->id ? 'selected' : '' }} value="{{ $department->id }}">{{ $department->name }}</option>
                            @empty
                            @endforelse
                        </select>
                        <label for="job_title" class="input-group-text">{{__('employees.job-title')}}</label>
                        <select value="{{ old('job_title') }}" name="job_title" id="job_title" class="form-select" >
                            <option hidden>{{__('employees.select-job-title')}}</option>
                            @forelse ($jobtitles as $title)
                                <option value="{{$title->id}}">{{$title->title}}</option>
                                @empty
                                <option value="">No jobs found</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="input-group mb-2">
                        <label for="hierarchy_group" class="input-group-text">{{__('employees.job-grade')}}</label>
                        <select id="hierarchy_group" class="form-select @error('group_id') is-invalid @enderror" 
                             name="group_id" required>
                             <option hidden>{{__('employees.select-job-grade')}}</option>
                            @forelse($hierarchyGroups as $label => $groups)
                                <optgroup label="{{ __('settings.'.$label) }}">
                                    @foreach($groups as $group)
                                        <option value="{{ $group->id }}" {{$department->level_id == $group->id ? 'selected' : '' }}>
                                            {{ $group->name }}
                                        </option>
                                    @endforeach
                                </optgroup>
                                @empty
                            @endforelse
                        </select>
                        <label for="" class="input-group-text">{{__('employees.employee-id')}}</label>
                        <input type="text" class="form-control" name="uuid" value="{{$uuid}}"/>
                    </div>
                    <div class="">

                        @error('hierarchy_group')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="d-flex justify-content-end gap-1 mx-3 my-0">
                        <button type="submit" class="btn py-0 btn-outline-primary "><i class="fa fa-save"></i> </button>
                        <button type="button" class="btn py-0 btn-outline-danger " data-bs-dismiss="modal"><i class="fa fa-power-off"></i> </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Terminate Employee Contract Modal --}}
<div class="modal w-992 fade" id="terminateModal" tabindex="-1" role="dialog" aria-labelledby="terminateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header py-1 d-flex align-items-between">
                <h5 class="modal-title py-0 my-0 col" id="terminateModalLabel">{{ __('employees.terminate-modal-title') }}</h5>
                <button type="button" class="close rounded-circle" data-bs-dismiss="modal" aria-label="Close" style="width: 30px">
                    <span class="fw-bold" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" action="{{ route('store-employee-info') }}" method="post">
                    @csrf    
                    <input type="hidden" name="id" value="{{$employee->id}}"/>
                    
                    {{__('employees.employee-id')}}

                    <div class="d-flex justify-content-end gap-1 mx-3 my-0">
                        <button type="submit" class="btn py-0 btn-outline-primary "><i data-bs-toggle="tooltip" data-bs-title="{{ __('employees.save') }}" class="fa fa-save"></i> </button>
                        <button type="button" class="btn py-0 btn-outline-danger " 
                            data-bs-toggle="tooltip" data-bs-placement="top"
                            data-bs-title="{{ __('employees.close') }}" 
                            data-bs-dismiss="modal"><i class="fa fa-power-off"></i> </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#name_ar').on('blur', function() {
            if ($(this).val() !== '' && $('#name_en').val() === '') {
                $('#name_en').val($(this).val());
            }
        });
        $('#depart-description').on('blur', function() {
            if ($(this).val() !== '' && $('#depart-description-en').val() === '') {
                $('#depart-description-en').html($(this).val());
            }
        });
        $('[data-bs-toggle="tooltip"]').tooltip({
            placement: 'top'
        });
    });
</script>

@endsection
