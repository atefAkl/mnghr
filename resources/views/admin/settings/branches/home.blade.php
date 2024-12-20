@extends('layouts.admin')
@section('contents')
<h1 class="my-3 pb-2 " style="border-bottom: 2px solid #dedede">
    <i class="fa fa-cogs "></i> Settings
</h2>
    <style>
        .input-group.sm label.input-group-text,
        .input-group.sm input.form-control,
        .input-group.sm select.form-control,
        .input-group.sm .form-control,
        .input-group.sm .input-group-text,
        .input-group.sm button.form-control {
            padding: 0 0.5rem;
            height: 33px;
        }
    </style>
    <div class="input-group">
        <button class="py-0 btn btn-primary"> <i class="fa fa-code-branch"></i> Branches
            <span class="btn text-light btn-sm" data-bs-toggle="collapse" data-bs-target="#addNewBranch"><i
                    data-bs-toggle="tooltip" data-bs-title="Add New Branch" class="fa fa-plus-square"></i></span>
        </button>
        <button class="py-0 btn btn-outline-secondary"><i class="fa fa-address-card"></i> Address</button>
        <button class="py-0 btn btn-outline-secondary"><i class="fa fa-file"></i> Registery Docs</button>
    </div>
    <div id="body">
        <div class="collapse" id="addNewBranch">
            <form action="{{ route('store-new-branches') }}" method="POST">
                @csrf
                <div class="input-group sm mt-1">
                    <label class="input-group-text" for="branch_name">branch Name</label>
                    <input type="text" class="form-control" id="branch_name" name="name" autocomplete="name"
                        value="{{ old('name') }}" />
                    <label class="input-group-text" for="branch_code">Code</label>
                    <input type="text" class="form-control" id="branch_code" name="branch_code"
                        autocomplete="branch-code" value="{{ old('branch_code') }}" />
                    <label class="input-group-text" for="ismain">
                        <input type="checkbox" id="ismain" name="ismain" />
                    </label>
                    <label class="input-group-text" for="ismain">Main Branch ?</label>
                </div>
                <div class="input-group sm mt-1">
                    <label class="input-group-text" for="branch_address">Branch Address</label>
                    <input type="text" class="form-control" id="branch_address" name="address" autocomplete="address"
                        value="{{ old('address') }}" />
                </div>
                <div class="input-group sm my-1">
                    <label class="input-group-text" for="branch_phone">Phone</label>
                    <input type="text" class="form-control" id="branch_phone" name="phone" autocomplete="phone"
                        value="{{ old('phone') }}" />
                    <label class="input-group-text" for="branch_email">Email</label>
                    <input type="text" class="form-control" id="branch_email" name="email" autocomplete="email"
                        value="{{ old('email') }}" />
                </div>
                <button class="form-control btn btn-primary btn-sm" type="submit">Save Branch</button>
            </form>
        </div>
        <div class="collapse" id="editBranchInfo">
            <form action="{{ route('update-branch-info') }}" method="POST">
                @csrf
                <input type="hidden" id="branch_id" name="id" value="">
                <div class="input-group sm mt-1">
                    <label class="input-group-text" for="edit_branch_name">branch Name</label>
                    <input type="text" class="form-control" id="edit_branch_name" name="name"
                        value="{{ old('name') }}" />
                    <label class="input-group-text" for="edit_branch_code">Code</label>
                    <input type="text" class="form-control" id="edit_branch_code" name="branch_code"
                        value="{{ old('branch_code') }}" />

                </div>
                <div class="input-group sm mt-1">
                    <label class="input-group-text" for="edit_branch_address">Branch Address</label>
                    <input type="text" class="form-control" id="edit_branch_address" name="address"
                        value="{{ old('address') }}" />
                </div>
                <div class="input-group sm my-1">
                    <label class="input-group-text" for="edit_branch_phone">Phone</label>
                    <input type="text" class="form-control" id="edit_branch_phone" name="phone"
                        value="{{ old('phone') }}" />
                    <label class="input-group-text" for="edit_branch_email">Email</label>
                    <input type="text" class="form-control" id="edit_branch_email" name="email"
                        value="{{ old('email') }}" />
                </div>
                <button class="form-control btn btn-primary btn-sm" type="submit">Update Branch Info</button>
            </form>
        </div>
        <table class="table mt-3">
            <thead>
                <tr class="bg-primary">
                    <th><i class="fa fa-barcode"></i> The Code</th>
                    <th><i class="fa fa-tag"></i> Name</th>
                    <th><i class="fa fa-map-marker-alt"></i> Address</th>
                    <th><i class="fa fa-phone"></i> Phone</th>
                    <th><i class="fa fa-cog"></i> Control</th>
                </tr>
            </thead>
            <tbody class="table-hover">
                @if (count($branches))
                    @foreach ($branches as $item)
                        <tr>
                            <td>{{ $item->branch_code }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>
                                <button data-item="{{ $item }}" class="btn btn-sm edit-form-trigger"
                                    data-bs-toggle="collapse" data-bs-target="#editBranchInfo">
                                    <i data-bs-toggle="tooltip" data-bs-title="Tooltip on top" class="fa fa-edit"></i>
                                </button>
                                <a class="btn btn-sm" href="{{ route('destroy-branch', $item->id) }}">
                                    <i data-bs-toggle="tooltip" data-bs-title="Tooltip on top"
                                        class="fa fa-trash text-danger"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                @endif
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {

            $('.edit-form-trigger').click(function() {
                let item = $(this).data('item');
                $('#addNewBranch').slideUp(300);
                $('#editBranchInfo').slideDown(300);

                $('#branch_id').val(item.id)
                $('#edit_branch_name').val(item.name)
                $('#edit_branch_code').val(item.branch_code)
                $('#edit_branch_address').val(item.address)
                $('#edit_branch_email').val(item.email)
                $('#edit_branch_phone').val(item.phone)
            })
        })
    </script>
@endsection
