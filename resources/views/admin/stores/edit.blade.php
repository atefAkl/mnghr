@extends('layouts.admin')
@section('header-links')
    <li class="breadcrumb-item"><a href="/admin/stores/home">Stores</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Store</li>
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

    <h1 class="mt-3 pb-2" style="border-bottom: 2px solid #dedede">Edit Store Info</h1>
    <fieldset class="mt-4 p-0 pt-4 pb-3 bg-light light-shadow">
        <legend class="bg-secondary text-light">General Information</legend>
        <form action="{{ route('update-store-general-info') }}" method="POST">
            <input type="hidden" name="id" value="{{ $store->id }}">
            @csrf
            <div class="row item-info-row">
                <div class="col col-3 item-info-head">branch:</div>
                <div class="col col-3 item-info-data">
                    <select class="inline-input" name="parent_store">
                        @foreach ($branches as $branch)
                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col col-3 item-info-head">Store Name:</div>
                <div class="col col-3 item-info-data">
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
            <div class="input-group px-3 sm">
                <button type="reset" class="form-control btn btn-outline-info my-2 py-0">Reset Form</button>
                <button type="submit" class="form-control btn btn-outline-primary my-2 py-0">Update General
                    Information</button>
            </div>
        </form>
    </fieldset>
    <fieldset class="mt-4 p-0 pt-4 pb-3 bg-light light-shadow">
        <legend class="bg-secondary text-light">Location</legend>
        <form class="p-0 m-0" action="{{ route('update-store-location-info') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $store->id }}">

            <div class="row item-info-row">
                <div class="col col-3 item-info-head">City:</div>
                <div class="col col-3 item-info-data">
                    <input type="text" class="inline-input" name="store_name" placeholder="City Name" />
                </div>

                <div class="col col-3 item-info-head">Destinct:</div>
                <div class="col col-3 item-info-data">
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
                <div class="col col-3 item-info-head">Postal Code:</div>
                <div class="col col-3 item-info-data">
                    <input type="text" class="inline-input" name="store_code" placeholder="0000" />
                </div>
                <div class="col col-3 item-info-head">Zip Code:</div>
                <div class="col col-3 item-info-data">
                    <input type="text" class="inline-input" name="store_code" placeholder="00000" />
                </div>
            </div>
            <div class="input-group sm px-3">
                <button type="reset" class="form-control btn btn-outline-info my-2 py-0">Reset Form</button>
                <button type="submit" class="form-control btn btn-outline-primary my-2 py-0">Update Address</button>
            </div>
        </form>
    </fieldset>
    <fieldset class="mt-4 p-0 pt-4 pb-3 bg-light light-shadow">
        <legend class="bg-secondary text-light">Adminstration and Communication Info</legend>
        <form class="p-0 m-0" action="{{ route('update-store-communication-info') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $store->id }}">
            <div class="row item-info-row">
                <div class="col col-3 item-info-head">Admin:</div>
                <div class="col col-3 item-info-data">
                    <select class="inline-input" name="admin">
                        @foreach ($admins as $admin)
                            <option value="{{ $admin->id }}">{{ $admin->userName }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col col-3 item-info-head">Email:</div>
                <div class="col col-3 item-info-data">
                    <input type="text" class="inline-input" name="email" placeholder="City Name" />
                </div>
            </div>
            <div class="row item-info-row">
                <div class="col col-3 item-info-head">Mobile:</div>
                <div class="col col-3 item-info-data">
                    <input type="text" class="inline-input" name="mobile" placeholder="Destinct Name" />
                </div>

                <div class="col col-3 item-info-head">whatsapp:</div>
                <div class="col col-3 item-info-data">
                    <input type="text" class="inline-input" name="whatsapp"
                        placeholder="Street, Building, Floor, etc." />
                </div>
            </div>
            <div class="row item-info-row">
                <div class="col col-3 item-info-head">Phone:</div>
                <div class="col col-3 item-info-data">
                    <input type="text" class="inline-input" name="phone" placeholder="0000" />
                </div>
                <div class="col col-3 item-info-head">Fax:</div>
                <div class="col col-3 item-info-data">
                    <input type="text" class="inline-input" name="fax" placeholder="00000" />
                </div>
            </div>
            <div class="row item-info-row">
                <div class="col col-3 text-center item-info-head">
                    <input type="checkbox" class="inline-input" name="ismovable" value="" />
                    Is Movable?
                </div>
                <div class="col col-3 text-center item-info-head">
                    <input type="text" class="inline-input" name="phone" placeholder="0000" />
                </div>
                <div class="col col-3 item-info-head">Fax:</div>
                <div class="col col-3 item-info-data">
                    <input type="text" class="inline-input" name="fax" placeholder="00000" />
                </div>
            </div>
            <div class="input-group sm px-3">
                <button type="reset" class="form-control btn btn-outline-info my-2 py-0">Reset Form</button>
                <button type="submit" class="form-control btn btn-outline-primary my-2 py-0">Update Address</button>
            </div>
        </form>
    </fieldset>
@endsection
