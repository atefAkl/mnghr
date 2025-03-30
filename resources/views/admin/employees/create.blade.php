@extends('layouts.admin')
@section('title', 'New Employee')
@section('header-links')
<li class="breadcrumb-item"><a href="/admin/users/home"> {{__('employees.employees')}}</a></li>
<li class="breadcrumb-item active" aria-current="page"> {{__('employees.create-new-employee')}}</li>
@endsection
@section('contents')
<h1 class="my-3 pb-2" id="view-title">
    <i class="fa fa-cogs"></i> {{__('employees.create-new-employee')}}
</h1>
<div class="card-body my-2 mx-3">
    <fieldset>
        <legend>{{__('employees.personal-info')}}</legend>
        <form class="mt-3 p-3" action="{{ route('store-employee-info') }}" method="post">
            @csrf    
            <div class="input-group mb-1">
                <label for="name_ar" class="input-group-text">{{__('employees.name-ar')}}</label>
            <input type="text" value="{{ old('name_ar') }}" name="name_ar" id="name_ar" class="form-control" required>
            <label for="name_en" class="input-group-text">{{__('employees.name-en')}}</label>
            <input type="text" value="{{ old('name_en') }}" name="name_en" id="name_en" class="form-control">
            </div>
            
            <div class="input-group mb-1">
                <label for="gender" class="input-group-text">{{__('employees.gender')}}</label>
                <select name="gender" id="gender" class="form-select"> 
                    <option value="">{{__('employees.gender')}}</option>
                    <option {{ old('gender') == 'male' ? 'selected' : '' }} value="male">{{__('employees.male')}}</option>
                    <option {{ old('gender') == 'female' ? 'selected' : '' }} value="female">{{__('employees.female')}}</option>
                </select>
                <label for="birth_date" class="input-group-text">{{__('employees.birth-date')}}</label>
                <input type="date" value="{{ old('birth_date') }}" name="birth_date" id="birth_date" class="form-control" required>
                <label for="country" class="input-group-text">{{__('employees.country')}}</label>
                <select name="country" id="country" class="form-select"> 
                    <option value="">{{__('employees.country')}}</option>
                    @forelse($countries as $country)
                    <option {{ old('country') == $country->id ? 'selected' : '' }} value="{{ $country->id }}">{{$country->iso3}} - {{ $country->name }} - {{ $country->arabic_name }}</option>
                    @empty
                    <option value="">{{__('employees.country')}}</option>
                    @endforelse
                </select>
            </div>
            
            <div class="input-group mb-1">
                <label for="email" class="input-group-text">{{__('employees.email')}}</label>
                <input type="email" value="{{ old('email') }}" name="email"
                placeholder="{{__('employees.email-placeholder')}}" id="email" class="form-control" >
                <label for="phone" class="input-group-text">{{__('employees.phone')}}</label>
                <input type="text" value="{{ old('phone') }}" name="phone" 
                placeholder="{{__('employees.phone-placeholder')}}" id="phone" class="form-control" >
            </div>

            <div class="input-group mb-1">
                <label for="nat_id" class="input-group-text">{{__('employees.nat-id')}}</label>
                <input type="text" value="{{ old('nat_id') }}" name="nat_id" 
                placeholder="{{__('employees.nat-id-placeholder')}}" id="nat_id" class="form-control" >
                <label for="id_type" class="input-group-text">{{__('employees.id-type')}}</label>
                <input type="text" value="{{ old('id_type') }}" name="id_type" 
                placeholder="{{__('employees.id-type-placeholder')}}" id="id_type" class="form-control" >
            </div>

            <div class="input-group mb-1">
                <label for="department" class="input-group-text">{{__('employees.department')}}</label>
                <select name="department" id="department" class="form-select">
                    <option value="">{{__('employees.department')}}</option>
                    @forelse($departments as $department)
                    <option {{ old('department') == $department->id ? 'selected' : '' }} value="{{ $department->id }}">{{ $department->name }}</option>
                    @empty
                    @endforelse
                </select>
                <label for="job_title" class="input-group-text">{{__('employees.job-title')}}</label>
                <input type="text" value="{{ old('job_title') }}" name="job_title" 
                placeholder="{{__('employees.job-title-placeholder')}}" id="job_title" class="form-control" >
                <label for="job_grade" class="input-group-text">{{__('employees.job-grade')}}</label>
                <select name="job_grade" id="job_grade" class="form-select">
                    <option value="">{{__('employees.job-grade')}}</option>
                    @for($jobGrade = 1; $jobGrade <= 15; $jobGrade++)
                    <option {{ old('job_grade') == $jobGrade ? 'selected' : '' }} value="{{ $jobGrade }}">{{ $jobGrade }}</option>
                    @endfor
                </select>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary ">{{__('employees.save')}}</button>
            </div>
        </form>
    </fieldset>
</div>

@endsection
