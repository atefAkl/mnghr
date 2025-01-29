<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\StoreReceipt;
use App\Models\Item;
use App\Models\StoreEntry;
use App\Exports\ReceiptExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Unit;

class StoreReportsController extends Controller
{
    //
    public function reports() : View 
    {
        return view('admin.stores.reports.home');
    }

  public function reportRececipt() : View    {
    $receipts = StoreReceipt::all();
    $vars = [
        'receipts' => $receipts,
        
    ];
  
      return view('admin.stores.reports.reportRececipt' ,$vars);
  }



public function export() 
    {
        return Excel::download(new ReceiptExport, 'receipt-export.xlsx');
    }
}
  







