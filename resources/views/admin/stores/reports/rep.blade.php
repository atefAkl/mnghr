<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<style>
  /* Main Styles */
body {
    background-color: #f0f2f5;
    font-family: 'Segoe UI', Arial, sans-serif;
}

.invoice-card {
    background: white;
    padding: 3rem;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    position: relative;
    overflow: hidden;
}

/* Header Styles */
.invoice-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #333;
    margin: 0;
}

.company-logo {
    max-height: 50px;
}

/* Billing Info Styles */
.billing-section {
    margin-bottom: 2rem;
}

.company-details {
    color: #666;
    line-height: 1.6;
}

.invoice-details .detail-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 0.5rem;
    padding: 0.5rem;
    background-color: #f8f9fa;
}

.invoice-details .label {
    color: #666;
    font-weight: 500;
}

.invoice-details .value {
    color: #333;
    font-weight: 600;
}

/* Table Styles */
.table {
    margin-top: 2rem;
}

.table thead {
    background-color: #0099cc;
    color: white;
}

.table thead th {
    padding: 1rem;
    font-weight: 500;
}

.table tbody tr:nth-child(even) {
    background-color: #f8f9fa;
}

.table td {
    padding: 1rem;
    vertical-align: middle;
}

/* Totals Section */
.total-section {
    background-color: #f8f9fa;
    padding: 1.5rem;
    border-radius: 8px;
}

.total-section .detail-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 0.5rem;
}

.total-section .total {
    font-size: 1.2rem;
    font-weight: 700;
    color: #0099cc;
    border-top: 2px solid #dee2e6;
    padding-top: 0.5rem;
    margin-top: 0.5rem;
}

/* Terms Section */
.terms {
    margin-top: 3rem;
    color: #666;
}

.terms h5 {
    color: #333;
    margin-bottom: 1rem;
}

/* Signature */
.signature {
    text-align: center;
    margin-top: 2rem;
}

.signature-img {
    max-width: 150px;
    margin-bottom: 0.5rem;
}

.signature-name {
    font-weight: 600;
    color: #333;
}

.signature-title {
    color: #666;
    font-size: 0.9rem;
}

/* Footer Note */
.footer-note {
    margin-top: 2rem;
    padding-top: 1rem;
    border-top: 1px solid #dee2e6;
    color: #666;
    font-size: 0.9rem;
}

/* Print Styles */
@media print {
    body {
        background: white;
    }
    
    .invoice-card {
        box-shadow: none;
    }
    
    .btn {
        display: none;
    }
}

/* Responsive Styles */
@media (max-width: 768px) {
    .invoice-card {
        padding: 1.5rem;
    }
    
    .invoice-title {
        font-size: 2rem;
    }
    
    .table thead {
        font-size: 0.9rem;
    }
    
    .table td {
        font-size: 0.9rem;
    }
}
</style>
<body>
    <div class="container my-5">
        <div class="invoice-card">
            <!-- Header -->
            <div class="invoice-header">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1 class="invoice-title">INVOICE</h1>
                    </div>
                    <div class="col-md-6 text-end">
                        <img src="https://via.placeholder.com/150x50" alt="Fusion LLC" class="company-logo">
                    </div>
                </div>
            </div>

            <!-- Billing Info -->
            <div class="billing-info mt-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="billing-section">
                            <h5>Invoice to:</h5>
                            <div class="company-details">
                                <strong>BENTONE INC. LTD</strong><br>
                                Street Address Text Goes Here<br>
                                Mobile: +00 0000 000<br>
                                Email: yourmail@gmail.com<br>
                                Website: www.website.com
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="invoice-details">
                            <div class="detail-row">
                                <span class="label">Date:</span>
                                <span class="value" id="currentDate"></span>
                            </div>
                            <div class="detail-row">
                                <span class="label">Invoice No:</span>
                                <span class="value">DSLX-105404</span>
                            </div>
                            <div class="detail-row">
                                <span class="label">Account No:</span>
                                <span class="value">7905-6400-2000</span>
                            </div>
                            <div class="detail-row">
                                <span class="label">Due Amount:</span>
                                <span class="value">$2830.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Items Table -->
            <div class="items-table mt-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Item Description</th>
                            <th>Unit Price</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody id="itemsTableBody">
                        <!-- Items will be added dynamically -->
                    </tbody>
                </table>
                <button class="btn btn-primary" onclick="addNewRow()">Add New Item</button>
            </div>

            <!-- Totals -->
            <div class="totals mt-4">
                <div class="row justify-content-end">
                    <div class="col-md-5">
                        <div class="total-section">
                            <div class="detail-row">
                                <span>Subtotal:</span>
                                <span id="subtotal">$0.00</span>
                            </div>
                            <div class="detail-row">
                                <span>VAT/Tax 13%:</span>
                                <span id="tax">$0.00</span>
                            </div>
                            <div class="detail-row">
                                <span>Discount:</span>
                                <span id="discount">$0.00</span>
                            </div>
                            <div class="detail-row total">
                                <span>Total Due:</span>
                                <span id="total">$0.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Terms -->
            <div class="terms mt-4">
                <h5>Terms & Conditions:</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                
                <h5 class="mt-3">Payment Terms:</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore.</p>
                
                <div class="signature mt-4">
                    <img src="https://via.placeholder.com/150x50" alt="Signature" class="signature-img">
                    <div class="signature-name">Johnson Michael</div>
                    <div class="signature-title">Accountant</div>
                </div>
            </div>

            <!-- Footer Note -->
            <div class="footer-note mt-4">
                <p>NOTE for this Invoice: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
        </div>

        <!-- Print Button -->
        <div class="text-center mt-4">
            <button class="btn btn-success btn-lg" onclick="printInvoice()">Print Invoice</button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
    <script>
      // Initialize date
document.addEventListener('DOMContentLoaded', function() {
    const today = new Date();
    document.getElementById('currentDate').textContent = today.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
    addNewRow(); // Add first row automatically
});

let rowCounter = 1;

// Add new row to items table
function addNewRow() {
    const tbody = document.getElementById('itemsTableBody');
    const tr = document.createElement('tr');
    tr.innerHTML = `
        <td><input type="text" class="form-control" onchange="calculateTotal()"></td>
        <td><input type="number" class="form-control price" onchange="calculateTotal()"></td>
        <td><input type="number" class="form-control quantity" onchange="calculateTotal()"></td>
        <td class="row-total">$0.00</td>
    `;
    tbody.appendChild(tr);
    rowCounter++;
}

// Calculate totals
function calculateTotal() {
    let subtotal = 0;
    const rows = document.getElementById('itemsTableBody').getElementsByTagName('tr');
    
    for (let row of rows) {
        const price = parseFloat(row.querySelector('.price').value) || 0;
        const quantity = parseFloat(row.querySelector('.quantity').value) || 0;
        const rowTotal = price * quantity;
        row.querySelector('.row-total').textContent = '$' + rowTotal.toFixed(2);
        subtotal += rowTotal;
    }

    const tax = subtotal * 0.13; // 13% VAT
    const discount = subtotal * 0.05; // 5% discount
    const total = subtotal + tax - discount;

    document.getElementById('subtotal').textContent = '$' + subtotal.toFixed(2);
    document.getElementById('tax').textContent = '$' + tax.toFixed(2);
    document.getElementById('discount').textContent = '$' + discount.toFixed(2);
    document.getElementById('total').textContent = '$' + total.toFixed(2);
}

// Print invoice
function printInvoice() {
    window.print();
}
    </script>
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Globex Invoice</title>
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

.invoice-to h6 {
    font-size: 0.8rem;
    font-weight: bold;
    margin-bottom: 1rem;
}

.client-name {
    font-weight: bold;
    margin-bottom: 0.5rem;
}

.client-details {
    font-size: 0.9rem;
    color: #666;
}

.invoice-title {
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 0.5rem;
}

.invoice-number, .invoice-date {
    font-size: 0.9rem;
    color: #666;
}

/* Table Styles */
.table {
    margin-top: 2rem;
    border-color: #ddd;
}

.table thead th {
    background: white;
    border-bottom: 2px solid #222;
    font-size: 0.8rem;
    font-weight: bold;
    padding: 1rem;
}

.table td {
    padding: 1rem;
    font-size: 0.9rem;
    border-bottom: 1px solid #ddd;
}

/* Payment Info */
.payment-info {
    margin-top: 2rem;
    font-size: 0.9rem;
}

.payment-info h6 {
    font-size: 0.8rem;
    font-weight: bold;
    margin-bottom: 1rem;
}

.totals {
    text-align: right;
}

.total-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 0.5rem;
    padding: 0.5rem 0;
    border-bottom: 1px solid #ddd;
}

.grand-total {
    font-weight: bold;
    border-bottom: 2px solid #222;
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
    background: repeating-linear-gradient(
        45deg,
        #222,
        #222 10px,
        #333 10px,
        #333 20px
    );
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
<body>
    <div class="container my-5">
        <div class="invoice-card">
            <!-- Header -->
            <div class="header-black">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="logo">
                            <span class="x-symbol">✕</span>
                            <div class="logo-text">
                                <span class="company-name">GLOBEX</span>
                                <span class="company-tagline">INNOVATION</span>
                            </div>
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
                <div class="row mt-4">
                    <div class="col-6">
                        <div class="invoice-to">
                            <h6>INVOICE TO</h6>
                            <div class="client-name">JOHN SMITH</div>
                            <div class="client-details">
                                <div>PHONE: +1 (555) 555 5557</div>
                                <div>EMAIL: john.smith@gmail.com</div>
                                <div>ADDRESS: 123 East Street, Richmond NY 23261</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 text-end">
                        <h2 class="invoice-title">INVOICE</h2>
                        <div class="invoice-number">INVOICE NO: 123456</div>
                        <div class="invoice-date">Due Date: 01-Jan-2021</div>
                    </div>
                </div>

                <!-- Items Table -->
                <div class="items-table mt-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>DESCRIPTION</th>
                                <th>PRICE</th>
                                <th>QUANTITY</th>
                                <th>TOTAL</th>
                            </tr>
                        </thead>
                        <tbody id="itemsTableBody">
                            <tr>
                                <td>Web Designs</td>
                                <td>$ 100</td>
                                <td>03</td>
                                <td>$ 300</td>
                            </tr>
                            <tr>
                                <td>Logo Designs</td>
                                <td>$ 100</td>
                                <td>05</td>
                                <td>$ 500</td>
                            </tr>
                            <tr>
                                <td>Flyer Designs</td>
                                <td>$ 100</td>
                                <td>04</td>
                                <td>$ 400</td>
                            </tr>
                            <tr>
                                <td>Graphic Designs</td>
                                <td>$ 100</td>
                                <td>03</td>
                                <td>$ 300</td>
                            </tr>
                            <tr>
                                <td>Stationary Designs</td>
                                <td>$ 100</td>
                                <td>05</td>
                                <td>$ 500</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Payment Info -->
                <div class="payment-info">
                    <div class="row">
                        <div class="col-6">
                            <h6>PAYMENT METHOD</h6>
                            <div>Bank Name</div>
                            <div>A/C No: 000000000</div>
                            <div class="mt-2">Card Payment: Visa, Master Card</div>
                        </div>
                        <div class="col-6">
                            <div class="totals">
                                <div class="total-row">
                                    <span>SUB TOTAL</span>
                                    <span>$ 2000</span>
                                </div>
                                <div class="total-row">
                                    <span>TAX10%</span>
                                    <span>$ 200</span>
                                </div>
                                <div class="total-row grand-total">
                                    <span>GRAND TOTAL</span>
                                    <span>$ 2200</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Signature -->
                <div class="signature-section">
                    <div class="signature">
                        <img src="https://via.placeholder.com/150x50" alt="Signature" class="signature-img">
                        <div class="signature-name">Adam Smith</div>
                        <div class="signature-title">Account Manager</div>
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
                    <div class="thank-you-text">THANK YOU FOR YOUR BUSINESS</div>
                    <div class="website">www.globex.com</div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      // Initialize date
document.addEventListener('DOMContentLoaded', function() {
    const today = new Date();
    document.getElementById('currentDate').textContent = today.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
    addNewRow(); // Add first row automatically
});

let rowCounter = 1;

// Add new row to items table
function addNewRow() {
    const tbody = document.getElementById('itemsTableBody');
    const tr = document.createElement('tr');
    tr.innerHTML = `
        <td><input type="text" class="form-control" onchange="calculateTotal()"></td>
        <td><input type="number" class="form-control price" onchange="calculateTotal()"></td>
        <td><input type="number" class="form-control quantity" onchange="calculateTotal()"></td>
        <td class="row-total">$0.00</td>
    `;
    tbody.appendChild(tr);
    rowCounter++;
}

// Calculate totals
function calculateTotal() {
    let subtotal = 0;
    const rows = document.getElementById('itemsTableBody').getElementsByTagName('tr');
    
    for (let row of rows) {
        const price = parseFloat(row.querySelector('.price').value) || 0;
        const quantity = parseFloat(row.querySelector('.quantity').value) || 0;
        const rowTotal = price * quantity;
        row.querySelector('.row-total').textContent = '$' + rowTotal.toFixed(2);
        subtotal += rowTotal;
    }

    const tax = subtotal * 0.13; // 13% VAT
    const discount = subtotal * 0.05; // 5% discount
    const total = subtotal + tax - discount;

    document.getElementById('subtotal').textContent = '$' + subtotal.toFixed(2);
    document.getElementById('tax').textContent = '$' + tax.toFixed(2);
    document.getElementById('discount').textContent = '$' + discount.toFixed(2);
    document.getElementById('total').textContent = '$' + total.toFixed(2);
}

// Print invoice
function printInvoice() {
    window.print();
}
    </script>
</body>
</html>