<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StoreReportsController extends Controller
{
    //
    public function reports() : View 
    {
        return view('admin.stores.reports.home');
    }
}
