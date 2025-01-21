<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reports Receipts</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
  /* Main Styles */
  body {
      background-color: #f8f9fa;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      min-height: 100vh;
  }
  
  .invoice-card {
      background: white;
      max-width: 1000px;
      margin: 0 auto;
      position: relative;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  }
  
  /* Header Styles */
  .header-black {
      background: #1a237e;
      color: white;
      padding: 2rem;
      height: 130px;
      display: flex;
      justify-content: space-between;
      align-items: center;
  }
  
  /* Logo and company info */
  .logo {
      display: flex;
      align-items: center;
      gap: 1.5rem;
  }
  
  .x-symbol {
      font-size: 2.5rem;
      font-weight: bold;
      color: #fff;
  }
  
  .logo-text {
      display: flex;
      flex-direction: column;
  }
  
  .company-name {
      font-weight: bold;
      font-size: 1.5rem;
      margin-bottom: 0.3rem;
  }
  
  .company-tagline {
      font-size: 0.9rem;
      opacity: 0.9;
  }
  
  .company-info {
      font-size: 0.9rem;
      opacity: 0.9;
      text-align: left;
  }
  
  /* Content area */
  .invoice-content {
      padding: 2.5rem;
      background: white;
      position: relative;
  }
  
  .client-info {
      margin-bottom: 2.5rem;
      padding: 1.5rem;
      background: #f8f9fa;
      border-radius: 8px;
  }
  
  .client-name {
      font-weight: bold;
      font-size: 1.2rem;
      margin-bottom: 1rem;
      color: #1a237e;
  }
  
  /* Table styles */
  .table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 2rem;
  }
  
  .table thead th {
      background: #1a237e;
      color: white;
      font-size: 0.9rem;
      font-weight: bold;
      padding: 1rem;
      text-align: right;
  }
  
  .table tbody td {
      padding: 1rem;
      border-bottom: 1px solid #e0e0e0;
  }
  
  .table tbody tr:hover {
      background-color: #f5f5f5;
  }
  
  /* Status styles */
  .status {
      padding: 0.5rem 1rem;
      border-radius: 4px;
      font-size: 0.9rem;
      font-weight: 500;
  }
  
  .approved {
      background: #e8f5e9;
      color: #2e7d32;
  }
  
  .inprogress {
      background: #fff3e0;
      color: #f57c00;
  }
  
  /* Footer section */
  .thank-you-section {
      text-align: center;
      background: white;
      padding: 2rem;
  }
  
  .striped-line {
      height: 15px;
      background: linear-gradient(45deg,
          #1a237e 25%,
          #283593 25%,
          #283593 50%,
          #1a237e 50%,
          #1a237e 75%,
          #283593 75%,
          #283593 100%
      );
      background-size: 20px 20px;
      margin-bottom: 1.5rem;
  }
  
  .thank-you-text {
      font-weight: bold;
      font-size: 1.2rem;
      margin: 1rem 0;
      color: #1a237e;
  }
  
  .website {
      font-size: 0.9rem;
      color: #666;
  }
  
  /* Print buttons */
  .print-buttons {
      margin: 2rem 0;
      text-align: center;
  }
  
  .print-buttons button,
  .print-buttons a {
      margin: 0 0.5rem;
      padding: 0.8rem 1.5rem;
      background: #1a237e;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      text-decoration: none;
      font-weight: 500;
      transition: background-color 0.3s;
  }
  
  .print-buttons button:hover,
  .print-buttons a:hover {
      background: #283593;
  }
  
  /* Print-specific styles */
  @media print {
      body {
          margin: 0;
          padding: 0;
          background: white;
      }
  
      .invoice-card {
          margin: 0;
          max-width: 100%;
          box-shadow: none;
      }
  
      /* Fixed header for all pages */
      .header-black {
          position: fixed;
          top: 0;
          left: 0;
          right: 0;
          z-index: 100;
          background-color: #1a237e !important;
          -webkit-print-color-adjust: exact;
          print-color-adjust: exact;
          margin: 0;
          padding: 2rem;
      }
  
      /* First page content */
      .invoice-content {
          padding-top: calc(130px + 2rem);
      }
  
      /* Table positioning */
      .table {
          width: 100%;
          page-break-inside: auto;
          margin-top: 30px; /* Match header height */
      }
  
      /* Table header appears on every page */
      thead {
          display: table-header-group;
      }
  
      /* Ensure rows don't break across pages */
      tr {
          page-break-inside: avoid;
      }
  
      /* Page margins */
      /* @page {
          size: A4;
          margin: 0;
      } */
  
      /* Footer positioning */
      .thank-you-section {
          position: fixed;
          bottom: 0;
          left: 0;
          right: 0;
          background: white !important;
          padding: 2rem;
          margin: 0;
          z-index: 100;
          -webkit-print-color-adjust: exact;
          print-color-adjust: exact;
      }
  
      .print-buttons {
          display: none !important;
      }
  
      /* Ensure colors print correctly */
      .table thead th {
          background-color: #1a237e !important;
          color: white !important;
          -webkit-print-color-adjust: exact;
          print-color-adjust: exact;
      }
  
      .striped-line {
          -webkit-print-color-adjust: exact;
          print-color-adjust: exact;
      }
  
      /* Client info spacing */
      .client-info {
          margin-top: 130px;
          margin-bottom: 2rem;
          page-break-inside: avoid;
      }
  
      /* Main content wrapper */
      .content-wrapper {
          margin-top: 130px;
          padding: 2rem;
      }
  
      /* Ensure table header stays below fixed header */
      .table thead th {
          background-color: #1a237e !important;
      }
  
      /* Add space for footer */
      .table {
          margin-bottom: 150px;
      }
  }
      </style>


</head>

<body>
  <div class="container my-5">
    <div class="invoice-card">
      <!-- Header -->
      <div class="header-black">
        <div class="row ">
          <div class="col-6">
            <div class="logo">
              <span class="x-symbol">✕</span>
              <div class="logo-text">
                <span class="company-name">GLOBEX</span>
                <span class="company-tagline">INNOVATION</span>
              </div>
            </div>
            <div class="logo-text">
              <span>Store Receipts Report</span>
            </div>
          </div>
          <div class="col-6 text-end company-info">
            <div>155 East Street, Winchester,</div>
            <div>NY 22051 | +1 (555) 555 7770</div>
            <div>globex@gmail.in</div>
          </div>
        </div>
      </div>

      <!-- Invoice Content -->
      <div class="invoice-content">
        <!-- Billing Info -->
        <div class="row client-info">
          <div class="col-6">
            <div><span class="client-name">Client:</span> EFGHJKLMN Company</div>
            <div><span class="client-name">PHONE:</span> +1 (555) 555 5557</div>
            <div><span class="client-name">EMAIL:</span> john.smith@gmail.com</div>
          </div>
          <div class="col-6">
            <div><span class="client-name">Project:</span> input</div>
            <div><span class="client-name">Attention:</span> Ahmed El Attar</div>
            <div><span class="client-name">Issued By:</span> input</div>
          </div>
        </div>

        <!-- Items Table -->
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Item</th>
              <th>Date</th>
              <th>Dir</th>
              <th>Representative</th>
              <th>Status</th>
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
        </table>

        <!-- Signature -->
        <div class="signature-section">
          <div class="signature-title">Stores Manager</div>
          <div class="signature-name">Adam Smith</div>
          <div class="signature-name me-5">Sign</div>
        </div>

        <!-- Notes -->
        <div class="notes-section">
          <h6>NOTES</h6>
          <p>Optimized on low hanging fruit, to identify a ballpark value added beta test. Devise web-enabled data through top-line DeepDive.</p>
        </div>
      </div>

      <!-- Thank You -->
      <div class="thank-you-section">
        <div class="striped-line"></div>
        <div class="thank-you-text">All Rights Reserved (EYERPTeam) 2024-2030</div>
        <div class="website">www.eyerp.com</div>
      </div>
    </div>

    <!-- Print Buttons -->
    <div class="print-buttons">
      <button id="printButton" class="btn btn-primary" type="button">
        <i class="fa fa-print"></i>
        <span>Print</span>
      </button>
      <a href="{{ route('receipt-export') }}" class="btn btn-success">
        <i class="fa fa-file-excel"></i>
        <span>Excel</span>
      </a>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById('printButton').addEventListener('click', () => {
      window.print();
    });
  </script>
</body>

</html>