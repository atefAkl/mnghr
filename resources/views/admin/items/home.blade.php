@extends('layouts.admin')
@section('header-links')
    <li class="breadcrumb-item"><a href="/admin/items/home">Items</a></li>
    <li class="breadcrumb-item active" aria-current="page">Home</li>
@endsection
@section('contents')
    <h1 class="mt-3">Items Home</h1>
    <div class="row">
        <div class="col col-12 col-sm-6 col-lg-4">
            <a class="fw-bold" href="/admin/items/index" class="link-item">
                <i class="fa fa-home fa-2x"></i>
                <span class="">All Items</span>
            </a>
        </div>
        <div class="col col-12 col-sm-6 col-lg-4">
            <a class="fw-bold" href="/admin/items/productList" class="link-item">
                <i class="fa fa-home fa-2x"></i>
                <span class="">Product List</span>
            </a>
        </div>
    </div>
@endsection
