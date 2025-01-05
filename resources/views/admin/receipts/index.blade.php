@extends('layouts.admin')
@section('header-links')
<li class="breadcrumb-item"><a href="/admin/stores/home">Stores</a></li>
<li class="breadcrumb-item active" aria-current="page">Receipts</li>
@endsection
@section('contents')
<h1 class="mt-3 pb-2 d-flex" style="border-bottom: 2px solid #dedede">Store Movement Receipts</h1>
<div class="row">
  <div class="col col-12 collapse @if (
            $errors->has('reference') ||
                $errors->has('serial') ||
                $errors->has('reception_date') ||
                $errors->has('brief') ||
                $errors->has('notes')) show @endif pt-3" id="addreceiptForm">
    <div class="row">
      <div
        class="col {{ $errors->has('reference') || $errors->has('serial') || $errors->has('reception_date') || $errors->has('brief') || $errors->has('notes') ? 'col-9 show' : 'col-12' }}">
        <div class="card card-body">
          <form action="/admin/receipts/store" method="POST">
            @csrf
            <div class="input-group sm mb-2">
              <label class="input-group-text" for="reception_date">Reception Date</label>
              <input type="date" class="form-control sm " name="reception_date" id="reception_date">
              <label class="input-group-text" for="reference">Reference</label>
              <input type="number" class="form-control sm" name="reference" id="reference">
              <label class="input-group-text" for="reference_type">Reference Type</label>
              <select class="form-select sm" name="reference_type" id="reference_type">
                <option value=""></option>
                @foreach ($reference_types as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
              </select>
            </div>
            <div class="input-group sm mt-2">
              <label class="input-group-text" for="serial">Serial Number</label>
              <input type="text" class="form-control sm" name="serial" id="serial">
              <label class="input-group-text" for="admin_id">Representative</label>
              <select class="form-select" name="admin_id" id="admin_id">
                @foreach ($admins as $admin)
                <option value="{{ $admin->id }}">{{ $admin->userName }}</option>
                @endforeach
              </select>
              <label class="input-group-text" for="store_id">Store</label>
              <select class="form-select sm" name="store_id" id="store_id">
                @foreach ($stores as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="input-group sm mt-2">
              <label class="input-group-text" for="brief">Description</label>
              <input type="text" class="form-control sm" name="brief" id="brief">
            </div>
            <div class="input-group sm mt-2">
              <label class="input-group-text" for="notes">Notes</label>
              <input type="text" class="form-control" name="notes" id="notes">
            </div>
            <div class="input-group sm mt-2">
              <label class="input-group-text">Receipt [direction] Type:</label>
              <div class="input-group-text">
                <input class="form-check-input sm mt-0" name="direction" type="radio"
                  value="{{ $insert_entry }}" id="input">
              </div>
              <label for="input" class="input-group-text text-start">Input</label>
              <div class="input-group-text">
                <input class="form-check-input mt-0 sm" name="direction" type="radio"
                  value="{{ $output_entry }}" id="output">
              </div>
              <label for="output" class="input-group-text text-start">Output</label>
              <button type="submit" class="form-control btn btn-outline-primary">Save Receipt</button>
            </div>
          </form>
        </div>
      </div>
      <div class="col p-0 pb-3 card {{ $errors->has('reference') || $errors->has('serial') || $errors->has('reception_date') || $errors->has('brief') || $errors->has('notes') ? 'col-3 d-inline-block' : 'd-none' }}"
        style="border: 1px solid #dedede;margin-bottom:-.1rem;">
        <ul class="py-1 px-1">
          @error('reference')
          <li class="my-1 py-0 alert alert-danger"><small>{{ $message }}</small></li>
          @enderror
          @error('serial')
          <li class="my-1 py-0 alert alert-danger"><small>{{ $message }}</small></li>
          @enderror
          @error('reception_date')
          <li class="my-1 py-0 alert alert-danger"><small>{{ $message }}</small></li>
          @enderror
          @error('brief')
          <li class="my-1 py-0 alert alert-danger"><small>{{ $message }}</small></li>
          @enderror
          @error('notes')
          <li class="my-1 py-0 alert alert-danger"><small>{{ $message }}</small></li>
          @enderror
        </ul>
      </div>
    </div>
    <div class="py-2" style="border-bottom: 2px solid #dedede"></div>
  </div>
</div>
<div class="row">
  <div class="col col-12">
    <fieldset class="mt-4 mx-0 mb-0">
    <legend>Receipts &nbsp; &nbsp;
        <a class="ms-3" data-bs-toggle="collapse" data-bs-target="#addreceiptForm" aria-expanded="false"
          aria-controls="addreceiptForm">
          <i data-bs-toggle="tooltip" title="Add New Receipt" class="fa fa-plus"></i>
        </a>
      </legend>
      <div class="row d-flex justify-content-end ">
    <form method="GET"  action="{{ route('display-recepits-list') }}"  class="col col-8">
        <div class="input-group sm mb-2">
            <input type="text" class="form-control" name="serial" value="{{ request('serial') }}" placeholder="Serial Number" data-bs-toggle="tooltip" data-bs-placement="top" title="Serial Number">
            <input type="date" class="form-control" name="beforeDate" value="{{ request('beforeDate') }}" placeholder="Before Date" data-bs-toggle="tooltip" data-bs-placement="top" title="Before Date">
            <input type="date" class="form-control" name="afterDate" value="{{ request('afterDate') }}" placeholder="After Date" data-bs-toggle="tooltip" data-bs-placement="top" title="After Date">
            <button type="submit" class="input-group-text btn py-0 btn-outline-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Search">
                <i class="fas fa-search me-1"></i> Search
            </button>
            <a href="{{ route('display-recepits-list') }}" class="input-group-text btn py-0 btn-outline-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Clear Search">
                <i class="fas fa-times me-1"></i> Clear
            </a>
        </div>
    </form>
</div>
      <div class="row d-flex justify-content-end ">
        <form method="GET" action="{{ route('display-recepits-list') }}" class="col col-8 sm">
          <div class="input-group sm mb-2">
            <select class="form-select form-control sm py-0" name="reference_type" id="reference_type">
              <option value="">Ref Type</option>
              @foreach ($reference_types as $key => $value)
              <option {{isset($query['reference_type']) && $query['reference_type'] == $key ?'selected':''}} value="{{ $key }}">{{ $value }}</option>
              @endforeach
            </select>
            <select class="form-select form-control sm py-0" name="admin_id" id="admin_id">
              <option value="">Representative</option>
              @foreach ($admins as $admin)
              <option {{isset($query['admin_id']) && $query['admin_id'] ==  $admin->id ?'selected':''}} value="{{ $admin->id }}">{{ $admin->userName }}</option>
              @endforeach
            </select>
            <select class="form-select form-control sm py-0" name="direction" id="direction">
              <option value="0" >Direction</option>
              @foreach ($receipt_direction as $d_index => $direction)
              <option {{isset($query['direction']) && $query['direction'] == $d_index ?'selected':''}} value="{{$d_index}}">{{$direction}}</option>

              @endforeach
            </select>
            <select class="form-select form-control sm py-0" name="status" id="status">
              <option value='0'>status</option>
              @foreach ($receipt_status as $s_index => $status)
              <option {{isset($query['status']) && $query['status'] == $s_index ?'selected':''}} value="{{$s_index}}" value="">{{ $status }}</option>
              @endforeach
            </select>
            <button type="submit" class="input-group-text btn py-0 btn-outline-secondary"
              data-bs-toggle="tooltip" data-bs-placement="top" title="Filter">
              <i class="fas fa-filter me-1"></i> Filter
            </button>

          </div>
        </form>
      </div>

      <table class="table table-striped table-bordered mt-2">
          <thead>
            <tr>
              <th><i class="fa fa-list"></i></th>
              <th><i class="fa fa-barcode"></i> Serial Number</th>
              <th><i class="fa fa-tags"></i> Ref Type</th>
              <th><i class="fa fa-calendar"></i> Date</th>
              <th><i class="fa fa-arrow-right"></i> Dir</th>
              <th><i class="fa fa-user"></i> Representative</th>
              <th><i class="fa fa-check-circle"></i>Status</th>
              <th><i class="fa fa-cogs"></i> Control</th>
            </tr>
          </thead>
          @php
          $counter = 0;
          @endphp
          @foreach ($receipts as $receipt)

          <tr>
            <td>{{ ++$counter }}</td>
            <td><a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip"  title="Display Receipt" href="#">{{ $receipt->serial }}</a></td>
            <td>{{ $receipt->getTypeName() }}</td>
            <td>{{ $receipt->reception_date }}</td>
            <td>
              @if ($receipt->direction === 1)
              <span class="badge bg-success">{{ $receipt_direction[$receipt->direction] }}</span>
              @elseif($receipt->direction === 2)
              <span class="badge bg-danger">{{ $receipt_direction[$receipt->direction] }}</span>
              @endif
            </td>
            <td data-bs-toggle="tooltip" title="{{ 'Manager' }}" {{-- @$receipt->admin->profile->possition --}}>{{ $receipt->admin->userName }}</td>
            <td>
              @if($receipt->status === 1)
              <span class="badge bg-secondary"> {{ $receipt_status[$receipt->status] }}</span>
              @elseif($receipt->status === 2)
              <span class="badge bg-info"> {{ $receipt_status[$receipt->status] }}</span>
              @elseif($receipt->status === 3)
              <span class="badge bg-warning"> {{ $receipt_status[$receipt->status] }}</span>
              @endif
            </td>
            <td>
              @if($receipt->status == 1)
              <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="edit Receipt"
                href="{{ route('edit-receipt-info', [$receipt->id]) }}"><i
                  class="fa fa-edit text-primary"></i></a>
              <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="Approve Receipt"
              href="{{ route('approve-receipt', [$receipt->id]) }}"><i class="fa fa-check text-info"></i></a>
              @php
              $addEntry =
              $receipt->direction === 1 ? 'add-store-input-entry' : 'add-store-output-entry';
              @endphp
              <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="Add Entries"
                href="{{ route($addEntry, [$receipt->id]) }}"><i
                  class="fa fa-square-plus text-success"></i></a>

              @elseif($receipt->status == 2)
              <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="Enable Receipt Entries "
                href=""><i class="fa fa-ban text-primary"></i></a>
              <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip"
                title="archive Receipt"
                onclick="if (!confirm('You are going to archive this receipt, are you sure?'))return false"
                href="{{ route('archive-receipt', [$receipt->id]) }}"><i
                  class="fa fa-archive text-danger"></i></a>

              @elseif($receipt->status == 3)
              <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="Restore Receipt"
                onclick="if (!confirm('You are going to Restore this receipt, are you sure?'))return false"
                href="{{ route('restore-receipt-info', [$receipt->id]) }}"><i
                  class="fa fa-undo text-warning"></i></a>
              @endif
              <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="Q-Display Receipt" href=""><i
                                    class="fa fa-file text-primary"></i></a>
                            <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="print Receipt" href=""><i
                                    class="fa fa-print text-secondary"></i></a>
                            <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title=" delete Receipt"
                                onclick="if (!confirm('You are going to delete this receipt, are you sure?'))return false"
                                href="{{ route('forceDelete-receipt-info', [$receipt->id]) }}"><i
                                    class="fa fa-trash-alt text-danger"></i></a>


            </td>
          </tr>
          @endforeach
          <tbody>


        </table>
        <div class="mt-3">
          {{ $receipts->links() }}
        </div>
    </fieldset>
  </div>
</div>



@endsection