@extends('layouts.admin')
@section('header-links')
<li class="breadcrumb-item"><a href="/admin/stores/home">Stores</a></li>
<li class="breadcrumb-item active" aria-current="page">Receipts</li>
@endsection
@section('contents')
<h1 class="mt-3 pb-2 " style="border-bottom: 2px solid #dedede">Store Movement Receipts</h1>
<div class="row">
  <div class="col col-12 collapse @if ($errors->has('reference') || $errors->has('serial') || $errors->has('reception_date') || $errors->has('brief') || $errors->has('notes')) show @endif pt-3" id="addreceiptForm">
    <div class="row">
      <div class="col {{ $errors->has('reference') || $errors->has('serial') || $errors->has('reception_date') || $errors->has('brief') || $errors->has('notes') ? 'col-9 show' : 'col-12' }}">
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
                @foreach ($reference_type as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
              </select>
            </div>
            <div class="input-group sm mt-2">
              <label class="input-group-text" for="serial">Serial Number</label>
              <input type="text" class="form-control sm" name="serial" id="serial">
              <label class="input-group-text" for="admin_id">Representative</label>
              <select class="form-select" name="admin_id" id="admin_id">
                <option value="1"></option>
                @foreach ($admins as $admin)
                <option value="{{ $admin->id }}">{{ $admin->userName }}</option>
                @endforeach
              </select>
              <label class="input-group-text" for="store_id">Store</label>
              <select class="form-select sm" name="store_id" id="store_id">
                <option value="1"></option>
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
                <input class="form-check-input sm mt-0" name="direction" type="radio" value="{{ $direction_input }}" id="input">
              </div>
              <label for="input" class="input-group-text text-start">Input</label>
              <div class="input-group-text">
                <input class="form-check-input mt-0 sm" name="direction" type="radio" value="{{ $direction_output }}" id="output">
              </div>
              <label for="output" class="input-group-text text-start">Output</label>
              <button type="submit" class="form-control btn btn-outline-primary">Save Receipt</button>
            </div>
          </form>
        </div>
      </div>
      <div class="col p-0 pb-3 card {{ $errors->has('reference') || $errors->has('serial') || $errors->has('reception_date') || $errors->has('brief') || $errors->has('notes') ? 'col-3 d-inline-block' : 'd-none' }}" style="border: 1px solid #dedede;margin-bottom:-.1rem;">
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
        <a class="ms-3" data-bs-toggle="collapse" data-bs-target="#addreceiptForm" aria-expanded="false" aria-controls="addreceiptForm">
          <i data-bs-toggle="tooltip" title="Add New Receipt" class="fa fa-plus"></i>
        </a>
      </legend>
      <div class="input-group">
        <button class="py-0 pt-1 pb-1 ms-4 btn btn-primary active" data-type="{{ $direction_input }}">Input</button>
        <button class="py-0 pt-1 pb-1 btn btn-outline-secondary" data-type="{{ $direction_output }}">Output</button>
      </div>
      <div id="data-container">
        <table class="table table-striped table-bordered mt-3">
          <thead>
            <tr>
              <th>#</th>
              <th>Serial Number</th>
              <th>Reference Type</th>
              <th>Date</th>
              <th>Representative</th>
              <th>Status</th>
              <th>Control</th>
            </tr>
          </thead>
          <tbody>
            @php $i = 0 @endphp
            @if (count($receipts))
              @foreach ($receipts as $receipt)
                @php $i++ @endphp
                @if($receipt->direction === $direction_input)
                  <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $receipt->serial }}</td>
                    <td>{{ @$reference_type[$receipt->reference_type] }}</td>
                    <td>{{ $receipt->reception_date }}</td>
                    <td>{{ @$receipt->admin->userName }}</td>
                    @if($receipt->status === 1)
                      <td><span class="badge bg-info">{{ $status[$receipt->status] }}</span></td>
                      <td>
                        <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="insert Receipt" href="{{ route('add-store-input-entry', [$receipt->id]) }}">
                          <i class="fa fa-square-plus text-success"></i>
                        </a>
                        <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="print Receipt" href="">
                          <i class="fa fa-print text-dark"></i>
                        </a>
                      </td>
                    @elseif($receipt->status === 0)
                      <td><span class="badge bg-warning">{{ $status[$receipt->status] }}</span></td>
                      <td>
                        <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="edit Receipt" href="{{ route('edit-receipt-info', $receipt->id) }}">
                          <i class="fa fa-edit text-primary"></i>
                        </a>
                        <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="delete Receipt" onclick="if (!confirm('You are going to delete this receipt, are you sure?'))return false" href="{{ route('destroy-receipt-info', $receipt->id) }}">
                          <i class="fa fa-trash text-danger"></i>
                        </a>
                      </td>
                    @endif
                  </tr>
                @endif
              @endforeach
            @else
              <tr>
                <td colspan="7">No Receipts has been added yet, Add your <a class="" data-bs-toggle="collapse" data-bs-target="#addreceiptForm">first Receipt</a>.</td>
              </tr>
            @endif
          </tbody>
        </table>
      </div>
    </fieldset>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('button[data-type]').on('click', function() {
      const type = $(this).data('type');
      const url = `{{ url('/admin/receipts/load-data') }}/${type}`;
      $.ajax({
        url,
        method: 'GET',
        success: function(response) {
          console.log(url, response)
          $('#data-container').html(response);
        },
        error: function(xhr, status, error) {
          console.error(error);
        }
      });
    });
  });
</script>

@endsection
