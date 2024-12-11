@extends('layouts.admin')
@section('header-links')
    <li class="breadcrumb-item"><a href="/admin/items/home">Items</a></li>
    <li class="breadcrumb-item active" aria-current="page">items Statistics</li>
@endsection
@section('contents')
    <h1 class="mt-3 pb-2" style="border-bottom: 2px solid #dedede"> Items Statistics</h1>

    <!--  start Add New Category   ;-->

    <div class="collapse @if ($errors->has('cat_brief') || $errors->has('cat_name')) show @endif" id="addItemCategoryForm">
        <div class="row">
            <div class="col @if ($errors->has('cat_brief') || $errors->has('cat_name')) col-9 show @else col-12 @endif">
                <div class="card card-head" style="background-color: #bbb;color: #fff;">
                    <h4 class="mt-2 pb-2 ms-3">Create New Category </h4>

                </div>
                <div class="card card-body ">
                    <form id="categoryForm" action="{{ route('store-new-itemCategory') }}" method="POST">
                        @csrf
                        <div class="input-group sm mt-2">
                            <label class="input-group-text" for="parent_cat">Parent Category</label>
                            <select class="form-select" name="parent" id="parent_cat">
                                <option value="1">Root</option>
                                @foreach ($cats as $cat)
                                    @if ($cat->id === 1)
                                        @continue
                                    @endif
                                    <option value="{{ $cat->id }}">
                                        {{ $cat->cat_name }}
                                    </option>
                                    @foreach ($cat->children as $cc)
                                        <option value="{{ $cc->id }}">{{ $cat->cat_name }} - {{ $cc->cat_name }}
                                        </option>
                                    @endforeach
                                @endforeach
                            </select>
                            <label class="input-group-text" for="cat_name">Name</label>
                            <input type="text" id="cat_name" class="form-control " name="cat_name"
                                value="{{ old('cat_name') }}">
                        </div>
                        <div class="input-group sm mt-2">
                            <label class="input-group-text" for="cat_brief">Description</label>
                            <input type="text" id="cat_brief" class="form-control " name="cat_brief"
                                value="{{ old('cat_brief') }}">
                        </div>
                        <div class="input-group sm mt-2 mb-3">
                            <div class="input-group-text">
                                <input class="form-check-input mt-0" name="status" type="checkbox" value="1"
                                    aria-label="Checkbox for following text input">
                            </div>
                            <button type="button" class="input-group-text text-start">Active</button>
                            <button type="submit" class="form-control btn btn-outline-primary">Save Category</button>
                        </div>
                    </form>
                </div>

            </div>
            <div class="col p-0  {{ $errors->has('cat_brief') || $errors->has('cat_name') ? 'col-3 d-block' : 'd-none' }}"
                id="error-container" style="border: 1px solid #dedede">
                <div class="card card-head" style="background-color: #bbb;color: #fff;">
                    <h4 class="mt-2 pb-2 ms-3">Errors </h4>
                </div>
                @error('cat_name')
                    <div class="invalid-feedback col-sm py-1 mb-1 ms-3">{{ $message }}</div>
                @enderror
                @error('cat_brief')
                    <div class="invalid-feedback col-sm py-1 mb-1 ms-3">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <!--  -->

    <!-- start Add New item -->
    <div class="collapse @if ($errors->has('breif') || $errors->has('name') || $errors->has('barcode')) show @endif" id="addItemForm">
        <div class="row">
            <div class="col @if ($errors->has('breif') || $errors->has('name') || $errors->has('barcode')) col-9 show @else  col-12 @endif" id="addItemForm">
                <div class="card card-head" style="background-color: #bbb;color: #fff;">
                    <h4 class="mt-2 pb-2 ms-3">Create New Product </h4>
                </div>
                <div class=" card card-body">
                    <form id="itemForm" action="{{ route('store-new-product') }}" method="POST" accept="[]"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="input-group sm mt-2">
                            <label class="input-group-text" for="categorey">Parent Category</label>
                            <select class="form-select" name="category_id" id="categorey">
                                <option hidden placeholder="Parent Select Category"> </option>
                                @foreach ($centrals as $cat)
                                    @foreach ($cat->children as $child)
                                        <option value="{{ $child->id }}">{{ $cat->parent->cat_name }}
                                            -{{ $cat->cat_name }} -
                                            {{ $child->cat_name }}
                                        </option>
                                    @endforeach
                                @endforeach
                            </select>
                            <label class="input-group-text " for="barcode">Barcode</label>
                            <input type="text" id="barcode" class="form-control" name="barcode"
                                value="{{ old('barcode') }}">

                        </div>

                        <div class="input-group sm mt-2">
                            <label class="input-group-text" for="name">Name</label>
                            <input type="text" id="name" placeholder="Product Name" class="form-control"
                                name="name" value="{{ old('name') }}">

                            <input type="file" class="form-control" name="image" id="image">

                        </div>
                        <div class="input-group sm mt-2">
                            <label class="input-group-text" for="breif">Description</label>
                            <input type="text" id="breif" class="form-control " name="breif"
                                value="{{ old('breif') }}">
                        </div>
                        <div class="input-group sm mt-2 mb-3">
                            <label class="input-group-text" for="unit">Unit</label>
                            <select class="form-select" name="unit" id="unit">
                                <option value="1"></option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="form-control btn btn-outline-primary">Save Item</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-3 p-0"
                style="display: {{ $errors->has('name') || $errors->has('barcode') || $errors->has('breif') ? 'block' : 'none' }};border: 1px solid #dedede">
                <div class="card card-head" style="background-color: #bbb;color: #fff;">
                    <h4 class="mt-2 pb-2 ms-3">Errors </h4>
                </div>
                @error('name')
                    <div class="invalid-feedback col-sm py-1 mb-1 ms-3">{{ $message }}</div>
                @enderror
                @error('barcode')
                    <div class="invalid-feedback col-sm py-1 mb-1 ms-3">{{ $message }}</div>
                @enderror
                @error('breif')
                    <div class="invalid-feedback col-sm py-1 mb-1 ms-3">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <!-- end -->
    <div class="row">
        <div class="col col-4">
            <fieldset class="mt-4 mx-0 mb-0">
                <legend>Root &nbsp; &nbsp;
                    <a class=" ms-3" data-bs-toggle="collapse" data-bs-target="#addItemCategoryForm"
                        aria-expanded="false" aria-controls="addItemCategoryForm"><i data-bs-toggle="tooltip"
                            title="Add New Category" class="fa fa-plus"></i></a>
                </legend>
                <ol id="tree" class="mt-0">
                    @foreach ($cats as $item)
                        <li>
                            <input type="checkbox" id="item_{{ $item->id }}" checked />
                            <label for="item_{{ $item->id }}" class="my-0">{{ $item->cat_name }}</label>
                            @if ($item->children)
                                <ol>
                                    @foreach ($item->children as $child)
                                        <li>

                                            <input type="checkbox" id="item_{{ $child->id }}" checked />
                                            <label for="item_{{ $child->id }}">{{ $child->cat_name }}</label>
                                            @if ($child->children)
                                                <ol>
                                                    @foreach ($child->children as $grandChild)
                                                        <li>
                                                            <label>
                                                                <a class="filter-link"
                                                                    data-url="{{ route('display-product-list-filtered', ['id' => $grandChild->id]) }}">
                                                                    {{ $grandChild->cat_name }}</a>
                                                            </label>
                                                        </li>
                                                    @endforeach
                                                </ol>
                                            @endif
                                        </li>
                                    @endforeach
                                </ol>
                            @endif
                        </li>
                    @endforeach
                </ol>
            </fieldset>
        </div>
        <div class="col col-8">
            <fieldset class="mt-4 mx-0 mb-0">
                <legend>Display Product List &nbsp; &nbsp;
                    <a class=" ms-3" data-bs-toggle="collapse" data-bs-target="#addItemForm" aria-expanded="false"
                        aria-controls="addItemForm"><i data-bs-toggle="tooltip" title="Add New Item"
                            class="fa fa-plus"></i>
                    </a>
                </legend>

                <div id="product-list">
                    <div class="row ">
                        @foreach ($products as $product)
                            <div class="col-lg-6 col-sm-6 mb-1  ">
                                <a href="{{ route('view-product-info', [$product->id]) }}">
                                    <div class="productlist">
                                        <div class="productlistimg"
                                            style="background-image: url('{{ asset('assets/admin/uploads/images/product/' . $product->image) }}');">


                                        </div>
                                        <div class="productlistcontent">
                                            <h5 class=" mb-1">
                                                @if ($product->parent_cat && $product->parent_cat->parent)
                                                    {{ $product->parent_cat->parent->cat_name }} &gt;
                                                    {{ $product->parent_cat->cat_name }}
                                                @else
                                                    {{ $product->cat_name }}
                                                @endif
                                            </h5>
                                            <h4 class="mb-3">{{ $product->name }}</h4>

                                        </div>


                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
        </div>
        </fieldset>
    </div>


    <ul id="contextMenu" style="display: none;">
        {{-- <li><a data-bs-toggle="collapse" data-bs-target="#addItemCategoryForm" aria-expanded="false"
                aria-controls="addItemCategoryForm">Add Sub Category</a></li> --}}
        <li><a href="/admin/items/categories/edit/__id">Edit Category</a></li>
        <li><a href="/admin/items/categories/delete/__id">Delete Category</a></li>
    </ul>
    <script>
        $(document).ready(function() {
            $('.category-item').on('contextmenu', function(e) {
                e.preventDefault();
                $('#contextMenu').css({
                    position: 'absolute',
                    top: e.pageY + 'px',
                    left: e.pageX + 'px',
                    display: 'block',

                }).fadeIn(300);
            });

            $(document).click(function() {
                $('#contextMenu').fadeOut(200);
            });

        });

        $(document).ready(function() {
            $('#addItemForm').on('show.bs.collapse', function() { //  فورم الايتم مفتوح collapse ف اذكان  
                $('#addItemCategoryForm').collapse('hide'); // Categoryقفلي بتاع الــ 
            });

            $('#addItemCategoryForm').on('show.bs.collapse',
                function() { //    فورم الاصناف مفتوح collapse ف اذكان  
                    $('#addItemForm').collapse('hide'); // item قفلي بتاع الــ 
                });
        });

        $(document).on('click', '.filter-link', function() {
            //  عند النقر على  #filter-link
            // #filter-link = link grandChild category

            const el = $(this) // #filter-link يشير على الايتم الذي تم النقر علية 
            const url = el.data('url') //    urlاعطيني  data-urlمن العنصر الذي تم النقر عليه  

            $.ajax({
                url, // URL of the server-side script
                type: "GET", // HTTP method (GET, POST, PUT, DELETE, etc.)

                success: function(response) {
                    // Handle successful response
                    console.log(response);
                    $('#product-list').html(response)
                    // Update HTML, display data, etc.
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.error(error);
                    // Display error message to the user
                }
            });


        });
    </script>
@endsection
