@extends('layouts.admin')
@section('header-links')
<li class="breadcrumb-item"><a href="/admin/items/home">Items</a></li>
<li class="breadcrumb-item active" aria-current="page">Home</li>
@endsection
@section('contents')
<h1 class="mt-3 pb-2" style="border-bottom: 2px solid #dedede">Items Home

  <a class="btn btn-sm btn-outline-primary ms-3" data-bs-toggle="collapse" data-bs-target="#addItemCategoryForm"
    aria-expanded="false" aria-controls="addItemCategoryForm"><i class="fa fa-folder-plus"></i></a>
  <a class="btn btn-sm btn-outline-primary " data-bs-toggle="collapse" data-bs-toggle="tooltip" data-bs-placement="top" title="Add Item" data-bs-target="#addItemForm"
    aria-expanded="false" aria-controls="addItemForm">
    <i class="fa fa-square-plus"></i></a>
</h1>

<!--  start Add New Category -->
<div class="row">
  <div class="col col-12 collapse" id="addItemCategoryForm">
    <div class="card card-body">
      <form action="/admin/items/categories/store" method="POST">
        @csrf
        <div class="input-group">
          <label class="input-group-text" for="parent_cat">Parent Category</label>
          <select class="form-select" name="parent" id="parent_cat">
            <option value="1">Root</option>
            @foreach ($cats as $cat)
            @if ($cat->id === 1)
            @continue
            @endif
            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @foreach ($cat->children as $cc)
            <option value="{{ $cc->id }}">{{ $cat->name }} - {{ $cc->name }}</option>
            @endforeach
            @endforeach
          </select>
          <label class="input-group-text" for="cat_name">Name</label>
          <input type="text" class="form-control" name="name" id="cat_name">
        </div>

        <div class="input-group  mt-2">
          <label class="input-group-text" for="brief">Description</label>
          <input type="text" class="form-control" name="brief" id="brief">
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
</div>
<!--  -->

<!-- start Add New item -->
<div class="row">
  <div class="col col-12 collapse" id="addItemForm">
    <div class=" card card-body">

      <form action="{{ route('store-new-item') }}" method="POST" accept="[]" enctype="multipart/form-data">
        @csrf
        <div class="input-group">
          <label class="input-group-text" for="categorey">Parent Category</label>
          <select class="form-select" name="category" id="categorey">
            <option value=""> Parent Select Category </option>
            <option value="1">Root</option>
            @foreach ($cats as $cat)

            <option value="{{ $cat->id }}">{{ $cat->name }}</option>

            @endforeach
          </select>
          <label class="input-group-text" for="barcode">Barcode</label>
          <input type="text" class="form-control" name="barcode" id="barcode">
        </div>
        <div class="input-group  mt-2">
          <label class="input-group-text" for="name">Name</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="Product Name">

          <input type="file" class="form-control" name="image" id="image">

        </div>
        <div class="input-group  mt-2">
          <label class="input-group-text" for="breif">Description</label>
          <input type="text" class="form-control" name="breif" id="breif">
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


      </form>


    </div>
  </div>

</div>

<!-- end -->
<div class="row">
  <div class="col col-4">
    <fieldset class="mt-4 mx-0 mb-0">
      <legend>Root &nbsp; &nbsp;
        <a class=" ms-3" data-bs-toggle="collapse" data-bs-target="#addItemCategoryForm" aria-expanded="false"
          aria-controls="addItemCategoryForm"><i data-bs-toggle="tooltip" title="Add New Category"
            class="fa fa-plus"></i></a>
      </legend>
      <ol id="tree" class="mt-0">
        @foreach ($cats as $item)
        @if ($item->id === 1)
        @continue
        @endif
        <li>
          <input type="checkbox" id="item_{{ $item->id }}" checked />
          <label for="item_{{ $item->id }}" class="my-0">{{ $item->name }}</label>
          @if ($item->children)
          <ol>
            @foreach ($item->children as $child)
            <li>
              <input type="checkbox" id="item_{{ $child->id }}" checked />
              <label for="item_{{ $child->id }}">{{ $child->name }}</label>
              @if ($child->children)
              <ol>
                @foreach ($child->children as $grandChild)
                <li>
                  <label>
                    {{ $grandChild->name }}
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
        <a class=" ms-3" data-bs-toggle="collapse" data-bs-target="#addItemForm"
          aria-expanded="false" aria-controls="addItemForm"><i data-bs-toggle="tooltip" title="Add New Item"
            class="fa fa-plus"></i></a>
      </legend>

      <div class="row ">
        @foreach ($items as $item)
        <div class="col-lg-6 col-sm-6  ">
          <div class="productset d-flex ">
            <div class="productsetimg">
              <img src="{{asset('assets/admin/uploads/images/product/'.$item->image)}}" alt="img">
            </div>
            <div class="productsetcontent">
              <h5>{{@$item->category->name}}</h5>
              <h4>{{$item->name}}</h4>
              <h6><a href="{{ route('display-item', [$item->id]) }}">See more</a>

              </h6>
            </div>
            <div class="overlay">{{$item->breif}}</div>
          </div>
        </div>
        @endforeach

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
</script>
@endsection