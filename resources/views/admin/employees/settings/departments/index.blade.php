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
        <a href="{{route('display-departments-list')}}" class="nav-item nav-link active" aria-selected="true">{{__('layout.tabs.departments')}}</a>
        <a href="{{route('display-jobtitles-list')}}" class="nav-item nav-link" aria-selected="false">{{__('layout.tabs.jobtitles')}}</a>
        <a href="{{route('display-employees-list')}}" class="nav-item nav-link" aria-selected="false">{{__('layout.tabs.employees')}}</a>
    </div>
</nav>
<div id="view-content" class="tab-content w-100 px-3 pt-2 mb-5" style="">
    <div class="d-flex py-2 justify-content-between">
         <h4 class=" col-auto" id="view-title">{{ __('settings.departments-list') }}</h4>
        <a data-bs-toggle="modal" data-bs-target="#createModal" 
            class="btn btn-outline-primary py-0">
            <i class="fa fa-copy"></i> &nbsp; {{ __('settings.create') }}
        </a>
    </div>
<div class="card-body my-2">
<table class="table">
    <thead>
        <tr>
            <th><i class="fa fa-hashtag"></i></th>
            <th>{{ __('settings.department.name') }}</th>
            <th>{{ __('settings.department.description') }}</th>
            <th>{{ __('settings.department.status') }}</th>
            <th><i class="fa fa-sliders"></i></th>
        </tr>
    </thead>
    <tbody>
        @foreach($departments as $department)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{ $department->name }}</td>
            <td style="max-width: 450px">{{ $department->description() }}</td>
            <td>{{ $department->status ? __('settings.active') : __('settings.inactive') }}</td>
            <td>
                <a href="{{ route('edit-department-info', $department->id) }}" class="btn btn-sm py-0 btn-outline-primary">{{ __('settings.edit') }}</a>
                <form action="{{ route('delete-department', $department->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm py-0 btn-outline-danger">{{ __('settings.delete') }}</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


{{-- Modals --}}
{{-- Create New Department Modal --}}
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog w-75" role="document">
        <div class="modal-content"  style="width: 700px">
            <div class="modal-header d-flex align-items-between">
                <h5 class="modal-title col" id="createModalLabel">{{ __('settings.create-department-modal-title') }}</h5>
                <button type="button" class="close rounded-circle" data-bs-dismiss="modal" aria-label="Close" style="width: 30px">
                    <span class="fw-bold" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('store-department-info') }}" method="POST" id="createDepartmentForm" autocomplete="off">
                    @csrf
                    <label class="form-label" for="depart-name">{{ __('settings.department.name') }}</label>
                    <div class="input-group mb-1">
                        <input type="text" id="depart-name" placeholder="{{ __('settings.department.name-ar-placeholder') }}" 
                            name="name" autocomplete="off" class="form-control" required>
                        <input type="text" id="depart-name-en" placeholder="{{ __('settings.department.name-en-placeholder') }}" 
                        name="name_en" autocomplete="off" class="form-control" required>
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label" for="depart-description">{{ __('settings.department.description') }}</label>
                        <textarea id="depart-description" name="description" id="depart-description" autocomplete="off" class="form-control mb-1"
                            placeholder="{{ __('settings.department.description-ar-placeholder') }}"></textarea>
                        <textarea id="depart-description-en" name="description_en" id="depart-description-en" autocomplete="off" class="form-control"
                            placeholder="{{ __('settings.department.description-en-placeholder') }}"></textarea>
                    </div>
                    <div class="input-group mb-1">
                        <label class="input-group-text" for="parent-id">{{ __('settings.department.parent') }}</label>
                        <select id="parent-id" placeholder="{{ __('settings.department.parent') }}" 
                            name="parent_id" autocomplete="off" class="form-select">
                            <option value="">{{ __('settings.department.parent') }}</option>
                            @foreach ($departments as $depart)
                                <option value="{{ $depart->id }}">{{ $depart->name }}</option>
                            @endforeach
                        </select>
                    
                        <label for="level" class="input-group-text">
                            {{ __('settings.department.level') }} <span class="text-danger">*</span>
                        </label>

                        <select id="level_id" class="form-control @error('level_id') is-invalid @enderror" 
                                name="level_id" required>
                            <option value="">-- {{ __('Select Organizational Level') }} --</option>
                            
                            <!-- المستوى التنفيذي -->
                            @foreach($levels as $group => $levels)
                                <optgroup label="{{ $group }}">
                                    @foreach($levels as $level)
                                        <option value="{{ $level->id }}" {{ old('level_id') == $level->id ? 'selected' : '' }}>
                                            {{ $level->name }}
                                        </option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </div>
                    
                    <small class="form-text text-muted">Select the appropriate level in organizational hierarchy</small>
                    
                    @error('level')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="d-flex gap-1 justify-content-end">
                        <button type="submit" class="btn rounded-0 py-1 btn-outline-primary">{{ __('settings.save') }}</button>
                        <button type="button" class="btn rounded-0 py-1 btn-outline-secondary" data-bs-dismiss="modal">{{ __('settings.close') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
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