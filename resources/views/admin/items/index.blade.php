@extends('layouts.admin')

@section('contents')
<style>
    body {
        background-color: #f0f0f0;
    }
    .category-list, .category-list ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .category-item {
        cursor: pointer;
        padding: 10px;
        transition: background-color 0.3s ease;
    }
    .category-item:hover {
        background-color: #e0e0e0;
    }
    .category-item.active {
        background-color: #d0d0d0;
    }
    .level-1 {
        font-size: 14px;
        font-weight: 700;
        background-color: #c0c0c0;
    }
    .level-2 {
        font-size: 14px;
        font-weight: 600;
        background-color: #d0d0d0;
        padding-left: 8px;
    }
    .level-3 {
        font-size: 12px;
        font-weight: 500;
        background-color: #e0e0e0;
        padding-left: 16px;
    }
    .nested-list {
        display: none;
    }
    .nested-list.show {
        display: block;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col col-3">
            <div class="card">
                <div class="card-header">
                    <h4>Items Categories</h4>
                </div>
                <div class="card-body p-0">
                    <ul class="category-list">
                        @foreach ($cats as $category)
                            <li class="category-item level-1" onclick="toggleCategory(event, this)">
                                <p>{{ $category->cat_name }}
                                    <span class="badge bg-primary badge-pill">{{ $category->children->count() }}</span>
                                </p>
                                @if($category->children->count() > 0)
                               
                                <ul class="nested-list" id="cat_{{ $category->id }}">
                                    @foreach ($category->children as $midChild)
                                    <li class="category-item level-2" onclick="toggleCategory(event, this)">
                                    <p>{{ $midChild->cat_name }}</p>
                                        @if ($midChild->children->count() > 0)
                                            <ul class="nested-list" id="cat_{{ $midChild->id }}">
                                                @foreach ($midChild->children as $grandChild)
                                                <li class="category-item level-3">
                                                    <p>{{ $grandChild->cat_name }}</p>
                                                </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div id="products-container">
                <!-- هنا سيتم عرض المنتجات -->
                <h1 class="mt-3 pb-2" style="border-bottom: 2px solid #dedede">Display Items List</h1>
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
                                    <td>
                                      @if ($product->units_name)
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
                                <td colspan="6">No items has been added yet, Add your .</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
function toggleCategory(event, element) {
    // منع انتشار الحدث للعناصر الأب
    event.stopPropagation();
    
    // الحصول على القائمة الفرعية المرتبطة
    const currentList = element.querySelector('.nested-list');
    if (!currentList) return;
    
    // إغلاق جميع القوائم الأخرى في نفس المستوى
    const siblingLists = element.parentElement.querySelectorAll('.nested-list');
    siblingLists.forEach(list => {
        if (list !== currentList) {
            list.classList.remove('show');
        }
    });
    
    // تبديل حالة القائمة الحالية
    currentList.classList.toggle('show');
}
</script>

@endsection
