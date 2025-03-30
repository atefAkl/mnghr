@extends('layouts.admin')
@section('header-links')
<li class="breadcrumb-item"><a href="/admin/settings">{{__('settings.breadcrumb.settings')}}</a></li>
<li class="breadcrumb-item active" aria-current="page">{{__('settings.breadcrumb.home')}}</li>
@endsection
@section('contents')
<h1 class="pb-2" id="view-title">
    <i class="fa fa-cogs"></i> {{__('settings.application-settings')}}
</h1>

<div class="setting-items-groups mb-5">
    
    <fieldset class="mt-4">
        <legend class="px-3">
            <i class="fa fa-user"></i> {{__('settings.user-settings')}}
        </legend>
        <div class="card-body mx-3">
            <div class="row ">
                <a class="col col-4 mb-3 setting-item text-secondary" href="{{ route('display-roles-list') }}">
                    <div class="row">
                        <div class="item-icon " style="">
                            <i class="fa fa-shield-alt fa-2x"></i>    
                        </div>
                        <div class="col item-text ">
                            <p class="my-0">{{__('settings.permissions')}}</p>
                            <small>{{__('settings.permissions-text')}}</small>
                        </div>
                    </div>
                </a>

                <a class="col col-4 mb-3 setting-item text-secondary" href="{{ route('display-permissions-list') }}">
                    <div class="row">
                        <div class="item-icon " style="">
                            <i class="fa fa-user-lock fa-2x"></i> 
                        </div>
                        <div class="col item-text ">
                            <p class="my-0">{{__('settings.roles')}}</p>
                            <small>{{__('settings.roles-text')}}</small>
                        </div>
                    </div>
                </a>

                <a class="col col-4 setting-item text-secondary" href="{{ route('display-admins-list') }}">
                    <div class="row">
                        <div class="item-icon " style="">
                            <i class="fa fa-user-tie fa-2x"></i> 
                        </div>
                        <div class="col item-text ">
                            <p class="my-0">{{__('settings.admins')}}</p>
                            <small>{{__('settings.admins-text')}}</small>
                        </div>
                    </div>
                </a>

                <a class="col col-4 setting-item text-secondary" href="{{ route('settings.users.options') }}">
                    <div class="row">
                        <div class="item-icon " style="">
                            <i class="fa fa-user-cog fa-2x"></i> 
                        </div>
                        <div class="col item-text ">
                            <p class="my-0">{{__('settings.users-options')}}</p>
                            <small>{{__('settings.users-options-text')}}</small>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </fieldset>

    <fieldset class="mt-4">
        <legend class="px-3">
             <i class="fa fa-address-card"></i> {{__('settings.account')}}</legend>
        <div class="card-body">
            <div class="row ">
                <a class="col col-4 setting-item text-secondary" href="{{ route('settings.profile.settings') }}">
                    <div class="row">
                        <div class="item-icon " style="">
                            <i class="fa fa-tags fa-2x"></i>    
                        </div>
                        <div class="col item-text ">
                            <p class="my-0">{{__('settings.profile-settings')}}</p>
                            <small>Manage your profile</small>
                        </div>
                    </div>
                </a>

                <a class="col col-4 setting-item text-secondary" href="{{ route('settings.users.roles') }}">
                    <div class="row">
                        <div class="item-icon " style="">
                            <i class="fa fa-user-lock fa-2x"></i> 
                        </div>
                        <div class="col item-text ">
                            <p class="my-0">Users Roles</p>
                            <small>Manage Roles and Permissions</small>
                        </div>
                    </div>
                </a>

                <a class="col col-4 setting-item text-secondary" href="{{ route('settings.employees') }}">
                    <div class="row">
                        <div class="item-icon " style="">
                            <i class="fa fa-users fa-2x"></i> 
                        </div>
                        <div class="col item-text ">
                            <p class="my-0">Employees</p>
                            <small>Manage Employees information</small>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </fieldset>

    <fieldset class="mt-4">
        <legend class="px-3"><i class="fas fa-filter"></i> {{__('settings.filters')}}</legend>
        <div class="card-body">
            <div class="row ">
                <a class="col col-4 setting-item text-secondary" href="{{ route('settings.profile.settings') }}">
                    <div class="row">
                        <div class="item-icon " style="">
                            <i class="fa fa-tags fa-2x"></i>    
                        </div>
                        <div class="col item-text ">
                            <p class="my-0">Profile Settings</p>
                            <small>Manage your profile</small>
                        </div>
                    </div>
                </a>

                <a class="col col-4 setting-item text-secondary" href="{{ route('settings.users.roles') }}">
                    <div class="row">
                        <div class="item-icon " style="width: 50px">
                            <i class="fa fa-user-lock fa-2x"></i> 
                        </div>
                        <div class="col item-text ">
                            <p class="my-0">Users Roles</p>
                            <small>Manage Roles and Permissions</small>
                        </div>
                    </div>
                </a>

                <a class="col col-4 setting-item text-secondary" href="{{ route('settings.employees') }}">
                    <div class="row">
                        <div class="item-icon " style="width: 50px">
                            <i class="fa fa-users fa-2x"></i> 
                        </div>
                        <div class="col item-text ">
                            <p class="my-0">Employees</p>
                            <small>Manage Employees information</small>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </fieldset>
{{-- الموارد البشرية --}}
    <fieldset class="mt-4">
        <legend class="px-3"><i class="fas fa-users"></i> {{__('settings.employees')}}</legend>
        <div class="card-body">
            <div class="row ">
                <a class="col col-4 setting-item text-secondary" href="{{ route('display-employees-list') }}">
                    <div class="row">
                        <div class="item-icon " style="">
                            <i class="fa fa-tags fa-2x"></i>    
                        </div>
                        <div class="col item-text ">
                            <p class="my-0">{{__('settings.employees-list')}}</p>
                            <small>{{__('settings.employees-list-text')}}</small>
                        </div>
                    </div>
                </a>

                <a class="col col-4 setting-item text-secondary" href="{{ route('settings.users.roles') }}">
                    <div class="row">
                        <div class="item-icon " style="width: 50px">
                            <i class="fa fa-user-lock fa-2x"></i> 
                        </div>
                        <div class="col item-text ">
                            <p class="my-0">{{__('settings.job-offers')}}</p>
                            <small>{{__('settings.job-offers-text')}}</small>
                        </div>
                    </div>
                </a>

                <a class="col col-4 setting-item text-secondary" href="{{ route('settings.employees') }}">
                    <div class="row">
                        <div class="item-icon " style="width: 50px">
                            <i class="fa fa-users fa-2x"></i> 
                        </div>
                        <div class="col item-text ">
                            <p class="my-0">{{__('settings.salaries')}}</p>
                            <small>{{__('settings.salaries-text')}}</small>
                        </div>
                    </div>
                </a>
                
                <a class="col col-4 setting-item text-secondary" href="{{ route('settings.employees') }}">
                    <div class="row">
                        <div class="item-icon " style="width: 50px">
                            <i class="fa fa-users fa-2x"></i> 
                        </div>
                        <div class="col item-text ">
                            <p class="my-0">{{__('settings.vaccations')}}</p>
                            <small>{{__('settings.vaccations-text')}}</small>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </fieldset>

</div>
@endsection