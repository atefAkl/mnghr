<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ItemRequest;
use App\Models\StoreReceipt;
use App\Models\Store;
use App\Models\Admin;

class StoreReceiptsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $reference_type=[
          '1'=> 'Purchases',  '2'=> 'Sales inverse',  '3'=> 'Purchases inverse',
          '4'=> 'Transfer','5'=> 'Sales','6'=> 'Project supplies','7'=> 'Administration supplies',
          '8'=> 'Credit transfer',
       ];
      $receipts = StoreReceipt::all();
      $stores   = Store::all();
      $admins   = Admin::all();
      $vars = [
        'reference_type' =>$reference_type,
        'admins'         =>$admins,
        'receipts'       => $receipts,
        'stores'         => $stores,
        
      ];
      return view('admin.receipts.index', $vars);
    
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

      try {
        StoreReceipt::create([
            'reception_date'          => $request->reception_date,
            'reference_type'          => $request->reference_type,
            'serial'                  => $request->serial,
            'brief'                   => $request->brief,
            'notes'                   => $request->notes,
            'admin_id'                => $request->admin_id,
            'store_id'                => $request->store_id,
            'direction'               => $request->direction,
            'created_by'              => currentUserId(),
            'updated_by'              => currentUserId(),

        ]);
        return redirect()->back()->withSuccess('Saves Successfully');
    } catch (Exception $err) {
        return redirect()->back()->withError('Failed to save, due to: ' . $err);
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
