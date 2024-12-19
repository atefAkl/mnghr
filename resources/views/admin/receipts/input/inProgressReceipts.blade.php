@extends('admin.receipts.input.home')
@section('table')
    <table class="table table-striped table-bordered mt-1">
        <thead>
            <tr>
                <th>#</th>
                <th>Serial Number</th>
                <th>Reference Type</th>
                <th>Date</th>
                <th>Representative</th>
                <th>Control</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 0 @endphp
            @if (count($receipts))
                @foreach ($receipts as $receipt)
                    @if ($receipt->status === 1)
                        @php $i++ @endphp
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $receipt->serial }}</td>
                            <td>{{ @$reference_type[$receipt->reference_type] }}</td>
                            <td>{{ $receipt->reception_date }}</td>
                            <td>{{ @$receipt->admin->userName }}</td>
                            <td>
                                <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="edit Receipt"
                                    href="{{ route('edit-receipt-info', [$receipt->id]) }}"><i
                                        class="fa fa-edit text-primary"></i></a>

                                <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="Approve Receipt"
                                    href=""><i class="fa fa-check text-success"></i></a>

                                <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="Q-Display Receipt"
                                    href=""><i class="fa fa-eye text-primary"></i></a>

                                <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="Add Entries"
                                    href="{{ route('add-store-input-entry', [$receipt->id]) }}"><i
                                        class="fa fa-square-plus text-success"></i></a>

                                <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="print Receipt"
                                    href=""><i class="fa fa-print text-secondary"></i></a>

                                <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="delete Receipt"
                                    onclick="if (!confirm('You are going to delete this receipt, are you sure?'))return false"
                                    href="{{ route('destroy-receipt-info', $receipt->id) }}"><i
                                        class="fa fa-trash-alt text-danger"></i></a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            @else
                <tr>
                    <td colspan="7">No Receipts has been added yet, Add your <a class="" data-bs-toggle="collapse"
                            data-bs-target="#addreceiptForm">first Receipt</a>.</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
