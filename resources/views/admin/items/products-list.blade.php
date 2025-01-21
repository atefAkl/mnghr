@if($products->count() > 0)
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>الصورة</th>
                    <th>اسم المنتج</th>
                    <th>السعر</th>
                    <th>الحالة</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" style="width: 50px; height: 50px; object-fit: cover;">
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <span class="badge {{ $product->status ? 'bg-success' : 'bg-danger' }}">
                                {{ $product->status ? 'نشط' : 'غير نشط' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.items.edit', $product->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-danger" onclick="deleteProduct({{ $product->id }})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="alert alert-info mt-3">
        لا توجد منتجات في هذه الفئة
    </div>
@endif
