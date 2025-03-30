@extends('layouts.admin')

@section('content')
<h1>{{ __('employees.create-department') }}</h1>
<form action="{{ route('departments.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">{{ __('employees.name') }}</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="arabic_name">{{ __('employees.arabic_name') }}</label>
        <input type="text" name="arabic_name" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">{{ __('employees.save') }}</button>
</form>
@endsection
