@extends('layouts.admin')

@section('contents')
<h1 class="my-3 pb-2" style="border-bottom: 2px solid #dedede">
    <i class="fa fa-cogs"></i> Application Settings
</h1>
<style>
    .setting-item .item-icon,
    .setting-item .item-text  {
        transition: all 0.5s ease-in-out;
    }
    .setting-item:hover .item-icon {
        transform: scale(1.2) rotate(-1deg);
        color: #0b7baf;
    }
    .setting-item:hover .item-text p,
    .setting-item:hover .item-text small {
        color: #0b7baf;
    }
    .setting-item .item-text p {
        font: 800 0.9rem/1.2 'Cairo';

    }
    .setting-item .item-text small {
        font: normal 0.9rem/1.2 'Cairo';

    }
</style>
<div class="setting-items-groups">
    
    <div class="card w-75 mb-3">
        <div class="card-header py-2 px-3">
            <i class="fa fa-user"></i> User Settings
        </div>
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
    </div>

    <div class="card w-75 mb-3">
        <div class="card-header py-2 px-3">
            <i class="fa fa-user"></i> User Settings
        </div>
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
    </div>

    <div class="card w-75 mb-3">
        <div class="card-header py-2 px-3">
            <i class="fa fa-user"></i> User Settings
        </div>
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
    </div>

</div>
@endsection