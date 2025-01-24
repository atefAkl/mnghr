<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {

        return view('admin.settings.general.index');
    }
    public function log()
    {

        return view('admin.settings.general.index');
    }
}
