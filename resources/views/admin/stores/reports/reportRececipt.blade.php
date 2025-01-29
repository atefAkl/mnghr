@extends('layouts.reports.template1')
@section('contents')
<div class="container-fluid content-report">
              <table class="table table-striped  mt-1 ">
                <thead>
                  <tr>
                    <th class="header-color">#</th>
                    <th class="header-color">Item</th>
                    <th class="header-color">Date</th>
                    <th class="header-color">Dir</th>
                    <th class="header-color">Representative</th>
                    <th class="header-color">Status</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                  $counter = 0;
                  @endphp
                  @foreach ($receipts as $receipt)
                  <tr>
                    <td>{{ ++$counter }}</td>
                    <td>{{ $receipt->getTypeName($receipt->reference_type) }}</td>
                    <td>{{ $receipt->reception_date }}</td>
                    <td>
                      @if ($receipt->direction === 1)
                      <span class="py-1">Input</span>
                      @else
                      <span class="py-1">Output</span>
                      @endif
                    </td>
                    <td>{{ $receipt->admin->userName }}</td>
                    <td>
                      @if($receipt->status === 1)
                      <span class="py-1">inprogress</span>
                      @elseif($receipt->status === 2)
                      <span class="py-1">approved</span>
                      @elseif($receipt->status === 3)
                      <span class="py-1">archived</span>
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="4" class="fw-bold">Totals</td>
                    <td class="price">5400</td>
                    <td class="price">12854</td>
                  </tr>
                </tfoot>
              </table>
              <div class="row signature-section">
                <div class="col col-4">
                  <br><br>
                  <span class="signature"> Manager signature</span>

                  <br><br>
                </div>
                <div class="col col-4">
                  <br><br>
                  <span class="signature"> Representative signature</span>

                  <br><br>
                </div>
                <div class="col col-4">
                  <br><br>
                  <span class="signature"> Somebody signature</span>

                  <br><br>
                </div>
              </div>
            </div>

@endsection