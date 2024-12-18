@extends('layouts.admin')
@section('header-links')
    <li class="breadcrumb-item"><a href="/admin/stores/home">Stores</a></li>
    <li class="breadcrumb-item active" aria-current="page">Stores List</li>
@endsection

@section('contents')
    <div class="d-flex justify-content-between align-items-center mt-3 mb-4">
        <h1 class="h3 mb-0">Stores Management</h1>
        <button class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#addNewStore">
            <i class="fas fa-plus me-2"></i>Add New Store
        </button>
    </div>

    <!-- Quick Stats -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h6 class="text-muted mb-2">Total Stores</h6>
                            <h4 class="mb-0">{{ count($stores) }}</h4>
                        </div>
                        <div class="text-primary">
                            <i class="fas fa-store fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h6 class="text-muted mb-2">Active Stores</h6>
                            <h4 class="mb-0">{{ $stores->where('status', 1)->count() }}</h4>
                        </div>
                        <div class="text-success">
                            <i class="fas fa-check-circle fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h6 class="text-muted mb-2">Inactive Stores</h6>
                            <h4 class="mb-0">{{ $stores->where('status', 0)->count() }}</h4>
                        </div>
                        <div class="text-warning">
                            <i class="fas fa-exclamation-circle fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h6 class="text-muted mb-2">Movable Stores</h6>
                            <h4 class="mb-0">{{ $stores->where('ismovable', 1)->count() }}</h4>
                        </div>
                        <div class="text-info">
                            <i class="fas fa-truck fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add New Store Form -->
    <div class="collapse mb-4" id="addNewStore">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-light">
                <h5 class="card-title mb-0">Add New Store</h5>
            </div>
            <div class="card-body">
                <form action="/admin/stores/store" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="parent_store">Parent Store</label>
                                <select class="form-select" name="store_id" id="parent_store">
                                    <option value="1">Root</option>
                                    @foreach ($stores as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="branch">Branch</label>
                                <select class="form-select" name="branch_id" id="branch">
                                    @foreach ($branches as $branch)
                                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="store_name">Store Name</label>
                                <input type="text" class="form-control" name="name" id="store_name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="store_code">Store Code</label>
                                <input type="text" class="form-control" name="code" id="store_code" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="brief">Description</label>
                                <textarea class="form-control" name="brief" id="brief" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="status" type="checkbox" value="1" id="status">
                                    <label class="form-check-label" for="status">Active</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="ismovable" type="checkbox" value="1" id="ismovable">
                                    <label class="form-check-label" for="ismovable">Is Movable</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="button" class="btn btn-secondary" data-bs-toggle="collapse" data-bs-target="#addNewStore">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Store</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Stores List -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-light">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="card-title mb-0">Stores List</h5>
                </div>
                <div class="col-auto">
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control" id="searchInput" placeholder="Search stores...">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Code</th>
                            <th scope="col">Store Name</th>
                            <th scope="col">Branch</th>
                            <th scope="col">Admin</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($stores))
                            @foreach ($stores as $index => $store)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $store->code }}</td>
                                    <td>{{ $store->name }}</td>
                                    <td>{{ @$store->branch->name }}</td>
                                    <td>{{ $store->admin->profile->phone }}</td>
                                    <td>
                                        @if($store->status == 1)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-warning">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('edit-store-info', $store->id) }}" class="btn btn-sm btn-light me-2" title="Edit">
                                            <i class="fas fa-edit text-primary"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-light" title="Delete" 
                                                onclick="if(confirm('Are you sure you want to delete this store?')) window.location.href='{{ route('destroy-store-info', $store->id) }}'">
                                            <i class="fas fa-trash text-danger"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    <div class="text-muted">
                                        <i class="fas fa-store fa-2x mb-3"></i>
                                        <p class="mb-0">No stores found. Add your first store to get started.</p>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // تفعيل Select2 للقوائم المنسدلة
    $('#parent_store, #branch').select2({
        theme: 'bootstrap-5'
    });

    // البحث في الجدول
    $("#searchInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("table tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
</script>
@endsection
