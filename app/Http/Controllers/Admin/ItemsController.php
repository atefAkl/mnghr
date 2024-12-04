<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use App\Models\ItemCategroy;
use Illuminate\Http\Request;
use App\Http\Requests\ItemRequest;
use App\Models\Item;
use App\Models\Unit;
use App\Models\User;
use Exception;


class ItemsController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    $products = Item::all();
    $vars = [

      'products' => $products
    ];
    return view('admin.items.index', $vars);
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function home()
  {
    $products = Item::all();

    $categories = ItemCategroy::roots();
    $units = Unit::All();
    $vars = [
      'centrals' => ItemCategroy::centralCats(),
      'cats' => $categories,
      'units' => $units,
      'products' => $products
    ];
    return view('admin.items.home', $vars);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    // All changes has been
  }

  private static $path = 'assets/admin/uploads/images/product';
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(ItemRequest $request)
  {
    $validated = $request->safe()->only(['name', 'barcode','breif']);

    if ($request->hasFile('image')) {

      $filehandler = $request->image;
      $filename = time() . 'image_product.' . $filehandler->getClientOriginalExtension();
      $filehandler->move(self::$path, $filename);


      try {
        Item::create([
          'name'            => $validated['name'],
          'barcode'         => $validated['barcode'],
          'category_id'     => $request->category_id,
          'unit_id'         => $request->unit,
          'breif'           => $validated['breif'],
          'image'           => $filename,
          'created_by'      => auth()->user()->id,
          'updated_by'      => auth()->user()->id
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
    $product = Item::find($id);

    if (!$product) {
      return view('admin.items.view', ['product' => null]);
    }

    return view('admin.items.view', compact('product'));
  }
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function filterProductsAccordingToCategory(Request $request)
  {
    $id = $request->input('id');
    $filtered = Item::where(['category_id' => $id])->get();

    $categories = ItemCategroy::roots();
    $units = Unit::All();
    $vars = [
      'centrals' => ItemCategroy::centralCats(),
      'cats' => $categories,
      'units' => $units,
      'products' => $filtered
    ];
    return view('admin.items.home', $vars);
  }



  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {

    $product = Item::find($id);
    $units = Unit::All();
    $centrals = ItemCategroy::centralCats();

    return view('admin.items.edit', compact('product', 'units', 'centrals'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request)
  {
    $product = Item::find($request->id);

    //return $request->product_serial;
    try {
      $product->update([
        'barcode'           => $request->product_barcode,
        'parent_id'         => $request->parent_id,
        'name'              => $request->product_name,
        'serial'            => $request->product_serial,
        'breif'             => $request->product_breif,
        'unit_id'           => $request->product_unit_id,
        'updated_by'        => auth()->user()->id,
        'updated_by'        => auth()->user()->id

      ]);
      return redirect()->back()->with('success', 'product updated successfully');
    } catch (Exception $e) {
      return redirect()->back()->with('error', 'Error updating because of: ' . $e->getMessage());
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    Item::find($id)->delete();
    return redirect()->back()->with(['Success' => 'Product Removed Successfully']);
  }
}
