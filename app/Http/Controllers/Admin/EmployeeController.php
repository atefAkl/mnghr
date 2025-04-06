<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Country;
use App\Models\Department;
use App\Models\DepartmentLevel;
use App\Models\Employee;
use App\Models\EmpUUID;
use App\Models\Jobtitle;
use App\Models\LegalInfo;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $employees = Employee::all();
        $countries = Country::all();
        $departments = Department::all();
        $hierarchyGroups = DepartmentLevel::select('id', 'name', 'hierarchy_group')
        ->orderBy('hierarchy_group')
        ->get()
        ->groupBy('hierarchy_group');
        $jobtitles = Jobtitle::all();
        
        $uuid = EmpUUID::generate('HR'.date('y'));
        return view(
            'admin.employees.index', 
            compact(
                'employees', 'countries', 'departments', 
                'hierarchyGroups', 'jobtitles', 'uuid'
                )
            );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $countries = Country::all();
        $departments = [];
        return view ('admin.employees.create', compact('countries', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name.ar'           => 'required|between:4,150',
            'name.en'           => 'required|between:4,50',
            'natid_number'      => 'required|max:20',
            'natid_type'        => 'required|in:citizen,resident,visitor,tourist,passport',
            'joined_at'         => 'required|date',
            'department_id'     => 'required|exists:departments,id',
            'job_title'         => 'required|exists:jobtitles,id',
            'group_id'          => 'required|exists:department_levels,id',
            'uuid'              => 'required|min:13',
        ]);
        $validated['created_by'] = Admin::currentUser();
        $validated['updated_by'] = Admin::currentUser();
        $validated['status'] = 1;
        try {
            $employee = Employee::create($validated);
            return redirect()->back()->withSuccess('Employee has been added successfully.');
        } catch (Exception $err) {
            return redirect()->back()->withError('Error creating employee: '.$err->getMessage());
        }
    }

    /**
     * Display the specified Employee.
     */
    public function show(string $id)
    {
        //
        $employee = Employee::find($id);
        if (!$employee) {
            return redirect()->back()->with('error', 'Employee not found');
        }
        return view('admin.employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $employee = Employee::find($id);
        if (!$employee) {
            return redirect()->back()->with('error', 'Employee not found');
        }
        
        $countries = Country::all();
        $departments = Department::all();
        $hierarchyGroups = DepartmentLevel::select('id', 'name', 'hierarchy_group')
        ->orderBy('hierarchy_group')
        ->get()
        ->groupBy('hierarchy_group');
        $jobtitles = Jobtitle::all();
        return view ('admin.employees.edit', compact('employee', 'countries', 'departments', 'hierarchyGroups', 'jobtitles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $employee = Employee::find($request->id);
        if (!$employee) {
            return redirect()->back()->with('error', 'Employee not found');
        }
        $validated = $request->validate([
            'name.ar'           => 'required|between:4,150',
            'name.en'           => 'required|between:4,50',
            'natid_number'      => 'required|max:20',
            'natid_type'        => 'required|in:citizen,resident,visitor,tourist,passport',
            'joined_at'         => 'required|date',
            'department_id'     => 'required|exists:departments,id',
            'job_title'         => 'required|exists:jobtitles,id',
            'group_id'          => 'required|exists:department_levels,id',
            'uuid'              => 'required|min:13',
        ]);
        

        try {
            $employee->update($validated);
            return redirect()->back()->withSuccess('Employee has been updated successfully.');
        } catch (Exception $err) {
            return redirect()->back()->withError('Error updating employee: '.$err->getMessage());
        }
    }

    // upload profile picture
    public function uploadProfilePicture(Request $request)
    {
        $employee = Employee::find($request->id);
        if (!$employee) return employeeNotFound(['error' => 'Employee not found']);
        
        $request->validate([
            'profile_picture' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/employees/'.$employee->id), $imageName);
            $profile_picture = 'uploads/employees/'.$employee->id.'/' . $imageName;
        }

        try {
            $l_info = LegalInfo::where('employee_id', $employee->id)->first();
            if(!$l_info) {
                $l_info = LegalInfo::create([
                    'employee_id' => $employee->id
                ]);
            }
            $l_info->update([
                'profile_picture' => $profile_picture
            ]);
            return redirect()->back()->withSuccess('Profile picture has been uploaded successfully.');
        } catch (Exception $err) {
            return redirect()->back()->withError('Error uploading profile picture: '.$err->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
