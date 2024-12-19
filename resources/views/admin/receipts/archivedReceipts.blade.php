@extends('admin.receipts.home')
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
                    @php $i++ @endphp
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $receipt->serial }}</td>
                        <td>{{ @$reference_type[$receipt->reference_type] }}</td>
                        <td>{{ $receipt->reception_date }}</td>
                        <td>{{ @$receipt->admin->userName }}</td>
                        <td>
                            <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="Restore Receipt"
                                onclick="if (!confirm('You are going to Restore this receipt, are you sure?'))return false"
                                href="{{ route('restore-input-receipt-info', $receipt->id) }}"><i
                                    class="fa fa-undo text-warning"></i></a>

                            <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="Q-Display Receipt" href=""><i
                                    class="fa fa-eye text-primary"></i></a>

                            <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="print Receipt" href=""><i
                                    class="fa fa-print text-secondary"></i></a>

                            <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="hard delete Receipt"
                                onclick="if (!confirm('You are going to delete this receipt, are you sure?'))return false"
                                href="{{ route('forceDelete-input-receipt-info', $receipt->id) }}"><i
                                    class="fa fa-trash-alt text-danger"></i></a>
                        </td>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection
