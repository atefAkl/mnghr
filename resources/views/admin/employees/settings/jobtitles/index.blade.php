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
        <h4 class=" col-auto" id="view-title">{{ __('jobtitles.list') }}</h4>
        <a data-bs-toggle="modal" data-bs-target="#createModal" 
            class="btn btn-outline-primary py-0">
            <i class="fa fa-copy"></i> &nbsp; {{ __('jobtitles.create') }}
        </a>
    </div>
<div class="card-body my-2 mx-3">
<table class="table">
    <thead>
        <tr>
            <th><i class="fa fa-hashtag"></i></th>
            <th>{{ __('jobtitles.title') }}</th>
            <th>{{ __('jobtitles.description') }}</th>
            <th>{{ __('jobtitles.status') }}</th>
            <th><i class="fa fa-sliders"></i></th>
        </tr>
    </thead>
    <tbody>
        @foreach($jobtitles as $jobtitle)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{ $jobtitle->title }}</td>
            <td style="max-width: 450px">{{ $jobtitle->description }}</td>
            <td>{{ $jobtitle->status ? __('settings.active') : __('settings.inactive') }}</td>
            <td>
                <a href="{{ route('edit-jobtitle-info', $jobtitle->id) }}" class="btn btn-sm py-0 btn-outline-primary">{{ __('jobtitles.edit') }}</a>
                <form action="{{ route('delete-jobtitle', $jobtitle->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm py-0 btn-outline-danger">{{ __('jobtitles.delete') }}</button>
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
                <h5 class="modal-title col" id="createModalLabel">{{ __('jobtitles.create-new-modal-title') }}</h5>
                <button type="button" class="close rounded-circle" data-bs-dismiss="modal" aria-label="Close" style="width: 30px">
                    <span class="fw-bold" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('store-jobtitle-info') }}" method="POST" id="createDepartmentForm" autocomplete="off">
                    @csrf
                    <label class="form-label" for="depart-name">{{ __('jobtitles.title') }}</label>
                    <div class="input-group mb-1">
                        <input type="text" id="depart-name" value="{{old('title.ar')}}"
                            placeholder="{{ __('jobtitles.title-ar-placeholder') }}" 
                            name="title[ar]" autocomplete="off" class="form-control @error('title.ar') is-invalid @enderror" required>
                        <input type="text" id="depart-name-en" value="{{old('title.en')}}" 
                            placeholder="{{ __('jobtitles.title-en-placeholder') }}" 
                            name="title[en]" autocomplete="off" class="form-control @error('title.en') is-invalid @enderror" required>
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label" for="depart-description">{{ __('jobtitles.description') }}</label>
                        <textarea id="depart-description" name="description[ar]" id="depart-description" 
                            class="form-control mb-1  @error('description.en') is-invalid @enderror"
                            placeholder="{{ __('jobtitles.description-ar-placeholder') }}"></textarea>
                        <textarea id="depart-description-en" name="description[en]" id="depart-description-en" 
                            class="form-control @error('description.en') is-invalid @enderror"
                            placeholder="{{ __('jobtiles.description-en-placeholder') }}"></textarea>
                    </div>
                    <div class="input-group mb-1">
                        <label class="input-group-text" for="parent-id">{{ __('jobtitles.parent') }}</label>
                        <select id="parent-id" placeholder="{{ __('jobtitles.parent') }}" 
                            name="parent_id" autocomplete="off" class="form-select">
                            <option value="">{{ __('jobtitles.parent-default-option') }}</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn py-1 btn-outline-primary">{{ __('jobtitles.save') }}</button>
                        <button type="button" class="btn py-1 btn-outline-danger" data-bs-dismiss="modal">{{ __('settings.close') }}</button>
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