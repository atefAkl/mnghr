@extends('layouts.admin')
@section('header-links')
<li class="breadcrumb-item"><a href="/admin/stores/home"> Stores </a></li>
<li class="breadcrumb-item"><a href="/admin/receipts/index"> Index </a></li>
<li class="breadcrumb-item active" aria-current="page">Edit Receipt</li>
@endsection
@section('contents')
<style>
  .light-shadow {
    box-shadow: 0 0 5px 2px rgba(0, 0, 0, 0.1)
  }

  form .item-info-row {
    margin: 0 1rem;
    border-bottom: 1px solid #ddd;
  }

  form .item-info-row:first-of-type {
    border-top: 1px solid #ddd;
  }

  .item-info-head {
    padding: 0.3rem;
    font-weight: bold;
    text-align: right;
    background-color: #eee;
  }

  .item-info-data {
    padding: 0;
    margin: 0;
  }

  .inline-input {
    border: none;
    outline: none;
    padding: 0.3rem 1rem;
    margin: 0;
    width: 100%;
    transition: all 0.3s ease-in-out
  }

  input[type=checkbox].inline-input {
    width: 20px;
  }

  .inline-input:focus {
    box-shadow: 0 0 3px 1px #ccc inset
  }
</style>

<h1 class="mt-3 pb-2" style="border-bottom: 2px solid #dedede">Edit receipt Info</h1>
<fieldset class="mt-4 p-0 pt-4 pb-3 bg-light light-shadow">
  <legend class="bg-secondary text-light">General Information</legend>
  <form action="{{ route('update-receipt-info') }}" method="POST">
    <input type="hidden" name="id" value="{{ $receipt->id }}">
    @csrf
    <div class="row item-info-row">

      <div class="col col-2 item-info-head">Reception Date:</div>
      <div class="col col-4 item-info-data d-flex">
        <input type="text" class="inline-input" name="reception_date" value="{{ $receipt->reception_date }}"
          placeholder="" />
        <input type="date" class="inline-input" name="reception_date" value="{{ $receipt->reception_date }}"
          placeholder="" />
      </div>
      <div class="col col-2 item-info-head">Reference:</div>
      <div class="col col-4 item-info-data">
        <input type="text" class="inline-input" name="reference" value="{{ $receipt->reference }}" />
      </div>
    </div>

    <div class="row item-info-row">
      <div class="col col-2 item-info-head">Serial Number:</div>
      <div class="col col-4 item-info-data">
        <input type="text" class="inline-input" name="serial" value="{{ $receipt->serial }}" />
      </div>
      <div class="col col-2 item-info-head"> Reference Type:</div>
      <div class="col col-4 item-info-data">
        <select class="form-select sm" name="reference_type" id="reference_type">
          @foreach ($reference_type as $key => $value)
          <option value="{{ $key }}">{{ $value }}</option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="row item-info-row">
      <div class="col col-2 item-info-head">Representative:</div>
      <div class="col col-4 item-info-data">
        <select class="form-select" name="admin_id" id="admin_id">
          @foreach ($admins as $admin)
          <option value="{{ $admin->id }}">{{ $admin->userName }}</option>
          @endforeach
        </select>
      </div>
      <div class="col col-2 item-info-head">Store:</div>
      <div class="col col-4 item-info-data">
        <select class="form-select sm" name="store_id" id="store_id">

          @foreach ($stores as $item)
          <option value="{{ $item->id }}">{{ $item->name }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="row item-info-row">
      <div class="col col-2 item-info-head">Receipt Decription:</div>
      <div class="col col-10 item-info-data">
        <input type="text" class="inline-input" name="brief" value="{{ $receipt->brief }}"
          placeholder="Describe your product" />
      </div>
    </div>
    <div class="row item-info-row">
      <div class="col col-2 item-info-head">Receipt Notes:</div>
      <div class="col col-4 item-info-data">
        <input type="text" class="inline-input" name="notes" value="{{ $receipt->notes }}"
          placeholder="Describe your product" />
      </div>
      <div class="col col-2 item-info-head">Receipt Status:</div>
      <div class="col col-4 item-info-data">
        <select class="form-select sm" name="status" id="status">
          @foreach ($status as $key => $value)
          <option hidden value="{{ $key }}">{{ $value }}</option>
          <option value="{{ $key }}">{{ $value }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="input-group px-3 sm">
      <button type="reset" class="form-control btn btn-outline-info my-2 py-0">Reset Form</button>
      <button type="submit" class="form-control btn btn-outline-primary my-2 py-0">Update General
        Information</button>
    </div>
  </form>
</fieldset>
@endsection