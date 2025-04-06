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
        <h4 class=" col-auto" id="view-title">{{ __('employees.edit-modal-title') }}</h4>
        <div class="d-flex gap-1">
            <a href="{{ route('display-employees-list') }}" data-bs-toggle="tooltip" data-bs-title="{{__('employees.back-home')}}" 
                class="btn btn-outline-primary py-0">
                <i class="fa fa-home"></i> 
            </a>
            <a href="{{ route('display-employee-info', [$employee->id]) }}" data-bs-toggle="tooltip" data-bs-title="{{__('employees.back-to-display')}}" 
                class="btn btn-outline-primary py-0">
                <i class="fa fa-user-tie"></i> 
            </a>
       </div>
   </div>

    <form class="" action="{{ route('update-employee-info') }}" method="post" enctype="multipart/form-data">
        @csrf 
        @method('put')
        <input type="hidden" name="id" value="{{$employee->id}}">
        <div class="input-group mb-1">
            <label for="name_ar" class="input-group-text">{{__('employees.name')}}</label>
            <input type="text" value="{{ old('name.ar') ?? $employee->getArabicName() }}" name="name[ar]" 
            id="name_ar" class="form-control" required>
            
            <input type="text" value="{{ old('name.en') ?? $employee->getEnglishName() }}" name="name[en]" 
            id="name_en" class="form-control" placeholder="{{__('employees.name-en-placeholder')}}" required>
        </div>

        <div class="input-group mb-1">
            <label for="natid_number" class="input-group-text">{{__('employees.natid-number')}}</label>
            <input type="text" value="{{ old('natid_number') ?? $employee->natid_number }}" name="natid_number" 
            placeholder="{{__('employees.nat-id-placeholder')}}" id="natid_number" class="form-control" >
            <label for="natid_type" class="input-group-text">{{__('employees.natid-type')}}</label>
            <select value="{{ old('natid_type') ?? $employee->natid_type }}" name="natid_type" id="id_type" class="form-select" >
                <option hidden>{{__('employees.select-natid-type')}}</option>
                <option {{(old('nat_type') ?? $employee->natid_type) == 'citizen' ? 'selected' : ''}} value="citizen">{{__('employees.citizen')}}</option>
                <option {{(old('nat_type') ?? $employee->natid_type) == 'resident' ? 'selected' : ''}} value="resident">{{__('employees.resident')}}</option>
                <option {{(old('nat_type') ?? $employee->natid_type) == 'visitor' ? 'selected' : ''}} value="visitor">{{__('employees.visitor')}}</option>
                <option {{(old('nat_type') ?? $employee->natid_type) == 'tourist' ? 'selected' : ''}} value="tourist">{{__('employees.tourist')}}</option>
                <option {{(old('nat_type') ?? $employee->natid_type) == 'passport' ? 'selected' : ''}} value="passport">{{__('employees.passport')}}</option>
            </select>
            <label for="joined_at" class="input-group-text">{{__('employees.joined-at')}}</label>
            <input type="date" name="joined_at" id="joined_at" class="form-control" value="{{old('joined_at') ?? explode(' ', $employee->joined_at)[0]}}">
        </div>

        <div class="input-group mb-1">
            <label for="department" class="input-group-text">{{__('employees.department')}}</label>
            <select name="department_id" id="department" class="form-select">
                <option value="">{{__('employees.select-department')}}</option>
                @forelse($departments as $department)
                <option {{ (old('department_id') ?? $employee->department_id) == $department->id ? 'selected' : '' }} value="{{ $department->id }}">{{ $department->name }}</option>
                @empty
                @endforelse
            </select>
            <label for="job_title" class="input-group-text">{{__('employees.job-title')}}</label>
            <select value="{{ old('job_title') ?? $employee->job_title }}" name="job_title" id="job_title" class="form-select" >
                <option hidden>{{__('employees.select-job-title')}}</option>
                @forelse ($jobtitles as $title)
                    <option {{(old('job_title') ?? $employee->job_title) == $title->id ? 'selected' : ''}} value="{{$title->id}}">{{$title->title}}</option>
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
                            <option {{(old('group_id') ?? $employee->group_id) == $group->id ? 'selected' : ''}} value="{{ $group->id }}">
                                {{ $group->name }}
                            </option>
                        @endforeach
                    </optgroup>
                    @empty
                @endforelse
            </select>
            <label for="" class="input-group-text">{{__('employees.employee-id')}}</label>
            <input type="text" class="form-control" name="uuid" value="{{$employee->uuid}}"/>
        </div>
        <div class="">
            
            @error('hierarchy_group')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        
        <div class="d-flex justify-content-end gap-1 mx-3 mt-0 mb-3">
            <button type="submit" data-bs-toggle="tooltip" data-bs-title="{{__('employees.save')}}" class="btn py-0 btn-outline-primary "><i class="fa fa-save"></i> </button>
            <button type="button" data-bs-toggle="tooltip" data-bs-title="{{__('employees.close')}}" class="btn py-0 btn-outline-danger " data-bs-dismiss="modal"><i class="fa fa-power-off"></i> </button>
        </div>
    </form>
    <form action="{{ route('upload-profile-picture') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <input type="hidden" name="id" value="{{ $employee->id }}">
        <div class="form-group">
            <label for="profile_picture">{{ __('employees.profile_picture') }}</label>
            <input type="file" class="form-control-file" id="profile_picture" name="profile_picture">
        </div>
        <div class="d-flex justify-content-end gap-1 mx-3 mt-0 mb-3">
            <button type="submit" data-bs-toggle="tooltip" data-bs-title="{{__('employees.save')}}" class="btn py-0 btn-outline-primary "><i class="fa fa-save"></i> </button>
            <button type="button" data-bs-toggle="tooltip" data-bs-title="{{__('employees.close')}}" class="btn py-0 btn-outline-danger " data-bs-dismiss="modal"><i class="fa fa-power-off"></i> </button>
        </div>
    </form>
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
    });
</script>

@endsection
