<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Branch;
use App\Models\Store;
use Exception;
use Illuminate\Http\Request;

class storesController extends Controller
{
    //
    public function index()
    {
        $stores = Store::all();
        $branches = Branch::all();
        $vars = [
            'stores' => $stores,
            'branches' => $branches,
        ];
        return view('admin.stores.index', $vars);
    }


    public function home()
    {
        return view('admin.stores.home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Store::create([
                'name'          => $request->name,
                'address'       => $request->address,
                'brief'         => $request->brief,
                'code'          => $request->store_code,
                'store_id'      => $request->store_id,
                'branch_id'     => $request->branch_id,
                'ismovable'     => $request->ismovable,
                'status'        => $request->status !== null ? $request->status : 0,
                'created_by'    => currentUserId(),
                'updated_by'    => currentUserId(),

            ]);
            return redirect()->back()->withSuccess('Saves Successfully');
        } catch (Exception $err) {
            return redirect()->back()->withError('Failed to save, due to: ' . $err);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $stores = Store::all();
        $branches = Branch::all();
        $vars = [
            'store' => Store::find($id),
            'stores' => $stores,
            'branches' => $branches,
            'admins' => Admin::all()
        ];
        return view('admin.stores.edit', $vars);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $store = Store::find($request->id);

        try {

            $store->update([
                'store_id' => $request->parent_store,
                'name'      => $request->store_name,
                'code'      => $request->store_code,
                'brief'     => $request->store_brief,

                'updated_by'    => currentUserId()
            ]);

            return redirect()->back()->with('success', 'Branch updated successfully');
        } catch (Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Error updating branch because of: ' . $e->getMessage());
        }
    }

    public function update_com(Request $request)
    {
        // return $request;
        $store = Store::find($request->id);
        try {
            $store->update([
                'admin_id' => $request->admin,
                'email' => $request->email,
                'phone' => $request->mobile,
            ]);
            return redirect()->back()->with('success', 'Branch updated successfully');
        } catch (Exception $err) {
            return redirect()->back()->withInput()->withError('Failed Due to: ' . $err);
        }
    }

    public function destroy($id)
    {
        $store = Store::find($id);
        try {
            $store->delete();
            return redirect()->back()->with('success', 'Branch deleted successfully');
        } catch (Exception $err) {
            return redirect()->route('display-stores-list')->with('error', 'Error deleting branch because of: ' . $err->getMessage());
        }
    }
}
