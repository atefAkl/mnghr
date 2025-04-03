@extends('layouts.admin')
@section('title', 'Departments List')
@section('header-links')
<li class="breadcrumb-item"><a href="/admin/users/home"> {{__('settings.breadcrumb.settings')}}</a></li>
<li class="breadcrumb-item"><a href="/admin/users/home"> {{__('settings.breadcrumb.departments')}}</a></li>
<li class="breadcrumb-item active" aria-current="page"> {{__('settings.breadcrumb.departments-list')}}</li>
@endsection
@section('contents')
<nav class="mt-3">
    <div class="nav nav-tabs gap-1" id="myTab" role="tablist">
        <a href="{{route('display-department-levels-list')}}" class="nav-item nav-link ms-5" aria-selected="true">{{__('layout.tabs.hierarchy-group')}}</a>
        <a href="{{route('display-departments-list')}}" class="nav-item nav-link" aria-selected="true">{{__('layout.tabs.departments')}}</a>
        <a href="{{route('display-jobtitles-list')}}" class="nav-item nav-link active" aria-selected="false">{{__('layout.tabs.jobtitles')}}</a>
        <a href="{{route('display-employees-list')}}" class="nav-item nav-link" aria-selected="false">{{__('layout.tabs.employees')}}</a>
    </div>
</nav>
<div id="view-content" class="tab-content w-100 px-3 pt-2 mb-5" style="">
    <div class="d-flex py-2 justify-content-between">
        <h4 class=" col-auto" id="view-title">{{ __('jobtitles.edit-jobtitle') }}</h4>
        <a href="{{route('display-jobtitles-list')}}" 
            class="btn btn-outline-primary py-0"> 
            <i class="fa fa-power-off"></i> &nbsp; {{ __('jobtitles.cancel') }}
        </a>
    </div>


{{-- Modals --}}
{{-- Create New Department Modal --}}

    <form action="{{ route('update-jobtitle-info') }}" method="POST" id="createDepartmentForm" autocomplete="off">
        @csrf
        @method('put')
        <input type="hidden" name="id" value="{{ $jobtitle->id }}">
        <label class="form-label" for="depart-name">{{ __('jobtitles.title') }}</label>
        <div class="input-group mb-1">
            <input type="text" id="depart-name"
                value="{{ old('title.ar', $jobtitle->getArabicTitle()) }}" 
                name="title[ar]" autocomplete="off" class="form-control @error('title.ar') is-invalid @enderror" required>
            <input type="text" id="depart-name-en"
                value="{{ old('title.en', $jobtitle->getEnglishTitle()) }}" 
                name="title[en]" autocomplete="off" class="form-control @error('title.en') is-invalid @enderror" required>
        </div>
        <div class="form-group mb-2">
            <label class="form-label" for="depart-description">{{ __('jobtitles.description') }}</label>
            <textarea id="depart-description" name="description[ar]" id="depart-description" 
                class="form-control mb-1  @error('description.en') is-invalid @enderror"
                >{{ old('title.ar', $jobtitle->getArabicDescription()) }}</textarea>
            <textarea id="depart-description-en" name="description[en]" id="depart-description-en" 
                class="form-control @error('description.en') is-invalid @enderror"
                >{{ old('title.ar', $jobtitle->getEnglishDescription()) }}</textarea>
        </div>
        <div class="input-group mb-1">
            <label class="input-group-text" for="parent-id">{{ __('jobtitles.parent') }}</label>
            <select id="parent-id" placeholder="{{ __('jobtitles.parent') }}" 
                name="parent_id" autocomplete="off" class="form-select">
                <option value="">{{ __('jobtitles.parent-default-option') }}</option>
                @foreach ($departments as $depart)
                    <option {{$jobtitle->parent_id == $depart->id ? 'selected' : ''}} value="{{ $depart->id }}">{{ $depart->name }}</option>
                @endforeach
            </select>
            <label class="input-group-text" for="">{{ __('settings.department.status') }}</label>
            <label class="input-group-text"><input name="status" id="depart-status" class="" type="checkbox" {{ $jobtitle->status ? 'checked' : '' }}></label>
            <label class="input-group-text" for="depart-status" id="depart-status-label">
            {{ $jobtitle->status ? __('settings.active') : __('settings.inactive') }}
            </label>
            <button type="submit" class="btn py-1 btn-outline-primary">{{ __('jobtitles.update') }}</button>
            
        </div>
    </form>
    <script>
        $(document).ready(function() {
            $('#depart-status').on('change', function() {
                if ($(this).is(':checked')) {
                    $(this).val(1);
                    $('#depart-status-label').text('{{ __('settings.active') }}');
                } else {
                    $(this).val(0);
                    $('#depart-status-label').text('{{ __('settings.inactive') }}');
                }
            });
            // 
            $('#depart-name').on('blur', function() {
                if ($(this).val() !== '' && $('#depart-name-en').val() === '') {
                    $('#depart-name-en').val($(this).val());
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