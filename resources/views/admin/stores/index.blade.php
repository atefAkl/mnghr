@extends('layouts.admin')
@section('header-links')
    <li class="breadcrumb-item"><a href="/admin/stores/home">Stores</a></li>
    <li class="breadcrumb-item active" aria-current="page">Stores List</li>
@endsection

@section('contents')
    <div class="d-flex justify-content-between align-items-center mt-3 mb-4">
        <h1 class="h3 mb-0">Stores Management</h1>
       
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
                    
                            <div class="input-group sm mb-1">
                                <span class="input-group-text" data-bs-toggle="tooltip" data-bs-placement="top" 
                                      title="Enter the store's display name"><i class="fas fa-store"></i></span>
                                <input type="text" name="name" class="form-control" placeholder="Store Name" required>
                            
                                <span class="input-group-text" data-bs-toggle="tooltip" data-bs-placement="top" 
                                      title="Unique identifier code for the store"><i class="fas fa-code"></i></span>
                                <input type="text" name="code" class="form-control" placeholder="Store Code" required>
                            
                                <span class="input-group-text" data-bs-toggle="tooltip" data-bs-placement="top" 
                                      title="Select the branch this store belongs to"><i class="fas fa-building"></i></span>
                                <select name="branch_id" class="form-control py-0">
                                    <option value="" hidden>Select Branch</option>
                                    @foreach ($branches as $branch)
                                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        
                            <div class="input-group sm mb-1">
                                <span class="input-group-text" data-bs-toggle="tooltip" data-bs-placement="top" 
                                      title="Store's landline number"><i class="fas fa-phone"></i></span>
                                <input type="text" name="phone" class="form-control" placeholder="Phone">
                            
                                <span class="input-group-text" data-bs-toggle="tooltip" data-bs-placement="top" 
                                      title="Store administrator"><i class="fas fa-user"></i></span>
                                <input type="text" name="admin" class="form-control" placeholder="admin">
                            </div>
                        
                            <div class="input-group sm mb-1">
                                <span class="input-group-text" data-bs-toggle="tooltip" data-bs-placement="top" 
                                      title="Full store address"><i class="fas fa-map-marker-alt"></i></span>
                                <input type="text" name="address" class="form-control" placeholder="Address">
                            </div>
                        
                            <div class="input-group sm mb-1">
                                <span class="input-group-text" data-bs-toggle="tooltip" data-bs-placement="top" 
                                      title="Store's operational status"><i class="fas fa-plug"></i></span>
                                <select name="status" class="form-control py-0">
                                    <option value="" hidden>Activity</option>
                                    <option value="true">Active</option>
                                    <option value="false">Inactive</option>
                                </select>

                                <span class="input-group-text" data-bs-toggle="tooltip" data-bs-placement="top" 
                                      title="Whether the store can be relocated"><i class="fas fa-location-pin-lock"></i></span>
                                <select name="movable" class="form-control py-0">
                                    <option value="" hidden>Movability</option>
                                    <option value="true">Movable</option>
                                    <option value="false">Fixed</option>
                                </select>
                            
                                <button type="submit" class="input-group-text btn py-0 btn-primary" 
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Create new store">
                                    <i class="fas fa-plus me-1"></i> Save Store
                                </button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Stores List -->
    <div class="card mx-4 shadow-sm">
        <div class="card-header bg-light">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="card-title mb-0">Stores List &nbsp; &nbsp;
                        <button class="btn btn-primary py-0" data-bs-toggle="collapse" data-bs-target="#addNewStore">
                            <i class="fas fa-plus me-1"></i>Add New
                        </button>
                    </h5>
                </div>
                <div class="col-auto">
                    <div class="input-group sm">
                        <input type="text" class="form-control" id="searchInput" placeholder="Search stores...">
                        <button class="input-group-text py-0 btn btn-outline-secondary" type="button">
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

@push('scripts')
<script>
    // Initialize all tooltips
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    });
</script>
@endpush
