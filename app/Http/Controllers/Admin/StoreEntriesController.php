<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\StoreEntry;
use App\Models\StoreReceipt;
use App\Models\Unit;
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
    public function createInsert($id)
    {
        //
        $receipt = StoreReceipt::find($id);
        $units = Unit::all();
        $vars = [
            'receipt' => $receipt,
            'units' => $units,
        ];
        return view('admin.stores.entries.inputs.create', $vars);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeInsert(Request $request)
    {
        //
        $receipt = StoreReceipt::find($request->receipt_id);
        try {
            $entry = StoreEntry::create([
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
            ]);

            if ($entry) {
                return redirect()->back()->with('success', 'Store Entry saved successfully.');
            }
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['Insertion Error Happened: ' => $e->getMessage()]);
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function updateInsert(Request $request)
    {
        //
        $entry = StoreEntry::find($request->entry_id);
        try {
            $entry->update([

                'inputs'          => $request->quantity,
                'notes'           => $request->notes,
                'updated_by'      => currentUserId()
            ]);


            return redirect()->back()->with('success', 'Store Entry Updated successfully.');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['Update Error Happened: ' => $e->getMessage()]);
        }
    }

    /**
     * get all products where it has a barcode like the givin query text.
     */
    public function getProductsLike(Request $query)
    {
        return Item::where('name', 'LIKE', '%' . $query->nameSearch . '%')->orWhere('barcode', 'LIKE', '%' . $query->barcodeSearch . '%')->get();
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
    public function update(Request $request)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // get the entry
        $entry = StoreEntry::find($id);
        try {
            if (!$entry) {
                return redirect()->back()->withError('The entry is not exist, may be deleted or you have insuffecient privilleges to delete it.');
            }
            $entry->delete();
            return redirect()->back()->with(['success' => 'Entry Removed Successfully']);
        } catch (Exception $err) {
            return redirect()->back()->with(['error' => 'Entry can not be Removed due to: ' . $err]);
        }

    }
}
