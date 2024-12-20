@extends('layouts.admin')
@section('header-links')
<li class="breadcrumb-item"><a href="/admin/stores/home">Receipts {{$dir }}</a></li>
<li class="breadcrumb-item active" aria-current="page">Home</li>
@endsection
@section('contents')
<style>
  fieldset {
    position: relative;
  }

  legend>a {
    background-color: #ebe6e6;
    color: gray;
    position: static;
    border-radius: 2px;
  }

  legend a.active {
    background-color: hsl(209, 85.10%, 47.30%);
    color: #fff;
  }

  .tabs-container {
    position: absolute;
    left: 2rem;
    top: -1rem
  }
</style>

<h1 class="mt-3 pb-2 " style="border-bottom: 2px solid #dedede">All {{$dir }} Receipts
  <a class=" ms-1" data-bs-toggle="collapse" data-bs-target="#addreceiptForm" aria-expanded="false"
    aria-controls="addreceiptForm"><i data-bs-toggle="tooltip" title="Add New Receipt" class="fa fa-plus"></i> Add
    New Receipt</a>
  @if($dir=='input')
  <div class="input-group  justify-content-end" style="margin-top: -1.6rem;">
    <a href="/admin/receipts/display/output/2" class="btn px-3 py-0 btn-outline-secondary btn-sm" title="Switch To Output">
      Switch Output
    </a>
  </div>
  @else
  <div class="input-group  justify-content-end " style="margin-top: -1.6rem;">
    <a href="/admin/receipts/display/input/1" class="btn px-3 py-0 btn-outline-secondary btn-sm" title="Switch To Input">
      Switch Input
    </a>
  </div>
  @endif
</h1>

<div class="row ">
  <div class="col col-12 collapse  @if (
            $errors->has('reference') ||
                $errors->has('serial') ||
                $errors->has('reception_date') ||
                $errors->has('brief') ||
                $errors->has('notes')) show @endif pt-3" id="addreceiptForm">
    <div class="row">
      <div
        class="col {{ $errors->has('reference') ||
                    $errors->has('serial') ||
                    $errors->has('reception_date') ||
                    $errors->has('brief') ||
                    $errors->has('notes')
                        ? 'col-9 show'
                        : 'col-12' }}">
        <div class="card card-body">
          <form action="/admin/receipts/store" method="POST">
            @csrf
            <div class="input-group sm mb-2">
              <label class="input-group-text" for="reception_date">Reception Date</label>
              <input type="date" class="form-control sm " name="reception_date" id="reception_date">
              <label class="input-group-text" for="reference">Reference</label>
              <input type="number" class="form-control sm" name="reference" id="reference">
              <label class="input-group-text" for="reference_type"> Reference Type</label>
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
              <label class="input-group-text" for="store_id"> Store</label>
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
                <input class="form-check-input sm mt-0" name="direction" type="radio"
                  value="{{ $direction_input }}" id="input">
              </div>
              <label for="input" class="input-group-text text-start">Input</label>
              <div class="input-group-text">
                <input class="form-check-input mt-0 sm" name="direction" type="radio"
                  value="{{ $direction_output }}" id="output">
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
          <li class="my-1 py-0 alert alert-danger"><small> {{ $message }} </small></li>
          @enderror
          @error('serial')
          <li class="my-1 py-0 alert alert-danger"><small> {{ $message }} </small></li>
          @enderror
          @error('reception_date')
          <li class="my-1 py-0 alert alert-danger"><small> {{ $message }} </small></li>
          @enderror
          @error('brief')
          <li class="my-1 py-0 alert alert-danger"><small> {{ $message }} </small></li>
          @enderror
          @error('notes')
          <li class="my-1 py-0 alert alert-danger"><small> {{ $message }} </small></li>
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
      <legend class="tabs-container d-flex gap-2 p-0 border-0">
        <a href="{{ route('display-receipts-list', [$dir, 1]) }}" class="p-1 py-1 border-5 outline-0 {{ $tab === '1' ? 'active' : '' }}">
          <i class="fa fa-hourglass px-1"></i> InProgress
        </a>
        <a href="{{ route('display-receipts-list', [$dir, 2]) }}" class="p-1  py-1 {{ $tab === '2' ? 'active' : '' }}">
          <i class="fa fa-check-square px-1"></i> Approved
        </a>
        <a href="{{ route('display-receipts-list', [$dir, 3]) }}" class="p-1  py-1 {{ $tab === '3' ? 'active' : '' }}">
          <i class="fa fa-archive px-1"></i> Archived
        </a>
      </legend>

      <div class="row d-flex justify-content-end mt-2">
        <form class="col col-9">
          @csrf
          <div class="input-group sm mb-2">

            <input type="text" class="form-control" name="serial" id="serial"
              placeholder="Serial Number">

            <input type="number" class="form-control" name="reference_type" id="reference_type"
              placeholder="Reference Type">
            <select class="form-control py-0" name="admin_id" id="admin_id">
              <option hidden>Representative</option>
              @foreach ($admins as $admin)
              <option value="{{ $admin->id }}">{{ $admin->userName }}</option>
              @endforeach
            </select>

            <input type="number" class="form-control" name="reception_date" id="reception_date"
              placeholder="Before Date">

            <button type="submit" class="form-control btn btn-outline-primary py-0">Apply Filter
            </button>
          </div>
        </form>
      </div>


      <div id="data-container">


        @yield('table')

      </div>
    </fieldset>
  </div>
</div>
<div class="mt-3" id="links">
  {{ $receipts->links() }}
</div>

@endsection