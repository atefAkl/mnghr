@extends('layouts.admin')
@section('title', 'Edit Department')
@section('header-links')
<li class="breadcrumb-item"><a href="/admin/settings/home"> {{__('settings.breadcrumb.settings')}}</a></li>
<li class="breadcrumb-item"><a href="/admin/departments/list"> {{__('settings.breadcrumb.departments')}}</a></li>
<li class="breadcrumb-item active" aria-current="page"> {{__('settings.breadcrumb.edit-department')}}</li>
@endsection

@section('contents')

    <nav class="mt-3">
        <div class="nav nav-tabs" id="myTab" role="tablist">
            <div class="nav nav-tabs gap-1" id="myTab" role="tablist">
                <a href="{{route('display-department-levels-list')}}" class="nav-item nav-link ms-5" aria-selected="true">{{__('layout.tabs.hierarchy-group')}}</a>
                <a href="{{route('display-departments-list')}}" class="nav-item nav-link active" aria-selected="true">{{__('layout.tabs.departments')}}</a>
                <a href="{{route('display-jobtitles-list')}}" class="nav-item nav-link" aria-selected="false">{{__('layout.tabs.jobtitles')}}</a>
                <a href="{{route('display-employees-list')}}" class="nav-item nav-link" aria-selected="false">{{__('layout.tabs.employees')}}</a>
            </div>
        </div>
    </nav>
    <div id="view-content" class="tab-content w-100 px-3 pt-2 pb-3" style="">
        <div class="d-flex py-2 justify-content-between">
            <h4 class=" col-auto" id="view-title">{{ __('settings.department.edit-department-info') }}</h4>
            <a class="btn py-0 btn-outline-primary" href="{{route('display-departments-list')}}">
                <i class="fa fa-power-off"></i> &nbsp; {{ __('settings.cancel') }}
            </a>
        </div>
        <div class="card-body my-2">
            <form action="{{ route('update-department-info', $department->id) }}" method="POST" id="createDepartmentForm" autocomplete="off">
                @csrf
                @method('PUT')
                <label class="form-label" for="depart-name">{{ __('settings.department.name') }}</label>
                <div class="input-group mb-1">
                    <input type="text" id="depart-name" placeholder="{{ __('settings.department.name-ar-placeholder') }}" 
                        name="name" autocomplete="off" class="form-control" value="{{ $department->name }}" required>
                    <input type="text" id="depart-name-en" placeholder="{{ __('settings.department.name-en-placeholder') }}" 
                    name="name_en" autocomplete="off" class="form-control" value="{{ $department->name_en }}" required>
                </div>
                <div class="form-group mb-2">
                    <label class="form-label" for="depart-description">{{ __('settings.department.description') }}</label>
                    <textarea id="depart-description" name="description" id="depart-description" autocomplete="off" class="form-control mb-1"
                        placeholder="{{ __('settings.department.description-ar-placeholder') }}" required>{{ $department->description }}</textarea>
                    <textarea id="depart-description-en" name="description_en" id="depart-description-en" autocomplete="off" class="form-control"
                        placeholder="{{ __('settings.department.description-en-placeholder') }}" required>{{ $department->description_en }}</textarea>
                </div>

                <div class="input-group mb-1">
                    <label class="input-group-text" for="parent-id">{{ __('settings.department.related-section') }}</label>
                    <select id="parent-id" placeholder="{{ __('settings.department.parent') }}" 
                        name="parent_id" autocomplete="off" class="form-select">
                        <option value="0">{{ __('settings.department.root-section') }}</option>
                        @foreach ($departments as $depart)
                            <option value="{{ $depart->id }}">{{ $depart->name }}</option>
                        @endforeach
                    </select>
                
                    <label for="level" class="input-group-text">
                        {{ __('settings.department.level') }} <span class="text-danger">*</span>
                    </label>

                    <select id="level_id" class="form-select @error('level_id') is-invalid @enderror" 
                            name="level_id" required>
                        <option value="">-- {{ __('Select Organizational Level') }} --</option>
                        
                        <!-- المستوى التنفيذي -->
                        @foreach($levels as $label => $groups)
                            <optgroup label="{{ __('settings.'.$label) }}">
                                @foreach($groups as $group)
                                    <option value="{{ $group->id }}" {{$department->level_id == $group->id ? 'selected' : '' }}>
                                        {{ $group->name }}
                                    </option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                    <label class="input-group-text" for="">{{ __('settings.department.status') }}</label>
                    <label class="input-group-text"><input name="status" id="depart-status" class="" type="checkbox" {{ $department->status ? 'checked' : '' }}></label>
                    <label class="input-group-text" for="depart-status" id="depart-status-label">
                    {{ $department->status ? __('settings.active') : __('settings.inactive') }}
                    </label>
                
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
    <script>
        $('#depart-status').on('change', function() {
            if ($(this).is(':checked')) {
                $(this).val(1);
                $('#depart-status-label').text('{{ __('settings.active') }}');
            } else {
                $(this).val(0);
                $('#depart-status-label').text('{{ __('settings.inactive') }}');
            }
        });
    </script>
@endsection
