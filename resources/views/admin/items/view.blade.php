@extends('layouts.admin')
@section('header-links')
<li class="breadcrumb-item"><a href="/admin/items/home">Home</a></li>
<li class="breadcrumb-item"><a href="/admin/items/index">index</a></li>
<li class="breadcrumb-item active" aria-current="page">View</li>
@endsection
@section('contents')
<div class="row">

  <div class="col col-8">
    <fieldset class="mt-4 mx-0 mb-0">
      <legend>Product Details &nbsp; &nbsp;

      </legend>

      <div class="row">
        <div class="col-lg-8 col-sm-8">
          <div class="bulk border-dark p-0 m-3">
            <div class="row m-0 mb-2  border-bottom border-dark-50 pb-2 ">
              <div class="col col-5 text-end fw-bold"> Product Name: </div>
              <div class="col col-7 ">{{ $item->name }}</div>
            </div>
            <div class="row m-0 mb-2 border-bottom border-dark-50 pb-2">
              <div class="col col-5 text-end  fw-bold"> Category: </div>
              <div class="col col-7 ">{{ @$item->category->name}}</div>
            </div>
            <div class="row m-0 mb-2 border-bottom border-dark-50 pb-2">
              <div class="col col-5 text-end  fw-bold"> Sub Category: </div>
              <div class="col col-7 ">{{  @$item->category->name}}</div>
            </div>
            <div class="row m-0 mb-2 border-bottom border-dark-50 pb-2">
              <div class="col col-5 text-end  fw-bold"> Unit: </div>
              <div class="col col-7 ">{{ $item->units->name }}</div>
            </div>
            <div class="row m-0 mb-2 border-bottom border-dark-50 pb-2  ">
              <div class="col col-5 text-end fw-bold"> serial: </div>
              <div class="col col-7 ">{{ $item->serial }}</div>
            </div>
            <div class="row m-0 mb-2 border-bottom border-dark-50 pb-2">
              <div class="col col-5 text-end  fw-bold"> breif: </div>
              <div class="col col-7 ">{{ $item->breif }}</div>
            </div>
            <div class="row m-0 mb-2 border-bottom border-dark-50 pb-2">
              <div class="col col-5 text-end  fw-bold"> Created By: </div>
              <div class="col col-7 "> {{$item->creator->name }}</div>
            </div>
            <div class="row m-0 mb-2 border-bottom border-dark-50 pb-2">
              <div class="col col-5 text-end  fw-bold"> Date Created At: </div>
              <div class="col col-7 ">{{ $item->created_at }}</div>
            </div>
            <div class="row m-0 mb-2 border-bottom border-dark-50 pb-2">
              <div class="col col-5 text-end  fw-bold"> Edited By: </div>
              <div class="col col-7 ">{{$item->editor->name}} </div>
            </div>
            <div class="row m-0 mb-2 border-bottom border-dark-50 pb-2">
              <div class="col col-5 text-end  fw-bold"> Date Modified: </div>
              <div class="col col-7 ">{{ $item->updated_at }}</div>
            </div>
          </div>
        </div>

      </div>
  </div>
  </fieldset>
</div>

@endsection