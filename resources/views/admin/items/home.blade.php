@extends('layouts.admin')
@section('header-links')
    <li class="breadcrumb-item"><a href="/admin/items/index">items</a></li>
    <li class="breadcrumb-item active" aria-current="page">Home</li>
@endsection
@section('contents')
    <h1 class="mt-3 pb-2" style="border-bottom: 2px solid #dedede">All Product
        
    </h1>
    <table class="table table-striped table-bordered mt-3">
        <thead>
            <tr>
                <th>
                  barcode
                </th>
                <th>Product Name</th>
                <th>unit</th>
                <th>Admin</th>
                <th>Status</th>
                <th>Control</th>
            </tr>
        </thead>
        <tbody>
            @if (count($products))
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->barcode }}</td>
                        <td>{{ $product->name }}</td>

                        <td>@if ($product->units_name)
    {{ $product->units_name->name }}
@else
    N/A
@endif</td>
                        <td>{{ $product->creator->userName }}</td>
                        <td>{{ $product->status }}</td>
                        <td>

                            <a class="btn btn-sm py-0" href="{{ route('edit-product-info', $product->id) }}"><i
                                    class="fa fa-edit text-primary"></i></a>


                            <a class="btn btn-sm py-0" onclick="if(!confirm('You are about to delete a product, are you sure!?.')){return false}"
                            title="Delete Product and related Information" href="{{ route('destroy-product-info', $product->id) }}"><i
                                    class="fa fa-trash text-danger" ></i></a>

                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6">No stores has beenadded yet, Add your <a class="" data-bs-toggle="collapse"
                            data-bs-target="#addNewStore">first store</a>.</td>
                </tr>
            @endif
        </tbody>
    </table>
  

  
@endsection
