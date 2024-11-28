<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use App\Models\ItemCategroy;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Unit;
use App\Models\User;


class ItemsController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function home()
  {
    //
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $items = Item::all();

    foreach ($items as $item) {
      $item->category = ItemCategroy::where('id', '=', $item->category)->first();
    }
    $categories = ItemCategroy::roots();
    $units = Unit::All();
    $vars = [
      'cats' => $categories,
      'units' => $units,
      'items' => $items,
    ];
    return view('admin.items.index', $vars);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  private static $path = 'assets/admin/uploads/images/product';
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    if ($request->hasFile('image')) {

      $filehandler = $request->image;
      $filename = time() . 'image_product.' . $filehandler->getClientOriginalExtension();
      $filehandler->move(self::$path, $filename);


      try {
        Item::create([
          'name'         => $request->name,
          'barcode'      => $request->barcode,
          'category'    => $request->category,
          'unit'         => $request->unit,
          'breif'        => $request->breif,
          'image'        => $filename,
          'created_by'   => auth()->user()->id
        ]);
        return redirect()->back()->withSuccess('Saves Successfully');
      } catch (QueryException $err) {
        return redirect()->back()->withError('Failed to save, due to: ' . $err);
      }
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function display($id)
  {
      $item = Item::with('category', 'unit', 'creator', 'editor')->find($id);
  
      if (!$item) {
          return view('admin.items.view', ['item' => null]);
      }
  
      return view('admin.items.view', compact('item'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
