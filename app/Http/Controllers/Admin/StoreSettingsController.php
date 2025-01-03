<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StoreSettingsController extends Controller
{
    //

    public function settings() : View 
    {
        return view('admin.stores.settings.home');
    }
}
