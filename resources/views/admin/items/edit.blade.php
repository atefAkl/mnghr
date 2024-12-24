@extends('layouts.admin')
@section('header-links')
    <li class="breadcrumb-item"><a href="/admin/items/home"> Items </a></li>
    <li class="breadcrumb-item"><a href="/admin/items/index"> Index </a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Item</li>
@endsection
@section('contents')
  
    <h1 class="mt-3 pb-2" style="border-bottom: 2px solid #dedede">Edit item Info</h1>
    <fieldset class="mt-4 p-0 pt-4 pb-3 ">
        <legend class="bg-secondary text-light">General Information</legend>
        <form action="{{ route('update-product-info') }}" method="POST">
            <input type="hidden" name="id" value="{{ $product->id }}">
            @csrf
            <div class="row item-info-row">

                <div class="col col-2 item-info-head">Barcode:</div>
                <div class="col col-4 item-info-data">
                    <input type="text" class="inline-input" name="product_barcode" value="{{ $product->barcode }}"
                        placeholder="Provide a valid code" />
                </div>
                <div class="col col-2 item-info-head">Product Name:</div>
                <div class="col col-4 item-info-data">
                    <input type="text" class="inline-input" name="product_name" value="{{ $product->name }}" />
                </div>

            </div>

            <div class="row item-info-row">
                <div class="col col-2 item-info-head">Serial Number:</div>
                <div class="col col-4 item-info-data">
                    <input type="text" class="inline-input" name="product_serial" value="{{ $product->serial }}" />
                </div>
                <div class="col col-2 item-info-head"> Categroy:</div>
                <div class="col col-4 item-info-data">
                    <select class="form-select" name="parent_id">

                        @foreach ($centrals as $cat)
                            @foreach ($cat->children as $child)
                                <option hidden value="{{ $child->id }}">{{ $cat->parent->name }} -{{ $cat->name }} -
                                    {{ $child->name }}
                                </option>
                                <option value="{{ $child->id }}">
                                    {{ $child->name }}
                                </option>
                            @endforeach
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="row item-info-row">
                <div class="col col-2 item-info-head">product Decription:</div>
                <div class="col col-4 item-info-data">
                    <input type="text" class="inline-input" name="product_brief" value="{{ $product->brief }}"
                        placeholder="Describe your product" />
                </div>
                <div class="col col-2 item-info-head">unit:</div>
                <div class="col col-4 item-info-data">
                    <select class="inline-input" name="product_unit_id">
                        <option hidden value="">
                            @if ($product->units_name)
                                {{ $product->units_name->name }}
                            @else
                                N/A
                            @endif
                        </option>
                        @foreach ($units as $unit)
                            <option value="{{ $unit->id }}">

                                {{ $unit->name }}

                            </option>
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
