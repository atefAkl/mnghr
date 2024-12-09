<div class="row ">
    @foreach ($products as $product)
        <div class="col-lg-6 col-sm-6 mb-1  ">
            <a href="{{ route('view-product-info', [$product->id]) }}">
                <div class="productlist">
                <div class="productlistimg" style="background-image: url('{{ asset('assets/admin/uploads/images/product/' . $product->image) }}');">


                </div>
                    <div class="productlistcontent">
                        <h5 class=" mb-1">
                            @if ($product->parent_cat && $product->parent_cat->parent)
                                {{ $product->parent_cat->parent->cat_name }} &gt; {{ $product->parent_cat->cat_name }}
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
