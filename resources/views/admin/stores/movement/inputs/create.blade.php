@extends('layouts.admin')
@section('header-links')
    <li class="breadcrumb-item"><a href="/admin/stores/home">Stores</a></li>
    <li class="breadcrumb-item active" aria-current="page">Receipts</li>
@endsection
@section('extra-links')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/store.entries.css') }}">
@endsection
@section('contents')
    <h1 class="mt-3 pb-2 " style="border-bottom: 2px solid #dedede">Store Movement Receipts
    </h1>

    <table class="mt-3">
        <thead>
            <tr>
                <th>Search</th>
                <th>Product</th>
                <th>Unit</th>
                <th>Quantity</th>
                <th>Notes</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <form action="{{ route('save-store-inputs-entry') }}" method="post">
                @csrf
                <input type="hidden" name="receipt_id" value="{{ $receipt->id }}">

                <tr>
                    <td><input type="search" name="search" id="search" style="width:120px" placeholder="2510000"></td>
                    <td>
                        <select name="product" id="product">
                            <option value="" hidden>Search for Products</option>
                        </select>
                    </td>
                    <td>
                        <select name="unit" id="unit" style="width: 120px">
                            <option hidden>Unit</option>
                        </select>
                    </td>

                    <td><input type="number" name="quantity" id="quantity" style="width: 100px"></td>
                    <td><input type="text" name="notes" id="notes"></td>
                    <td>
                        <div class="d-flex">
                            <input type="submit" class="input-froup-text" value="Insert" />
                            <input type="reset" class="input-froup-text" value="reset form" />
                        </div>
                    </td>
                </tr>
            </form>
        </tbody>
    </table>
    <div class="row ">


    </div>

    <script>
        $(document).ready(function() {
            console.log($('#search'))
            $('#search').on('keyup', function() {
                console.log('key raised')
                $.ajax({
                    url: "{{ route('get-products-like-query') }}", // URL of the server-side script
                    type: "POST", // HTTP method
                    data: {
                        _token: "{{ csrf_token() }}",
                        search_text: $(this).val(),
                    },
                    success: function(response) {
                        // Handle successful response
                        console.log(response);
                        // Update HTML, display data, etc.
                    },
                    error: function(xhr, status, error) {
                        // Handle errors
                        console.error(error);
                        // Display error message to the user
                    }
                });
            })

        })
    </script>
@endsection
