@extends('admin.receipts.input.home')
@section('input-content')
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
      @if($receipt->status === 2)
      @php $i++ @endphp
      <tr>
        <td>{{$i}}</td>
        <td>{{ $receipt->serial }}</td>
        <td>{{ @$reference_type[$receipt->reference_type] }}</td>
        <td>{{ $receipt->reception_date }}</td>
        <td>{{ @$receipt->admin->userName }}</td>
        <td>
        <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="edit Receipt"
            href="{{ route('edit-receipt-info', $receipt->id) }}"><i
              class="fa fa-edit text-primary"></i></a>

              <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="Enable Receipt Entries "
            href=""><i class="fa fa-ban text-primary"></i></a>

          <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="Q-Display Receipt"
            href=""><i class="fa fa-eye text-primary"></i></a>
            
            <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="print Receipt"
            href=""><i class="fa fa-print text-secondary"></i></a>
          
        </td>
      </tr>
      @endif
      @endforeach
      @else
      <tr>
        <td colspan="7">No Receipts has been added yet, Add your <a class=""
            data-bs-toggle="collapse" data-bs-target="#addreceiptForm">first Receipt</a>.</td>
      </tr>
      @endif
    </tbody>
  </table>
@endsection