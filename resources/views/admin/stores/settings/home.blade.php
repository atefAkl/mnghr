@extends('layouts.admin')
@section('header-links')
    <li class="breadcrumb-item"><a href="/admin/stores/home">Stores</a></li>
    <li class="breadcrumb-item active" aria-current="page">Settings</li>
@endsection
@section('contents')
    <h2 class="mt-3">
        Store Settings
    </h2>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item ms-5" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Home</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="branches-tab" data-bs-toggle="tab" data-bs-target="#branches-tab-pane" type="button" role="tab" aria-controls="branches-tab-pane" aria-selected="false">Branches</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="admins-tab" data-bs-toggle="tab" data-bs-target="#admins-tab-pane" type="button" role="tab" aria-controls="admins-tab-pane" aria-selected="false">Admins</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="receipt-types-tab" data-bs-toggle="tab" data-bs-target="#receipt-types-tab-pane" type="button" role="tab" aria-controls="receipt-types-tab-pane" aria-selected="false">Receipt Types</button>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <div class="p-3">
                <h3 class="h5 fw-bold">
                    Home
                </h3>
            </div>
        </div>
        <div class="tab-pane fade" id="branches-tab-pane" role="tabpanel" aria-labelledby="branches-tab" tabindex="0">
            <div class="p-3">
                <h3 class="h5 fw-bold">
                    Branches
                </h3>
            </div>
            
        </div>
        <div class="tab-pane fade" id="admins-tab-pane" role="tabpanel" aria-labelledby="admins-tab" tabindex="0">
            <div class="p-3">
                <h3 class="h5 fw-bold">
                    Admins
                </h3>
            </div>
        </div>
        <div class="tab-pane fade" id="receipt-types-tab-pane" role="tabpanel" aria-labelledby="receipt-types-tab" tabindex="0">
            <div class="p-3">
                <h3 class="h5 fw-bold">
                    Receipt Types
                </h3>
            </div>
        </div>
      </div>
      
@endsection