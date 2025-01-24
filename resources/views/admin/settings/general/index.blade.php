@extends('layouts.admin')

@section('contents')
<h1 class="my-3 pb-2" style="border-bottom: 2px solid #dedede">
    <i class="fa fa-cogs"></i> Application Settings
</h1>

<div class="setting-items-groups">
    
    <fieldset class="mt-4 mx-0 mb-0 w-75 border-radius-1">
        <legend class="px-3 border-radius-1">
            <i class="fa fa-user"></i> User Settings
        </legend>
        <div class="card-body">
            <div class="row ">
                <a class="col col-4 mb-3 setting-item text-secondary" href="">
                    <div class="row">
                        <div class="item-icon " style="width: 50px">
                            <i class="fa fa-shield-alt fa-2x"></i>    
                        </div>
                        <div class="col item-text ">
                            <p class="my-0">Permissions</p>
                            <small>Manage Users Permissions</small>
                        </div>
                    </div>
                </a>

                <a class="col col-4 mb-3 setting-item text-secondary" href="">
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

                <a class="col col-4 mb-3 setting-item text-secondary" href="">
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

                <a class="col col-4 mb-3 setting-item text-secondary" href="">
                    <div class="row">
                        <div class="item-icon " style="width: 50px">
                            <i class="fa fa-users fa-2x"></i> 
                        </div>
                        <div class="col item-text ">
                            <p class="my-0">Application Users</p>
                            <small>Add, Edit and Delete Users</small>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </fieldset>

    <fieldset class="mt-4 mx-0 mb-0 w-75 border-radius-1">
        <legend class="px-3 border-radius-1"> <i class="fa fa-filter"></i> Filters</legend>
        <div class="card-body">
            <div class="row ">
                <a class="col col-4 setting-item text-secondary" href="">
                    <div class="row">
                        <div class="item-icon " style="width: 50px">
                            <i class="fa fa-tags fa-2x"></i>    
                        </div>
                        <div class="col item-text ">
                            <p class="my-0">Profile Settings</p>
                            <small>Manage your profile</small>
                        </div>
                    </div>
                </a>

                <a class="col col-4 setting-item text-secondary" href="">
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

                <a class="col col-4 setting-item text-secondary" href="">
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

    <fieldset class="mt-4 mx-0 mb-0 w-75 border-radius-1">
        <legend class="px-3 border-radius-1">Filters</legend>
        <div class="card-body">
            <div class="row ">
                <a class="col col-4 setting-item text-secondary" href="">
                    <div class="row">
                        <div class="item-icon " style="width: 50px">
                            <i class="fa fa-tags fa-2x"></i>    
                        </div>
                        <div class="col item-text ">
                            <p class="my-0">Profile Settings</p>
                            <small>Manage your profile</small>
                        </div>
                    </div>
                </a>

                <a class="col col-4 setting-item text-secondary" href="">
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

                <a class="col col-4 setting-item text-secondary" href="">
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

</div>
@endsection