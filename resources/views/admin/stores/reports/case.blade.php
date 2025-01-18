<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> reports receipts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<style>
  /* Main Styles */
  body {
    background-color: #f8f9fa;
    font-family: Arial, sans-serif;
  }
  .invoice-card {
    background: white;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    max-width: 800px;
    margin: 0 auto;
  }

  /* Header Styles */
  .header-black {
    background: #222;
    color: white;
    padding: 2rem;
  }

  .logo {
    display: flex;
    align-items: center;
    gap: 1rem;
  }

  .x-symbol {
    font-size: 2rem;
    font-weight: bold;
  }

  .logo-text {
    display: flex;
    flex-direction: column;
  }

  .company-name {
    font-weight: bold;
    font-size: 1.2rem;
  }

  .company-tagline {
    font-size: 0.8rem;
  }

  .company-info {
    font-size: 0.8rem;
    opacity: 0.8;
  }

  /* Invoice Content */
  .invoice-content {
    padding: 2rem;
  }



  .client-name {
    font-weight: bold;
    margin-bottom: 0.5rem;
  }

  .table thead th {
    background: black;
    border-bottom: 2px solid #222;
    font-size: 0.8rem;
    font-weight: bold;
    padding: .3rem;
    color: white;

  }

  /* Signature Section */
  .signature-section {
    margin-top: 3rem;
    text-align: right;
  }

  .signature-img {
    max-width: 150px;
    margin-bottom: 0.5rem;
  }

  .signature-name {
    font-weight: bold;
    margin-bottom: 0.2rem;
  }

  .signature-title {
    font-size: 0.8rem;
    color: #666;
  }

  /* Notes Section */
  .notes-section {
    margin-top: 2rem;
  }

  .notes-section h6 {
    font-size: 0.8rem;
    font-weight: bold;
    margin-bottom: 0.5rem;
  }

  .notes-section p {
    font-size: 0.9rem;
    color: #666;
  }

  /* Thank You Section */
  .thank-you-section {
    margin-top: 3rem;
    text-align: center;
  }

  .striped-line {
    height: 20px;
    background: repeating-linear-gradient(45deg,
        #222,
        #222 10px,
        #333 10px,
        #333 20px);
    margin-bottom: 1rem;
  }

  .thank-you-text {
    font-weight: bold;
    margin-bottom: 0.5rem;
  }

  .website {
    font-size: 0.8rem;
    color: #666;
  }
</style>
<div class="container my-5">
  <div class="invoice-card">
    <!-- Header -->
    <div class="header-black">
      <div class="row align-items-center">
        <div class="col-6">
          <div class="logo ">
            <span class="x-symbol">✕</span>
            <div class="logo-text">
              <span class="company-name">GLOBEX</span>
              <span class="company-tagline">INNOVATION</span>
            
            </div>
            
          </div>
          <div class="logo-text">
              <span >Store Receipts Report</span>
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
      <div class="row mt-4 ">
        <div class="col-6">
          <div class="">
            <div ><span class="client-name"> Client:</span> EFGHJKLMN Company</div>
            <div ><span class="client-name"> PHONE: </span>+1 (555) 555 5557</div>
            <div><span class="client-name">  EMAIL:</span> john.smith@gmail.com</div>
          </div>
        </div>
        <div class="col-6 ">
          <div ><span class="client-name"> Project: </span>input</div>
          <div > <span class="client-name"> Attention:</span> Ahmed El Attar </div>
          <div ><span class="client-name">  Issued By:</span>input </div>
        </div>
      </div>

      <!-- Items Table -->
      <div class="items-table mt-4">
        <table class="table table-striped table-bordered ">
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
              <td> {{ $receipt->getTypeName($receipt->reference_type) }} </td>
              <td>{{ $receipt->reception_date }}</td>
              <td>
                @if ($receipt->direction === 1)
                <span class=" py-1">Input</span>
                @else
                <span class="  py-1 ">Output</span>
                @endif
              </td>
              <td> {{ $receipt->admin->userName }}</td>
              <td>
                @if($receipt->status === 1)
                <span class="  py-1 ">inprogress</span>
                @elseif($receipt->status === 2)
                <span class="py-1 ">approved</span>
                @elseif($receipt->status === 3)
                <span class="py-1 ">archived</span>
                @endif
              </td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>

      <!-- Signature -->
      <div class="signature-section">
        <div class="signature">
        <div class="signature-title">  Stores Manager</div>
          <div class="signature-name">Adam Smith</div>
          <div class="signature-name me-5">Sign</div>
        </div>
      </div>

      <!-- Notes -->
      <div class="notes-section">
        <h6>NOTES</h6>
        <p>Optimized on low hanging fruit, to identify a ballpark value added beta test. Devise web-enabled data through top-line DeepDive.</p>
      </div>

      <!-- Thank You -->
      <div class="thank-you-section">
        <div class="striped-line"></div>
        <div class="thank-you-text">All Rights Reserved (EYERPTeam) 2024-2030</div>
        <div class="website">www.eyerp.com</div>
      </div>

    </div>
  </div>
  <button id="printButton" class="btn btn-primary" 
          type="button"  
          aria-label="Print Report">
    <i class="fa fa-print"></i> 
    <span >Print</span> 
  </button>
    <a href="{{route('receipt-export')}}"id="printButton" class="btn btn-success" 
          type="button"  
          aria-label="Print Report">
    <i class="fa fa-print"></i> 
    <span >Excel</span> 
  </button>
</div>

<script>
  document.getElementById('printButton').addEventListener('click', () => {
  window.print();
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  

    </script>
</body>
</html>
    