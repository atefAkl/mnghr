@if ($receipts->isEmpty())
    <div id="results">
        <tr>
            <td colspan="8" class="text-center">No matching records found</td>
        </tr>
    </div>
@else
    @php
        $counter = 0;
    @endphp
    <div id="results">
        @foreach ($receipts as $receipt)
            <tr>
                <td>{{ ++$counter }}</td>
                <td><a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="Display Receipt"
                        href="#">{{ $receipt->serial }}</a></td>
                <td>{{ $receipt->getTypeName() }}</td>
                <td>{{ $receipt->reception_date }}</td>
                <td>
                    @if ($receipt->direction === 1)
                        <span class="badge bg-success">{{ $receipt_direction[$receipt->direction] }}</span>
                    @elseif($receipt->direction === 2)
                        <span class="badge bg-danger">{{ $receipt_direction[$receipt->direction] }}</span>
                    @endif
                </td>
                <td data-bs-toggle="tooltip" title="{{ 'Manager' }}" {{-- @$receipt->admin->profile->possition --}}>
                    {{ $receipt->admin->userName }}
                </td>
                <td>
                    @if ($receipt->status === 1)
                        <span class="badge bg-secondary"> {{ $receipt_status[$receipt->status] }}</span>
                    @elseif($receipt->status === 2)
                        <span class="badge bg-info"> {{ $receipt_status[$receipt->status] }}</span>
                    @elseif($receipt->status === 3)
                        <span class="badge bg-warning"> {{ $receipt_status[$receipt->status] }}</span>
                    @endif
                </td>
                <td>
                    @if ($receipt->status == 1)
                        <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="edit Receipt"
                            href="{{ route('edit-receipt-info', [$receipt->id]) }}"><i
                                class="fa fa-edit text-primary"></i></a>
                        <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="Approve Receipt"
                            href="{{ route('approve-receipt', [$receipt->id]) }}"><i
                                class="fa fa-check text-info"></i></a>
                        @php
                            $addEntry = $receipt->direction === 1 ? 'add-store-input-entry' : 'add-store-output-entry';
                        @endphp
                        <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="Add Entries"
                            href="{{ route($addEntry, [$receipt->id]) }}"><i
                                class="fa fa-square-plus text-success"></i></a>
                    @elseif($receipt->status == 2)
                        <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="Enable Receipt Entries "
                            href=""><i class="fa fa-ban text-primary"></i></a>
                        <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="archive Receipt"
                            onclick="if (!confirm('You are going to archive this receipt, are you sure?'))return false"
                            href="{{ route('archive-receipt', [$receipt->id]) }}"><i
                                class="fa fa-archive text-danger"></i></a>
                    @elseif($receipt->status == 3)
                        <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="Restore Receipt"
                            onclick="if (!confirm('You are going to Restore this receipt, are you sure?'))return false"
                            href="{{ route('restore-receipt-info', [$receipt->id]) }}"><i
                                class="fa fa-undo text-warning"></i></a>
                    @endif
                    <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="Q-Display Receipt" href=""><i
                            class="fa fa-file text-primary"></i></a>
                    <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="print Receipt" href=""><i
                            class="fa fa-print text-secondary"></i></a>
                    <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title=" delete Receipt"
                        onclick="if (!confirm('You are going to delete this receipt, are you sure?'))return false"
                        href="{{ route('forceDelete-receipt-info', [$receipt->id]) }}"><i
                            class="fa fa-trash-alt text-danger"></i></a>


                </td>
            </tr>
        @endforeach
    </div>
@endif

<div style="display: none" id="tempLinks">
    {{ $receipts->links() }}
</div>
{{-- Section for pagination --}}
{{-- define by id --}}
{{-- Hide this section --}}
