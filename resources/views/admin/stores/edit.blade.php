@extends('layouts.admin')
@section('header-links')
    <li class="breadcrumb-item"><a href="/admin/stores/home">Stores</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Store</li>
@endsection
@section('contents')
    <style>
        .item-info-row {
            border-bottom: 1px solid #ccc;
            margin: 1rem;
        }

        .item-info-head {
            font-weight: bold;
            text-align: right;
        }

        .inline-input {
            border: none;
            outline: none;
            padding: 0 1rem;
            width: 100%;
            transition: all 0.3s ease-in-out
        }

        .inline-input:focus {
            background-color: #cccc;
        }
    </style>
    'name',
    'address',
    'brief',
    'code',
    'store_id',
    'phone',
    'email',
    'admin',
    'branch_id',
    'status',
    'created_by',
    'created_at',
    'updated_by',
    'updated_at'
    <h1 class="mt-3 pb-2" style="border-bottom: 2px solid #dedede">Edit Store Info</h1>
    <fieldset class="mt-4 p-0">
        <legend>General Information</legend>
        <form action="{{ route('update-store-info') }}" method="POST">
            @csrf
            <div class="row item-info-row">
                <div class="col col-3 item-info-head">Store Name:</div>
                <div class="col col-9 item-info-data">
                    <input type="text" class="inline-input" name="store_name" value="{{ $store->name }}" />
                </div>
            </div>
            <div class="row item-info-row">
                <div class="col col-3 item-info-head">Store Code:</div>
                <div class="col col-9 item-info-data">
                    <input type="text" class="inline-input" name="store_code" value="{{ $store->code }}"
                        placeholder="Provide a valid code" />
                </div>
            </div>
            <div class="row item-info-row">
                <div class="col col-3 item-info-head">Store Decription:</div>
                <div class="col col-9 item-info-data">
                    <input type="text" class="inline-input" name="store_code" value="{{ $store->brief }}"
                        placeholder="Describe your store" />
                </div>
            </div>
            <div class="input-group sm"><button class="form-control btn btn-primary mx-3 mb-3">Update General
                    Information</button>
            </div>
        </form>
    </fieldset>
    <fieldset class="mt-4 p-0">
        <legend>Location</legend>
        <form class="p-0 m-0" action="{{ route('update-store-info') }}" method="POST">
            @csrf
            <div class="row item-info-row">
                <div class="col col-3 item-info-head">City:</div>
                <div class="col col-9 item-info-data">
                    <input type="text" class="inline-input" name="store_name" placeholder="City Name" />
                </div>
            </div>
            <div class="row item-info-row">
                <div class="col col-3 item-info-head">Destinct:</div>
                <div class="col col-9 item-info-data">
                    <input type="text" class="inline-input" name="Destinct" placeholder="Destinct Name" />
                </div>
            </div>
            <div class="row item-info-row">
                <div class="col col-3 item-info-head">Detailed Address:</div>
                <div class="col col-9 item-info-data">
                    <input type="text" class="inline-input" name="store_code"
                        placeholder="Street, Building, Floor, etc." />
                </div>
            </div>
            <div class="row item-info-row">
                <div class="col col-2 item-info-head">Postal Code:</div>
                <div class="col col-4 item-info-data">
                    <input type="text" class="inline-input" name="store_code" placeholder="0000" />
                </div>
                <div class="col col-2 item-info-head">Zip Code:</div>
                <div class="col col-4 item-info-data">
                    <input type="text" class="inline-input" name="store_code" placeholder="00000" />
                </div>
            </div>
            <div class="input-group sm"><button class="form-control btn btn-primary mx-3 mb-3">Update Address</button>
            </div>
        </form>
    </fieldset>
@endsection
