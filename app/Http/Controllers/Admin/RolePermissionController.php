<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
    public function indexRoles()
    {
        $roles = Role::all();
        return view('admin.admins.roles.index', compact('roles'));
    }

    public function indexPermissions()
    {
        $permissions = Permission::all();
        return view('admin.admins.permissions.index', compact('permissions'));
    }

    public function createRole()
    {
        return view('admin.admins.roles.create');
    }

    public function createPermission()
    {
        return view('admin.admins.permissions.create');
    }

    public function storeRole(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Role::create(['name' => $request->name]);

        return redirect()->route('roles.index')->with('success', 'Created successfully');
    }

    public function storePermission(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Permission::create(['name' => $request->name]);

        return redirect()->route('permissions.index')->with('success', 'Created successfully');
    }

    public function editRole($id) :View
    {
        $item = Role::find($id);
        return view('admin.admins.roles.edit', ['item' => $item]);
    }

    public function editPermission($id) :View
    {
        $item = Permission::find($id);
        return view('admin.admins.permissions.edit', ['item' => $item]);
    }

    public function updateRole(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $item = Role::findOrFail($id);
        $item->update(['name' => $request->name]);

        return redirect()->route('roles.index')->with('success', 'Updated successfully');
    }

    public function updatePermission(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $item = Permission::findOrFail($id);
        $item->update(['name' => $request->name]);

        return redirect()->route('permissions.index')->with('success', 'Updated successfully');
    }

    public function destroyRole($id)
    {
        $item = Role::findOrFail($id);
        $item->delete();

        return redirect()->route('roles.index')->with('success', 'Deleted successfully');
    }

    public function destroyPermission($id)
    {
        $item = Permission::findOrFail($id);
        $item->delete();

        return redirect()->route('permissions.index')->with('success', 'Deleted successfully');
    }
}
