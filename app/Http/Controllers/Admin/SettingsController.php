<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DepartmentLevel;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    //

    public function index(){
        return view ('admin.settings.general.index');
    }

    public function showGeneralSettings(){
        $levels = DepartmentLevel::paginate(10);
        $hierarchyGroups = DepartmentLevel::$hierarchyGroups;
        return view ('admin.settings.general.department-levels.display', compact('levels', 'hierarchyGroups'));
    }
}
