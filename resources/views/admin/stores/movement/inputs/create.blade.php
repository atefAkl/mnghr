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

    <fieldset class="table mt-5">
        <legend>Input Receipt & Records</legend>

        <table class="mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Barcode</th>
                    <th>Product</th>
                    <th>Unit</th>
                    <th>Quantity</th>
                    <th>Notes</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                {{-- Start rendering entries --}}
                {{-- we are putting every store movement entry into a single form, this enable us to manage and update the entry --}}
                @php
                    $counter = 0;
                @endphp
                @if (count($receipt->entries))
                    @foreach ($receipt->entries as $entry)
                        <form action="{{ route('update-store-inputs-entry') }}" method="post">
                            @csrf
                            <input type="hidden" name="entry_id" value="{{ $entry->id }}">

                            <tr>
                                <td>{{ ++$counter }}</td>
                                <td>
                                    <input  value="{{ $entry->item->barcode }}" style="width: 150px">
                                </td>

                                <td data-bs-toggle="tooltip" data-bs-title="{{ $entry->item->breif }}">
                                    <input value="{{ $entry->item->name }}" style="min-width: 220px">
                                </td>

                                <td>
                                    <input value="{{ $entry->unit->name }}" style="width: 120px">
                                </td>

                                <td>
                                    <input type="number" name="quantity" value="{{ old('quantity', $entry->inputs) }}"
                                        id="quantity" style="width: 100px">
                                </td>

                                <td><input type="text" name="notes" value="{{ $entry->notes }}"></td>
                                <td>
                                    <div class="d-flex btn-group">
                                        <input type="submit" class="btn btn-sm py-1 btn-outline-secondary"
                                            value="Update" />
                                        <input type="button" class="btn btn-sm py-1 btn-outline-secondary"
                                            value="Copy" />
                                        <input type="reset" class="btn btn-sm py-1 btn-outline-secondary"
                                            value="Delete" />
                                    </div>
                                </td>

                            </tr>
                        </form>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7">No entries has been added yet</td>
                    </tr>
                @endif
                {{-- end of entries --}}
                {{-- Start input form --}}
                <form action="{{ route('save-store-inputs-entry') }}" method="post" id="new-entry-form">
                    @csrf
                    <input type="hidden" name="receipt_id" value="{{ $receipt->id }}">
                    <tr class="new-entry-row">
                        <style>
                            .new-entry-row input,
                            .new-entry-row select {
                                width: 100%;
                                padding: 0.25rem;
                            }
                            .btn-group button {
                                padding: 0.25rem 0.5rem;
                            }
                            .search-container {
                                position: relative;
                            }
                            #products-list {
                                width: 100%;
                                max-height: 200px;
                                overflow-y: auto;
                            }
                        </style>
                        <td>{{ ++$counter }}</td>
                        <td class="search-container">
                            <input type="text" 
                                class="form-control form-control-sm" 
                                id="search" 
                                placeholder="ابحث عن منتج..."
                                autocomplete="off">
                        </td>
                        <td>
                            <select name="product" id="product" class="form-select form-select-sm" required>
                                <option value="" hidden>اختر المنتج</option>
                            </select>
                        </td>
                        <td>
                            <select name="unit" id="unit" class="form-select form-select-sm" required>
                                <option value="" hidden>اختر الوحدة</option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="number" 
                                name="quantity" 
                                class="form-control form-control-sm" 
                                required 
                                min="0.01" 
                                step="0.01"
                                placeholder="الكمية">
                        </td>
                        <td>
                            <input type="text" 
                                name="notes" 
                                class="form-control form-control-sm"
                                placeholder="ملاحظات">
                        </td>
                        <td>
                            <div class="btn-group">
                                <button type="submit" class="btn btn-sm btn-outline-primary" title="حفظ">
                                    <i class="fas fa-save"></i>
                                </button>
                                <button type="reset" class="btn btn-sm btn-outline-secondary" title="مسح">
                                    <i class="fas fa-undo"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </form>
                {{-- end of input form --}}

                
            </tbody>

        </table>

        <div class="input-group pt-2 justify-content-end">
            <button class="btn btn-outline-secondary btn-sm">Store</button>
            <button class="btn btn-outline-secondary btn-sm">Receipts</button>
            <button class="btn btn-outline-secondary btn-sm">Approve</button>
            <button class="btn btn-outline-secondary btn-sm">Print</button>
        </div>
    </fieldset>

	<script>
        $(document).ready(function() {

            $('#search').on('keyup', function() {
				

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
                        if (response.length > 0) {
                            const options = response.map(item => {
                                return `<option value="${item.id}">${item.name}</option>`
                            })
                            $('#product').html(options.join(''))

                        } else {
                            $('#product').html(
                                '<option value="" hidden>No products found</option>');
                        }

                        // Update HTML, display data, etc.
                    },
                    error: function(xhr, status, error) {
                        // Handle errors
                        console.error(error);
                        // Display error message to the user
                    }
                });
            })

            // Choosing products Unit Automatically

        })
    </script>
@endsection
