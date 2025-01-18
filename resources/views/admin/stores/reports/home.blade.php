@extends('layouts.admin')
@section('header-links')
    <li class="breadcrumb-item"><a href="/admin/stores/home">Stores</a></li>
    <li class="breadcrumb-item active" aria-current="page">Reports</li>
@endsection
@section('contents')
    <h2 class="mt-3">
        Reports Home
    </h2>
    {{-- <div class="row">
        <div class="col-9">
            <div class="card my-3 mx-4">
                <div class="card-header py-2 px-3">
                    <i class="fa fa-user"></i> General
                </div>
                <div class="card-body pt-0 pb-3">
                    <div class="row">
                        <a class="col col-4 setting-item text-secondary" href="{{route('display-stores-list')}}">
                            <div class="row mt-3">
                                <div class="item-icon">
                                    <i class="fa fa-warehouse fa-2x"></i>   
                                </div>
                                <div class="col item-text">
                                    <p class="my-0">All Stores</p>
                                    <small>List of Available Stores</small>
                                </div>
                            </div>
                        </a>
        
                        <a class="col col-4 setting-item text-secondary" href="{{route('display-recepits-list')}}">
                            <div class="row pt-3">
                                <div class="item-icon">
                                    <i class="fa fa-receipt fa-2x"></i>
                                </div>
                                <div class="col item-text">
                                    <p class="my-0">Store Receipts</p>
                                    <small>Display All Receipts</small>
                                </div>
                            </div>
                        </a>
        
                        <a class="col col-4 setting-item text-secondary" href="">
                            <div class="row pt-3">
                                <div class="item-icon">
                                    <i class="fa fa-users fa-2x"></i> 
                                </div>
                                <div class="col item-text">
                                    <p class="my-0">Store Admins</p>
                                    <small>Display All Store Admins</small>
                                </div>
                            </div>
                        </a>
                        <a class="col col-4 setting-item text-secondary" href="">
                            <div class="row pt-3">
                                <div class="item-icon">
                                    <i class="fa fa-map-signs fa-2x"></i>   
                                </div>
                                <div class="col item-text">
                                    <p class="my-0">Store Movements</p>
                                    <small>Display Material In / Out</small>
                                </div>
                            </div>
                        </a>
        
                        <a class="col col-4 setting-item text-secondary" href="">
                            <div class="row pt-3">
                                <div class="item-icon">
                                    <i class="fa fa-clipboard-list fa-2x"></i>
                                </div>
                                <div class="col item-text">
                                    <p class="my-0">Store Reports</p>
                                    <small>Display and Customize Reports</small>
                                </div>
                            </div>
                        </a>
        
                        <a class="col col-4 setting-item text-secondary" href="">
                            <div class="row pt-3">
                                <div class="item-icon">
                                    <i class="fa fa-cogs fa-2x"></i>
                                </div>
                                <div class="col item-text">
                                    <p class="my-0">Settings</p>
                                    <small>Store Settings and Options</small>
                                </div>
                            </div>
                        </a>
                      
                    </div>
                </div>
            </div>
        </div> --}}{{-- End of cards --}}
        <!--<div class="col-3" style=""> {{-- Start of wedgets --}}

        </div>-->
<style>
    .card-container {
        display: flex;
        flex-direction: row;
        gap: 0.5rem;
        flex-wrap: wrap;
    }
    
    .card {
        box-sizing: border-box;
        width: 200px;
        height: 200px;
        background-color: #f0f0f0;
        border-radius: 5px;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
        text-align: center;
    }
    
    .card-title {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #ffffff;
        color: #007bcc;
        font: Bolder 2rem/1.5 Cairo;
        position: absolute;
        bottom: 0;
        height: 100%;
        top: 0;
        transition: all 0.5s ease;
    }
    
    .card-description {
        font: 500 1.5em/1.5 Cairo;
        color: #ffffff;
        background-color: #007bff;
        position: absolute;
        top: 50%;
        height: 0;
        transition: all 0.5s ease;
    }
    
    .card:hover .card-title {
        top: -100%; /* ينزلق للأعلى */
        bottom: 100%; /* ينزلق للأعلى */
    }
    
    .card:hover .card-description {
        top: 0; /* يظهر الوصف */
        bottom: 0; /* يظهر الوصف */
    }
</style>
        <div class="card-container w-75">
            <div class="card">
                <div class="card-title row">
                    <h1 class="px-3">All Store Items Report</h1>
                </div>
                <a href="link1" class="card-description py-4 px-3">
                    <p>Represents all items in the store, even those without credits</p>
                    See More...
                </a>
            </div>
            <div class="card">
                <div class="card-title row">
                    <h1 class="px-3">Items Credit Report</h1>
                </div>
                <a href="link2" class="card-description py-4 px-3">
                    <p>Represents all items in the store, even those without credits</p>
                    See More...
                </a>
            </div>
            <div class="card">
                <div class="card-title row">
                    <h1 class="px-3">Over Quantities Report</h1>
                </div>
                <a href="link2" class="card-description py-4 px-3">
                    <p>Represents all items in the store, even those without credits</p>
                    See More...
                </a>
            </div>
            <div class="card">
                <div class="card-title row">
                    <h1 class="px-3">Quarter Material In / Out Report</h1>
                </div>
                <a href="link2" class="card-description py-4 px-3">
                    <p>Represents all items in the store, even those without credits</p>
                    See More...
                </a>
            </div>
            <div class="card">
                <div class="card-title row">
                    <h1 class="px-3"> input Receipt Report</h1>
                </div>
                <a href="{{route('print-Receipt-Case')}}" class="card-description py-4 px-3">
                    <p>Represents all Receipt in the store, even those without credits</p>
                    See More...
                </a>
            </div>
            <!-- يمكنك إضافة المزيد من الكروت هنا -->
        </div>
    </div>
@endsection