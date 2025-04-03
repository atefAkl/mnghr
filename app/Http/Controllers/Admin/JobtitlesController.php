<?php

namespace App\Http\Controllers\Admin;

use App;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Department;
use App\Models\Jobtitle;
use Exception;
use Illuminate\Http\Request;

class JobtitlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $jobtitles = Jobtitle::all();
        $departments = Department::all();
        return view('admin.employees.settings.jobtitles.index', compact('jobtitles', 'departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'title.ar'              => 'required|between:3,100',
            'title.en'              => 'required|between:3,50',
            'description.ar'        => 'required|between:20,1024',
            'description.en'        => 'required|between:20,1024',
            'parent_id'             => 'nullable|exists:departments,id'
        ]);
        try {
            $validated['created_by'] = Admin::currentUser();
            $validated['updated_by'] = Admin::currentUser();
            $validated['status'] = 1;
            Jobtitle::create($validated);
            return redirect()->back()->with('success', 'Job title created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create job title: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $jobtitles = Jobtitle::all();
        $jobtitle = Jobtitle::find($id);
        $departments = Department::all();
        return view('admin.employees.settings.jobtitles.edit', compact('jobtitles', 'departments', 'jobtitle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        App::setLocale('ar');
        $jt = Jobtitle::find($request->id);
        $validated = $request->validate([
            'title.ar'          => 'required|between:3,100',
            'title.en'          => 'required|between:3,50',
            'description.ar'    => 'required|between:20,1024',
            'description.en'    => 'required|between:20,1024',
            'parent_id'         => 'nullable|exists:departments,id',
        ]);
        $validated['status'] = $request->status ? true:false;
        $validated['updated_by'] = Admin::currentUser();
        // return $validated;
        try {
            $jt->update($validated);
            return redirect()->back()->with(['success' => 'Jobtitle updated successfully']);
        } catch (Exception $err) {
            return redirect()->back()->with(['success' => 'Jobtitle updated successfully']);
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
