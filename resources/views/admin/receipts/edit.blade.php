@extends('layouts.admin')
@section('header-links')
<li class="breadcrumb-item"><a href="/admin/stores/home"> Stores </a></li>
<li class="breadcrumb-item"><a href="/admin/receipts/index"> Receipts </a></li>
<li class="breadcrumb-item active" aria-current="page">Edit Receipt</li>
@endsection

@section('contents')
<fieldset class="mt-5 mb-4 mx-0 mb-0 shadow-sm">
  <legend><i class="fa fa-edit px-1"></i> Edit receipt Info</legend>
<div class="row">
    <div class=" card-body col {{ $errors->has('reference') || $errors->has('brief') || $errors->has('notes') ? 'col-9 show' : 'col-12' }}">
      <form action="{{ route('update-receipt-info') }}" method="POST">
        <input type="hidden" name="id" value="{{ $receipt->id }}">
        @csrf
        <div class="input-group  mb-2">
          <label class="input-group-text text-muted" for="reference"><i class="fa fa-tag  px-2"></i>Reference</label>
          <input type="text" class="form-control " name="reference" value="{{ old('reference', $receipt)}}" />
          <label class="input-group-text text-muted" for="reference_type"><i class="fa fa-tags  px-2"></i> Reference Type</label>
          <select class="form-select  " name="reference_type" id="reference_type">
            @foreach ($reference_types as $key => $value)
            <option value="{{ $key }}" {{$receipt->reference_type ==  $key ? 'selected' : ''}}>{{ old('value',$value) }}</option>
            @endforeach
          </select>
          <label class="input-group-text  text-muted" for="admin_id"><i class="fa fa-user  px-2"></i>Representative</label>
          <select class="form-select  " name="admin_id" id="admin_id">
            @foreach ($admins as $admin)
            <option value="{{ $admin->id }}" {{$receipt->admin_id == $admin->id ? 'selected' : ''}}>{{ old('userName', $admin)}}</option>
            @endforeach
          </select>
        </div>
        <div class="input-group  mt-2">
          <label class="input-group-text text-muted" for="brief"><i class="fa fa-file-alt  px-2"></i>Description</label>
          <input type="text" class="form-control " name="brief" id="brief" value="{{ old('brief',$receipt )}}">
        </div>
        <div class="input-group  mt-2">
          <label class="input-group-text text-muted" for="notes"><i class="fa fa-sticky-note  px-2"></i>Notes</label>
          <input type="text" class="form-control" name="notes" id="notes" value="{{ old('notes',$receipt) }}">
  
          <button type="reset" class="input-group-text btn py-0 btn-outline-secondary"
          data-bs-toggle="tooltip" data-bs-placement="top" title="Reset form to original values">
          <i class="fas fa-undo me-1"></i> Reset
        </button>
        <button type="submit" class="input-group-text btn py-0 btn-primary"
          data-bs-toggle="tooltip" data-bs-placement="top" title="Save receipt Info changes">
          <i class="fas fa-save me-1"></i> Update
        </button>
        </div>
    
        <!-- <div class="input-group  mt-2">
          <button type="reset" class="form-control btn btn-outline-info py-0">Reset Form</button>
          <button type="submit" class="form-control btn btn-outline-primary py-0">Edit Receipt</button>
        </div> -->
  
  
      </form>
    </div>
    <div class="col p-0 pb-3 card {{ $errors->has('reference') || $errors->has('brief') || $errors->has('notes') ? 'col-3 d-inline-block' : 'd-none' }}" style="border: 1px solid #dedede;margin-bottom:-.1rem;">
        <ul class="py-1 px-1">
          @error('reference')
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
</fieldset>


@endsection