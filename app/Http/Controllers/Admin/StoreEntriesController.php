<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\StoreEntry;
use App\Models\StoreReceipt;
use Exception;
use Illuminate\Http\Request;

class StoreEntriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function insert($id)
    {
        //
        $receipt = StoreReceipt::find($id);
        $vars = [
            'receipt' => $receipt,
        ];
        return view('admin.stores.movement.inputs.create', $vars);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function saveInsert(Request $request)
    {
        //
        $receipt = StoreReceipt::find($request->receipt_id);
        try {
            return [
                'item_id'         => $request->product,
                'store_id'        => $receipt->store_id,
                'receipt_id'      => $request->receipt_id,
                'ref_type_id'     => $receipt->reference_type,
                'unit_id'         => $request->unit,
                'inputs'          => $request->quantity,
                'outputs'         => 0,
                'notes'           => $request->notes,
                'status'          => 'active',
                'created_by'      => currentUserId(),
                'updated_by'      => currentUserId()
            ];
            $request->receipt_id;

            //StoreEntry::create();
            //return redirect()->back()->with('success', 'Store Entry');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['Insertion Error Happened: ' => $e->getMessage()]);
        }
    }

    /**
     * get all products where it has a barcode like the givin query text.
     */
    public function getProductsLike(Request $query)
    {
        return Item::where('name', 'LIKE', '%' . $query->search_text . '%')->get();
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
