@extends('layouts.admin')
@section('header-links')
    <li class="breadcrumb-item"><a href="/admin/stores/home">Stores</a></li>
    <li class="breadcrumb-item active" aria-current="page">Home</li>
@endsection
@section('contents')
    <h1 class="mt-3 pb-2" style="border-bottom: 2px solid #dedede">Display Stores List
        <a data-bs-toggle="collapse" data-bs-target="#addItemCategoryForm" class="float-right"><i class="fa fa-plus"></i> Add
            New Store</a>
    </h1>

    <div class="row">
        <div class="col col-12 collapse" id="addItemCategoryForm">
            <div class="card card-body">
                <form action="/admin/stores/store" method="POST">
                    @csrf
                    <div class="input-group sm">
                        <label class="input-group-text" for="parent_store">Parent Store</label>
                        <select class="form-select" name="atore_id" id="parent_store">
                            <option value="1">Root</option>
                            @foreach ($stores as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <label class="input-group-text" for="branch">Branch</label>
                        <select class="form-select" name="branch_id" id="branch">
                            @foreach ($branches as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group sm mt-2">
                        <label class="input-group-text" for="store_name">Name</label>
                        <input type="text" class="form-control" name="name" id="store_name">
                        <label class="input-group-text" for="store_code">Code</label>
                        <input type="text" class="form-control" name="store_code" id="store_code">
                    </div>

                    <div class="input-group mt-2">
                        <label class="input-group-text" for="brief">Description</label>
                        <input type="text" class="form-control" name="brief" id="brief">
                    </div>

                    <div class="input-group mt-2">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0" name="status" type="checkbox" value="1"
                                aria-label="Checkbox for following text input" id="status">
                        </div>
                        <label for="status" class="input-group-text text-start">Active</label>

                        <div class="input-group-text">
                            <input class="form-check-input mt-0" name="ismovable" type="checkbox" value="1"
                                aria-label="Checkbox for following text input" id="ismovable">
                        </div>
                        <label for="ismovable" class="input-group-text text-start">Is Movable</label>
                        <button type="submit" class="btn btn-outline-primary">Save Store Info</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Code</th>
                <th>Store Name</th>
                <th>Branch</th>
                <th>Admin</th>
                <th>Status</th>
                <th>Control</th>
            </tr>
        </thead>
        <tbody>
            @if (count($stores))
                @foreach ($stores as $store)
                    <tr>
                        <td>{{ $store->code }}</td>
                        <td>{{ $store->name }}</td>
                        <td>{{ $store->branch_id }}</td>
                        <td>{{ $store->admin->profile->phone }}</td>
                        <td>{{ $store->staus }}</td>
                        <td>
                            <button class="btn">
                                <a href="{{ route('edit-store-info', $store->id) }}"><i
                                        class="fa fa-edit text-primary"></i></a>
                            </button>
                            <button class="btn">
                                <a href="{{ route('destroy-store-info', $store->id) }}"><i
                                        class="fa fa-trash text-danger"></i></a>
                            </button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6">No stores has beenadded yet, Add your <a class="" data-bs-toggle="collapse"
                            data-bs-target="#addNewStore">first store</a>.</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
