<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\StoreReceipt;

class StoreReportsController extends Controller
{
    //
    public function reports() : View 
    {
        return view('admin.stores.reports.home');
    }


    public function generatePDF()
    {
        
        $query = StoreReceipt::withTrashed()->orderBy('serial', 'desc');


        $receipts = $query->paginate(20);

        $data = [
            'receipts' => $receipts,
            
        ];
        $pdf = PDF::loadView('admin.stores.reports.receiptReport', $data);
        return $pdf->stream('report.pdf');
        // return $pdf->download('report.pdf');
    }
}


    

  







