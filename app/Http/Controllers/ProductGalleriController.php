<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductGalleriRequest;
use App\Models\product;
use App\Models\product_galleri;
use Illuminate\Http\Request;

class ProductGalleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = product_galleri::with('product')->get();
        return view('pages.product-galleries.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = product::all();
        return view('pages.product-galleries.create', [
            'items' => $items
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Request\ProductGalleriRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductGalleriRequest $request)
    {
        $data = $request->all();
        $data['photo'] = $request->file('photo')->store('assets/products', 'public');

        product_galleri::create($data);
        return redirect()->route('product-galleri.index');
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
        $data = product_galleri::findOrFail($id);
        $data->delete();

        return redirect()->route('product-galleri.index');
    }
}
