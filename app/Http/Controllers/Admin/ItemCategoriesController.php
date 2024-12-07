<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ItemCategroy;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Requests\itemCategoryRequest;

class ItemCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(itemCategoryRequest $request)
    {
        $validated = $request->safe()->only(['cat_name', 'cat_brief']);
        try {
            ItemCategroy::create([
                'cat_name'            => $validated['cat_name'],
                'parent_id'           => $request->parent,
                'cat_brief'           => $validated['cat_brief'],
                'status'              => $request->status !== null ? $request->status : 0,
                'created_by'          => currentUserId()
            ]);
            return redirect()->back()->withSuccess('Saves Successfully');
        } catch (QueryException $err) {
            return redirect()->back()->withError('Failed to save, due to: ' . $err);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
