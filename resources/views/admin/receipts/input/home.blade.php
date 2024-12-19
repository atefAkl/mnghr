@extends('layouts.admin')
@section('header-links')
    <li class="breadcrumb-item"><a href="/admin/stores/home">Receipts Input</a></li>
    <li class="breadcrumb-item active" aria-current="page">Home</li>
@endsection
@section('contents')
    <h1 class="mt-3 pb-2" style="border-bottom: 2px solid #dedede">All Input Receipts
        <a class=" ms-1" data-bs-toggle="collapse" data-bs-target="#addreceiptForm" aria-expanded="false"
            aria-controls="addreceiptForm"><i data-bs-toggle="tooltip" title="Add New Receipt" class="fa fa-plus"></i> Add
            New Receipt</a>
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
    <style>
        fieldset {
            position: relative;
        }

        legend {
            background-color: #9DB2BF;
            color: #000;
            position: static;
        }

        legend.active {
            background-color: #c504ff;
            color: #fff;
        }

        .tabs-container {
            position: absolute;
            left: 2rem;
            top: -1rem
        }
    </style>
    <div class="row">
        <div class="col col-12">
            <fieldset class="mt-4 mx-0 mb-0">
                <div class="tabs-container d-flex gap-3">
                    <a href="{{ route('display-inputReceipts-list', ['input', 1]) }}">
                        <legend class="{{ $tab === '1' ? 'active' : '' }}"> InProgress Receipts</legend>
                    </a>
                    <a href="{{ route('display-inputReceipts-list', ['input', 2]) }}">
                        <legend class="{{ $tab === '2' ? 'active' : '' }}"> Approved Receipts</legend>
                    </a>
                    <a href="{{ route('display-inputReceipts-list', ['input', 3]) }}">
                        <legend class="{{ $tab === '3' ? 'active' : '' }}"> Archived Receipts</legend>
                    </a>
                </div>

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

    <div class="row d-flex justify-content-end mt-2">
        <div class="col col-4">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>


    </div>


    <!-- <script>
        $(document).ready(function() {
                    $('#price-range-form').submit(function(e) {
                                e.preventDefault();


                                $(document).ready(function() {
                                    $('button[data-type]').on('click', function() {
                                        const type = $(this).data('type');
                                        const url = `{{ url('/admin/receipts/load-data') }}/${type}`;
                                        $.ajax({
                                            url,
                                            method: 'GET',
                                            success: function(response) {
                                                // Handle successful response
                                                console.log(url, response)
                                                $('#data-container').html(response);
                                            },
                                            error: function(xhr, status, error) {
                                                // Handle errors
                                                console.error(error);
                                            }
                                        });
                                    });
                                });
    </script> -->
@endsection
