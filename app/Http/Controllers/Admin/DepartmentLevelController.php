<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Department;
use App\Models\DepartmentLevel;
use Exception;
use Illuminate\Http\Request;
use Redirect;

class DepartmentLevelController extends Controller
{
    //

    public function index () {
        $levels = DepartmentLevel::paginate(10);
        $hierarchyGroups = DepartmentLevel::$hierarchyGroups;
        return view ('admin.employees.settings.departments.levels.index', compact('levels', 'hierarchyGroups'));
    }

    public function store (Request $request) {
       

        $validated = $request->validate([
            'key'               => 'required|string|unique:department_levels',
            'name.en'           => 'required|string',
            'name.ar'           => 'required|string',
            'hierarchy_group'   => 'required|in:leadership,management,operations,support,teams',
            'order'             => 'nullable|integer'
        ]);
        
        $validated['created_by'] = Admin::currentUser();
        $validated['updated_by'] = Admin::currentUser();
        try {
            DepartmentLevel::create($validated);
            return Redirect::back()->with('success', 'Department level created successfully');
        } catch (\Exception $e) {
            return Redirect::back()->with('error', $e->getMessage());
        }
    }

    public function edit ($id) {
        $level = DepartmentLevel::findOrFail($id);
        $hierarchyGroups = DepartmentLevel::$hierarchyGroups;
        return view('admin.employees.settings.departments.levels.edit', compact('level', 'hierarchyGroups'));
    }

    // Store new level
   // DepartmentLevelController.php


    public function update(Request $request)
    {
        $level = DepartmentLevel::find($request->id);

        $validated = $request->validate([
            'key' => 'required|string|unique:department_levels,key,'.$level->id,
            'name.en' => 'required|string',
            'name.ar' => 'required|string',
            'hierarchy_group' => 'required|in:executive,management,middle_management,teams',
            'order' => 'nullable|integer'
        ]);
        try {
            $level->update($validated);
            return redirect()->back()
            ->with('success', __('Department level updated successfully'));
        } catch(Exception $err) {
            return redirect()->back()
            ->with('error', __('Department level update failed: '.$err->getMessage()));
        }
    }

    public function destroy ($id) {
        $level = DepartmentLevel::find($id);
        try {
            $level->delete();
           return Redirect::back()->with('success', 'Level Deleted Successfully');
        } catch(Exception $e) {
           return Redirect::back()->with('error', 'Level Deletion Failure: '.$e->getMessage());
        }
    }

}
