<?php

namespace App\Exports;

use App\Models\StoreReceipt;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReceiptExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return StoreReceipt::all();
    }
}
