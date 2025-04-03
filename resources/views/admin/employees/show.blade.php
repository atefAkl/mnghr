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
        <h4 class=" col-auto" id="view-title">{{ $employee->name }}</h4>
       <a href="{{ route('edit-employee-info', [$employee->id]) }}"
           class="btn btn-outline-primary py-0">
           <i class="fa fa-edit"></i> 
       </a>
   </div>

<div class="card-body my-4">
    <div class="row">
        <div class="col-md-4">
            <img src="{{ $employee->profile_picture }}" alt="Profile Picture" class="img-fluid">
        </div>
        <div class="col-md-8">
            <p><strong>Employee ID:</strong> {{ $employee->uuid }}</p>
            <p><strong>Job Title:</strong> {{ $employee->jobtitle->title }}</p>
            <p><strong>Department:</strong> {{ $employee->department->name }}</p>
            <p><strong>Hire Date:</strong> {{ $employee->joined_at->format('Y-m-d') }}</p>
            <p><strong>Email:</strong> {{ $employee->email }}</p>
            <p><strong>Reports To:</strong> {{ $employee->manager->full_name ?? 'N/A' }}</p>
            </div>
    </div>
</div>


{{-- Modals --}}


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
