@extends('layouts.admin')
@section('header-links')
    <li class="breadcrumb-item"><a href="/admin/stores/home">Stores</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Store</li>
@endsection
@section('contents')
    <div class="container-fluid px-4">
        <h4 class="mt-4 mb-4">Edit Store Information</h4>

        <!-- General Information -->
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0"><i class="fas fa-info-circle me-2"></i>General Information</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('update-store-general-info') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $store->id }}">

                    <div class="input-group sm mb-1">
                        <span class="input-group-text" data-bs-toggle="tooltip" data-bs-placement="top" 
                              title="Enter the store's display name"><i class="fas fa-store"></i></span>
                        <input type="text" name="store_name" class="form-control" value="{{ $store->name }}" 
                               placeholder="Store Name">
                        
                        <span class="input-group-text" data-bs-toggle="tooltip" data-bs-placement="top" 
                              title="Unique identifier code for the store"><i class="fas fa-code"></i></span>
                        <input type="text" name="store_code" class="form-control" value="{{ $store->code }}" 
                               placeholder="Store Code">
                    </div>

                    <div class="input-group sm mb-1">
                        <span class="input-group-text" data-bs-toggle="tooltip" data-bs-placement="top" 
                              title="Select the branch this store belongs to"><i class="fas fa-building"></i></span>
                        <select name="branch" class="form-control py-0">
                            @foreach ($branches as $branch)
                                <option value="{{ $branch->id }}" {{ $store->branch_id == $branch->id ? 'selected' : '' }}>
                                    {{ $branch->name }}
                                </option>
                            @endforeach
                        </select>

                        <span class="input-group-text" data-bs-toggle="tooltip" data-bs-placement="top" 
                              title="Parent store if this is a sub-store"><i class="fas fa-sitemap"></i></span>
                        <select name="parent_store" class="form-control py-0">
                            @foreach ($stores as $store_option)
                                <option value="{{ $store_option->id }}" {{ $store->store_id == $store_option->id ? 'selected' : '' }}>
                                    {{ $store_option->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-group sm mb-1">
                        <span class="input-group-text" data-bs-toggle="tooltip" data-bs-placement="top" 
                              title="Brief description of the store"><i class="fas fa-align-left"></i></span>
                        <input type="text" name="store_brief" class="form-control" value="{{ $store->brief }}" 
                               placeholder="Store Description">
                    </div>

                    <div class="input-group sm mb-1">
                        <span class="input-group-text" data-bs-toggle="tooltip" data-bs-placement="top" 
                              title="Store's operational status"><i class="fas fa-plug"></i></span>
                        <select name="status" class="form-control py-0">
                            <option value="true" {{ $store->status ? 'selected' : '' }}>Active</option>
                            <option value="false" {{ !$store->status ? 'selected' : '' }}>Inactive</option>
                        </select>

                        <span class="input-group-text" data-bs-toggle="tooltip" data-bs-placement="top" 
                              title="Whether the store can be relocated"><i class="fas fa-location-pin-lock"></i></span>
                        <select name="movable" class="form-control py-0">
                            <option value="true" {{ $store->ismovable ? 'selected' : '' }}>Movable</option>
                            <option value="false" {{ !$store->ismovable ? 'selected' : '' }}>Fixed</option>
                        </select>

                        <button type="reset" class="input-group-text btn py-0 btn-outline-secondary"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Reset form to original values">
                            <i class="fas fa-undo me-1"></i> Reset
                        </button>
                        <button type="submit" class="input-group-text btn py-0 btn-primary"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Save general information changes">
                            <i class="fas fa-save me-1"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Location Information -->
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0"><i class="fas fa-map-marker-alt me-2"></i>Location Information</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('update-store-location-info') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $store->id }}">
                    
                    <div class="input-group sm mb-1">
                        <span class="input-group-text" data-bs-toggle="tooltip" data-bs-placement="top" 
                              title="Full street address of the store"><i class="fas fa-map"></i></span>
                        <input type="text" name="address" class="form-control" value="{{ $store->address }}" 
                               placeholder="Store Address">
                        
                        <span class="input-group-text" data-bs-toggle="tooltip" data-bs-placement="top" 
                              title="City where the store is located"><i class="fas fa-city"></i></span>
                        <input type="text" name="city" class="form-control" value="{{ $store->city }}" 
                               placeholder="City">
                    </div>

                    <div class="input-group sm mb-1">
                        <span class="input-group-text" data-bs-toggle="tooltip" data-bs-placement="top" 
                              title="Additional location details (landmarks, building name, etc)"><i class="fas fa-map-pin"></i></span>
                        <input type="text" name="location_details" class="form-control" value="{{ $store->location_details }}" 
                               placeholder="Location Details">
                        
                        <button type="submit" class="input-group-text btn py-0 btn-primary"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Save location information changes">
                            <i class="fas fa-save me-1"></i> Update Location
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Communication Information -->
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0"><i class="fas fa-phone me-2"></i>Communication Information</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('update-store-communication-info') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $store->id }}">
                    
                    <div class="input-group sm mb-1">
                        <span class="input-group-text" data-bs-toggle="tooltip" data-bs-placement="top" 
                              title="Store's landline number"><i class="fas fa-phone"></i></span>
                        <input type="text" name="phone" class="form-control" value="{{ $store->phone }}" 
                               placeholder="Phone Number">
                        
                        <span class="input-group-text" data-bs-toggle="tooltip" data-bs-placement="top" 
                              title="Store's mobile number"><i class="fas fa-mobile"></i></span>
                        <input type="text" name="mobile" class="form-control" value="{{ $store->mobile }}" 
                               placeholder="Mobile Number">
                    </div>

                    <div class="input-group sm mb-1">
                        <span class="input-group-text" data-bs-toggle="tooltip" data-bs-placement="top" 
                              title="Store's contact email address"><i class="fas fa-envelope"></i></span>
                        <input type="email" name="email" class="form-control" value="{{ $store->email }}" 
                               placeholder="Email Address">
                        
                        <button type="submit" class="input-group-text btn py-0 btn-primary"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Save contact information changes">
                            <i class="fas fa-save me-1"></i> Update Contact
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
@endsection
