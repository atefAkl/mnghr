@extends('layouts.adminReport')
@section('contents')
  <table>
    <thead>
      <tr>
        <td>
          <div class="header-report ">
            <div class="d-flex  align-items-center justify-content-between ">
              <div class="logo">

                <img src="{{ asset('assets/admin/uploads/images/logo_reports.png')}}" alt="logo_report" />
                <div class="logo-text">
                  <span class="company-name">company</span>
                  <span class="company-slogan">company slogan</span>
                </div>
              </div>
              <div class="type-Reports text-center">
                Reports
              </div>
              <div class="company-info text-algin-right">
                <div>155 East Street, Winchester,</div>
                <div>NY 220|+1 (555)5557770</div>
                <div>globex@gmail.in</div>
              </div>

            </div>
          </div>
        </td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <div class="client-info p-3 text-center d-flex align-items-center">
            <div class="row ">
              <div class="col col-6">
                <div class="row">
                  <div class="col col-3 fw-bold">Client:</div>
                  <div class="col col-9 text-start">Ahmed El Attar</div>
                  <div class="col col-3 fw-bold">Phone: </div>
                  <div class="col col-9 text-start"> +1 (555) 555 5557</div>
                  <div class="col col-3 fw-bold">Email: </div>
                  <div class="col col-9 text-start">atef@gmail.com</div>
                </div>
              </div>
              <div class="col col-6">
                <div class="row">
                  <div class="col col-4 text-end fw-bold">Project: </div>
                  <div class="col col-8 text-start">input</div>
                  <div class="col col-4 text-end fw-bold">Attention: </div>
                  <div class="col col-8  text-start">input</div>
                  <div class="col col-4 text-end fw-bold">Issued By: </div>
                  <div class="col col-8  text-start">Ahmed El Attar</div>
                </div>
              </div>
            </div>
          </div>

          <table class="table table-striped p-3 mt-1">
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
                <td colspan="4">Totals</td>
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
        </td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <td>
          <div class="footer-section mt-5 ">
            <div class="footer-text">All Rights Reserved (EYERPTeam) 2024-2030</div>
            <div class="footer-info">www.eyerp.com</div>
          </div>
        </td>
      </tr>
    </tfoot>
  </table>

  @endsection
