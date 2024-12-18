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
<div class="card card-body">
<form action="{{ route('update-receipt-info') }}" method="POST">
            <input type="hidden" name="id" value="{{ $receipt->id }}">
            @csrf
            <div class="input-group sm mb-2">
              <label class="input-group-text" for="reference">Reference</label>
              <input type="text"  name="reference" value="{{ $receipt->reference }}" />
              <label class="input-group-text" for="reference_type"> Reference Type</label>
              <select class="form-select sm" name="reference_type" id="reference_type">
          @foreach ($reference_type as $key => $value)
          <option value="{{ $key }}">{{ $value }}</option>
          @endforeach
        </select>
        <label class="input-group-text" for="status"> Receipt Status:</label>
              <select class="form-select sm" name="status" id="status">
          @foreach ($status as $key => $value)
          <option hidden value="{{ $key }}">{{ $value }}</option>
          <option value="{{ $key }}">{{ $value }}</option>
          @endforeach
        </select>
            </div>
            <div class="input-group sm mt-2">
              <label class="input-group-text" for="admin_id">Representative</label>
              <select class="form-select" name="admin_id" id="admin_id">
                @foreach ($admins as $admin)
                <option value="{{ $admin->id }}">{{ $admin->userName }}</option>
                @endforeach
              </select>
              <label class="input-group-text" for="store_id"> Store</label>
              <select class="form-select sm" name="store_id" id="store_id">
            
                @foreach ($stores as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
              </select>
          
            </div>
            <div class="input-group sm mt-2">
              <label class="input-group-text" for="brief">Description</label>
              <input type="text" class="form-control sm" name="brief" id="brief" value="{{ $receipt->brief }}">
            </div>
            <div class="input-group sm mt-2">
              <label class="input-group-text" for="notes">Notes</label>
              <input type="text" class="form-control" name="notes" id="notes" value="{{ $receipt->notes }}">
            </div>
            <div class="input-group sm mt-2">
            <button type="reset" class="form-control btn btn-outline-info">Reset Form</button>
            <button type="submit" class="form-control btn btn-outline-primary">Edit Receipt</button>
            </div>
          
            </div>
          </form>
</div>

@endsection

