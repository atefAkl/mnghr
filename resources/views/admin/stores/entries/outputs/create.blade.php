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
        <legend>Output Receipt & Records</legend>

        <div class="row mt-3">
            <div class="col col-2 text-end fw-bold">Serial Number:</div>
            <div class="col col-4"> {{ $receipt->serial }}</div>
            <div class="col col-2 text-end fw-bold">Date Expiry:</div>
            <div class="col col-4">{{ $receipt->reception_date }}</div>
            <div class="col col-2 text-end fw-bold">Reference Type:</div>
            <div class="col col-4">{{ $receipt->getTypeName($receipt->reference_type) }}</div>
            <div class="col col-2 text-end fw-bold">Store:</div>
            <div class="col col-4">{{ $receipt->store->name }}</div>
            <div class="col col-2 text-end fw-bold">Representative:</div>
            <div class="col col-4">{{ $receipt->admin->userName }}</div>
            <div class="col col-2 text-end fw-bold">Direction:</div>
            <div class="col col-4">
                @if ($receipt->direction === 1)
                    <span class="badge bg-success py-1 text-light">Input</span>
                @else
                    <span class="badge bg-danger py-1 text-light">Output</span>
                @endif
            </div>
            <div class="col col-2 text-end fw-bold">Description:</div>

            <div class="col col-10">{{ $receipt->brief }}</div>
            <div class="col col-2 text-end fw-bold">Notes: </div>
            <div class="col col-10">{{ $receipt->notes }}</div>

        </div>

        <table class="mt-3 w-100">
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
                                    <input value="{{ $entry->item->barcode }}" style="width: 150px">
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
                                        <button type="submit" class="btn btn-sm py-1 btn-outline-secondary" title="Update">
                                            <i class="fas fa-save"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm py-1 btn-outline-secondary" title="Copy">
                                            <i class="fas fa-copy"></i>
                                        </button>
                                        <a href="{{ route('destroy-store-input-entry', $entry->id) }}"
                                            class="btn btn-sm py-1 btn-outline-secondary delete-entry"
                                            data-entry-id="{{ $entry->id }}"
                                            data-product-name="{{ $entry->item->name }}"
                                            onclick="return confirmDelete(this)" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </a>
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
                <form action="{{ route('save-store-inputs-entry') }}" method="post">
                    @csrf
                    <input type="hidden" name="receipt_id" value="{{ $receipt->id }}">

                    <tr>
                        <td>{{ ++$counter }}</td>
                        <td>
                            <input type="text" list="barcodes-list" id="barcode_search"
                                class="form-control form-control-sm" style="width: 150px" placeholder="Product Barcode">
                            <datalist id="barcodes-list"></datalist>
                        </td>

                        <td>
                            <input type="text" list="products-list" id="product_search"
                                class="form-control form-control-sm" style="min-width: 220px" placeholder="Product Name">
                            <datalist id="products-list"></datalist>
                            <input type="hidden" name="product" id="product_id" required>
                        </td>

                        <td>
                            <select name="unit" id="unit" style="width: 120px" required>
                                <option hidden>Unit</option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                @endforeach
                            </select>
                        </td>

                        <td>
                            <input type="number" name="quantity" required id="quantity" style="width: 100px">
                        </td>

                        <td>
                            <input type="text" name="notes" id="notes">
                        </td>

                        <td>
                            <div class="btn-group ">
                                <button type="submit" class="btn btn-sm btn-outline-primary" title="Save">
                                    <i class="fas fa-save"></i>
                                </button>
                                <button type="reset" class="btn btn-sm btn-outline-secondary" title="Reset">
                                    <i class="fas fa-undo"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </form>
            </tbody>

        </table>

        <div class="input-group pt-2 px-3 justify-content-end">
            <button class="btn px-3 py-1 btn-outline-secondary btn-sm" title="Bach to Store">
                Back To Store
            </button>
            <button class="btn px-3 py-1 btn-outline-secondary btn-sm" title="Back to Receipts">
                <a href="{{ route('display-receipts-list', ['Output', 1]) }}">Back To Receipts</a>
            </button>
            <button class="btn px-3 py-1 btn-outline-secondary btn-sm" title="Approve Receipt">
                Approve Receipt
            </button>
            <button class="btn px-3 py-1 btn-outline-secondary btn-sm" title="Print Receipt">
                Print Receipt
            </button>
        </div>
    </fieldset>
    <script>
        function confirmDelete(element) {
            const productName = element.getAttribute('data-product-name');
            return confirm(`You are going to delete entry for "${productName}", are you sure?`);
        }

        $(document).ready(function() {
            let searchTimeout;

            // دالة البحث المشتركة
            function searchProducts(searchText, searchType) {
                clearTimeout(searchTimeout);



                searchTimeout = setTimeout(function() {
                    $.ajax({
                        url: "{{ route('get-products-like-query') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            searchText,

                        },
                        success: function(response) {
                            console.log('Search Response:', response);

                            const barcodesList = $('#barcodes-list');
                            const productsList = $('#products-list');

                            // تنظيف القوائم
                            if (searchType === 'barcode') {
                                barcodesList.empty();
                            } else {
                                productsList.empty();
                            }

                            if (response.length > 0) {
                                response.forEach(function(item) {
                                    if (searchType === 'barcode') {
                                        barcodesList.append(
                                            `<option value="${item.barcode}" data-id="${item.id}" data-name="${item.name}">`
                                            );
                                    } else {
                                        productsList.append(
                                            `<option value="${item.name}" data-id="${item.id}" data-barcode="${item.barcode}">`
                                            );
                                    }
                                });
                            }
                        },
                        error: function(error) {
                            console.error('Error:', error);
                        }
                    });
                }, 300);
            }

            // البحث بالباركود
            $('#barcode_search').on('input', function() {
                searchProducts($(this).val(), 'barcode');
            });

            // البحث باسم المنتج
            $('#product_search').on('input', function() {
                searchProducts($(this).val(), 'product');
            });

            // عند اختيار منتج من قائمة الباركود
            $('#barcode_search').on('change', function() {
                const selectedBarcode = $(this).val();
                const option = $(`#barcodes-list option[value="${selectedBarcode}"]`);

                if (option.length) {
                    const productId = option.data('id');
                    const productName = option.data('name');

                    $('#product_id').val(productId);
                    $('#product_search').val(productName);
                }
            });

            // عند اختيار منتج من قائمة المنتجات
            $('#product_search').on('change', function() {
                const selectedName = $(this).val();
                const option = $(`#products-list option[value="${selectedName}"]`);

                if (option.length) {
                    const productId = option.data('id');
                    const barcode = option.data('barcode');

                    $('#product_id').val(productId);
                    $('#barcode_search').val(barcode);
                }
            });

            // التحقق من صحة النموذج
            $('form').on('submit', function(e) {
                const productId = $('#product_id').val();
                const unit = $('#unit').val();
                const quantity = $('input[name="quantity"]').val();

                if (!productId || !unit || !quantity || quantity <= 0) {
                    e.preventDefault();
                    alert('Please fill in all required fields.');
                }
            });
        });
    </script>
@endsection
