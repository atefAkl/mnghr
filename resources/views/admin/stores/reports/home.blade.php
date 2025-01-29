@extends('layouts.admin')
@section('header-links')
    <li class="breadcrumb-item"><a href="/admin/stores/home">Stores</a></li>
    <li class="breadcrumb-item active" aria-current="page">Reports</li>
@endsection
@section('contents')

<style>
    .card {
        height: 150px;
        width: 100%;
        border-radius: 5px;
        overflow: hidden;
        cursor: pointer;
    }

    .card .card-title,
    .card .card-description {
        width: 100%;
        margin: 0;
        display: block;
        transition: all 0.3s ease;
        height: 150px;
        color: #fff;
    }
    
    .card .card-title h1 {
        font-size: 36px;
        background-color: #35c;
        display: flex;
        height: 150px;
        justify-content: center;
        align-items: center;
    }

    .card a.card-description {
        font-size: 1.3rem;
        background-color: #385;
        text-align: center;
    }

    .card:hover .card-title {
        margin-top: -150px;
    }
</style>

<div class="setting-items-groups mt-5">
    
    <fieldset class="mx-0 mb-0 rounded-2">
        <legend class="px-3 rounded-2">Reports</legend>
        <div class="row mx-2 g-0">
            <div class="col col-lg-4">
                <div class="card">
                    <div class="card-title">
                        <h1 class="px-3 text-center">Items<br>List</h1>
                    </div>
                    <a href="/" class="card-description py-4 px-3">
                        <p>Represents all items in the store, even those without credits</p>
                        See More...
                    </a>
                </div>
            </div>
            <div class="col col-lg-4">
                <div class="card">
                    <div class="card-title">
                        <h1 class="px-3">Items<br>Credit</h1>
                    </div>
                    <a href="link2" class="card-description py-4 px-3">
                        <p>Represents all items in the store, even those without credits</p>
                        See More...
                    </a>
                </div>
            </div>
            <div class="col col-lg-4">
                <div class="card">
                    <div class="card-title">
                        <h1 class="px-3">Over<br>Quantities</h1>
                    </div>
                    <a href="link2" class="card-description py-4 px-3">
                        <p>Represents all items in the store, even those without credits</p>
                        See More...
                    </a>
                </div>
            </div>
        
            <div class="col col-lg-4">
                <div class="card">
                    <div class="card-title">
                        <h1 class="px-3">Material<br>In / Out</h1>
                    </div>
                    <a href="link2" class="card-description py-4 px-3">
                        <p>Represents all items in the store, even those without credits</p>
                        See More...
                    </a>
                </div>
            </div>
       
            <div class="col col-lg-4">
                <div class="card">
                    <div class="card-title">
                        <h1 class="px-3">  Receipts </h1>
                    </div>
                    <a href="{{route('store-reports-receipt')}}" class="card-description py-4 px-3">
                        <p>Represents all Receipt in the store, even those without credits</p>
                        See More...
                    </a>
                </div>
            </div>
        </div>
        <!-- يمكنك إضافة المزيد من الكروت هنا -->
    </div>
@endsection