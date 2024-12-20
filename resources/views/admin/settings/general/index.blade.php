@extends('layouts.admin')

@section('contents')
<h1 class="my-3 pb-2" style="border-bottom: 2px solid #dedede">
    <i class="fa fa-cogs"></i> Application Settings
</h1>

<div class="setting-items-groups">
    
    <div class="card mb-3">
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
                            <p class="my-0"><b>Profile Settings</b></p>
                            <small>Manage your profile</small>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-language"></i> Language Settings
        </div>
        <div class="card-body">
            <p>Select your preferred language</p>
            <a href="{{ '' }}" class="btn btn-primary">Edit</a>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-shield-alt"></i> Security Settings
        </div>
        <div class="card-body">
            <p>Manage your security settings</p>
            <a href="{{ '' }}" class="btn btn-primary">Edit</a>
        </div>
    </div>

</div>
@endsection