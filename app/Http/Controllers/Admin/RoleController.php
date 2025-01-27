<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Role;

class RoleController extends Controller
{
    //
    public function index()
    {
        $roles = Role::all();
        return view('admin.admins.roles.index', compact('roles'));
    }

    public function edit($id) :View
    {
        $item = Role::find($id);
        return view('admin.admins.roles.edit', ['role' => $item]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:50',
            'roleNameAr' => 'required|string|max:72',
            'roleNameEn' => 'required|string|max:72',
            'brief' => 'nullable|string|max:255',
            'guard_name' => 'required|string'
        ]);

        $item = Role::findOrFail($id);
        $item->update($validated);

        return redirect()->back()->with('success', 'Updated successfully');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:50',
            'roleNameAr' => 'required|string|max:72',
            'roleNameEn' => 'required|string|max:72',
            'brief' => 'nullable|string|max:255',
            'guard_name' => 'required|string'
        ]);

        $validated['created_by']= auth()->user()->id;
        $validated['updated_by']= auth()->user()->id;
        

        try {
            Role::create($validated);
            return redirect()->back()->with('success', 'Created successfully');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }

}
