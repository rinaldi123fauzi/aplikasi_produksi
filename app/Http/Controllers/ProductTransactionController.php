<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Location;
use App\Models\ProductTransaction;
use Illuminate\Http\Request;

class ProductTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.tx_product.index', [
            'txproducts' => ProductTransaction::with(['location','item'])->latest()->get() //eager loading
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.tx_product.create',[
            'locations' => Location::all(),
            'items' => Item::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'location_id' => 'required',
            'item_id' => 'required',
            'qty_transaction' => 'required'
        ]);

        $ldate = date('Y-m-d H:i:s');

        $validateData['transaction_date'] = $ldate;
        $validateData['npk'] = auth()->user()->username;

        ProductTransaction::create($validateData);

        return redirect('/tx_product')->with('success', 'New post success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductTransaction  $productTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(ProductTransaction $productTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductTransaction  $productTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductTransaction $productTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductTransaction  $productTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductTransaction $productTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductTransaction  $productTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductTransaction $productTransaction)
    {
        //
    }
}
