<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Department;
use App\Models\DepartmentLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        App::setLocale('ar');
        $departments = Department::all();
        $levels = DepartmentLevel::select('id', 'name', 'hierarchy_group')
            ->orderBy('hierarchy_group')
            ->get()
            ->groupBy('hierarchy_group');
        return view('admin.employees.settings.departments.index', compact('departments', 'levels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.employees.settings.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $validated = $request->validate([
            'name' => 'required',
            'name_en' => 'required',
            'parent_id' => 'required',
            'description' => 'required',
            'description_en' => 'required',
        ]);
        
        $validated['created_by'] = Admin::currentUser();
        $validated['updated_by'] = Admin::currentUser();
        try {
            Department::create($validated);
            return Redirect::back()->with('success', 'Department created successfully');
        } catch (\Exception $e) {
            return Redirect::back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $department = Department::findOrFail($id);
        $departments = Department::all();
        $levels = DepartmentLevel::select('id', 'name', 'hierarchy_group')
            ->orderBy('hierarchy_group')
            ->get()
            ->groupBy('hierarchy_group');
        return view('admin.employees.settings.departments.edit', compact('department', 'departments', 'levels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $department = Department::find($id);
        $validated = $request->validate([
            'name' => 'required',
            'name_en' => 'required',
            'parent_id' => 'required',
            'description' => 'required',
            'description_en' => 'required',
        ]);
        
        $validated['level_id'] = $request->level_id;
        $validated['updated_by'] = Admin::currentUser();
        $validated['status'] = $request->status ? true : false;
        
        try {
            $department->update($validated);
            //return $validated;
            return Redirect::back()->with('success', 'Department updated successfully');
        } catch (\Exception $e) {
            return Redirect::back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Department::destroy($id);
        return redirect()->route('departments.index');
    }
}
