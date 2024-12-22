@extends('layouts.admin')
@section('header-links')
    <li class="breadcrumb-item"><a href="/admin/stores/home">Stores</a></li>
    <li class="breadcrumb-item active" aria-current="page">Home</li>
@endsection
@section('contents')
    <h1 class="mt-3">Stores Home</h1>
    <div class="row">
        <div class="col col-12 col-sm-6 col-lg-4">
            <a class="fw-bold" href="/admin/stores/index" class="link-item">
                <i class="fa fa-home fa-2x"></i>
                <span class="">All Stores</span>
            </a>
        </div>
        <div class="col col-12 col-sm-6 col-lg-4">
            <a class="fw-bold" href="/admin/receipts/index" class="link-item">
                <i class="fa fa-home fa-2x"></i>
                <span class="">All Receipts</span>
            </a>
        </div>
        <div class="col col-12 col-sm-6 col-lg-4">
            <a class="fw-bold" href="/admin/receipts/display/input/1" class="link-item">
                <i class="fa fa-home fa-2x"></i>
                <span class="">Input Receipts</span>
            </a>
        </div>
        <div class="col col-12 col-sm-6 col-lg-4 mt-5">
            <a class="fw-bold" href="/admin/receipts/display/output/2" class="link-item">
                <i class="fa fa-home fa-2x"></i>
                <span class="">Output Receipts</span>
            </a>
        </div>
    </div>
    <script></script>
@endsection
