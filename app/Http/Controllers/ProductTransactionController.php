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
        if (auth()->user()->username != "superadmin"){
            return view('dashboard.tx_product.index', [
                'txproducts' => ProductTransaction::with(['location','item'])->where('npk', auth()->user()->username)->latest()->get() //eager loading
            ]);
        }else{
            return view('dashboard.tx_product.index', [
                'txproducts' => ProductTransaction::with(['location','item'])->latest()->get() //eager loading
            ]);
        }
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

        return redirect('/tx_product')->with('success', 'Data Berhasil Disimpan');
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
    public function edit($id)
    {   
        $productTransaction = ProductTransaction::find($id);
        return view('dashboard.tx_product.edit',[
            'productTransaction' => $productTransaction,
            'locations' => Location::all(),
            'items' => Item::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductTransaction  $productTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'location_id' => 'required',
            'item_id' => 'required',
            'qty_transaction' => 'required'
        ];

        $validateData = $request->validate($rules);

        $validateData['npk'] = auth()->user()->username;

        ProductTransaction::where('id', $id)
            ->update($validateData);
        return redirect('/tx_product')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductTransaction  $productTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductTransaction::destroy($id);

        return redirect('/tx_product')->with('success', 'Data Berhasil Dihapus');
    }
}
