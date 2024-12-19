<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReceiptRequest;
use App\Models\StoreReceipt;
use App\Models\Store;
use App\Models\Admin;
use Exception;

class StoreReceiptsController extends Controller
{

  private static $reference_type = [
    '1' => 'Purchases',
    '2' => 'Sales inverse',
    '3' => 'Purchases inverse',
    '4' => 'Transfer',
    '5' => 'Sales',
    '6' => 'Project supplies',
    '7' => 'Administration supplies',
    '8' => 'Credit transfer',
  ];
  private static $status = [
    '0' => 'Pending',
    '1' => 'Approved'
  ];
  private const INSERT_ENTRY = 1;
  private const OUTPUT_ENTRY = 2;

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $receipts = StoreReceipt::all();
    $stores   = Store::all();
    $admins   = Admin::all();
    $vars = [
      'reference_type'   => self::$reference_type,
      'direction_input'  => self::INSERT_ENTRY,
      'direction_output' => self::OUTPUT_ENTRY,
      'status'           => self::$status,
      'admins'           => $admins,
      'receipts'         => $receipts,
      'stores'           => $stores,

    ];
    return view('admin.receipts.index', $vars);
  }


  public function loadData($type)
  {

    $receipts = StoreReceipt::where('direction', $type)->get();
    $vars = [
      'reference_type'   => self::$reference_type,
      'status'           => self::$status,
      'receipts'         => $receipts,
    ];
    return view('admin.receipts.direction_type', $vars);
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
  public function store(StoreReceiptRequest $request)
  {

    try {
      StoreReceipt::create([
        'reception_date'          => $request->reception_date,
        'reference_type'          => $request->reference_type,
        'serial'                  => $request->serial,
        'brief'                   => $request->brief,
        'notes'                   => $request->notes,
        'status'                  => $request->status !== null ? $request->status : 0,
        'admin_id'                => $request->admin_id,
        'store_id'                => $request->store_id,
        'direction'               => $request->direction,
        'created_by'              => currentUserId(),

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
    $receipt = StoreReceipt::find($id);
    $stores   = Store::all();
    $admins   = Admin::all();
    $vars = [
      'reference_type'   => self::$reference_type,
      'status'           => self::$status,
      'admins'           => $admins,
      'receipt'          => $receipt,
      'stores'           => $stores,

    ];
    return view('admin.receipts.edit', $vars);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request)
  {
    $receipt = StoreReceipt::find($request->id);

    //return $request->product_serial;
    try {
        $receipt->update([
        'reception_date'            => $request->reception_date,
        'reference_type'          => $request->reference_type,
        'serial'                  => $request->serial,
        'brief'                   => $request->brief,
        'notes'                   => $request->notes,
        'admin_id'                => $request->admin_id,
        'store_id'                => $request->store_id,
        'status'                  => $request->status,
        'updated_by'              => currentUserId(),

      ]);
      return redirect()->back()->with('success', 'Receipt updated successfully');
    } catch (Exception $e) {
      return redirect()->back()->with('error', 'Error updating because of: ' . $e->getMessage());
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy( $id)
  {
    $receipt = StoreReceipt::find($id);
    if (!$receipt) {
      return redirect()->back()->withError('The receipt is not exist, may be deleted or you have insuffecient privilleges to delete it.');
    }
    try {
      $receipt->delete();
      return redirect()->route('display-receipts-list')->with(['success' => 'receipt Removed Successfully']);
    } catch (Exception $err) {

      return redirect()->back()->with(['error' => 'receipt can not be Removed due to: ' . $err]);
    }
  }
}