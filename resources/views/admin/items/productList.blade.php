@extends('layouts.admin')
@section('header-links')
<li class="breadcrumb-item"><a href="/admin/items/home">Items</a></li>
<li class="breadcrumb-item active" aria-current="page">items Statistics</li>
@endsection
@section('contents')
<style>
  .border-red {
    border-color: #dc3545 !important;
  }
  .ul-error {
    margin-top: 1rem;
    text-align: left;
    margin-left: -1rem;
    font-size: 12px !important;
  }
</style>
<h1 class="mt-3 pb-2" style="border-bottom: 2px solid #dedede"> Items Statistics</h1>

<!--  start Add New Category   ;-->

<div class="row ">
  <div class="col col-12 collapse @if ($errors->has('cat_brief') || $errors->has('cat_name')) show @endif" id="addItemCategoryForm"
    style="border-bottom: 2px solid #dedede">
    <div class="card card-head" style="background-color: #bbb;color: #fff;">
      <h4 class="mt-2 pb-2 ms-3">Create New Category </h4>

    </div>
    <div class="card card-body ">
      <form id="categoryForm" action="/admin/items/categories/store" method="POST">
        @csrf
        <div class="input-group">
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
            <option value="{{ $cc->id }}">{{ $cat->cat_name }} - {{ $cc->cat_name }}</option>
            @endforeach
            @endforeach
          </select>
          <label class="input-group-text" for="cat_name">Name</label>
          <input type="text" id="cat_name" class="form-control "
            name="cat_name" value="{{ old('cat_name') }}">
        </div>
        <div class="input-group  mt-2">
          <label class="input-group-text" for="cat_brief">Description</label>
          <input type="text" id="cat_brief" class="form-control "
            name="cat_brief" value="{{ old('cat_brief') }}">
        </div>
        <div class="input-group mt-2">
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
  <div class="col-3 p-0" id="error-container" style="display: none;border: 1px solid #dedede">
    <div class="card card-head" style="background-color: #bbb;color: #fff;">
      <h4 class="mt-2 pb-2 ms-3">Errors </h4>
    </div>
    <span class="text-danger mt-4 text-align-left" id="error-messages">
    </span>
  </div>
  <!-- Success alert -->
  <div class="alert alert-success" id="success-message" style="display: none;">
    Category created successfully!
  </div>
</div>

<!--  -->

<!-- start Add New item -->
<div class="row">
  <div class="col col-12 collapse @if ($errors->has('breif') || $errors->has('name') || $errors->has('barcode')) show @endif" id="addItemForm" style="border-bottom: 2px solid #dedede">
  <div class="card card-head" style="background-color: #bbb;color: #fff;">
      <h4 class="mt-2 pb-2 ms-3">Create New Product </h4>
    </div>
    <div class=" card card-body">
      <form id="itemForm" action="{{ route('store-new-product') }}" method="POST" accept="[]" enctype="multipart/form-data">
        @csrf

        <div class="input-group">
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
          <label class="input-group-text" for="barcode">Barcode</label>
          <input type="text" id="barcode" class="form-control" name="barcode"
            value="{{ old('barcode') }}">

        </div>

        <div class="input-group  mt-2">
          <label class="input-group-text" for="name">Name</label>
          <input type="text" id="name" placeholder="Product Name"
            class="form-control" name="name"
            value="{{ old('name') }}">

          <input type="file" class="form-control" name="image" id="image">

        </div>
        <div class="input-group  mt-2">
          <label class="input-group-text" for="breif">Description</label>
          <input type="text" id="breif" class="form-control "
            name="breif" value="{{ old('breif') }}">
        </div>
        <div class="input-group mt-2">
          <label class="input-group-text" for="unit">Unit</label>
          <select class="form-select" name="unit" id="unit">
            <option value="1"></option>
            @foreach ($units as $unit)
            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
            @endforeach
          </select>
          <button type="submit" class="form-control btn btn-outline-primary">Save Item</button>
        </div>
      </form
    </div>
  </div>
</div>
  <div class="col-3 p-0" id="error-items" style="display: none;border: 1px solid #dedede">
    <div class="card card-head" style="background-color: #bbb;color: #fff;">
      <h4 class="mt-2 pb-2 ms-3">Errors </h4>
    </div>
    <span class="text-danger mt-4 text-align-left" id="error-messages-items">
    </span>
  </div>
  <!-- Success alert -->
  <div class="alert alert-success" id="success-message-items" style="display: none;">
    Category created successfully!
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
                    <a id="filter-link"
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
            class="fa fa-plus"></i></a>
      </legend>

      <div id="product-list">
        <div class="row ">
          @foreach ($products as $product)
          <div class="col-lg-6 col-sm-6 mb-1  ">
            <a href="{{ route('view-product-info', [$product->id]) }}">
              <div class="productlist">
                <div class="productlistimg">
                  <img src="{{ asset('assets/admin/uploads/images/product/' . $product->image) }}"
                    alt="img">

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

                <div>
                  <p>{{ $product->breif }}</p>
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



  $(document).on('click', '#filter-link', function() {
    //  عند النقر على  #filter-link
    // #filter-link = link grandChild category

    const el = $(this) // #filter-link يشير على الايتم الذي تم النقر علية 
    const url = el.data('url') //    urlاعطيني  data-urlمن العنصر الذي تم النقر عليه  
    fetch(url) //جلب url
      //if response is ok 
      // div id = product-list اعطيني الداتا وحطهم في 
      .then(data => {

        document.getElementById('product-list').innerHTML = data;
      })
      // div id = product-list في حال حدث ايرر طلع لي الايرر ورسالة الايرر جوا الدف 
      .catch(error => {
        console.error('Error fetching product item:', error);
        const errorMessage = error.message ||
          'An error occurred while loading  product item. Please try again later.';
        $('#product-list').html('<p class="error-message">' + errorMessage + '</p>');
      });
  });

//categoryForm error validation
  $(document).ready(function() {
    $("#categoryForm").on('submit', function(e) {
      e.preventDefault();
      // Send form data using AJAX
      var actionUrl = $(this).attr('action');
      console.log("Form action URL:", actionUrl);

      // Send form data using AJAX
      $.ajax({
        url: actionUrl,
        method: 'POST',
        data: $(this).serialize(),
        success: function(response) {
          $("#addItemCategoryForm").removeClass('col-9').addClass('col-12');
          $("#error-container").hide();
          $("#error-messages").empty();
          $("#success-message").show().delay(3000).fadeOut();
          $('#addItemCategoryForm').collapse('hide');
          $("#categoryForm")[0].reset();
        },
        error: function(response) {
          if (response.status === 422) {
            let errors = response.responseJSON.errors;
            let errorHtml = '<ul class="ul-error">';
            for (let field in errors) {
              errorHtml += '<li>' + errors[field][0] + '</li>';

              $("#" + field).addClass('border-red');
            }
            errorHtml += '</ul>';
            $("#error-messages").html(errorHtml);
            $("#addItemCategoryForm").removeClass('col-12').addClass('col-9');
            $("#error-container").show();
            $("#categoryForm")[0].reset();
          }
        }
      });
    });
  });
  //end

  //ItemForm error validation
  $(document).ready(function() {
    $("#itemForm").on('submit', function(e) {
      e.preventDefault();
      // Send form data using AJAX
      var actionUrl = $(this).attr('action');
      console.log("Form action URL:", actionUrl);

      // Send form data using AJAX
      $.ajax({
        url: actionUrl,
        method: 'POST',
        data: $(this).serialize(),
        success: function(response) {
          $("#addItemForm").removeClass('col-9').addClass('col-12');
          $("#error-items").hide();
          $("#error-messages-items").empty();
          $("#success-message-items").show().delay(3000).fadeOut();
          $('#addItemForm').collapse('hide');
          $("#itemForm")[0].reset();
        },
        error: function(response) {
          if (response.status === 422) {
            let errors = response.responseJSON.errors;
            let errorHtml = '<ul class="ul-error">';
            for (let field in errors) {
              errorHtml += '<li>' + errors[field][0] + '</li>';

              $("#" + field).addClass('border-red');
            }
            errorHtml += '</ul>';
            $("#error-messages-items").html(errorHtml);
            $("#addItemForm").removeClass('col-12').addClass('col-9');
            $("#error-items").show();
            $("#itemForm")[0].reset();
          }
        }
      });
    });
  });
</script>
@endsection