@extends('layouts.admin')

@section('contents')

{{-- Department Levels List --}}
<div class="row justify-content-center">
    {{-- navs & tabs  --}}
    <h1 class="mt-3 border-bottom border-2">{{ __('settings.general-settings') }}</h1>


{{-- Edit Form --}}


    <div class="card-body">
        <form method="POST" 
            action="{{  route('department-levels-update') }}">
            @csrf
            @method('put')
            <input type="hidden" name="id" value="{{$level->id}}">
            <!-- Key Field -->
            <div class="row">
                <div class="col col-12 mb-2">
                    <div class="input-group">
                        <label for="name_en" class="input-group-text">
                            {{ __('settings.name') }} <span class="text-danger">*</span>
                        </label>
                        <input id="name_ar" type="text" class="form-control @error('name.en') is-invalid @enderror" 
                            name="name[ar]" value="{{ old('name.ar', $level->getArabicName()) }}" required>
                        <input id="name_en" type="text" class="form-control @error('name.en') is-invalid @enderror" 
                            name="name[en]" value="{{ old('name.en', $level->getEnglishName()) }}" required>
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
                            name="key" value="{{ old('key', $level) }}" required>
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
                            name="order" value="{{ intval($level->order) }}">
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
                            <i class="fas fa-save ms-2"></i> &nbsp; {{ __('settings.update') }}
                        </button>
                        <a class="btn btn-sm btn-outline-danger" href="{{route('display-settings-home')}}">
                            <i class="fas fa-home ms-2"></i> &nbsp; {{__('settings.back')}}</a>
                    </div>
                    
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
