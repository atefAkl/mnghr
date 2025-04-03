@extends('layouts.admin')
@section ('title', __('settings.general-settings'))
@section('header-links')
<li class="breadcrumb-item"><a href="/admin/users/home"> {{__('settings.breadcrumb.settings')}}</a></li>
<li class="breadcrumb-item"><a href="/admin/users/home"> {{__('settings.breadcrumb.departments')}}</a></li>
<li class="breadcrumb-item active" aria-current="page"> {{__('settings.breadcrumb.departments-list')}}</li>
@endsection
@section('contents')

{{-- Department Levels List --}}
<nav class="mt-3">
    <div class="nav nav-tabs gap-1" id="myTab" role="tablist">
        <a href="{{route('display-department-levels-list')}}" class="nav-item nav-link active ms-5" aria-selected="true">{{__('layout.tabs.hierarchy-group')}}</a>
        <a href="{{route('display-departments-list')}}" class="nav-item nav-link" aria-selected="true">{{__('layout.tabs.departments')}}</a>
        <a href="{{route('display-jobtitles-list')}}" class="nav-item nav-link" aria-selected="false">{{__('layout.tabs.jobtitles')}}</a>
        <a href="{{route('display-employees-list')}}" class="nav-item nav-link" aria-selected="false">{{__('layout.tabs.employees')}}</a>
    </div>
</nav>
<div id="view-content" class="tab-content w-100 px-3 pt-2 mb-5" style="">
        <div class="d-flex justify-content-between pb-2">
            
            <h3 class="mb-0">{{ __('settings.admin-levels') }}</h3>
            <a class="btn btn-outline-primary py-0" data-bs-toggle="modal" data-bs-target="#createNewLevel">
                <i class="fas fa-copy mr-2"></i> {{ __('settings.create') }}
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th><i class="fa fa-hashtag"></i></th>
                            <th>{{ __(' Name') }}</th>
                            <th>{{ __('Group') }}</th>
                            <th>{{ __('Order') }}</th>
                            <th><i class="fa fa-sliders"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($levels as $level)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            
                            <td>{{ $level->name }}</td>
                            
                            <td>
                               {{ $hierarchyGroups[$level->hierarchy_group]}}
                                   
                            </td>
                            <td>{{ $level->order }}</td>
                            <td>
                                <a href="{{ route('department-levels-edit', $level->id) }}" 
                                    class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('department-levels-destroy', $level->id) }}" 
                                        method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('{{ __('Are you sure?') }}')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">
                                    {{ __('No levels found') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{$levels->links()}}
                </div>
        </div>
    </div>
</div>

{{-- Modal --}}
<div class="modal fade w-800" id="createNewLevel" tabindex="-1"
    role="dialog" aria-labelledby="createNewLevelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content w-100">
            <div class="modal-header">
                <h3 class="modal-title" id="createNewLevelLabel">
                    {{ __('settings.create-department-level') }}
                </h3>
                {{-- close modal --}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form method="POST" 
                    action="{{  route('department-levels-store') }}">
                    @csrf

                    <!-- Key Field -->
                <div class="row">
                    <div class="col col-12 mb-2">
                        <div class="input-group">
                            <label for="name_en" class="input-group-text">
                                {{ __('settings.name') }} <span class="text-danger">*</span>
                            </label>
                            <input id="name_ar" type="text" class="form-control @error('name.en') is-invalid @enderror" 
                                placeholder="{{__('settings.name-ar-placeholder')}}" name="name[ar]" value="{{ old('name.ar', $level->name['en'] ?? '') }}" required>
                            <input id="name_en" type="text" class="form-control @error('name.en') is-invalid @enderror" 
                                placeholder="{{__('settings.name-en-placeholder')}}" name="name[en]" value="{{ old('name.en', $level->name['en'] ?? '') }}" required>
                        </div>

                        <div class="c">
                            <small class="form-text text-muted">{{ __('settings.name-info') }}</small>

                            @error('name.en')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col col-6 mb-2">
                        <div class="input-group">
                            <label for="key" class="input-group-text">
                                {{ __('settings.level-key') }} <span class="text-danger">*</span>
                            </label>
                            <input id="key" type="text" class="form-control @error('key') is-invalid @enderror" 
                                name="key" value="{{ old('key') }}" required>
                        </div>
                        <small class="form-text text-muted">{{ __('settings.level-key-info') }}</small>

                        @error('key')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        {{-- Hierarchy Group --}}
                        <div class="input-group mt-2">
                            <label for="hierarchy_group" class="input-group-text">
                                {{ __('Hierarchy Group') }} <span class="text-danger">*</span>
                            </label>

                            <select id="hierarchy_group" class="form-select @error('hierarchy_group') is-invalid @enderror" 
                            name="hierarchy_group" required>
                            @forelse($hierarchyGroups as $key => $value)
                                <option value="{{ $key }}" {{ old('hierarchy_group', $level->hierarchy_group ?? '') == $key ? 'selected' : '' }}>
                                    {{ $value }}
                                </option>
                            @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="">

                            @error('hierarchy_group')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col col-6">
                        <div class="input-group">
                            <label for="order" class="input-group-text">
                                {{ __('settings.display-order') }}
                            </label>

                            <input id="order" type="number" class="form-control @error('order') is-invalid @enderror" 
                                name="order" value="{{ isset($level) ? 1+intval($level->order):1 }}">
                        </div>
                        <div class="">
                            <small class="form-text text-muted">{{ __('settings.display-order-info') }}</small>

                            @error('order')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="d-flex mt-2 justify-content-end gap-2">
                            <button type="submit" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-save ms-2"></i> &nbsp; {{ __('settings.create') }}
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-danger" data-bs-dismiss="#modal" aria-label="Close">
                                <i class="fas fa-times ms-2"></i> &nbsp; {{ __('settings.cancel') }}
                            </button>
                        </div>
                        
                    </div>
                </div>
                    

                    <!-- Hierarchy Group -->
                    

                    <!-- Order -->

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
