@extends('layouts.admin')
@section('header-links')
<li class="breadcrumb-item"><a href="/admin/stores/home">Stores</a></li>
<li class="breadcrumb-item active" aria-current="page">Receipts</li>
@endsection
@section('contents')
<h1 class="mt-3 pb-2" style="border-bottom: 2px solid #dedede">Store Movement Receipts
</h1>

<div class="row ">
  <div class="col col-12 collapse" id="addtreceiptForm">
    <fieldset class="mt-4 mx-0 mb-0">
      <legend> Add New Receipt &nbsp; &nbsp;

      </legend>
      <div class="row">
        <div class="col col-12 ">
          <div class=" card-body">
            <form action="/admin/receipts/store" method="POST">
              @csrf
              <div class="input-group sm mb-2">
                <label class="input-group-text" for="reception_date">Reception Date</label>
                  <input type="date" class="form-control" name="reception_date" id="reception_date">
                <label class="input-group-text" for="reference">Reference</label>
                  <input type="number" class="form-control" name="reference" id="reference">
                <label class="input-group-text" for="reference_type"> reference_type</label>
                <select class="form-select" name="store_id" id="reference_type">
                  <option value="1"></option>
                  @foreach ($reference_type as $key => $value)
                  <option value="{{ $key }}">{{ $value }}</option>
                  @endforeach
                </select>
              </div>
              <div class="input-group sm mt-2">
                <label class="input-group-text" for="serial">Serial Number</label>
                   <input type="text" class="form-control" name="serial" id="serial">
                <label class="input-group-text" for="admin_id">Representative</label>
                <select class="form-select" name="admin_id" id="admin_id">
                  <option value="1"></option>
                  @foreach ($admins as $admin)
                  <option value="{{ $admin->id }}">{{ $admin->userName }}</option>
                  @endforeach
                </select>
                <label class="input-group-text" for="store_id"> Store</label>
                <select class="form-select" name="store_id" id="store_id">
                  <option value="1"></option>
                  @foreach ($stores as $item)
                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="input-group mt-2">
                <label class="input-group-text" for="brief">Description</label>
                <input type="text" class="form-control" name="brief" id="brief">
              </div>
              <div class="input-group mt-2">
                <label class="input-group-text" for="notes">Notes</label>
                <input type="text" class="form-control" name="notes" id="notes">
              </div>
              <div class="input-group mt-2">
                <div class="input-group-text">
                  <input class="form-check-input mt-0" name="direction" type="checkbox" value="1"
                    aria-label="Checkbox for following text input">
                </div>
                <button type="button" class="input-group-text text-start">Input</button>
                <div class="input-group-text">
                  <input class="form-check-input mt-0" name="direction" type="checkbox" value="2"
                    aria-label="Checkbox for following text input">
                </div>
                <button type="button" class="input-group-text text-start">Output</button>
                <button type="submit" class="form-control btn btn-outline-primary">Save Receipt</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </fieldset>
    <div class="pt-3 pb-4" style="border-bottom: 2px solid #dedede"></div>
  </div>

</div>

<div class="row">
  <div class="col col-12">
    <fieldset class="mt-4 mx-0 mb-0">
      <legend>Receipts &nbsp; &nbsp;
        <a class=" ms-3" data-bs-toggle="collapse" data-bs-target="#addtreceiptForm" aria-expanded="false"
          aria-controls="addtreceiptForm"><i data-bs-toggle="tooltip" title="Add New Receipt"
            class="fa fa-plus"></i>
        </a>
      </legend>
      <div class="input-group">
        <button class="py-0 pt-1 pb-1 ms-4 btn btn-primary">Input

        </button>
        <button class="py-0  pt-1 pb-1 btn btn-outline-secondary">Output</button>
    </div>
      <table class="table table-striped table-bordered mt-3">
        <thead>
          <tr>

            <th>Serial Number</th>
            <th>Reference Type</th>
            <th>Date</th>
            <th>Representative</th>
            <th>Control</th>
          </tr>
        </thead>
        <tbody>
          @if (count($receipts))
          @foreach ($receipts as $receipt)
          <tr>
            <td>{{ $receipt->serial }}</td>
            <td>{{ $receipt->reference_type }}</td>
            <td>{{ $receipt->reception_date }}</td>
            <td>{{ $receipt->admin->userName}}</td>
            <td>

              <a class="btn btn-sm py-0" href="{{ route('edit-receipt-info', $receipt->id) }}"><i
                  class="fa fa-edit text-primary"></i></a>


              <a class="btn btn-sm py-0"
                onclick="if (!confirm('You are going to delete this receipt, are you sure?'))return false"
                href="{{ route('destroy-receipt-info', $receipt->id) }}"><i
                  class="fa fa-trash text-danger"></i></a>

            </td>
          </tr>
          @endforeach
          @else
          <tr>
            <td colspan="6">No Receipts has been added yet, Add your <a class="" data-bs-toggle="collapse"
                data-bs-target="#addNewStore">first Receipt</a>.</td>
          </tr>
          @endif
        </tbody>
      </table>


    </fieldset>
  </div>
</div>




@endsection