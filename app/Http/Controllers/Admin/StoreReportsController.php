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



    public function generatePDF()
    {
        
        $receipts = StoreReceipt::all();
        $data = [
            'receipts' => $receipts,
            
        ];
        $pdf = PDF::loadView('admin.stores.reports.receiptInput', $data);
        // return $pdf->stream('report.pdf');
         return $pdf->download('report.pdf');
    }


public function printReceipt($id){
  $receipt = StoreReceipt::find($id)->first();
  $vars = [
      'receipt' => $receipt,
      
  ];

    return view('admin.stores.reports.receiptInput' ,$vars);
}

public function printTemplate(){
    
  
      return view('admin.stores.reports.template');
  }
  

public function printReceiptCase(){
  $receipts = StoreReceipt::all();
  $vars = [
      'receipts' => $receipts,
      
  ];

    return view('admin.stores.reports.case' ,$vars);
}   

public function export() 
    {
        return Excel::download(new ReceiptExport, 'receipt-export.xlsx');
    }
}
  







